<?php

namespace Nemundo\Admin\AppDesigner\Site\Image;


use Nemundo\Admin\AppDesigner\Form\Image\ImageModelFieldForm;
use Nemundo\Admin\AppDesigner\Parameter\ModelFieldParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Web\Site\AbstractSite;

class AppModelImageFieldNewSite extends AbstractSite
{


    protected function loadSite()
    {

        $this->title = 'New Image Field';
        $this->url = 'image-field-new';
        $this->menuActive = false;

    }


    public function loadContent()
    {

        $fieldId = (new ModelFieldParameter())->getValue();

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $col = new BootstrapColumn($page);
        $col->columnWidth = 4;

        $form = new ImageModelFieldForm($col);
        $form->fieldId = $fieldId;
        $form->redirectSite = clone(AppModelImageFieldSite::$site);
        $form->redirectSite->addParameter(new ModelFieldParameter($fieldId));

        $page->render();

    }

}