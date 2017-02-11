<?php
namespace Boilerplate\Controllers;


use Closure;

class BaseController
{
    /**
     * @param Closure $func
     * @param array $params
     * @return array
     */
    protected function measure(Closure $func, array $params = [])
    {
        $start = microtime(true);
        $result = call_user_func($func, $params);
        $end = microtime(true);
        return [
            'time' => number_format((float)($end - $start), 4, '.', ''),
            'result' => $result
        ];
    }

}

