<?php

namespace Nemundo\Admin\AppDesigner\Web;


use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Install\AppDesignerInstall;
use Nemundo\Admin\AppDesigner\Site\AppDesignerSite;
use Nemundo\Admin\AppDesigner\Site\Project\DefaultProjectSite;
use Nemundo\Admin\AppDesigner\Site\UpdateSite;
use Nemundo\Admin\Controller\AdminController;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\App\ClassDesigner\Site\ClassDesignerSite;
use Nemundo\App\ModelDesigner\Site\ModelDesignerSite;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;


class AppDesignerWeb extends AbstractBase
{

    public function __construct()
    {

        AdminConfig::$defaultTemplateClassName = AdminTemplate::class;

        /*$webUrl = new Text(WebConfig::$webUrl);
        $webUrl->replaceRight('/web/', '/admin/');
        WebConfig::$webUrl = $webUrl->getValue();*/

        if (AppDesignerConfig::$defaultProject == null) {
            (new LogMessage())->writeError('Default Project is not defined.');
            exit;
        }

        if (AppDesignerConfig::$defaultProject->dbFilename == null) {
            (new LogMessage())->writeError('No dbFilename defined in ' . AppDesignerConfig::$defaultProject->getClassName());
            exit;
        }

        // Check Connection
        $file = new File(AppDesignerConfig::$defaultProject->dbFilename);
        if (!$file->fileExists()) {

            (new Debug())->write('No Db File');

            (new AppDesignerInstall())->run();
            //(new UrlRefresh())->refresh();

        }


        AdminController::addAdminSite(new ModelDesignerSite());
        AdminController::addAdminSite(new ClassDesignerSite());
        AdminController::addAdminSite(new AppDesignerSite());
        AdminController::addAdminSite(new DefaultProjectSite());
        AdminController::addAdminSite(new UpdateSite());




        //new HomeRedirectSite($this);
        //new HomeRedirectSite($this);

        //new ModelDesignerSite($this);
        //new ClassDesignerSite($this);


//        new AppDesignerSite($this);*/

        //new MySqlSite($this);
        //new SqLiteSite($this);

        //new SqlAnalyzerSite($this);

        //new HelpSite($this);

        /*new WidgetSite($this);

        new ScriptSite($this);
        new MailQueueSite($this);*/


        //new DefaultProjectSite($this);

        //new ProjectImportSite($this);

        //new UpdateSite($this);


        (new AdminController())->render();

    }

}