<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/7
 * Time: 18:15
 */
class LoginController  extends Controller
{




    public function index(){




        $this->display();
    }




    public function code(){

        $code = new code();
        $code->show();
    }


    public function login(){

        if(!IS_POST) $this->error('页面不存在');
        $username = $_POST['userName'];


        $code = strtoupper(htmlspecialchars($_POST['verify']));
        if($code != $_SESSION['code']) $this->error('验证码错误');


        $db = M('admin');
        $user= $db->where(array('username'=>$username))->find();
       // p($user);
        if($user['lock']==1) $this->error('您已经被锁定，请联系管理员');

        $passwd = md5($_POST['psd']);

        if($passwd !=$user['passwd']) $this->error('密码不正确请重新输入');



        $data = array(
            'logintime'=>time(),
            'loginip' =>ip_get_client(),

        );

        $db->where(array('username'=>$username))->save($data);

         session('adminname',$username);
        session('aid',$user['aid']);

        $this->success('登陆成功!,正在为您跳转','Index/index');
    }


    public function out(){

        session_unset();
        session_destroy();
        go('Index/index');

    }


}