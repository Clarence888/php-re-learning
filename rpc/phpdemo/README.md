Apache Thrift是一个跨语言的服务部署框架，通过一个中间语言(IDL, 接口定义语言)来定义RPC的接口和数据类型，
然后通过一个编译器生成不同语言的代码（支持C++，Java，Python，PHP, GO，Javascript，Ruby，Erlang，Perl， Haskell， C#等）,
并由生成的代码负责RPC协议层和传输层的实现。

php类库 https://github.com/apache/thrift/tree/master/lib/php/lib
 


数据传输格式（protocol）



数据传输方式（transport）


服务模型

工厂，以便在Server模式下对数据传输格式和传输方式进行绑定



thrift --gen php:server HelloWorld.thrift（不指明:server不生成processor）




服务端编写的一般步骤：

1. 创建Handler

2. 基于Handler创建Processor

3. 创建Transport（通信方式）

4. 创建Protocol方式（设定传输格式）

5. 基于Processor, Transport和Protocol创建Server

6. 运行Server


 

客户端编写的一般步骤：

1. 创建Transport

2. 创建Protocol方式

3. 基于Transport和Protocol创建Client

4. 运行Client的方法


注意服务端监听端口 0.0.0.0 : 9111

注意vps可能需要防火墙加入允许访问接口。
