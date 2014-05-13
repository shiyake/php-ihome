(function(){
    var jq=jQuery.noConflict();
    jq(function(){
        jq(".event_icon").mousemove(function(e){
            var l=e.pageX;
            var t=e.pageY;
            var x=jq(this).offset().left;
            var y=jq(this).offset().top;
            var h=jq(this).css("height");
            var w=jq(this).css("width");
            var img=new Image();
            var src=jq(this).find("img").attr("src");
            img.src=src;
            var imgW=img.width;
            var imgH=img.height;
            w=parseInt(w);
            h=parseInt(h);
            var rl=(l-x)/w*imgW/2*-1;
            var rt=(t-y)/h*imgH/2*-1;
            jq(this).find("a").css({"display":"none"});
            jq(this).css({
                "width":w,
                "height":h
            });
            jq(this).css({
                "background":"url("+src+")",
                "background-position-x":rl,
                "background-position-y":rt
            });
        });
        jq(".event_icon").mouseout(function(){
            jq(this).find("a").css({"display":""});
        });
    });
})();
