<?php

namespace Nemundo\Office\Word;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\RegularExpression\RegularExpressionReader;
use Nemundo\Core\Type\Text\Text;
use PhpOffice\PhpWord\IOFactory;


// WordFile
class WordReader extends AbstractBase
{

    private $filename;

    public function __construct($filename)
    {

        $this->filename = $filename;

    }


    public function getText()
    {

        $text = '';

        $objReader = IOFactory::createReader('Word2007');
        $phpWord = $objReader->load($this->filename);
        $objWriter = IOFactory::createWriter($phpWord, 'HTML');
        try {

            ob_start();
            $objWriter->save('php://output');
            $html = ob_get_clean();

            $regex = new RegularExpressionReader();
            $regex->text = $html;
            $regex->regularExpression = '<body>(.*?)</body>';
            foreach ($regex->getData() as $row) {
                $text = $row->getValue(0);
            }

            $text = (new Text($text))->removeHtmlTags()->decodeHtmlCharacter()->replace('<br />', ' ')->getValue();

        } catch (\Exception $e) {
            (new Debug())->write($e->getMessage());
        }

        return $text;

    }

}