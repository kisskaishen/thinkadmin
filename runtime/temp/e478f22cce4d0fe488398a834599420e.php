<?php /*a:3:{s:82:"/Users/qwk/Desktop/thinkadmin/ThinkAdmin/application/store/view/express/index.html";i:1555927158;s:73:"/Users/qwk/Desktop/thinkadmin/ThinkAdmin/application/admin/view/main.html";i:1554692926;s:89:"/Users/qwk/Desktop/thinkadmin/ThinkAdmin/application/store/view/express/index_search.html";i:1554692926;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon font-s10 color-desc margin-right-5">&#xe65b;</span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><?php if(auth("store/express/add")): ?><button data-modal='<?php echo url("add"); ?>' data-title="添加快递" class='layui-btn layui-btn-sm layui-btn-primary'>添加快递</button><?php endif; if(auth("store/express/del")): ?><button data-action='<?php echo url("del"); ?>' data-rule="id#{key}" class='layui-btn layui-btn-sm layui-btn-primary'>删除快递</button><?php endif; ?></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-fadein"><table class="layui-table" lay-skin="line"><caption class="margin-bottom-10 text-left"><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">快递名称</label><div class="layui-input-inline"><input name="express_title" value="<?php echo htmlentities((app('request')->get('express_title') ?: '')); ?>" placeholder="请输入快递名称" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">快递编码</label><div class="layui-input-inline"><input name="express_code" value="<?php echo htmlentities((app('request')->get('express_code') ?: '')); ?>" placeholder="请输入快递编码" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">使用状态</label><div class="layui-input-inline"><select class="layui-select" name="status"><?php foreach([''=>'- 全部 -','1'=>'使用中的快递','0'=>'已禁用的快递'] as $k=>$v): ?><!--<?php if(app('request')->get('status') == $k.""): ?>--><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><!--<?php else: ?>--><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><!--<?php endif; ?>--><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">添加时间</label><div class="layui-input-inline"><input data-date-range name="create_at" value="<?php echo htmlentities((app('request')->get('create_at') ?: '')); ?>" placeholder="请选择注册时间" class="layui-input"></div></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form></fieldset><script>form.render()</script></caption><!--<?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?>--><thead><tr><th class='list-table-check-td think-checkbox'><input data-auto-none data-check-target='.list-check-box' type='checkbox'></th><th class='list-table-sort-td'><button type="button" data-reload class="layui-btn layui-btn-xs">刷 新</button></th><th class='text-left nowrap'>快递名称</th><th class='text-left nowrap'>快递编码</th><th class="text-center">记录状态</th><th class="text-center">创建时间</th><th></th></tr></thead><!--<?php endif; ?>--><tbody><!--<?php foreach($list as $key=>$vo): ?>--><tr data-dbclick><td class='list-table-check-td think-checkbox'><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'></td><td class='list-table-sort-td'><input data-action-blur="<?php echo request()->url(); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;action#sort;sort#{value}" data-loading="false" value="<?php echo htmlentities($vo['sort']); ?>" class="list-sort-input"></td><td class='text-left nowrap'><?php echo htmlentities((isset($vo['express_title']) && ($vo['express_title'] !== '')?$vo['express_title']:'')); ?></td><td class='text-left nowrap'><?php echo htmlentities((isset($vo['express_code']) && ($vo['express_code'] !== '')?$vo['express_code']:'')); ?></td><td class='text-center nowrap'><?php if($vo['status'] == '0'): ?><span class="layui-badge">已禁用</span><?php else: ?><span class="layui-badge layui-bg-green">使用中</span><?php endif; ?><br></td><td class='text-center nowrap'><?php echo htmlentities(format_datetime($vo['create_at'])); ?></td><td class='text-left nowrap'><?php if(auth("store/express/edit")): ?><a data-dbclick data-title="编辑快递" class="layui-btn layui-btn-xs" data-modal='<?php echo url("edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编 辑</a><?php endif; if($vo['status'] == 1 and auth("store/express/forbid")): ?><a class="layui-btn layui-btn-xs layui-btn-warm" data-action="<?php echo url('forbid'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#0">禁 用</a><?php elseif(auth("store/express/resume")): ?><a class="layui-btn layui-btn-xs layui-btn-warm" data-action="<?php echo url('resume'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#1">启 用</a><?php endif; if(auth("store/express/del")): ?><a class="layui-btn layui-btn-xs layui-btn-danger" data-confirm="确定要删除数据吗?" data-action="<?php echo url('del'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>">删 除</a><?php endif; ?></td></tr><!--<?php endforeach; ?>--></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div>