<?php

namespace Nemundo\App\Mail\Com\Button;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Css\Builder\CssStyleBuilder;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Table\Table;
use Nemundo\Html\Table\Td;
use Nemundo\Html\Table\Tr;

class MailButton extends Table
{

    public $color;

    public $backgroundColor;

    public $borderRadius = '2px';

    public $url;

    public $buttonLabel = 'More';

    public function getContent()
    {

        $tr = new Tr($this);
        $td = new Td($tr);
        $td->addAttribute('bgcolor', $this->backgroundColor);

        $builder = new CssStyleBuilder();
        $builder->borderRadius = $this->borderRadius;
        $td->addAttribute('style', $builder->getStyle());

        $hyperlink = new UrlHyperlink($td);
        $hyperlink->openNewWindow = true;
        $hyperlink->addAttribute('rel', 'noopener noreferrer');
        $hyperlink->url = $this->url;

        $builder = new CssStyleBuilder();
        $builder->borderRadius = $this->borderRadius;
        $builder->addStyle('color', $this->color);
        $builder->addStyle('font-size', '14px');
        $builder->addStyle('text-decoration', 'none');
        $builder->addStyle('font-weight', 'bold');
        $builder->addStyle('display', 'inline-block');
        $builder->addStyle('padding', '5px');

        $hyperlink->addAttribute('style', $builder->getStyle());

        $bold = new Bold($hyperlink);
        $bold->content = $this->buttonLabel;
        $bold->addAttribute('style', $builder->getStyle());

        return parent::getContent();

    }

}