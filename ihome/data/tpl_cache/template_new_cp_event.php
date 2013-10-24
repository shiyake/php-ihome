<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('template/new/cp_event|template/new/header|template/new/cp_topic_menu|template/new/footer|template/new/space_topic_inc', '1382618824', 'template/new/cp_event');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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


<?php if(empty($topic) && in_array($op,array("edit", "pic", "thread", "members", "comment", "invite", "eventinvite"))) { ?>
<!--//管理页页头//-->
<style type="text/css">
.poster_pre{
max-width: 80px; max-height: 104px;}
.poster{
max-width: 200px; max-height: 260px;}
</style>
<div id="mainarea">
    <h2 class="title"><img src="image/app/event.gif" />活动 <?php if($eventid) { ?>- <a href="space.php?do=event&id=<?=$event['eventid']?>"><?=$event['title']?></a><?php } ?></h2>
    <div class="tabs_header">
        <ul class="tabs">
<?php if($eventid) { ?>
<?php if($allowmanage) { ?>
            <li <?=$menus['edit']?>><a href="cp.php?ac=event&op=edit&id=<?=$eventid?>"><span>修改活动</span></a></li>
<?php } ?>
<?php if($_SGLOBAL['supe_userevent']['status'] > 1 && ($_SGLOBAL['supe_userevent']['status'] >= 3 || $event['allowinvite'])) { ?>
<li <?=$menus['invite']?>><a href="cp.php?ac=event&op=invite&id=<?=$eventid?>"><span>邀请好友</span></a></li>
<?php } ?>
<?php if($_SGLOBAL['supe_userevent']['status'] >= 3) { ?>
<li <?=$menus['members']?>><a href="cp.php?ac=event&op=members&id=<?=$eventid?>"><span>成员管理</span></a></li>
<?php } ?>
<?php if($allowmanage) { ?>
<li <?=$menus['pic']?>><a href="cp.php?ac=event&op=pic&id=<?=$eventid?>"><span>照片管理</span></a></li>
<?php if($event['tagid']) { ?>
<li <?=$menus['thread']?>><a href="cp.php?ac=event&op=thread&id=<?=$eventid?>"><span>话题管理</span></a></li>
<?php } ?>
<?php } ?>
<?php } else { ?>
<?php if("eventinvite"==$op) { ?>
<li class="active"><a href="cp.php?ac=event&op=eventinvite"><span>活动邀请</span></a></li>
<?php } else { ?>
<li class="active"><a href="cp.php?ac=event"><span>发起活动</span></a></li>
<?php } ?>
<?php } ?>
<li><a href="space.php?do=event&id=<?=$eventid?>"><span>返回活动首页</span></a></li>
        </ul>
        <?php if($menus['members']) { ?>
        <form action="cp.php" method="get" id="searchform" name="searchform">
<div style="margin: 0pt 6px 5px 0pt; float: right;">
<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="padding: 0pt;"><input type="text" style="border-right: medium none; width: 160px;" tabindex="1" class="t_input" onfocus="if(this.value=='搜索成员')this.value='';" value="搜索成员" name="key" id="key"/></td>
<td style="padding: 0pt;"><a href="javascript:$('searchform').submit();"><img alt="搜索" src="image/search_btn.gif"/></a></td>
</tr>
</tbody>
</table>
</div>
<input type="hidden" value="event" name="ac"/>
<input type="hidden" value="<?=$eventid?>" name="id"/>
<input type="hidden" value="members" name="op"/>
<input type="hidden" value="<?=$_GET['status']?>" name="status"/>
<input type="hidden" value="<?php echo formhash(); ?>" name="formhash"/>
</form>
        <?php } ?>
    </div>
<?php } ?>

<?php if("join"==$op) { ?>
<?php if($event['allowfellow'] || $event['template']) { ?>
<div>
<h1>填写报名信息</h1>
<form action="cp.php?ac=event&op=join&id=<?=$event['eventid']?>" method="post" style="padding: 5px 10px;">
<?php if($event['allowfellow']) { ?>
<p>
<span>携带人数</span>
<input name="fellow" type="text" size="4" value="<?php if(empty($_SGLOBAL['supe_userevent']['fellow'])) { ?>0<?php } else { ?><?=$_SGLOBAL['supe_userevent']['fellow']?><?php } ?>" />
<span class="tiptext">（如果你带朋友参加，请注明携带人数）</span>
</p>
<?php } ?>
<?php if($event['template']) { ?>
<p>
<span>报名信息</span><span class="tiptext">（请按活动发起者给出的模板填写）</span><br />
<textarea name="template" rows="4" style="width: 320px;"><?php if(empty($_SGLOBAL['supe_userevent']['template'])) { ?><?=$event['template']?><?php } else { ?><?=$_SGLOBAL['supe_userevent']['template']?><?php } ?></textarea>
</p>
<?php } ?>
<p class="btn_line"><br />
<input type="submit" class="submit" name="joinsubmit" value="确定" />
<input type="button" class="button" value="取消" onclick="hideMenu()" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } else { ?>
<div>
<form method="post" name="eventform" action="cp.php?ac=event&op=join&id=<?=$eventid?>">
<h1>您确定<?php if($event['verify']) { ?>报名<?php } else { ?>参加<?php } ?>此活动吗？</h1>
<p class="btn_line"><br />
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="joinsubmit" value="确定" class="submit" />
<input type="button" name="btnclose" value="取消" onclick="hideMenu();" class="button" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } ?>
<?php } elseif($op == "follow") { ?>
<div>
<form method="post" name="eventform" action="cp.php?ac=event&op=follow&id=<?=$eventid?>">
<h1>您确定关注此活动吗？</h1>
<p class="btn_line"><br />
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<input type="submit" name="followsubmit" value="确定" class="submit" />
<input type="button" name="btnclose" value="取消" onclick="hideMenu();" class="button" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>">
</form>
</div>
<?php } elseif($op == "cancelfollow") { ?>
<div>
<form method="post" name="eventform" action="cp.php?ac=event&op=cancelfollow&id=<?=$eventid?>">
<h1>您确定取消关注此活动吗？</h1>
<p class="btn_line"><br />
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="cancelfollowsubmit" value="确定" class="submit" />
<input type="button" name="btnclose" value="取消" onclick="hideMenu();" class="button" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } elseif($op == "quit") { ?>
<div>
<form method="post" name="eventform" action="cp.php?ac=event&op=quit&id=<?=$eventid?>">
<h1>您确定退出此活动吗？</h1>
<p class="btn_line"><br />
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="quitsubmit" value="确定" class="submit" />
<input type="button" name="btnclose" value="取消" onclick="hideMenu();" class="button" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } elseif($op == "delete") { ?>
<div>
<form method="post" name="eventform" action="cp.php?ac=event&op=delete&id=<?=$eventid?>">
<h1>您确定取消此活动吗？</h1>
<p>活动取消将删除所有活动相关信息。<br />此操作不可恢复！</p>
<p class="btn_line"><br />
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="deletesubmit" value="确定" class="submit" />
<input type="button" name="btnclose" value="取消" onclick="hideMenu();" class="button" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } elseif($op == "member") { ?>
<div id="memberevent">
<div><a class="float_del" title="关闭" href="javascript:hideMenu();">关闭</a></div>
<br clear="both" />
<form method="post" name="eventform" id="eventmember_<?=$uid?>" action="cp.php?ac=event&op=member&id=<?=$eventid?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="hidden" name="uid" value="<?=$userevent['uid']?>">
<p>
设为：
<select name="status">
<option value="2">普通成员</option>
<?php if($_SGLOBAL['supe_uid']==$event['uid']) { ?>
<option value="3">组织者</option>
<?php } ?>
<?php if($event['verify']) { ?>
<option value="0">待审核</option>
<?php } ?>
<option value="-1">踢出成员</option>
</select> &nbsp;
<input type="submit" name="membersubmit" value="提交" class="submit" />
</p>
</form>
</div>
<?php } elseif($op == "print") { ?>
<div>
<div><a class="float_del" title="关闭" href="javascript:hideMenu();">关闭</a></div>
<br clear="both" />
<form method="post" target="_blank" name="eventform" action="cp.php?ac=event&op=print&id=<?=$eventid?>">
<h2>设置打印选项</h2>
<p>内容：
<!--input type="checkbox" id="ckavatarbig" name="avatarbig" /> <lable for="ckavatarbig">大头像</lable-->
<input type="checkbox" id="ckavatarbig" name="avatarsmall" checked="checked" /> <lable for="ckavatarsmall">头像</lable>
<input type="checkbox" id="ckusername" name="username" checked="checked" /> <lable for="ckusername">姓名</lable>
<?php if($event['allowfellow']) { ?>
<input type="checkbox" id="ckfellow" name="fellow" checked="checked" /> <lable for="ckfellow">携带人数</lable>
<?php } ?>
<?php if($event['template']) { ?>
<input type="checkbox" id="cktemplate" name="template" checked="checked" /> <lable for="cktemplate">报名信息</lable>
<?php } ?>
</p>
<p>选项：
<input type="checkbox" id="ckadmin" name="admin" /> <lable for="ckadmin">包括组织者</lable>
</p>
<p class="btn_line">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="printsubmit" value="确定" class="submit" />
<input type="button" name="btnclose" value="取消" onclick="hideMenu();" class="button" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } elseif($op == "close") { ?>
<div>
<form method="post" name="eventform" action="cp.php?ac=event&op=close&id=<?=$eventid?>">
<h1>您确定要关闭活动吗？</h1>
<p>活动关闭之后将只允许进行浏览。</p>
<p class="btn_line"><br />
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="closesubmit" value="确定" class="submit" />
<input type="button" name="btnclose" value="取消" onclick="hideMenu();" class="button" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } elseif($op == "open") { ?>
<div>
<form method="post" name="eventform" action="cp.php?ac=event&op=open&id=<?=$eventid?>">
<h1>您确定要重新开启活动吗？</h1>
<p class="btn_line"><br />
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="opensubmit" value="确定" class="submit" />
<input type="button" name="btnclose" value="取消" onclick="hideMenu();" class="button" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } elseif($op == "calendar") { ?>	
<div class="calendar">
<div id="calendar_pre" class="floatleft"><a href="#" onclick="showcalendar('<?=$premonth?>'); this.blur(); return false;">&lt;&lt;</a></div>
<div id="calendar_next" class="floatright"><a href="#" onclick="showcalendar('<?=$nextmonth?>'); this.blur(); return false;">&gt;&gt;</a></div>
<span id="thecalendar_year"><?=$year?></span>年 <span id="thecalendar_month"><?=$month?></span>月
<ul>
<li class="calendarli calendarweek">日</li>
<li class="calendarli calendarweek">一</li>
<li class="calendarli calendarweek">二</li>
<li class="calendarli calendarweek">三</li>
<li class="calendarli calendarweek">四</li>
<li class="calendarli calendarweek">五</li>
<li class="calendarli calendarweek">六</li>	
<?php echo str_repeat('<li class="calendarblank">&nbsp;</li>', $week) ?>
<?php if(is_array($days)) { foreach($days as $key => $value) { ?>		
<?php if($value['count']) { ?>		
<li class="calendarli <?=$value['class']?>" onmouseover="$('day_<?=$key?>').style.display='block';" onmouseout="$('day_<?=$key?>').style.display='none';">
<a href="<?=$url?>&date=<?=$year?>-<?=$month?>-<?=$key?>"><?=$key?></a>
<div class="dayevents" id="day_<?=$key?>" style="display:none;">
<ul class="news_list">
<?php if(is_array($value['events'])) { foreach($value['events'] as $event) { ?>
<li class="dayeventsli"><a href="space.php?do=event&id=<?=$event['eventid']?>"><?=$event['title']?></a></li>
<?php } } ?>
</ul>
</div>
</li>
<?php } else { ?>
<li class="calendarli"><?=$key?></li>
<?php } ?>
<?php } } ?>
</ol>
</div>
<?php } elseif($op == "invite") { ?>
<?php if($event['grade'] == -2) { ?>
<div id="content">
<p>您现在不能给好友发送邀请，因为此活动已经关闭。</p>
</div>
<?php } elseif($event['grade'] <= 0) { ?>	
<div id="content">
<p>您现在不能给好友发送邀请，因为活动还未通过审核。</p>
</div>
<?php } elseif($_SGLOBAL['timestamp'] > $event['deadline']) { ?>
<div id="content">
<p>您现在不能给好友发送邀请，因为活动已经截止报名了。</p>
</div>
<?php } elseif($event['limitnum']>0 && $event['limitnum']<=$event['membernum']) { ?>
<div id="content">
<p>您现在不能给好友发送邀请，因为活动人数已满。</p>
</div>
<?php } else { ?>
<div id="content" style="width: 640px;">
<form id="edit_form" name="edit_form" class="c_form" method="post" action="cp.php?ac=event&op=invite&id=<?=$event['eventid']?>&group=<?=$_GET['group']?>&page=<?=$page?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="h_status">
您可以给未加入本活动的好友们发送邀请。
</div>
<div class="h_status">
<?php if($list) { ?>
<ul class="avatar_list">
<?php if(is_array($list)) { foreach($list as $value) { ?>
<li><div class="avatar48"><a href="space.php?uid=<?=$value['fuid']?>" title="<?=$_SN[$value['fuid']]?>"><?php echo avatar($value[fuid],small); ?></a></div>
<p>
<a href="space.php?uid=<?=$value['fuid']?>" title="<?=$_SN[$value['fuid']]?>"><?=$_SN[$value['fuid']]?></a>
</p>
<p><?php if(empty($joins[$value['fuid']])) { ?><input type="hidden" name="names[]" value="<?=$value['fusername']?>"><input type="checkbox" name="ids[]" value="<?=$value['fuid']?>">选定<?php } else { ?>已邀请<?php } ?></p>
</li>
<?php } } ?>
</ul>
<div class="page"><?=$multi?></div>
<?php } else { ?>
<div class="c_form">还没有好友。</div>
<?php } ?>
</div>
<p>
<input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'ids')"><label for="chkall">全选</label> &nbsp;
<input type="hidden" name="invitesubmit" value="1" />
<input type="submit" name="bnt_invitesubmit" value="邀请" class="submit" />
</p>
</form>
</div>
<div id="sidebar" style="width: 150px;">
<div class="cat">
<h3>好友分类</h3>
<ul class="post_list line_list">
<li<?php if($_GET['group']==-1) { ?> class="current"<?php } ?>><a href="cp.php?ac=event&id=<?=$eventid?>&op=invite&group=-1">全部好友</a></li>
<?php if(is_array($groups)) { foreach($groups as $key => $value) { ?>
<li<?php if($_GET['group']==$key) { ?> class="current"<?php } ?>><a href="cp.php?ac=event&id=<?=$eventid?>&op=invite&group=<?=$key?>"><?=$value?></a></li>
<?php } } ?>
</ul>
</div>
</div>
<?php } ?>
<?php } elseif($op == "members") { ?>
<div id="content" style="width: 640px;">
<form id="edit_form" name="edit_form" class="c_form" method="post" action="cp.php?ac=event&op=members&status=<?=$_GET['status']?>&id=<?=$event['eventid']?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />	
<div class="h_status">
选择相应的用户进行用户状态变更。
<?php if($event['limitnum']) { ?><span style="color:#f00">剩余 <?php echo $event[limitnum]-$event[membernum] ?>  个活动成员名额</span><?php } ?>
</div>	
<div class="h_status">
<?php if($list) { ?>
<table >
<tbody>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<tr>
<td width="40"><input type="checkbox" name="ids[]" value="<?=$value['uid']?>"></td>
<td width="80">
<div><a href="space.php?uid=<?=$value['uid']?>" target="_blank"><?php echo avatar($value[uid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a></p>
</td>
<td>
<?php if($event['allowfellow']) { ?><h2>携带人数：<?php echo intval($value[fellow]) ?></h2><?php } ?>
<?php if($event['template']) { ?>
<h2>报名信息：</h2>
<p><?php echo nl2br(htmlspecialchars($value[template])) ?></p>
<?php } ?>
</td>
</tr>
<?php } } ?>
</tbody>
</table>
<div class="page"><?=$multi?></div>
<?php } else { ?>
<div class="c_form">还没有相关成员。</div>
<?php } ?>
</div>
<p>
<input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'ids')"><label for="chkall">全选</label> &nbsp;
设为：
<select name="status">
<option value="2">普通成员</option>
<?php if($_SGLOBAL['supe_uid']==$event['uid']) { ?>
<option value="3">组织者</option>
<?php } ?>
<?php if($event['verify']) { ?>
<option value="0">待审核</option>
<?php } ?>
<option value="-1">踢出成员</option>
</select>
<input type="submit" name="memberssubmit" value="提交" class="submit" />
</p>
</form>
</div>

<div id="sidebar" style="width: 150px;">
<div class="cat">
<h3>成员状态</h3>
<ul class="post_list line_list">
<li<?php if($_GET['status']==0) { ?> class="current"<?php } ?>><a href="cp.php?ac=event&op=members&id=<?=$eventid?>&status=0">待审核</a></li>
<li<?php if($_GET['status']==2) { ?> class="current"<?php } ?>><a href="cp.php?ac=event&op=members&id=<?=$eventid?>&status=2">普通成员</a></li>
<li<?php if($_GET['status']==3) { ?> class="current"<?php } ?>><a href="cp.php?ac=event&op=members&id=<?=$eventid?>&status=3">组织者</a></li>
</ul>
</div>
</div>
<?php } elseif($op == "thread") { ?>
<div id="d_edit_form">
<form id="edit_form" name="edit_form" class="c_form" method="post" action="cp.php?ac=event&op=thread&id=<?=$event['eventid']?>" onsubmit="return confirm('此操作不可恢复，确认吗?')">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<?php if($threadlist) { ?>
<div class="topic_list">
<table cellspacing="0" cellpadding="0">
<thead>
<tr>
<td width="30">选择</td>
<td class="subject">主题</td>
<td class="author">作者 (回应/阅读)</td>
<td class="lastpost">最后更新</td>
</tr>
</thead>
<tbody>
<?php if(is_array($threadlist)) { foreach($threadlist as $key => $value) { ?>
<tr <?php if($key%2==1) { ?>class="alt"<?php } ?>>
<td>
<input type="checkbox" name="ids[]" value="<?=$value['tid']?>" />
</td>
<td class="subject">
<a href="space.php?uid=<?=$value['uid']?>&do=thread&id=<?=$value['tid']?>&eventid=<?=$eventid?>"><?=$value['subject']?></a>
</td>
<td class="author"><a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a><br><em><?=$value['replynum']?>/<?=$value['viewnum']?></em></td>
<td class="lastpost"><a href="space.php?uid=<?=$value['lastauthorid']?>" title="<?=$_SN[$value['lastauthorid']]?>"><?=$_SN[$value['lastauthorid']]?></a><br><?php echo sgmdate('m-d H:i',$value[lastpost],1); ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
<p>
<input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'ids')"><label for="chkall">全选</label> &nbsp;
<input type="submit" name="delthreadsubmit" value="删除" class="submit" />
</p>
</div>
<?php } else { ?>
<div class="c_form" style="text-align:center;">还没有相关话题。</div>
<?php } ?>
</form>
</div>

<?php } elseif($op == 'edithot') { ?>

<h1>调整热度</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner">
<form method="post" action="cp.php?ac=event&op=edithot&id=<?=$eventid?>">
<p class="btn_line">
新的热度：<input type="text" name="hot" value="<?=$event['hot']?>" size="5"> 
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<input type="hidden" name="hotsubmit" value="true" />
<input type="submit" name="btnsubmit" value="确定" class="submit" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<?php } elseif($op == "pic") { ?>
<div id="d_edit_form">
<form id="edit_form" name="edit_form" class="c_form" method="post" action="cp.php?ac=event&op=pic&id=<?=$event['eventid']?>" onsubmit="return confirm('此操作不可恢复，确认吗?')">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div id="album" class="article">
<?php if(sizeof($photolist) > 0) { ?>
<table width="100%" cellspacing="6" cellpadding="0" class="photo_list">
<tbody>
<tr>
<?php if(is_array($photolist)) { foreach($photolist as $key => $value) { ?>
<td>
<a href="space.php?do=event&id=<?=$eventid?>&view=pic&picid=<?=$value['picid']?>"><img src="<?=$value['pic']?>" alt="<?=$value['title']?>" /></a>
<br />
<input type="checkbox" value="<?=$value['picid']?>" name="ids[]"/>选定
</td>
<?php if($key%4==3) { ?></tr><tr><?php } ?>
<?php } } ?>
</tr>
</tbody>
</table>
<div class="page"><?=$multi?></div>
<p>
<input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'ids')"><label for="chkall">全选</label> &nbsp;
<input type="submit" name="deletepicsubmit" value="删除选定" class="submit" />
</p>
<?php } else { ?>
<p align="center">还没有活动照片</p>
<?php } ?>
</div>
</form>
</div>
<?php } elseif($op == "eventinvite") { ?>
<div class="h_status">
您的好友邀请您加入以下活动
<?php if(!empty($eventinvites)) { ?>
<span class="pipe">|</span>
<a href="cp.php?ac=event&op=eventinvite&&r=1"><span>忽略所有邀请</span></a>
<?php } ?>
</div>

<div class="c_form">
<?php if(!empty($eventinvites)) { ?>
<table cellspacing="4" cellpadding="4" class="formtable">
<?php if(is_array($eventinvites)) { foreach($eventinvites as $value) { ?>
<tr>
<td width="100px">
<div>
<a href="space.php?do=event&id=<?=$value['eventid']?>" target="_blank">
<img src="<?=$value['pic']?>" alt="<?=$value['title']?>" class="poster_pre">
</a>
</div>
</td>
<td class="h_status">
<p><a href="space.php?do=event&id=<?=$value['eventid']?>" target="_blank" style="font-size:14px;font-weight:bold;">
<?=$value['title']?></a></p>
<br>活动时间：<?php echo sgmdate("n月d日 G:i", $value[starttime]) ?> - <?php echo sgmdate("n月d日 G:i", $value[endtime]) ?>
<?php if($value['endtime']<$_SGLOBAL['timestamp']) { ?>
<span class="event_state"> 已结束</span>
<?php } elseif($value['deadline']<$_SGLOBAL['timestamp']) { ?>
<span class="event_state"> 报名截止</span>
<?php } ?>
<br>活动地点：<?=$value['province']?> - <?=$value['city']?> <?=$value['location']?>
<br>发起人：<a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a>
<div id="eventinvite_<?=$value['eventid']?>" style="padding:0.5em 0 0.5em 0;">
邀请好友：<a href="space.php?uid=<?=$value['uid']?>" target="_blank"><?=$_SN[$value['uid']]?></a>
<br>邀请时间：<?php echo sgmdate('Y-m-d H:i', $value[invitetime], 1) ?>
<p style="padding:1em 0 0 0;">
<a id="a_accept" href="cp.php?ac=event&op=acceptinvite&id=<?=$value['eventid']?>" class="submit" onclick="ajaxget(this.href, 'eventinvite_<?=$value['eventid']?>'); return false;">接受邀请</a>
<a href="cp.php?ac=event&op=eventinvite&id=<?=$value['eventid']?>&r=1" class="button">忽略</a>
</p>
</div>
</td>
</tr>
<?php } } ?>
</table>
<?php } else { ?>
暂时没有新的活动邀请。
<?php } ?>
</div>
<?php } else { ?>

<?php if($topic) { ?>
<h2 class="title">
<img src="image/app/topic.gif" />热闹 - <a href="space.php?do=topic&topicid=<?=$topicid?>"><?=$topic['subject']?></a>
</h2>
<div class="tabs_header">
<ul class="tabs">
<li class="active"><a href="javascript:;"><span>凑个热闹</span></a></li>
<li><a href="space.php?do=topic&topicid=<?=$topicid?>"><span>查看热闹</span></a></li>
</ul>
<?php if(checkperm('managetopic') || $topic['uid']==$_SGLOBAL['supe_uid']) { ?>
<div class="r_option">
<a href="cp.php?ac=topic&op=edit&topicid=<?=$topic['topicid']?>">编辑</a> | 
<a href="cp.php?ac=topic&op=delete&topicid=<?=$topic['topicid']?>" id="a_delete_<?=$topic['topicid']?>" onclick="ajaxmenu(event,this.id);">删除</a>
</p>
</div>
<?php } ?>
</div>


<div class="affiche">
<table width="100%">
<tr>
<?php if($topic['pic']) { ?>
<td width="160" id="event_icon" valign="top">
<img src="<?=$topic['pic']?>" width="150">
</td>
<?php } ?>
<td valign="top">
<h2>
<a href="space.php?do=topic&topicid=<?=$topic['topicid']?>"><?=$topic['subject']?></a>
</h2>

<div style="padding:5px 0;"><?=$topic['message']?></div>
<ul>
<li class="gray">发起作者: <a href="space.php?uid=<?=$topic['uid']?>"><?=$_SN[$topic['uid']]?></a></li>
<li class="gray">发起时间: <?=$topic['dateline']?></li>
<?php if($topic['endtime']) { ?><li class="gray">参与截止: <?=$topic['endtime']?></li><?php } ?>
<?php if($topic['joinnum']) { ?>
<li class="gray">参与人次: <?=$topic['joinnum']?></li>
<?php } ?>
<li class="gray">最后参与: <?=$topic['lastpost']?></li>
</ul>

<?php if($topic['allowjoin']) { ?>
<a href="<?=$topic['joinurl']?>" class="feed_po" id="hot_add" onmouseover="showMenu(this.id)">凑个热闹</a>
<ul id="hot_add_menu" class="dropmenu_drop" style="display:none;">
<?php if(in_array('blog', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=blog&topicid=<?=$topicid?>">发表日志</a></li>
<?php } ?>
<?php if(in_array('pic', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=upload&topicid=<?=$topicid?>">上传图片</a></li>
<?php } ?>
<?php if(in_array('thread', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=thread&topicid=<?=$topicid?>">发起话题</a></li>
<?php } ?>
<?php if(in_array('poll', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=poll&topicid=<?=$topicid?>">发起投票</a></li>
<?php } ?>
<?php if(in_array('event', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=event&topicid=<?=$topicid?>">发起活动</a></li>
<?php } ?>
<?php if(in_array('share', $topic['jointype'])) { ?>
<li><a href="cp.php?ac=share&topicid=<?=$topicid?>">添加分享</a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="r_option">该热闹已经截止</p>
<?php } ?>
</td>
</tr></table>
</div>

<?php } ?>

<div class="c_form">
<form id="edit_form" name="edit_form" method="post" enctype="multipart/form-data" action="cp.php?ac=event&op=edit&id=<?=$eventid?>">
<table class="infotable" width="100%" cellspacing="4" cellpadding="4">				
<tbody>					
<tr>
<th>活动名称 *</th>
<td>
<input class="t_input" id="title" name="title" value="<?=$event['title']?>" size="56" type="text" maxlength="80">
</td>
</tr>
<tr>
<th>活动城市 *</th>
<td id="citybox">
<script type="text/javascript" src="source/script_city.js" charset="<?=$_SC['charset']?>"></script>
                            <script type="text/javascript" charset="<?=$_SC['charset']?>">
showprovince('province', 'city', '<?=$event['province']?>', 'citybox');
                                showcity('city', '<?=$event['city']?>', 'province', 'citybox');
                            </script>
</td>
</tr>
<tr>
<th>活动地点</th>
<td>
<input class="t_input" id="location" name="location" value="<?=$event['location']?>" size="56" type="text" maxlength="80">
</td>
</tr>
<tr>
<th>活动时间 *</th>
<td>
<script type="text/javascript" src="source/script_calendar.js" charset="<?=$_SC['charset']?>"></script>
<input type="text" name="starttime" id="starttime" value="<?php echo sgmdate('Y-m-d H:i', $event[starttime]) ?>"  onclick="showcalendar(event,this,1,'<?php echo sgmdate('Y-m-d H:i', $_SGLOBAL[timestamp]) ?>', '<?php echo sgmdate('Y-m-d H:i', $_SGLOBAL[timestamp] + 3600 * 24 * 60) ?>')" />
 至
<input type="text" name="endtime" id="endtime" value="<?php echo sgmdate('Y-m-d H:i', $event[endtime]) ?>"  onclick="showcalendar(event,this,1,'<?php echo sgmdate('Y-m-d H:i', $_SGLOBAL[timestamp]) ?>', '<?php echo sgmdate('Y-m-d H:i', $_SGLOBAL[timestamp] + 3600 * 24 * 60) ?>')" />
</td>
</tr>
<tr>
<th>报名截止 *</th>
<td>
<input type="text" name="deadline" id="deadline" value="<?php echo sgmdate('Y-m-d H:i', $event[deadline]) ?>"  onclick="showcalendar(event,this,1,'<?php echo sgmdate('Y-m-d H:i', $_SGLOBAL[timestamp]) ?>', '<?php echo sgmdate('Y-m-d H:i', $_SGLOBAL[timestamp] + 3600 * 24 * 60) ?>')" />
</td>
</tr>
<tr>
<th width="100" style="vertical-align: top;">活动分类 *</th>
<td>
<select name="classid" id="classid" onchange="reset_eventclass(this.value)">
<option value="-1">
请选择活动分类
</option>
<?php if(is_array($_SGLOBAL['eventclass'])) { foreach($_SGLOBAL['eventclass'] as $key => $value) { ?>
<option value="<?=$key?>" <?php if($event['classid'] == $key) { ?> selected<?php } ?> ><?=$value['classname']?></option>
<?php } } ?>
</select>
<div id="classid_info"></div>
</td>
</tr>
<tr>
<td colspan="2">
<a id="doodleBox" href="magic.php?mid=doodle&showid=blog_doodle&target=uchome-ttHtmlEditor&from=editor" style="display:none"></a>
<textarea class="userData" name="detail" id="uchome-ttHtmlEditor" style="height:100%;width:100%;display:none;border:0px"><?=$event['detail']?></textarea>
<iframe src="editor.php?charset=<?=$_SC['charset']?>&allowhtml=0&doodle=<?php if(isset($_SGLOBAL['magic']['doodle'])) { ?>1<?php } ?>" name="uchome-ifrHtmlEditor" id="uchome-ifrHtmlEditor" scrolling="no" border="0" frameborder="0" style="width:100%;border: 1px solid #C5C5C5;" height="400"></iframe></td>
</tr>
<tr>
<th style="vertical-align: top;">活动海报</th>
<td>
<input type="file" name="poster" /> 图片将上传到您的默认相册。<br />
<input type="checkbox" id="sharepic" name="sharepic" value="1" />
<label for="sharepic">同时把海报共享到活动相册</label>
</td>
</tr>
<?php if($mtags) { ?>
<tr>
<th>关联小组</th>
<td>
<select name="tagid">
<option value="">选择关联小组</option>
<?php if(is_array($mtags)) { foreach($mtags as $value) { ?>
<option value="<?=$value['tagid']?>" <?php if($value['tagid']==$event['tagid']) { ?>selected<?php } ?> ><?=$value['tagname']?></option>
<?php } } ?>
</select>
必须是您自己创建的小组，关联后活动话题会同步到该小组。
</td>
</tr>
<?php } ?>
</tbody>
</table>
<table class="infotable" width="100%" cellspacing="4" cellpadding="4">
<tbody>
<tr>
<td colspan="2">
<a id="toggle_advanced" href="#" onclick="toggle_advanced(); this.blur(); return false;">
展开高级设置</a>						
</td>
</tr>
</tbody>
</table>
<table id="advanced_info" class="infotable" width="100%" cellspacing="4" cellpadding="4" style="display:none">
<tbody>
<tr>
<th width="100">活动人数</th>
<td>
<input name="limitnum" value="<?=$event['limitnum']?>" id="limitnum" type="text" size="4" maxlength="8">
                            <span class="tiptext">
                                活动参加人数限制，设为 0 表示无限制。
                            </span>
</td>
</tr>
<tr>
<th width="100" style="vertical-align: top;">活动隐私</th>
<td>
<select name="public" id="public">
<option <?php if($event['public']==2) { ?>selected="selected"<?php } ?> value="2">公开活动，所有人可见可加入</option>
<option <?php if($event['public']==1) { ?>selected="selected"<?php } ?> value="1">半公开活动，所有人可见, 邀请才能加入</option>
<option <?php if($event['public']==0) { ?>selected="selected"<?php } ?> value="0">私密活动，被邀请者可见</option>
</select>
</td>
</tr>
<tr>
<th width="100" style="vertical-align: top;">活动选项</th>
<td>
<input name="allowinvite" id="allowinvite" value="1" type="checkbox"<?php if($event['allowinvite']) { ?> checked="checked"<?php } ?>>
                            <label for="allowinvite">
                                允许参与者邀请好友，被邀请者加入活动不需要审核
                            </label>
                            <br>
<input name="allowpic" id="allowpic" value="1" type="checkbox"<?php if($event['allowpic']) { ?> checked="checked"<?php } ?>>
                            <label for="allowpic">
                                允许参与者共享活动照片
                            </label>
                            <br>
<input name="allowpost" id="allowpost" value="1" type="checkbox"<?php if($event['allowpost']) { ?> checked="checked"<?php } ?>>
                            <label for="allowpost">
                                允许所有人发布留言
                            </label>
                            <br>
                            <input name="verify" id="verify" value="1" type="checkbox"<?php if($event['verify']) { ?> checked="checked"<?php } ?>>
                            <label for="verify">
                                参加活动需要审批
                            </label>
<br>
                            <input name="allowfellow" id="allowfellow" value="1" type="checkbox"<?php if($event['allowfellow']) { ?> checked="checked"<?php } ?>>
                            <label for="allowfellow">
                                允许参加者携带朋友，携带朋友数会占用活动参与者名额
                            </label>
</td>
</tr>
<tr>
<th width="100" style="vertical-align: top;">报名信息</th>
<td>
如果要求参加者填写报名信息（最多255个字符），你可以在此处给出一个格式模板。留空表示不要求填写。<br />
                            <textarea id="template" name="template" rows="4" cols="72"><?=$event['template']?></textarea>
</td>
</tr>
</tr>
</tbody>
</table>
<?php if(checkperm('seccode')) { ?>
<table class="infotable" width="100%" cellspacing="4" cellpadding="4">
<tbody>
<?php if($_SCONFIG['questionmode']) { ?>
<tr>
<th width="100" style="vertical-align: top;">请回答验证问题</th>
<td>
<p><?php question(); ?></p>
<input type="text" id="seccode" name="seccode" value="" size="15" class="t_input" />
</td>
</tr>
<?php } else { ?>
<tr>
<th width="100" style="vertical-align: top;">请填写验证码</th>
<td>
<script type="text/javascript" charset="<?=$_SC['charset']?>">seccode();</script>
<p>请输入上面的4位字母或数字，看不清可<a href="javascript:updateseccode()">更换一张</a></p>
<input type="text" id="seccode" name="seccode" value="" size="15" class="t_input" />
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } ?>
<table class="infotable" width="100%" cellspacing="4" cellpadding="4">
<tbody>
<?php if(empty($eventid)) { ?>
<tr>
<th width="100">动态选项</th>
<td>
<input type="checkbox" name="makefeed" id="makefeed" value="1"<?php if(ckprivacy('event', 1)) { ?> checked<?php } ?>> 产生动态 (<a href="cp.php?ac=privacy#feed" target="_blank">更改默认设置</a>)
</td>
</tr>
<?php } ?>
<tr>
<th width="100">&nbsp;</th>
<td>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
                            <input type="hidden" name="topicid" value="<?=$topicid?>" />
                            <input type="hidden" name="eventsubmit" value="1" />
                            <input class="submit" value="<?php if($_GET['id']) { ?>保存<?php } else { ?>提交<?php } ?>" type="button" onclick="check_eventpost()"/>
</td>
</tr>
</tbody>
</table>
</form>
</div>

<script type="text/javascript" src="image/editor/editor_function.js" charset="<?=$_SC['charset']?>"></script>
<script type="text/javascript" charset="<?=$_SC['charset']?>">
//活动分类
var eventclass = [];
<?php if(is_array($_SGLOBAL['eventclass'])) { foreach($_SGLOBAL['eventclass'] as $key => $value) { ?>
eventclass["<?=$key?>"] = {};
<?php if(is_array($value)) { foreach($value as $k => $v) { ?>
eventclass["<?=$key?>"]["<?=$k?>"] = '<?php echo str_replace(array("\r\n","\r","\n"), "<br>", $v) ?>';
<?php } } ?>
<?php } } ?>
function reset_eventclass(classid){
var selclass = eventclass[classid];
var o = $("uchome-ifrHtmlEditor").contentWindow.document.getElementById("HtmlEditor").contentWindow.document.body;
var append =false;// 是否添加
if(selclass && selclass['template'] && (trim(o.innerHTML.replace(/<br[ \/]*>|<div><\/div>/img, '')) == "" || confirm("要添加站长设定的活动分类模板到活动介绍吗？"))){
append = true;
}
if (append){
o.innerHTML = selclass['template'] + "<br/>" + o.innerHTML;				
$("classid_info").innerHTML = "请参考站长设定的模板填写活动介绍";				
}
}

//展开高级设置
function toggle_advanced(){
var el = $("advanced_info");
if (el.style.display == "none"){
el.style.display = "";
$("toggle_advanced").innerHTML = "隐藏高级设置";
} else {
el.style.display = "none";
$("toggle_advanced").innerHTML = "展开高级设置";
}
}

//检查提交
function check_eventpost(){			
// 活动类型
if (parseInt($("classid").value) < 0){
alert("活动类型必须选择。");
$("classid").focus();
return false;
}	
// 标题
var val = trim($("title").value);
if ( val == "" ){
alert("活动标题不能为空！");
$("title").focus();
return false;
} else if (val.replace(/[^\x00-\xff]/g, "**").length > 80){
alert("活动标题太长，请限制在80个字符内！");
$("title").focus();
return false;
}	
// 活动地点
if($('city').value == ""){
alert("活动举办城市不能为空。");
$("city").focus();
return false;
}			
// 报名时间，起始-结束时间
var deadline = parsedate($("deadline").value).getTime();
var starttime = parsedate($("starttime").value).getTime();
var endtime = parsedate($("endtime").value).getTime();
<?php if(!$eventid) { ?>
var nowtime = new Date().getTime();
if (starttime < nowtime){
alert("活动开始时间不能早于现在。");
$("starttime").focus();
return false;
}
<?php } ?>
if (endtime - deadline < 0){
alert("报名截止时间不能晚于活动结束时间。");
$("deadline").focus();
return false;
}
if (endtime - starttime < 0){
alert("活动结束时间不能早于开始时间。");
$("endtime").focus();
return false;
}
if (endtime - starttime > 60 * 24 * 3600 * 1000){
alert("活动持续时间不能超过 60 天。");
$("endtime").focus();
return false;
}
// 限制人数
if (! /^[0-9]{1,8}$/.test($("limitnum").value)){
alert("活动人数输入不正确。");
$("limitnum").focus();
return false;
}

    var makefeed = $('makefeed');
    if(makefeed) {
    	if(makefeed.checked == false) {
    		if(!confirm("友情提醒：您确定此次发布不产生动态吗？\n有了动态，好友才能及时看到你的更新。")) {
    			return false;
    		}
    	}
    }
    
    // 编辑器内容同步
edit_save();
// 活动描述，默认可能有一个<br/>或<div></div>，需要去掉再判断
val = trim($("uchome-ttHtmlEditor").value.replace(/<br[ \/]*>|<div><\/div>/img,''));
if (val == ""){
alert("活动描述不能为空。");
return false;
}						
//验证码
if($('seccode')) {
var code = $('seccode').value;
var x = new Ajax();
x.get('cp.php?ac=common&op=seccode&code=' + code, function(s){
s = trim(s);
if(s.indexOf('succeed') == -1) {
alert(s);
$('seccode').focus();
           		return false;
} else {
$("edit_form").submit();
}
});
    } else {
    	$("edit_form").submit();
    }
}
</script>
<?php } ?>
<?php if(in_array($op,array("edit", "pic", "thread", "members", "comment", "invite", "eventinvite"))) { ?>
<!--//管理页面页尾//-->
</div>
<?php } ?>
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
<?php } ?><?php ob_out();?>