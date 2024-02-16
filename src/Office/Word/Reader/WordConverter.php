<?php

namespace Nemundo\Office\Word\Reader;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use PhpOffice\PhpWord\IOFactory;

class WordConverter extends AbstractBase
{

    public function convertToHtml($sourceFilename, $destinationFilename)
    {

        //'ODText', 'RTF', 'Word2007', 'HTML', 'PDF'

        $objReader = IOFactory::createReader('Word2007');
        $phpWord = $objReader->load($sourceFilename);
        $objWriter = IOFactory::createWriter($phpWord, 'HTML');
        //$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        try {

            $objWriter->save($destinationFilename);

        } catch (\Exception $e) {
            (new Debug())->write($e->getMessage());
        }

    }

}