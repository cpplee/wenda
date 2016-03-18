<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/4
 * Time: 13:37
 */
class MemberController extends  CommonController
{

    public $flag ;

    public function __construction(){




    }

    public function index(){

        $flag=__FUNCTION__;


        $this->top_cate();
        $this->left_info();



        $uid= $_GET['uid'];

        $where=array('ask.uid'=>$uid);
        $field = 'content,title,ask.answer,time,asid,ask.cid';
//我的提问
       $ask= K('ask')->where($where)->field($field)->order('time DESC')->limit(5)->select();


      // p($ask);
       $this->assign('ask',$ask);



//我的回答

        $whereAnswer=array('answer.uid'=>$uid);
        $field='answer.content,title,ask.answer,answer.time,ask.asid,ask.cid';

        $answerInfo= K('answerInfo')->where($whereAnswer)->order('answer.time DESC')->limit(5)->select();

      // p($answerInfo);
        $this->assign('answerInfo',$answerInfo);





        $this->assign('flag',$flag);

        $this->display();




    }



    private function left_info(){

        $uid = $_GET['uid'];

        $field = 'face,username,point,exp,answer,ask,accept';
        $member = M('user')->where(array('uid'=>$uid))->field($field)->find();

         if(!empty($member)){

              $member['face']=$this->face($member);
             $member['lv']=$this->exp_to_level($member);
             $member['ratio']=$this->ratio($member);


           //  p($member);
         $this->assign('member',$member);
         }else{

             $this->error('用户不存在');

         }

        $rank = isset($_SESSION['uid']) && $uid == $_SESSION['uid']?'我':'他';

       // p($rank);
        $this->assign('rank',$rank);



    }


    public function my_ask(){



        $flag=__FUNCTION__;
        $this->top_cate();
        $this->left_info();

        $uid =  $_GET['uid'];

        p($uid);
        $field ='content,title,ask.answer,time,asid,ask.cid';

        $where = array(
            'uid'=>$uid,
            'solve'=>0,

        );
        $whereK = array(
            'ask.uid'=>$uid,
            'solve'=>0,

        );


        if($_GET['w']==1){
            $where['solve']=1;
            $whereK['solve']=1;


        }


        $db=M('ask');
        $dbK=K('ask');

   $noSolvePage = new page($db->where($where)->count(),5,5,2);
        $noSolve = $dbK->field($field)->where($whereK)->order('time DESC')->
            limit($noSolvePage->limit())->select();



        //p($noSolve);






        $this->assign('flag',$flag);


        $this->assign('noSolve',$noSolve);
        $this->assign('noSolvePage',$noSolvePage->show());
        $this->display();
    }




    public function my_answer(){

        $flag=__FUNCTION__;
       // p($flag);
        $this->top_cate();

        $this->left_info();
       //  p(213);

        $uid =$_GET['uid'];

        $db = M('answer');

        $field='answer.content as ac,ask.content as askc,title,ask.answer,answer.time,ask.asid,ask.cid';


         $where = array('answer.uid'=>$uid);
        $wherePage=array('uid'=>$uid);

        if($_GET['w']==1){

            $where['accept']=1;
                $wherePage['accept']=1;
        }

        $page = new page($db->where($wherePage)->count(),1,5,2);

        $answer = K('answerInfo')->where($where)->field($field)->order('answer.time DESC')->limit($page->limit())->select();

        p($answer);




        $this->assign('answer',$answer);
        $this->assign('page',$page->show());

        $this->assign('flag',$flag);
        $this->display();

        }




    public function my_level(){

        $flag=__FUNCTION__;
        $this->top_cate();
        $this->left_info();



        $uid = $_GET['uid'];

        $user = M('user')->where(array('uid'=>$uid))->field('exp')->find();



        $level = $this->exp_to_level($user);

         $nextExp = C('LV'.($level+1))-$user['exp'];

          $nextExp = ($nextExp<0)?0:$nextExp;

        $this->assign('nextExp',$nextExp);
        $this->assign('level',$level);

        $levelExp = array();
        for($i=0;$i<21;$i++){

           $levelExp[$i] =C('LV'.$i);



        }

        //p($levelExp);
        $this->assign('exp',$user['exp']);
        $this->assign('levelExp',$levelExp);
        $this->assign('flag',$flag);
        $this->display();



    }

   public function my_gold(){


       $flag=__FUNCTION__;
       $this->top_cate();
       $this->left_info();






       $this->assign('flag',$flag);
       $this->display();



   }

  public function my_face(){


      $flag=__FUNCTION__;
      $this->top_cate();
      $this->left_info();






      $this->assign('flag',$flag);
      $uid = $_GET['uid'];

      $db = M('user');
      $where = array('uid'=>$uid);
      if(IS_POST){
         // p($_FILES);
          $up= new Upload('upload/'.date('Y/m/d'));
          $file = $up->upload();

          $oldFace = $db->where($where)->getField('face');
          $oldFace ='./'.substr($oldFace,strpos($oldFace,'upload'));

          if(is_file($oldFace)){

              if(!unlink($oldFace)){

                  $this->error('没有权限!');
              }


          }



          $userFace = $file[0]['url'];
        $db->where($where)->save(array('face'=>$userFace));

          $this->success('上传成功');
      }

          $user= $db->where($where)->field('face')->find();
          $this->assign('face',$this->face($user));



          $this->display();









  }



}