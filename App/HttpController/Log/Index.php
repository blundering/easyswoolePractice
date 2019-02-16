<?php
/**
 * Created by PhpStorm.
 * User: rubin
 * Date: 2019-02-16
 * Time: 11:39
 */

namespace App\HttpController\Log;


use EasySwoole\EasySwoole\Logger;
use EasySwoole\Http\AbstractInterface\Controller;

class Index extends Controller
{

    function index()
    {
        Logger::getInstance()->log('自定义日志的 log 方法', 'notice'); // 将输出到 Log\notice-YYYY-MM.log 文件中
        Logger::getInstance()->console('自定义日志的 console 方法', 'category', false); // 输出到控制台
        
        $this->response()->withHeader('Content-Type', 'text/html;charset=utf-8'); // 返回的页面编码
        $this->response()->write("自定义 LOG 测试"); // 返回内容
    }
}