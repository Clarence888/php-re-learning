<?php
namespace Services\HelloWorld;

error_reporting(E_ALL);

define("THRIFT_ROOT", "/root/php-re-learning/rpc/phpAndGoRpcService/lib/php/");
define("ROOT", "/root/php-re-learning/rpc/phpdemo/");
require_once THRIFT_ROOT . 'Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', THRIFT_ROOT);
$loader->registerDefinition('Service', ROOT . 'gen-php');
$loader->register();

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

try {
    //仅在与服务端处于同一输出输出流有用
    //使用方式：php Client.php | php Server.php
    //$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));

    //socket方式连接服务端
    //数据传输格式和数据传输方式与服务端一一对应
    //如果服务端以http方式提供服务，可以使用THttpClient/TCurlClient数据传输方式
    $transport = new TBufferedTransport(new TSocket('localhost', 9999));
    $protocol = new TBinaryProtocol($transport);


    $client = new \Services\HelloWorld\HelloWorldClient($protocol);

    $transport->open();

    //同步方式进行交互
    $recv = $client->sayHello('Courages');
    echo "\n sayHello 同步:".$recv." \n";

    //异步方式进行交互
    $client->send_sayHello('Us');
    echo "\n send_sayHello 异步 \n";

    $recv = $client->recv_sayHello();
    echo "\n recv_sayHello:".$recv." \n";

    $transport->close();
} catch (TException $tx) {
    print 'TException: '.$tx->getMessage()."\n";
}
