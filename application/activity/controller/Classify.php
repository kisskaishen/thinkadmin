<?php
/**
 * Created by PhpStorm.
 * User: qwk
 * Date: 2019/4/22
 * Time: 11:04
 */

namespace app\activity\controller;


use library\Controller;
use think\Db;


class Classify extends Controller
{
    protected $table = 'wap_classify';

    public function index()
    {
        $this->title = '分类列表';
        $where = [];
        $order = 'clickNum desc,id asc';
        $name = input('name');
        if(!empty($name)) {
            $where[]=['name','like','%'.$name.'%'];
        }
        $res = Db::name($this->table)->where($where)->order($order)->select();

        $this->assign('list',$res);
        return $this->fetch();
    }

    public function add() {
        $this->_form($this->table, 'form');
    }
    /**
     * 编辑添加分类
     * @return mixed
     */
    public function edit()
    {
        $this->title = '编辑分类';
        return $this->_form($this->table, 'form');
    }

    public function del()
    {
        $this->_delete($this->table);
    }

//    public function clickNumAdd() {
//
//    }

}