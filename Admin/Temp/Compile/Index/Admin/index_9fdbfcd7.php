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
			<td class="th" colspan="20">后台用户列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>用户名</td>
			<td>最后登录时间</td>
			<td>最后登录IP</td>
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
        if (empty($admin)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($admin as $d) {
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
                $hd['list'][d]['last']= (count($admin)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
		<tr>
			<td><?php echo $d['aid'];?></td>
			<td><?php echo $d['username'];?></td>
			    <?php if($d['logintime']==0){ ?>
				<td>从未登陆</td>
				<?php }else{ ?>
			<td><?php echo date('Y-m-d',$d['logintime']);?></td>
				<?php } ?>
			    <?php if($d['loginip']==''){ ?>

				<td>从未登陆</td>
				<?php }else{ ?>
				<td><?php echo $d['loginip'];?></td>
				<?php } ?>
			    <?php if($d['lock']==1){ ?>
			<td>锁定</td>
				<?php }else{ ?>
				<td>正常</td>
				<?php } ?>

			    <?php if($d['username']<>'admin'){ ?>
			    <?php if($d['lock']==1){ ?>
				<td><a href="<?php echo U('Admin/unlock',array('aid'=>$d['aid']));?>">解锁</a></td>
				<?php }else{ ?>
				<td><a href="<?php echo U('Admin/lock',array('aid'=>$d['aid']));?>">加锁</a></td>
			<?php } ?>
				<?php }else{ ?>
				<td>admin用户不得锁定</td>
			<?php } ?>
		</tr>

		<?php }}?>
	</table>

</body>
</html>