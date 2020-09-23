<?php

namespace Nemundo\Admin\AppDesigner\Form\Field;


use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelField;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldRow;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldUpdate;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldValue;
use Nemundo\Admin\AppDesigner\Form\Field\Type\AbstractTypeFormPart;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class ModelFieldForm extends BootstrapForm
{

    use LibraryTrait;

    /**
     * @var SqLiteConnection
     */
    public $connection;

    /**
     * @var string
     */
    public $modelId;

    /**
     * @var string
     */
    public $typeId;

    /**
     * @var AbstractModelType|OrmTypeTrait
     */
    public $type;

    /**
     * @var string
     */
    public $updateId;

    /**
     * @var AppModelFieldRow
     */
    public $fieldRow;

    /**
     * @var BootstrapTextBox
     */
    private $fieldLabel;

    /**
     * @var BootstrapTextBox
     */
    private $variableName;

    /**
     * @var BootstrapTextBox
     */
    private $fieldName;

    /**
     * @var BootstrapCheckBox
     */
    private $allowNullValue;

    /**
     * @var BootstrapCheckBox
     */
    private $fieldValidation;

    /**
     * @var BootstrapCheckBox
     */
    private $formVisible;

    /**
     * @var BootstrapCheckBox
     */
    private $tableVisible;

    /**
     * @var BootstrapCheckBox
     */
    private $viewVisible;

    /**
     * @var AbstractTypeFormPart
     */
    private $formPart;

    public function getContent()
    {

        $this->fieldLabel = new BootstrapTextBox($this);
        $this->fieldLabel->label = 'Field Label';
        $this->fieldLabel->name = 'field_label';
        $this->fieldLabel->validation = true;
        $this->fieldLabel->autofocus = true;

        $this->fieldName = new BootstrapTextBox($this);
        $this->fieldName->label = 'Field Name';
        $this->fieldName->name = 'field_name';
        $this->fieldName->validation = true;

        $this->variableName = new BootstrapTextBox($this);
        $this->variableName->label = 'Variable Name';
        $this->variableName->name = 'variable_name';
        $this->variableName->validation = true;

        $this->allowNullValue = new BootstrapCheckBox($this);
        $this->allowNullValue->label = 'Allow Null Value';

        $this->fieldValidation = new BootstrapCheckBox($this);
        $this->fieldValidation->label = 'Validation';

        $this->formVisible = new BootstrapCheckBox($this);
        $this->formVisible->label = 'Form Visible';

        $this->tableVisible = new BootstrapCheckBox($this);
        $this->tableVisible->label = 'Table Visible';

        $this->viewVisible = new BootstrapCheckBox($this);
        $this->viewVisible->label = 'View Visible';

        if ($this->fieldRow !== null) {
            $this->fieldLabel->value = $this->fieldRow->appFieldLabel;
            $this->fieldName->value = $this->fieldRow->appFieldName;
            $this->variableName->value = $this->fieldRow->appFieldVariableName;
            $this->allowNullValue->value = $this->fieldRow->appAllowNullValue;
            $this->fieldValidation->value = $this->fieldRow->appFieldValidation;
            $this->formVisible->value = $this->fieldRow->formVisible;
            $this->tableVisible->value = $this->fieldRow->tableVisible;
            $this->viewVisible->value = $this->fieldRow->viewVisible;

        } else {

            $this->formVisible->value = true;
            $this->tableVisible->value = true;
            $this->viewVisible->value = true;
            $this->allowNullValue->value = false;

        }


        $formPart = false;

        if ($this->type->adminFormPartClassName !== null) {
            $this->formPart = new $this->type->adminFormPartClassName($this);
            $formPart = true;
        }

        if (($formPart) && ($this->fieldRow !== null)) {
            $this->formPart->fieldId = $this->fieldRow->id;
        }

        if ($this->fieldRow == null) {
            $this->addJqueryScript('$("#' . $this->fieldLabel->name . '").keyup(function() {');
            $this->addJqueryScript('value = $("#' . $this->fieldLabel->name . '" ).val();');
            $this->addJqueryScript('fieldName = value.toLowerCase().replace(/ /g, "_");');
            $this->addJqueryScript('variableName = value.toLowerCase().replace(/ /g, "");');

            $this->addJqueryScript('$("#' . $this->fieldName->name . '" ).val(fieldName);');
            $this->addJqueryScript('$("#' . $this->variableName->name . '" ).val(variableName);');

            $this->addJqueryScript('});');
        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        if ($this->fieldRow == null) {


            $value = new AppModelFieldValue();
            $value->connection = $this->connection;
            $value->field = $value->model->itemOrder;
            $value->filter->andEqual($value->model->appModelId, $this->modelId);
            $value->addOrder($value->model->itemOrder, SortOrder::DESCENDING);
            $itemOrder = $value->getValue();

            if ($itemOrder == '') {
                $itemOrder = -1;
            }
            $itemOrder++;

            $data = new AppModelField();
            $data->connection = $this->connection;
            $data->active = true;
            $data->appModelId = $this->modelId;
            $data->appFieldTypeId = $this->typeId;
            $data->appFieldLabel = $this->fieldLabel->getValue();
            $data->appFieldName = $this->fieldName->getValue();
            $data->appFieldVariableName = $this->variableName->getValue();
            $data->appAllowNullValue = $this->allowNullValue->getValue();
            $data->appFieldValidation = $this->fieldValidation->getValue();
            $data->formVisible = $this->formVisible->getValue();
            $data->tableVisible = $this->tableVisible->getValue();
            $data->viewVisible = $this->viewVisible->getValue();
            $data->itemOrder = $itemOrder;
            $fieldId = $data->save();

            if ($this->formPart !== null) {
                $this->formPart->saveData($fieldId);
            }

        } else {

            $data = new AppModelFieldUpdate();
            $data->connection = $this->connection;
            $data->appFieldLabel = $this->fieldLabel->getValue();
            $data->appFieldName = $this->fieldName->getValue();
            $data->appFieldVariableName = $this->variableName->getValue();
            $data->appAllowNullValue = $this->allowNullValue->getValue();
            $data->appFieldValidation = $this->fieldValidation->getValue();
            $data->formVisible = $this->formVisible->getValue();
            $data->tableVisible = $this->tableVisible->getValue();
            $data->viewVisible = $this->viewVisible->getValue();
            $data->updateById($this->fieldRow->id);

            if ($this->formPart !== null) {
                $this->formPart->updateData();
            }

        }

        $ormSetup = new AppDesignerModelOrmSetup();
        $ormSetup->connection = $this->connection;
        $ormSetup->createOrm($this->modelId);

    }

}