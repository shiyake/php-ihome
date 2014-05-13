(function(){
    jQuery.noConflict();
    jQuery(function(){
         jQuery(document).on('click','.do_a_op_',function(){
            
             var doid = jQuery(this).data("doid");
             ajaxget('cp.php?ac=doing&op=docomment&doid='+doid+'&id=','docomment_form_'+doid+'_0');
             var statu = jQuery(this).parents(".feed_li_inner").first().next(".sub_doing").css("display");
             var docomment = jQuery(this).parents(".feed_li_inner").first().next(".sub_doing");
             if(statu=='none') {
                 docomment.css({"display":"block"});
             }
             else {
                 docomment.css({"display":"none"});
             }
             
         });
    });
})();
