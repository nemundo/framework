<?php

namespace Nemundo\Model\Item\File\Hyperlink;


use Nemundo\Html\Hyperlink\AbstractHyperlink;
use Nemundo\Model\Reader\Property\File\RedirectFilenameReaderProperty;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;

class RedirectFilenameHyperlink extends AbstractHyperlink  // ContentHyperlink  // AbstractHyperlink
{

    /**
     * @var RedirectFilenameReaderProperty
     */
    public $fileProperty;

    public function getContent()
    {

        $icon = new FontAwesomeIcon();
        switch ($this->fileProperty->getFileExtension()) {

            case 'pdf':
                $icon->icon = 'file-pdf-o';



                break;

            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                //$icon->icon = 'file-image-o';
            $icon->icon = 'fas fa-file-image';

                // fas fa-file-pdf
                break;

            case 'doc':
            case 'docx':
                $icon->icon = 'file-word-o';
                break;

            case 'xls':
            case 'xlsx':
                $icon->icon = 'file-excel-o';
                break;

            case 'mp3':
                $icon->icon = 'file-audio-o';
                break;


            default:
                $icon->icon = 'file-o';
        }

        $this->content = $icon->getContent() . ' ' . $this->fileProperty->getFilename();
        $this->href = $this->fileProperty->getUrl();
        //$this->target = '_blank';

        return parent::getContent();
    }


}