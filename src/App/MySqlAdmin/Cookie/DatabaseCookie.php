<?php


namespace Nemundo\App\MySqlAdmin\Cookie;


use Nemundo\Core\Http\Cookie\AbstractCookie;

class DatabaseCookie extends AbstractCookie
{
    protected function loadCookie()
    {
        $this->cookieName='mysqladmin_database';
    }
}