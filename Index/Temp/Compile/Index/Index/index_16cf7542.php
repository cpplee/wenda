<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo $hd['config']['WEBNAME'];?></title>
<meta name="keywords" content="<?php echo $hd['config']['KEYWORDS'];?>"/>
<meta name="description" content="<?php echo $hd['config']['DISCRIPTION'];?>"/>
<link rel="stylesheet" href="http://localhost:88/wenda/Index/Index/View/Public/Css/common.css" />
<script type='text/javascript'>
HOST = 'http://localhost:88';
ROOT = 'http://localhost:88/wenda';
WEB = 'http://localhost:88/wenda/index.php';
URL = 'http://localhost:88/wenda/index.php/Index/Index';
APP = 'http://localhost:88/wenda/Index';
COMMON = 'http://localhost:88/wenda/Index/Common';
HDPHP = 'http://localhost:88/wenda/hdphp/hdphp';
HDPHP_DATA = 'http://localhost:88/wenda/hdphp/hdphp/Data';
HDPHP_EXTEND = 'http://localhost:88/wenda/hdphp/hdphp/Extend';
MODULE = 'http://localhost:88/wenda/index.php/Index';
CONTROLLER = 'http://localhost:88/wenda/index.php/Index/Index';
ACTION = 'http://localhost:88/wenda/index.php/Index/Index/index';
STATIC = 'http://localhost:88/wenda/Static';
HDPHP_TPL = 'http://localhost:88/wenda/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost:88/wenda/Index/Index/View';
PUBLIC = 'http://localhost:88/wenda/Index/Index/View/Public';
CONTROLLER_VIEW = 'http://localhost:88/wenda/Index/Index/View/Index';
HISTORY = 'http://localhost:88/wenda/index.php/Index/Index/';
</script>
<script type="text/javascript" src='http://localhost:88/wenda/Index/Index/View/Public/Js/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src='http://localhost:88/wenda/Index/Index/View/Public/Js/top-bar.js'></script>
<script type="text/javascript"  src="http://localhost:88/wenda/Index/Index/View/Public/Js/validate.js"></script>

	<link rel="stylesheet" href="http://localhost:88/wenda/Index/Index/View/Public/Css/index.css" />
	<script type="text/javascript" src='http://localhost:88/wenda/Index/Index/View/Public/Js/index.js'></script>
</head>
<body>
	<!-- top -->
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!-- top -->
<div id='top-fixed'>
    <div id='top-bar'>
        <ul class="top-bar-left fl">
            <li><a href="http://www.houdunwang.com" target='_blank'>xxxxx</a></li>
            <li><a href="http://www.houdunwang.com" target='_blank'>xxxxx</a></li>
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
        <div class='logo1'><a href="http://localhost:88/wenda/index.php" class='logo1'></a></div>
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
        <li class='nav-sel'><a href="http://localhost:88/wenda/index.php" class='home'>问答首页</a></li>
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
				<h4><a href="<?php echo U('List/index',array('cid'=>$d['cid']));?>"><?php echo $d['title'];?></a></h4>
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
				<li><a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo $v['title'];?></a></li>
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
				<li><a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo $v['title'];?></a></li>
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
							<a href=""><img src="http://localhost:88/wenda/Index/Index/View/Public/Images/123.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="http://localhost:88/wenda/Index/Index/View/Public/Images/123.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="http://localhost:88/wenda/Index/Index/View/Public/Images/123.jpg" width='558' height='190'/></a>
						</li>
					</ul>
				</div>
				<ul class='ani-btn'>
					<li class='ani-btn-cur'>XXX<i></i></li>
					<li>XXX<i></i></li>
					<li style='border:none'>XXX<i></i></li>
				</ul>
			</div>

			<dl class='answer-list'>
				<dt>
					<span class='wait-as'>待解决问题</span>
					<a href=''>更多>></a>
				</dt>
				        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($noSolve)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($noSolve as $d) {
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
                $hd['list'][d]['last']= (count($noSolve)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
				<dd>
					<a href="<?php echo U('Show/index',array('asid'=>$d['asid'],'cid'=>$d['cid']));?>"><?php echo $d['content'];?></a>
					<span><?php echo $d['answer'];?>回答</span>
				</dd>
				<?php }}?>
			</dl>

			<dl class='answer-list'>
				<dt>
					<span class='reward-as'>高分悬赏问题</span>
					<a href=''>更多>></a>
				</dt>
				        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($noSolveHigh)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($noSolveHigh as $n) {
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
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($noSolveHigh)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
				<dd>
					<a href="<?php echo U('Show/index',array('asid'=>$n['asid'],'cid'=>$n['cid']));?>"><b><?php echo $n['reward'];?></b><?php echo $n['content'];?></a>
					<span><?php echo $n['answer'];?>回答</span>
				</dd>

				<?php }}?>
			</dl>

		</div>
		<!-- 右侧 -->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!-- 右侧 -->
<div id='right'>


        <?php if(isset($_SESSION['username'])&&isset($_SESSION['uid'])){ ?>
    <div class='userinfo'>
        <dl>
            <dt>
                <a href="<?php echo U('Member/index',array('uid'=>$_SESSION['uid']));?>"><img src="<?php echo $userInfo['face'];?>" width='48' height='48' alt="占位符"/></a>
            </dt>
            <dd class='username'>
                <a href="<?php echo U('Member/index',array('uid'=>$_SESSION['uid']));?>">
                    <b><?php echo $hd['session']['username'];?></b>
                </a>
                <a href="">
                    <i class='level lv<?php echo $userInfo['lv'];?>' title='Level <?php echo $userInfo['lv'];?>'></i>
                </a>
            </dd>
            <dd>金币：<a href="" style="color: #888888;"><?php echo $userInfo['point'];?><b class='point'></b></a></dd>
            <dd>经验值：<?php echo $userInfo['exp'];?></dd>
        </dl>
        <table>
            <tr>
                <td>回答数</td>
                <td>采纳率</td>
                <td class='last'><?php echo $userInfo['ask'];?></td>
            </tr>
            <tr>
                <td><a href=""><?php echo $userInfo['answer'];?></a></td>
                <td><a href=""><?php echo $userInfo['ratio'];?>%</a></td>
                <td class='last'><a href="">回答数</a></td>
            </tr>
        </table>
        <ul>
            <li><a href="">我提问的</a></li>
            <li><a href="">我回答的</a></li>
        </ul>
    </div>
      <?php }else{ ?>
     <div class='r-login'>
        <span class='login'><i></i>&nbsp;登录</span>
        <span class='register'><i></i>&nbsp;注册</span>
    </div>
    <?php } ?>




    <div class='clear'></div>
    <div class='star'>
        <p class='title'>后盾问答之星</p>
        <span class='star-name'>本日回答问题最多的人</span>



        <div class='star-info'>
            <div>
                <a href="<?php echo U('Member/index',array('uid'=>$eveStar['uid']));?>" class='star-face'>
                    <img src="<?php echo $eveStar['face'];?>" width='48px' height='48px' alt="头像站位"/>
                </a>
                <ul>
                    <li><a href="<?php echo U('Member/index',array('uid'=>$eveStar['uid']));?>"><?php echo $eveStar['username'];?></a></li>
                    <i class='level lv<?php echo $eveStar['lv'];?>' title='Level <?php echo $eveStar['lv'];?>'></i>
                </ul>
            </div>
            <ul class='star-count'>
                <li>回答数：<span><?php echo $eveStar['answer'];?></span></li>
                <li>采纳率：<span><?php echo $eveStar['ratio'];?>%</span></li>
            </ul>
        </div>



        <span class='star-name'>历史回答问题最多的人</span>
                <?php if(!empty($hisStar)){ ?>
        <div class='star-info'>
            <div>
                <a href="<?php echo U('Member/index',array('uid'=>$hisStar['uid']));?>" class='star-face'>
                    <img src="<?php echo $hisStar['face'];?>" width='48px' height='48px' alt="头像站位"/>
                </a>
                <ul>
                    <li><a href="<?php echo U('Member/index',array('uid'=>$hisStar['uid']));?>"><?php echo $hisStar['username'];?></a></li>
                    <i class='level lv<?php echo $hisStar['lv'];?>' title='Level <?php echo $hisStar['lv'];?>'></i>
                </ul>
            </div>
            <ul class='star-count'>
                <li>回答数：<span><?php echo $hisStar['answer'];?></span></li>
                <li>采纳率：<span><?php echo $hisStar['ratio'];?>%</span></li>
            </ul>

           </div>
            <?php } ?>
    </div>



    <div class='star-list'>
        <p class='title'>后盾问答助人光荣榜</p>
        <div>
            <ul class='ul-title'>
                <li>用户名</li>
                <li style='text-align:right;'>帮助过的人数</li>
            </ul>
                    <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($helper)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($helper as $d) {
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
                $hd['list'][d]['last']= (count($helper)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <ul class='ul-list'>
                <li>
                    <a href="<?php echo U('Member/index',array('uid'=>$d['uid']));?>"><i class='rank r<?php echo $hd['list']['n']['index'];?>'></i><?php echo $d['username'];?></a>
                    <span><?php echo $d['accept'];?></span>
                </li>

            </ul>
            <?php }}?>
        </div>
    </div>
</div>
<!-- ---右侧结束---- -->
<!-- ---右侧结束---- -->
	</div>
<!--------------------内容主体结束-------------------->
	<div class='clear'></div>

<!-- 底部 -->
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!-- 底部 -->
<div id='bottom'>
    <p><?php echo $hd['config']['RECORD'];?></p>
    <p><?php echo $hd['config']['COPY'];?></p>
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