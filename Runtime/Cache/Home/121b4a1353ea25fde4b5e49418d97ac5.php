<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>人脸检测-<?php echo (C("WEB_NAME")); ?></title>
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

<script type="text/javascript" src="/blog/Public/static/games/gobang/js/CookieHandle.js"></script>
<script type="text/javascript" src="/blog/Public/static/games/gobang/js/jquery-1.7.2.js"></script>
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
            <li class="b-user-info">
                <span>
                    <img class="b-head_img" src="<?php echo ($_SESSION['user']['head_img']); ?>" alt="<?php echo ($_SESSION['user']['nickname']); ?>" title="<?php echo ($_SESSION['user']['nickname']); ?>"/>
                </span>
                <span class="b-nickname"><?php echo ($_SESSION['user']['nickname']); ?></span>
                <span><a href="javascript:;" onclick="logout()">退出</a></span>
            </li><?php endif; ?>
        </ul>
    </div>
</div>
</header>
<div class="b-h-70">
</div>

<div id="b-content" class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-8">
			<div class="wrapper">
				<div class="chessboard">
					<!-- top line -->
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top"></div>
					<div class="chess-top chess-right"></div>
					<!-- line 1 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 2 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 3 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 4 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 5 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 6 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 7 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 8 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 9 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 10 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 11 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 12 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- line 13 -->
					<div class="chess-left"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-middle"></div>
					<div class="chess-right"></div>
					<!-- bottom line  -->
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom"></div>
					<div class="chess-bottom chess-right"></div>
				</div>

				<div class="operating-panel">
					<p>
						<a id="black_btn" class="btn selected" href="#">黑&nbsp;&nbsp;子</a>
						<a id="white_btn" class="btn" href="#">白&nbsp;&nbsp;子</a>
					</p>
					<p>
						<a id="first_move_btn" class="btn selected" href="#">先&nbsp;&nbsp;手</a>
						<a id="second_move_btn" class="btn" href="#">后&nbsp;&nbsp;手</a>
					</p>
					<a id="replay_btn" class="btn" href="#">开&nbsp;&nbsp;&nbsp;始</a>
					<p id="result_info">胜率：100%</p>
					<p id="result_tips"></p>
				</div>

				<div style="display: none">
					<!-- 图片需合并 减少http请求数 -->
					<img src="img/black.png" alt="preload" />
					<img src="img/white.png" alt="preload" />
					<img src="img/hover.png" alt="preload" />
					<img src="img/hover_up.png" alt="preload" />
					<img src="img/hover_down.png" alt="preload" />
					<img src="img/hover_up_left.png" alt="preload" />
					<img src="img/hover_up_right.png" alt="preload" />
					<img src="img/hover_left.png" alt="preload" />
					<img src="img/hover_right.png" alt="preload" />
					<img src="img/hover_down_left.png" alt="preload" />
					<img src="img/hover_down_right.png" alt="preload" />
					<img src="img/black_last.png" alt="preload" />
					<img src="img/white_last.png" alt="preload" />
				</div>
			</div>
        </div>
    </div>
    <div class="row">
        <footer id="b-foot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<ul>
    <li class="text-center">© 2017-2018 lizhengmeng.club 版权所有 ICP证：桂ICP备17006323号</li>
    <li class="text-center"> 联系邮箱：<?php echo (C("ADMIN_EMAIL")); ?>
        <!-- 站长统计开始 -->
        <script type="text/javascript">
            var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cspan id='cnzz_stat_icon_1273611319'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1273611319%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <!-- 站长统计结束 -->
    </li>
</ul>
<div class="b-h-20">
</div>
<a class="go-top fa fa-angle-up animated jello" href="javascript:;" onclick="goTop()"></a>
</footer>


    </div>
</div>
</body>
</html>


<style>
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
.wrapper {
width: 600px;
position: relative;
}

/* 棋盘 */
div.chessboard {
	margin: 30px 0 0 50px;
	width: 542px;
	background: url(/blog/Public/static/games/gobang/img/chessboard.png) no-repeat 14px 14px rgb(250, 250, 250);
	overflow: hidden;
	box-shadow: 2px 2px 8px #888;
	-webkit-box-shadow: 2px 2px 8px #888;
	-moz-box-shadow: 2px 2px 8px #888;
}

div.chessboard div {
	float: left;
	width: 36px;
	height: 36px;
	border-top: 0px solid #ccc;
	border-left: 0px solid #ccc;
	border-right: 0;
	border-bottom: 0;
	cursor: pointer;
}

/* 棋子 */
div.chessboard div.black {
	background: url(/blog/Public/static/games/gobang/img/black.png) no-repeat 4px 4px;
}
div.chessboard div.white {
	background: url(/blog/Public/static/games/gobang/img/white.png) no-repeat 4px 4px;
}
div.chessboard div.hover {
	background: url(/blog/Public/static/games/gobang/img/hover.png) no-repeat 1px 1px;
}
div.chessboard div.hover-up {
	background: url(/blog/Public/static/games/gobang/img/hover_up.png) no-repeat 1px 1px;
}
div.chessboard div.hover-down {
	background: url(/blog/Public/static/games/gobang/img/hover_down.png) no-repeat 1px 1px;
}
div.chessboard div.hover-up-left {
	background: url(/blog/Public/static/games/gobang/img/hover_up_left.png) no-repeat 1px 1px;
}
div.chessboard div.hover-up-right {
	background: url(/blog/Public/static/games/gobang/img/hover_up_right.png) no-repeat 1px 1px;
}
div.chessboard div.hover-left {
	background: url(/blog/Public/static/games/gobang/img/hover_left.png) no-repeat 1px 1px;
}
div.chessboard div.hover-right {
	background: url(/blog/Public/static/games/gobang/img/hover_right.png) no-repeat 1px 1px;
}
div.chessboard div.hover-down-left {
	background: url(/blog/Public/static/games/gobang/img/hover_down_left.png) no-repeat 1px 1px;
}
div.chessboard div.hover-down-right {
	background: url(/blog/Public/static/games/gobang/img/hover_down_right.png) no-repeat 1px 1px;
}
div.chessboard div.white-last {
	background: url(/blog/Public/static/games/gobang/img/white_last.png) no-repeat 4px 4px;
}
div.chessboard div.black-last {
	background: url(/blog/Public/static/games/gobang/img/black_last.png) no-repeat 4px 4px;
}

/* 右侧 */

div.operating-panel {
	position: absolute;
	left: 610px;
	top: 150px;
	width: 200px;
	text-align: center;
}

.operating-panel a {
	display: inline-block;
	padding: 10px 15px;
	margin-bottom: 39px;
	margin-right: 8px;
	margin-left: 8px;
	background: rgb(100, 167, 233);
	text-decoration: none;
	color: #333;
	font-weight: bold;
	font-size: 16px;
	font-family: "微软雅黑", "宋体";
}

.operating-panel a:hover {
	background: rgb(48, 148, 247);
	text-decoration: none;
}

.operating-panel a.disable, .operating-panel a.disable:hover {
	cursor: default;
	background: rgb(197, 203, 209);
	color: rgb(130, 139, 148);
}

.operating-panel a.selected {
	border: 5px solid #F3C242;
	padding: 5px 10px;
}

#result_tips {
	color: #CE4242;
	font-size: 26px;
	font-family: "微软雅黑";
}

#result_info {
	margin-bottom: 26px;
}</style>
	    		<script>$(document).ready(function() {
	fiveChess.init();
});

var fiveChess = {
	NO_CHESS: 0,
	BLACK_CHESS: -1,
	WHITE_CHESS: 1,
	chessArr: [],	//记录棋子
	chessBoardHtml: "",
	humanPlayer: "black",	//玩家棋子颜色
	AIPlayer: "white",	//AI棋子颜色
	isPlayerTurn: true, //轮到player下棋
	totalGames: cookieHandle.getCookie("totalGames") || 0,	//总局数
	winGames: cookieHandle.getCookie("winGames") || 0,	//玩家赢局数
	isGameStart: false,	//游戏已经开始
	isGameOver: false, //游戏结束
	playerLastChess: [], //玩家最后下子位置
	AILastChess: [], //AI最后下子位置

	init: function () {
		this.chessBoardHtml = $("div.chessboard").html();
		var _fiveChess = this;
		//右侧操作按钮
		$(".operating-panel a").click(function (event) {
			event.preventDefault();
			var id = $(this).attr("id");
			if (_fiveChess.isGameStart && id !== "replay_btn" ) { return; }	//正在游戏 不操作
			switch (id) {
				case "black_btn":
					_fiveChess.humanPlayer = "black";
					_fiveChess.AIPlayer = "white";
					break;
				case "white_btn":
					_fiveChess.humanPlayer = "white";
					_fiveChess.AIPlayer = "black";
					break;
				case "first_move_btn":
					_fiveChess.isPlayerTurn = true;
					break;
				case "second_move_btn":
					_fiveChess.isPlayerTurn = false;
					break;
				case "replay_btn":
					_fiveChess.resetChessBoard();
					if (_fiveChess.isGameStart) {	//点重玩
						_fiveChess.gameOver();
					}
					else {	//点开始
						_fiveChess.gameStart();
					}
					break;
			}
			if (id !== "replay_btn") {
				$(this).addClass("selected").siblings().removeClass("selected");
			}
		});
		this.resetChessBoard();
		$("#result_info").html("胜率：" + (this.winGames * 100 / this.totalGames | 0) + "%");
	},
	//重置棋盘
	resetChessBoard: function () {
		$("div.chessboard").html(this.chessBoardHtml);
		$("#result_tips").html("");
		this.isGameOver = false;
		this.isPlayerTurn = $("#first_move_btn").hasClass("selected");
		//初始化棋子状态
		var i, j;
		for (i = 0; i < 15; i++) {
			this.chessArr[i] = [];
			for (j = 0; j < 15; j++) {
				this.chessArr[i][j] = this.NO_CHESS;
			}
		}
		//player下棋事件
		var _fiveChess = this;
		$("div.chessboard div").click(function () {
			if (!_fiveChess.isPlayerTurn || _fiveChess.isGameOver) {
				return;
			}
			if (!_fiveChess.isGameStart) {
				_fiveChess.gameStart();
			}
			var index = $(this).index(),
				i = index / 15 | 0,
				j = index % 15;
			if (_fiveChess.chessArr[i][j] === _fiveChess.NO_CHESS) {
				_fiveChess.playChess(i, j, _fiveChess.humanPlayer);
				if (i === 0 && j === 0) {
					$(this).removeClass("hover-up-left");
				}
				else if (i === 0 && j === 14) {
					$(this).removeClass("hover-up-right");
				}
				else if (i === 14 && j === 0) {
					$(this).removeClass("hover-down-left");
				}
				else if (i === 14 && j === 14) {
					$(this).removeClass("hover-down-right");
				}
				else if (i === 0) {
					$(this).removeClass("hover-up");
				}
				else if (i === 14) {
					$(this).removeClass("hover-down");
				}
				else if (j === 0) {
					$(this).removeClass("hover-left");
				}
				else if (j === 14) {
					$(this).removeClass("hover-right");
				}
				else {
					$(this).removeClass("hover");
				}
				_fiveChess.playerLastChess = [i, j];
				_fiveChess.playerWinOrNot(i, j);
			}
		});
		//鼠标在棋盘上移动效果
		$("div.chessboard div").hover(
			function () {
				if (!_fiveChess.isPlayerTurn || _fiveChess.isGameOver) { return; }
				var index = $(this).index(),
					i = index / 15 | 0,
					j = index % 15;
				if (_fiveChess.chessArr[i][j] === _fiveChess.NO_CHESS) {
					if (i === 0 && j === 0) {
						$(this).addClass("hover-up-left");
					}
					else if (i === 0 && j === 14) {
						$(this).addClass("hover-up-right");
					}
					else if (i === 14 && j === 0) {
						$(this).addClass("hover-down-left");
					}
					else if (i === 14 && j === 14) {
						$(this).addClass("hover-down-right");
					}
					else if (i === 0) {
						$(this).addClass("hover-up");
					}
					else if (i === 14) {
						$(this).addClass("hover-down");
					}
					else if (j === 0) {
						$(this).addClass("hover-left");
					}
					else if (j === 14) {
						$(this).addClass("hover-right");
					}
					else {
						$(this).addClass("hover");
					}
				}
			},
			function () {
				if (!_fiveChess.isPlayerTurn || _fiveChess.isGameOver) { return; }
				var index = $(this).index(),
					i = index / 15 | 0,
					j = index % 15;
					if (i === 0 && j === 0) {
						$(this).removeClass("hover-up-left");
					}
					else if (i === 0 && j === 14) {
						$(this).removeClass("hover-up-right");
					}
					else if (i === 14 && j === 0) {
						$(this).removeClass("hover-down-left");
					}
					else if (i === 14 && j === 14) {
						$(this).removeClass("hover-down-right");
					}
					else if (i === 0) {
						$(this).removeClass("hover-up");
					}
					else if (i === 14) {
						$(this).removeClass("hover-down");
					}
					else if (j === 0) {
						$(this).removeClass("hover-left");
					}
					else if (j === 14) {
						$(this).removeClass("hover-right");
					}
					else {
						$(this).removeClass("hover");
					}
			}
		);
	},
	gameStart: function () {
		this.totalGames++;
		cookieHandle.setCookie({ name: "totalGames", value: this.totalGames, expiresHours: 365 * 24 });
		//AI先手
		if (!this.isPlayerTurn) {
			this.AImoveChess();
		}
		this.isGameStart = true;
		$(".operating-panel p a").addClass("disable");
		$("#replay_btn").html("重&nbsp;&nbsp;&nbsp;玩");
	},
	gameOver: function () {
		this.isGameStart = false;
		$(".operating-panel a").removeClass("disable");
		$("#replay_btn").html("开&nbsp;&nbsp;&nbsp;始");
		$("#result_info").html("胜率：" + (this.winGames * 100 / this.totalGames | 0) + "%");
	},

	//下棋 i行，j列，color颜色
	playChess: function (i, j, color) {
		this.chessArr[i][j] = color === "black" ? this.BLACK_CHESS : this.WHITE_CHESS;
		if (color === this.AIPlayer) {
			$("div.chessboard div." + color + "-last").addClass(color).removeClass(color + "-last");
			$("div.chessboard div:eq(" + (i * 15 + j) + ")").addClass(color + "-last");
		}
		else {
			$("div.chessboard div:eq(" + (i * 15 + j) + ")").addClass(color);
		}
	},
	//玩家是否取胜
	playerWinOrNot: function (i, j) {
		var nums = 1,	//连续棋子个数
			chessColor = this.humanPlayer === "black" ? this.BLACK_CHESS : this.WHITE_CHESS,
			m, n;
		//x方向
		for (m = j - 1; m >= 0; m--) {
			if (this.chessArr[i][m] === chessColor) {
				nums++;
			}
			else {
				break;
			}
		}
		for (m = j + 1; m < 15; m++) {
			if (this.chessArr[i][m] === chessColor) {
				nums++;
			}
			else {
				break;
			}
		}
		if (nums >= 5) {
			this.playerWin();
			return;
		}
		else {
			nums = 1;
		}
		//y方向
		for (m = i - 1; m >= 0; m--) {
			if (this.chessArr[m][j] === chessColor) {
				nums++;
			}
			else {
				break;
			}
		}
		for (m = i + 1; m < 15; m++) {
			if (this.chessArr[m][j] === chessColor) {
				nums++;
			}
			else {
				break;
			}
		}
		if (nums >= 5) {
			this.playerWin();
			return;
		}
		else {
			nums = 1;
		}
		//左斜方向
		for (m = i - 1, n = j - 1; m >= 0 && n >= 0; m--, n--) {
			if (this.chessArr[m][n] === chessColor) {
				nums++;
			}
			else {
				break;
			}
		}
		for (m = i + 1, n = j + 1; m < 15 && n < 15; m++, n++) {
			if (this.chessArr[m][n] === chessColor) {
				nums++;
			}
			else {
				break;
			}
		}
		if (nums >= 5) {
			this.playerWin();
			return;
		}
		else {
			nums = 1;
		}
		//右斜方向
		for (m = i - 1, n = j + 1; m >= 0 && n < 15; m--, n++) {
			if (this.chessArr[m][n] === chessColor) {
				nums++;
			}
			else {
				break;
			}
		}
		for (m = i + 1, n = j - 1; m < 15 && n >= 0; m++, n--) {
			if (this.chessArr[m][n] === chessColor) {
				nums++;
			}
			else {
				break;
			}
		}
		if (nums >= 5) {
			this.playerWin();
			return;
		}
		this.AImoveChess();
	},
	playerWin: function () {
		this.winGames++;
		cookieHandle.setCookie({ name: "winGames", value: this.winGames, expiresHours: 365 * 24 });
		this.showResult(true);
		this.gameOver();
	},
	//AI下棋
	AImoveChess: function () {
		this.isPlayerTurn = false;
		var maxX = 0,
			maxY = 0,
			maxWeight = 0,
			i, j, tem;
		for (i = 14; i >= 0; i--) {
			for (j = 14; j >= 0; j--) {
				if (this.chessArr[i][j] !== this.NO_CHESS) {
					continue;
				}
				tem = this.computeWeight(i, j);
				if (tem > maxWeight) {
					maxWeight = tem;
					maxX = i;
					maxY = j;
				}
			}
		}
		this.playChess(maxX, maxY, this.AIPlayer);
		this.AILastChess = [maxX, maxY];
		if ((maxWeight >= 100000 && maxWeight < 250000) || (maxWeight >= 500000)) {
			this.showResult(false);
			this.gameOver();
		}
		else {
			this.isPlayerTurn = true;
		}
	},
	showResult: function(isPlayerWin) {
		if (isPlayerWin) {
			$("#result_tips").html("恭喜你获胜！");
		}
		else {
			$("#result_tips").html("哈哈，你输咯！");
		}
		this.isGameOver = true;
		this.showWinChesses(isPlayerWin);
	},
	//标记显示获胜棋子
	showWinChesses: function (isPlayerWin) {
		var nums = 1,	//连续棋子个数
			lineChess = [],	//连续棋子位置
			i,
			j,
			chessColor,
			m, n;
		if (isPlayerWin) {
			chessColor = this.humanPlayer === "black" ? this.BLACK_CHESS : this.WHITE_CHESS;
			i = this.playerLastChess[0];
			j = this.playerLastChess[1];
		}
		else {
			chessColor = this.AIPlayer === "black" ? this.BLACK_CHESS : this.WHITE_CHESS;
			i = this.AILastChess[0];
			j = this.AILastChess[1];
		}
		$("div.chessboard div." + this.AIPlayer + "-last").addClass(this.AIPlayer).removeClass(this.AIPlayer + "-last");
		//x方向
		lineChess[0] = [i];
		lineChess[1] = [j];
		for (m = j - 1; m >= 0; m--) {
			if (this.chessArr[i][m] === chessColor) {
				lineChess[0][nums] = i;
				lineChess[1][nums] = m;
				nums++;
			}
			else {
				break;
			}
		}
		for (m = j + 1; m < 15; m++) {
			if (this.chessArr[i][m] === chessColor) {
				lineChess[0][nums] = i;
				lineChess[1][nums] = m;
				nums++;
			}
			else {
				break;
			}
		}
		if (nums >= 5) {
			for (k = nums - 1; k >= 0; k--) {
				this.markChess(lineChess[0][k] * 15 + lineChess[1][k], isPlayerWin ? this.humanPlayer : this.AIPlayer);
			}
			return;
		}
		//y方向
		nums = 1;
		lineChess[0] = [i];
		lineChess[1] = [j];
		for (m = i - 1; m >= 0; m--) {
			if (this.chessArr[m][j] === chessColor) {
				lineChess[0][nums] = m;
				lineChess[1][nums] = j;
				nums++;
			}
			else {
				break;
			}
		}
		for (m = i + 1; m < 15; m++) {
			if (this.chessArr[m][j] === chessColor) {
				lineChess[0][nums] = m;
				lineChess[1][nums] = j;
				nums++;
			}
			else {
				break;
			}
		}
		if (nums >= 5) {
			for (k = nums - 1; k >= 0; k--) {
				this.markChess(lineChess[0][k] * 15 + lineChess[1][k], isPlayerWin ? this.humanPlayer : this.AIPlayer);
			}
			return;
		}
		//左斜方向
		nums = 1;
		lineChess[0] = [i];
		lineChess[1] = [j];
		for (m = i - 1, n = j - 1; m >= 0 && n >= 0; m--, n--) {
			if (this.chessArr[m][n] === chessColor) {
				lineChess[0][nums] = m;
				lineChess[1][nums] = n;
				nums++;
			}
			else {
				break;
			}
		}
		for (m = i + 1, n = j + 1; m < 15 && n < 15; m++, n++) {
			if (this.chessArr[m][n] === chessColor) {
				lineChess[0][nums] = m;
				lineChess[1][nums] = n;
				nums++;
			}
			else {
				break;
			}
		}
		if (nums >= 5) {
			for (k = nums - 1; k >= 0; k--) {
				this.markChess(lineChess[0][k] * 15 + lineChess[1][k], isPlayerWin ? this.humanPlayer : this.AIPlayer);
			}
			return;
		}
		//右斜方向
		nums = 1;
		lineChess[0] = [i];
		lineChess[1] = [j];
		for (m = i - 1, n = j + 1; m >= 0 && n < 15; m--, n++) {
			if (this.chessArr[m][n] === chessColor) {
				lineChess[0][nums] = m;
				lineChess[1][nums] = n;
				nums++;
			}
			else {
				break;
			}
		}
		for (m = i + 1, n = j - 1; m < 15 && n >= 0; m++, n--) {
			if (this.chessArr[m][n] === chessColor) {
				lineChess[0][nums] = m;
				lineChess[1][nums] = n;
				nums++;
			}
			else {
				break;
			}
		}
		if (nums >= 5) {
			for (k = nums - 1; k >= 0; k--) {
				this.markChess(lineChess[0][k] * 15 + lineChess[1][k], isPlayerWin ? this.humanPlayer : this.AIPlayer);
			}
		}
	},
	markChess: function (pos, color) {
		$("div.chessboard div:eq(" + pos + ")").removeClass(color).addClass(color + "-last");
	},
	//下子到i，j X方向 结果: 多少连子 两边是否截断
	putDirectX: function (i, j, chessColor) {
		var m, n,
			nums = 1,
			side1 = false,
			side2 = false;
		for (m = j - 1; m >= 0; m--) {
			if (this.chessArr[i][m] === chessColor) {
				nums++;
			}
			else {
				if (this.chessArr[i][m] === this.NO_CHESS) {
					side1 = true;
				}
				break;
			}
		}
		for (m = j + 1; m < 15; m++) {
			if (this.chessArr[i][m] === chessColor) {
				nums++;
			}
			else {
				if (this.chessArr[i][m] === this.NO_CHESS) {
					side2 = true;
				}
				break;
			}
		}
		return {"nums": nums, "side1": side1, "side2": side2};
	},
	//下子到i，j Y方向 结果
	putDirectY: function (i, j, chessColor) {
		var m, n,
			nums = 1,
			side1 = false,
			side2 = false;
		for (m = i - 1; m >= 0; m--) {
			if (this.chessArr[m][j] === chessColor) {
				nums++;
			}
			else {
				if (this.chessArr[m][j] === this.NO_CHESS) {
					side1 = true;
				}
				break;
			}
		}
		for (m = i + 1; m < 15; m++) {
			if (this.chessArr[m][j] === chessColor) {
				nums++;
			}
			else {
				if (this.chessArr[m][j] === this.NO_CHESS) {
					side2 = true;
				}
				break;
			}
		}
		return {"nums": nums, "side1": side1, "side2": side2};
	},
	//下子到i，j XY方向 结果
	putDirectXY: function (i, j, chessColor) {
		var m, n,
			nums = 1,
			side1 = false,
			side2 = false;
		for (m = i - 1, n = j - 1; m >= 0 && n >= 0; m--, n--) {
			if (this.chessArr[m][n] === chessColor) {
				nums++;
			}
			else {
				if (this.chessArr[m][n] === this.NO_CHESS) {
					side1 = true;
				}
				break;
			}
		}
		for (m = i + 1, n = j + 1; m < 15 && n < 15; m++, n++) {
			if (this.chessArr[m][n] === chessColor) {
				nums++;
			}
			else {
				if (this.chessArr[m][n] === this.NO_CHESS) {
					side2 = true;
				}
				break;
			}
		}
		return {"nums": nums, "side1": side1, "side2": side2};
	},
	putDirectYX: function (i, j, chessColor) {
		var m, n,
			nums = 1,
			side1 = false,
			side2 = false;
		for (m = i - 1, n = j + 1; m >= 0 && n < 15; m--, n++) {
			if (this.chessArr[m][n] === chessColor) {
				nums++;
			}
			else {
				if (this.chessArr[m][n] === this.NO_CHESS) {
					side1 = true;
				}
				break;
			}
		}
		for (m = i + 1, n = j - 1; m < 15 && n >= 0; m++, n--) {
			if (this.chessArr[m][n] === chessColor) {
				nums++;
			}
			else {
				if (this.chessArr[m][n] === this.NO_CHESS) {
					side2 = true;
				}
				break;
			}
		}
		return {"nums": nums, "side1": side1, "side2": side2};
	},
	//计算下子至i,j的权重
	computeWeight: function (i, j) {
		var weight = 14 - (Math.abs(i - 7) + Math.abs(j - 7)), //基于棋盘位置权重
			pointInfo = {},	//某点下子后连子信息
			chessColor = this.AIPlayer === "black" ? this.BLACK_CHESS : this.WHITE_CHESS;
		//x方向
		pointInfo = this.putDirectX(i, j, chessColor);
		weight += this.weightStatus(pointInfo.nums, pointInfo.side1, pointInfo.side2, true);//AI下子权重
		pointInfo = this.putDirectX(i, j, -chessColor);
		weight += this.weightStatus(pointInfo.nums, pointInfo.side1, pointInfo.side2, false);//player下子权重
		//y方向
		pointInfo = this.putDirectY(i, j, chessColor);
		weight += this.weightStatus(pointInfo.nums, pointInfo.side1, pointInfo.side2, true);//AI下子权重
		pointInfo = this.putDirectY(i, j, -chessColor);
		weight += this.weightStatus(pointInfo.nums, pointInfo.side1, pointInfo.side2, false);//player下子权重
		//左斜方向
		pointInfo = this.putDirectXY(i, j, chessColor);
		weight += this.weightStatus(pointInfo.nums, pointInfo.side1, pointInfo.side2, true);//AI下子权重
		pointInfo = this.putDirectXY(i, j, -chessColor);
		weight += this.weightStatus(pointInfo.nums, pointInfo.side1, pointInfo.side2, false);//player下子权重
		//右斜方向
		pointInfo = this.putDirectYX(i, j, chessColor);
		weight += this.weightStatus(pointInfo.nums, pointInfo.side1, pointInfo.side2, true);//AI下子权重
		pointInfo = this.putDirectYX(i, j, -chessColor);
		weight += this.weightStatus(pointInfo.nums, pointInfo.side1, pointInfo.side2, false);//player下子权重
		return weight;
	},
	//权重方案   独：两边为空可下子，单：一边为空
	weightStatus: function (nums, side1, side2, isAI) {
		var weight = 0;
		switch (nums) {
			case 1:
				if (side1 && side2) {
					weight = isAI ? 15 : 10;	//独一
				}
				break;
			case 2:
				if (side1 && side2) {
					weight = isAI ? 100 : 50;	//独二
				}
				else if (side1 || side2) {
					weight = isAI ? 10 : 5;	//单二
				}
				break;
			case 3:
				if (side1 && side2) {
					weight = isAI ? 500 : 200;	//独三
				}
				else if (side1 || side2) {
					weight = isAI ? 30 : 20;	//单三
				}
				break;
			case 4:
				if (side1 && side2) {
					weight = isAI ? 5000 : 2000;	//独四
				}
				else if (side1 || side2) {
					weight = isAI ? 400 : 100;	//单四
				}
				break;
			case 5:
				weight = isAI ? 100000 : 10000;	//五
				break;
			default:
				weight = isAI ? 500000 : 250000;
				break;
		}
		return weight;
	}
};</script>