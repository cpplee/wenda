<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/8
 * Time: 16:36
 */
class CategoryController  extends CommonController
{


    public function index(){




        $cate = M('category')->select();
        $cate = $this->limitless($cate);


//       $catePid= array();
//        foreach($cate as $k ){
//
//            if($k['pid']==0){
//
//                $catePid[]=$k;
//
//            }
//
//        }

//        $this->assign('catePid',$catePid);
//
//        p($catePid);
        $this->assign('cate',$cate);

         $this->display();

    }


    public function add_cate(){

        if(IS_POST){

            $data = array(
                'title'=>$_POST['title'],
                 'pid'=>$_POST['pid']
            );
           M('category')->add($data);
            $this->success('添加成功!');

        }


        $this->display();
    }

    public function edit_cate(){


        if(IS_POST){

            $cid = $_POST['cid'];
            $title = $_POST['title'];
            M('category')->where(array('cid'=>$cid))->save(array('title'=>$title));

            $this->success('修改成功');
        }
         if(IS_GET){

         $cid = $_GET['cid'];
         $cate = M('category')->where(array('cid'=>$cid))->find();

         $this->assign('cate',$cate);

}

        $this->display();

    }


    public function del_cate(){

        $cid = $_GET['cid'];

        $cate = M('category')->field('cid,pid')->select();
       $cate = $this->son_cate($cate,$cid);
        $cate[] = $cid;
        $where = implode(',',$cate);
        $where = '('.$where.')';
       M('category')->where("cid in $where")->delete();
        $this->success('删除成功');
    }

    public function  add_top_cate(){
       if(IS_POST){

           $title = $_POST['title'];
           M('category')->add(array('title'=>$title));
           $this->success('添加成功!');
       }


        $this->display();

    }


}