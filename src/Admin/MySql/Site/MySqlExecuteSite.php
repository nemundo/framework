<?php

namespace Nemundo\Admin\MySql\Site;


use Nemundo\Admin\MySql\Navigation\MySqlNavigation;
use Nemundo\Core\Time\Stopwatch;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Sql\Parameter\SqlStatement;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Form\BootstrapSearchForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Web\Parameter\UrlParameter;
use Nemundo\Web\Site\AbstractSite;


class MySqlExecuteSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'MySql Execute';
        $this->url = 'mysql-execute';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        new MySqlNavigation($page);

        $form = new BootstrapSearchForm($page);
        $form->submitButton->label = 'Execute';

        $sql = new BootstrapLargeTextBox($form);
        $sql->name = 'sql';
        $sql->label = 'SQL';
        $sql->autofocus = true;
        $sql->value = $sql->getValue();

        $sqlRequest =new UrlParameter();
        $sqlRequest->parameterName='sql';

        if ($sqlRequest->exists()) {

            $stopwatch = new Stopwatch();

            $p = new Paragraph($page);

            $sqlParameter = new SqlStatement();
            $sqlParameter->sql = $sqlRequest->getValue();

            DbConfig::$defaultConnection->execute($sqlParameter);

            $p->content = $stopwatch->stop() . ' sec';

        }

        $page->render();

    }


}