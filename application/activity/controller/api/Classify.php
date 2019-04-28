<?php
/**
 * Created by PhpStorm.
 * User: qwk
 * Date: 2019/4/22
 * Time: 18:15
 */

namespace app\activity\controller\api;


use library\Controller;
use think\Db;


class Classify extends Controller {
    protected $table = 'way_classify';

    // 获取列表
    public function index() {

    }
    // 点击数自增
    public function addClickNum() {
        $id = input('id')||1;
        Db::name($this->name)->where('id',$id)->setInc('clickNum');
    }
}