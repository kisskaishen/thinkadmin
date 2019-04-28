<?php /*a:2:{s:79:"/Users/qwk/Desktop/thinkadmin/ThinkAdmin/application/store/view/goods/form.html";i:1554692926;s:73:"/Users/qwk/Desktop/thinkadmin/ThinkAdmin/application/admin/view/main.html";i:1554692926;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon font-s10 color-desc margin-right-5">&#xe65b;</span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-fadein"><form onsubmit="return false;" id="GoodsForm" data-auto="true" method="post" class='layui-form layui-card' autocomplete="off"><div class="layui-card-body padding-left-40"><div class="layui-form-item block relative"><h3 class="color-green"><sup class='color-red font-s14 absolute' style="margin-left:-10px">*</sup>商品分类</h3><select class="layui-select" name="cate_id" lay-search><?php foreach($cates as $cate): if(isset($vo['cate_id']) and $vo['cate_id'] == $cate['id']): ?><option selected value="<?php echo htmlentities($cate['id']); ?>"><?php echo htmlentities((isset($cate['title']) && ($cate['title'] !== '')?$cate['title']:'')); ?></option><?php else: ?><option value="<?php echo htmlentities($cate['id']); ?>"><?php echo htmlentities((isset($cate['title']) && ($cate['title'] !== '')?$cate['title']:'')); ?></option><?php endif; ?><?php endforeach; ?></select></div><div class="layui-form-item block relative"><h3 class="color-green"><sup class='color-red font-s14 absolute' style="margin-left:-10px">*</sup>商品名称</h3><input name="title" required class="layui-input" placeholder="请输入商品名称" value="<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:'')); ?>"></div><div class="layui-form-item"><h3 class="color-green"><sup class='color-red font-s14 absolute' style="margin-left:-10px">*</sup>商品图片</h3><table class="layui-table"><thead><tr><th class="text-center">LOGO</th><th class="text-left">商品图片</th></tr><tr><td width="90px" class="text-center"><input name="logo" type="hidden" value="<?php echo htmlentities((isset($vo['logo']) && ($vo['logo'] !== '')?$vo['logo']:'')); ?>"></td><td width="auto" class="text-left"><input name="image" type="hidden" value="<?php echo htmlentities((isset($vo['image']) && ($vo['image'] !== '')?$vo['image']:'')); ?>"></td></tr></thead></table><script>$('[name="logo"]').uploadOneImage(), $('[name="image"]').uploadMultipleImage()</script></div><fieldset class="margin-bottom-15"><legend>快递运费及分成比例</legend><div><div class="layui-form-item block relative"><div class="inline-block"><div class="layui-unselect layui-form-radio"><label>快递运费 <input onblur="this.value=(parseFloat(this.value)||0).toFixed(2)" name="price_express" value="<?php echo htmlentities((isset($vo['price_express']) && ($vo['price_express'] !== '')?$vo['price_express']:'0.00')); ?>" class="inline-block text-center font-s12 inner-input"> 元，</label><label>分成比例 <input onblur="this.value=(parseFloat(this.value)||0).toFixed(4)" name="price_rate" value="<?php echo htmlentities((isset($vo['price_rate']) && ($vo['price_rate'] !== '')?$vo['price_rate']:'0.00')); ?>" class="inline-block text-center font-s12 inner-input"> %；</label></div></div></div></div></fieldset><div class="layui-form-item"><h3 class="color-green"><sup class='color-red font-s14 absolute' style="margin-left:-10px">*</sup>
                商品规格<span class="color-desc font-s10">（最多支持3个规格分组，每个分组最多支持5个规格属性；仅添加商品时可编辑内容）</span></h3><div ng-repeat="x in specs track by $index" style="display:none" class="margin-bottom-10" ng-class="{true:'layui-show'}[isAddMode&&specs.length>0]"><div class="goods-spec-box padding-10 margin-0 relative" style="background:#ddd"><span class="text-center goods-spec-title">名称</span><input ng-model="x.name" required placeholder="请输入分组"><div class="fa-pull-right"><a class="layui-btn layui-btn-sm layui-btn-primary goods-spec-btn" ng-class="{false:'layui-bg-gray'}[$index>0]" ng-click="upSpecRow(specs,$index)">上移</a><a class="layui-btn layui-btn-sm layui-btn-primary goods-spec-btn" ng-class="{false:'layui-bg-gray'}[$index<specs.length-1]" ng-click="dnSpecRow(specs,$index)">下移</a><a ng-if="specs.length>1" class="layui-btn layui-btn-sm layui-btn-primary goods-spec-btn" ng-click="delSpecRow(specs,$index)">删除</a></div></div><div class="block padding-10 layui-bg-gray" ng-if="x.list && x.list.length > 0"><label class="goods-spec-box inline-block nowrap margin-bottom-0" ng-repeat="xx in x.list"><input type="checkbox" lay-ignore ng-model="xx.check" ng-click="xx.check=checkListChecked(x.list,$event.target.checked)"><input type="text" ng-model="xx.name" ng-keyup="xx.name=$event.target.value" required placeholder="请输入规格"><a ng-if="x.list.length>1" ng-click="x.list=delSpecVal(x.list,$index)" class="layui-icon layui-icon-close font-s12 goods-spec-close"></a></label><a class="layui-btn layui-btn-sm layui-btn-primary goods-spec-btn" ng-if="x.list.length<5" ng-click="addSpecVal(x.list)">增加</a></div></div><a ng-if="isAddMode&&specs.length<3" class="layui-btn layui-btn-sm layui-btn-primary" ng-click="addSpecRow(specs)">增加分组</a><table class="layui-table margin-top-10"><thead><tr><th ng-repeat="x in specsTreeNava track by $index" class="nowrap" ng-bind="x"></th><th width="10%" class="text-center nowrap">市场价格 <a ng-click="batchSet('market',2)" data-tips-text="批量设置" class="layui-icon">&#xe63c;</a></th><th width="10%" class="text-center nowrap">销售价格 <a ng-click="batchSet('selling',2)" data-tips-text="批量设置" class="layui-icon">&#xe63c;</a></th><th width="10%" class="text-center nowrap">虚拟销量 <a ng-click="batchSet('virtual',0)" data-tips-text="批量设置" class="layui-icon">&#xe63c;</a></th><th width="10%" class="text-center nowrap">销售状态</th></tr></thead><tbody><tr ng-repeat="rows in specsTreeData track by $index"><td class="layui-bg-gray" ng-if="td.show" rowspan="{{td.span}}" ng-repeat="td in rows" ng-bind="td.name"></td><td class="padding-0"><label class="padding-0 margin-0"><input ng-blur="rows[0].market=setValue(rows[0].key,'market',$event.target.value,'(parseFloat(_)||0).toFixed(2)')" class="layui-input border-0 padding-left-0 text-center" ng-model="rows[0].market"></label></td><td class="padding-0"><label class="padding-0 margin-0"><input ng-blur="rows[0].selling=setValue(rows[0].key,'selling',$event.target.value,'(parseFloat(_)||0).toFixed(2)')" class="layui-input border-0 padding-left-0 text-center" ng-model="rows[0].selling"></label></td><td class="padding-0"><label class="padding-0 margin-0"><input ng-blur="rows[0].virtual=setValue(rows[0].key,'virtual',$event.target.value,'(parseInt(_)||0)')" class="layui-input border-0 padding-left-0 text-center" ng-model="rows[0].virtual"></label></td><td class="text-center layui-bg-gray"><label class="think-checkbox margin-0 full-width full-height block"><input lay-ignore type="checkbox" ng-model="rows[0].status"></label></td></tr></tbody></table><textarea class="layui-textarea layui-hide" name="specs">{{specs}}</textarea><textarea class="layui-textarea layui-hide" name="lists">{{specsTreeData}}</textarea></div><div class="layui-form-item block"><h3 class="color-green"><sup class='color-red font-s14 absolute' style="margin-left:-10px">*</sup>商品内容</h3><textarea name="content"><?php echo (isset($vo['content']) && ($vo['content'] !== '')?$vo['content']:''); ?></textarea></div><div class="layui-form-item text-center"><?php if(!(empty($vo['id']) || (($vo['id'] instanceof \think\Collection || $vo['id'] instanceof \think\Paginator ) && $vo['id']->isEmpty()))): ?><input type="hidden" name="id" value="<?php echo htmlentities($vo['id']); ?>"><?php endif; ?><button class="layui-btn layui-btn-danger" ng-click="hsitoryBack()" type="button">取消编辑</button><button class="layui-btn" type="submit">保存商品</button></div></div></form><style>    .inner-input {
        width: 80px;
        height: 14px;
        padding: 1px 5px;
        line-height: 12px;
    }

    .goods-spec-box {
        position: relative;
        margin: 0 10px 10px 0;
        vertical-align: middle;
    }

    .goods-spec-title {
        z-index: 2;
        width: 40px;
        color: #fff;
        height: 28px;
        position: absolute;
        background: #999;
        line-height: 28px;
    }

    .goods-spec-close {
        right: 8px;
        z-index: 2;
        line-height: 28px;
        position: absolute;
        display: inline-block
    }

    .goods-spec-btn {
        height: 28px;
        margin-left: 5px !important;
        line-height: 26px !important;
    }

    .goods-spec-box input {
        z-index: 1;
        width: 120px;
        position: relative;
        border: 1px solid #999;
        padding: 5px 0 5px 45px;
        display: inline-block !important;
    }

    .goods-spec-box input[type=checkbox] {
        z-index: 2;
        width: 40px;
        height: 28px;
        border: none;
        cursor: pointer;
        appearance: none;
        position: absolute;
        -webkit-appearance: none;
    }

    .goods-spec-box input[type=checkbox]:before {
        top: 1px;
        left: 1px;
        width: 40px;
        height: 26px;
        content: ' ';
        position: absolute;
        background: #c9c9c9;
    }

    .goods-spec-box input[type=checkbox]:after {
        top: 1px;
        left: 1px;
        color: #999;
        width: 40px;
        height: 26px;
        content: '\e63f';
        font-size: 16px;
        line-height: 26px;
        position: absolute;
        text-align: center;
        font-family: 'layui-icon';
    }

    .goods-spec-box input[type=checkbox]:checked:after {
        color: #333;
        content: '\e605';
    }
</style></div><script>
    window.form.render();
    require(['ckeditor', 'angular'], function () {
        window.createEditor('[name="content"]', {height: 500});
        let app = angular.module("GoodsForm", []).run(callback);
        angular.bootstrap(document.getElementById(app.name), [app.name]);

        function callback($rootScope) {
            $rootScope.isAddMode = parseInt('<?php echo htmlentities((isset($isAddMode) && ($isAddMode !== '')?$isAddMode:0)); ?>');
            let defaultValues = angular.fromJson('<?php echo (isset($defaultValues) && ($defaultValues !== '')?$defaultValues:0); ?>') || {};
            $rootScope.specs = angular.fromJson('<?php echo (isset($vo['specs']) && ($vo['specs'] !== '')?$vo['specs']:0); ?>') || [{name: '默认分组', list: [{name: '默认规格', check: true}]}];
            // 批量设置数值
            $rootScope.batchSet = function (type, fixed) {
                layer.prompt({title: '请输入数值', formType: 0}, function (value, index) {
                    $rootScope.$apply(function () {
                        var val = (parseFloat(value) || 0).toFixed(fixed);
                        for (var i in $rootScope.specsTreeData) for (var j in $rootScope.specsTreeData[i]) {
                            $rootScope.specsTreeData[i][j][type] = val;
                        }
                    });
                    layer.close(index);
                });
            };
            // 返回商品列表
            $rootScope.hsitoryBack = function () {
                $.msg.confirm('确定要取消编辑吗？', function (index) {
                    history.back(), $.msg.close(index);
                });
            };
            // 设置默认值
            $rootScope.setValue = function (key, type, value, call) {
                defaultValues[key] || (defaultValues[key] = {});
                return defaultValues[key][type] = eval(call.replace('_', "'" + value + "'"));
            };
            // 读取默认值
            let getValue = function (key, callback) {
                if (typeof callback === 'function') return callback(defaultValues[key] || {});
            };
            // 生成交叉表格数据
            $rootScope.specsTreeData = [];
            $rootScope.specsTreeNava = [];
            // 当前商品规格发生变化时重新计算规格列表
            $rootScope.$watch('specs', function () {
                let list = [], nava = [], table = [[]];
                let data = angular.fromJson(angular.toJson($rootScope.specs));
                // 过滤无效记录
                for (let o of data) {
                    let tmp = [];
                    for (let x of o.list) (x.check && typeof x.name === 'string' && x.name.length > 0) && tmp.push(x);
                    if (tmp.length > 0) for (let x of tmp) x.group = o.name, x.span = 1, x.show = true;
                    if (tmp.length > 0) list.push(tmp), nava.push(o.name);
                    $rootScope.specsTreeNava = nava;
                }
                // 表格交叉
                for (let i in list) {
                    let temp = [];
                    for (let j in table) for (let k in list[i]) temp.push(table[j].concat(list[i][k]));
                    table = temp;
                }
                // 表格合并
                list = angular.fromJson(angular.toJson(table));
                for (let row in list) {
                    let key = [], _key = '';
                    for (let td in list[row]) key.push(list[row][td].group + '::' + list[row][td].name);
                    for (let td in list[row]) {
                        if (_key.length === 0) {
                            list[row][0].key = _key = key.join(';;');
                            list[row][0].virtual = getValue(_key, function (data) {
                                return data.virtual || '0';
                            });
                            list[row][0].market = getValue(_key, function (data) {
                                return data.market || '0.00';
                            });
                            list[row][0].selling = getValue(_key, function (data) {
                                return data.selling || '0.00';
                            });
                            list[row][0].status = getValue(_key, function (data) {
                                return !!(typeof data.status !== 'undefined' ? data.status : true);
                            });
                        }
                        // 表格TD处理
                        for (let dow = 1 + parseInt(row); dow < list.length; dow++)
                            if (list[row][td].name === list[dow][td].name) {
                                list[row][td].span++;
                                list[dow][td].show = false;
                            } else break;
                    }
                }
                $rootScope.specsTreeData = list;
            }, true);
            // 判断规则是否能取消选择
            $rootScope.checkListChecked = function (list, check) {
                for (let o of  list) if (o.check) return check;
                return true;
            };
            // 增加整行规格分组
            $rootScope.addSpecRow = function (data) {
                data.push({name: '规格分组', list: [{name: '规格属性', check: true}]})
            };
            // 下移整行规格分组
            $rootScope.dnSpecRow = function (data, $index) {
                let tmp = [], cur = data[$index];
                if ($index > data.length - 2) return false;
                for (let i in data) {
                    (parseInt(i) !== parseInt($index)) && tmp.push(data[i]);
                    (parseInt(i) === parseInt($index) + 1) && tmp.push(cur);
                }
                return $rootScope.specs = tmp;
            };
            // 上移整行规格分组
            $rootScope.upSpecRow = function (data, $index) {
                let tmp = [], cur = data[$index];
                if ($index < 1) return false;
                for (let i in data) {
                    (parseInt(i) === parseInt($index) - 1) && tmp.push(cur);
                    (parseInt(i) !== parseInt($index)) && tmp.push(data[i]);
                }
                return $rootScope.specs = tmp;
            };
            // 移除整行规格分组
            $rootScope.delSpecRow = function (data, $index) {
                let tmp = [];
                for (let i in data) if (parseInt(i) !== parseInt($index)) tmp.push(data[i]);
                return $rootScope.specs = tmp;
            };
            // 增加分组的属性
            $rootScope.addSpecVal = function (list) {
                list.push({name: '规格属性', check: true});
            };
            // 移除分组的属性
            $rootScope.delSpecVal = function (data, $index) {
                let temp = [];
                for (let i in data) if (parseInt(i) !== parseInt($index)) temp.push(data[i]);
                return temp;
            };
        }
    })
</script></div>