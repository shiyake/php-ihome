<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('template/new/space_index|template/new/header|template/new/space_status_feed|template/new/space_feed_li|template/new/space_comment_li|template/new/footer', '1381979388', 'template/new/space_index');?><?php $_TPL['nosidebar']=1; ?>
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


<?php if($narrowlist || $widelist) { ?>
<script type="text/javascript" src="source/script_swfobject.js"></script>
<?php } ?>

<div id="space_page">

<div id="ubar">

<div id="space_avatar">
<?php if($space['magicstar'] && $space['magicexpire']>$_SGLOBAL['timestamp']) { ?>
<div class="magicstar">
<object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,45,0" width="200" height="250">
<param name="movie" value="image/magic/star/<?=$space['magicstar']?>.swf" />
<param name="quality" value="high" />
<param NAME="wmode" value="transparent">
<embed src="image/magic/star/<?=$space['magicstar']?>.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"  wmode="transparent" width="200" height="250"></embed>
</object>
</div>

<div class="magicavatar"><?php } else { ?><div><?php } ?><?php echo avatar($space[uid],big); ?></div>

</div>

<?php if($space['self'] && $_SGLOBAL['magic']['superstar']) { ?>
<div class="borderbox">
<div style="width:100%; overflow:hidden;">
<img src="image/magic/superstar.small.gif" class="magicicon" />
<?php if($space['magicstar'] && $space['magicexpire']>$_SGLOBAL['timestamp']) { ?>
<a id="a_magic_superstar" href="cp.php?ac=magic&op=cancelsuperstar" onclick="ajaxmenu(event, this.id)">取消超级明星</a>
<?php } else { ?>
<a id="a_magic_superstar" href="magic.php?mid=superstar" onclick="ajaxmenu(event, this.id, 1)">我要变超级明星</a>
<?php } ?>
</div>
</div><br />
<?php } ?>

<div class="borderbox">
<ul class="spacemenu_list" style="width:100%; overflow:hidden;">
<?php if($space['self']) { ?>
<li><a href="cp.php?ac=avatar">我的头像</a></li>
<li><a href="cp.php?ac=profile">个人资料</a></li>
<li><a href="cp.php?ac=theme">主页风格</a></li>
<li><a href="cp.php?ac=credit">我的积分</a></li>
<?php if($_SCONFIG['sendmailday']) { ?>
<li><a href="cp.php?ac=sendmail">邮件提醒</a></li>
<?php } ?>
<li><a href="cp.php?ac=privacy">隐私筛选</a></li>
<?php } else { ?>
<?php if($space['groupid']!=3 && !$space['isfriend']) { ?>
<li><img src="image/icon/friend.gif"><a href="cp.php?ac=friend&op=add&uid=<?=$space['uid']?>" id="a_friend_li" onclick="ajaxmenu(event, this.id, 1)">加为好友</a></li>
<?php } elseif($space['groupid']==3 && !$followflag) { ?>
<li><img src="image/icon/friend.gif"><a href="cp.php?ac=friend&op=add&uid=<?=$space['uid']?>" id="a_friend_li" onclick="ajaxmenu(event, this.id, 1)">添加关注</a></li>
<?php } ?>
<li><img src="image/icon/wall.gif"><a href="#comment">给我留言</a></li>
<li><img src="image/icon/poke.gif"><a href="cp.php?ac=poke&op=send&uid=<?=$space['uid']?>" id="a_poke" onclick="ajaxmenu(event, this.id, 1)">打个招呼</a></li>
<li><img src="image/icon/pm.gif"><a href="cp.php?ac=pm&uid=<?=$space['uid']?>" id="a_pm" onclick="ajaxmenu(event, this.id, 1)">发送消息</a></li>
<?php if($space['groupid']!=3 && $space['isfriend']) { ?>
<li><img src="image/icon/friend.gif"><a href="cp.php?ac=friend&op=ignore&uid=<?=$space['uid']?>" id="a_ignore" onclick="ajaxmenu(event, this.id)">解除好友</a></li>
<?php } elseif($followflag) { ?>
<li><img src="image/icon/friend.gif"><a href="cp.php?ac=friend&op=ignore&uid=<?=$space['uid']?>" id="a_ignore" onclick="ajaxmenu(event, this.id)">取消关注</a></li>
<?php } ?>

<li><img src="image/icon/report.gif"><a href="cp.php?ac=common&op=report&idtype=uid&id=<?=$space['uid']?>" id="a_report" onclick="ajaxmenu(event, this.id, 1)">违规举报</a></li>
<?php if(checkperm('managename')||checkperm('managespacegroup')||checkperm('managespaceinfo')||checkperm('managespacecredit')||checkperm('managespacenote')) { ?>
<li><img src="image/icon/profile.gif"><a href="admincp.php?ac=space&op=manage&uid=<?=$space['uid']?>" id="a_manage">管理用户</a></li>
<?php } ?>
<?php } ?>
</ul>
</div><br />

<div id="space_mymenu">
<h2>个人菜单</h2>
<ul class="line_list">
<li>
<?php if($space['self']) { ?>
<a href="cp.php?ac=profile" class="r_option" target="_blank">完善</a>
<?php } ?>
<img src="image/icon/profile.gif"><a href="javascript:;" onclick="getindex('info');">个人资料</a>
</li>
<li>
<?php if($space['self']) { ?>
<a href="space.php?do=doing&view=me" class="r_option" target="_blank">我踩</a>
<?php } ?>
<img src="image/icon/doing.gif"><a href="javascript:;" onclick="getindex('doing');">足迹</a><?php if($space['doingnum']) { ?><em>(<?=$space['doingnum']?>)</em><?php } ?>
</li>
<li>
<?php if($space['self']) { ?>
<a href="cp.php?ac=blog" class="r_option" target="_blank">发表</a>
<?php } ?>
<img src="image/icon/blog.gif"><a href="javascript:;" onclick="getindex('blog');">日志</a><?php if($space['blognum']) { ?><em>(<?=$space['blognum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=upload" class="r_option" target="_blank">上传</a>
<?php } ?>
<img src="image/icon/album.gif"><a href="javascript:;" onclick="getindex('album');">相册</a><?php if($space['albumnum']) { ?><em>(<?=$space['albumnum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=thread" class="r_option" target="_blank">发表</a>
<?php } ?>
<img src="image/icon/thread.gif"><a href="javascript:;" onclick="getindex('thread');">话题</a><?php if($space['threadnum']) { ?><em>(<?=$space['threadnum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=poll" class="r_option" target="_blank">发起</a>
<?php } ?>
<img src="image/icon/poll.gif"><a href="javascript:;" onclick="getindex('poll');">投票</a><?php if($space['pollnum']) { ?><em>(<?=$space['pollnum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=event" class="r_option" target="_blank">发起</a>
<?php } ?>
<img src="image/icon/event.gif"><a href="javascript:;" onclick="getindex('event');">活动</a><?php if($space['eventnum']) { ?><em>(<?=$space['eventnum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="space.php?do=share&view=me" class="r_option" target="_blank">添加</a>
<?php } ?>
<img src="image/icon/share.gif"><a href="javascript:;" onclick="getindex('share');">分享</a><?php if($space['sharenum']) { ?><em>(<?=$space['sharenum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=friend&op=search" class="r_option" target="_blank">寻找</a>
<?php } ?>
<img src="image/icon/friend.gif"><a href="javascript:;" onclick="getindex('friend');">好友</a><?php if($space['friendnum']) { ?><em>(<?=$space['friendnum']?>)</em><?php } ?></li>
<li><?php if($space['groupid']==3) { ?>
<img src="image/icon/friend.gif"><a href="javascript:;" onclick="getindex('aud');">粉丝</a><em>(<?=$space['audnum']?>)</em><?php } ?></li>
</ul>
</div>

<?php if($guidelist) { ?>
<div id="space_app_guide">
<h2>应用菜单</h2>
<ul class="line_list">
<?php if(is_array($guidelist)) { foreach($guidelist as $value) { ?>
<li id="space_app_profilelink_<?=$value['appid']?>">
<?php if($space['self']) { ?>
<a href="cp.php?ac=space&op=delete&appid=<?=$value['appid']?>&type=profilelink" id="user_app_profile_<?=$value['appid']?>" class="r_option float_del" style="position: static;" onclick="ajaxmenu(event, this.id)" title="删除">删除</a>
<?php } ?>
<img src="http://appicon.manyou.com/icons/<?=$value['appid']?>"><?php eval($value[profilelink]); ?>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if(is_array($narrowlist)) { foreach($narrowlist as $value) { ?>
<div id="space_app_<?=$value['appid']?>">
<h2>
<?php if($space['self']) { ?>
<a href="cp.php?ac=space&op=delete&appid=<?=$value['appid']?>" id="user_app_<?=$value['appid']?>" class="r_option float_del" onclick="ajaxmenu(event, this.id)" title="删除">删除</a>
<?php } ?>
<a href="<?=$value['appurl']?>"><?=$value['appname']?></a>
</h2>
<?php if($value['myml']) { ?>
<div class="box">
<?php eval($value[myml]); ?>
</div>
<?php } ?>
</div>
<?php } } ?>

</div>
<div id="mainarea">
<div id="content">

<h3 id="spaceindex_name">

<?php if($space['name']) { ?>
<a href="space.php?uid=<?=$space['uid']?>"<?php g_color($space[groupid]); ?>><?=$space['name']?></a>
<?php } else { ?>
<a href="space.php?uid=<?=$space['uid']?>"<?php g_color($space[groupid]); ?>><?=$space['username']?></a>
<?php } ?>

<?php if($_SCONFIG['realname']) { ?>
<?php if($space['namestatus']) { ?>
&nbsp;<img src="image/realname_yes.gif" align="absmiddle" alt="已通过实名认证"> <span class="gray">实名认证</span>
<?php } else { ?>
&nbsp;<img src="image/realname_no.gif" align="absmiddle" alt="未通过实名认证"> <span class="gray">未认证</span>
<?php } ?>
<?php } ?>

<?php if($_SCONFIG['videophoto']) { ?>	
<?php if($space['videostatus']) { ?>
&nbsp;<img src="image/videophoto_yes.gif" align="absmiddle" alt="已通过视频认证"> <a id="a_space_videophoto" href="space.php?uid=<?=$space['uid']?>&do=videophoto" onclick="ajaxmenu(event, this.id, 1)"><span style="color:red;font-weight:bold;font-size:12px;">查看视频认证照</span></a>
<?php } else { ?>
&nbsp; <img src="image/videophoto_no.gif" align="absmiddle" alt="未通过视频认证"> <span class="gray"><a href="cp.php?ac=videophoto">视频未认证</a></span>
<?php } ?>
<?php } ?>
</h3>


<div id="spaceindex_note">
<a href="cp.php?ac=share&type=space&id=<?=$space['uid']?>" class="a_share" id="a_share" onclick="ajaxmenu(event, this.id, 1)">分享</a>
<a href="rss.php?uid=<?=$space['uid']?>" id="i_rss" title="订阅 RSS">订阅</a>

<ul class="note_list">
<li>已有 <?=$space['viewnum']?> 人次访问, <?=$space['credit']?> 个积分, <?=$space['experience']?> 个经验 <?=$space['star']?></li>
<li>用户组别：<a href="cp.php?ac=credit&op=usergroup"><?=$_SGLOBAL['grouptitle'][$space['groupid']]['grouptitle']?></a> <?php g_icon($space[groupid]); ?></li>
<li>主页地址：<a href="<?=$space['domainurl']?>" onclick="javascript:setCopy('<?=$space['domainurl']?>');return false;" class="spacelink domainurl"><?=$space['domainurl']?></a></li>

<?php if(!$space['self'] && $space['note']) { ?>
<li><?=$space['note']?> <a href="space.php?uid=<?=$space['uid']?>&do=doing">&raquo;</a></li>
<?php } ?>
</ul>

<?php if($space['self']) { ?>
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
<?php } ?>
</div>

<div id="maincontent">

<?php if(!$space['isfriend']) { ?>
<div class="borderbox">
<p style="padding-bottom:10px;">如果您认识<?=$_SN[$space['uid']]?>，可以给TA留个言，或者打个招呼，或者添加为好友。<br />成为好友后，您就可以第一时间关注到TA的更新动态。</p>
<a href="cp.php?ac=friend&op=add&uid=<?=$space['uid']?>" id="a_friend_notice" onclick="ajaxmenu(event, this.id, 1)" class="submit">加为好友</a></p>
</div><br>
<?php } ?>

<div id="space_info">
<h3 class="feed_header">
<?php if($space['self']) { ?>
<a href="cp.php?ac=profile" class="r_option">完善资料</a>
<?php } ?>
个人资料
</h3>
<ul class="spacemenu_list">
<li><em>创建:</em><?php echo sgmdate('Y-m-d',$space[dateline],1); ?></li>
<li><em>登录:</em><?php if($space['lastlogin']) { ?><?php echo sgmdate('Y-m-d',$space[lastlogin],1); ?><?php } ?></li>
<?php if($isonline) { ?>
<li><em>活跃:</em><?=$isonline?> (当前在线)</li>
<?php } ?>
<?php if($space['sex']) { ?>
<li><em>性别:</em><?=$space['sex']?></li>
<?php } ?>
<?php if($space['birth']) { ?>
<li><em>生日:</em><?=$space['birth']?></li>
<?php } ?>
<?php if($space['blood']) { ?>
<li><em>血型:</em><?=$space['blood']?></li>
<?php } ?>
<?php if($space['marry']) { ?>
<li><em>婚恋:</em><?=$space['marry']?></li>
<?php } ?>
<?php if($space['residecity']) { ?>
<li><em>居住:</em><?=$space['residecity']?></li>
<?php } ?>
<?php if($space['birthcity']) { ?>
<li><em>家乡:</em><?=$space['birthcity']?></li>
<?php } ?>
<?php if($space['mobile']) { ?>
<li><em>手机:</em><?=$space['mobile']?></li>
<?php } ?>
<?php if($space['qq']) { ?>
<li><em>QQ:</em><?=$space['qq']?></li>
<?php } ?>
<?php if($space['msn']) { ?>
<li><em>MSN:</em><?=$space['msn']?></li>
<?php } ?>
</ul>
<p class="info_more"><a href="javascript:;" onclick="getindex('info');">&raquo; 查看全部个人资料</a></p>
</div>

<?php if($feedlist) { ?>
<?php $_TPL['hidden_hot']=1; ?>
<div id="space_feed" class="feed">
<h3 class="feed_header">
<span class="r_option">
<a href="space.php?uid=<?=$space['uid']?>&do=feed&view=me" class="action">全部</a>
</span>
<span class="entry-title">个人动态</span>
</h3>
<div class="box_content">
<ul>
<?php if(is_array($feedlist)) { foreach($feedlist as $value) { ?>
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
</div>
</div>
<?php } ?>

<?php if($albumlist) { ?>
<div id="space_photo">
<h3 class="feed_header">
<a href="space.php?uid=<?=$space['uid']?>&do=album&view=me" class="r_option">全部</a>
相册
</h3>
<table cellspacing="4" cellpadding="4" width="100%">
<tr>
<?php if(is_array($albumlist)) { foreach($albumlist as $key => $value) { ?>
<td width="85" align="center"><a href="space.php?uid=<?=$space['uid']?>&do=album&id=<?=$value['albumid']?>" target="_blank"><img src="<?=$value['pic']?>" alt="<?=$value['albumname']?>" width="70" /></a></td>
<td width="165">
<h6><a href="space.php?uid=<?=$space['uid']?>&do=album&id=<?=$value['albumid']?>" target="_blank" title="<?=$value['albumname']?>"><?=$value['albumname']?></a></h6>
<p class="gray"><?=$value['picnum']?> 张照片</p>
<p class="gray">更新于 <?php echo sgmdate('m-d',$value[dateline],1); ?></p>
</td>
<?php if($key%2==1) { ?></tr><tr><?php } ?>
<?php } } ?>
</tr>
</table>
</div>
<?php } ?>

<?php if($bloglist) { ?>
<div id="space_blog" class="feed">
<h3 class="feed_header">
<a href="space.php?uid=<?=$space['uid']?>&do=blog&view=me" class="r_option">全部</a>
日志
</h3>
<ul class="line_list">
<?php if(is_array($bloglist)) { foreach($bloglist as $value) { ?>
<li>

<h4>
<span class="gray r_option"><?php echo sgmdate('m-d H:i',$value[dateline],1); ?></span>
<a href="space.php?uid=<?=$space['uid']?>&do=blog&id=<?=$value['blogid']?>" target="_blank"><?=$value['subject']?></a>
</h4>
<div class="detail">
<?=$value['message']?>
</div>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>


<?php if(is_array($widelist)) { foreach($widelist as $value) { ?>
<?php if($value['myml']) { ?>
<div id="space_app_<?=$value['appid']?>" class="appbox">
<h3 class="feed_header">
<?php if($space['self']) { ?>
<a href="cp.php?ac=space&op=delete&appid=<?=$value['appid']?>" id="user_app_<?=$value['appid']?>" class="r_option float_del" onclick="ajaxmenu(event, this.id)" title="删除">删除</a>
<?php } ?>
<a href="<?=$value['appurl']?>"><?=$value['appname']?></a>
</h3>
<div class="box" style="margin: 0 0 20px;">
<?php eval($value[myml]); ?>
</div>
</div>
<?php } ?>
<?php } } ?>

</div>

<div id="comment" class="comments_list">
<h3 class="feed_header">
<a href="space.php?uid=<?=$space['uid']?>&do=wall&view=me" class="r_option">全部</a>
留言板
</h3>

<div class="box">
<form action="cp.php?ac=comment" id="quick_commentform_<?=$space['uid']?>" name="quick_commentform_<?=$space['uid']?>" method="post" style="padding:0 0 0 5px;">
<a href="###" id="editface" onclick="showFace(this.id, 'comment_message');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<?php if($_SGLOBAL['magic']['doodle']) { ?>
<a id="a_magic_doodle" href="magic.php?mid=doodle&showid=comment_doodle&target=comment_message" onclick="ajaxmenu(event, this.id, 1)"><img src="image/magic/doodle.small.gif" class="magicicon" />涂鸦板</a>
<?php } ?>
<br />
<textarea name="message" id="comment_message" rows="4" cols="60" style="width:98%;" onkeydown="ctrlEnter(event, 'commentsubmit_btn');"></textarea><br>
<input type="hidden" name="refer" value="space.php?uid=<?=$space['uid']?>" />
<input type="hidden" name="id" value="<?=$space['uid']?>" />
<input type="hidden" name="idtype" value="uid" />
<input type="hidden" name="commentsubmit" value="true" />
<input type="button" id="commentsubmit_btn" name="commentsubmit_btn" class="submit" value="留言" onclick="ajaxpost('quick_commentform_<?=$space['uid']?>', 'wall_add')" />
<span id="__quick_commentform_<?=$space['uid']?>"></span>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<div class="box_content">
<ul class="post_list a_list justify_list" id="comment_ul">
<?php if(is_array($walllist)) { foreach($walllist as $value) { ?>
<?php if(empty($ajax_edit)) { ?><li id="comment_<?=$value['cid']?>_li"><?php } ?>
<?php if($value['author']) { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['authorid']?>"><?php echo avatar($value[authorid],small); ?></a></div>
<?php } else { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" class="avatar" /></div>
<?php } ?>
<div class="title">
<div class="r_option">

<?php if($value['authorid'] != $_SGLOBAL['supe_uid'] && $value['author'] == "" && $_SGLOBAL['magic']['reveal']) { ?>
<a id="a_magic_reveal_<?=$value['cid']?>" href="magic.php?mid=reveal&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id,1)"><img src="image/magic/reveal.small.gif" class="magicicon"><?=$_SGLOBAL['magic']['reveal']?></a>
<span class="pipe">|</span>
<?php } ?>

<?php if($value['authorid']==$_SGLOBAL['supe_uid']) { ?>
<?php if($_SGLOBAL['magic']['anonymous']) { ?>
<img src="image/magic/anonymous.small.gif" class="magicicon">
<a id="a_magic_anonymous_<?=$value['cid']?>" href="magic.php?mid=anonymous&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['anonymous']?></a>
<span class="pipe">|</span>
<?php } ?>
<?php if($_SGLOBAL['magic']['flicker']) { ?>
<img src="image/magic/flicker.small.gif" class="magicicon">
<?php if($value['magicflicker']) { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="cp.php?ac=magic&op=cancelflicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id)">取消<?=$_SGLOBAL['magic']['flicker']?></a>
<?php } else { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="magic.php?mid=flicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['flicker']?></a>
<?php } ?>
<span class="pipe">|</span>
<?php } ?>

<a href="cp.php?ac=comment&op=edit&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_edit" onclick="ajaxmenu(event, this.id, 1)">编辑</a>
<?php } ?>
<?php if($value['authorid']==$_SGLOBAL['supe_uid'] || $value['uid']==$_SGLOBAL['supe_uid'] || checkperm('managecomment')) { ?>
<a href="cp.php?ac=comment&op=delete&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_delete" onclick="ajaxmenu(event, this.id)">删除</a>
<?php } ?>
<?php if($value['authorid']!=$_SGLOBAL['supe_uid'] && ($value['idtype'] != 'uid' || $space['self'])) { ?>
<a href="cp.php?ac=comment&op=reply&cid=<?=$value['cid']?>&feedid=<?=$feedid?>" id="c_<?=$value['cid']?>_reply" onclick="ajaxmenu(event, this.id, 1)">回复</a>
<?php } ?>
<a href="cp.php?ac=common&op=report&idtype=comment&id=<?=$value['cid']?>" id="a_report_<?=$value['cid']?>" onclick="ajaxmenu(event, this.id, 1)">举报</a>
</div>

<?php if($value['author']) { ?>
<a href="space.php?uid=<?=$value['authorid']?>" id="author_<?=$value['cid']?>"><?=$_SN[$value['authorid']]?></a> 
<?php } else { ?>
匿名
<?php } ?>
<span class="gray"><?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?></span>

</div>

<div class="detail<?php if($value['magicflicker']) { ?> magicflicker<?php } ?>" id="comment_<?=$value['cid']?>"><?=$value['message']?></div>

<?php if(empty($ajax_edit)) { ?></li><?php } ?>
<?php } } ?>
</ul>
<?php if($walllist) { ?>
<p class="r_option" style="padding:5px 0 10px 0;"><a href="space.php?uid=<?=$space['uid']?>&do=wall&view=me">&raquo; 更多留言</a></p>
<?php } ?>
</div>
</div>
</div>

<div id="obar">
<?php if(!$space['self']) { ?>

<?php if($space['magiccredit']) { ?>
<div class="magichongbao" id="div_magic_gift">
<a id="a_magic_gift" href="cp.php?&ac=magic&op=receive&uid=<?=$space['uid']?>" onclick="ajaxmenu(event, this.id)">送你 <span><?=$space['magiccredit']?></span> 积分大红包</a>
</div>
<?php } ?>

<?php if($_SGLOBAL['magic']['viewmagiclog'] || $_SGLOBAL['magic']['viewmagic'] || $_SGLOBAL['magic']['viewvisitor']) { ?>
<div class="indexmagic">
<?php if(is_array(array('viewmagiclog','viewmagic','viewvisitor'))) { foreach(array('viewmagiclog','viewmagic','viewvisitor') as $mid) { ?>
<?php if($_SGLOBAL['magic'][$mid]) { ?>
<a id="a_magic_<?=$mid?>" href="magic.php?mid=<?=$mid?>&idtype=uid&id=<?=$space['uid']?>" onclick="ajaxmenu(event,this.id,1)">
<img src="image/magic/<?=$mid?>.small.gif" title="<?=$_SGLOBAL['magic'][$mid]?>" alt="<?=$_SGLOBAL['magic'][$mid]?>">
</a>
<?php } ?>
<?php } } ?>
</div>
<?php } ?>
<?php } else { ?>
<?php if($_SGLOBAL['magic']['gift']) { ?>
<div class="magichongbao" id="div_magic_gift">				
<?php if($space['magiccredit']) { ?>
<a id="a_magic_retrieve" href="cp.php?ac=magic&op=retrieve" onclick="ajaxmenu(event,this.id)">回收埋下的积分</a>
<?php } else { ?>
<a id="a_magic_gift" href="magic.php?mid=gift" onclick="ajaxmenu(event,this.id,1)">给来访者埋个红包</a>
<?php } ?>				
</div>
<?php } ?>
<?php } ?>


<?php if($visitorlist) { ?>
<div class="sidebox">
<h2 class="title">
<a href="space.php?uid=<?=$space['uid']?>&do=friend&view=visitor" class="r_option">全部</a>
最近来访
<?php if(!$space['self'] && $_SGLOBAL['magic']['anonymous']) { ?>
<span class="gray"><img title="<?=$_SGLOBAL['magic']['anonymous']?>" src="image/magic/anonymous.small.gif"/><a id="a_magic_anonymous" href="magic.php?mid=anonymous&idtype=uid&id=<?=$space['uid']?>" onclick="ajaxmenu(event,this.id,1)">匿名</a></span>
<?php } ?>
</h2>
<ul class="avatar_list">
<?php if(is_array($visitorlist)) { foreach($visitorlist as $key => $value) { ?>
<li>
<?php if($value['vusername'] == '') { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" alt="匿名" /></div>
<p>匿名</p>
<p class="gray"><?php echo sgmdate('n月j日',$value[dateline],1); ?></p>
<?php } else { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['vuid']?>"><?php echo avatar($value[vuid],small); ?></a></div>
<p<?php if($ols[$value['vuid']]) { ?> class="online_icon_p"<?php } ?>><a href="space.php?uid=<?=$value['vuid']?>" title="<?=$_SN[$value['vuid']]?>"><?=$_SN[$value['vuid']]?></a></p>
<p class="gray"><?php echo sgmdate('n月j日',$value[dateline],1); ?></p>
<?php } ?>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>


<?php if($friendlist) { ?>
<div class="sidebox">
<h2 class="title">
<span class="r_option">
<a href="space.php?uid=<?=$space['uid']?>&do=friend&view=me" class="action">全部(<?=$space['friendnum']?>)</a>
</span>
好友
</h2>
<ul class="avatar_list">
<?php if(is_array($friendlist)) { foreach($friendlist as $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['fuid']?>"><?php echo avatar($value[fuid],small); ?></a></div>
<p<?php if($ols[$value['fuid']]) { ?> class="online_icon_p"<?php } ?>><a href="space.php?uid=<?=$value['fuid']?>"><?=$_SN[$value['fuid']]?></a></p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>

</div>
</div>

</div>

<?php if($_GET['theme']) { ?><div class="nn">您是否想使用这款个性风格?<br /><a href="cp.php?ac=theme&op=use&dir=<?=$_GET['theme']?>">[应用]</a><a href="cp.php?ac=theme">[取消]</a></div><?php } ?>
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

<script>
function getindex(type) {
var plus = '';
if(type == 'event') plus = '&type=self';
ajaxget('space.php?uid=<?=$space['uid']?>&do='+type+'&view=me'+plus+'&ajaxdiv=maincontent', 'maincontent');
}

//彩虹炫
var elems = selector('div[class~=magicflicker]'); 
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}

</script><?php ob_out();?>