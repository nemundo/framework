<?php


namespace Nemundo\Package\JqueryUi\Sortable;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractSortableSite extends AbstractSite
{


    public function __construct(AbstractSiteTree $site = null)
    {

        $this->url = 'item-order';
        $this->menuActive = false;

        parent::__construct($site);
    }


    /*
    protected function loadSite()
    {
        $this->url = 'item-order';
        $this->menuActive = false;
        //$this->restricted = true;
        //$this->addRestrictedUsergroup(new ProzesssteuerungAdministratorUsergroup());

        PhaseItemOrderSite::$site=$this;

    }


    public function loadContent()
    {


        $itemOrder = 0;
        foreach ($_POST['item'] as $value) {

            $data =  new ProjektPhaseUpdate();
            $data->itemOrder = $itemOrder;
            $data->updateById($value);

            $itemOrder++;

        }


    }*/



    protected function getItemOrderList() {

        return $_POST['item'];


    }



}