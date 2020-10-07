<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\AppConfig;
use Nemundo\App\Mail\Data\MailQueue\MailQueuePaginationReader;
use Nemundo\App\Mail\Parameter\MailUrlParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;


// MailSite
class MailQueueSite extends AbstractSite
{

    /**
     * @var MailQueueDetailSite
     */
    public $detail;

    /**
     * @var MailTestSite
     */
    public $test;


    protected function loadSite()
    {
        $this->title = 'Mail Queue';
        $this->url = 'mail';

        $this->detail = new MailQueueDetailSite($this);
        $this->test = new MailTestSite($this);

        new MailQueueDeleteSite($this);
        new MyMailQueueSite($this);


    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $btn = new AdminSiteButton($page);
        $btn->content = 'Test Mail';
        $btn->site = $this->test;


        $form=new SearchForm($page);

        $formRow=new BootstrapFormRow($form);





        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Send Status');
        $header->addText('Send Date/Time');
        $header->addText('To');
        $header->addText('Subject');
        $header->addText('Date/Time');

        $header->addEmpty();

        $mailQueueReader = new MailQueuePaginationReader();  // Mail new MailQueuePaginationModelReader();
        //$mailQueueReader->addOrder($mailQueueReader->model->dateTime, SortOrder::DESCENDING);
        $mailQueueReader->addOrder($mailQueueReader->model->id, SortOrder::DESCENDING);
        $mailQueueReader->paginationLimit =AppConfig::PAGINATION_LIMIT;

        foreach ($mailQueueReader->getData() as $mailQueueRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addYesNo($mailQueueRow->send);

            if ($mailQueueRow->send) {
                $row->addText($mailQueueRow->dateTimeSend->getShortDateTimeLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($mailQueueRow->mailTo);
            $row->addText($mailQueueRow->subject);
            $row->addText($mailQueueRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            $site = clone(MailQueueDeleteSite::$site);
            $site->addParameter((new MailUrlParameter($mailQueueRow->id)));
            $row->addIconSite($site);

            $site = clone($this->detail);
            $site->addParameter((new MailUrlParameter($mailQueueRow->id)));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($page);
        $pagination->paginationReader = $mailQueueReader;

        $page->render();


    }


}