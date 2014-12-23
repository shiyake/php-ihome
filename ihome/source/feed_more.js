(function(){
    jq = jQuery.noConflict();
    jq(function(){
        jq("#feed_div").children().each(function(){
            if(jq(this).children().last("li").hasClass("feed_last")) {
                jq(this).children().last("li").removeClass("feed_last");
            }
        });
        jq("#feed_div").children().last("ul").children().last("li").addClass("feed_last");
        if(jq("#feed_div").html().indexOf("没有相关动态")!=-1) {
            jq(".feed_more_btn").css({"display":"none"}); 
        }
    });
    jq(document).on("click",".feed_more_btn",function(){
        
        if(jq("#feed_div").html().indexOf("没有相关动态")!=-1) {
            jq(".feed_more_btn").css({"display":"none"}); 
        }
    });
})();

