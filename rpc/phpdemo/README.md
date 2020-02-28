Apache Thrift是一个跨语言的服务部署框架，通过一个中间语言(IDL, 接口定义语言)来定义RPC的接口和数据类型，
然后通过一个编译器生成不同语言的代码（支持C++，Java，Python，PHP, GO，Javascript，Ruby，Erlang，Perl， Haskell， C#等）,
并由生成的代码负责RPC协议层和传输层的实现。

php类库 https://github.com/apache/thrift/tree/master/lib/php/lib
 


数据传输格式（protocol）



数据传输方式（transport）


服务模型

工厂，以便在Server模式下对数据传输格式和传输方式进行绑定


