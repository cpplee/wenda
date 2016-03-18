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
URL = 'http://localhost/wenda/index.php/Index/Member/my_ask/uid/14';
APP = 'http://localhost/wenda/Index';
COMMON = 'http://localhost/wenda/Index/Common';
HDPHP = 'http://localhost/wenda/hdphp/hdphp';
HDPHP_DATA = 'http://localhost/wenda/hdphp/hdphp/Data';
HDPHP_EXTEND = 'http://localhost/wenda/hdphp/hdphp/Extend';
MODULE = 'http://localhost/wenda/index.php/Index';
CONTROLLER = 'http://localhost/wenda/index.php/Index/Member';
ACTION = 'http://localhost/wenda/index.php/Index/Member/my_ask';
STATIC = 'http://localhost/wenda/Static';
HDPHP_TPL = 'http://localhost/wenda/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/wenda/Index/Index/View';
PUBLIC = 'http://localhost/wenda/Index/Index/View/Public';
CONTROLLER_VIEW = 'http://localhost/wenda/Index/Index/View/Member';
</script>
<script type="text/javascript" src='http://localhost/wenda/Index/Index/View/Public/Js/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src='http://localhost/wenda/Index/Index/View/Public/Js/top-bar.js'></script>
<script type="text/javascript"  src="http://localhost/wenda/Index/Index/View/Public/Js/validate.js"></script>
	<link rel="stylesheet" href="http://localhost/wenda/Index/Index/View/Public/Css/member.css" />
	<script type="text/javascript" src='http://localhost/wenda/Index/Index/View/Public/Js/member.js'></script>
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
        <form action="" method=''>
            <input type="text" name='' class='sech-cons'/>
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
<!--------------------中部-------------------->
	<div id='center'>
<!-- 左侧 -->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div id='left'>
    <div class='userinfo'>
        <dl>
            <dt>
                <a href="<?php echo U('Member/index',array('uid'=>$_GET['uid']));?>"><img src="<?php echo $member['face'];?>" width='48' height='48' alt="占位符"/></a>
            </dt>
            <dd class='username'>
                <a href=""><b><?php echo $hd['session']['username'];?></b>
                </a>
                <a href="<?php echo U('Member/index',array('uid'=>$_GET['uid']));?>">
                    <i class='level lv<?php echo $member['lv'];?>' title='Level <?php echo $member['lv'];?>'></i>
                </a>
            </dd>
            <dd>金币：<a href="" style="color: #888888;"><b class='point'><?php echo $member['point'];?></b></a></dd>
            <dd>经验值：<?php echo $member['exp'];?></dd>
        </dl>
        <table>
            <tr>
                <td>回答数</td>
                <td>采纳率</td>
                <td class='last'>提问数</td>
            </tr>
            <tr>
                <td><a href=""><?php echo $member['answer'];?></a></td>
                <td><a href=""><?php echo $member['ratio'];?>%</a></td>
                <td class='last'><a href=""><?php echo $member['ask'];?></a></td>
            </tr>
        </table>
    </div>

    <ul>
        <li class='myhome     <?php if($flag=='index' ){ ?>cur<?php } ?>'>
            <a href="<?php echo U('Member/index',array('uid'=>$_GET['uid']));?>">我的首页</a>
        </li>
        <li class='myask     <?php if($flag=='my_ask' ){ ?>cur<?php } ?>'>
            <a href="<?php echo U('Member/my_ask',array('uid'=>$_GET['uid']));?>">我的提问</a>
        </li>
        <li class='myanswer     <?php if($flag=='my_answer' ){ ?>cur<?php } ?>'>
            <a href="<?php echo U('Member/my_answer',array('uid'=>$_GET['uid']));?>">我的回答</a>
        </li>
        <li class='mylevel     <?php if($flag=='my_level' ){ ?>cur<?php } ?>'>
            <a href="<?php echo U('Member/my_level',array('uid'=>$_GET['uid']));?>">我的等级</a>
        </li>
        <li class='mygold     <?php if($flag=='my_gold' ){ ?>cur<?php } ?>'>
            <a href="<?php echo U('Member/my_gold',array('uid'=>$_GET['uid']));?>">我的金币</a>
        </li>
        <li class='myface     <?php if($flag=='my_face' ){ ?>cur<?php } ?>'>
            <a href="<?php echo U('Member/my_face',array('uid'=>$_GET['uid']));?>">上传头像</a>
        </li>

        <li style="background:none"></li>
    </ul>
</div>
<!-- 左侧结束 -->
		<div id='right'>
			<p class='title'>我的提问</p>
			<ul class='ask-filter'>
				<li     <?php if($_GET['w']<>1){ ?>class='cur'<?php } ?>><a href="<?php echo U('Member/my_ask',array('uid'=>$_GET['uid']));?>"> 待解决问题</a></li>
				<li     <?php if($_GET['w']==1){ ?>class='cur'<?php } ?>><a href="<?php echo U('Member/my_ask',array('uid'=>$_GET['uid'],'w'=>1));?>">已解决问题</a></li>
			</ul>
			<div class='list list-filter'>
				<table>


                        <?php if(empty($noSolve)){ ?>
					<tr height='140'>
						    <?php if($_GET['w']<>1){ ?>
						<td>你还没有待解决的提问</td>
							<?php }else{ ?>
							<td>你还没有已解决的提问</td>
						<?php } ?>
					</tr>
						<?php }else{ ?>
					<tr>
						<th class='t1'>标题</th>
						<th>回答数</th>
						<th class='t3'>更新时间</th>
					</tr>

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


					<tr>
						<td class='t1'>
							<a href="<?php echo U('Show/index',array('asid'=>$d['asid'],'cid'=>$d['cid']));?>"><?php echo $d['content'];?></a><span>[<?php echo $d['title'];?>]</span>
						</td>
						<td>20</td>
						<td class='t3'><?php echo date('Y-m-d',$d['time']);?></td>
					</tr>

						<?php }}?>

                        <tr>
							<td>  <?php echo $noSolvePage;?></td>

						</tr>
					<?php } ?>
				</table>
			</div>
			<div class='list list-filter hidden'>
				<table>
					<tr height='140'>
						<td>你还没有已解决的提问</td>
					</tr>
					<tr>
						<th class='t1'>标题</th>
						<th>回答</th>
						<th class='t3'>更新时间</th>
					</tr>

					<tr>
						<td class='t1'>
							<a href=""></a><span>[电脑/硬件]</span>
						</td>
						<td>20</td>
						<td class='t3'>2014-9-4</td>
					</tr>
				</table>
			</div>
		</div>
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