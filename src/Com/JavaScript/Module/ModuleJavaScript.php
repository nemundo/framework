<?php

namespace Nemundo\Com\JavaScript\Module;

use Nemundo\Html\Script\JavaScript;
use Nemundo\Html\Script\JavaScriptType;

class ModuleJavaScript extends JavaScript
{

  public function getContent()
  {

      $this->type = JavaScriptType::MODULE;
      $this->defer = true;

      return parent::getContent();

  }

}