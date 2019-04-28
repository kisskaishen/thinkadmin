<?php
/**
 * Created by PhpStorm.
 * User: qwk
 * Date: 2019/4/26
 * Time: 11:08
 */
namespace app\api\controller;
use think\App;
use \think\Controller;
use app\api\model\ClassifyModel;
use think\Db;

class classify extends Controller
{
    private $classify_model = [];
    public function __construct(App $app = null)
    {
        $this->classify_model = new ClassifyModel();
        parent::__construct($app);
    }

    // 分类列表
    public function index() {
        $where = [];
        $join = [];
        $field = '*';
        $order = 'clickNum desc,id asc';
        $res = $this->classify_model->getList($where,$join,$field,$order);
        return return_info(200,'success',$res);
    }

    // clickNum自增加一
    public function addClickNum() {
        $id = input('id');
        $res = $this->classify_model->where('id',$id)->setInc('clickNum');
        return return_info(200,'+1',$res);
    }
}