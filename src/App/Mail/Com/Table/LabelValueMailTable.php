<?php

namespace Nemundo\App\Mail\Com\Table;

use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\TableBuilder\TableCell;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Web\Site\AbstractSite;

class LabelValueMailTable extends MailTable
{

    public function addLabelValue($label, $value = '')
    {

        $row = $this->getTableRow($label);
        $row->addText($value);

        return $this;

    }


    public function addEmpty()
    {

        $this->addLabelValue(HtmlCharacter::NON_BREAKING_SPACE);
        return $this;

    }

    public function addLabelYesNoValue($label, $value = true)
    {

        $row = $this->getTableRow($label);

        $valueText = null;
        if ($value) {
            $valueText = 'Ja';
        } else {
            $valueText = 'Nein';
        }

        $row->addText($valueText);

        return $this;

    }


    public function addLabelSite($label, AbstractSite $site)
    {

        $row = $this->getTableRow($label);

        $hyperlink = new SiteHyperlink($row);
        $hyperlink->site = $site;

        return $this;

    }


    public function addLabelCom($label, AbstractHtmlContainer $com)
    {

        $row = $this->getTableRow($label);
        $row->addContainer($com);

        return $this;

    }


    public function addLabelHyperlink($label, $url, $value = null)
    {

        if ($value == null) {
            $value = $url;
        }

        $row = $this->getTableRow($label);

        $hyperlink = new UrlHyperlink($row);
        $hyperlink->openNewWindow = true;
        $hyperlink->url = $url;
        $hyperlink->content = $value;

        return $this;

    }


    private function getTableRow($label)
    {

        $row = new TableRow($this);

        $cell = new TableCell($row);
        //$cell->addCssClass('admin-table-cell-label');
        //$cell->width = $this->labelCellWidth;

        $bold = new Bold($cell);
        $bold->content = $label;

        return $row;

    }


}