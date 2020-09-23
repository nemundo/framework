<?php

namespace Nemundo\Admin\AppDesigner\Form\Field\Type;


use Nemundo\Html\Container\HtmlContainer;

abstract class AbstractTypeFormPart extends HtmlContainer
{

    /**
     * @var string
     */
    public $fieldId;

    abstract public function saveData($fieldId);

    abstract public function updateData();

}