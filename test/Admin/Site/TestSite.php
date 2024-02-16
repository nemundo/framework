<?php

namespace NemundoTest\Admin\Site;

use Nemundo\Admin\Com\Autocomplete\AdminAutocompleteTextBox;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Admin\Com\Navbar\AdminLanguageSwitcher;
use Nemundo\Admin\Com\Navbar\AdminNavbar;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Admin\Template\NavbarAdminTemplate;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Script\ModuleJavaScript;
use Nemundo\Package\Dropzone\DropzoneUpload;
use Nemundo\Package\Framework\FrameworkJsPackage;
use Nemundo\Web\Site\AbstractSite;

class TestSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Test Com';
        $this->url = 'test-com';
    }


    public function loadContent()
    {

        $page = new AdminTemplate();  // new NavbarAdminTemplate();  // new AdminTemplate();


        //new AdminNavbar($page);

        new AdminLanguageSwitcher($page);





        $page->render();


    }

}