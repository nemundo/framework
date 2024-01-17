<?php

namespace Nemundo\Admin\Com\Autocomplete;

use Nemundo\Admin\Com\ListBox\AdminIconTextBox;
use Nemundo\App\WebService\Service\AbstractWordWebService;
use Nemundo\Core\Http\Request\HttpRequest;
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

        $this->icon = 'search';

        $module = new ModuleJavaScript($this);
        $module
            ->addContent('import Debug from "/package/js/core/Debug/Debug.js";')
            ->addContent('import DocumentContainer from "/package/js/html/Document/Document.js";')
            ->addContent('import AutocompleteInput from "/package/js/framework/Com/Autocomplete/AutocompleteInput.js";')
            ->addContent('import HiddenInputContainer from "/package/js/html/Form/HiddenInput.js";')
            ->addContent('let document = new DocumentContainer();')
            ->addContent('document.onLoaded = function () {')
            ->addContent('let autocomplete = new AutocompleteInput();')
            ->addContent('autocomplete.serviceName = "' . $this->webService->serviceName . '";')
            ->addContent('autocomplete.fromId("' . $this->name . '");')
            ->addContent('autocomplete.loadAutocomplete();')
            ->addContent('autocomplete.onWordChange = function(id) {')
            ->addContent('let hidden = new HiddenInputContainer();')
            ->addContent('hidden.fromId("' . $this->getHiddenName() . '");')
            ->addContent('hidden.value = id;')
            ->addContent('};')
            ->addContent('};');

        $wordList = new Div($this);
        $wordList->id = $this->webService->serviceName . '_word_list';

        $this->hidden = new HiddenInput($this);
        $this->hidden->name = $this->getHiddenName();
        $this->hidden->id = $this->getHiddenName();

        return parent::getContent();

    }

    public function getId()
    {

        $request = new HttpRequest($this->getHiddenName());
        return $request->getValue();

    }


    private function getHiddenName()
    {

        $name = $this->name . '_id';
        return $name;

    }

}