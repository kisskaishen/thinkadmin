<?php
/**
 * Created by PhpStorm.
 * User: qwk
 * Date: 2019/4/26
 * Time: 11:29
 */

// 输出json
function return_info($code = '300', $message = '信息错误', $data = null)
{
    $arr['code'] = $code;
    $arr['message'] = $message;
    if ($data !== null) {
        $arr['data'] = $data;
    }
    return $arr;
}
