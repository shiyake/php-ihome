var num = 60; // ����ʱʱ�� 60��

  $("#accessCodeBtn").click(function(){
    var clearTimer = setInterval(changeTime,1000);
    $("#accessCodeBtn").removeClass("accessCodeBtn").addClass("accessCodeBtnLock");
    $("#accessCodeBtn").attr({"disabled":true});
    $(".sendOutprompt").show();
    $("#accessCodeBtn").val(+num+ "�������»�ȡ"); // ����ֵ����
    $.secAjax("SendEmailExc", {
    }, function(result){
    });
    function changeTime()
      {
      if(num > 0)
        {
        num = num - 1;
        curnum = num;
        $("#accessCodeBtn").val(+curnum+ "�������»�ȡ");
        }
      else
        {
        if(num == 0)
          {
          $("#accessCodeBtn").removeClass("accessCodeBtnLock").addClass("accessCodeBtn");
          $("#accessCodeBtn").val("���»�ȡ"); // ��ʱ���Ĳ���
          $("#accessCodeBtn").removeAttr("disabled");
          $(".sendOutprompt").hide();
          clearInterval(clearTimer);
          num = 60;
          }
        num = num - 1;
        }
      }
      clearTimer;