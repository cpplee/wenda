<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/27
 * Time: 19:10
 */
class RegController extends Controller
{


       public function ajax_username(){

           if(!IS_AJAX){

               $this->error('错误页面');
           }

       $username = $_POST['username'];

       //  P($username);

           if(M('user')->where(array('username'=>$username))->getField('uid')){

             $data =array(array('status'=>0,'message'=>'用户已经存在'));
      //   p($data);
               $this->ajax($data,'json');

           }else{

               $data =array(array('status'=>1,'message'=>'用户名不存在,可以注册'));
              // p($data);
               $this->ajax($data,'json');

           }







       }

       public function code(){
           $code = new code();
           $code->show();


       }





     public function ajax_code(){

         if(!IS_AJAX) $this->error('页面不存在');

         $code = strtoupper(htmlspecialchars($_POST['verify']));


         if($code != $_SESSION['code']){

             $data =array(array('status'=>0,'message'=>'验证码错误'));
             // p($data);
             $this->ajax($data,'json');
         }else{

             $data =array(array('status'=>1,'message'=>'验证码正确'));
             // p($data);
             $this->ajax($data,'json');
         }
     }


    public function register(){

       // p($_POST);

        if(!C('RES_ON')) $this->error('网站正在调整，停止注册,非常抱歉');
        if(!IS_POST) $this->error('页面不存在');


        p($_POST);
            $data = array(
                'username'=>htmlspecialchars($_POST['username']),
                'passwd'=>md5(htmlspecialchars($_POST['pwd'])),
                'restime'=>time(),
            );


         //   p($data);


            M('user')->add($data);
            $this->success('注册成功');







    }

}