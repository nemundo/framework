<?php

namespace Nemundo\Model\Table\Redirect;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\AbstractType;
use Nemundo\Model\Definition\Model\Model;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\Parameter\UrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\Url;

class ModelTableRedirect extends AbstractBaseClass
{


    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var Url
     */
    public $url;

    /**
     * @var AbstractUrlParameter
     */
    public $parameter;

    /**
     * @var AbstractModelType
     */
    public $parameterField;

    /**
     * @var string
     */
    public $label;

    /**
     * @var AbstractFontAwesomeIcon
     */
    //public $icon;

    /**
     * @var bool
     */
    public $openNewWindow = false;

    /**
     * @var AbstractType[]
     */
    private $labelTypeList = [];


    //public function __construct(AbstractModelTable $table = null)
    public function __construct($table = null)
    {
        $this->parameterField = (new Model())->id;
        $this->parameter = new UrlParameter();  // new GetParameter();
        $this->parameter->parameterName = 'id';

        $this->url = new Url('#');

        if ($table !== null) {
            (new Debug())->write('Table Redirect');
            exit;
           // $table->addRedirectHyperlink($this);
        }
    }


    public function addLabelType(AbstractModelType $type)
    {

    }


}