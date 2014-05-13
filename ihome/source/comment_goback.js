(function(){
    var jq1=jQuery.noConflict();
    jq1(document).on("click",".replay_comment,.re",function(){
        var obj=jq1(this).closest('.s_clear');
        var scolltop=obj.position().top;
        var input=obj.find('input').first();
        if(jq1(window).scrollTop()>scolltop)  {
            jq1("html,body").stop().animate({
                scrollTop:scolltop
            },400,function(){
                input.focus();
            });        
        }
        else {
            jq1(function(){
                input.focus();
            });
        }
    });
})();
