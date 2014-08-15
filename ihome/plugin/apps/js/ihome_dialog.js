/*ihome_dialog.js*/

jq(function() {
	var html = "<div id=\"msg-container\"><div id=\"msg-box\"></div></div>";
	jq("body").append(html);
	
});



function resetDialog(){
	var msg_box = jq("#msg-box");
	var msg = jq("#msg");
	
	//取得浏览器窗口高宽
	var fullheight = jq(window).height();
	var fullwidth = jq(window).width();
	
	//取得子DIV器高宽
	var msgWidth = jq(msg).width();
	var msgHeight = jq(msg).height();
	
	//计算top和left
	var msgTop = (fullheight - msgHeight - 200) / 2;
	var msgLeft = (fullwidth - msgWidth) / 2;
	
	msg_box.css("top" , msgTop);
	if(!(jq.browser.msie&&(jq.browser.version == "7.0"))){
		msg_box.css("left" , msgLeft);
	} 
	msg_box.css("width" , msgWidth + "px");
	msg_box.css("height" , "auto");
}



function showDialog(){
	resetDialog();
	jq("#msg-container").fadeIn(500);
	//可拖动
	jq("#msg-box").draggable({opacity: 0.6,cursor: 'move',handle:'#handel'});
	//监听esc按键
	jq(document).bind("keydown", "esc", function (ev) { closeDialog();});
}

function closeDialog(){
	jq("#msg-container").fadeOut(500 ,function(){
		jq("#msg-box").empty();
	});
	
}

function settime(DivID ,times){
	jq("#"+DivID).text(--times);
	if (times > 0)
		setTimeout("settime("+DivID+","+times+");", 1000);
	else
		window.location.href = "http://www.17sucai.com";
}


function ihome_dialog(){


}


function ihome_alert(){
	
}


function ihome_confirm(){

}

