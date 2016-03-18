<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/8
 * Time: 14:17
 */
class AskController extends CommonController
{

    public function index(){


        $w = $_GET['w'];
        switch($w){
            case 1:
                $where = array('solve'=>0);
                break;
            case 2:
                $where = array('solve'=>1);
                break;
            case 3:
                $where = array('answer'=>0);
                break;

            default:
                $where = null;
                break;
        }


        $count = M('ask')->where($where)->count();
        $page = new page($count,5,4,2);


        $field = 'content,time,answer,reward,asid';
        $ask = M('ask')->where($where)->field($field)->limit($page->limit())->select();

       // p($ask);
        $this->assign('count',$count);
        $this->assign('ask',$ask);
        $this->assign('page',$page->show());
        $this->display();

    }


    public function del_ask(){

        $asid = $_GET['asid'];
        $where = array('asid'=>$asid);

        $db = M('user');
        $ask=M('ask')->where($where)->find();

        //p($ask);
       // 提问者扣除金币
        $askUid = $ask['uid'];
        $db->dex('point',"uid=$askUid",C('GOLD_DEL_ASK'));

        if($ask['solve']){
            $answerUid = M('answer')->where(array('asid'=>$asid,'accept'=>1))->getField('uid');

           $db->dec('point',"uid=$answerUid",C(GOLD_DEL_ASK));

        }
        M('ask')->where($where)->delete();
        M('answer')->where($where)->delete();

        $this->success('删除成功');

    }


}