<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>登录后台管理系统</title><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="/blog/Public/static/icon/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/blog/Template/default/Home/Public/css/index.css"><link rel="stylesheet" type="text/css" href="/blog/Template/default/Admin/Public/css/login.css" />
</head>
<body>
<form class="form-group" action="<?php echo U('Admin/Login/login');?>" method="post">
    <div id="Login">
        <input class="form-control modal-sm" type="password" placeholder="后台登录密码" name="ADMIN_PASSWORD" value="<?php echo ($_SESSION['ADMIN_PASSWORD']); ?>">
        <input class="form-control modal-sm" type="text" placeholder="验证码" autocomplete="off" name="verify">
        <img id="code" class="verify" src="<?php echo U('Admin/Login/showVerify');?>" title="点击更换" >
        <input class="btn btn-primary submit" type="submit" value="登录">
    </div>
</form>
<script src="/blog/Public/static/js/jquery-2.0.0.min.js"></script>
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

<!-- 百度统计结束 -->

</body>
</html>

<script type="text/javascript">
  // 验证码生成
  var captcha_img = $('#code');
  var verifyimg = captcha_img.attr("src");
  captcha_img.attr('title', '点击刷新');
  captcha_img.click(function(){
      //如果？第一次出现位置大于0
      if( verifyimg.indexOf('?')>0){
          $(this).attr("src", verifyimg+'&random='+Math.random());
      }else{
          $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
      }
  });

</script>