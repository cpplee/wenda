<?php
//测试控制器类
class IndexController extends CommonController{
    //动作方法
    public function index(){
        //显示视图

//        $db=M('answer');
//        $data = $db->all();
//        p($data);

$this->assign_data();
        $cate = M('category')->where(array('pid'=>0))->select();

            foreach($cate as $k =>$v){

                 $cate[$k]['down']=M('category')->where(array('pid'=>$v['cid']))->select();

            }

      // $this->assign('a','爱的撒旦');
        $this->assign('cate',$cate);



         //未解决的悬赏

        $where=array(
            'solve'=>0,
          //  'reward'=>array('elt',20)

        );
        $field ='reward,content,answer,asid,cid';

        $askDb =M('ask');

     $noSolve = $askDb->where($where)->order('time DESC')->field($field)->limit(5)->select();

      $this->assign('noSolve',$noSolve);


        //未解决高分悬赏

        $where['reward'] = array('gt',20);

        $noSolveHigh =$askDb->where($where)->order('time DESC')->field($field)->limit(5)->select();


        $this->assign('noSolveHigh',$noSolveHigh);
        $this->display();

    }


    public function search(){

          if(IS_POST){
              $content = $_POST['search'];
              $field = 'ask.content as askc,answer.content as anc,title,ask.answer,ask.time,ask.asid';
              $where = array(
                  'accept'=>1,
                  " ask.content like '%$content%' "

              );

    $search =K('answerInfo')->where($where)->field($field)->select();

             // p($search);

    $this->assign('search',$search);

          }


      $this->display();
    }



}
