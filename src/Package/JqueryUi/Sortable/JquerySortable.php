<?php

namespace Nemundo\Package\JqueryUi\Sortable;



use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
use Nemundo\Web\Site\AbstractSite;


// JquerySortableContainer
class JquerySortable extends AbstractHtmlContainer
{

    use LibraryTrait;


    /**
     * @var string
     */
    //public $id;

    /**
     * @var AbstractSite
     */
    public $sortableSite;

    public function getContent()
    {

        $this->addPackage(new JqueryUiPackage());

        $this->addJqueryScript('$("#' . $this->id . '").sortable({');

        $this->addJqueryScript('update : function () {');
        $this->addJqueryScript('var order = $("#' . $this->id . '").sortable("serialize", {');
        $this->addJqueryScript('expression: /(.+)[_](.+)/,');
        $this->addJqueryScript('});');

        $this->addJqueryScript('$.ajax({');
        $this->addJqueryScript('type: "POST",');
        $this->addJqueryScript('url: "' . $this->sortableSite->getUrl() . '",');
        $this->addJqueryScript('data: order,');
        $this->addJqueryScript('datatype: "json",');
        $this->addJqueryScript('});');
        $this->addJqueryScript('}');
        $this->addJqueryScript('});');

        return parent::getContent();

    }

}