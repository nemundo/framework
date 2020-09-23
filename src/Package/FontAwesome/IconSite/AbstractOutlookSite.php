<?php


namespace Nemundo\Package\FontAwesome\IconSite;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\FontAwesome\Icon\EditIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractOutlookSite extends AbstractIconSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->title = 'Outlook Kalender';
        $this->url = 'outlook-kalender';


        //$this->title[LanguageCode::EN] = 'Edit';
        //$this->title[LanguageCode::DE] = 'Bearbeiten';

        //$this->url = 'edit';
        parent::__construct($site);
        $this->icon->icon = 'calendar-alt';

        //$this->icon = new EditIcon();

    }


    protected function loadSite()
    {

    }

}