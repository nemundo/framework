<?php

namespace NemundoTest\Office\Word;

use Nemundo\Core\Base\AbstractBase;

class NewLine extends AbstractBase
{

    public function getNewLine() {

        $text = '</w:t><w:br/><w:t>';
        return $text;

    }

}