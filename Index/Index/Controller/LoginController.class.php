<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/28
 * Time: 15:41
 */
class LoginController extends Controller
{

          public function ajax_login(){

            if(!IS_AJAX) $this->error('页面出错');


              $username = htmlspecialchars($_POST['username']);
              $pwd = md5(htmlspecialchars($_POST['pwd']));


              $passwd = M('user')->where(array('username'=>$username))->getField('passwd');

              if($pwd != $passwd){

                  $data =array(array('status'=>0,'message'=>'密码错误'));
                  // p($data);
                  $this->ajax($data,'json');


              }else{

                  $data =array(array('status'=>1,'message'=>'密码正确'));
                  // p($data);
                  $this->ajax($data,'json');

              }





          }



     public function login(){

         if(!IS_POST) $this->error('页面不存在');



         $username = htmlspecialchars($_POST['account']);
         $pwd = md5(htmlspecialchars($_POST['pwd']));



         $user = M('user')->where(array('username'=>$username))->find();



         if(empty($user)) $this->error('用户不存在');

         if($pwd !=$user['passwd']) $this->error('用户名或者密码错误');

         if($user['lock']==1) $this->error('您已经被锁定,请联系管理员');



      $uid= $user['uid'];

         $this->eve_exp($uid);

         $loginData = array(

             'logintime'=> time(),
             'loginip' =>ip_get_client(),

         );


         M('user')->where(array('uid'=>$user['uid']))->save($loginData);


         $auto = $_POST['auto'];

         if($auto=='on'){
            setcookie(session_name(),session_id(),C('COOKIE_TIME'),'/');



         }


         session('username',$username);
         session('uid',$user['uid']);
        // p($_SESSION);
        $this->success('登陆成功,正在跳转...');

     }



    private function eve_exp($uid){

        //获得当天时间戳
        $zero = strtotime(date('Y-m-d'));
        //获得用户上次登录时间

        $logintime = M('user')->where(array('uid'=>$uid))->getField('loginTime');

        if($logintime<$zero){

            M('user')->inc('exp',"uid=$uid",C('LV_LOGIN'));

        }

    }

      public function out(){

          unset($_SESSION['username']);

          unset($_SESSION['uid']);
          $this->success('退出登录成功');
      }




}