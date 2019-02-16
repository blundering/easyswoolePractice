<?php
/**
 * Created by PhpStorm.
 * User: rubin
 * Date: 2019-02-16
 * Time: 09:46
 */
namespace App\Utility\ConsoleCommand;

use EasySwoole\EasySwoole\Console\CommandInterface;
use EasySwoole\Socket\Bean\Caller;
use EasySwoole\Socket\Bean\Response;

class Demo implements CommandInterface
{

    public function moduleName()
    : string
    {
        return "demo";
        // TODO: Implement moduleName() method.
    }

    public function exec(Caller $caller, Response $response)
    {
        $args = $caller->getArgs();
        $response->setMessage("您调用的命令参数是:" . json_encode($args));
    }

    public function help(Caller $caller, Response $response)
    {
        $help = <<<HELP
用法 : ConsoleDemo [arg ...]

参数: 
    arg
HELP;

        $response->setMessage($help);
    }
}