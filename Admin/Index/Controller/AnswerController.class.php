<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/8
 * Time: 15:29
 */
class AnswerController extends CommonController
{



    public function index(){

        $w = $_GET['w'];

        switch($w){

            case 1:
                $where = array('accept'=>0);
                break;
            case 2:
                $where = array('accept'=>1);
                break;

           default:
                $where = null;
                break;



        }


        $db=M('answer');

        $count =$db->where($where)->count();

        $page = new page($count,10,5,2);

        $field = 'anid,content,time';
        $answer = $db->where($where)->field($field)->limit($page->limit())->select();

        $this->assign('count',$count);
        $this->assign('page',$page->show());
        $this->assign('answer',$answer);

        $this->display();
    }

    public function del_answer(){

        $anid = $_GET['anid'];
        $where = array('anid'=>$anid);

        $db = M('user');

        $answer = M('answer')->where($where)->field('uid,accept')->find();

          p($answer);


        $anUid =$answer['uid'];

        $db->dec('point',"uid=$anUid",C('GOLD_DEL_ANSWER'));

        if($answer['accept']){

            $askDb = M('ask');
            $where = array('asid'=>$answer['asid']);

            $askUid = $askDb->where($where)->getField('uid');
            $db->dec('point',"uid=$askUid",C('GOLD_DEL_ANSWER'));

            $askDb->where($where)->save(array('solve'=>0));

        }

        M('answer')->where(array('anid'=>$anid))->delete();

        $this->success('É¾³ý³É¹¦!');



    }



}