<?php
namespace Services\HelloWorld;

//服务端服务实现代码 需要继承HelloWOrldIf
class HelloWorldHandler implements HelloWorldIf{

    public function sayHello($name)
    {
        // TODO: Implement sayHello() method.
        return "Hello ".$name;
    }
}

