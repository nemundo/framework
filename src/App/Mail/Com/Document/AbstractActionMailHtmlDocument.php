<?php

namespace Nemundo\App\Mail\Com\Document;

use Nemundo\App\Mail\Com\Button\MailButton;
use Nemundo\App\Mail\Com\Layout\MailLayout;
use Nemundo\Css\Builder\CssStyleBuilder;
use Nemundo\Html\Heading\H1;
use Nemundo\Html\Image\Img;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractActionMailHtmlDocument extends AbstractMailHtmlDocument
{

    public $lightColor;

    public $darkColor;

    public $logoUrl;

    public $borderRadius;

    public $mailTitle;

    public $mailText;

    /**
     * @var AbstractSite
     */
    public $actionSite;



    public function getContent()
    {

        $layout = new MailLayout($this);

        if ($this->logoUrl !== null) {
            $logo = new Img($layout);
            $logo->src = $this->logoUrl;
        }

        if ($this->mailTitle !== null) {

            $h1 = new H1($layout);
            $h1->content = $this->mailTitle;

            $builder = new CssStyleBuilder();
            $builder->color = $this->darkColor;
            $h1->addAttribute('style', $builder->getStyle());

        }

        if ($this->mailText !== null) {
            $p = new Paragraph($layout);
            $p->content = $this->mailText;
        }

        if ($this->actionSite !== null) {
            $btn = new MailButton($layout);
            $btn->backgroundColor = $this->darkColor;
            $btn->color=$this->lightColor;
            $btn->borderRadius= $this->borderRadius;
            $btn->url = $this->actionSite->getUrlWithDomain();
            $btn->buttonLabel = $this->actionSite->title;
        }

        return parent::getContent();

    }

}