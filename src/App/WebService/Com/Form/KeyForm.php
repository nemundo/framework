<?php

namespace Nemundo\App\WebService\Com\Form;

use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\App\WebService\Data\Key\Key;
use Nemundo\Core\Random\RandomText;

class KeyForm extends AbstractAdminForm
{

    public function getContent()
    {

        $this->submitButton->label = 'Create Key';
        return parent::getContent();

    }

    protected function onSubmit()
    {

        $random = new RandomText();
        $random->length = 20;

        $data = new Key();
        $data->ignoreIfExists = true;
        $data->key = $random->getText();
        $data->save();


    }

}