<?php

namespace Nemundo\Office\Word\Document;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\SimpleType\TblWidth;
use PhpOffice\PhpWord\Style\Font;

abstract class AbstractWordDocument extends AbstractBase
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    protected $format = WordFormat::WORD;

    /**
     * @var PhpWord
     */
    protected $phpWord;

    /**
     * @var Section
     */
    protected $section;

    private $textrun;

    private $table;

    private $font;

    private $fontSize;

    /**
     * @var bool
     */
    private $underline = false;

    /**
     * @var bool
     */
    private $bold = false;

    /**
     * @var bool
     */
    private $italic = false;

    abstract protected function loadDocument();


    public function __construct()
    {

        $this->phpWord = new PhpWord();
        Settings::setOutputEscapingEnabled(true);

        $this->addPage();

    }


    public function addPage()
    {
        $this->section = $this->phpWord->addSection();
        return $this;
    }


    public function setFont($font)
    {
        $this->font = $font;
        return $this;
    }


    public function setFontSize($fontSize)
    {
        $this->fontSize = $fontSize;
        return $this;
    }


    public function setBold($bold)
    {
        $this->bold = $bold;
        return $this;
    }


    public function setItalic($italic)
    {
        $this->italic = $italic;
        return $this;
    }


    public function setUnderline($underline)
    {
        $this->underline = $underline;
        return $this;
    }


    public function addText($text)
    {

        if ($text !== null) {
            /*$fontStyle = new Font();
            $fontStyle->setBold($this->bold);
            $fontStyle->setItalic($this->italic);
            if ($this->underline) {
                $fontStyle->setUnderline('single');
            }

            if ($this->font !== null) {
                $fontStyle->setName($this->font);
            }

            if ($this->fontSize !== null) {
                $fontStyle->setSize($this->fontSize);
            }*/

            $this->section->addText($text, $this->getFontStyle());  // $fontStyle);
        }

        return $this;

    }


    public function addTextBlock($text)
    {


        /*$fontStyle = new Font();
        $fontStyle->setBold($this->bold);
        $fontStyle->setItalic($this->italic);
        if ($this->underline) {
            $fontStyle->setUnderline('single');
        }

        if ($this->font !== null) {
            $fontStyle->setName($this->font);
        }

        if ($this->fontSize !== null) {
            $fontStyle->setSize($this->fontSize);
        }*/



        if ($text !== null) {
            if ($this->textrun == null) {
                $this->textrun = $this->section->addTextRun();
            }

            $this->textrun->addText($text,$this->getFontStyle());
            $this->textrun->addTextBreak();
        }
        return $this;

    }



    private function getFontStyle()
    {

        $fontStyle = new Font();
        $fontStyle->setBold($this->bold);
        $fontStyle->setItalic($this->italic);
        if ($this->underline) {
            $fontStyle->setUnderline('single');
        }

        if ($this->font !== null) {
            $fontStyle->setName($this->font);
        }

        if ($this->fontSize !== null) {
            $fontStyle->setSize($this->fontSize);
        }

return $fontStyle;

    }





    public function addEmptyLine($numberOfLines = 1)
    {

        $this->section->addTextBreak($numberOfLines);
        return $this;

    }


    public function addImageLeft($filename, $width = null, $height = null)
    {

        $this->addImage($filename, $width, $height, Jc::LEFT);
        return $this;

    }


    public function addImageRight($filename, $width = null, $height = null)
    {

        $this->addImage($filename, $width, $height, Jc::RIGHT);
        return $this;

    }


    private function addImage($filename, $width = null, $height = null, $alignment = null)
    {

        $data = [];

        if ($width !== null) {
            $data['width'] = $width;
        }

        if ($height !== null) {
            $data['height'] = $height;
        }

        $data['alignment'] = $alignment;

        $this->section->addImage($filename, $data);

    }


    public function addTable($showBorder = false, $fullWidth = false)
    {

        $config = [];
        $config['cellMargin'] = 50;

        if ($fullWidth) {
            $config['unit'] = TblWidth::PERCENT;
            $config['width'] = 100 * 50;
        }

        if ($showBorder) {
            $config['borderSize'] = 1;
            $config['borderColor'] = '000000';
        }

        $config['cellMarginTop'] = 10;
        $config['cellMarginBottom'] = 10;
        $config['cellMarginLeft'] = 10;
        $config['cellMarginRight'] = 10;

        $this->table = $this->section->addTable($config);

        return $this;

    }


    public function addTableRow()
    {

        $this->table->addRow();
        return $this;

    }


    public function addWordTableCell(WordTableCell $cell)
    {

        $text = $cell->text;
        if ($cell->text == null) {
            $text = '';
        }

        $style1 = [];

        if ($cell->bold) {
            $style1['bold'] = $cell->bold;
        } else {

            if ($this->bold) {
                $style1['bold'] = $this->bold;
            }

        }

        if ($cell->noWarp) {
            $style1['noWrap'] = true;
        }

        if ($cell->fontSize !== null) {
            $style1['size'] = $cell->fontSize;
        } else {
            $style1['size'] = $this->fontSize;
        }

        $style1['marginTop'] = 10;
        $style1['marginBottom'] = 10;
        $style1['marginLeft'] = 10;
        $style1['marginRight'] = 10;

        $style2 = [];
        $style2['alignment'] = $cell->alignment;
        $style2['spaceAfter'] = 0;
        $style2['spaceBefore'] = 0;
        $style2['lineSpacing'] = 0;

        $width = null;
        if ($cell->widthInMillimeter !== null) {
            $width = (int)round($cell->widthInMillimeter * 1440 / 25.4);
        }

        try {

            $cellTmp = $this->table->addCell($width);
            $cellTmp->addText($text, $style1, $style2);

        } catch (\Exception $exception) {
            (new Debug())->write($exception->getMessage());
        }
        return $this;

    }


    //public function addTableCell($text, $bold = false, $size = null, $noWarp = false)
    public function addTableCell($text, $noWarp = false)
    {

        if ($text == null) {
            $text = '';
        }

        $style = [];

        if ($this->bold) {
            $style['bold'] = $this->bold;
        }

        if ($noWarp) {
            $style['noWrap'] = true;
        }

        //if ($size !== null) {
        $style['size'] = $this->fontSize;
        //}

        $style2 = [];
        //$style2['alignment'] = $cell->alignment;
        $style2['spaceAfter'] = 0;
        $style2['spaceBefore'] = 0;
        $style2['lineSpacing'] = 0;


        try {

            $cell = $this->table->addCell();

            if (is_array($text)) {

                $textRun = $cell->addTextRun();

                foreach ($text as $textRow) {

                    if ($textRow == null) {
                        $textRow = '';
                    }

                    $textRun->addText($textRow, $style, $style2);
                    $textRun->addTextBreak();

                }

            } else {

                $cell->addText($text, $style, $style2);

            }

        } catch (\Exception $exception) {
            (new Debug())->write($exception->getMessage());
        }
        return $this;

    }


    public function writeFile()
    {

        try {
            $objWriter = IOFactory::createWriter($this->phpWord, $this->format);
            $objWriter->save($this->filename);
        } catch (\Exception $exception) {
            (new Debug())->write($exception->getMessage());
        }

    }


    public function addLine()
    {

        $lineStyle = array('weight' => 1, 'width' => 450, 'height' => 0, 'color' => '000000');
        $this->section->addLine($lineStyle);

        return $this;

    }


    public function forceToDownload()
    {

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="' . $this->filename . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');

        $objWriter = IOFactory::createWriter($this->phpWord, $this->format);
        $objWriter->save("php://output");

        exit;

    }

}