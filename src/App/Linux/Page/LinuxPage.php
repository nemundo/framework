<?php


namespace Nemundo\App\Linux\Page;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Git\Parameter\PathParameter;
use Nemundo\App\Linux\Parameter\FilenameParameter;
use Nemundo\App\Linux\Reader\CommandReader;
use Nemundo\App\Linux\Reader\FindReader;
use Nemundo\App\Linux\Site\LinuxSite;
use Nemundo\App\Linux\Template\LinuxTemplate;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Type\File\File;
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


        //$cmd = new LocalCommand();
        //$value = $cmd->runLocalCommand('find ' . $pathCmd . ' -maxdepth 1 \'%p %TD\n\'');


        $reader = new FindReader(); // new CommandReader();
        $reader->path=$pathCmd;
        $reader->type='d';

        //$reader->command = 'find ' . $pathCmd . ' -maxdepth 1 -type d -printf "%p %TD\n"';

        //$reader->command = 'find ' . $pathCmd . ' -maxdepth 1 \'%p %TD\n\'';

        // -printf '%%p'
        // -printf '%Tc %p\n'


        // -type f
        // -type d


        // find / -maxdepth 1 -printf "%p %TD\n"

        //$value = $cmd->runLocalCommand('cd ' . $pathCmd . '&&ls -l');
        //$value = $cmd->runLocalCommand('cd /&&ls -l');
        // -printf '%Tc %p\n'


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


        $layout = new BootstrapTwoColumnLayout($this);


        $table = new AdminClickableTable($layout->col1);

        $header = new AdminTableHeader($table);
        $header->addText('Path');
        $header->addText('Time');


        foreach ($reader->getData() as $line) {

            $row = new AdminClickableTableRow($table);
            $path = $line[0];
            $row->addText($path);
            foreach ($line as $item) {
                $row->addText($item);
            }
            $site = clone(LinuxSite::$site);
            $site->addParameter(new PathParameter($pathCmd . $path));
            $row->addClickableSite($site);

        }


        $reader = new FindReader();
        $reader->path=$pathCmd;
        $reader->type='f';

        //$reader->command = 'find / -maxdepth 1 -type d -printf "%p %TD\n"';
        foreach ($reader->getData() as $line) {

            $row = new AdminClickableTableRow($table);

            $path = $line[0];
            $row->addText($path);
            $row->addText($line[1]);

            $site = clone(LinuxSite::$site);
            $site->addParameter(new FilenameParameter($pathCmd . $path));
            $site->addParameter(new PathParameter());

            $row->addClickableSite($site);

        }


        $filenameParameter = new FilenameParameter();

        if ($filenameParameter->hasValue()) {

            $filename = $filenameParameter->getValue();

            $file = new TextFileReader($filename);
            $text = $file->getText();

            $subtitle = new AdminSubtitle($layout->col2);
            $subtitle->content= (new File( $filename))->filename;

            $code = new Code($layout->col2);
            $code->content = (new Html($text))->getValue();

        }

        return parent::getContent();

    }

}