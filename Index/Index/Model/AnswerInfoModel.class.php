<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/4
 * Time: 16:35
 */
class AnswerInfoModel extends ViewModel
{


    public  $table = 'answer';

    public $view = array(

        'answer'=>array(
            '_type'=>'left',
        ),

        'ask'=>array(

            '_type'=>'left',

            '_on'=>'ask.asid=answer.asid'



        ),

        'category'=>array(
            '_type'=>'left',
            '_on'=>'ask.cid=category.cid',



        )


    );


}