<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>后盾问答</title>
<meta name="keywords" content="后盾问答"/>
<meta name="description" content="后盾问答"/>
<link rel="stylesheet" href="http://localhost/wenda/Index/Index/View/Public/Css/common.css" />
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/wenda';
WEB = 'http://localhost/wenda/index.php';
URL = 'http://localhost/wenda/index.php/Index/Ask/ask';
APP = 'http://localhost/wenda/Index';
COMMON = 'http://localhost/wenda/Index/Common';
HDPHP = 'http://localhost/wenda/hdphp/hdphp';
HDPHP_DATA = 'http://localhost/wenda/hdphp/hdphp/Data';
HDPHP_EXTEND = 'http://localhost/wenda/hdphp/hdphp/Extend';
MODULE = 'http://localhost/wenda/index.php/Index';
CONTROLLER = 'http://localhost/wenda/index.php/Index/Ask';
ACTION = 'http://localhost/wenda/index.php/Index/Ask/ask';
STATIC = 'http://localhost/wenda/Static';
HDPHP_TPL = 'http://localhost/wenda/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/wenda/Index/Index/View';
PUBLIC = 'http://localhost/wenda/Index/Index/View/Public';
CONTROLLER_VIEW = 'http://localhost/wenda/Index/Index/View/Ask';
HISTORY = 'http://localhost/wenda/index.php/Index/Index/search';
</script>
<script type="text/javascript" src='http://localhost/wenda/Index/Index/View/Public/Js/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src='http://localhost/wenda/Index/Index/View/Public/Js/top-bar.js'></script>
<script type="text/javascript"  src="http://localhost/wenda/Index/Index/View/Public/Js/validate.js"></script>
	<link rel="stylesheet" href="http://localhost/wenda/Index/Index/View/Public/Css/ask.css" />
<script type="text/javascript" src="http://localhost/wenda/Index/Index/View/Public/Js/ask.js"></script>

  <script type="text/javascript">
	  var on =false;
	  var point=0;
	      <?php if(isset($_SESSION['username'])&&isset($_SESSION['uid'])){ ?>
					point=<?php echo $point;?>;
			 on= true
			  <?php }else{ ?>
	        on=  false
			  <?php } ?>;

  </script>
</head>
<body>
	<!-- top -->
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
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
                    <a href="<?php echo U('Member/index',array('uid'=>$_SESSION['uid']));?>" class='uname'><?php echo $hd['session']['username'];?></a>
                </li>
                <li style='color:#eaeaf1'>|</li>
                <li><a href="<?php echo U('Login/out');?>">退出</a></li>
                <?php }else{ ?>
                <li><a href="" class='login'>登录</a></li>
                <li style='color:#eaeaf1'>|</li>
                <li><a href="" class='register'>注册</a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- 提问搜索框 -->
    <div id='search'>
        <div class='logo'><a href="http://localhost/wenda/index.php" class='logo'></a></div>
        <form action="<?php echo U('Index/search');?>" method='POST'>
            <input type="text" name='search' class='sech-cons'/>
            <input type="submit" class='sech-btn'/>
        </form>
        <a href="<?php echo U('Ask/ask');?>" class='ask-btn'></a>
    </div>
    <!-- 提问搜索框结束 -->
</div>
<div style='height:110px'></div>
<!----------导航条---------->
<div id='nav'>
    <ul class='list'>
        <li class='nav-sel'><a href="http://localhost/wenda/index.php" class='home'>问答首页</a></li>
        <li class='nav-sel ask-cate'>
            <a href="" class='ask-list'><span>问题库</span><i></i></a>
            <ul class='hidden'>
                        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($topCate)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($topCate as $d) {
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
                $hd['list'][d]['last']= (count($topCate)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                <li>
                    <a href=""><?php echo $d['title'];?></a>
                </li>
                <?php }}?>
            </ul>
        </li>
    </ul>
    <p class='total'>累计提问：<?php echo $askNum;?></p>
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
<!-- top结束 -->
	<div id='location'>
		<a href="">后盾问答</a>&nbsp;>&nbsp;提问
	</div>

<!--------------------中部-------------------->
	<div id='center'>
		<div class='send'>
			<div class='title'>
				<p class='left'>向亿万网友们提问</p>
				<p class='right'>您还可以输入<span id='num'>50</span>个字</p>
			</div>
			<form action="<?php echo U('sub_ask');?>" method='post'>
				<div class='cons'>
					<textarea name="content"></textarea>
				</div>
				<div class='reward'>
					<span id='sel-cate' class='cate-btn'>选择分类</span>
					<ul>
						<li>
							我的金币：<span>    <?php if(isset($_SESSION['username'])&&isset($_SESSION['uid'])){ ?><?php echo $point;?><?php }else{ ?>0<?php } ?></span>
						</li>
						<li>
					  悬赏：<select name="reward">
								<option value="0">0</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="50">50</option>
								<option value="80">80</option>
								<option value="100">100</option>
							</select>金币
						</li>
					</ul>
				</div>
				<input type='text' id="cid" name='cid' value='0'/>
				<input type="submit" value='提交问题' class='send-btn'/>
			</form>
		</div>
	</div>
	<div id='category'>
		<p class='title'>
			<span>请选择分类</span>
			<a href="" class='close-window'></a>
		</p>
		<div class='sel'>
			<p>为您的问题选择一个合适的分类：</p>
			<select name="cate-one" size='16'>
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($topCate)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($topCate as $d) {
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
                $hd['list'][d]['last']= (count($topCate)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
				<option value="<?php echo $d['cid'];?>"><?php echo $d['title'];?></option>
				<?php }}?>
			</select>
			<select name="cate-one" size='16' class='hidden'></select>
			<select name="cate-one" size='16' class='hidden'></select>
		</div>
		<p class='bottom'>
			<span id='ok'>确定</span>
		</p>
	</div>
<!--------------------中部结束-------------------->

<!-- 底部 -->
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
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
<!-- 底部结束 -->