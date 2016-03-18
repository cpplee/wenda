<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<load file="http://localhost/wenda/./Index/Index/View/Common/head.html"/>
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/wenda';
WEB = 'http://localhost/wenda/index.php';
URL = 'http://localhost/wenda/index.php';
APP = 'http://localhost/wenda/Index';
COMMON = 'http://localhost/wenda/Index/Common';
HDPHP = 'http://localhost/wenda/hdphp/hdphp';
HDPHP_DATA = 'http://localhost/wenda/hdphp/hdphp/Data';
HDPHP_EXTEND = 'http://localhost/wenda/hdphp/hdphp/Extend';
MODULE = 'http://localhost/wenda/index.php/Index';
CONTROLLER = 'http://localhost/wenda/index.php/Index/Index';
ACTION = 'http://localhost/wenda/index.php/Index/Index/index';
STATIC = 'http://localhost/wenda/Static';
HDPHP_TPL = 'http://localhost/wenda/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/wenda/./Index/Index/View';
PUBLIC = 'http://localhost/wenda/./Index/Index/View/Public';
CONTROLLER_VIEW = 'http://localhost/wenda/./Index/Index/View/Index';
</script>
	<link rel="stylesheet" href="http://localhost/wenda/./Index/Index/View/Public/Css/index.css" />
	<script type="text/javascript" src='http://localhost/wenda/./Index/Index/View/Public/Js/index.js'></script>
</head>
<body>
	<!-- top -->
	<div id='top-fixed'>
	<div id='top-bar'>
		<ul class="top-bar-left fl">
			<li><a href="http://www.houdunwang.com" target='_blank'>后盾顶尖后盾PHP培训</a></li>
			<li><a href="http://www.houdunwang.com" target='_blank'>后盾论坛</a></li>
		</ul>
		<ul class='top-bar-right fr'>
			    <?php if(isset($_SESSION['username'])&&isset($_SESSION['uid'])){ ?>
			<li class='userinfo'>
				<a href="" class='uname'><?php echo $hd['session']['username'];?></a>
			</li>
			<li style='color:#eaeaf1'>|</li>
			<li><a href="">退出</a></li>
	          <?php }else{ ?>
			<li><a href="" class='login'>登录</a></li>
			<li style='color:#eaeaf1'>|</li>
			<li><a href="" class='register'>注册</a></li>
				<?php } ?>
		</ul>
	</div>
<!-- 提问搜索框 -->
	<div id='search'>
		<div class='logo'><a href="" class='logo'></a></div>
		<form action="" method=''>
			<input type="text" name='' class='sech-cons'/>
			<input type="submit" class='sech-btn'/>
		</form>
		<a href="" class='ask-btn'></a>
	</div>
<!-- 提问搜索框结束 -->
</div>
<div style='height:110px'></div>
<!----------导航条---------->
<div id='nav'>
	<ul class='list'>
		<li class='nav-sel'><a href="" class='home'>问答首页</a></li>
		<li class='nav-sel ask-cate'>
			<a href="" class='ask-list'><span>问题库</span><i></i></a>
			<ul class='hidden'>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
				<li>
					<a href="">后盾PHP培训</a>
				</li>
			</ul>
		</li>
	</ul>
	<p class='total'>累计提问：1123211</p>
</div>

	<!----------注册框---------->
	<div id='register' class='hidden'>
		<div class='reg-title'>
			<p>欢迎注册后盾问答</p>
			<a href="" title='关闭' class='close-window'></a>
		</div>
		<div id='reg-wrap'>
			<div class='reg-left'>
				<ul>
					<li><span>账号注册</span></li>
				</ul>
				<div class='reg-l-bottom'>
					已有账号，<a href="" id='login-now'>马上登录</a>
				</div>
			</div>
			<div class='reg-right'>
				<form action="<?php echo U('Reg/register');?>" method='post' name='register'>
					<ul>
						<li>
							<label for="reg-uname">用户名</label>
							<input type="text" name='username' id='reg-uname'/>
							<span>2-14个字符：字母、数字或中文</span>
						</li>
						<li>
							<label for="reg-pwd">密码</label>
							<input type="password" name='pwd' id='reg-pwd'/>
							<span>6-20个字符:字母、数字或下划线 _</span>
						</li>
						<li>
							<label for="reg-pwded">确认密码</label>
							<input type="password" name='pwded' id='reg-pwded'/>
							<span>请再次输入密码</span>
						</li>
						<li>
							<label for="reg-verify">验证码</label>
							<input type="text" name='verify' id='reg-verify'/>
							<img src="<?php echo U('Reg/code');?>" width='99' height='35' alt="验证码" id='verify-img'/>
							<span>请输入图中的字母或数字，不区分大小写</span>
						</li>
						<li class='submit'>
							<input type="submit" value='立即注册'/>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>

	<!----------登录框---------->
	<div id='login' class='hidden'>
		<div class='login-title'>
			<p>欢迎您登录后盾问答</p>
			<a href="" title='关闭' class='close-window'></a>
		</div>
		<div class='login-form'>
			<span id='login-msg'></span>
			<!-- 登录FORM -->
			<form action="<?php echo U('Login/login');?>" method='post' name='login'>
				<ul>
					<li>
						<label for="login-acc">账号</label>
						<input type="text" name='account' class='input' id='login-acc'/>
					</li>
					<li>
						<label for="login-pwd">密码</label>
						<input type="password" name='pwd' class='input' id='login-pwd'/>
					</li>
					<li class='login-auto'>
						<label for="auto-login">
							<input type="checkbox" checked='checked' name='auto'  id='auto-login'/>&nbsp;下一次自动登录
						</label>
						<a href="" id='regis-now'>注册新账号</a>
					</li>
					<li>
						<input type="submit" value='' id='login-btn'/>
					</li>
				</ul>
			</form>
		</div>
	</div>

<!--背景遮罩--><div id='background' class='hidden'></div>
<!-- top -->
	<div class='main'>
		<div id='left'>
			<p class='left-title'>所有问题分类</p>
			<ul class='left-list'>
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($cate)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($cate as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($cate)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
				<li class='list-l1'>
				<div class='list-l1-wrap'>
				<h4><a href=""><?php echo $d['title'];?></a></h4>
				<ul class='list-l2'>
				        <?php
        //初始化
        $hd['list']['v'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($d['down'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($d['down'] as $v) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=3)break;
                //第几个值
                $hd['list'][v]['index']++;
                //第1个值
                $hd['list'][v]['first']=($listId == 0);
                //最后一个值
                $hd['list'][v]['last']= (count($d['down'])-1 <= $listId);
                //总数
                $hd['list'][v]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
				<li><a href=""><?php echo $v['title'];?></a></li>
				<?php }}?>
				</ul>
				</div>

				<div class='list-more hidden'>
				<ul>
					        <?php
        //初始化
        $hd['list']['v'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($d['down'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=4;
            foreach ($d['down'] as $v) {
                //开始值
                if ($listId<4) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][v]['index']++;
                //第1个值
                $hd['list'][v]['first']=($listId == 4);
                //最后一个值
                $hd['list'][v]['last']= (count($d['down'])-1 <= $listId);
                //总数
                $hd['list'][v]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
				<li><a href=""><?php echo $v['title'];?></a></li>
					<?php }}?>
				</ul>
				</div>
				</li>
				<?php }}?>
			</ul>
		</div>

		<div id='center'>
			<div id='animate'>
				<div class='imgs-wrap'>
					<ul>
						<li>
							<a href=""><img src="./Images/animate1.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="./Images/animate2.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="./Images/animate3.jpg" width='558' height='190'/></a>
						</li>
					</ul>
				</div>
				<ul class='ani-btn'>
					<li class='ani-btn-cur'>0学费学习<i></i></li>
					<li>超百G原创视频<i></i></li>
					<li style='border:none'>有实力做后盾<i></i></li>
				</ul>
			</div>

			<dl class='answer-list'>
				<dt>
					<span class='wait-as'>待解决问题</span>
					<a href=''>更多>></a>
				</dt>
				<dd>
					<a href="">后盾顶尖后盾PHP培训</a>
					<span>20回答</span>
				</dd>
				<dd>
					<a href="">后盾顶尖后盾PHP培训</a>
					<span>20回答</span>
				</dd>
				<dd>
					<a href="">后盾顶尖后盾PHP培训</a>
					<span>20回答</span>
				</dd>
				<dd>
					<a href="">后盾顶尖后盾PHP培训</a>
					<span>20回答</span>
				</dd>
			</dl>

			<dl class='answer-list'>
				<dt>
					<span class='reward-as'>高分悬赏问题</span>
					<a href=''>更多>></a>
				</dt>
				<dd>
					<a href=""><b>20</b>后盾顶尖后盾PHP培训</a>
					<span>100回答</span>
				</dd>
				<dd>
					<a href=""><b>20</b>后盾顶尖后盾PHP培训</a>
					<span>100回答</span>
				</dd>
				<dd>
					<a href=""><b>20</b>后盾顶尖后盾PHP培训</a>
					<span>100回答</span>
				</dd>
				<dd>
					<a href=""><b>20</b>后盾顶尖后盾PHP培训</a>
					<span>100回答</span>
				</dd>
			</dl>

		</div>
		<!-- 右侧 -->
		<div id='right'>
		<div class='userinfo'>
			<dl>
				<dt>
					<a href=""><img src="" width='48' height='48' alt="占位符"/></a>
				</dt>
				<dd class='username'>
					<a href="">
						<b></b>
					</a>
					<a href="">
						<i class='level lv1' title='Level 1'></i>
					</a>
				</dd>
				<dd>金币：<a href="" style="color: #888888;">20<b class='point'></b></a></dd>
				<dd>经验值：200</dd>
			</dl>
			<table>
				<tr>
					<td>回答数</td>
					<td>采纳率</td>
					<td class='last'>提问数</td>
				</tr>
				<tr>
					<td><a href="">200</a></td>
					<td><a href="">20%</a></td>
					<td class='last'><a href="">回答数</a></td>
				</tr>
			</table>
			<ul>
				<li><a href="">我提问的</a></li>
				<li><a href="">我回答的</a></li>
			</ul>
		</div>
		<!-- <div class='r-login'>
			<span class='login'><i></i>&nbsp;登录</span>
			<span class='register'><i></i>&nbsp;注册</span>
		</div> -->
	<div class='clear'></div>
	<div class='star'>
		<p class='title'>后盾问答之星</p>
		<span class='star-name'>本日回答问题最多的人</span>
			<div class='star-info'>
				<div>
					<a href="" class='star-face'>
						<img src="" width='48px' height='48px' alt="头像站位"/>
					</a>
					<ul>
						<li><a href="">后盾网</a></li>
						<i class='level lv1' title='Level 1'></i>
					</ul>
				</div>
				<ul class='star-count'>
					<li>回答数：<span>100</span></li>
					<li>采纳率：<span>20%</span></li>
				</ul>
			</div>
		<span class='star-name'>历史回答问题最多的人</span>

		<div class='star-info'>
			<div>
				<a href="" class='star-face'>
					<img src="" width='48px' height='48px' alt="头像站位"/>
				</a>
				<ul>
					<li><a href="">后盾网</a></li>
					<i class='level lv1' title='Level 1'></i>
				</ul>
			</div>
			<ul class='star-count'>
				<li>回答数：<span>200</span></li>
				<li>采纳率：<span>100%</span></li>
			</ul>
		</div>
	</div>
	<div class='star-list'>
		<p class='title'>后盾问答助人光荣榜</p>
		<div>
			<ul class='ul-title'>
				<li>用户名</li>
				<li style='text-align:right;'>帮助过的人数</li>
			</ul>
			<ul class='ul-list'>
				<li>
					<a href=""><i class='rank r1'></i>houdunwang.com</a>
					<span>100</span>
				</li>
				<li>
					<a href=""><i class='rank r2'></i>houdunwang.com</a>
					<span>100</span>
				</li>
				<li>
					<a href=""><i class='rank r3'></i>houdunwang.com</a>
					<span>100</span>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- ---右侧结束---- -->
	</div>
<!--------------------内容主体结束-------------------->
	<div class='clear'></div>

<!-- 底部 -->
	<div id='bottom'>
		<p>Copyright © 2013 Qihoo.Com All Rights Reserved 后盾网</p>
		<p>京公安网备xxxxxxxxxxxx</p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
    </script>
<![endif]-->
</body>
</html>
<!-- 底部结束 -->