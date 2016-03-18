<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/2
 * Time: 19:18
 */
class ListController extends CommonController
{



     public function index(){

    $cid= $_GET['cid'];
         $this->top_cate();
         $db=M('category');

        $fatherCate= $this->father_cate($db->select(),$cid);
        krsort($fatherCate);
         $this->assign('fatherCate',$fatherCate);

       //  p($cid);

         $sonCate = $db->where(array('pid'=>$cid))->select();
       //  p($sonCate);
         if(empty($sonCate)){
             $pid = $db->where(array('cid'=>$cid))->getField('pid');
             $cidEmpty=$pid;
             $sonCate = $db->where(array('pid'=>$cidEmpty))->select();

         }
       //  $sonCate = $db->where(array('pid'=>$cidEmpty))->select();
        // p($sonCate);
         $this->assign('sonCate',$sonCate);

        $where = $_GET['where'];

         if(isset($where)&&$where<4){
             $condition =$where;
         }else{
             $condition = 0;
         }

         switch($condition){
             case 0:
                 $where = array('solve'=>0,'reward'=>array('elt'=>20));
                 $whereCount = array('solve'=>0,'reward'=>array('elt'=>20));
                 break;
             case 1:
                 $where = array('solve'=>1);
                 $whereCount = array('solve'=>1);
                 break;
             case 2:
                 $where = array('solve'=>0,'reward'=>array('gt'=>20));
                 $whereCount = array('solve'=>0,'reward'=>array('gt'=>20));
                 break;
             case 3:
                 $where = array('solve'=>0,'ask.answer'=>0);
                 $whereCount = array('solve'=>0,'answer'=>0);
                 break;
         }




         if($cid!=0){

             $where['ask.cid']=$cid;
         }




         $whereCount['cid']=$cid;
         $count = M('ask')->where($whereCount)->count();
       //  p($count);
           $page = new page($count,1,5,2);
         $this->assign('page',$page->show());




         // p($where);
         $field='reward,content,ask.answer,time,title,asid,ask.cid';
        $ask = K('ask')->where($where)->field($field)->limit($page->limit())->select();
        // p($ask);
         $this->assign('ask',$ask);







         $this->display();

     }


}