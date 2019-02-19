<?php
/**
 * Created by PhpStorm.
 * User: rubin
 * Date: 2019-02-17
 * Time: 23:20
 */

namespace App\HttpController;

use EasySwoole\Component\Container;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Spl\SplArray;
use EasySwoole\Spl\SplString;

class Demo extends Controller
{

    function index()
    {
        $this->response()->write("this is a demo");
    }

    function container()
    {
        $container = new Container();
        $container->set("func", function () {
            return "this is a function";
        });

        $container->set("string", "this is a string");

        $this->response()->write(call_user_func($container->get('func')) . "<br />" . $container->get('string'));
    }

    /**
     * 访问地址 http://127.0.0.1:9501/demo/splArray
     */
    public function splArray()
    {
        $splArray = new SplArray();
        $array = [
            'one' => [
                'two' => [
                    'three' => 'aha',
                ]
            ]
        ];
        $splArray->loadArray($array);
        
        
        $three = $splArray->get('one.two.three');
        $this->response()->write($three);  // aha
        
        $this->response()->write('<br />');

        $splArray->set('one.two', 'hello world');
        $this->response()->write(json_encode($splArray)); // {"one":{"two":"hello world"}}
        $this->response()->write($splArray->toXML()); // <xml><one><two>hello world</two></one></xml>
    }

    public function splString()
    {
        $string = new SplString("hello world!");
        var_dump($string->explode(' ')->getArrayCopy()); 
        /*
         * array(2) {
              [0] =>
              string(5) "hello"
              [1] =>
              string(6) "world!"
            }
         */
        var_dump($string->pad(20, '!')->__toString()); // string(20) "hello world!!!!!!!!!"
    }
    
}