<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
$arr = array(

    /********************************��֤��********************************/
    'CODE_FONT'                     => HDPHP_PATH . 'Data/Font/font.ttf', //����
    'CODE_STR'                      => '23456789abcdefghjkmnpqrstuvwsyz', //��֤������
    'CODE_WIDTH'                    => 120,         //���
    'CODE_HEIGHT'                   => 35,          //�߶�
    'CODE_BG_COLOR'                 => '#ffffff',   //������ɫ
    'CODE_LEN'                      => 1,           //��������
    'CODE_FONT_SIZE'                => 20,          //�����С
    'CODE_FONT_COLOR'               => '',   //������ɫ

);


return array_merge(include './Conf/webConfig.php',include './Conf/dbConfig.php',$arr);
?>