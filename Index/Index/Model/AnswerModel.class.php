<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/2
 * Time: 13:37
 */
class AnswerModel extends ViewModel
{
    public $table = 'answer';

    public $view = array(


        'answer'=>array(
            '_type'=>'INNER',

        ),


        'user'=>array(

            '_type'=>'INNER',
            //  '_field'=>'username,exp',
            '_on'=>'user.uid=answer.uid'

        )



    );



}