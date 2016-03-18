<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://localhost/wenda/Admin/Index/View/Public/css/public.css" />
</head>
<body>
	<form action="<?php echo U('Common/edit');?>" method='post'>
		<table class="table">
			<tr>
				<th colspan='2'>经验级别规则设置</th>
			</tr>
			<tr>
				<td align='right'>登录：</td>
				<td>
					+ <input type="text" name='LV_LOGIN' value='<?php echo $hd['config']['LV_LOGIN'];?>' />
				</td>
			</tr>
			<tr>
				<td align='right'>提问：</td>
				<td>
					+ <input type="text" name='LV_ASK' value='<?php echo $hd['config']['LV_ASK'];?>' />
				</td>
			</tr>
			<tr>
				<td align='right'>回答：</td>
				<td>
					+ <input type="text" name='LV_ANSWER' value='<?php echo $hd['config']['LV_ANSWER'];?>' />
				</td>
			</tr>
			<tr>
				<td align='right'>采纳：</td>
				<td>
					+ <input type="text" name='LV_ACCEPT' value='<?php echo $hd['config']['LV_ACCEPT'];?>' />
				</td>
			</tr>
		</table>
		<table class='table'>
			<tr>
				<th colspan='8'>各等级所需经验</th>
			</tr>

			<tr>
				<td>LV1:</td>
				<td>
					<input type="text" name='lv1' value='<?php echo $hd['config']['LV1'];?>' />
				</td>
			</tr>

			<tr>
				<td>LV2:</td>
				<td>
					<input type="text" name='lv2' value='<?php echo $hd['config']['LV2'];?>' />
				</td>
			</tr>

			<tr>
			<td>LV3:</td>
			<td>
				<input type="text" name='lv3' value='<?php echo $hd['config']['LV3'];?>' />
			</td>
			</tr>


			<tr>
				<td colspan='8' align='center' height='60'>
					<input type="submit" value='保存修改' class='input_button'/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>