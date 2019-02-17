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
}