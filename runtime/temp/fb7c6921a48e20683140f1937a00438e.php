<?php /*a:1:{s:85:"/Users/qwk/Desktop/thinkadmin/ThinkAdmin/application/activity/view/classify/form.html";i:1556263434;}*/ ?>
<form onsubmit="return false;" action="<?php echo request()->url(); ?>" data-auto="true" method="post" class='layui-form layui-card'
      autocomplete="off"><div class="layui-card-body"><div class="layui-form-item"><label class="layui-form-label">分类名称</label><div class="layui-input-block"><input name="name" required value='<?php echo htmlentities((isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:"")); ?>' placeholder="请输入分类名称" class="layui-input"></div></div><div class="layui-form-item"><label class="layui-form-label">颜色选择器</label><div class="layui-input-block"><input name="color" required value='<?php echo htmlentities((isset($vo['color']) && ($vo['color'] !== '')?$vo['color']:"")); ?>' placeholder="请输入分类颜色，如##52E5E7,#130CB7"
                       class="layui-input"><a href="https://webkul.github.io/coolhue/" target="_blank">查看事例</a></div></div></div><div class="hr-line-dashed"></div><div class="layui-form-item text-center"><?php if(!(empty($vo['id']) || (($vo['id'] instanceof \think\Collection || $vo['id'] instanceof \think\Paginator ) && $vo['id']->isEmpty()))): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?><button class="layui-btn" type='submit'>保存数据</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button></div><script>window.form.render()</script></form>
