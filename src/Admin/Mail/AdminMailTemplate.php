<?php

namespace Nemundo\Admin\Mail;

use Nemundo\App\Mail\Template\AbstractActionMailTemplate;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Header\Meta\Meta;
use Nemundo\Html\Header\Style\Style;
use Nemundo\Html\Heading\H1;
use Nemundo\Html\Image\Img;
use Nemundo\Html\Paragraph\Paragraph;

class _AdminMailTemplate extends AbstractActionMailTemplate  // HtmlDocument
{

    public $logoUrl;

    public $subject;

    public function getContent()
    {

        $meta = new Meta($this);
        $meta->addAttribute('charset', 'UTF-8');

        $meta = new Meta($this);
        $meta->addAttribute('name', 'viewport');
        $meta->addAttribute('content', 'width=device-width, initial-scale=1.0');


        $style = new Style($this);
        $style->addContent('body {
        background-color: #f0f5f1
        }');

        if ($this->logoUrl !== null) {
            $img = new Img($this);
            $img->src = $this->logoUrl;
            $img->width = 200;
        }

        if ($this->subject) {
            $h1 = new H1($this);
            $h1->content = $this->subject;  // 'Test Mail';
        }


        $p = new Paragraph($this);
        $p->content = $this->actionText;  // 'bla bla bla bla';


        /*$builder2= new UserActionBuilder($userId);*/


        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = $this->actionLabel;  // 'Login';
        $hyperlink->url = $this->actionUrl;  // $domain. $builder2->getSecureTokenSite(TestSite::$site)->getUrl();

        //$mail->actionText = $container->getHtml();*/


        return parent::getContent();

    }

}