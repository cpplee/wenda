<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://localhost/wenda/Admin/Index/View/Public/css/public.css" />
</head>
<body>
   <form action="<?php echo U('Common/edit');?>" method="POST">
	<table class="table">
		<tr>
			<td colspan='2' class="th">金币奖励规则设置</td>
		</tr>
<tr>
				<td align='right' width='45%'>回答：</td>
				<td>
					+ <input type="text" name='GOLD_ANSWER' value='<?php echo $hd['config']['GOLD_ANSWER'];?>'/>
				</td>
			</tr>
			<tr>
				<td align='right'>回答被采纳：</td>
				<td>
					+ <input type="text" name='GOLD_ACCEPT' value='<?php echo $hd['config']['GOLD_ACCEPT'];?>'/>
				</td>
			</tr>
			<tr>
				<td align='right'>回答被删除：</td>
				<td>
					- <input type="text" name='GOLD_DEL_ANSWER' value='<?php echo $hd['config']['GOLD_DEL_ANSWER'];?>'/>
				</td>
			</tr>
			<tr>
				<td align='right'>提问被删除：</td>
				<td>
					- <input type="text" name='GOLD_DEL_ASK' value='<?php echo $hd['config']['GOLD_DEL_ASK'];?>'/>
				</td>
			</tr>
			<!--<tr>-->
				<!--<td align='right'>采纳回答被删除：</td>-->
				<!--<td>-->
					<!--提问者：&nbsp;- <input type="text" name='GOLD_DEL_ASK' value='<?php echo $hd['config']['GOLD_DEL_ASK'];?>'/>&nbsp;&nbsp;-->
					<!--回答者：&nbsp;- <input type="text" name='GOLD_DEL_ANSWER' value='<?php echo $hd['config']['GOLD_DEL_ANSWER'];?>'/>-->
				<!--</td>-->
			<!--</tr>-->
			<tr>
				<td colspan='2' height='60' align='center'>
					<input type="submit" value='保存修改' class='input_button'/>
				</td>
			</tr>

</table>
   </form>
</body>
</html>