<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/7
 * Time: 20:41
 */
class UserController extends CommonController
{



    public function index(){

        $user = M('user')->select();

        $this->assign('user',$user);
        $this->display();
    }


    public function lock_user(){

        $uid = $_GET['uid'];
        M('user')->where(array('uid'=>$uid))->save(array('lock'=>1));
        $this->success('锁定成功!');


    }

    public function unlock_user(){


        $uid = $_GET['uid'];
        M('user')->where(array('uid'=>$uid))->save(array('lock'=>0));
        $this->success('解锁成功!');

    }


}