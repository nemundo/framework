<?php

namespace Nemundo\Model\Form;


use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Form\Item\AbstractModelFormItem;


abstract class AbstractModelForm extends AbstractFormBuilder
{

    use ConnectionTrait;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var bool
     */
    public $updateOnDuplicate = false;

    /**
     * @var SubmitButton
     */
    public $submitButton;


    public function __construct($parentCom = null)
    {
        parent::__construct($parentCom);

        $this->loadConnection();

        $this->submitButton = new AdminSubmitButton();

        $this->submitButton->label = 'Speichern';
        $this->submitButton->addCssClass('btn btn-primary');

    }


    public function getContent()
    {

        if (!$this->checkProperty('model')) {
            exit;
        }

        if (!is_a($this->model, AbstractModel::class)) {
            (new LogMessage())->writeError('Property model is not a AbstractModel Class');
            exit;
        }

        $this->model->checkModel();

        $this->addContainer($this->submitButton);

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $data = new ModelData();
        $data->model = $this->model;
        $data->connection = $this->connection;
        $data->updateOnDuplicate = $this->updateOnDuplicate;

        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $text */
                $text = new $type->formTypeClassName($this);
                $text->visible = false;
                $text->loadType($type);
                $text->typeValueList = $data->typeValueList;
                $text->saveValue();

            } else {

                if ($type->defaultValue !== null) {
                    $data->typeValueList->setModelValue($type, $type->defaultValue);
                }

            }
        }

        $id = $data->save();


        // save multi document
        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $text */
                $text = new $type->formTypeClassName($this);
                $text->visible = false;
                $text->loadType($type);
                $text->typeValueList = $data->typeValueList;
                //$text->afterSave($id);

            }
        }

        //$this->redirectId = $id;

        return $id;

    }

}