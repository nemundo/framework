<?php

require '../config.php';

$login = 'user10';

$userBuilder = new \Nemundo\User\Builder\UserBuilderNew();
$userBuilder->login =$login;
$userId = $userBuilder->createUser();

(new \Nemundo\Core\Debug\Debug())->write('UserId: '.$userId);

$userType = new \Nemundo\User\Builder\UserTypeNew($userId);
$userType->changePassword($login);
$userType->addAllUsergroup();
