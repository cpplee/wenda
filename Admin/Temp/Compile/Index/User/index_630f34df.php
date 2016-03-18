<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://localhost/wenda/Admin/Index/View/Public/Css/public.css" />
	<script type="text/javascript" src="http://localhost/wenda/Admin/Index/View/Public/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/wenda/Admin/Index/View/Public/Js/public.js"></script>
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20">用户列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>用户名</td>
			<td>回答数</td>
			<td>被采纳数</td>
			<td>提问数</td>
			<td>金币</td>
			<td>经验</td>
			<td>最后登录时间</td>
			<td>最后登录IP</td>
			<td>注册时间</td>
			<td>帐号状态</td>
			<td>操作</td>
		</tr>
             <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($user)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($user as $d) {
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
                $hd['list'][d]['last']= (count($user)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
		<tr>
			<td><?php echo $d['uid'];?></td>
			<td><?php echo $d['username'];?></td>
			<td><?php echo $d['answer'];?></td>
			<td><?php echo $d['accept'];?></td>
			<td><?php echo $d['ask'];?></td>
			<td><?php echo $d['point'];?></td>
			<td><?php echo $d['exp'];?></td>
			    <?php if($d['logintime']==0){ ?>
				<td>从未登陆</td>
				<?php }else{ ?>
			<td><?php echo date('Y-m-d',$d['logintime']);?></td>
			<?php } ?>
			    <?php if($d['logintime']==''){ ?>
				<td>从未登陆</td>
				<?php }else{ ?>
			<td><?php echo $d['loginip'];?></td>
			<?php } ?>
			<td><?php echo $d['restime'];?></td>
			    <?php if($d['lock']==1){ ?>
			<td>锁定</td>
              <?php }else{ ?>
				<td>正常</td>
				<?php } ?>
			<td>
				    <?php if($d['lock']==1){ ?>
					  <a href="<?php echo U('User/unlock_user',array('uid'=>$d['uid']));?>">解锁</a>
					<?php }else{ ?>
					<a href="<?php echo U('User/lock_user',array('uid'=>$d['uid']));?>">锁定</a>
				<?php } ?>

			</td>
		</tr>
	 <?php }}?>
	</table>

</body>
</html>