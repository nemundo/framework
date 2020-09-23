<?php

namespace Nemundo\Crawler\WebCrawler;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\RegularExpression\RegularExpressionReader;
use Nemundo\Core\WebRequest\CurlWebRequest;


class WebCrawler extends AbstractDataSource
{
    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $regularExpression;

    private $beforeText = [];

    private $field = [];

    protected function loadData()
    {

        if (!$this->checkProperty(['url', 'regularExpression'])) {
            return [];
        }

        $http = new CurlWebRequest();
        $html = $http->getUrl($this->url);

        $regex = new RegularExpressionReader();
        $regex->regularExpression = $this->regularExpression;
        $regex->text = $html;
        foreach ($regex->getData() as $item) {
            $this->addItem($item);
        }

    }


    /**
     * @return WebCrawlerRow[]
     */
    public function getData()
    {
        return parent::getData();
    }


    /**
     * @return WebCrawlerRow
     */
    public function getDataRow()
    {

        $list = $this->getData();

        $data = array();

        if (isset($list[0])) {
            $data = $list[0];
        } else {
            //(new LogMessage())->writeError('Web Crawler:No data found');
        }

        return $data;

    }


    public function addField($fieldName)
    {
        $this->field[] = $fieldName;
    }


    public function addBeforeText($number, $text)
    {
        $this->beforeText[$number] = $text;
        return $this;
    }

    public function addAfterText($number, $text)
    {

    }


    public function removeContent($regularExpression)
    {


    }


}