<?php

namespace Nemundo\App\Tmp\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Application\Com\Form\TmpUploadForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Path\PathSize;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Project\Path\WebTmpPath;

class TmpPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $subtitle = new AdminSubtitle($layout);
        $subtitle->content = 'Tmp Path';


        $p = new Paragraph($layout);
        $p->content = 'Path Size: ' . (new PathSize((new TmpPath())->getPath()))->getFileSize()->getText();

        $table = new AdminTable($layout);

        $header = new AdminTableHeader($table);
        $header->addText('Filename');

        $reader = new DirectoryReader();
        $reader->path = (new TmpPath())->getPath();
        foreach ($reader->getData() as $file) {

            $row = new AdminTableRow($table);
            $row->addText($file->getFilename());

        }

        new TmpUploadForm($layout);


        $subtitle = new AdminSubtitle($layout);
        $subtitle->content = 'Web Tmp Path';

        $table = new AdminTable($layout);

        $header = new AdminTableHeader($table);
        $header->addText('Filename');

        $reader = new DirectoryReader();
        $reader->path = (new WebTmpPath())->getPath();
        foreach ($reader->getData() as $file) {

            $row = new AdminTableRow($table);
            //$row->addText($file->getFilename());

            $url = '/tmp/'.$file->getFilename();
            $row->addHyperlink($url, $file->getFilename(),true);

        }


        return parent::getContent();
    }
}