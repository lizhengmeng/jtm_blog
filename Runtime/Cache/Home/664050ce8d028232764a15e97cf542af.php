<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>人脸对比-<?php echo (C("WEB_NAME")); ?></title>
<meta name="keywords" content="<?php echo (C("WEB_KEYWORDS")); ?>"/>
<meta name="description" content="<?php echo (C("WEB_DESCRIPTION")); ?>"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<meta name="baidu-site-verification" content="0DW3jOXXNz" />
<meta name="author" content="lizhengmeng,<?php echo (C("ADMIN_EMAIL")); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/blog/Template/default/Home/Public/css/index.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/static/css/animate.css">

<!-- <link rel="stylesheet" type="text/css" href="/blog/Public/static/bdai/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="/blog/Public/static/bdai/css/bootstrap-fileinput.css">
</head>
<body>
<header id="b-public-nav" class="navbar navbar-inverse navbar-fixed-top">
<!-- 背景动画 -->
<!-- <canvas id="c_n9" width="1920" height="990" style="position: fixed; top: 0px; left: 0px; z-index: -1; opacity: 0.5;"></canvas>
<script src="/blog/Public/static/js/canvas-nest.min.js"></script> -->
<!-- 背景动画 -->
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="/" onclick="recordId('/',0)">
        <div class="hidden-xs b-nav-background">
        </div>
        <ul class="b-logo-code">
            <li class="b-lc-start">&lt;?php</li>
            <li class="b-lc-echo">echo</li>
        </ul>
        <p class="b-logo-word">
            '爵特猛博客'
        </p>
        <p class="b-logo-end">
            ;?>
        </p>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav b-nav-parent">
            <li class="hidden-xs b-nav-mobile"></li>
            <li class="b-nav-cname <?php if(($cid) == "index"): ?>b-nav-active<?php endif; ?> " > <a href="/" onclick="recordId('/',0)">首页</a></li>
            <?php if(is_array($categorys)): foreach($categorys as $key=>$v): ?><li class="b-nav-cname <?php if(($cid) == $v['cid']): ?>b-nav-active<?php endif; ?> "> <a href="<?php echo U('Index/category',array('cid'=>$v['cid']));?>" onclick="return recordId('cid',<?php echo ($v['cid']); ?>)"><?php echo ($v['cname']); ?></a></li><?php endforeach; endif; ?>
            <li class="b-nav-cname <?php if(($cid) == "chat"): ?>b-nav-active<?php endif; ?> "> <a href="<?php echo U('/chat');?>">随言碎语</a></li>
            <li class="b-nav-cname <?php if(($cid) == "play"): ?>b-nav-active<?php endif; ?> "> <a href="<?php echo U('/play');?>">小玩意儿</a></li>
            <!-- <li class="b-nav-cname hidden-sm <?php if(($cid) == "git"): ?>b-nav-active<?php endif; ?> "> <a href="<?php echo U('/git');?>">开源项目</a></li> -->
        </ul>
        <ul id="b-login-word" class="nav navbar-nav navbar-right">
            <?php if(empty($_SESSION['user']['head_img'])): ?><li class="b-nav-cname b-nav-login">
            <div class="hidden-xs b-login-mobile">
            </div>
            <a href="javascript:;" onclick="login()">登录</a></li>
            <?php else: ?>
            <li class="b-user-info"><span><img class="b-head_img" src="<?php echo ($_SESSION['user']['head_img']); ?>" alt="<?php echo ($_SESSION['user']['nickname']); ?>" title="<?php echo ($_SESSION['user']['nickname']); ?>"/></span><span class="b-nickname"><?php echo ($_SESSION['user']['nickname']); ?></span><span><a href="javascript:;" onclick="logout()">退出</a></span></li><?php endif; ?>
        </ul>
    </div>
</div>
</header>
<div class="b-h-70">
</div>

<div id="b-content" class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-8">
            <!-- 内容 -->
            <div class="row b-one-article">
                <div class="container">
                    <div class="page-header" style="border-bottom:0px !important;">
                        <h3>人脸对比</h3>
                        <span style="font-size: 10px;">（图片文件类型支持PNG、JPG、JPEG、BMP，图片大小不超过2M）</span>
                        <form id="uploadForm">
                            <div class="form-group" enctype='multipart/form-data'>
                                <div class="h4">
                                    照片一

                                </div>
                                <div class="fileinput fileinput-new" data-provides="fileinput"  id="exampleInputUpload">
                                    <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
                                        <img id='picImg' style="width: 100%;height: auto;max-height: 140px;" src="/blog/Public/static/bdai/images/noimage.png" alt="爵特猛的小玩意儿" title="爵特猛博客" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">选择文件</span>
                                            <span class="fileinput-exists">换一张</span>
                                            <input type="file" name="face1" id="picID" accept="image/gif,image/jpeg,image/x-png"/>
                                        </span>
                                        <a href="javascript:;" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">移除</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" enctype='multipart/form-data'>
                                <div class="h4">
                                    照片二
                                </div>
                                <div class="fileinput fileinput-new" data-provides="fileinput"  id="exampleInputUpload2">
                                    <div class="fileinput-new thumbnail" style="width: 200px;height: auto;max-height:150px;">
                                        <img id='picImg2' style="width: 100%;height: auto;max-height: 140px;" src="/blog/Public/static/bdai/images/noimage.png" alt="" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">选择文件</span>
                                            <span class="fileinput-exists">换一张</span>
                                            <input type="file" name="face2" id="picID2" accept="image/gif,image/jpeg,image/x-png"/>
                                        </span>
                                        <a href="javascript:;" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">移除</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button id="uploadSubmit" class="btn btn-info">提交</button>
                    </div>

                    <div class="result" style="display: none;">
                        人脸相似度
                        <span style="font-size: 10px;">（参照：大于80%可判断为同一人）</span>：<br />
                        <span style="font-weight: bold; color:red;" class="score"></span>
                    </div>
                    <div class="msg" style="display: none;">
                        图片错误
                    </div>
                    <div class="loading" style="display: none;color:#00b271;">
                        屏幕里的小人儿正在抓紧扫描图片中，请稍等~
                    </div>
                </div>
                <script src="/blog/Public/static/bdai/js/jquery.min.js"></script>
                <script src="/blog/Public/static/bdai/js/bootstrap-fileinput.js"></script>
                <script type="text/javascript">
                    $(function () {
                        $('#uploadSubmit').click(function () {
                            var data = new FormData($('#uploadForm')[0]);
                            $.ajax({
                                url: '<?php echo U('Home/Baidu/face_matching');?>',
                                type: 'POST',
                                data: data,
                                dataType: 'json',
                                async: true,
                                cache: true,
                                contentType: false,
                                processData: false,
                                beforeSend: function () {
                                    $(".msg").hide();
                                    $(".result").hide();
                                    $(".loading").show();
                                },
                                success: function (data) {
                                    // console.log(data);
                                    if(data['result_num']>0){
                                        $('.msg').css('display','none');
                                        $('.result').css('display','block');
                                        var similar = Math.round(data.result[0]['score']);
                                        $('.score').html(similar+'%');
                                    }else{
                                        //错误
                                        $('.result').css('display','none');
                                        $('.msg').css('display','block');
                                        $('.msg').html(data.msg);
                                        console.log(data.msg);
                                    }
                                },
                                complete: function () {
                                    $(".loading").hide();
                                },
                                error: function (data) {
                                    console.log(data.status);
                                }
                            });
                        });

                    })
                </script>
            </div>
        </div>
        <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
    <div class="b-tags">
        <h4 class="b-title">热门标签</h4>
        <ul class="b-all-tname">
            <?php $tag_i=0; if(is_array($tags)): foreach($tags as $k=>$v): $tag_i++; $tag_i=$tag_i==5?1:$tag_i; ?>
            <li class="b-tname"><a class="tstyle-<?php echo ($tag_i); ?>" href="<?php echo U('Home/Index/tag',array('tid'=>$v['tid']));?>" onclick="return recordId('tid',<?php echo ($v['tid']); ?>)"><?php echo ($v['tname']); ?> (<?php echo ($v['count']); ?>)</a></li><?php endforeach; endif; ?>
        </ul>
    </div>
    <div class="b-recommend">
        <h4 class="b-title">置顶推荐</h4>
        <p class="b-recommend-p">
            <?php if(is_array($recommend)): foreach($recommend as $key=>$v): ?><a class="b-recommend-a" href="<?php echo U('Home/Index/article',array('aid'=>$v['aid']));?>" target="_blank"><span class="fa fa-th-list b-black"></span> <?php echo ($v['title']); ?></a><?php endforeach; endif; ?>
        </p>
    </div>
    <div class="b-link">
        <h4 class="b-title">最新评论</h4>
        <div>
            <?php if(is_array($new_comment)): foreach($new_comment as $key=>$v): ?><ul class="b-new-comment <?php if(($key) == "0"): ?>b-new-commit-first<?php endif; ?>"> <img class="b-head-img js-head-img" src="/blog/Template/default/Home/Public/image/qq_default.jpg" _src="<?php echo ($v['head_img']); ?>" alt="<?php echo ($v['nickname']); ?>">
                <li class="b-nickname"> <?php echo ($v['nickname']); ?><span><?php echo ($v['date']); ?></span></li>
                <li class="b-nc-article"> 在<a href="<?php echo U('Home/Index/article',array('aid'=>$v['aid']));?>" target="_blank"><?php echo ($v['title']); ?></a>中评论</li>
                <li class="b-content"> <?php echo ($v['content']); ?></li>
            </ul><?php endforeach; endif; ?>
        </div>
    </div>
    <?php if(($show_link) == "1"): ?><div class="b-link">
        <h4 class="b-title">友情链接</h4>
        <p>
            <?php if(is_array($links)): foreach($links as $k=>$v): ?><a class="b-link-a" href="<?php echo ($v[url]); ?>" target="_blank"><span class="fa fa-link b-black"></span> <?php echo ($v['lname']); ?></a><?php endforeach; endif; ?>
        </p>
    </div><?php endif; ?>
    <div class="b-search">
        <form class="form-inline" role="form" action="<?php echo U('Home/Index/search');?>" method="get">
            <input class="b-search-text" type="text" name="search_word"><input class="b-search-submit" type="submit" value="全站搜索">
        </form>
    </div>
</div>
    </div>
    <div class="row">
        <footer id="b-foot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<ul>
    <li class="text-center">© 2014-2016 lizhengmeng.club 版权所有 ICP证：桂ICP备17006323号</li>
    <li class="text-center"> 联系邮箱：<?php echo (C("ADMIN_EMAIL")); ?></li>
</ul>
<div class="b-h-20">
</div>
<a class="go-top fa fa-angle-up animated jello" href="javascript:;" onclick="goTop()"></a></footer>


    </div>
</div>
<div class="modal fade" id="b-modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title b-ta-center" id="myModalLabel">无需注册，用以下帐号即可直接登录</h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-login-row">
                <ul class="row">
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img"><a href="<?php echo U('Home/User/oauth_login',array('type'=>'qq'));?>"><img src="/blog/Template/default/Home/Public/image/qq-login.png" alt="QQ登录" title="QQ登录"></a></li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img"><a href="<?php echo U('Home/User/oauth_login',array('type'=>'sina'));?>"><img src="/blog/Template/default/Home/Public/image/sina-login.png" alt="微博登录" title="微博登录"></a></li>
                    <li class="col-xs-6 col-md-4 col-lg-4 b-login-img"><a href="<?php echo U('Home/User/oauth_login',array('type'=>''));?>"><img src="" alt="待定" title="待定"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
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