<?php
namespace Nemundo\User\Data\User;
class UserModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $login;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $password;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $email;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $displayName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $secureToken;

protected function loadModel() {
$this->tableName = "user_user";
$this->aliasTableName = "user_user";
$this->label = "User";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "user_user";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "user_user_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "user_user";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "user_user_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

$this->login = new \Nemundo\Model\Type\Text\TextType($this);
$this->login->tableName = "user_user";
$this->login->fieldName = "login";
$this->login->aliasFieldName = "user_user_login";
$this->login->label = "Login";
$this->login->allowNullValue = false;
$this->login->length = 255;

$this->password = new \Nemundo\Model\Type\Text\TextType($this);
$this->password->tableName = "user_user";
$this->password->fieldName = "password";
$this->password->aliasFieldName = "user_user_password";
$this->password->label = "Password";
$this->password->allowNullValue = false;
$this->password->length = 255;

$this->email = new \Nemundo\Model\Type\Text\TextType($this);
$this->email->tableName = "user_user";
$this->email->fieldName = "email";
$this->email->aliasFieldName = "user_user_email";
$this->email->label = "eMail";
$this->email->allowNullValue = false;
$this->email->length = 255;

$this->displayName = new \Nemundo\Model\Type\Text\TextType($this);
$this->displayName->tableName = "user_user";
$this->displayName->fieldName = "display_name";
$this->displayName->aliasFieldName = "user_user_display_name";
$this->displayName->label = "Display Name";
$this->displayName->allowNullValue = false;
$this->displayName->length = 255;

$this->secureToken = new \Nemundo\Model\Type\Text\TextType($this);
$this->secureToken->tableName = "user_user";
$this->secureToken->fieldName = "secure_token";
$this->secureToken->aliasFieldName = "user_user_secure_token";
$this->secureToken->label = "Secure Token";
$this->secureToken->allowNullValue = false;
$this->secureToken->length = 255;

}
}