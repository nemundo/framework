<?php

namespace Nemundo\Office\Word\Document;

use Nemundo\Core\Base\AbstractBase;
use PhpOffice\PhpWord\SimpleType\Jc;

class WordAlignment extends AbstractBase
{

    const LEFT= Jc::START;  //::LEFT;  //'left';

    const CENTER= Jc::CENTER;

    const RIGHT= Jc::END; // 'right';




    /*
Jc::START → Left

Jc::CENTER → Center

Jc::BOTH → Justify

    */

}