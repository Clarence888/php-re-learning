<?php
require_once __DIR__ .'/vendor/autoload.php';

use Sample\Model\User;
use Sample\Model\UserList;

ini_set("display_errors", true);
error_reporting(E_ALL);
$user = new User();
$user->setId(1)->setName("test");
$userList = new UserList();
$userList->setPage(1)->setLimit(5)->setList([$user]);

print_r($userList);
var_dump($userList->getPage());
print_r($userList->getList());

foreach ($userList->getList() as $key => $obj) {
    print_r($obj);
    echo $obj->getId() .PHP_EOL;
}