<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>修改友情链接</title><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/blog/Template/default/Home/Public/css/index.css">    <link rel="stylesheet" href="/blog/Public/static/iCheck-1.0.2/skins/all.css"></head><body><form class="form-group" action="<?php echo U('Admin/Link/edit');?>" method="post"> <input type="hidden" name="lid" value="<?php echo ($data['lid']); ?>"><table class="table table-bordered table-striped table-hover table-condensed"><tr><th>链接名</th><td> <input class="form-control modal-sm" type="text" name="lname" value="<?php echo ($data['lname']); ?>"></td></tr><tr><th>链接地址</th><td> <input class="form-control modal-sm" type="text" name="url" value="<?php echo ($data['url']); ?>"></td></tr><tr><th>排序</th><td> <input class="form-control modal-sm" type="text" name="sort" value="<?php echo ($data['sort']); ?>"></td></tr><tr><th>是否显示</th><td> <span class="inputword">是</span> <input class="icheck" type="radio" name="is_show" value="1" <?php if($data['is_show'] == 1): ?>checked='checked'<?php endif; ?> > &emsp; <span class="inputword">否</span> <input class="icheck" type="radio" name="is_show" value="0" <?php if($data['is_show'] == 0): ?>checked='checked'<?php endif; ?> ></td></tr><tr><th></th><td> <input class="btn btn-success" type="submit" value="修改"></td></tr></table></form><script src="/blog/Public/static/js/jquery-2.0.0.min.js"></script>
<script>
    logoutUrl="<?php echo U('Home/User/logout');?>";
</script>
<script src="/blog/Public/static/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/blog/Public/static/js/html5shiv.min.js"></script>
<script src="/blog/Public/static/js/respond.min.js"></script>
<![endif]-->
<script src="/blog/Public/static/pace/pace.min.js"></script>
<script src="/blog/Template/default/Home/Public/js/index.js"></script>
<!-- 百度页面自动提交开始 -->
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<!-- 百度页面自动提交结束 -->

<!-- 百度统计开始 -->

<!-- 百度统计结束 --><icheckjs/></body></html>