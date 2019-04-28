<?php
/**
 * Created by PhpStorm.
 * User: qwk
 * Date: 2019/4/21
 * Time: 13:47
 */
namespace app\activity\controller;

use library\Controller;
use think\Db;


class Index extends Controller
{
    protected $table = 'wap_activity';

    public function index() {
        $this->title = '活动列表';

        $where = [];
        $order = 'id asc';
        $name = input('name');
        if(!empty($name)) {
            $where[]=['name','like','%'.$name.'%'];
        }
        $res = Db::name($this->table)->where($where)->order($order)->select();

        $this->assign('list',$res);
        return $this->fetch();
    }
    public function add() {
        $this->title='添加活动';
        return $this->_form($this->table, 'form');
    }

    public function edit()
    {
        $this->title = '编辑活动';
        return $this->_form($this->table, 'form');
    }

    public function del()
    {
        $this->_delete($this->table);
    }

    protected function _form_filter()
    {
        $classify = Db::name('wap_classify')->select();
        $this->assign('classifyArr',$classify);
        return $this->fetch('form');
    }
}