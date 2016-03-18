<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/7
 * Time: 19:50
 */
class CommonController extends Controller
{

    public function __init(){
      if(!isset($_SESSION['adminname'])||!isset($_SESSION['aid'])){

       go('Login/index');

      }

    }


    public function limitless($data,$pid=0,$level=0){

        $arr = array();
        foreach($data as $v){

            if($v['pid']==$pid){

                $v['level']=$level;
                $v['html']=str_repeat('_',($level*9));

                $arr[] =$v;
                $arr = array_merge($arr,$this->limitless($data,$v['cid'],$level+1));

            }

        }

         return $arr;

    }


    public function son_cate($arr,$cid){
        $array = array();
        foreach($arr as $v){
            if($v['pid']==$cid){

                $array[] = $v['cid'];
                $array = array_merge($array,$this->son_cate($arr,$v['cid']));

            }


        }

                  return $array;
    }



    public function edit(){

        $path = './Conf/webConfig.php';
//        p(include $path);
//
//        p($_POST);

    $config = array_merge(include $path,array_change_key_case($_POST,CASE_UPPER));
      //  p($config);
   $str = "<?php\r\nif (!defined('HDPHP_PATH'))exit('No direct script access allowed');\r\nreturn ".var_export($config,true).";\r\n?>";

    //    p($str);
         if(file_put_contents($path,$str)){

              $this->success('修改成功 !');
         }else{

             $this->error('修改失败 !');
         }
    }

}