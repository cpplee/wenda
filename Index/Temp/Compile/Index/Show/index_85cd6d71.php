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