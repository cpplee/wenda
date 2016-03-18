<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/1
 * Time: 16:29
 */
class ShowController extends CommonController
{


    /*
     *
     * 问题显示
     *
     */


    public function index(){


        $this->top_cate();
        $this->right_info();
        $this->his_star();
        $this->eve_star();
        $this->helper();
        $cid = $_GET['cid'];

      //  p($cid);
        $cate = M('category')->select();

        $father = $this->father_cate($cate,$cid);
        krsort($father);
     $this->assign('father',$father);
       // p($father);

        $asid = $_GET['asid'];


        $ask = K('ask')->where(array('asid'=>$asid))->find();

      $this->assign('ask',$ask);

$lv=$this->exp_to_level($ask);
        $this->assign('lv',$lv);
//        p($ask);
//        p($lv);







        $count = K('answer')->where(array('asid'=>$asid,'answer.accept'=>0))->count();

        $page = new page($count,1,4,2);

        $answer = K('answer')->where(array('asid'=>$asid,'answer.accept'=>0))->limit($page->limit())->select();

        $this->assign('page',$page->show());
        $this->assign('answer',$answer);

        $this->assign('count',$count);
        $this->assign('face',$this->face($answer));


        $where = array(
            'asid'=>$asid,
            'answer.accept'=>1
        );

        $answerOK=K('answer')->where($where)->find();
        $this->assign('answerOK',$answerOK);
        // p($answerOK);

        $this->assign('ratio',$this->ratio($answerOK));

        $this->assign('lvOK',$this->exp_to_level($answerOK));
        $this->assign('faceOK',$this->face($answerOK));

        $whereRelationAnswer= array(
            'solve'=>0,
            'cid'=>$cid,
            'asid'=>array('neq',$asid)

        );
        $alike = M('ask')->where($whereRelationAnswer)->limit(5)->select();

        $this->assign('alike',$alike);
        $this->assign();


        $this->display();


    }


    public function answer(){

        if(!IS_POST) $this->error('页面不存在');

        $asid=$_POST['asid'];
       $uid= $_SESSION['uid'];
        $data = array(
            'asid'=>$asid,
            'uid'=>$uid,
            'time'=>time(),
            'content'=>$_POST['content']

        );



        M('answer')->add($data);

        //修改用户信息
        $userDb = M('user');
        $userDb->inc('point',"uid=$uid",C('GOLD_ANSWER'));

        $userDb->inc('answer',"uid=$uid",1);
        $userDb->inc('exp',"uid=$uid",C('LV_ANSWER'));

        M('ask')->inc('answer',"asid=$asid",1);



        $this->success('回答成功');
    }





    public function accept(){
       //修改答案为采纳

        $anid = $_GET['anid'];
       // p($anid);

        M('answer')->where(array('anid'=>$anid))->save(array('accept'=>1));
        //修改问题为解决
        $asid = $_GET['asid'];

        M('ask')->where(array('asid'=>$asid))->save(array('solve'=>1));

       //修改提问用户
        $askUid = M('ask')->where(array('asid'=>$asid))->getField('uid');


        $userDb = M('user');
        $userDb->inc('point',"uid=$askUid",C('GOLD_ACCEPT'));
        $userDb->inc('exp',"uid=$askUid",C('LV_ACCEPT'));

        //修改回答用户信息
      //  p($anid);
        $reward = M('ask')->where(array('asid'=>$asid))->getField('reward');

        $anUid = M('answer')->where(array('anid'=>$anid))->getField('uid');
       //p($anUid);
        $userDb->inc('point',"uid=$anUid",C('GOLD_ACCEPT'));
        $userDb->inc('exp',"uid=$anUid",C('LV_ACCEPT'));
        $userDb->inc('accept',"uid=$anUid",1);
        $userDb->inc('point',"uid=$anUid",$reward);

        $this->success('采纳成功');









    }




}