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