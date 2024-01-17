<?php

namespace Nemundo\Admin\Com\Autocomplete;

use Nemundo\Admin\Com\ListBox\AdminIconTextBox;
use Nemundo\App\WebService\Service\AbstractWordWebService;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Html\Script\ModuleJavaScript;

class AdminAutocompleteSearchTextBox extends AdminIconTextBox  // AdminSearchTextBox
{

    /**
     * @var AbstractWordWebService
     */
    public $webService;

    /**
     * @var HiddenInput
     */
    private $hidden;

    public function getContent()
    {

        $hiddenName = $this->name . '_id';

        $this->icon = 'search';

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
            ->addContent('autocomplete.onWordChange() {')
            ->addContent('let hidden = new HiddenInputContainer();')
            ->addContent('hidden.fromId("' . $hiddenName . '");')
            ->addContent('hidden.value = search.value;')
            ->addContent('}')
            ->addContent('};');


        $wordList = new Div($this);
        $wordList->id = $this->webService->serviceName . '_word_list';

        $this->hidden = new HiddenInput($this);
        $this->hidden->name = $hiddenName;
        $this->hidden->id = $hiddenName;

        return parent::getContent();

    }


    public function getId()
    {

        return $this->hidden->value;

    }


}