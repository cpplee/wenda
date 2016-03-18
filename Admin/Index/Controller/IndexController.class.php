<?php
//测试控制器类
class IndexController extends CommonController{
    //动作方法






    public function index(){
        //显示视图





      $this->display();
    }




    public function copy(){




       // P($_SERVER);

        $aid = $_SESSION['aid'];

        $admin = M('admin')->where(array('aid'=>$aid))->find();
    $this->assign('admin',$admin);


        $this->display();
    }



}
