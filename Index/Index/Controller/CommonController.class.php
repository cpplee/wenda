<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/29
 * Time: 19:02
 */
class CommonController extends Controller
{

    public function __init(){

        if(!C('WEB_ON')) $this->error('网站正在调整，已经关闭');
    }

    public function assign_data(){

        $this->helper();
        $this->his_star();
        $this->eve_star();
        $this->right_info();
        $this->top_cate();


    }





    public function helper(){

        $field = 'uid,username,accept';

        $helper = M('user')->field($field)->order('accept DESC')->limit(10)->select();

        $this->assign('helper',$helper);

    }

    public function eve_star(){

        $zero = strtotime(date('Y-m-d'));

        $field = 'face,username,user.uid,exp,answer,user.accept';

       $eveStar= K('answer')->where(array('time'=>array('gt'=>$zero)))
        ->field($field)->group('username')->order('COUNT(username) DESC')->find();


        if(!empty($eveStar)){
            $eveStar['face']=$this->face($eveStar);
            $eveStar['lv']=$this->exp_to_level($eveStar);
            $eveStar['ratio']=$this->ratio($eveStar);
        }


        $this->assign('eveStar',$eveStar);
      //  p($eveStar);




    }


    public function his_star(){

        $field = 'face,username,user.uid,exp,answer,user.accept';

        $hisStar = K('answer')->field($field)->order('answer DESC')->find();


        if(!empty($hisStar)){
            $hisStar['face']=$this->face($hisStar);
            $hisStar['lv']=$this->exp_to_level($hisStar);
            $hisStar['ratio']=$this->ratio($hisStar);
        }

       // p($hisStar);
        $this->assign('hisStar',$hisStar);

    }



    public function right_info(){

        $uid = $_SESSION['uid'];

        if($uid){
            $field = 'face,exp,point,answer,ask,accept';
            $userInfo = M('user')->where(array('uid'=>$uid))->field($field)->find();

            $userInfo['face']=$this->face($userInfo);
            $userInfo['lv']=$this->exp_to_level($userInfo);
            $userInfo['ratio']=$this->ratio($userInfo);


          //  p($userInfo);
            $this->assign('userInfo',$userInfo);
        }
    }

        public function top_cate(){

        $topCate= M('category')->where(array('pid'=>0))->select();
            $this->assign('topCate',$topCate);
            $askNum= M('ask')->count();
            $this->assign('askNum',$askNum);

        }



    public function father_cate($arr,$pid){

        $array = array();
        foreach($arr as $v){
            if($v['cid']==$pid){
                $array[]=$v;
                $array = array_merge($array,$this->father_cate($arr,$v['pid']));
            }
        }
        return $array;
    }





    public function exp_to_level($user){
        $exp = $user['exp'];

        for($i=0;$i<21;$i++){

            if($exp<=C('LV'.$i)){
                return $i;
            }
        }

        if($exp>C('LV20')){

            return 20;
        }

    }

    public function face($user){
        if(!empty($user['face'])){

            return $user['face'];

        }

        return __PUBLIC__.'/Images/noface.gif';



    }

    public function ratio($user){

        if(!empty($user)&&$user['answer']){

            $num =$user['accept']/$user['answer'];
            $ratio =$num*100;
        }else{

            $ratio= 0;
        }
        return round($ratio);

    }
}