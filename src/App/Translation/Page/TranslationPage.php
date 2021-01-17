<?php

namespace Nemundo\App\Translation\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Translation\Com\Form\TranslationForm;
use Nemundo\App\Translation\Com\ListBox\LanguageListBox;
use Nemundo\App\Translation\Com\ListBox\SourceTypeListBox;
use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\App\Translation\Data\Source\SourcePaginationReader;
use Nemundo\App\Translation\Data\Source\SourceReader;
use Nemundo\App\Translation\Parameter\SourceParameter;
use Nemundo\App\Translation\Parameter\SourceTypeParameter;
use Nemundo\App\Translation\Parameter\TranslationParameter;
use Nemundo\App\Translation\Site\TranslationSite;
use Nemundo\App\Translation\Template\TranslationTemplate;
use Nemundo\App\Translation\Text\TranslationText;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class TranslationPage extends TranslationTemplate
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);


        $form = new SearchForm($layout->col1);

        $formRow = new BootstrapFormRow($form);

        /*$language = new LanguageListBox($formRow);
        $language->submitOnChange = true;
        $language->searchMode = true;*/

        $sourceType=new SourceTypeListBox($formRow);
        $sourceType->submitOnChange=true;
        $sourceType->searchMode=true;

        $uniqueId = new BootstrapTextBox($formRow);
        $uniqueId->label = 'Unique Id';
        $uniqueId->searchMode = true;




        $table = new AdminClickableTable($layout->col1);

        $sourceReader = new SourcePaginationReader();  //  new TranslationReader();
        $sourceReader->model->loadSourceType();  // source->loadSourceType();

        if ($sourceType->hasValue()) {
            $sourceReader->filter->andEqual($sourceReader->model->sourceTypeId,$sourceType->getValue());
        }

        /*if ($language->hasValue()) {
            $reader->filter->andEqual($reader->model->languageId,$language->getValue());
        }

        if ($uniqueId->hasValue()) {
            // $reader->filter->andContainsLeft($reader->model->uniqueId,$uniqueId->getValue());
        }*/

        //$reader->addOrder($reader->model->uniqueId);

        $header = new TableHeader($table);
        //$header->addText($reader->model->language->label);
        $header->addText($sourceReader->model->id->label);
        $header->addText($sourceReader->model->source->label);
        $header->addText($sourceReader->model->sourceType->label);
        //$header->addText($reader->model->text->label);

        $languageReader = new LanguageReader();
        $languageReader->addOrder($languageReader->model->code);
        foreach ($languageReader->getData() as $languageRow) {
            $header->addText($languageRow->code);
        }


        foreach ($sourceReader->getData() as $sourceRow) {

            $row = new BootstrapClickableTableRow($table);
            //$row->addText($translationRow->language->language);
            //$row->addText($sourceRow->language->code);
            $row->addText($sourceRow->id);
            $row->addText($sourceRow->source);
            $row->addText($sourceRow->sourceType->sourceType);
            //$row->addText($sourceRow->text);

            //$text = (new TranslationText())->getText($sourceRow->source,$languageRow->id);

            $languageReader = new LanguageReader();
            $languageReader->addOrder($languageReader->model->code);
            foreach ($languageReader->getData() as $languageRow) {
                $text = (new TranslationText())->getText($sourceRow->source, $languageRow->id, $sourceRow->sourceTypeId);
                $row->addText($text);
                //$header->addText($languageRow->code);
            }


            $site = clone(TranslationSite::$site);
            $site->addParameter(new SourceParameter($sourceRow->id));
            $site->addParameter(new SourceTypeParameter($sourceRow->sourceTypeId));
            $row->addClickableSite($site);

        }

        $pagination=new BootstrapPagination($layout->col1);
        $pagination->paginationReader=$sourceReader;



        $sourceParameter = new SourceParameter();
        if ($sourceParameter->hasValue()) {
            $form = new TranslationForm($layout->col2);
            $form->sourceId = $sourceParameter->getValue();
        }


        return parent::getContent();
    }
}