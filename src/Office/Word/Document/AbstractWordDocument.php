<?php

namespace Nemundo\Office\Word\Document;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
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

        return $this;

    }


    public function addTextBlock($text)
    {

        if ($this->textrun == null) {
            $this->textrun = $this->section->addTextRun();
        }

        $this->textrun->addText($text);
        $this->textrun->addTextBreak();

        return $this;


    }


    /* public function newLine() {

         $this->section->addText('</w:t><w:br/><w:t>');
         return $this;

     }*/


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


    public function addTable()
    {

        $config = [];
        //$config['unit'] = \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT;
        $config['width']= 100 * 50;

        $this->table = $this->section->addTable();
        return $this;

    }


    public function addTableRow()
    {

        $this->table->addRow();
        return $this;

    }


    public function addTableCell($text, $bold = false,$size=null)
    {

        $style = [];
        $style['bold'] = $bold;

        if ($size !== null) {
        $style['size'] = $size;
        }
        //$style['bold'] = false;


        try {
            $cell = $this->table->addCell();
            $cell->addText($text,$style);
        } catch (\Exception $exception) {
            (new Debug())->write($exception->getMessage());
        }
        return $this;

    }


    /*

    $table = $this->section->addTable($tableStyle);
    $table->addRow();  //[$height], [$rowStyle]);

    $cell = $table->addCell();  //$width, [$cellStyle]);
    $run = $cell->addTextRun();
    $run->addText($orderProductReader->model->order->orderNumber->label, $style);

    $cell = $table->addCell();
    $run = $cell->addTextRun();
    $run->addText($orderProductReader->model->orderDate->label, $style);

        //$cell = $table->addCell();
        //$cell->addText($orderProductReader->model->orderTime->label);

    $cell = $table->addCell();
    $cell->addText($orderProductReader->model->product->label, $style);

        /*$cell = $table->addCell();
        $cell->addText($orderProductReader->model->product->serviceprovider->label);*

    $cell = $table->addCell();
    $cell->addText($orderProductReader->model->orderType->label, $style);

    $cell = $table->addCell();
    $cell->addText($orderProductReader->model->quantity->label, $style);

    $cell = $table->addCell();
    $cell->addText($orderProductReader->model->price->label, $style)//->addText($orderProductReader->model->store->label)
    ;


    $style = [];
    $style['size'] = 8;
    $style['bold'] = false;
        //$style['preserveWhiteSpace'] =  true;


    foreach ($orderProductReader->getData() as $orderRow) {

    $table->addRow();  //[$height], [$rowStyle]);

    $cell = $table->addCell();
    $cell->addText($orderRow->orderDate->getShortDateLeadingZeroFormat(), $style2);

    $cell = $table->addCell();
    $cell->addText($orderRow->order->orderNumber, $style2);

    $cell = $table->addCell();
    $cell->addText($orderRow->orderType->orderType, $style);

    $cell = $table->addCell();
    $cell->addText($orderRow->product->product, $style);

    $cell = $table->addCell();
    $cell->addText($orderRow->quantity, $style);

    $cell = $table->addCell();
    $cell->addText($orderRow->getPrice(), $style);


    }
        */


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


    public function renderOdt()
    {

        $this->forceToDownload('ODText');
        return $this;

    }


//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($this->phpWord, 'ODText');


    public function forceToDownload($renderMode = 'Word2007')
    {


        /*$phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addText('Hello World!');
        $file = 'HelloWorld.docx';*/
        header("Content-Description: File Transfer");
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