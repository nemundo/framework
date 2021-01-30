<?php
namespace Nemundo\App\Translation\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TranslationModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Translation\Data\LargeTextTranslation\LargeTextTranslationModel());
$this->addModel(new \Nemundo\App\Translation\Data\Source\SourceModel());
$this->addModel(new \Nemundo\App\Translation\Data\SourceType\SourceTypeModel());
$this->addModel(new \Nemundo\App\Translation\Data\TextTranslation\TextTranslationModel());
}
}