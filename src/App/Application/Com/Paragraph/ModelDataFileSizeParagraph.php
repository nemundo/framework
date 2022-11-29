<?php

namespace Nemundo\App\Application\Com\Paragraph;

use Nemundo\Core\Path\PathSize;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Path\DataPath;

class ModelDataFileSizeParagraph extends Paragraph
{

    /**
     * @var AbstractModel
     */
    public $model;

    public function getContent()
    {

        $tablePath = (new DataPath())->addPath($this->model->tableName);

        if ($tablePath->existPath()) {
            $this->content = 'Path Size: ' . (new PathSize($tablePath->getPath()))->getFileSize()->getText();
        } else {
            $this->content = 'No Files';
        }

        return parent::getContent();

    }

}