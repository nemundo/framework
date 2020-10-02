<?php

namespace Nemundo\App\ModelDesigner\Site\Image;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppImageType\AppImageTypeDelete;
use Nemundo\Admin\AppDesigner\Data\AppImageType\AppImageTypeReader;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Admin\AppDesigner\Parameter\ImageTypeParameter;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class ImageFormatDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var ImageFormatDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title='Delete Image Format';
        $this->url = 'image-format-delete';

        ImageFormatDeleteSite::$site=$this;

    }


    public function loadContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);
        $type = (new FieldNameParameter())->getType($model);



        //$type->addFormat();


        (new UrlReferer())->redirect();

    }


}