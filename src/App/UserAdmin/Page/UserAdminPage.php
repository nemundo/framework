<?php


namespace Nemundo\App\UserAdmin\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\UserAdmin\Site\UserDeleteSite;
use Nemundo\App\UserAdmin\Site\UserEditSite;
use Nemundo\App\UserAdmin\Site\UserNewSite;
use Nemundo\App\UserAdmin\Site\UserPasswordChangeSite;
use Nemundo\Com\Html\Hyperlink\EmailHyperlink;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\Form\BootstrapSearchForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\User\Data\User\UserPaginationReader;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;
use Nemundo\User\Parameter\UserParameter;

class UserAdminPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $btn = new AdminSiteButton($this);
        $btn->site = UserNewSite::$site;

        $searchForm = new BootstrapSearchForm($this);

        $formRow = new BootstrapFormRow($searchForm);

        $text = new BootstrapTextBox($formRow);
        $text->name = 'q';
        $text->value = $text->getValue();

        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('Active');
        $header->addText('Login');
        $header->addText('eMail');
        $header->addText('Display Name');
        $header->addText('Usergroup');
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();

        $userReader = new UserPaginationReader();
        $userReader->addOrder($userReader->model->login);
        //$userReader->paginationLimit = 30;

        $q = $text->getValue();
        if ($q !== '') {
            $userReader->filter->orContains($userReader->model->login, $text->getValue());
        }


        foreach ($userReader->getData() as $userRow) {

            $row = new TableRow($table);
            $row->addYesNo($userRow->active);
            $row->addText($userRow->login);

            $email = new EmailHyperlink($row);
            $email->email = $userRow->email;

            $row->addText($userRow->displayName);

            $userUsergroupReader = new UserUsergroupReader();
            $userUsergroupReader->model->loadUser();
            $userUsergroupReader->model->loadUsergroup();
            $userUsergroupReader->filter->andEqual($userUsergroupReader->model->userId, $userRow->id);

            $usergroup = new TextDirectory();
            foreach ($userUsergroupReader->getData() as $userUsergroupRow) {
                $usergroup->addValue($userUsergroupRow->usergroup->usergroup);
            }

            $row->addText($usergroup->getTextWithSeperator());

            $userParameter = new UserParameter($userRow->id);

            $site = clone(UserPasswordChangeSite::$site);
            $site->addParameter($userParameter);
            $row->addIconSite($site);

            $site = clone(UserEditSite::$site);
            $site->addParameter($userParameter);
            $row->addIconSite($site);

            $site = clone(UserDeleteSite::$site);
            $site->addParameter($userParameter);
            $row->addIconSite($site);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $userReader;

        return parent::getContent();

    }

}