<?php

namespace Nemundo\Admin\Com\HtmlEditor;

use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Html\Header\Link\StylesheetLink;
use Nemundo\Html\Script\JavaScript;

class AdminHtmlEditor extends AdminLargeTextBox
{

    //use CkEditor5Trait;

    public function getContent()
    {

        //$this->loadCkEditor($this->name);


        $stylesheet = new StylesheetLink($this);
        $stylesheet->href = 'https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css';

        $script = new JavaScript($this);
        $script->src = 'https://code.jquery.com/jquery-3.4.1.slim.min.js';

        $script = new JavaScript($this);
        $script->src = 'https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js';

        $script = new JavaScript($this);
        $script->addCodeLine("
        $( document ).ready(function() {
    $('#" . $this->name . "').summernote({
        placeholder: '',
        tabsize: 2,
        height: 120,
        toolbar: [
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ]
    });
    });
    ");


        return parent::getContent();

    }

}
