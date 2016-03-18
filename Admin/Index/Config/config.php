<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
$arr = array(

    /********************************验证码********************************/
    'CODE_FONT'                     => HDPHP_PATH . 'Data/Font/font.ttf', //字体
    'CODE_STR'                      => '23456789abcdefghjkmnpqrstuvwsyz', //验证码种子
    'CODE_WIDTH'                    => 120,         //宽度
    'CODE_HEIGHT'                   => 35,          //高度
    'CODE_BG_COLOR'                 => '#ffffff',   //背景颜色
    'CODE_LEN'                      => 1,           //文字数量
    'CODE_FONT_SIZE'                => 20,          //字体大小
    'CODE_FONT_COLOR'               => '',   //字体颜色

);


return array_merge(include './Conf/webConfig.php',include './Conf/dbConfig.php',$arr);
?>