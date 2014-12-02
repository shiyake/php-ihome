var jq1=jQuery.noConflict();
jq1(function(){
    function Message_out(message) {
        jq1(".message").html(message);
            jq1(".showMessage").css({
                "display":"block"
            });
        jq1(".message").css({
            "display":"block"
        });    
        jq1(".showMessage").stop().animate({
                "opacity":"0.4"
            },700);
            jq1(".showMessage").delay(1000).animate({
                "opacity":"0"
            },700,function(){
                jq1(".showMessage").css({
                    "display":"none" 
                });
                jq1(".message").css({
                    "display":"none"
                });
            }); 
    }
    
    function show(statu) {
       if(statu == 'complate') {
            var message="<img src='/template/default/image/comment_ok.png'></img><div class='comment_text'>评论成功</div>";
            Message_out(message);
            return true;
       }
       else if(statu == 'fail') {
            var message="<img src='/template/default/image/comment_fail.png'></img><div class='comment_text'>评论失败</div>";
            Message_out(message);
            return false;
       }
    }
    function isdoorfeed(myId) {
        var cnt=0;
        for (var i = 0 ;i < myId.length ;i++) {
            if(myId[i] == '_') {
                cnt++;
            }
            if(cnt == 2) {
                myId = myId.substr(i+1,myId.length);
                break;
            }
        }
        var res = new Array();
        if(cnt==1) {
            var id;
            for (var i=0 ; i < myId.length; i++)  {
                if(myId[i] == '_') {
                    id = myId.substr(i+1,myId.length);
                    break;
                }
            }
            res.push(id);
            return res;
        }
        else {
            var id,doid;
            for (var i=0 ; i < myId.length ;i++) {
                if(myId[i] == '_') {
                    doid = myId.substr(0,i);
                    id= myId.substr(i+1,myId.length);
                    break;
                }
            }
            res.push(id,doid);
            return res;
        }
    }
    jq1(document).on("click",".comment_click_btn",function() {
        var $this = jq1(this);
        if (!$this.hasClass('disabled')) {
            $this.addClass('disabled');
        }
        var myId=$this.attr('id');
        res=isdoorfeed(myId);
        if(res.length == 2) {
            id = res[0];
            doid = res[1];
            if (trim(jq1("#do_message_"+doid+"_"+id).val()) == '') {
                show('fail');
                jq($this).removeClass('disabled');
                return;
            }
            jq1.post("cp.php?ac=doing&op=comment&doid="+doid+"&id="+id+"&inajax=1",{
                "message":jq1("#do_message_"+doid+"_"+id).val(),
                "commentsubmit":"true",
                "formhash":jq1(".hashform").val()
            },function(data){
                var str=jq1(data).find('root').text();
                if(str.indexOf("进行的操作完成了")>0){
                    show('complate');
                    docomment_get('docomment_'+doid,1);
                }
                else {
                    show('fail');
                    jq($this).removeClass('disabled');
                }
            },"xml");
        }
        else if(res.length == 1) {
            id = res[0];
            if (trim(jq1("#feedmessage_"+id).val()) == '') {
                show('fail');
                jq($this).removeClass('disabled');
                return;
            }
            jq1.post("cp.php?ac=feed&feedid="+id+"&inajax=1",{
                "message":jq1("#feedmessage_"+id).val(),
                "commentsubmit":"true",
                "formhash":jq1(".hashform").val(),
                "refer":jq1(".referform").val()
            },function(data){
            
                var str=jq1(data).find('root').text();
                if(str.indexOf("进行的操作完成了")>0){
                    show('complate');
                    feedcomment_get(id,1);
                }
                else {
                    show('fail');
                    jq($this).removeClass('disabled');
                }
            },"xml");
        }
    });
});
