<?php
require_once __DIR__ .'/vendor/autoload.php';

use Sample\Model\JianYe;
use Sample\Model\AllInfo;

ini_set("display_errors", true);
error_reporting(E_ALL);

$dataArr = json_decode(file_get_contents('data.json'),true);
if (is_array($dataArr)) {
    $dataArr = reset($dataArr);
}
$dataJson = file_get_contents('data.json');
//echo strlen($dataJson);die;

$allInfo = new AllInfo();
$aaArr = [];
foreach ($dataArr as  $v) {
    $jianye = New JianYe();
    $jianye->setDate($v['date']);
    $jianye->setTotalQty($v['totalQty']);
    $jianye->setCurrentQty($v['currentQty']);
    $jianye->setLockQty($v['orderQty']);
    $jianye->setOrderQty($v['lockQty']);
    $jianye->setUseQty($v['useQty']);
    $aaArr[] = $jianye;
}
$allInfo->setInfo($aaArr);

//$rst = $allInfo->getInfo();

$str = $allInfo->serializeToString();
echo strlen($str);

$newAllInfo = new AllInfo();
$newAllInfo->mergeFromString($str);
//var_dump($newAllInfo->getInfo());

$arr = $newAllInfo->getInfo();
foreach ($arr as $j) {
    var_dump($j->getDate());
    die;
}