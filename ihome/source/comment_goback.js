(function(){
    var jq1=jQuery.noConflict();
    var scroll = function(scrolltop, input) {
        if(jq1(window).scrollTop()>scrolltop)  {
            jq1("html,body").stop().animate({
                scrollTop:scrolltop
            },400,function(){
                input.focus();
            });        
        }
        else {
            jq1(function(){
                input.focus();
            });
        }
    };
    jq1(document).on("click",".replay_comment,.re",function(){
        var obj=jq1(this).closest('.s_clear');
        if (!obj.length) return;
        var scrolltop=obj.position().top;
        var input=obj.find('input').first();
        scroll(scrolltop, input);
    });
    jq1(document).on("click", ".complain_re", function() {
        var obj = jq1('#complain_docomment');
        if (!obj.length) return;
        var scrolltop = obj.position().top;
        var input = obj.find('#complain_op_msg').first();
        scroll(scrolltop, input);
    });
})();
