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
    
    jq1(document).on("click",".comment_click_btn",function() {
        var myId=jq1(this).attr('id');
        rootid = jq1("#" + myId).data('rootid');
        upid = jq1("#upid_" + rootid).val();
        jq1.post("cp.php?ac=treecomment&op=add&rootid="+rootid+"&id=0&inajax=1",{
            "message":jq1("#tree_message_"+rootid+"_0").val(),
            "upid":upid,
            "rootid":rootid,
            "commentsubmit":"true",
            "formhash":jq1("#hashform_" + rootid).val()
        },function(data){
            var str=jq1(data).find('root').text();
            if(str.indexOf("进行的操作完成了")>=0){
                show('complate');
                treecomment_get('treecomment_'+rootid, rootid, 1);
            }
            else {
                show('fail');
            }
        },"xml");
    });
        
    });
