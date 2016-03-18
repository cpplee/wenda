<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://localhost/wenda/Admin/Index/View/Public/Css/public.css" />
	<script type="text/javascript" src="http://localhost/wenda/Admin/Index/View/Public/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/wenda/Admin/Index/View/Public/Js/public.js"></script>
	<script type="text/javascript" src="http://localhost/wenda/Admin/Index/View/Public/Js/Category.js"></script>
</head>

<body>
	<table class="table">
		<tr pid=0>
			<td class="th" colspan="20">分类列表</td>
		</tr>
		<tr  pid=0 class="tableTop">
			<td class="tdLittle0 center">展开</td>
			<td class="tdLittle1">ID</td>
			<td>分类名称</td>
			<td class="tdLtitle7">操作</td>
		</tr>


		        <?php
        //初始化
        $hd['list']['n'] = array(
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
            foreach ($cate as $n) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=500)break;
                //第几个值
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($cate)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
		<tr pid="<?php echo $n['pid'];?>" cid="<?php echo $n['cid'];?>">
			<td><a href="javascript:void(0)" class="showPlus"></a></td>
			<td><?php echo $n['cid'];?></td>
			<td><?php echo $n['html'];?><?php echo $n['title'];?></td>

			<td>
				[<a href="<?php echo U('Category/add_cate',array('cid'=>$n['cid']));?>">添加子分类</a>][
				<a href="<?php echo U('Category/edit_cate',array('cid'=>$n['cid']));?>">修改</a>][
				<a href="<?php echo U('Category/del_cate',array('cid'=>$n['cid']));?>" class="del">删除</a>]
			</td>
		</tr>
		<?php }}?>



	</table>

</body>
</html>