<?php


namespace Nemundo\App\Translation\Com\Admin;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Translation\Com\Form\LanguageForm;
use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\App\Translation\Language\DefaultLanguage;
use Nemundo\App\Translation\Parameter\LanguageParameter;
use Nemundo\App\Translation\Setup\LanguageSetup;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionSite;
use Nemundo\Web\Action\Site\DeleteActionSite;
use Nemundo\Web\Action\Site\EditActionSite;


class LanguageAdmin extends AbstractActionPanel
{

    /**
     * @var ActionSite
     */
    private $index;

    /**
     * @var ActionSite
     */
    private $new;

    /**
     * @var ActionSite
     */
    private $edit;

    /**
     * @var ActionSite
     */
    private $delete;


    protected function loadActionSite()
    {

        $this->index = new ActionSite($this);
        $this->index->onAction = function () {

            $btn = new AdminSiteButton($this);
            $btn->site = $this->new;

            $table = new AdminTable($this);

            $languageReader = new LanguageReader();

            $header = new TableHeader($table);
            $header->addText($languageReader->model->default->label);
            $header->addText($languageReader->model->language->label);
            $header->addText($languageReader->model->code->label);
            $header->addEmpty();
            $header->addEmpty();

            foreach ($languageReader->getData() as $languageRow) {

                $row = new TableRow($table);
                $row->addYesNo($languageRow->default);
                $row->addText($languageRow->language);
                $row->addText($languageRow->code);

                $site = clone($this->edit);
                $site->addParameter(new LanguageParameter($languageRow->id));
                $row->addIconSite($site);

                $site = clone($this->delete);
                $site->addParameter(new LanguageParameter($languageRow->id));
                $row->addIconSite($site);

            }

        };


        $this->new = new ActionSite($this);
        $this->new->actionName = 'new';
        $this->new->title = 'New';
        $this->new->onAction = function () {

            $form = new LanguageForm($this);
            $form->redirectSite = $this->index;

        };

        $this->edit = new EditActionSite($this);
        $this->edit->actionName = 'edit';
        $this->edit->title = 'Edit';
        $this->edit->onAction = function () {

            $form = new LanguageForm($this);
            $form->dataId = (new LanguageParameter())->getValue();
            $form->redirectSite = $this->index;

        };


        $this->delete = new DeleteActionSite($this);
        $this->delete->actionName = 'delete';
        $this->delete->title = 'Delete';
        $this->delete->onAction = function () {

            $languageId = (new LanguageParameter())->getValue();

            if ($languageId == (new DefaultLanguage())->getLanguageId()) {
                (new Debug())->write('You can not delete the default language.');
                exit;
            }

            (new LanguageSetup())->removeLanguage($languageId);
            (new UrlReferer())->redirect();

        };

    }

}