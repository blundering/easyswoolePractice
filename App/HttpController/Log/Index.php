<?php
/**
 * Created by PhpStorm.
 * User: rubin
 * Date: 2019-02-16
 * Time: 11:39
 */

namespace App\HttpController\Log;


use EasySwoole\Http\AbstractInterface\Controller;

class Index extends Controller
{

    function index()
    {
        $this->response()->withHeader('Content-Type', 'text/html;charset=utf-8'); // 返回的页面编码
        $this->response()->write("自定义 LOG 测试"); // 返回内容
    }
}