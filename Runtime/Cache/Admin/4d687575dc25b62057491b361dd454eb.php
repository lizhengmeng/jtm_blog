<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>添加管理员</title><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/css/index.css">    <link rel="stylesheet" href="/Public/static/iCheck-1.0.2/skins/all.css">

<style>
    .modal-sm{
        float: left;
    }
    .tishi{
        float: left;
        line-height: 34px;
    }
</style>

</head>
<body>
<form class="form-group" action="<?php echo U('Admin/Admin/add');?>" method="post">
    <table class="table table-bordered table-striped table-hover table-condensed">

    <tr>
        <th>
            管理员名称
        </th>
        <td>
            <input class="form-control modal-sm" type="text" name="name" placeholder="">
            <span class="tishi">123</span>
        </td>
    </tr>
    <tr>
        <th>
            密码
        </th>
        <td>
            <input class="form-control modal-sm" type="text" name="password">
            <span class="tishi">123</span>
        </td>
    </tr>
    <tr>
        <th>
            确认密码
        </th>
        <td>
            <input class="form-control modal-sm" placeholder="请重复密码" type="text" name="confirm">
            <span class="tishi">123</span>
        </td>
    </tr>
    <tr>
        <th>
            邮箱
        </th>
        <td>
            <input class="form-control modal-sm" placeholder="" type="text" name="email">
            <span class="tishi">123</span>
        </td>
    </tr>
    <tr>
        <th width="80px">
            权限角色
        </th>
        <td>
            <select class="form-control modal-sm" name="rool">
                <!-- <?php if(is_array($allCategory)): foreach($allCategory as $key=>$v): ?><option value="<?php echo ($v['cid']); ?>"><?php echo ($v['_name']); ?></option><?php endforeach; endif; ?> -->
            </select>
        </td>
    </tr>
    <tr>
        <th>
            性别
        </th>
        <td>
            <label><span class="inputword">男</span><input class="icheck" type="radio" name="sex" value="1" checked="checked"></label> &emsp;
            <label><span class="inputword">女</span><input class="icheck" type="radio" name="sex" value="2"></label>&emsp;
            <label><span class="inputword">保密</span><input class="icheck" type="radio" name="sex" value="0"></label>
        </td>
    </tr>
    <tr>
        <th>
        </th>
        <td>
            <input class="btn btn-success" type="submit" value="添加管理员">
        </td>
    </tr>
    </table>
</form>
<script src="/Public/static/js/jquery-2.0.0.min.js"></script>
<script>
    logoutUrl="<?php echo U('Home/User/logout');?>";
</script>
<script src="/Public/static/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/Public/static/js/html5shiv.min.js"></script>
<script src="/Public/static/js/respond.min.js"></script>
<![endif]-->
<script src="/Public/static/pace/pace.min.js"></script>
<script src="/Template/default/Home/Public/js/index.js"></script>
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

<!-- 百度统计结束 --><script src="/Public/static/iCheck-1.0.2/icheck.min.js"></script>
<script>
$(document).ready(function(){
    $('.icheck').iCheck({
        checkboxClass: "icheckbox_square-blue",
        radioClass: "iradio_square-blue",
        increaseArea: "20%"
    });
});
</script>
</body>
</html>