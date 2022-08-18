<?php


namespace Nemundo\App\WebService\Service;

use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\Model\Request\PageRequest;
use Nemundo\Model\Request\PaginationLimitRequest;

// PaginationList
// AbstractSearchServiceRequest
// AbstractSearchService
// AbstractPaginationService
abstract class AbstractListServiceRequest extends AbstractServiceRequest
{

    protected function getCurrentPage()
    {
        return (new PageRequest())->getValue();
    }


    protected function getPaginationLimit()
    {
        return (new PaginationLimitRequest())->getValue();
    }


    protected function getSortingField() {

        $request=new HttpRequest('sorting');
        return $request->getValue();

    }


    protected function getSortingOrder() {

        $request=new HttpRequest('order');
        return $request->getValue();

    }

}