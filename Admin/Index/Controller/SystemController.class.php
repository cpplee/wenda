<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/9
 * Time: 16:28
 */
class SystemController extends CommonController
{


    public function web_set(){


        $this->display();

    }



    public function passwd(){

        if(IS_POST){

          $passwdF = Q('passwdF');
          $passwdS = Q('passwdS');

            p($passwdF);
            p($passwdS);

       if(strlen($passwdF<6)) $this->error('密码不得少于6位');
            if($passwdF != $passwdS) $this->error('两次密码不相同');

            $aid = $_SESSION['aid'];
           M('admin')->where(array('aid'=>$aid))->save(array('passwd'=>md5($passwdF)));

            $this->success('修改成功');


        }






        $this->display();



    }


}