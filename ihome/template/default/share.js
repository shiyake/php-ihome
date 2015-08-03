function byteLength(sStr) {
	aMatch = sStr.match(/[^\x00-\x80]/g);
	return (sStr.length + (!aMatch ? 0 : aMatch.length));
}

function getStrbylen(str, len) {
	var num = 0;
	var strlen = 0;
	var newstr = "";
	var obj_value_arr = str.split("");
	for (var i = 0; i < obj_value_arr.length; i++) {
		if (i < len && num + byteLength(obj_value_arr[i]) <= len) {
			num += byteLength(obj_value_arr[i]);
			strlen = i + 1;
		}
	}
	if (str.length > strlen) {
		newstr = str.substr(0, strlen);
	} else {
		newstr = str;
	}
	return newstr;
}

function textCounter(obj, showid, maxlimit) {
	var len = obj.value.replace(/[^\x00-\xff]/g, "xx").length;
	var showobj = $(showid)[0];
	if (len / 2 > maxlimit) {
		obj.value = getStrbylen(obj.value, maxlimit * 2);
		showobj.innerHTML = '0';
	} else {
		showobj.innerHTML = Math.floor(maxlimit - len / 2);
	}
	if (maxlimit - len / 2 > 0) {
		showobj.style.color = "";
	} else {
		showobj.style.color = "red";
	}
}

function atfriend(uid, name) {
    var messageContent = jQuery('#message').val();
    messageContent = messageContent + '@'+name+'('+uid+')'+' ';
    jQuery("#message").val(messageContent);
}

$ = jQuery;
$(function() {
    $('.quickflip-wrapper').quickFlip();

    textCounter($('textarea')[0], '.wordTip span', 140);
    if($('#loginname').length != 0) {
        $('.contain-box')[0].style.display = 'none';
    }

    $('#logout').click(function() {
        var url = 'cp.php?ac=common&op=logout&uhash=' + $('input[name=hash]').val() +'&redirecturl=' + encodeURIComponent(window.location.href);
        window.location.href = url;
    });

    var action = 'do.php?ac=' + $('input[name=login_action]').val() + '&' + $('input[name=url_plus]').val() + '&ref&redirecturl=' + encodeURIComponent(window.location.href);
    $('#loginform').attr('action', action);
    $('.share_login_close').click(function(){
        $('.contain-box')[0].style.display = 'none';
    });
    $('.not_login').click(function(){
        $('.contain-box')[0].style.display = 'block';
    });

    //share function
    $('#sharebutton').click(function(){
        if($('#loginname').length == 0){
            $('.contain-box')[0].style.display = 'block';
        }else {
            $('#shareform').submit();
        }
    });   
});
