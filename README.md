# Nemundo Framework

### Installation
```
composer require nemundo/framework
```

### Project Intallation
```
php -r "require __DIR__.'/vendor/autoload.php';(new \Nemundo\Dev\ProjectBuilder\ProjectBuilderScript())->createProject();"
```

### Add Autoloader (composer.json)
```
  "autoload": {
    "psr-4": {
      "ProjectNamespace\\": "src/"
    }
  }
```

###Run Composer Update
```
composer update
```



### Standalone Admin Installation
```
php -r "require __DIR__.'/vendor/autoload.php';(new \Nemundo\Admin\Install\AdminPackageInstall(getcwd() . DIRECTORY_SEPARATOR))->install();"
```

### Config File erstellen
```
bin/setup.php
```

### Dependency

Mail
```
composer require swiftmailer/swiftmailer
```

Rss Reader
```
composer require laminas/laminas-http
composer require laminas/laminas-feed
```

Excel
```
composer require phpoffice/phpspreadsheet
```

Mobile Detection
```
composer require mobiledetect/mobiledetectlib
```

SSH
```
composer require phpseclib/phpseclib
```


### Admin User erstellen
```
php bin\cmd.php admin-user-enable
```

### Password Reset
```
php bin\cmd.php user-password-reset
```

### Submodule Installation
```
git submodule add https://github.com/nemundo/framework.git lib/framework
php lib\framework\install\project-install.php

php lib\framework\install\config-install.php


```


### config.php (Dev)

```
<?php

require __DIR__ . '/lib/framework/autoload/autoload.php';
require 'vendor/autoload.php';

$autoload = new Autoloader();

$lib = new Library($autoload);
$lib->source = __DIR__ . '/lib/framework/src/';
$lib->namespace = 'Nemundo';

\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;

$config = new \Nemundo\Project\Config\ProjectConfigReader();
$config->filename = __DIR__ . '/config.ini';
$config->readFile();
```


###Submodule Deinstallation
```
git submodule deinit lib/framework
git rm lib/framework
```



### Scheduler Installation

Folgender Befehl muss als Cronjob eingerichtet werden. 
```
php bin/cmd.php scheduler-check
```


```
cronjob -e
* * * * * php /srv/web/[project]/bin/cmd.php scheduler-check > /srv/web/[project]/log/scheduler-check.log 2>&1
```


### Admin Setup
```
php bin/cmd.php admin-setup
```



### Cache Path
Im config.ini muss der Pfad definiert werden.
```
cache_path=
```


### Config Setup with Argument
```
php -r "require __DIR__.'/vendor/autoload.php';(new \Nemundo\Project\Config\ProjectConfigArgumentBuilder())->createConfig();"
(new \Nemundo\Project\Config\ProjectConfigArgumentBuilder())->createConfig('/srv/web/project/', 'localhost', 3306, 'root', 'password', 'db1');
```







