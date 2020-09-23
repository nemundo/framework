<?php

namespace Nemundo\Admin\AppDesigner\Site\App;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\App\AppTable;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Table\Redirect\ModelTableRedirect;
use Nemundo\Web\Site\AbstractSite;

class AppTrashSite extends AbstractSite
{

    /**
     * @var AppTrashRestoreSite
     */
    public $appRestore;

    protected function loadSite()
    {
        $this->title = 'Trash';
        $this->url = 'trash';
        $this->menuActive = false;

        $this->appRestore = new AppTrashRestoreSite($this);
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminSubtitle($page);
        $title->content = 'App';

        $table = new AppTable($page);
        $table->connection = new AppDesignerConnection();
        $table->filter->andEqual($table->model->active, false);


        $redirect = new ModelTableRedirect($table);
        $redirect->url = $this->appRestore;
        $redirect->label = 'Restore';
        $redirect->parameter = new AppParameter();
        $redirect->parameterField = $table->model->id;


        $page->render();


    }

}