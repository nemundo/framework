<?php
namespace Nemundo\App\Apache\Application;
use Nemundo\App\Application\Type\AbstractApplication;
class ApacheApplication extends AbstractApplication {
protected function loadApplication() {
$this->application = 'Apache';
$this->applicationId = '7361e6e8-7853-4733-a79b-f4e348ea3225';
}
}