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
			<td class="th" colspan="20">问题列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>问题内容</td>
			<td>提问时间</td>
			<td>回答人数</td>
			<td>悬赏金币</td>
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
        if (empty($ask)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($ask as $d) {
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
                $hd['list'][d]['last']= (count($ask)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
		<tr>
			<td><?php echo $d['asid'];?></td>
			<td><?php echo $d['content'];?></td>
			<td><?php echo date('Y-m-d',$d['time']);?></td>
			<td><?php echo $d['answer'];?></td>
			<td><?php echo $d['reward'];?></td>
			<td>
				<a href="<?php echo U('Ask/del_ask',array('asid'=>$d['asid']));?>" class="del">删除</a>
			</td>
		</tr>
		<?php }}?>
	</table>
	<div class="page">
		共<?php echo $count;?>条 &nbsp
		<?php echo $page;?>
	</div>

</body>
</html>