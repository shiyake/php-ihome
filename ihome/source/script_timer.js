var num = 60; // 倒计时时间 60秒

  $("#accessCodeBtn").click(function(){
    var clearTimer = setInterval(changeTime,1000);
    $("#accessCodeBtn").removeClass("accessCodeBtn").addClass("accessCodeBtnLock");
    $("#accessCodeBtn").attr({"disabled":true});
    $(".sendOutprompt").show();
    $("#accessCodeBtn").val(+num+ "秒后可重新获取"); // 初期值设置
    $.secAjax("SendEmailExc", {
    }, function(result){
    });
    function changeTime()
      {
      if(num > 0)
        {
        num = num - 1;
        curnum = num;
        $("#accessCodeBtn").val(+curnum+ "秒后可重新获取");
        }
      else
        {
        if(num == 0)
          {
          $("#accessCodeBtn").removeClass("accessCodeBtnLock").addClass("accessCodeBtn");
          $("#accessCodeBtn").val("重新获取"); // 到时间后的操作
          $("#accessCodeBtn").removeAttr("disabled");
          $(".sendOutprompt").hide();
          clearInterval(clearTimer);
          num = 60;
          }
        num = num - 1;
        }
      }
      clearTimer;