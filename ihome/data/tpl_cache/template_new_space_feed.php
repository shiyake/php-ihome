<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('template/new/space_feed|template/new/header|template/new/space_status_feed|template/new/space_menu|template/new/space_feed_li|template/new/space_feed_li|template/new/space_olym_medal|template/new/footer', '1382771247', 'template/new/space_feed');?><?php if(empty($_TPL['getmore'])) { ?>	
<?php $_TPL['titles'] = array('首页'); ?>
<?php if(empty($_SGLOBAL['inajax'])) { ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=<?=$_SC['charset']?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title><?php if($_TPL['titles']) { ?><?php if(is_array($_TPL['titles'])) { foreach($_TPL['titles'] as $value) { ?><?php if($value) { ?><?=$value?> - <?php } ?><?php } } ?><?php } ?><?php if($_SN[$space['uid']]) { ?><?=$_SN[$space['uid']]?> - <?php } ?><?=$_SCONFIG['sitename']?></title>
<script language="javascript" type="text/javascript" src="source/script_cookie.js"></script>
<script language="javascript" type="text/javascript" src="source/script_common.js"></script>
<script language="javascript" type="text/javascript" src="source/script_menu.js"></script>
<script language="javascript" type="text/javascript" src="source/script_ajax.js"></script>
<script language="javascript" type="text/javascript" src="source/script_face.js"></script>
<script language="javascript" type="text/javascript" src="source/script_manage.js"></script>
<script language="javascript" type="text/javascript" src="plugin/at/jquery-1.8.2.min.js"></script>
<script language="javascript" type="text/javascript" src="plugin/at/jquery.caret.js" ></script>
<script language="javascript" type="text/javascript" src="plugin/at/jquery.at.js"></script>
<script language="javascript" type="text/javascript" src="plugin/at/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="source/jqcloud-1.0.4.min.js"></script>
<script language="javascript" type="text/javascript" src="plugin/at/at.js"></script>
<script type="text/javascript">

/*
jQuery.noConflict();
jQuery(function ($) {
    var timer = setInterval("fetchNotice()",2000);
});

function fetchNotice() {
var common_title = document.title;
var x = new Ajax('XML', 'fetchNotice');
x.get('plugin.php?pluginid=notice&op=fetchnotice&uid=<?=$_SGLOBAL['supe_uid']?>', function(s){
if (s =='1') {
document.title='【新信息】'+common_title
};
if (s =='2') {
document.title='【新私信】'+common_title
};
if (s =='3') {
document.title='【新通知】'+common_title
};
});
}
*/
</script>

<script type="text/javascript">

var jq = jQuery.noConflict();

var WindowHeight;

var DivLeftHeight;
var DivRightHeight;
var DivFooterHeight;

var DivFooterTop;
var DivLeftTop;
var DivRightTop;


function WScrool(){
var DivLeftLeft = jq("#app_sidebarbox").offset().left;
var DivRightLeft = jq("#sidebarbox").offset().left;
var WindowTop = jq(window).scrollTop();

var DivLeftPos = DivLeftHeight - WindowHeight - WindowTop + DivLeftTop;
var DivRightPos = DivRightHeight - WindowHeight - WindowTop + DivRightTop;
//var DivFooterTop = jq("#footer").offset().top;
var DivFooterPos = DivFooterTop - WindowHeight - WindowTop;

if(DivFooterPos > 0){
//alert("1");
if(DivLeftPos < 0 && DivRightPos< 0 && DivLeftPos > DivRightPos){
DD = DivLeftPos - DivRightPos;

jq("#sidebar").get(0).style.cssText = "position:fixed;"+"left:"+DivRightLeft+";bottom:"+DD+"px;";
jq("#app_sidebar").get(0).style.cssText = "position:fixed;"+"left:"+DivLeftLeft+";bottom:"+"0px;";
//alert("11");
}else if(DivLeftPos < 0 && DivRightPos< 0 && DivLeftPos <= DivRightPos){
DD = DivRightPos - DivLeftPos;

jq("#sidebar").get(0).style.cssText = "position:fixed;"+"left:"+DivRightLeft+";bottom:"+"0px;";
jq("#app_sidebar").get(0).style.cssText = "position:fixed;"+"left:"+DivLeftLeft+";bottom:"+DD+"px;";
//alert("12");
}else if(DivLeftPos > 0 && DivRightPos < 0){
DD = 0 - DivRightPos;

jq("#sidebar").get(0).style.cssText = "position:fixed" + "left:"+DivRightLeft + "bottom:"+DD+"px";
jq("#app_sidebar").get(0).style.cssText = "position:fixed" + "left:"+DivLeftLeft + "bottom:"+"0px";
//alert("13");
}else if(DivLeftPos < 0 && DivRightPos > 0){
DD = 0 - DivLeftPos;

jq("#sidebar").get(0).style.cssText = "position:fixed"+"left:"+DivRightLeft+"bottom:"+"0px";
jq("#app_sidebar").get(0).style.cssText = "position:fixed" + "left:"+DivLeftLeft+"bottom:"+DD+"px";
//alert("14");
}else if(DivLeftPos > 0 && DivRightPos > 0){

jq("#sidebar").get(0).style.cssText = "position:fixed"+"left:"+DivRightLeft+"bottom:"+(0-DivRightPos)+"px";
jq("#app_sidebar").get(0).style.cssText = "position:fixed"+ "left:"+DivLeftLeft+ "bottom:"+(0-DivLeftPos)+"px";
//alert("15");
}
}else{
//alert("2");
if(DivLeftPos < 0 && DivRightPos< 0 && DivLeftPos > DivRightPos){
DD = DivLeftPos - DivRightPos;

jq("#sidebar").get(0).style.cssText = "position:fixed;"+"left:"+DivRightLeft+";bottom:"+DD+"px;";
jq("#app_sidebar").get(0).style.cssText = "position:fixed;"+"left:"+DivLeftLeft+";bottom:"+(0-DivFooterPos)+"px;";
//alert("21");
}else if(DivLeftPos < 0 && DivRightPos< 0 && DivLeftPos <= DivRightPos){
DD = DivRightPos - DivLeftPos;

jq("#sidebar").get(0).style.cssText = "position:fixed;"+"left:"+DivRightLeft+";bottom:"+(0-DivFooterPos)+"px;";
jq("#app_sidebar").get(0).style.cssText = "position:fixed;"+"left:"+DivLeftLeft+";bottom:"+DD+"px;";
//alert("22");
}else if(DivLeftPos > 0 && DivRightPos < 0){
DD = 0 - DivRightPos;

jq("#sidebar").get(0).style.cssText = "position:fixed"+"left:"+DivRightLeft+ "bottom:"+DD+"px";
jq("#app_sidebar").get(0).style.cssText = "position:fixed"+"left:"+DivLeftLeft+ "bottom:"+(0-DivFooterPos)+"px";
//alert("23");
}else if(DivLeftPos < 0 && DivRightPos > 0){
DD = 0 - DivLeftPos;

jq("#sidebar").get(0).style.cssText = "position:fixed"+"left:"+DivRightLeft+"bottom:"+(0-DivFooterPos)+"px";
jq("#app_sidebar").get(0).style.cssText = "position:fixed"+ "left:"+DivLeftLeft+ "bottom:"+DD+"px";
//alert("24");
}else if(DivLeftPos > 0 && DivRightPos > 0){

jq("#sidebar").get(0).style.cssText = "position:fixed"+"left:"+DivRightLeft+ "bottom:"+ (0-DivRightPos) + "px";
jq("#app_sidebar").get(0).style.cssText = "position:fixed"+ "left:"+DivLeftLeft+ "bottom:"+ (0-DivLeftPos) + "px";
//alert("25");
}
}

//jq("#count").html("WH="+WindowHeight+"<br />WT="+WindowTop+"<br/>DLH="+DivLeftHeight+"<br/>DRH="+DivRightHeight+"<br/>DLP="+ DivLeftPos+"<br />DRP="+DivRightPos+"<br/>DLL="+DivLeftLeft+"<br/>DRL="+DivRightLeft+"<br/>DFT="+DivFooterTop);
//alert("OK2");
}

function GetAttribute(){
//WindowHeight = jq(window).height();
WindowHeight = document.body.clientHeight ;

DivLeftHeight = jq("#app_sidebar").height();
DivLeftTop = jq("#app_sidebarbox").offset().top;
DivRightHeight = jq("#sidebar").height();
DivRightTop = jq("#sidebarbox").offset().top;

DivFooterTop = jq("#footer").offset().top;
DivFooterHeight = jq("#footer").height();

//alert("OK3");
}



jq(document).ready(function(){

DivFooterTop = jq("#footer").offset().top;
DivLeftTop = jq("#app_sidebarbox").offset().top;
DivRightTop = jq("#sidebarbox").offset().top;

//WindowHeight = jq(window).height();
WindowHeight = document.body.clientHeight ;

DivLeftHeight = jq("#app_sidebar").height();
DivRightHeight = jq("#sidebar").height();
DivFooterHeight = jq("#footer").height();

//alert(DivLeftTop);


jq(window).scroll(WScrool);
jq(window).resize(function(){
//alert("OK");
GetAttribute();
WScrool();
//alert(jq("#app_sidebar").offset().top);
});
//alert(DivFooterTop);

});
/*jq(window).scroll(function(){

alert("OK2");

});*/


</script>
<style type="text/css">
@import url(template/default/style.css);
@import url(template/default/jqcloud.css);
<?php if(!empty($_SGLOBAL['space_theme'])) { ?>
@import url(theme/<?=$_SGLOBAL['space_theme']?>/style.css);
<?php } elseif($_SCONFIG['template'] != 'default') { ?>
@import url(template/<?=$_SCONFIG['template']?>/style.css);
<?php } ?>
<?php if($_TPL['css']) { ?>
@import url(template/default/<?=$_TPL['css']?>.css);
<?php } ?>
<?php if(!empty($_SGLOBAL['space_css'])) { ?>
<?=$_SGLOBAL['space_css']?>
<?php } ?>
@import url(plugin/at/jquery.at.css);
</style>
<?php if($_SCONFIG['template'] == 'blue') { ?>
<!--[if IE]>
<style type="text/css">
#mainbg{background:transparent url('template/blue/image/30perFFF.png');}
</style>
<![endif]-->
<?php } ?>
<link rel="shortcut icon" href="image/favicon.ico" />
<link rel="edituri" type="application/rsd+xml" title="rsd" href="xmlrpc.php?rsd=<?=$space['uid']?>" />
</head>
<body onload="bodyonload()">
<!--<div id="count" style="position: fixed; top: 200px;  text-align:left;">测试</div>-->
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="bg_pic_repeat">
<div id="Container">
    <div id="WebHead">
<div id="header">
<?php if($_SGLOBAL['ad']['header']) { ?><div id="ad_header"><?php adshow('header'); ?></div><?php } ?>
<div class="headerwarp">
<h1 class="logo"><a href="index.php"><img src="template/<?=$_SCONFIG['template']?>/image/logo.png" alt="<?=$_SCONFIG['sitename']?>" /></a></h1>
<ul class="menu">
<?php if($_SGLOBAL['supe_uid']) { ?>
<li><a href="space.php?do=home">首页</a></li>
<li><a href="space.php">个人主页</a></li>
<li><a href="space.php?do=friend">好友</a></li>
<li><a href="plugin.php?pluginid=apps"><font color="#FF6700">应用大厅</font></a></li>
<li><a href="space.php?do=mtag">小组</a></li>
<?php $Tyear=date("Y",time()); ?>
<?php if(time()<=strtotime("$Tyear-7-10") && time()>=strtotime("$Tyear-5-10")) { ?>
<li><a href="space.php?do=mtag&tagid=294">离别寄语</a></li>
<?php } else { ?>
<?php if(time()<=strtotime("$Tyear-9-11") && time()>=strtotime("$Tyear-7-11")) { ?>
<!--<li><a href="space.php?uid=<?=$_SGLOBAL['supe_uid']?>&do=blog&view=freshman">新生须知</a></li>-->
<?php } ?>
<?php } ?>

<?php } else { ?>
<li><a href="index.php">首页</a></li>
<?php } ?>

<?php if($_SGLOBAL['appmenu']) { ?>
<?php if($_SGLOBAL['appmenus']) { ?>
<li class="dropmenu" id="ucappmenu" onclick="showMenu(this.id)">
<a href="javascript:;">站内导航</a>
</li>
<?php } else { ?>
<li><a target="_blank" href="<?=$_SGLOBAL['appmenu']['url']?>" title="<?=$_SGLOBAL['appmenu']['name']?>"><?=$_SGLOBAL['appmenu']['name']?></a></li>
<?php } ?>
<?php } ?>

<?php if($_SGLOBAL['supe_uid']) { ?>
<li><a href="space.php?do=pm<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?>&filter=newpm<?php } ?>">消息<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?><font color="yellow">（新）</font><?php } ?></a></li>
<?php if($_SGLOBAL['member']['allnotenum']) { ?><li class="notify" id="membernotemenu" onmouseover="showMenu(this.id)"><a href="space.php?do=notice"><?=$_SGLOBAL['member']['allnotenum']?>个提醒</a></li><?php } ?>
<?php } ?>
</ul>
<ul class="menu_other">
<?php if($_SGLOBAL['supe_uid']) { ?>
<li>
<a href="cp.php">设置</a>
</li>
<li>
<a href="cp.php?ac=common&op=logout&uhash=<?=$_SGLOBAL['uhash']?>">退出</a>
</li>
<?php } else { ?>
<li><a href="do.php?ac=<?=$_SCONFIG['activate_action']?>" class="login_thumb" title="激活"><?php echo avatar($_SGLOBAL[supe_uid]); ?></a></li>
<li><a href="index.php">登录</a>
</li>
<li><a href="do.php?ac=<?=$_SCONFIG['activate_action']?>">激活</a></li>
<?php } ?>
</ul>
<ul class="head_search">
<li>
<form method="get" action="cp.php" >
<input id="search_input" class="head_search_input" name="searchkey" value="找人" type="text" onblur="if(this.value=='') {this.value='找人';this.form.keywords.style.color='#666666'}" onclick="if(this.value=='找人'){this.value='';this.form.keywords.style.color='#000'}" frame="void" />
<input type="image" class="head_search_submit" src="template/default/image/head_search_submit.png" width="25" height="23" value="go" />
<input type="hidden" name="searchmode" value="1" />
<input type="hidden" name="ac" value="friend" />
<input type="hidden" name="op" value="search" />
</form>
</li>		
</ul>
</div>
</div>
</div>
</div>
<div id="bg_pic">
<div id="blank_pic"></div>
<div id="wrap" >

<?php if(empty($_TPL['nosidebar'])) { ?>

<div id="mainbg">
<div id="main">
<div id="app_sidebarbox">
<div id="app_sidebar">
<?php if($_SGLOBAL['supe_uid']) { ?>
<div class="header_avatar">
<?php echo avatar($_SGLOBAL[supe_uid],middle); ?>		
</div>
<div class="header_account">

<?php if($_SCONFIG['realname']) { ?>
<?php if($_SGLOBAL['member']['namestatus']) { ?>
<font color="red"><?=$_SGLOBAL['member']['name']?></font>
&nbsp;<img src="image/realname_yes.gif" align="absmiddle" alt="已通过实名认证" title="已通过实名认证">
<?php } else { ?>
<?=$_SGLOBAL['supe_username']?>&nbsp;<img src="image/realname_no.gif" align="absmiddle" alt="未通过实名认证" title="未通过实名认证">
<?php } ?>
<?php } ?>

</div>
<?php if($_SGLOBAL['member']['resideprovince']&&$_SGLOBAL['member']['residecity']) { ?><div class="header_resident"><?=$_SGLOBAL['member']['resideprovince']?> <?=$_SGLOBAL['member']['residecity']?></div><?php } ?>
<div class="header_score">积分：<?=$_SGLOBAL['member']['credit']?></div>
<div class="header_updatetime">
更新 ： <?php echo sgmdate('Y-m-d',$space[updatetime],1); ?>
</div>
<ul class="app_list" id="default_userapp">
<li><img src="image/app/doing.png"><a href="space.php?do=doing">足迹</a><em><a href="space.php?do=doing" class="gray">我踩</a></em></li>
<li><img src="image/app/album.png"><a href="space.php?do=album">相册</a><em><a href="cp.php?ac=upload" class="gray">上传</a></em></li>
<li><img src="image/app/blog.png"><a href="space.php?do=blog">日志</a><em><a href="cp.php?ac=blog" class="gray">发表</a></em></li>
<li><img src="image/app/poll.png"/><a href="space.php?do=poll">投票</a><em><a href="cp.php?ac=poll" class="gray">发起</a></em></li>
<li><img src="image/app/publicpage.png"><a href="space.php?do=public">公共主页</a></li>
<li><img src="image/app/event.png"/><a href="space.php?do=event">活动</a><em><a href="cp.php?ac=event" class="gray">发起</a></em></li>
<li><img src="image/app/share.png"><a href="space.php?do=share">分享</a></li>
</ul>

<ul class="app_list topline" id="my_defaultapp">
<li><a href="buaasso.php?m=sso&to=buaabt" target= "_blank" title="去往BT" style="height:auto;"><img src="image/app/logo_bt.png"></a></li>
<li><img src="image/app/mall.png"><a href="jifen.php" title="积分商城">积分商城</a></li>
<li><img src="plugin/wall/image/default.png"><a href="plugin.php?pluginid=wall&ac=list">ｉ北航墙</a></li>
<li><img src="plugin/sms/image/sendsms.png"><a href="plugin.php?pluginid=sms">发送短信</a></li>
<?php if($usertype == '4' || $usertype == '教师' || $_SGLOBAL['member']['groupid'] ==1) { ?>
<li><img src="plugin/software/image/software.png"><a href="plugin.php?pluginid=software&usertype=<?=$usertype?>">软件中心</a></li>
<?php } ?>
<li><img src="plugin/live/template/image/live.png"><a href="plugin.php?pluginid=live">活动直播</a></li>
<li><img src="plugin/video/template/image/video.png"><a href="plugin.php?pluginid=video">视频中心</a></li>
<li><img src="image/app/loogo.png"><a href="http://loogo.buaa.edu.cn" title="路购淘物" target="_blank">路购淘物</a></li>

<?php if($_SCONFIG['my_status']) { ?>
<?php if(is_array($_SGLOBAL['userapp'])) { foreach($_SGLOBAL['userapp'] as $value) { ?>
<li><img src="http://appicon.manyou.com/icons/<?=$value['appid']?>"><a href="userapp.php?id=<?=$value['appid']?>"><?=$value['appname']?></a></li>
<?php } } ?>
<?php } ?>
</ul>

<?php if($_SCONFIG['my_status']) { ?>
<ul class="app_list topline" id="my_userapp">
<?php if(is_array($_SGLOBAL['my_menu'])) { foreach($_SGLOBAL['my_menu'] as $value) { ?>
<li id="userapp_li_<?=$value['appid']?>"><img src="http://appicon.manyou.com/icons/<?=$value['appid']?>"><a href="userapp.php?id=<?=$value['appid']?>" title="<?=$value['appname']?>"><?=$value['appname']?></a></li>
<?php } } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['my_menu_more']) { ?>
<p class="app_more"><a href="javascript:;" id="a_app_more" onclick="userapp_open();" class="off">展开</a></p>
<?php } ?>
<?php } ?>

</div>
</div>
<!--/app_sidebarbox-->
<div id="mainarea">
<div id="mainareafg">
<?php if($_SGLOBAL['ad']['contenttop']) { ?><div id="ad_contenttop"><?php adshow('contenttop'); ?></div><?php } ?>
<?php } ?>

<?php } ?>



<div id="content">

<?php if($space['uid'] && $space['self']) { ?>
<script type="text/javascript">
jQuery.noConflict();	
jQuery(function ($) {
var bar = $('.bar');
var percent = $('.percent');
var showimg = $('#showimg');
var progress = $(".progress");
var files = $(".files");
var btn = $(".btn span");
$("#fileupload").wrap("<form id='myupload' action='cp.php?ac=upload&file=upload&type=pic' method='post' enctype='multipart/form-data'></form>");
$("#fileupload").change(function(){
$("#myupload").ajaxSubmit({
dataType:  'json',
/*
beforeSend: function() {
showimg.empty();
progress.show();
var percentVal = '0%';
bar.width(percentVal);
percent.html(percentVal);
btn.html("上传中...");
},
uploadProgress: function(event, position, total, percentComplete) {
var percentVal = percentComplete + '%';
bar.width(percentVal);
percent.html(percentVal);
},
*/
success: function(data) {
var img = "<?=$_SC['attachurl']?>"+data.pic;
var num = 12;
var name = data.name;
var picid = data.picid;
name = cut_string(name,num);
$("#datapicid").val(picid);
$("#datapicpath").val(data.pic);
showimg.html("<div class='triangle-isosceles top'><b>"+name+"</b> <img src='"+img+"' ><span class='delimg' rel='"+picid+"'>删除</span></div>");
btn.html("图片");
},
error:function(xhr){
btn.html("上传失败");
bar.width('0')
files.html(xhr.responseText);
}
});
});

jQuery(".delimg").live('click',function(){
var picid = $(this).attr("rel");

$.get("cp.php?ac=upload&file=delete&type=pic",{ picid: picid },function(ancon){
if(ancon=='ok'){
$("#datapicid").val('');
$("#datapicpath").val('');				
showimg.empty();
$("#fileupload").val('');
}else{
alert("删除失败，刷新即可~");
}
});
});

function cut_string(string,num){
        var str = string.split('.');
        var s_length = str.length;
var str_len = str[0].replace(/[^\x00-\xff]/g, "**").length;
if( str_len > num){
var content = str[0].substr(0,num);
return content+"..."+str[s_length-1];
}
else{
return string;
}        
}

jQuery("#complain_img").live('click',function(){
var iscomplain = $("#complain").val();
var complain_img = $('#complain_img');
if(iscomplain == 0){
complain_img.html("<img src=\"image/status/complain2.png\" align=\"absmiddle\" />");
$("#complain").val('1');
}else{
complain_img.html("<img src=\"image/status/complain.png\" align=\"absmiddle\" />");
$("#complain").val('0');
}
});
jQuery("#new_function_msg_close").live('click',function(){
jQuery("#new_function_msg").css("display","none");
});
});

</script>

<div id="mood_feed">
<form method="post" id="doingform" action="cp.php?ac=doing&view=<?=$_GET['view']?>" >
<div class="mood_statement">
<div class="mood_say_something">
<div class="mood_say_statement">还可输入 <strong id="maxlimit">140</strong> 个字</div>
</div>			
</div>
<textarea class="mood_textarea" id="message" name="message" onkeyup="textCounter(this, 'maxlimit', 140)" onkeydown="ctrlEnter(event, 'add');"></textarea>
<div class="demo" >
<div class="btn">
<a href="#" id="doingface" onclick="showFace(this.id, 'message');return false;"><img src="image/status/face.png" align="absmiddle" title="插入表情"/></a>
</div>
<div class="btn">
<img src="image/status/uploadpic.png" align="absmiddle" />
<input id="fileupload" type="file" name="feedfile" title="插入图片">
</div>
<div class="btn">
<div id="complain_img"><img src="image/status/complain.png" /></div>
<input type="hidden" id="complain" name="complain" value="0" />
</div>
<div class="mood_submit">
<button type="submit" id="add" name="add" >发布</button>
</div>
<div class="progress">
<span class="bar"></span><span class="percent">0%</span >
</div>
<div class="files"></div>
<div id="showimg"></div>
<div id="new_function_msg" style="background:url('image/status/new_function_msg.png') no-repeat scroll;position:relative;padding:7px 4px 4px 4px;height:67px;width:232px;line-height:15px;z-index:999;top:-42px;left:70px;">
<div style="text-align:right;"><a href="javascript:void(0)" id="new_function_msg_close">关闭</a></div>
<div id="new_function_msg_cn" style="padding:2px;">
【温馨提示】发布状态时,如果@了学院或部门处室的公共主页,点击该按钮后再发布.您的状态将作为诉求发布.
</div>
</div>
</div>	

<input type="hidden" class="json_friend" id="json_friend" value="<?=$_SGLOBAL['supe_uid']?>" />
<input type="hidden" class="friendurl_r" id="friendurl_r" value="<?=$friendurl_r?>" />
<input type="hidden" name="addsubmit" value="true" />
<input type="hidden" name="refer" value="<?=$theurl?>" />
<input type="hidden" name="topicid" value="<?=$topicid?>" />
<input type="hidden" name="datapicid" id="datapicid" value="" />
<input type="hidden" name="datapicpath" id="datapicpath" value="" />
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php if($space['allnum']) { ?>
<div class="mgs_list">
<?php if($space['notenum']) { ?><div><img src="image/icon/notice.gif"><a href="space.php?do=notice"><strong><?=$space['notenum']?></strong> 条新通知</a></div><?php } ?>
<?php if($space['addfriendnum']) { ?><div><img src="image/icon/friend.gif" alt="" /><a href="cp.php?ac=friend&op=request"><strong><?=$space['addfriendnum']?></strong> 个好友请求</a></div><?php } ?>
<?php if($space['mtaginvitenum']) { ?><div><img src="image/icon/mtag.gif" alt="" /><a href="cp.php?ac=mtag&op=mtaginvite"><strong><?=$space['mtaginvitenum']?></strong> 个小组邀请</a></div><?php } ?>
<?php if($space['eventinvitenum']) { ?><div><img src="image/icon/event.gif" alt="" /><a href="cp.php?ac=event&op=eventinvite"><strong><?=$space['eventinvitenum']?></strong> 个活动邀请</a></div><?php } ?>
<?php if($space['myinvitenum']) { ?><div><img src="image/icon/userapp.gif" alt="" /><a href="space.php?do=notice&view=userapp"><strong><?=$space['myinvitenum']?></strong> 个应用消息</a></div><?php } ?>
<?php if($space['pmnum']) { ?><div><img src="image/icon/pm.gif" alt="" /><a href="space.php?do=pm"><strong><?=$space['pmnum']?></strong> 条新短消息</a></div><?php } ?>
<?php if($space['pokenum']) { ?><div><img src="image/icon/poke.gif" alt="" /><a href="cp.php?ac=poke"><strong> <?=$space['pokenum']?></strong> 个新招呼</a></div><?php } ?>
<?php if($space['reportnum']) { ?><div><img src="image/icon/report.gif" alt="" /><a href="admincp.php?ac=report"><strong><?=$space['reportnum']?></strong> 个举报</a></div><?php } ?>
<?php if($space['namestatusnum']) { ?><div><img src="image/icon/profile.gif" alt="" /><a href="admincp.php?ac=space&perpage=20&namestatus=0&searchsubmit=1"><strong><?=$space['namestatusnum']?></strong> 个待认证用户</a></div><?php } ?>
<?php if($space['eventverifynum']) { ?><div><img src="image/icon/event.gif" alt="" /><a href="admincp.php?ac=event&perpage=20&grade=0&searchsubmit=1"><strong><?=$space['eventverifynum']?></strong> 个待审核活动</a></div><?php } ?>
</div>
<?php } ?>


<?php if(empty($_SCOOKIE['closefeedbox']) && $_SGLOBAL['ad']['feedbox']) { ?>
<div id="feed_box" class="ye_r_t"><div class="ye_l_t"><div class="ye_r_b"><div class="ye_l_b">
<div class="task_notice">
<a title="忽略" class="float_cancel" href="javascript:;" onclick="close_feedbox();">忽略</a>
<div class="task_notice_body">
<?php adshow('feedbox'); ?>
</div>
</div>
</div></div></div></div>
<?php } ?>

<?php } elseif($space['uid']) { ?>
<?php $_TPL['spacetitle'] = "动态";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=feed&view=me\">TA的近期动态</a>"; ?>
<div class="c_header a_header">
<div class="avatar48"><a href="space.php?uid=<?=$space['uid']?>"><?php echo avatar($space[uid],small); ?></a></div>
<?php if($_SGLOBAL['refer']) { ?>
<a class="r_option" href="<?=$_SGLOBAL['refer']?>">&laquo; 返回上一页</a>
<?php } ?>
<p style="font-size:14px"><?=$_SN[$space['uid']]?>的<?=$_TPL['spacetitle']?></p>
<a href="space.php?uid=<?=$space['uid']?>" class="spacelink"><?=$_SN[$space['uid']]?>的主页</a>
<?php if($_TPL['spacemenus']) { ?>
<?php if(is_array($_TPL['spacemenus'])) { foreach($_TPL['spacemenus'] as $value) { ?> <span class="pipe">&raquo;</span> <?=$value?><?php } } ?>
<?php } ?>
</div>

<?php } ?>

<div class="feed">
<div class="feed_title_fresh" >
<div class="feed_title_all" ><a href="space.php?do=home&view=all">公开新鲜事</a></div>
<a href="space.php?do=home&view=ours">新鲜事</a>
<span style="padding:0;margin:-12px 0 0 50px;float:left;width:76%;height:2px;border-bottom:1px #ccc solid;"></span>
</div>
<div id="feed_div" class="enter-content">

<?php } ?>	

<?php if($list) { ?>
<?php if(is_array($list)) { foreach($list as $day => $values) { ?>

<ul>
<?php if(is_array($values)) { foreach($values as $value) { ?>
<li class="s_clear <?=$value['magic_class']?>" id="feed_<?=$value['feedid']?>_li" onmouseover="feed_menu(<?=$value['feedid']?>,1);" onmouseout="feed_menu(<?=$value['feedid']?>,0);">
<div class="feed_li_avatar">
<a href="space.php?uid=<?=$value['uid']?>"  title="访问 <?=$_SN[$value['uid']]?> 的个人主页"><?php echo avatar($value[uid],small); ?></a>
</div>
<div style="padding-left:5px;width:445px;overflow:hidden;font-size:14px;letter-spacing:1px;" <?=$value['style']?>>
<?php if($value['uid'] && empty($_TPL['hidden_more'])) { ?>
<a href="cp.php?ac=feed&op=menu&feedid=<?=$value['feedid']?>" class="float_more" id="a_feed_menu_<?=$value['feedid']?>"  onmouseover="feed_menu(<?=$value['feedid']?>,1);" onmouseout="feed_menu(<?=$value['feedid']?>,0);" onclick="ajaxmenu(event, this.id)" title="显示更多选项" style="display:none;">菜单</a>
<?php } ?>
  <?=$value['title_template']?>

<div class="feed_content">

<?php if(empty($_TPL['hidden_hot']) && $value['hot']) { ?>
<!-- 热点 -->
<div class="hotspot"><a href="cp.php?ac=feed&feedid=<?=$value['feedid']?>"><?=$value['hot']?></a></div>
<?php } ?>	

<?php if($value['image_1']) { ?>
<!-- 图片 -->
<a href="<?=$value['image_1_link']?>"<?=$value['target']?>><img src="<?=$value['image_1']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($value['image_2']) { ?>
<a href="<?=$value['image_2_link']?>"<?=$value['target']?>><img src="<?=$value['image_2']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($value['image_3']) { ?>
<a href="<?=$value['image_3_link']?>"<?=$value['target']?>><img src="<?=$value['image_3']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($value['image_4']) { ?>
<a href="<?=$value['image_4_link']?>"<?=$value['target']?>><img src="<?=$value['image_4']?>" class="summaryimg" /></a>
<?php } ?>

<?php if($value['body_template']) { ?>
<div id="blog_feed" class="detail"<?php if($value['image_3']) { ?> style="clear: both;"<?php } ?>>
<?=$value['body_template']?>
</div>
<?php } ?>

<?php if($value['body_general']) { ?>
<div class="quote"><span class="q"><?=$value['body_general']?></span></div>
<?php } ?>
<?php if($value['body_data']['videourl']) { ?>	
<div class="feed_li_video">

<div class="feed_li_video_desc">
<?=$value['body_data']['desc']?>
</div>
<div class="feed_li_video_pic" style="display:block"> 
<img <?php if($value['image_1']) { ?> src="<?=$value['image_1']?>" <?php } else { ?> src="image/video.png"<?php } ?> id="feed_li_pic_<?=$value['id']?>" /> 
<span class="feed_li_video_pic_play"></span>
</div> 
<div class="feed_li_video_video" id="feed_li_video_video_<?=$value['id']?>" style="display:none">
<div class="feed_li_video_hidden" >
<span class="floatleft" ><a href="#" >收起</a><!--<span class="pipe">|</span><a href="##">变量AD</a></span>-->
</div>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="440px" height="330px">
<param name="movie" value="ihome.swf">
<param name="quality" value="high">
<param name="allowFullScreen" value="true">
<param name="FlashVars" value="vcastr_file=<?=$value['body_data']['videourl']?>&LogoText=ihome&TextColor=0x0000FF" />
<embed src="ihome.swf" allowfullscreen="true" flashvars="vcastr_file=<?=$value['body_data']['videourl']?>&LogoText=ihome&TextColor=0x0000FF" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="440px" height="330px">
</embed>
</object>
</div>
<?php if($value['body_data']['video_comment']) { ?>
<div class="quote">
<span class="q">
<?=$value['body_data']['video_comment']?>
</span>
</div>
<?php } ?>
</div>
<script type="text/javascript">
/*				jQuery.noConflict();
jQuery(function ($) {
$(".feed_li_video_pic img").click(function() {
$(this).parent().css("display","none");
$(this).parent().parent().find(".feed_li_video_video").css("display","block");
});
$(".feed_li_video_pic span").click(function() {
$(this).parent().css("display","none");
$(this).parent().parent().find(".feed_li_video_video").css("display","block");
});
$(".feed_li_video_hidden span a:eq(0)").click(function() {
$(this).parent().parent().parent().css("display","none");
$(this).parent().parent().parent().parent().find(".feed_li_video_pic").slideDown(500);
});
});
*/
jQuery.noConflict();
jQuery(function ($) {
$(".feed_li_video_pic img").click(function() {
$(this).parent().css("display","none");
$(this).parent().parent().find(".feed_li_video_video").css("display","block");
$("html,body").animate({scrollTop:$(this).parent().parent().find(".feed_li_video_video").offset().top-30},1000);
$(this).parent().parent().find(".feed_li_video_video param[name=movie]").attr("value","ihome.swf");
$(this).parent().parent().find(".feed_li_video_video embed").attr("src","ihome.swf");
});
$(".feed_li_video_pic span").click(function() {
$(this).parent().css("display","none");
$(this).parent().parent().find(".feed_li_video_video").css("display","block");
$("html,body").animate({scrollTop:$(this).parent().parent().find(".feed_li_video_video").offset().top-30},1000);
$(this).parent().parent().find(".feed_li_video_video param[name=movie]").attr("value","ihome.swf");
$(this).parent().parent().find(".feed_li_video_video embed").attr("src","ihome.swf");
});
$(".feed_li_video_hidden span a:eq(0)").click(function() {
$(this).parent().parent().parent().css("display","none");
$(this).parent().parent().parent().parent().find(".feed_li_video_pic").show();
$("html,body").animate({scrollTop:$(this).parent().parent().parent().parent().find(".feed_li_video_pic").offset().top-30},800);
$(this).parent().parent().parent().find("param[name=movie]").attr("value","");
$(this).parent().parent().parent().find("embed").attr("src","");
});
});
</script>
<?php } ?>

<?php if($value['thisapp'] && !empty($value['body_data']['flashvar'])) { ?>
<div class="media">
<img src="image/vd.gif" alt="点击播放" onclick="javascript:showFlash('<?=$value['body_data']['host']?>', '<?=$value['body_data']['flashvar']?>', this, '<?=$value['feedid']?>');" style="cursor:pointer;" />
</div>
<?php } elseif($value['thisapp'] && !empty($value['body_data']['musicvar'])) { ?>
<div class="media">
<img src="image/music.gif" alt="点击播放" onclick="javascript:showFlash('music', '<?=$value['body_data']['musicvar']?>', this, '<?=$value['feedid']?>');" style="cursor:pointer;" />
</div>
<?php } elseif($value['thisapp'] && !empty($value['body_data']['flashaddr'])) { ?>
<div class="media">
<img src="image/flash.gif" alt="点击查看" onclick="javascript:showFlash('flash', '<?=$value['body_data']['flashaddr']?>', this, '<?=$value['feedid']?>');" style="cursor:pointer;" />
</div>
<?php } ?>

</div>
<?php if(empty($_TPL['hidden_time'])) { ?>
<span class="gray"><?php echo sgmdate('m月d日 H:i',$value[dateline],1); ?></span>
<?php } ?>

<?php if(empty($_TPL['hidden_menu'])) { ?>
<span class="floatright">		
<?php if($value['idtype']=='doid') { ?>
<a href="javascript:;" onclick="docomment_get('docomment_<?=$value['id']?>', 1);" id="do_a_op_<?=$value['id']?>">回复(<?=$value['num']?>)</a>
<span class="pipe">|</span>
<a href="<?=$value['share_url']?>&inspace=1" onclick="ajaxmenu(event, this.id, 1)" id="a_share_<?=$value['feedid']?>" >分享</a>
<?php } elseif($value['body_data']['video_origin']) { ?>
<a href="javascript:;" onclick="feedcomment_get(<?=$value['feedid']?>);" id="feedcomment_a_op_<?=$value['feedid']?>">评论(<?=$value['num']?>)</a>
<span class="pipe">|</span>
<a href="<?=$value['share_url']?>&inspace=1" onclick="ajaxmenu(event, this.id, 1)" id="a_share_<?=$value['feedid']?>">分享</a>
<?php } elseif(in_array($value['idtype'], array('blogid','picid','albumid','sid','pid','eventid','arrangementid'))) { ?>
<a href="javascript:;" onclick="feedcomment_get(<?=$value['feedid']?>);" id="feedcomment_a_op_<?=$value['feedid']?>">评论(<?=$value['num']?>)</a>
<?php if($value['idtype']=='sid') { ?>
<span class="pipe">|</span>
<a href="<?=$value['share_url']?>&inspace=1" onclick="ajaxmenu(event, this.id, 1)" id="a_share_<?=$value['feedid']?>" >分享</a>
<?php } ?>
<?php } ?>
</span>
<?php } ?>			
</div>

<?php if($value['idtype']=='doid') { ?>
<div id="docomment_<?=$value['id']?>" style="display:none;"></div>
<?php } elseif($value['idtype']) { ?>
<div id="feedcomment_<?=$value['feedid']?>" style="display:none;"></div>
<?php } ?>

<?php if(!empty($hiddenfeed_num[$value['icon']])) { ?>

<div id="feed_more_<?=$value['feedid']?>" style="display:none;">
<ol>
<?php if(is_array($hiddenfeed_list[$value['icon']])) { foreach($hiddenfeed_list[$value['icon']] as $appvalue) { ?>
<?php $appvalue = mkfeed($appvalue); ?>
<li>
<?=$appvalue['title_template']?>
<div class="feed_content" style="width:100%;overflow:hidden;">
<?php if($appvalue['image_1']) { ?>
<a href="<?=$appvalue['image_1_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_1']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['image_2']) { ?>
<a href="<?=$appvalue['image_2_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_2']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['image_3']) { ?>
<a href="<?=$appvalue['image_3_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_3']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['image_4']) { ?>
<a href="<?=$appvalue['image_4_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_4']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['body_template']) { ?>
<div class="detail"<?php if($appvalue['image_3']) { ?> style="clear: both;"<?php } ?>>
<?=$appvalue['body_template']?>
</div>
<?php } ?>
<?php if($appvalue['body_general']) { ?>
<div class="quote"><span class="q"><?=$appvalue['body_general']?></span></div>
<?php } ?>
</div>
</li>
<?php } } ?>
</ol>
</div>
<?php } ?>
</li>

<?php } } ?>
</ul>
<?php } } ?>

<?php } else { ?>
<ul>
<li>没有相关动态</li>
</ul>
<?php } ?>

<?php if($filtercount) { ?>
<div class="notice" id="feed_filter_notice_<?=$start?>">
根据您的<a href="cp.php?ac=privacy&op=view">筛选设置</a>，有 <?=$filtercount?> 条动态被屏蔽 (<a href="javascript:;" onclick="filter_more(<?=$start?>);" id="a_feed_privacy_more">点击查看</a>)
</div>
<div id="feed_filter_div_<?=$start?>" class="enter-content" style="display:none;">
<h4 class="feedtime">以下是被屏蔽的动态</h4>
<ul>
<?php if(is_array($filter_list)) { foreach($filter_list as $value) { ?>
<?php $value = mkfeed($value); ?>
<li class="s_clear <?=$value['magic_class']?>" id="feed_<?=$value['feedid']?>_li" onmouseover="feed_menu(<?=$value['feedid']?>,1);" onmouseout="feed_menu(<?=$value['feedid']?>,0);">
<div class="feed_li_avatar">
<a href="space.php?uid=<?=$value['uid']?>"  title="访问 <?=$_SN[$value['uid']]?> 的个人主页"><?php echo avatar($value[uid],small); ?></a>
</div>
<div style="padding-left:5px;width:445px;overflow:hidden;font-size:14px;letter-spacing:1px;" <?=$value['style']?>>
<?php if($value['uid'] && empty($_TPL['hidden_more'])) { ?>
<a href="cp.php?ac=feed&op=menu&feedid=<?=$value['feedid']?>" class="float_more" id="a_feed_menu_<?=$value['feedid']?>"  onmouseover="feed_menu(<?=$value['feedid']?>,1);" onmouseout="feed_menu(<?=$value['feedid']?>,0);" onclick="ajaxmenu(event, this.id)" title="显示更多选项" style="display:none;">菜单</a>
<?php } ?>
  <?=$value['title_template']?>

<div class="feed_content">

<?php if(empty($_TPL['hidden_hot']) && $value['hot']) { ?>
<!-- 热点 -->
<div class="hotspot"><a href="cp.php?ac=feed&feedid=<?=$value['feedid']?>"><?=$value['hot']?></a></div>
<?php } ?>	

<?php if($value['image_1']) { ?>
<!-- 图片 -->
<a href="<?=$value['image_1_link']?>"<?=$value['target']?>><img src="<?=$value['image_1']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($value['image_2']) { ?>
<a href="<?=$value['image_2_link']?>"<?=$value['target']?>><img src="<?=$value['image_2']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($value['image_3']) { ?>
<a href="<?=$value['image_3_link']?>"<?=$value['target']?>><img src="<?=$value['image_3']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($value['image_4']) { ?>
<a href="<?=$value['image_4_link']?>"<?=$value['target']?>><img src="<?=$value['image_4']?>" class="summaryimg" /></a>
<?php } ?>

<?php if($value['body_template']) { ?>
<div id="blog_feed" class="detail"<?php if($value['image_3']) { ?> style="clear: both;"<?php } ?>>
<?=$value['body_template']?>
</div>
<?php } ?>

<?php if($value['body_general']) { ?>
<div class="quote"><span class="q"><?=$value['body_general']?></span></div>
<?php } ?>
<?php if($value['body_data']['videourl']) { ?>	
<div class="feed_li_video">

<div class="feed_li_video_desc">
<?=$value['body_data']['desc']?>
</div>
<div class="feed_li_video_pic" style="display:block"> 
<img <?php if($value['image_1']) { ?> src="<?=$value['image_1']?>" <?php } else { ?> src="image/video.png"<?php } ?> id="feed_li_pic_<?=$value['id']?>" /> 
<span class="feed_li_video_pic_play"></span>
</div> 
<div class="feed_li_video_video" id="feed_li_video_video_<?=$value['id']?>" style="display:none">
<div class="feed_li_video_hidden" >
<span class="floatleft" ><a href="#" >收起</a><!--<span class="pipe">|</span><a href="##">变量AD</a></span>-->
</div>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="440px" height="330px">
<param name="movie" value="ihome.swf">
<param name="quality" value="high">
<param name="allowFullScreen" value="true">
<param name="FlashVars" value="vcastr_file=<?=$value['body_data']['videourl']?>&LogoText=ihome&TextColor=0x0000FF" />
<embed src="ihome.swf" allowfullscreen="true" flashvars="vcastr_file=<?=$value['body_data']['videourl']?>&LogoText=ihome&TextColor=0x0000FF" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="440px" height="330px">
</embed>
</object>
</div>
<?php if($value['body_data']['video_comment']) { ?>
<div class="quote">
<span class="q">
<?=$value['body_data']['video_comment']?>
</span>
</div>
<?php } ?>
</div>
<script type="text/javascript">
/*				jQuery.noConflict();
jQuery(function ($) {
$(".feed_li_video_pic img").click(function() {
$(this).parent().css("display","none");
$(this).parent().parent().find(".feed_li_video_video").css("display","block");
});
$(".feed_li_video_pic span").click(function() {
$(this).parent().css("display","none");
$(this).parent().parent().find(".feed_li_video_video").css("display","block");
});
$(".feed_li_video_hidden span a:eq(0)").click(function() {
$(this).parent().parent().parent().css("display","none");
$(this).parent().parent().parent().parent().find(".feed_li_video_pic").slideDown(500);
});
});
*/
jQuery.noConflict();
jQuery(function ($) {
$(".feed_li_video_pic img").click(function() {
$(this).parent().css("display","none");
$(this).parent().parent().find(".feed_li_video_video").css("display","block");
$("html,body").animate({scrollTop:$(this).parent().parent().find(".feed_li_video_video").offset().top-30},1000);
$(this).parent().parent().find(".feed_li_video_video param[name=movie]").attr("value","ihome.swf");
$(this).parent().parent().find(".feed_li_video_video embed").attr("src","ihome.swf");
});
$(".feed_li_video_pic span").click(function() {
$(this).parent().css("display","none");
$(this).parent().parent().find(".feed_li_video_video").css("display","block");
$("html,body").animate({scrollTop:$(this).parent().parent().find(".feed_li_video_video").offset().top-30},1000);
$(this).parent().parent().find(".feed_li_video_video param[name=movie]").attr("value","ihome.swf");
$(this).parent().parent().find(".feed_li_video_video embed").attr("src","ihome.swf");
});
$(".feed_li_video_hidden span a:eq(0)").click(function() {
$(this).parent().parent().parent().css("display","none");
$(this).parent().parent().parent().parent().find(".feed_li_video_pic").show();
$("html,body").animate({scrollTop:$(this).parent().parent().parent().parent().find(".feed_li_video_pic").offset().top-30},800);
$(this).parent().parent().parent().find("param[name=movie]").attr("value","");
$(this).parent().parent().parent().find("embed").attr("src","");
});
});
</script>
<?php } ?>

<?php if($value['thisapp'] && !empty($value['body_data']['flashvar'])) { ?>
<div class="media">
<img src="image/vd.gif" alt="点击播放" onclick="javascript:showFlash('<?=$value['body_data']['host']?>', '<?=$value['body_data']['flashvar']?>', this, '<?=$value['feedid']?>');" style="cursor:pointer;" />
</div>
<?php } elseif($value['thisapp'] && !empty($value['body_data']['musicvar'])) { ?>
<div class="media">
<img src="image/music.gif" alt="点击播放" onclick="javascript:showFlash('music', '<?=$value['body_data']['musicvar']?>', this, '<?=$value['feedid']?>');" style="cursor:pointer;" />
</div>
<?php } elseif($value['thisapp'] && !empty($value['body_data']['flashaddr'])) { ?>
<div class="media">
<img src="image/flash.gif" alt="点击查看" onclick="javascript:showFlash('flash', '<?=$value['body_data']['flashaddr']?>', this, '<?=$value['feedid']?>');" style="cursor:pointer;" />
</div>
<?php } ?>

</div>
<?php if(empty($_TPL['hidden_time'])) { ?>
<span class="gray"><?php echo sgmdate('m月d日 H:i',$value[dateline],1); ?></span>
<?php } ?>

<?php if(empty($_TPL['hidden_menu'])) { ?>
<span class="floatright">		
<?php if($value['idtype']=='doid') { ?>
<a href="javascript:;" onclick="docomment_get('docomment_<?=$value['id']?>', 1);" id="do_a_op_<?=$value['id']?>">回复(<?=$value['num']?>)</a>
<span class="pipe">|</span>
<a href="<?=$value['share_url']?>&inspace=1" onclick="ajaxmenu(event, this.id, 1)" id="a_share_<?=$value['feedid']?>" >分享</a>
<?php } elseif($value['body_data']['video_origin']) { ?>
<a href="javascript:;" onclick="feedcomment_get(<?=$value['feedid']?>);" id="feedcomment_a_op_<?=$value['feedid']?>">评论(<?=$value['num']?>)</a>
<span class="pipe">|</span>
<a href="<?=$value['share_url']?>&inspace=1" onclick="ajaxmenu(event, this.id, 1)" id="a_share_<?=$value['feedid']?>">分享</a>
<?php } elseif(in_array($value['idtype'], array('blogid','picid','albumid','sid','pid','eventid','arrangementid'))) { ?>
<a href="javascript:;" onclick="feedcomment_get(<?=$value['feedid']?>);" id="feedcomment_a_op_<?=$value['feedid']?>">评论(<?=$value['num']?>)</a>
<?php if($value['idtype']=='sid') { ?>
<span class="pipe">|</span>
<a href="<?=$value['share_url']?>&inspace=1" onclick="ajaxmenu(event, this.id, 1)" id="a_share_<?=$value['feedid']?>" >分享</a>
<?php } ?>
<?php } ?>
</span>
<?php } ?>			
</div>

<?php if($value['idtype']=='doid') { ?>
<div id="docomment_<?=$value['id']?>" style="display:none;"></div>
<?php } elseif($value['idtype']) { ?>
<div id="feedcomment_<?=$value['feedid']?>" style="display:none;"></div>
<?php } ?>

<?php if(!empty($hiddenfeed_num[$value['icon']])) { ?>

<div id="feed_more_<?=$value['feedid']?>" style="display:none;">
<ol>
<?php if(is_array($hiddenfeed_list[$value['icon']])) { foreach($hiddenfeed_list[$value['icon']] as $appvalue) { ?>
<?php $appvalue = mkfeed($appvalue); ?>
<li>
<?=$appvalue['title_template']?>
<div class="feed_content" style="width:100%;overflow:hidden;">
<?php if($appvalue['image_1']) { ?>
<a href="<?=$appvalue['image_1_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_1']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['image_2']) { ?>
<a href="<?=$appvalue['image_2_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_2']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['image_3']) { ?>
<a href="<?=$appvalue['image_3_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_3']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['image_4']) { ?>
<a href="<?=$appvalue['image_4_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_4']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['body_template']) { ?>
<div class="detail"<?php if($appvalue['image_3']) { ?> style="clear: both;"<?php } ?>>
<?=$appvalue['body_template']?>
</div>
<?php } ?>
<?php if($appvalue['body_general']) { ?>
<div class="quote"><span class="q"><?=$appvalue['body_general']?></span></div>
<?php } ?>
</div>
</li>
<?php } } ?>
</ol>
</div>
<?php } ?>
</li>


<?php } } ?>
<li><a href="javascript:;" onclick="filter_more(<?=$start?>);">&laquo; 收起</a></li>
</ul>
</div>
<?php } ?>

<?php if(empty($_TPL['getmore'])) { ?>	
</div>

<?php if($count==$perpage) { ?>
<div class="page" style="padding-top:20px;">
<a href="javascript:;" onclick="feed_more();" id="a_feed_more">查看更多动态</a>
</div>
<?php } ?>

<div id="ajax_wait"></div>

</div>
</div>
<!--/content-->
<div id="sidebarbox">
<div id="sidebar">


<!--
<?php if($SubArray) { ?>
<div class="sidebox">
<h2 class="title">奥运奖牌榜</h2>
<table width="240" align="center" class="olympic_medal">
<tr>
<th>名次</th><th>国家</th><th><img src="image/olym_medal/m1.png" width="20" height="20"></th><th ><img src="image/olym_medal/m2.png" width="20" height="20"></th><th ><img src="image/olym_medal/m3.png" width="20" height="20"></th><th > 合计</th>

<?php $count=0; ?>
<?php if(is_array($SubArray)) { foreach($SubArray as $value) { ?>
<?php if($count%5==0) { ?>
</tr><tr>
<td><?php echo (int)(($count/5)+1); ?></td>
<?php } ?>

<td><?php echo $value; ?></td>
<?php $count++; ?>
<?php } } ?>
</tr>
</table>
</div>

<?php } ?>
-->

<div class="sidebox">
    <h2 class="title">热门标签</h2>
    <div id="tagcloud" style="width:230px;height:230px;">
    </div>
</div>
<script type="text/javascript" charset="<?=$_SC['charset']?>">
    var words = [
    <?php if($tags) { ?>
        <?php if(is_array($tags)) { foreach($tags as $key => $value) { ?>
            {text: "<?=$value['text']?>", weight:<?=$value['weight']?>, link:"/space.php?do=search&query=<?=$value['text']?>"},
        <?php } } ?>
    <?php } ?>
    ];
    jq(function(){
        jq('#tagcloud').jQCloud(words);
    });
</script>
<div class="sidebox">			
<h2 class="title">
<p class="r_option">
<a href="space.php?do=arrangement&view=all&range=oneweek">全部</a>
</p>
校园日历
</h2>
<div class="calendarbox" id="arrangementcalendar"></div>
</div>
<script type="text/javascript" charset="<?=$_SC['charset']?>">
function showcalendar(month){
var month = month ? "&month="+month : "";
ajaxget('cp.php?ac=arrangement&op=calendar' + month + '&date=<?=$_GET['date']?>&url=<?php echo urlencode($calendarurl) ?>', 'arrangementcalendar');
}
showcalendar();
</script>
<script language="javascript" type="text/javascript" src="source/script_nc.js"></script>
<style>
        .name_card {position: absolute;background: #ffffff;border: 1px solid #bfbfbf;width: 316px;height:auto!important;height: 126px; min-height:126px;display:none;z-index: 3;}
        .name_card_r:after, .name_card_r:before {bottom: 100%;border: solid transparent;content: " ";height: 0;width: 0;position: absolute;pointer-events: none;}
        .name_card_r:after {border-color: rgba(255, 255, 255, 0);border-bottom-color: #ffffff;border-width: 7px;left: 85%;margin-left: -7px;}
        .name_card_r:before {border-color: rgba(191, 191, 191, 0);border-bottom-color: #bfbfbf;border-width: 8px;left: 85%;margin-left: -8px;}
        .name_card_l:after, .name_card_l:before {bottom: 100%;border: solid transparent;content: " ";height: 0;width: 0;position: absolute;pointer-events: none;}
        .name_card_l:after {border-color: rgba(255, 255, 255, 0);border-bottom-color: #ffffff;border-width: 7px;left: 10%;margin-left: -7px;}
        .name_card_l:before {border-color: rgba(191, 191, 191, 0);border-bottom-color: #bfbfbf;border-width: 8px;left: 10%;margin-left: -8px;}
        .name_card .nc_avatar{float: left;margin: 8px 0 0 8px;width: 100px;height: 100px;}
                   .nc_avatar .nc_avatar_img{width:100px;height:100px;}
        .name_card .nc_info{margin:10px 0 0 120px;width:195px;min-height:106px;height:auto;}
                   .nc_info{margin:0;padding:0;}
                   .nc_info p{font-size: 12px;color:#888;margin:12px 0;}
                   .nc_info .nc_np{color:#888;}
                   .nc_info .nc_name{font-size: 14px;font-weight: bold;color:#005eac;text-decoration: none;}
                   .nc_info .nc_name:hover{text-decoration: underline;}
                   .nc_info .nc_sm{font-size: 13px;text-decoration: none;font-weight: bold;color:#005eac;border:1px solid #fff;position:absolute;right:7px;bottom:5px;padding:2px;cursor: pointer;}
                   .nc_info .nc_sm:hover{border:1px solid #005eac;}
</style>
<div class="name_card"></div>
<div class="sidebox">
<h2 class="title">
<p class="r_option">
<?php if($isLeader) { ?>
<a href="plugin.php?pluginid=complain" target="_blank">我管理的</a>
<?php } else { ?>
<a href="space.php?uid=<?=$space['uid']?>&do=feed&view=complain">我的</a>
<?php } ?>
</p>
诉求信息 <span><a href="javascript:void(0)" id="show_complain_bt">展开</a></span>
</h2>
<script>
jQuery.noConflict();	
jQuery(function ($) {
jQuery("#show_complain_bt").live('click',function(){
var complains = jQuery("#show_complain").css("display");
jQuery("#show_complain").slideToggle(300);
});
});
</script>
<ul class="complain" id="show_complain">
<style>
#demo{overflow:hidden;height:96px;}
#demo1{height:480px;}
#demo2{height:480px;}
#show_complain{display:none;}
</style>
<div id="demo">
<div id="demo1">
<?php if(is_array($Complains)) { foreach($Complains as $key=>$value) { ?>
<li><?=$value['replytime']?> <a href="space.php?uid=<?=$value['atdeptuid']?>"><?=$value['atdepartment']?></a> 回复了<a href="space.php?do=doing&doid=<?=$value['doid']?>" target="_blank">一条用户诉求</a></li>
<?php } } ?>
</div>
<div id="demo2"></div>
</div>
<script> 
var speed=40 
var demo=document.getElementById("demo"); 
var demo2=document.getElementById("demo2"); 
var demo1=document.getElementById("demo1"); 
demo2.innerHTML=demo1.innerHTML 
function Marquee(){ 
if(demo2.offsetTop-demo.scrollTop<=0) 
  demo.scrollTop-=demo1.offsetHeight 
else{ 
  demo.scrollTop++ 
} 
} 
var MyMar=setInterval(Marquee,speed) 
demo.onmouseover=function() {clearInterval(MyMar)} 
demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)} 
</script> 
</ul>
</div>

<?php if($reclist) { ?>
<div class="sidebox">
<h2 class="title">
<p class="r_option">
<a href="cp.php?ac=friend&op=find">更多推荐</a>
</p>
好友推荐 
</h2>
<ul class="avatar_list">
<?php $count=1; ?>
<?php if(is_array($reclist)) { foreach($reclist as $key => $value) { ?>
<li>
<div class="avatar48">
<a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a>
</div>
<p>
<a href="space.php?uid=<?=$value['uid']?>" title="<?=$_SN[$value['uid']]?>"><?=$_SN[$value['uid']]?></a>
</p>
<p>
<a href="cp.php?ac=friend&op=add&uid=<?=$value['uid']?>" id="friend_recommend_add_<?=$key?>" class="submit" onclick="ajaxmenu(event, this.id, 1)">+ 加我</a>
</p>
</li>
<?php if($count==6) { ?>
<?php $count=1; ?>
<?php break; ?>
<?php } ?>
<?php $count++; ?>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if($visitorlist) { ?>
<div class="sidebox">
<h2 class="title">
<p class="r_option">
<a href="space.php?uid=<?=$space['uid']?>&do=friend&view=visitor">全部</a>
</p>
最近来访 <?=$space['viewnum']?>人次
<?php if($_SGLOBAL['magic']['detector']) { ?>
<span class="gray"><img src="image/magic/detector.small.gif" title="<?=$_SGLOBAL['magic']['detector']?>" /><a id="a_magic_detector" href="magic.php?mid=detector" onclick="ajaxmenu(event,this.id,1)"><?=$_SGLOBAL['magic']['detector']?></a></span>
<?php } ?>
</h2>
<ul class="avatar_list">
<?php if(is_array($visitorlist)) { foreach($visitorlist as $key => $value) { ?>
<li>
<?php if($value['vusername'] == '') { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" alt="匿名" /></a></div>
<p>匿名</p>
<p class="gray"><?php echo sgmdate('n月j日',$value[dateline],1); ?></p>
<?php } else { ?>

<div class="avatar48"><a href="space.php?uid=<?=$value['vuid']?>" >
<?php echo avatar($value[vuid],small); ?></a>
</div>
<p<?php if($ols[$value['vuid']]) { ?> class="online_icon_p" title="在线"<?php } ?>><a href="space.php?uid=<?=$value['vuid']?>" title="<?=$_SN[$value['vuid']]?>"><?=$_SN[$value['vuid']]?></a></p>
<p class="gray"><?php echo sgmdate('n月j日',$value[dateline],1); ?></p>
<?php } ?>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if($olfriendlist) { ?>
<div class="sidebox">
<h2 class="title">
<p class="r_option">
<a href="space.php?uid=<?=$space['uid']?>&do=friend">全部</a>
</p>
我的好友 （<?=$space['friendnum']?>）
<?php if($_SGLOBAL['magic']['visit']) { ?>
<span class="gray"><img src="image/magic/visit.small.gif" title="<?=$_SGLOBAL['magic']['visit']?>" /><a id="a_magic_visit" href="magic.php?mid=visit" onclick="ajaxmenu(event,this.id,1)"><?=$_SGLOBAL['magic']['visit']?></a></span>
<?php } ?>
</h2>
<ul class="avatar_list">
<?php $count=1; ?>
<?php if(is_array($olfriendlist)) { foreach($olfriendlist as $key => $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>"><?php echo avatar($value[uid],small); ?></a></div>
<p<?php if($ols[$value['uid']]) { ?> class="online_icon_p" title="在线"<?php } ?>><a href="space.php?uid=<?=$value['uid']?>" title="<?=$_SN[$value['uid']]?>"><?=$_SN[$value['uid']]?></a></p>
<p class="gray"><?php if($value['lastactivity']) { ?><?php echo sgmdate('H:i',$value[lastactivity],1); ?><?php } else { ?>热度(<?=$value['num']?>)<?php } ?></p>
</li>
<?php if($count==3) { ?>
<?php $count=1; ?>
<?php break; ?>
<?php } ?>
<?php $count++; ?>
<?php } } ?>
</ul>

</div>
<?php } ?>

<?php if($birthlist) { ?>
<div class="searchfriend">
<div class="ye_r_t"><div class="ye_l_t"><div class="ye_r_b"><div class="ye_l_b">
<h3>好友生日提醒</h3>
<div class="box">
<table cellpadding="2" cellspacing="4">
<?php if(is_array($birthlist)) { foreach($birthlist as $key => $values) { ?>
<tr>
<td align="right" valign="top" style="padding-left:10px;">
<?php if($values['0']['istoday']) { ?>今天<?php } else { ?><?=$values['0']['birthmonth']?>-<?=$values['0']['birthday']?><?php } ?>
</td>
<td style="padding-left:10px;">
<ul>
<?php if(is_array($values)) { foreach($values as $value) { ?>
<li><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a></li>
<?php } } ?>
</ul>
</td>
</tr>
<?php } } ?>
</table>
</div>
</div></div></div></div>
</div>
<?php } ?>

<?php if($hotpoll) { ?>
<div class="sidebox">
<h2 class="title">
<p class="r_option">
<a href="space.php?uid=<?=$space['uid']?>&do=poll&view=hot">全部</a>
</p>最热投票</h2>
<ul class="feed_news_list poll_new">
<?php if(is_array($hotpoll)) { foreach($hotpoll as $key => $value) { ?>
<li style="height:auto;"><a href="space.php?uid=<?=$value['uid']?>&do=poll&pid=<?=$value['pid']?>"><?=$value['subject']?></a></li>
<?php } } ?>
</ul>
</div>
<?php } ?>


<?php if($hotevents) { ?>
<div class="sidebox">
<h2 class="title">
<p class="r_option">
<a href="space.php?uid=<?=$space['uid']?>&do=event&view=all">全部</a></p>
热门活动</h2>
<ul class="attention">
<?php if(is_array($hotevents)) { foreach($hotevents as $value) { ?>
<li style="height: auto;">
<p>
<a href="space.php?do=event&id=<?=$value['eventid']?>"><?=$value['title']?></a>					
</p>
<p class="gray" style="text-align:left;padding-left:10px;">
<?php if($_SGLOBAL['timestamp'] > $value['endtime']) { ?>
已结束
<?php } else { ?>
<?php echo sgmdate("n月j日",$value[starttime]) ?>
<?php } ?>&nbsp;		
<?=$value['membernum']?> 人参加 /				
<?=$value['follownum']?> 人关注
</p>
<p>
<?php if($value['threadnum']) { ?>
<a href="space.php?do=event&id=<?=$value['eventid']?>&view=thread">
<?=$value['threadnum']?> 个话题
</a> &nbsp;
<?php } ?>
<?php if($value['picnum']) { ?>
<a href="space.php?do=event&id=<?=$value['eventid']?>&view=pic">
<?=$value['picnum']?> 张照片
</a>
<?php } ?>
</p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if($hotlist) { ?>
<div class="sidebox">
<h2 class="title">		
<p class="r_option">
<a href="space.php?uid=<?=$space['uid']?>&do=blog&view=all&orderby=hot">全部</a></p>
热门日志品读</h2>
<ul class="news_list">
<?php if(is_array($hotlist)) { foreach($hotlist as $value) { ?>
<li style="height:auto;"><a href="space.php?uid=<?=$value['uid']?>" style="font-weight:bold;"><?=$_SN[$value['uid']]?></a>: <a href="space.php?uid=<?=$value['uid']?>&do=blog&id=<?=$value['blogid']?>"><?=$value['subject']?></a></li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if($newlist) { ?>
<div class="sidebox">
<h2 class="title">		
<p class="r_option">
<a href="space.php?uid=<?=$space['uid']?>&do=blog&view=all&orderby=hot">全部</a></p>
最新日志导读</h2>
<ul class="news_list">
<?php if(is_array($newlist)) { foreach($newlist as $value) { ?>
<li style="height:auto;"><a href="space.php?uid=<?=$value['uid']?>" style="font-weight:bold;"><?=$_SN[$value['uid']]?></a>: <a href="space.php?uid=<?=$value['uid']?>&do=blog&id=<?=$value['blogid']?>"><?=$value['subject']?></a></li>
<?php } } ?>
</ul>
</div>
<?php } ?>


</div> 
<!--/sidebar-->
</div>
<!--/sidebarbox-->

<script type="text/javascript">

var next = <?=$start?>;
function feed_more() {
var x = new Ajax('XML', 'ajax_wait');
var html = '';
next = next + <?=$perpage?>;
x.get('cp.php?ac=feed&op=get&start='+next+'&view=<?=$_GET['view']?>&appid=<?=$_GET['appid']?>&icon=<?=$_GET['icon']?>&filter=<?=$_GET['filter']?>&day=<?=$_GET['day']?>', function(s){
html = '<h4 class="feedtime">以下是新读取的动态</h4>' + s;
$('feed_div').innerHTML += html;
});
}

function filter_more(id) {
if($('feed_filter_div_'+id).style.display == '') {
$('feed_filter_div_'+id).style.display = 'none';
$('feed_filter_notice_'+id).style.display = '';
} else {
$('feed_filter_div_'+id).style.display = '';
$('feed_filter_notice_'+id).style.display = 'none';
}
}

function close_feedbox() {
var x = new Ajax();
x.get('cp.php?ac=common&op=closefeedbox', function(s){
$('feed_box').style.display = 'none';
});
}

var elems = selector('li[class~=magicthunder]', $('feed_div')); 
for(var i=0; i<elems.length; i++){		
magicColor(elems[i]); 
}


</script>
<script language="javascript"> 
var showInfo = new function () { 
this.showLayer = function (e, id) { 
var p = window.event ? [event.clientX, event.clientY] : [e.pageX, e.pageY]; 
with (document.getElementById(id).style) { 
display = "block"; 
left = p[0] + 20 + "px"; 
top = p[1] + 20 + "px"; 
} 

}; 
this.hideLayer = function (e, id) { 
with (document.getElementById(id).style) { 
display = "none"; 
} 
}; 
}; 

 function showdetailinfo(irecommendedid,iusername,irecommendid,icause,irealname)
{

var xmlHttp;
function createXMLHttpRequest() {
 var xmlreq = false;  
 if (window.XMLHttpRequest) {  
     xmlreq = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    try { 
      xmlreq = new ActiveXObject("Msxml2.XMLHTTP"); 
    } catch (e1) {
      try {
        xmlreq = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e2) {}
    }
  }

  return xmlreq;
}

var url="./source/recommend.php";
var recommendedid=irecommendedid;
var recommendid=irecommendid;

var cause=encodeURIComponent(icause);
var realname=encodeURIComponent(irealname);
var postStr;
postStr="recommendid="+recommendid+"&recommendedid="+recommendedid+"&cause="+cause+"&realname="+realname;
url=url+"?"+postStr;
xmlHttp=createXMLHttpRequest();
xmlHttp.onreadystatechange=function() {
 
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
//alert(document.getElementById(y));
document.getElementById(iusername).innerHTML=xmlHttp.responseText;
}
}
//alert(url);
xmlHttp.open("GET",url,true);
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlHttp.send();

var oli = document.getElementById(irecommendedid);
var ospan = document.getElementById(iusername);

oli.onmouseover = function() {
ospan.style.display = "block";
}

oli.onmouseout = function() {
ospan.style.display = "none";
}	

ospan.onmouseover = function() {
this.style.display = "block";
}

ospan.onmouseout = function() {
this.style.display = "none";
}

}
</script>


<?php my_checkupdate(); ?>
<?php my_showgift(); ?>
<?php if(empty($_SGLOBAL['inajax'])) { ?>
<?php if(empty($_TPL['nosidebar'])) { ?>
<?php if($_SGLOBAL['ad']['contentbottom']) { ?><br style="line-height:0;clear:both;"/><div id="ad_contentbottom"><?php adshow('contentbottom'); ?></div><?php } ?>
</div>
</div>
<!--/mainarea-->
<div id="bottom"></div>
</div>
</div>
<!--/main-->
<?php } ?>

<div id="footer">
<div id="footerfg">
<?php if($_TPL['templates']) { ?>
<div class="chostlp" title="切换风格"><img id="chostlp" src="<?=$_TPL['default_template']['icon']?>" onmouseover="showMenu(this.id)" alt="<?=$_TPL['default_template']['name']?>" /></div>
<ul id="chostlp_menu" class="chostlp_drop" style="display: none">
<?php if(is_array($_TPL['templates'])) { foreach($_TPL['templates'] as $value) { ?>
<li><a href="cp.php?ac=common&op=changetpl&name=<?=$value['name']?>" title="<?=$value['name']?>"><img src="<?=$value['icon']?>" alt="<?=$value['name']?>" /></a></li>
<?php } } ?>
</ul>
<?php } ?>

<p class="r_option">
<a href="javascript:;" onclick="window.scrollTo(0,0);" id="a_top" title="TOP"><img src="image/top.gif" alt="" style="padding: 5px 6px 6px;" /></a>
</p>

<?php if($_SGLOBAL['ad']['footer']) { ?>
<p style="padding:5px 0 10px 0;"><?php adshow('footer'); ?></p>
<?php } ?>

<?php if($_SCONFIG['close']) { ?>
<p style="color:blue;font-weight:bold;">
提醒：当前站点处于关闭状态
</p>
<?php } ?>
<p>
<a title="<?php echo X_RELEASE; ?>"><?=$_SCONFIG['sitename']?></a> <span title="<?php echo X_REVISION; ?>"><?php echo X_VER; ?></span> - 
<a href="mailto:<?=$_SCONFIG['adminemail']?>">联系我们</a> - <font size="2"><a href="invitation.php" style="color:#00f;">招贤纳士</a></font>
<?php if($_SCONFIG['miibeian']) { ?> - <a  href="http://www.miibeian.gov.cn" target="_blank"><?=$_SCONFIG['miibeian']?></a><?php } ?>
</p>
<p>
技术支持 <a  href="http://www.buaa.edu.cn" target="_blank">北京航空航天大学</a> <a  href="http://nic.buaa.edu.cn" target="_blank">网络信息中心</a> 
2012年 
</p>
<?php if($_SCONFIG['debuginfo']) { ?>
<p><?php echo debuginfo(); ?></p>
<?php } ?>
</div>
</div>
</div>
<!--/wrap-->
<!--/bg_pic-->
<!--/bg_pic_repeat-->
<?php if($_SGLOBAL['appmenu']) { ?>
<ul id="ucappmenu_menu" class="dropmenu_drop" style="display:none;">
<li><a href="<?=$_SGLOBAL['appmenu']['url']?>" title="<?=$_SGLOBAL['appmenu']['name']?>" target="_blank"><?=$_SGLOBAL['appmenu']['name']?></a></li>
<?php if(is_array($_SGLOBAL['appmenus'])) { foreach($_SGLOBAL['appmenus'] as $value) { ?>
<li><a href="<?=$value['url']?>" title="<?=$value['name']?>" target="_blank"><?=$value['name']?></a></li>
<?php } } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['supe_uid']) { ?>
<ul id="membernotemenu_menu" class="dropmenu_drop" style="display:none;">
<?php $member = $_SGLOBAL['member']; ?>
<?php if($member['notenum']) { ?><li><img src="image/icon/notice.gif" width="16" alt="" /> <a href="space.php?do=notice"><strong><?=$member['notenum']?></strong> 个新通知</a></li><?php } ?>
<?php if($member['pokenum']) { ?><li><img src="image/icon/poke.gif" alt="" /> <a href="cp.php?ac=poke"><strong><?=$member['pokenum']?></strong> 个新招呼</a></li><?php } ?>
<?php if($member['addfriendnum']) { ?><li><img src="image/icon/friend.gif" alt="" /> <a href="cp.php?ac=friend&op=request"><strong><?=$member['addfriendnum']?></strong> 个好友请求</a></li><?php } ?>
<?php if($member['mtaginvitenum']) { ?><li><img src="image/icon/mtag.gif" alt="" /> <a href="cp.php?ac=mtag&op=mtaginvite"><strong><?=$member['mtaginvitenum']?></strong> 个小组邀请</a></li><?php } ?>
<?php if($member['eventinvitenum']) { ?><li><img src="image/icon/event.gif" alt="" /> <a href="cp.php?ac=event&op=eventinvite"><strong><?=$member['eventinvitenum']?></strong> 个活动邀请</a></li><?php } ?>
<?php if($member['myinvitenum']) { ?><li><img src="image/icon/userapp.gif" alt="" /> <a href="space.php?do=notice&view=userapp"><strong><?=$member['myinvitenum']?></strong> 个应用消息</a></li><?php } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['supe_uid']) { ?>
<?php if(!isset($_SCOOKIE['checkpm'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=pm&op=checknewpm&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php if(!isset($_SCOOKIE['synfriend'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=friend&op=syn&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php } ?>
<?php if(!isset($_SCOOKIE['sendmail'])) { ?>
<script language="javascript"  type="text/javascript" src="do.php?ac=sendmail&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>

<?php if($_SGLOBAL['ad']['couplet']) { ?>
<script language="javascript" type="text/javascript" src="source/script_couplet.js"></script>
<div id="uch_couplet" style="z-index: 10; position: absolute; display:none">
<div id="couplet_left" style="position: absolute; left: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<div id="couplet_rigth" style="position: absolute; right: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<script type="text/javascript">
lsfloatdiv('uch_couplet', 0, 0, '', 0).floatIt();
</script>
</div>
<?php } ?>
<?php if($_SCOOKIE['reward_log']) { ?>
<script type="text/javascript">
showreward();
</script>
<?php } ?>
</body>
</html>
<?php } ?>
<?php } ?>
<?php ob_out();?>