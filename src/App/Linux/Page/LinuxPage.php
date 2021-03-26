<?php


namespace Nemundo\App\Linux\Page;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\App\Git\Parameter\PathParameter;
use Nemundo\App\Linux\Site\LinuxSite;
use Nemundo\App\Linux\Template\LinuxTemplate;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Typography\Code;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class LinuxPage extends LinuxTemplate
{

    public function getContent()
    {


        $pathCmd = null;

        $pathParameter = new PathParameter();
        if ($pathParameter->hasValue()) {

            $p = new Paragraph($this);
            $p->content = 'Path: ' . $pathParameter->getValue();

            $pathCmd = $pathParameter->getValue() . '/';
        } else {
            $pathCmd = '/';
        }


        $cmd = new LocalCommand();
        $value = $cmd->runLocalCommand('cd ' . $pathCmd . '&&ls -l');
        //$value = $cmd->runLocalCommand('cd /&&ls -l');


        $breadcrumb = new BootstrapBreadcrumb($this);


        $valueNew = '/';

        $site = clone(LinuxSite::$site);
        $site->title = 'Base';
        $site->addParameter(new PathParameter($valueNew));
        $breadcrumb->addSite($site);

        foreach ((new Text($pathCmd))->split('/') as $str) {

            $valueNew .= '/' . $str;

            if ($str !== '') {
                $site = clone(LinuxSite::$site);
                $site->title = $str;
                $site->addParameter(new PathParameter($valueNew));
                $breadcrumb->addSite($site);
            }

        }

        //$breadcrumb->addSite();

        $layout=new BootstrapTwoColumnLayout($this);


        $table = new AdminClickableTable($layout->col1);

        $header = new AdminTableHeader($table);
        $header->addText('Path');
        //$header->addText('Time');
        /*$header->addText('');
        $header->addText('');
        $header->addText('');*/


        foreach ($value as $line) {

            $row = new AdminClickableTableRow($table);

            $row->addText($line);

            if ($line[0] == '') {
                $row->addText('file');
            } else {
                $row->addEmpty();
            }


            $list = (new Text($line))->split(' ');
            foreach ($list as $item) {
                $row->addText($item);
            }

            $row->addText('---');

            //$time = $list[7];
            $path = $list[7];

            $row->addText($path);
            //$row->addText($time);

            $site = clone(LinuxSite::$site);
            $site->addParameter(new PathParameter($pathCmd . $path));
            $row->addClickableSite($site);

        }




        $filename = '/etc/mysql/my.cnf';

        $file = new TextFileReader($filename);
        $text = $file->getText();

        $code =new Code($layout->col2);
        $code->content = (new Html($text))->getValue();









        return parent::getContent();

    }

}