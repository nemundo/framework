<?php

namespace Nemundo\Admin\SqlAnalyzer\Import;


use Nemundo\Admin\SqlAnalyzer\Collection\SqlAnalyzerCollection;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer\SqlAnalyzer;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer\SqlAnalyzerDelete;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQuery;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryCount;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryDelete;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryReader;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryUpdate;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\Path;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Time\Stopwatch;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Db\Log\SqlLog;
use Nemundo\Db\Provider\MySql\Explain\MySqlExplain;
use Nemundo\Db\Reader\SqlReader;
use Nemundo\Model\Setup\ModelCollectionSetup;


class SqlAnalyzerImport extends AbstractBase
{


    public function importSql()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SqlAnalyzerCollection());

        (new SqlAnalyzerQueryDelete())->delete();
        (new SqlAnalyzerDelete())->delete();


        if (SqlLog::$filename == null) {
            SqlLog::$filename = (new Path())
                ->addPath(LogConfig::$logPath)
                ->addPath('sql')
                ->addPath('sql_query.log')
                ->getFilename();
        }


        $file = new File(SqlLog::$filename);
        if ($file->fileExists()) {

            $textFile = new TextFileReader(SqlLog::$filename);

            foreach ($textFile->getData() as $line) {


                $sql = new Text($line);
                if ($sql->containsLeft('SELECT')) {

                    $count = new SqlAnalyzerQueryCount();
                    $count->filter->andEqual($count->model->sqlQuery, $line);
                    if ($count->getCount() == 0) {
                        $data = new SqlAnalyzerQuery();
                        $data->sqlQuery = $line;
                        $data->save();
                    }
                }

            }

            //$file->deleteFile();

            $queryReader = new SqlAnalyzerQueryReader();
            foreach ($queryReader->getData() as $queryRow) {

                $explain = new MySqlExplain();
                $explain->sql = $queryRow->sqlQuery;

                foreach ($explain->getExplain() as $explainTable) {

                    $data = new SqlAnalyzer();
                    $data->sqlQueryId = $queryRow->id;
                    $data->sqlTableName = $explainTable->tableName;
                    $data->sqlSelectType = $explainTable->selectType;
                    $data->sqlKey = $explainTable->key;
                    $data->sqlRows = $explainTable->rows;
                    $data->sqlExtra = $explainTable->extra;
                    $data->save();

                }

                // ausführen, ohne Sql Cachinge

                $time = new Stopwatch();
                $query = new SqlReader();
                $query->sqlStatement->sql = $queryRow->sqlQuery;
                $query->getData();
                $sqlTime = $time->stop();

                $count = $query->getCount();


                $update = new SqlAnalyzerQueryUpdate();
                $update->sqlResultRows = $count;
                $update->sqlTime = $sqlTime;
                $update->updateById($queryRow->id);


            }

        } else {
            (new LogMessage())->writeError('Sql Query Log File not found');
        }

    }

}