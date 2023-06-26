<?php

namespace Nemundo\Com\JavaScript\_Module;

use Nemundo\Html\Script\JavaScript;
use Nemundo\Html\Script\JavaScriptType;

class __ModuleJavaScript extends JavaScript
{

  public function getContent()
  {

      $this->type = JavaScriptType::MODULE;
      $this->defer = true;

      return parent::getContent();

  }

}