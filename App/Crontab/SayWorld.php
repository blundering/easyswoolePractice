<?php
/**
 * Created by PhpStorm.
 * User: rubin
 * Date: 2019-02-16
 * Time: 10:29
 */

namespace App\Crontab;


use EasySwoole\EasySwoole\Crontab\AbstractCronTask;

class SayWorld extends AbstractCronTask
{

    public static function getRule()
    : string
    {
        return '*/2 * * * *'; // 每两分钟
    }

    public static function getTaskName()
    : string
    {
        return 'say world';
    }

    static function run(\swoole_server $server, int $taskId, int $fromWorkerId, $flags = null)
    {
        echo 'world';
        var_dump('say world every two minutes');
    }
}