<?php

namespace Nemundo\App\Mail\Com\Button;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Css\Builder\CssStyleBuilder;
use Nemundo\Html\Table\Table;
use Nemundo\Html\Table\Td;
use Nemundo\Html\Table\Tr;

class MailButton extends Table
{

    public $color;

    public $backgroundColor;

    public $borderRadius;

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
        //$hyperlink->addAttribute('style','color:'.$this->lightColor);
        $hyperlink->content = $this->buttonLabel;
        $hyperlink->url = $this->url;  // actionSite->getUrlWithDomain();


        $builder = new CssStyleBuilder();
        //$builder->addStyle('border', '1px solid #1F83FF');
        //$builder->addStyle('border-radius', $this->borderRadius);
        $builder->borderRadius = $this->borderRadius;
        $builder->addStyle('color', $this->color);
        $builder->addStyle('font-size', '14px');
        $builder->addStyle('text-decoration', 'none');
        $builder->addStyle('font-weight', 'bold');
        $builder->addStyle('display', 'inline-block');
        $builder->addStyle('padding', '8px 12px');

        //$builder->addStyle('width','200px');

        $hyperlink->addAttribute('style', $builder->getStyle());


        return parent::getContent();

    }


}