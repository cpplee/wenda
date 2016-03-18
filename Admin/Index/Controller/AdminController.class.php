<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/10
 * Time: 14:07
 */
class AdminController extends  CommonController
{


    public function index(){



       // $filed = 'aid,adminname,logintime,loginip,lock';

        $this->assign('admin',M('admin')->select());

        $this->display();


    }


    public  function lock(){

        $aid = Q('aid');

       // p($aid);

        M('admin')->where(array('aid'=>$aid))->save(array('lock'=>1));


        $this->success('锁定成功');



        


    }


    public function unlock(){

        $aid = Q('aid');

        M('admin')->where(array('aid'=>$aid))->save(array('lock'=>0));

        $this->success('解锁成功');


    }



    public function add_admin(){

        if(IS_POST){

            $passwdF = Q('passwdF');
            $passwdS = Q('passwdS');

            if(strlen($passwdF<6)) $this->error('密码不足6位置');
              if($passwdF!=$passwdS) $this->error('两次密码不相同');

            $username = Q('username');
            $stat = M('admin')->where(array('username'=>$username))->getField('aid');

              if($stat) $this->error('用户名已经存在');

            $data = array(
                'username'=>$username,
                'passwd'=>md5($passwdF)

            );
        M('admin')->add($data);

            $this->success('添加成功');

        }


        $this->display();

    }

}