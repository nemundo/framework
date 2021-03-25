<?php


namespace Nemundo\App\Linux\Page;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\App\Git\Parameter\PathParameter;
use Nemundo\App\Linux\Site\LinuxSite;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class LinuxPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $pathCmd ='/';

        $pathParameter=new PathParameter();
        if ($pathParameter->hasValue()) {

            $p=new Paragraph($this);
            $p->content= 'Path: '. $pathParameter->getValue();

            $pathCmd.=$pathParameter->getValue();

        }


        $cmd = new LocalCommand();
        $value = $cmd->runLocalCommand('cd '.$pathCmd.'&&ls -l');
        //$value = $cmd->runLocalCommand('cd /&&ls -l');


        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('Path');
        $header->addText('Time');
        /*$header->addText('');
        $header->addText('');
        $header->addText('');*/


        foreach ($value as $line) {

            $row = new AdminClickableTableRow($table);

            $list = (new Text($line))->split(' ');

            /*
            foreach ($cell->split(' ') as $item) {
                $row->addText($item);
            }*/

            //$time = $list[7];
            $path = $list[4];

            $row->addText($path);
            //$row->addText($time);

            $site = clone(LinuxSite::$site);
            //$site->addParameter(new PathParameter($path));
            $row->addClickableSite($site);

        }


        return parent::getContent();

    }

}