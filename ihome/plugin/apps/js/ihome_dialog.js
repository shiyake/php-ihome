/*ihome_dialog.js*/

jQuery(function() {
	var html = "<div id=\"msg-container\"><div id=\"msg-box\"></div></div>";
	jQuery("body").append(html);
	
});



function resetDialog(){
	var msg_box = jQuery("#msg-box");
	var msg = jQuery("#msg");
	
	//取得浏览器窗口高宽
	var fullheight = jQuery(window).height();
	var fullwidth = jQuery(window).width();
	
	//取得子DIV器高宽
	var msgWidth = jQuery(msg).width();
	var msgHeight = jQuery(msg).height();
	
	//计算top和left
	var msgTop = (fullheight - msgHeight - 200) / 2;
	var msgLeft = (fullwidth - msgWidth) / 2;
	
	msg_box.css("top" , msgTop);
	if(!(jQuery.browser.msie&&(jQuery.browser.version == "7.0"))){
		msg_box.css("left" , msgLeft);
	} 
	msg_box.css("width" , msgWidth + "px");
	msg_box.css("height" , "auto");
}



function showDialog(){
	resetDialog();
	jQuery("#msg-container").fadeIn(500);
	//可拖动
	jQuery("#msg-box").draggable({opacity: 0.6,cursor: 'move',handle:'#handel'});
	//监听esc按键
	jQuery(document).bind("keydown", "esc", function (ev) { closeDialog();});
}

function closeDialog(){
	jQuery("#msg-container").fadeOut(500 ,function(){
		jQuery("#msg-box").empty();
	});
	
}

function settime(DivID ,times){
	jQuery("#"+DivID).text(--times);
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

