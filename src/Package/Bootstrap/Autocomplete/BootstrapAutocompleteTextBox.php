<?php

namespace Nemundo\Package\Bootstrap\Autocomplete;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
use Nemundo\Web\Site\AbstractSite;


class BootstrapAutocompleteTextBox extends BootstrapTextBox
{

    use LibraryTrait;
    use AutocompleteTrait;

    /**
     * @var string[]
     */
    protected $codeList = [];


    public function getContent()
    {

        if (!$this->checkObject('sourceSite', $this->sourceSite, AbstractSite::class)) {
            return null;
        }

        $this->addPackage(new JqueryUiPackage());

        $this->addJqueryScript('$("#' . $this->name . '" ).autocomplete({');
        $this->addJqueryScript('source: "' . $this->sourceSite->getUrl() . '",');
        $this->addJqueryScript('minLength: ' . $this->minLength . ',');
        $this->addJqueryScript('delay: ' . $this->delay . ',');
        foreach ($this->codeList as $code) {
            $this->addJqueryScript($code);
        }
        $this->addJqueryScript('});');

        return parent::getContent();

    }

}