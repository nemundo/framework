<?php

namespace NemundoTest\Admin\Site;

use Nemundo\Admin\Com\Autocomplete\AdminAutocompleteSearchTextBox;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Admin\Template\AdminTemplate;
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

        $page = new AdminTemplate();

        //$page->addPackage(new FrameworkJsPackage());


        $search = new AdminSearchForm($page);

        $autocomplete = new AdminAutocompleteSearchTextBox($search);
        $autocomplete->name = 'irgendwas';



        /*$div = new Div($page);
        $div->id = 'div1';


        $module = new ModuleJavaScript($page);
        $module->src = '/app/app.js';*/

        //$list = new AdminTextBox($page);  // new AdminSearchTextBox($page);  // new AdminAutocompleteSearchTextBox($page);
        //$list->label = 'Input 1';

        /*$list->name = 'input1';
        $list->id = 'input1';*/


        $page->render();


    }

}