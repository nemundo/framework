<?php

namespace Nemundo\App\CssDesigner\Com\Form;

use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminColorPicker;
use Nemundo\Admin\Com\ListBox\AdminNumberBox;
use Nemundo\App\CssDesigner\Builder\StyleBuilder;
use Nemundo\App\ModelDesigner\Project\DefaultProject;
use Nemundo\Core\File\File;
use Nemundo\Core\Json\Document\JsonDocument;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Project\Path\ProjectPath;

class StyleBuilderForm extends AbstractAdminForm
{

    /**
     * @var AdminColorPicker
     */
    private $lightColor;

    /**
     * @var AdminColorPicker
     */
    private $darkColor;

    /**
     * @var AdminColorPicker
     */
    private $backgroundColor;

    /**
     * @var AdminColorPicker
     */
    private $fontColor;

    /**
     * @var AdminNumberBox
     */
    private $borderRadius;


    public function getContent()
    {

        $this->lightColor = new AdminColorPicker($this);
        $this->lightColor->label = 'Light Color';

        $this->darkColor = new AdminColorPicker($this);
        $this->darkColor->label = 'Dark Color';

        $this->backgroundColor = new AdminColorPicker($this);
        $this->backgroundColor->label = 'Background Color';

        $this->fontColor = new AdminColorPicker($this);
        $this->fontColor->label = 'Font Color';

        $this->borderRadius = new AdminNumberBox($this);
        $this->borderRadius->label = 'Border Radius';
        $this->borderRadius->value = 0;


        if ((new File($this->getJsonFilename()))->fileExists()) {

            $reader = new JsonReader();
            $reader->fromFilename($this->getJsonFilename());
            $json = $reader->getData();

            $this->lightColor->value = $json['color-light'];
            $this->darkColor->value = $json['color-dark'];
            $this->backgroundColor->value = $json['color-background'];
            $this->fontColor->value = $json['color-font'];
            $this->borderRadius->value = $json['border-radius'];

        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $builder = new StyleBuilder();
        $builder->filename = $this->getStylesheetFilename();
        $builder->lightColor = $this->lightColor->getValue();
        $builder->darkColor = $this->darkColor->getValue();
        $builder->backgroundColor = $this->backgroundColor->getValue();
        $builder->fontColor = $this->fontColor->getValue();
        $builder->borderRadius = $this->borderRadius->getValue();
        $builder->createStylesheet();

        $json = [];
        $json['color-light'] = $this->lightColor->getValue();
        $json['color-dark'] = $this->darkColor->getValue();
        $json['color-background'] = $this->backgroundColor->getValue();
        $json['color-font'] = $this->fontColor->getValue();
        $json['box-shadow'] = '3px 6px 4px -6px #000000';
        $json['border-radius'] = $this->borderRadius->getValue();

        $writer = new JsonDocument();
        $writer->filename = $this->getJsonFilename();
        $writer->overwriteExistingFile = true;
        $writer->setData($json);
        $writer->writeFile();

    }


    private function getJsonFilename()
    {

        $project = (new DefaultProject())->getDefaultProject();

        $filename = (new ProjectPath())
            ->addPath('css')
            ->addPath($project->projectName)
            ->createPath()
            ->addPath('design.json')
            ->getFullFilename();

        return $filename;

    }


    private function getStylesheetFilename()
    {

        $project = (new DefaultProject())->getDefaultProject();

        $filename = (new ProjectPath())
            ->addPath('css')
            ->addPath($project->projectName)
            ->addPath('design.css')
            ->getFullFilename();

        return $filename;

    }


}