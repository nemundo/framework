<?php

namespace Nemundo\App\ModelDesigner\Page\Image;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\ImageTypeForm;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\ImageFormatParameter;
use Nemundo\App\ModelDesigner\Parameter\ImageSizeParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\Image\ImageFormatDeleteSite;
use Nemundo\App\ModelDesigner\Site\Image\ImageTypeSite;
use Nemundo\App\ModelDesigner\Template\ModelDesignerTemplate;
use Nemundo\App\ModelDesigner\Type\ImageModelDesignerType;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;

class ImageTypePage extends ModelDesignerTemplate
{


    public function getContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = $app->getModelByTableName((new ModelParameter())->getValue());

        /** @var ImageModelDesignerType $type */
        $type = (new FieldNameParameter())->getType($model);

        $layout = new AdminFlexboxLayout($this);

        $breadcrumb = new ModelDesignerBreadcrumb($layout);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem($type->label);

        $form = new ImageTypeForm($layout);
        $form->app = $app;
        $form->type = $type;
        $form->redirectSite = ImageTypeSite::$site;
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());
        $form->redirectSite->addParameter(new ModelParameter());
        $form->redirectSite->addParameter(new FieldNameParameter());


        $table = new AdminTable($layout);

        $header = new AdminTableHeader($table);
        $header->addText('Type');
        $header->addText('Size');
        $header->addEmpty();

        foreach ($type->getFormatList() as $imageFormat) {

            $row = new AdminTableRow($table);
            $row->addText($imageFormat->imageFormatLabel);

            if ($imageFormat->isObjectOfClass(AutoSizeModelImageFormat::class)) {
                $row->addText('Auto: ' . $imageFormat->size);
            }

            if ($imageFormat->isObjectOfClass(FixWidthModelModelImageFormat::class)) {
                $row->addText('Width: ' . $imageFormat->width);
            }

            if ($imageFormat->isObjectOfClass(FixHeightModelImageFormat::class)) {
                $row->addText('Height: ' . $imageFormat->height);
            }

            $site = clone(ImageFormatDeleteSite::$site);
            $site->addParameter(new ProjectParameter());
            $site->addParameter(new AppParameter());
            $site->addParameter(new ModelParameter());
            $site->addParameter(new FieldNameParameter());
            $site->addParameter(new ImageFormatParameter($imageFormat->imageFormatName));
            $site->addParameter(new ImageSizeParameter($imageFormat->size));
            $row->addIconSite($site);

        }

        return parent::getContent();

    }

}