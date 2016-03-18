<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo $hd['config']['WEBNAME'];?></title>
<meta name="keywords" content="<?php echo $hd['config']['KEYWORDS'];?>"/>
<meta name="description" content="<?php echo $hd['config']['DISCRIPTION'];?>"/>
<link rel="stylesheet" href="http://localhost:88/wenda/Index/Index/View/Public/Css/common.css" />
<script type='text/javascript'>
HOST = 'http://localhost:88';
ROOT = 'http://localhost:88/wenda';
WEB = 'http://localhost:88/wenda/index.php';
URL = 'http://localhost:88/wenda/index.php/Index/Index/search';
APP = 'http://localhost:88/wenda/Index';
COMMON = 'http://localhost:88/wenda/Index/Common';
HDPHP = 'http://localhost:88/wenda/hdphp/hdphp';
HDPHP_DATA = 'http://localhost:88/wenda/hdphp/hdphp/Data';
HDPHP_EXTEND = 'http://localhost:88/wenda/hdphp/hdphp/Extend';
MODULE = 'http://localhost:88/wenda/index.php/Index';
CONTROLLER = 'http://localhost:88/wenda/index.php/Index/Index';
ACTION = 'http://localhost:88/wenda/index.php/Index/Index/search';
STATIC = 'http://localhost:88/wenda/Static';
HDPHP_TPL = 'http://localhost:88/wenda/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost:88/wenda/Index/Index/View';
PUBLIC = 'http://localhost:88/wenda/Index/Index/View/Public';
CONTROLLER_VIEW = 'http://localhost:88/wenda/Index/Index/View/Index';
</script>
<script type="text/javascript" src='http://localhost:88/wenda/Index/Index/View/Public/Js/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src='http://localhost:88/wenda/Index/Index/View/Public/Js/top-bar.js'></script>
<script type="text/javascript"  src="http://localhost:88/wenda/Index/Index/View/Public/Js/validate.js"></script>
	<link rel="stylesheet" href="http://localhost:88/wenda/Index/Index/View/Public/Css/index.css" />
</head>
<body>
	<!-- 搜索顶部 -->
	<div class="search_top">
		<div class="sealeft">
			<a href="<?php echo U('');?>"><img src="http://localhost:88/wenda/Index/Index/View/Public/images/t0150f9b7bd1b41d84e.png" alt="" /></a>
			<a href="http://www.houdunwang.com">后盾顶尖PHP培训</a>
			<a href="http://www.houdunwang.com">后盾网</a>
		</div>

	</div>
	<!-- 搜索顶部结束 -->
	<!-- 搜索框 -->
	<div class="search_box">
		<form action="<?php echo U('Index/search');?> method="POST">
		<input type="text" name="search" class="searchInput"/>
		<input type="submit" value="搜索答案" class="sub"/>
		<a href="<?php echo U('Ask/ask');?>">我要提问</a>
		</form>
	</div>
	<!-- 搜索框结束 -->
	<!-- 搜索内容 -->
	    <?php if(!empty($search)){ ?>
	<div class="searcont">
		        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($search)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($search as $d) {
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
                $hd['list'][d]['last']= (count($search)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
		<ul>
			<li> <a href="<?php echo U('Show/index',array('asid'=>$d['asid']));?>" class="title"><?php echo $d['askc'];?></a> </li>
			<li><?php echo $d['anc'];?></li>
			<li class="time"><span><?php echo $d['title'];?>- 1个回答</span> - 提问时间: <?php echo date('Y-m-d',$d['time']);?></li>
		</ul>

    <?php }}?>
	</div>
	<?php } ?>
	<!-- 搜索内容结束 -->

<!-- 底部 -->
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!-- 底部 -->
<div id='bottom'>
    <p><?php echo $hd['config']['RECORD'];?></p>
    <p><?php echo $hd['config']['COPY'];?></p>
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