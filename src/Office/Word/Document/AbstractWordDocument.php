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

            $this->section->addText($text, $fontStyle);
        }

        return $this;

    }


    public function addTextBlock($text)
    {

        if ($text !== null) {
            if ($this->textrun == null) {
                $this->textrun = $this->section->addTextRun();
            }

            $this->textrun->addText($text);
            $this->textrun->addTextBreak();
        }
        return $this;


    }


    public function addEmptyLine($numberOfLines = 1)
    {

        $this->section->addTextBreak($numberOfLines);
        //[$breakCount], [$fontStyle], [$paragraphStyle]

        return $this;

    }


    public function addImage($filename)
    {

        $this->section->addImage(
            $filename,
            [
                //'width' => 150,             // Breite in pt (ca. Pixel)
                //'height' => 150,            // Höhe
                'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT, // Ausrichtung
            ]
        );

    }


    public function addImageLeft($filename, $width = null, $height = null)
    {

        $data = [];

        if ($width !== null) {
            $data['width'] = $width;
        }

        if ($height !== null) {
            $data['height'] = $height;
        }

        $data['alignment'] = Jc::LEFT;

        $this->section->addImage($filename, $data);


        /*$this->section->addImage(
            $filename,
            [
                //'width' => 150,             // Breite in pt (ca. Pixel)
                //'height' => 150,            // Höhe
                'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT, // Ausrichtung
            ]
        );*/

    }


    public function addImageRight($filename)
    {

        $this->section->addImage(
            $filename,
            [
                //'width' => 150,             // Breite in pt (ca. Pixel)
                //'height' => 150,            // Höhe
                'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT, // Ausrichtung
            ]
        );

    }


    public function addTable($showBorder = false, $fullWidth = false)
    {

        $config = [];
        $config['cellMargin'] = 50;


        //$config['width'] = 100 * 50;

        if ($fullWidth) {
            $config['unit'] = TblWidth::PERCENT;     // Table:: 100;
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


    /*public function addFullWidthTable()
    {

        /*$this->phpWord->addTableStyle(
            'FullWidthTable',
            [
                'borderSize' => 60,
                'borderColor' => '999999',
                'layout' => \PhpOffice\PhpWord\Style\Table::LAYOUT_FIXED, // feste Breiten
                'width' => 100 * 50, // 100% (Word rechnet intern in 1/50 Prozent)
                'unit'   => 'pct',      //Tab \PhpOffice\PhpWord\Style\Table::::WIDTH_PERCENT,
            ]
        );*/

    //$table = $section->addTable(array('unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT, 'width' => 100 * 50));

    /* $config = [];
     $config['unit'] = TblWidth::PERCENT;     // Table:: 100;
     $config['width'] = 100*50;

     /*'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT,
   'width' => 100 * 50,*/


    /*  $this->table = $this->section->addTable($config);

      return $this;


  }*/


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

        $style = [];

        if ($cell->bold) {
            $style['bold'] = $cell->bold;
        }

        if ($cell->noWarp) {
            $style['noWrap'] = true;
        }

        if ($cell->fontSize !== null) {
            $style['size'] = $cell->fontSize;
        }


        //$style['valign']= Cell::::VALIGN_TOP;
        /*$style['spaceAfter'] = 0;
        $style['spaceBefore'] = 0;
        $style['lineSpacing'] = 0;*/

        $style['marginTop'] = 10;
        $style['marginBottom'] = 10;
        $style['marginLeft'] = 10;
        $style['marginRight'] = 10;

        //$style['valign'] = 'top';

        /*
        'valign' => Cell::VALIGN_TOP,
    'marginTop' => 0,
    'marginBottom' => 0,
    'marginLeft' => 0,
    'marginRight' => 0,*/


        $style2 = [];
        $style2['alignment'] = $cell->alignment;  // Jc::END;
        $style2['spaceAfter'] = 0;
        $style2['spaceBefore'] = 0;
        $style2['lineSpacing'] = 0;
        /*$style2['marginTop'] = 0;
        $style2['marginBottom'] = 0;
        $style2['marginLeft'] = 0;
        $style2['marginRight'] = 0;*/
        //$style2['lineHeight']=0.5;


        /*[
            'lineHeight' => 1.5,   // Faktor für Zeilenhöhe
            'spaceBefore' => 0,    // Abstand vor Absatz
            'spaceAfter' => 0      // Abstand nach Absatz
        ]*/


        //array('alignment' => Jc::END)


        //$style['valign'] = 'center';

        //array('alignment' => Jc::END) // Right alignment

        //$style['alignment'] = $cell->alignment;  // Jc::END; // Right alignment

        //$style['alignment'] = Jc::CENTER;  // Jc::END;
        //$style['valign'] = Jc::RIGHT;  // Jc::END;


        // ['valign' => 'center']

        /*if ($cell->alignment == WordAlignment::RIGHT) {
            $style['alignment'] = Jc::END; // Right alignment
        }*/


        /*Jc::START → Left

Jc::CENTER → Center

Jc::BOTH → Justify*/


        //1 cm ≈ 567 Twips
        $width = null;
        if ($cell->widthInMillimeter !== null) {
            $width = (int)round($cell->widthInMillimeter * 1440 / 25.4); // ≈ mm * 56.6929
        }


        try {

            //(new Debug())->write($style);

            //$cell = $this->table->addCell();
            $cellTmp = $this->table->addCell($width);
            $cellTmp->addText($text, $style, $style2);
            //$cellTmp->setVAlign($cell->alignment);
            //$cellTmp->setVAlign(Jc::RIGHT);


        } catch (\Exception $exception) {
            (new Debug())->write($exception->getMessage());
        }
        return $this;


    }


    public function addTableCell($text, $bold = false, $size = null, $noWarp = false)
    {

        if ($text == null) {
            $text = '';
        }

        $style = [];

        if ($bold) {
            $style['bold'] = $bold;
        }

        if ($noWarp) {
            $style['noWrap'] = true;
        }

        if ($size !== null) {
            $style['size'] = $size;
        }

        try {
            $cell = $this->table->addCell();
            //$cell = $this->table->addCell(5000);

            if (is_array($text)) {

                $textRun = $cell->addTextRun();

                foreach ($text as $textRow) {

                    if ($textRow == null) {
                        $textRow = '';
                    }

                    $textRun->addText($textRow);
                    $textRun->addTextBreak();

                }

            } else {

                $cell->addText($text, $style);

            }

        } catch (\Exception $exception) {
            (new Debug())->write($exception->getMessage());
        }
        return $this;

    }


    public function writeFile()
    {

        try {
            $objWriter = IOFactory::createWriter($this->phpWord, 'Word2007');
            //$objWriter = IOFactory::createWriter($this->phpWord, 'ODText');  // 'Word2007');
            $objWriter->save($this->filename);
        } catch (\Exception $exception) {
            (new Debug())->write($exception->getMessage());
        }

    }


    public function writeFileOpenDocumentText()
    {

        //$objWriter = IOFactory::createWriter($this->phpWord, 'Word2007');
        $objWriter = IOFactory::createWriter($this->phpWord, 'ODText');  // 'Word2007');
        $objWriter->save($this->filename);

    }


    public function addLine()
    {

        $lineStyle = array('weight' => 1, 'width' => 450, 'height' => 0, 'color' => '000000');
        $this->section->addLine($lineStyle);

        return $this;

    }


    public function renderOdt()
    {

        $this->forceToDownload('ODText');
        return $this;

    }


    public function forceToDownload($renderMode = 'Word2007')
    {

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="' . $this->filename . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        //$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter = IOFactory::createWriter($this->phpWord, $renderMode);
        $objWriter->save("php://output");

        exit;

    }

}