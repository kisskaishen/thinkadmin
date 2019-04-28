<?php
/**
 * Created by PhpStorm.
 * User: qwk
 * Date: 2019/4/26
 * Time: 11:17
 */

namespace app\api\model;

use app\api\model\baseModel;

class activityModel extends BaseModel
{
    protected $pk = 'id';
    protected $table = 'wap_activity';
}