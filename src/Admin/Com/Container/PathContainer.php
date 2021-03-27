<?php


namespace Nemundo\Admin\Com\Container;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Linux\Parameter\PathParameter;
use Nemundo\App\Linux\Site\LinuxSite;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Web\Site\Site;


class PathContainer extends AbstractContainer
{

    public $path;

    public function getContent()
    {


        $breadcrumb = new BootstrapBreadcrumb($this);

        $valueNew = '/';
        $pathCmd=(new PathParameter())->getValue();

        $site =new Site();   // clone(LinuxSite::$site);
        $site->title = 'Base';
        $site->addParameter(new \Nemundo\App\Git\Parameter\PathParameter($valueNew));
        $breadcrumb->addSite($site);

        foreach ((new Text($pathCmd))->split('/') as $str) {

            $valueNew .= '/' . $str;

            if ($str !== '') {
                $site = new Site();  // clone(LinuxSite::$site);
                $site->title = $str;
                $site->addParameter(new PathParameter($valueNew));
                $breadcrumb->addSite($site);
            }

        }



        $layout = new BootstrapTwoColumnLayout($this);


        $list = new BootstrapSiteList($layout->col1);

        $reader = new DirectoryReader();
        $reader->path = $this->path. (new PathParameter())->getValue() ;
        $reader->includeDirectories=true;
        foreach ($reader->getData() as $file) {

            $site = new Site();
            $site->title = $file->filename;
            $site->addParameter(new PathParameter( (new PathParameter())->getValue().'/'.$file->filename));
            $list->addSite($site);

        }

        return parent::getContent();

    }

}