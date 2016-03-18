/**
 * Created by Administrator on 2015/12/8.
 */
$(function(){


   $('tr[pid!=0]').hide();


  $('.showPlus').toggle(function(){


   $(this).removeClass().addClass('showMinus');

      var index = $(this).parents('tr').attr('cid');

         $('tr[pid='+index+']').show();





  },function(){


      $(this).removeClass().addClass('showPlus');

      var index = $(this).parents('tr').attr('cid');

      $('tr[pid='+index+']').hide();

  });


})