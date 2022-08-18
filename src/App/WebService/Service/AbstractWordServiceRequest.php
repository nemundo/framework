<?php


namespace Nemundo\App\WebService\Service;


use Nemundo\Core\Http\Request\HttpRequest;

// AbstractAutocompleteService
abstract class AbstractWordServiceRequest extends AbstractServiceRequest
{

    //public $query;


    protected function getQuery() {

        $request=new HttpRequest('word');
        return $request->getValue();

    }


    protected function addWord($id, $word)
    {

        $data = [];
        $data['id'] = $id;
        $data['word'] = $word;

        $this->addRow($data);

    }

}