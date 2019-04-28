<?php /*a:2:{s:84:"/Users/qwk/Desktop/thinkadmin/ThinkAdmin/application/wechat/view/config/payment.html";i:1554692926;s:73:"/Users/qwk/Desktop/thinkadmin/ThinkAdmin/application/admin/view/main.html";i:1554692926;}*/ ?>
<div class="layui-card"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon font-s10 color-desc margin-right-5">&#xe65b;</span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-fadein"><form onsubmit="return false;" data-auto="true" method="post" class='layui-form layui-card' autocomplete="off" lay-filter="payment"><div class="layui-card-body"><div class="layui-form-item"><label class="layui-form-label">MchId<br><span class="nowrap color-desc">微信商户ID</span></label><div class="layui-input-block"><input name="wechat_mch_id" required placeholder="请输入微信商户ID（必填）" value="<?php echo sysconf('wechat_mch_id'); ?>" class="layui-input"><p class="help-block">微信商户ID，可以在微信商户平台或开通时的邮件中获取到。</p></div></div><div class="layui-form-item"><label class="layui-form-label">MchKey<br><span class="nowrap color-desc">微信商户KEY</span></label><div class="layui-input-block"><input name="wechat_mch_key" placeholder="请输入微信商户密钥（必填）" maxlength="32" required value="<?php echo sysconf('wechat_mch_key'); ?>" class="layui-input"><p class="help-block">微信商户密钥，需要在微信商户平台操作设置密码并获取。</p></div></div><div class="hr-line-dashed"></div><div class="layui-form-item"><label class="layui-form-label">MchCert<br><span class="nowrap color-desc">微信商户证书</span></label><div class="layui-input-block"><?php foreach(['p12'=>'上传 P12 证书','pem'=>'上传 PEM 证书'] as $k=>$v): ?><input type="radio" data-pem-type="<?php echo htmlentities($k); ?>" name="wechat_mch_ssl_type" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-filter="data-mch-type"><?php endforeach; ?><p class="help-block">请选择需要上传证书类型，P12 和 PEM 二选一，证书需要从微信商户平台获取！</p><div data-mch-type="p12" class="layui-tab-item padding-top-15 padding-bottom-15"><input name="wechat_mch_ssl_p12" value="<?php echo htmlentities((isset($wechat_mch_ssl_p12) && ($wechat_mch_ssl_p12 !== '')?$wechat_mch_ssl_p12:'')); ?>" type="hidden"><button data-file="btn" data-uptype="local" data-safe="true" data-type="p12" data-field="wechat_mch_ssl_p12" type="button" class="layui-btn layui-btn-primary"><i class="layui-icon layui-icon-vercode font-s14"></i> 上传 P12 证书
                    </button><p class="help-block margin-top-10">微信商户支付 P12 证书，实现订单退款、打款、发红包等支出功能都使用证书。</p></div><div data-mch-type="pem" class="layui-tab-item padding-top-15 padding-bottom-15"><input name="wechat_mch_ssl_key" value="<?php echo htmlentities((isset($wechat_mch_ssl_key) && ($wechat_mch_ssl_key !== '')?$wechat_mch_ssl_key:'')); ?>" type="hidden"><button data-file="btn" data-uptype="local" data-safe="true" data-type="pem" data-field="wechat_mch_ssl_key" type="button" class="layui-btn layui-btn-primary margin-right-5"><i class="layui-icon layui-icon-vercode font-s14"></i> 上传 KEY 证书
                    </button><input name="wechat_mch_ssl_cer" value="<?php echo htmlentities((isset($wechat_mch_ssl_cer) && ($wechat_mch_ssl_cer !== '')?$wechat_mch_ssl_cer:'')); ?>" type="hidden"><button data-file="btn" data-uptype="local" data-safe="true" data-type="pem" data-field="wechat_mch_ssl_cer" type="button" class="layui-btn layui-btn-primary"><i class="layui-icon layui-icon-vercode font-s14"></i> 上传CERT证书
                    </button><p class="help-block margin-top-10">微信商户支付 PEM 双向证书，实现订单退款、打款、发红包等支出功能都使用证书。</p></div></div></div><div class="hr-line-dashed"></div><div class="layui-form-item"><label class="layui-form-label"></label><div class="layui-input-block text-center" style="max-width:300px"><button class="layui-btn" type="submit">保存配置</button></div></div></div></form></div><script>
    (function () {
        form.render();
        this.type = "<?php echo sysconf('wechat_mch_ssl_type'); ?>" || 'p12';
        form.val('payment', {wechat_mch_ssl_type: this.type});
        form.on('radio(data-mch-type)', function (data) {
            apply(data.value);
        });
        apply.call(this, this.type);

        function apply(type) {
            $('[data-mch-type="' + type + '"]').show().siblings('[data-mch-type]').hide();
        };
        // 证书文件上传控制
        this.types = ['wechat_mch_ssl_p12', 'wechat_mch_ssl_key', 'wechat_mch_ssl_cer'];
        for (var i in this.types) $('input[name="' + this.types[i] + '"]').on('change', function () {
            var input = this, $button = $(this).next('button');
            setTimeout(function () {
                if (typeof input.value === 'string' && input.value.length > 5) {
                    $button.find('i').addClass('color-green layui-icon-vercode').removeClass('layui-icon-upload-drag');
                } else {
                    $button.find('i').removeClass('color-green layui-icon-vercode').addClass('layui-icon-upload-drag');
                }
            }, 300);
        }).trigger('change');
    })({});
</script></div>