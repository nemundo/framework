<?php


namespace Nemundo\App\Linux\Page;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Linux\Ssh\LinuxCommand;
use Nemundo\App\Linux\Ssh\SshConnection;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Csv\CsvSeperator;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Type\Text\Text;

class LinuxPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        /*$conn=new SshConnection();
        $conn->host ='paranautik.com';   // '52.143.53.160';  // 'paranautik.com';
        $conn->user= 'paranautik';  // 'web04';
        $conn->rsaKey='-----BEGIN RSA PRIVATE KEY-----
AAABAATnKX1eESGZD8G6MqPLmnbfRAYR/kYDl6SVm9nqubJ/Q9YkTHK79rnAe63W
1T5uyHK4IaR0S41Kz0M6qpbULUe2hXRVsQpMti/ZptuobnRfQcTi85gutBJSgX7R
UPRa+qmmtfmSc+m9QNWhu61n+fHBVu662rBs53vl2D3Wu51yRvdha3PLZ+uZ3URF
cDqsg8jZd+lsmPJZtzOho8ryzLJKA5nHTv5or0aS6x9JuIPVvm8IHJJTDyuEpJHD
r0KfI+cLFAvl9oTPrujxPWn4oke39mhm8idmhI75upDUKJvwRLp/6JJvnW6B5gdw
95xKZmS6/Rc8yFlX+ML+w/loCq0AAACBAPWiltxkhwwOCkfSClsQSAHcF9cBOL2g
u2XUXpqMEhDsb4G980lVyKenZC50BMwf0QOuH+0039DioDi9sU200dGu7UDRDtjy
4BKag6sWZLqnLBYHJVT1eo0LO56vUhswURtzjd7NBIDcgF4An5Ftn8QU9HQsyh8L
PV1Gx3W0LN0xAAAAgQC9EKIlETcHrKrqLaL5/qGxbodOlHTi7OsGhOTcnD7cdkod
j+XgYpa75DFFZGupL/Bqi406GY+lB0Dfdj46kiQVTm/URtJzRC2jo32zVEYrsekc
zNyAE9yQO01kKyDuMgSZtaTWom4wrhGlJ8/Mq62ZOkQ6PYb+xvwWXuRLv7KmkQAA
AIAbHXG1LqGN9bvGjvIi9N9YFVYsliQwPCulYo2qNMGND7xgLemTS3/FxVbexoYj
mYfcy4ZxM3OTnrElPEBTZ1579V2ADHxDCmlr4xoiS91aFMJF6y7As4UKiUmk4nh/
d3+iAA2hIh5wTeXc8ePFaouGKgaUphk+/iRfxZefeTmXFg==
-----END RSA PRIVATE KEY-----';*/


        $conn=new SshConnection();
        $conn->host = '52.143.53.160';
        $conn->user=  'web04';
        $conn->rsaKey='-----BEGIN RSA PRIVATE KEY-----
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
-----END RSA PRIVATE KEY-----';



        $cmd= new LinuxCommand();
        $cmd->connection= $conn;
        $value = $cmd->runCommand('df');

        (new Debug())->write($value);

        $subtitle=new AdminSubtitle($this);
        $subtitle->content='Diskspace';

        $table=new AdminTable($this);
        foreach ($value as $line) {
            $row=new TableRow($table);

            $cell=new Text($line);
            foreach ($cell->split(CsvSeperator::TAB) as $item) {
                $row->addText($item);
            }
            $row->addText($line);
        }

        return parent::getContent();

    }

}