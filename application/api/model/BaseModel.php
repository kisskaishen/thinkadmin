<?php
/**
 * Created by PhpStorm.
 * User: qwk
 * Date: 2019/4/26
 * Time: 11:15
 */
namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    // 获取列表
    public function getList($where=[],$join=[],$field='*',$order='',$limit='') {
        $res_list = $this->alias('a')->where($where)->join($join)->field($field)->order($order)->limit($limit)->select()->toArray();
        return $res_list;
    }
    // 获取单条数据
    public function getInfo($where = [], $join = [], $field = '*')
    {
        $res = $this->alias('a')->where($where)->join($join)->field($field)->find();
        return $res;
    }
    // 添加数据获取其id值
    public function addGetId($data)
    {
        $res = $this->insertGetId($data);
        return $res;
    }
    // 添加一条数据
    public function insertData($data)
    {
        $res = $this->insert($data);
        return $res;
    }
    // 添加多条数据
    public function insertAllData($arr)
    {
        $res = $this->insertAll($arr);
        return $res;
    }
    // 删除数据
    public function deleteData($where)
    {
        $res = $this->where($where)->delete();
        return $res;
    }
}