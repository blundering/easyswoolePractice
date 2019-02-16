<?php
/**
 * Created by PhpStorm.
 * User: rubin
 * Date: 2019-02-16
 * Time: 10:26
 */

namespace App\Crontab;


use EasySwoole\EasySwoole\Crontab\AbstractCronTask;

class SayHello extends AbstractCronTask
{

    public static function getRule()
    : string
    {
        return '24 * * * *'; // 每个小时的第 xx 分钟       
    }

    public static function getTaskName()
    : string
    {
        return 'say hello';
    }

    static function run(\swoole_server $server, int $taskId, int $fromWorkerId, $flags = null)
    {
        echo "hello";
        var_dump("say hello every minute");
    }
}