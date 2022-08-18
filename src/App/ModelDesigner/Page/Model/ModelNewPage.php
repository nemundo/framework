<?php

namespace Nemundo\App\ModelDesigner\Page\Model;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\ModelForm;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\Model\ModelNewSite;
use Nemundo\App\ModelDesigner\Site\ModelSite;
use Nemundo\App\ModelDesigner\Template\ModelDesignerTemplate;

class ModelNewPage extends ModelDesignerTemplate
{

    public function getContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);

        $layout = new AdminFlexboxLayout($this);

        $breadcrumb = new ModelDesignerBreadcrumb($layout);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addActiveItem(ModelNewSite::$site->title);

        $form = new ModelForm($layout);
        $form->app = $app;
        $form->redirectSite = clone(ModelSite::$site);
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());

        return parent::getContent();

    }

}