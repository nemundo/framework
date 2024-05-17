<?php
namespace Nemundo\App\WebService\Data\Key;
class KeyModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $key;

protected function loadModel() {
$this->tableName = "webservice_key";
$this->aliasTableName = "webservice_key";
$this->label = "Key";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webservice_key";
$this->id->externalTableName = "webservice_key";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webservice_key_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->key = new \Nemundo\Model\Type\Text\TextType($this);
$this->key->tableName = "webservice_key";
$this->key->externalTableName = "webservice_key";
$this->key->fieldName = "key";
$this->key->aliasFieldName = "webservice_key_key";
$this->key->label = "Key";
$this->key->allowNullValue = false;
$this->key->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "key";
$index->addType($this->key);

}
}