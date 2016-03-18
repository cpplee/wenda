<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/1
 * Time: 20:27
 */
class AskModel extends ViewModel
{

   public $table='ask';

    public $view = array(


        'ask'=>array(
            '_type'=>'INNER',

        ),

        'user'=>array(

            '_type'=>'INNER',
          //  '_field'=>'username,exp',
            '_on'=>'user.uid=ask.uid'

        ),
        'category'=>array(
            '_type'=>'INNER',
            '_on'=>'category.cid=ask.cid'

        )




    );



}