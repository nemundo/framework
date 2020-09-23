<?php

namespace Nemundo\Admin\MySql\Admin;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\MySql\Form\MySqlDatabaseForm;
use Nemundo\Admin\MySql\Parameter\DatabaseUrlParameter;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Provider\MySql\Database\MySqlDatabase;
use Nemundo\Db\Provider\MySql\Database\MySqlDatabaseReader;

use Nemundo\Package\Bootstrap\Table\BootstrapTable;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionUrl;

class MySqlDatabaseAdmin extends AbstractActionPanel
{

    /**
     * @var ActionUrl
     */
    private $index;

    /**
     * @var ActionUrl
     */
    private $new;

    /**
     * @var ActionUrl
     */
    private $delete;


    protected function loadActionSite()
    {


        $this->index = new ActionUrl($this);
        $this->index->onAction = function () {


            $btn = new AdminSiteButton($this);
            $btn->content = 'New';
            $btn->site = $this->new;

            $table = new BootstrapTable($this);

            $databaseReader = new MySqlDatabaseReader();

            foreach ($databaseReader->getData() as $database) {

                $row = new TableRow($table);
                $row->addText($database->databaseName);

                $databaseParameter = new DatabaseUrlParameter($database->databaseName);

                $site = clone($this->delete);
                $site->addParameter($databaseParameter);

                //$row->addSite($site);  //, 'delete');


            }


        };

        $this->new = new ActionUrl($this);
        $this->new->actionName = 'new';
        $this->new->onAction = function () {

            $form = new MySqlDatabaseForm($this);
            $form->redirectSite = $this->index;

        };

        $this->delete = new ActionUrl($this);
        $this->delete->actionName = 'delete';
        $this->delete->onAction = function () {

            $db = new MySqlDatabase();
            $db->databaseName = (new DatabaseUrlParameter())->getValue();
            $db->dropDatabase();

            $this->index->removeParameter(new DatabaseUrlParameter())->redirect();

        };

    }

}