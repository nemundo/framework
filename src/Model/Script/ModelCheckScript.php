<?php


namespace Nemundo\Model\Script;


use Dev\Data\DevModelCollection;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Model\Log\SetupLog;
use Nemundo\Model\Setup\ModelCollectionSetup;

class ModelCheckScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'model-check';
    }


    public function run()
    {


        (new ModelCollectionSetup())
            ->addCollection(new DevModelCollection());







        $tableReader=new MySqlTableReader();
        foreach ($tableReader->getData() as $mySqlTable) {

            //(new Debug())->write($mySqlTable->tableName);

            $found=false;
            foreach (SetupLog::$modelList as $model) {

                //(new Debug())->write($model->tableName);

                if ($model->tableName ==$mySqlTable->tableName) {
                    $found=true;

                    $fieldReader=new MySqlTableFieldReader();
                    $fieldReader->tableName = $mySqlTable->tableName;
                    foreach ($fieldReader->getData() as $mySqlField) {
                        //    (new Debug())->write($mySqlField->fieldName);
                    }

                }


            }


            if (!$found) {

                $mySqlTable->dropTable();

            }




        }




    }

}