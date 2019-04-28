<?php

// +----------------------------------------------------------------------
// | framework
// +----------------------------------------------------------------------
// | 版权所有 2014~2018 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: http://framework.thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zoujingli/framework
// +----------------------------------------------------------------------

namespace app\store\controller;

use library\Controller;
use think\Db;

/**
 * 快递公司管理
 * Class Express
 * @package app\store\controller
 */
class Express extends Controller
{
    /**
     * 指定数据表
     * @var string
     */
    protected $table = 'StoreExpress';

    /**
     * 快递公司管理
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        $this->title = '快递公司管理';
        $this->_query($this->table)->equal('status')->like('express_title,express_code')->dateBetween('create_at')->order('status desc,sort asc,id desc')->page();
    }

    /**
     * 添加快递公司
     */
    public function add()
    {
        $this->_form($this->table, 'form');
    }

    /**
     * 编辑快递公司
     */
    public function edit()
    {
        $this->_form($this->table, 'form');
    }

    /**
     * 表单数据处理
     * @param array $data
     */
    protected function _form_filter(array $data)
    {
        if ($this->request->isPost()) {
            $where = [['express_code', 'eq', $data['express_code']], ['is_deleted', 'eq', '0']];
            if (!empty($data['id'])) $where[] = ['id ', 'neq', $data['id']];
            if (Db::name($this->table)->where($where)->count() > 0) {
                $this->error('该快递编码已经存在，请使用其它编码！');
            }
        }
    }

    /**
     * 禁用快递公司
     */
    public function forbid()
    {
        $this->_save($this->table, ['status' => '0']);
    }

    /**
     * 启用快递公司
     */
    public function resume()
    {
        $this->_save($this->table, ['status' => '1']);
    }

    /**
     * 删除快递公司
     */
    public function del()
    {
        $this->_delete($this->table);
    }

}