<?php
/**
 * Created by PhpStorm.
 * User: rubin
 * Date: 2019-02-16
 * Time: 11:33
 */

namespace App\Log;


use EasySwoole\Trace\AbstractInterface\LoggerInterface;

class LogHandle implements LoggerInterface
{

    public function log(string $str, $logCategory = null, int $timestamp = null)
    : ?string
    {
        echo "echo 会输出到哪去? [{$logCategory}]{$str}";
        return "自定义日志 log return : [{$logCategory}]{$str}";
    }

    public function console(string $str, $category = null, $saveLog = true)
    : ?string
    {
        echo "echo 会输出到哪去? [{$category}]{$str}";
        return "自定义日志 console return : [{$category}]{$str}";
    }
}