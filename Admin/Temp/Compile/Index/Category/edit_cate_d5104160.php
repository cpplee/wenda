<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="http://localhost/wenda/Admin/Index/View/Public/Css/add_category.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo U('Category/edit_cate');?>" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">修改分类</td>
			</tr>
			<tr>
				<td>分类名称</td>
				<td><input type="text" name="title" value="<?php echo $cate['title'];?>"/></td>
				<td><input type="hidden"  name="cid" value="<?php echo $hd['get']['cid'];?>"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>