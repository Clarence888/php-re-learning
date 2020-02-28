<?php

namespace Services\HelloWorld;

error_reporting(E_ALL);


define("THRIFT_ROOT", "/root/php-re-learning/rpc/phpAndGoRpcService/lib/php/");
define("ROOT", "/root/php-re-learning/rpc/phpdemo/");

require_once THRIFT_ROOT . "Thrift/ClassLoader/ThriftClassLoader.php";

use Thrift\ClassLoader\ThriftClassLoader;

$loader = new ThriftClassLoader();
$loader->registerNamespace("Thrift",THRIFT_ROOT);
$loader->registerDefinition('Service',ROOT  . "gen-php");
$loader->register();

use Thrift\Exception\TException;
use Thrift\Factory\TTransportFactory;
use Thrift\Factory\TBinaryProtocolFactory;

use Thrift\Server\TServerSocket;
use Thrift\Server\TSimpleServer;

try {
    require_once ROOT . 'HelloWorldHandler.php';
    //初始化服务提供者handler
    $handler = new \Services\HelloWorld\HelloWorldHandler();

    //利用该handler初始化自动生成的processor
    $processor = new \Services\HelloWorld\HelloWorldProcessor($handler);


    //初始化数据传输方式transport
    $transportFactory = new TTransportFactory();

    //利用该传输方式初始化数据传输格式protocol
    $protocolFactory = new TBinaryProtocolFactory(true, true);

    //服务开始
    //作为cli方式运行，监听端口，官方实现
    $transport = new TServerSocket('localhost', 9999);
    $server = new TSimpleServer($processor, $transport, $transportFactory, $transportFactory, $protocolFactory, $protocolFactory);
    $server->serve();
} catch (TException $tx) {
    print 'TException: '.$tx->getMessage()."\n";
}

