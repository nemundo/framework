<?php

namespace Nemundo\Office\Word\Document;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\SimpleType\Jc;
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
            $fontStyle->setUnderline($this->underline);

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


    public function addTable($showBorder = false)
    {

        $config = [];
        //$config['unit'] = \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT;
        //$config['cellSpacing'] = 0;
        $config['cellMargin'] = 100;
        $config['width'] = 100 * 50;

        //$config['unit'] = \PhpOffice\PhpWord\Style\Table::WWIDTH_PERCENT,


        if ($showBorder) {
            $config['borderSize'] = 1;
            $config['borderColor'] = '000000';
            //$config['cellMargin'] = 5;
            //$config['cellSpacing'] = 50;

            //$config[fancyTableStyle = ['borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80, 'cellSpacing' => 50];
        }


        //$fancyTableStyle = ['borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80, 'cellSpacing' => 50];

        //$configtableStyle = ['cellSpacing' => 50, 'width' => 100 * 50];


        $this->table = $this->section->addTable($config);
        return $this;

    }


    public function addTableRow()
    {

        $this->table->addRow();
        return $this;

    }


    public function addTableCell($text, $bold = false, $size = null)
    {

        if ($text == null) {
            $text = '';
        }

        $style = [];
        $style['bold'] = $bold;

        if ($size !== null) {
            $style['size'] = $size;
        }

        try {
            $cell = $this->table->addCell();
            $cell->addText($text, $style);
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