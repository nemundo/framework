<?php

namespace Nemundo\Admin\Com\Autocomplete;

use Nemundo\Admin\Com\ListBox\AdminSearchTextBox;
use Nemundo\App\WebService\Service\AbstractWordServiceRequest;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Script\ModuleJavaScript;

class AdminAutocompleteSearchTextBox extends AdminSearchTextBox
{

    /**
     * @var AbstractWordServiceRequest
     */
    public $webService;

    public function getContent()
    {

        $module = new ModuleJavaScript($this);
        $module
            ->addContent('import Debug from "/package/js/core/Debug/Debug.js";')
            ->addContent('import DocumentContainer from "/package/js/html/Document/Document.js";')
            ->addContent('import AutocompleteInput from "/package/js/framework/Com/Autocomplete/AutocompleteInput.js";')
            ->addContent('let document = new DocumentContainer();')
            ->addContent('document.onLoaded = function () {')
            ->addContent('let autocomplete = new AutocompleteInput();')
            ->addContent('autocomplete.serviceName = "' . $this->webService->serviceName . '";')
            ->addContent('autocomplete.fromId("' . $this->name . '");')
            ->addContent('autocomplete.loadAutocomplete();')
            ->addContent('};');

        $wordList = new Div($this);
        $wordList->id = $this->webService->serviceName . '_word_list';

        return parent::getContent();

    }

}