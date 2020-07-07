<?php
require_once __DIR__ .'/vendor/autoload.php';

use Sample\Model\JianYe;
use Sample\Model\AllInfo;

ini_set("display_errors", true);
error_reporting(E_ALL);

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}





$dataArr = json_decode(file_get_contents('data.json'),true);
if (is_array($dataArr)) {
    $dataArr = reset($dataArr);
}

$aa = json_encode($dataArr);
echo 12223;die;
/*
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
$str = $allInfo->serializeToString();
echo $str;
file_put_contents('aa.txt',$str);
die;
$aa = json_encode($dataArr);
//echo $aa;

echo "done";
die;
*/

$strem = file_get_contents('aa.txt');
$newAllInfo = new AllInfo();
$newAllInfo->mergeFromString($strem);
//var_dump($newAllInfo);
echo 123;
die;


$time_start = microtime_float();

for ($i = 0;$i<10000;$i++) {
//$newAllInfo = new AllInfo();
//$newAllInfo->mergeFromString($str);
//echo $i."\n";
    $str = $allInfo->serializeToString();
//echo $i."\n";
    //echo strlen($str);
//   $jsonData = json_encode($dataArr);
//   echo $i;



//$d = json_decode(file_get_contents('data.json'),true);

}

$time_end = microtime_float();
$time = $time_end - $time_start;
echo "\n结束:".$time."\n";
die;
$newAllInfo = new AllInfo();
$newAllInfo->mergeFromString($str);
//var_dump($newAllInfo->getInfo());

$arr = $newAllInfo->getInfo();
foreach ($arr as $j) {
    var_dump($j->getDate());
    die;
}