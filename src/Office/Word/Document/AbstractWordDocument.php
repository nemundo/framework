<?php

namespace Nemundo\Office\Word\Document;

use Nemundo\Core\Base\AbstractBase;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;

class AbstractWordDocument extends AbstractBase
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

   /* public function newLine() {

        $this->section->addText('</w:t><w:br/><w:t>');
        return $this;

    }*/


    public function writeFile()
    {

        $objWriter = IOFactory::createWriter($this->phpWord, 'Word2007');
        //$objWriter = IOFactory::createWriter($this->phpWord, 'ODText');  // 'Word2007');
        $objWriter->save($this->filename);

    }



    public function renderOdt()
    {

        $this->forceToDownload('ODText');
        return $this;

    }


//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($this->phpWord, 'ODText');


    public function forceToDownload($renderMode='Word2007') {


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