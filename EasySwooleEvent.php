<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/5/28
 * Time: 下午6:33
 */

namespace EasySwoole\EasySwoole;


use App\Crontab\SayHello;
use App\Crontab\SayWorld;
use App\Log\LogHandle;
use App\Utility\ConsoleCommand\Demo;
use EasySwoole\Component\Di;
use EasySwoole\EasySwoole\Console\CommandContainer;
use EasySwoole\EasySwoole\Crontab\Crontab;
use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;

class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        // TODO: Implement initialize() method.
        date_default_timezone_set('Asia/Shanghai');
        
        CommandContainer::getInstance()->set(new Demo()); // 注册自定义 console 命令
        Di::getInstance()->set(SysConst::LOGGER_HANDLER, new LogHandle()); // 注入自定义的 LogHandle
    }

    public static function mainServerCreate(EventRegister $register)
    {
        Config::getInstance()->setDynamicConf('hello', 'world');
        // TODO: Implement mainServerCreate() method.
        Crontab::getInstance()->addTask(SayHello::class); // 添加 crontab 任务
        Crontab::getInstance()->addTask(SayWorld::class);
    }

    public static function onRequest(Request $request, Response $response): bool
    {
        // TODO: Implement onRequest() method.
        return true;
    }

    public static function afterRequest(Request $request, Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}