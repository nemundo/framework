<?php
namespace Nemundo\App\WebService\Data\Key;
class KeyExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $key;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = KeyModel::class;
$this->externalTableName = "webservice_key";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->key = new \Nemundo\Model\Type\Text\TextType();
$this->key->fieldName = "key";
$this->key->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->key->externalTableName = $this->externalTableName;
$this->key->aliasFieldName = $this->key->tableName . "_" . $this->key->fieldName;
$this->key->label = "Key";
$this->addType($this->key);

}
}