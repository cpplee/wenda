<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/29
 * Time: 19:31
 */
class AskController extends CommonController
{


       public function ask(){


           $this->top_cate();


            $uid =$_SESSION['uid'];
            $point = M('user')->where(array('uid'=>$uid))->getField('point');

            $this->assign('point',$point);
           $this->display();



       }



       public function get_cate(){

           if(!IS_AJAX)  $this->error('页面错误');

           $pid =$_POST['pid'];

           $cate = M('category')->where(array('pid'=>$pid))->select();

            if($cate){



                $this->ajax($cate,'json');

            }else{



                $this->ajax($cate,'json');

            }
       }









    public function sub_ask(){

        if(!IS_POST) $this->error('发送错误');




          $uid=$_SESSION['uid'];


        $reward =$_POST['reward'];

        $data = array(
            'content'=>$_POST['content'],
            'time'=>time(),
            'reward'=>$reward,
            'uid'=>$uid,
            'cid'=>$_POST['cid']

        );

        p($data);
      M('ask')->add($data);
        
          $db=M('user');
        $db->dec('point',"uid=$uid",$reward);
       $db->inc('ask',"uid=$uid",1);
        $db->inc('exp',"uid=$uid",C('LV_ASK'));
        $this->success('发表成功');


    }



}