<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('template/blue/space_album_pic|template/blue/header|template/blue/space_menu|template/blue/space_pic|template/blue/footer|template/blue/space_click|template/blue/space_comment_li', '1381749361', 'template/blue/space_album_pic');?><?php $_TPL['titles'] = array(getstr($pic['title'], 60, 0, 0, 0, 0, -1), $album['albumname'], '相册'); ?>
<?php $friendsname = array(1 => '仅好友可见',2 => '指定好友可见',3 => '仅自己可见',4 => '凭密码可见'); ?>
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


<?php if($space['self']) { ?>
<div class="searchbar floatright">
<form method="get" action="space.php">
<input name="searchkey" value="" size="15" class="t_input" type="text">
<input name="searchsubmit" value="搜索相册" class="submit" type="submit">
<input type="hidden" name="do" value="album" />
<input type="hidden" name="view" value="all" />
<input type="hidden" name="orderby" value="dateline" />
</form>
</div>
<h2 class="title"><img src="image/app/album.gif">相册 - <?=$album['albumname']?></h2>
<div class="tabs_header">
<ul class="tabs">
<li class="active"><a href="space.php?uid=<?=$pic['uid']?>&do=album&id=<?=$pic['albumid']?>"><span>查看图片</span></a></li>
<li><a href="space.php?uid=<?=$space['uid']?>&do=album&id=<?=$pic['albumid']?>"><span>返回列表</span></a></li>
<li><a href="space.php?uid=<?=$space['uid']?>&do=album&view=me"><span>返回我的相册</span></a></li>
<li class="null"><a href="cp.php?ac=upload&albumid=<?=$pic['albumid']?>">上传新图片</a></li>
</ul>
<?php if($_SGLOBAL['refer']) { ?>
<div class="r_option">
<a  href="<?=$_SGLOBAL['refer']?>">&laquo; 返回上一页</a>
</div>
<?php } ?>
</div>
<?php } else { ?>
<?php $_TPL['spacetitle'] = "相册 - $album[albumname]";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=album&view=me\">TA的所有相册</a>";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=album&id=$pic[albumid]\">$album[albumname]</a>";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=album&picid=$pic[picid]\">查看图片</a>"; ?>
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


<div class="h_status">
<div class="r_option">
支持键盘方向键翻页（←上一张 →下一张）
<a href="space.php?uid=<?=$pic['uid']?>&do=album&picid=<?=$pic['picid']?>&goto=up#topline">上一张</a><span class="pipe">|</span>
<a href="space.php?uid=<?=$pic['uid']?>&do=album&picid=<?=$pic['picid']?>&goto=down#topline" id="nextlink">下一张</a><span class="pipe">|</span>
<?php if($_GET['play']) { ?>
<a href="javascript:;" id="playid" onclick="playNextPic(false);">停止播放</a>
<?php } else { ?>
<a href="javascript:;" id="playid" onclick="playNextPic(true);">幻灯播放</a>
<?php } ?><span id="displayNum"></span>
</div>

<?php if($album['picnum']) { ?>当前第 <?=$sequence?> 张<span class="pipe">|</span>共 <?=$album['picnum']?> 张图片<?php } ?>&nbsp;
<?php if($album['friend']) { ?>
<span class="locked gray"><?=$friendsname[$value['friend']]?></span>
<?php } ?>
</div>


<div class="photobox">

<div id="photo_pic" class="<?php if($pic['magicframe']) { ?> magicframe magicframe<?=$pic['magicframe']?><?php } ?>">
<?php if($pic['magicframe']) { ?>
<div class="pic_lb1">
<table cellpadding="0" cellspacing="0" class="">
<tr>
<td class="frame_jiao frame_top_left"></td>
<td class="frame_x frame_top_middle"></td>
<td class="frame_jiao frame_top_right"></td>
</tr>
<tr>
<td class="frame_y frame_middle_left"></td>
<td class="frame_middle_middle">
<?php } ?>
<a onmousemove="changepic()" id="mainpic" href=""><img src="<?=$pic['pic']?>" alt="" /></a>
<?php if($pic['magicframe']) { ?>
</td>
<td class="frame_y frame_middle_right"></td>
</tr>
<tr>
<td class="frame_jiao frame_bottom_left"></td>
<td class="frame_x frame_bottom_middle"></td>
<td class="frame_jiao frame_bottom_right"></td>
</tr>
</table>
</div><?php } ?></div>


<div class="yinfo">
<p><?=$pic['title']?></p>

<?php if($topic) { ?>
<p>
<img src="image/app/topic.gif" align="absmiddle">
凑个热闹：<a href="space.php?do=topic&topicid=<?=$topic['topicid']?>"><?=$topic['subject']?></a></p>
<?php } ?>

<?php if($do!='event' && $event['title']) { ?>
<p>来自活动：<a href="space.php?do=event&id=<?=$event['eventid']?>&view=pic"><?=$event['title']?></a></p>
<?php } ?>

<p class="gray">
<?php if($pic['hot']) { ?><span class="hot"><em>热</em><?=$pic['hot']?></span><?php } ?>
<?php if($do=='event') { ?><a href="space.php?uid=<?=$pic['uid']?>" target="_blank"><?=$_SN[$pic['uid']]?></a><?php } ?>
上传于 <?php echo sgmdate('Y-m-d H:i',$pic[dateline]); ?> (<?=$pic['size']?>)
</p>

<?php if(isset($_GET['exif'])) { ?>
<?php if($exifs) { ?>
<?php if(is_array($exifs)) { foreach($exifs as $key => $value) { ?>
<?php if($value) { ?><p><?=$key?> : <?=$value?></p><?php } ?>
<?php } } ?>
<?php } else { ?>
<p>无EXIF信息</p>
<?php } ?>
<?php } ?>
</div>


<table width="100%">
<tr><td align="left">
<a href="<?=$pic['pic']?>" target="_blank">查看原图</a>
<?php if(!isset($_GET['exif'])) { ?>
<span class="pipe">|</span><a href="<?=$theurl?>&exif">查看EXIF信息</a>
<?php } ?>
</td>
<td align="right">
<a href="cp.php?ac=share&type=pic&id=<?=$pic['picid']?>" id="a_share_<?=$pic['picid']?>" class="a_share" onclick="ajaxmenu(event, this.id, 1)" class="a_share">分享</a>

<?php if($pic['uid'] == $_SGLOBAL['supe_uid']) { ?>
<?php if($_SGLOBAL['magic']['frame']) { ?>
<img src="image/magic/frame.small.gif" class="magicicon">
<?php if($pic['magicframe']) { ?>
<a id="a_magic_frame" href="cp.php?ac=magic&op=cancelframe&idtype=picid&id=<?=$pic['picid']?>" onclick="ajaxmenu(event,this.id)">取消相框</a>
<?php } else { ?>
<a id="a_magic_frame" href="magic.php?mid=frame&idtype=picid&id=<?=$pic['picid']?>" onclick="ajaxmenu(event,this.id, 1)">加相框</a>
<?php } ?>
<span class="pipe">|</span>
<?php } ?>
<a href="cp.php?ac=album&op=editpic&albumid=<?=$pic['albumid']?>&picid=<?=$pic['picid']?>">管理图片</a><span class="pipe">|</span>
<?php } ?>

<?php if($_SGLOBAL['supe_uid'] == $pic['uid'] || checkperm('managealbum')) { ?>
<a href="cp.php?ac=album&op=edittitle&albumid=<?=$pic['albumid']?>&picid=<?=$pic['picid']?>" id="a_set_title" onclick="ajaxmenu(event, this.id)">编辑说明</a><span class="pipe">|</span>
<a href="cp.php?ac=topic&op=join&id=<?=$pic['picid']?>&idtype=picid" id="a_topicjoin_<?=$pic['picid']?>" onclick="ajaxmenu(event, this.id)">凑热闹</a><span class="pipe">|</span>
<a href="admincp.php?ac=pic&picid=<?=$pic['picid']?>" target="_blank">删除</a><span class="pipe">|</span>
<?php } ?>

<?php if(checkperm('managealbum')) { ?>
<a href="cp.php?ac=album&picid=<?=$pic['picid']?>&op=edithot" id="a_hot_<?=$pic['picid']?>" onclick="ajaxmenu(event, this.id)">热度</a><span class="pipe">|</span>
<?php } ?>
<a href="cp.php?ac=common&op=report&idtype=picid&id=<?=$pic['picid']?>" id="a_report" onclick="ajaxmenu(event, this.id, 1)">举报</a>
</td></tr>
</table>
</div>

<div id="click_div" style="margin:0 auto;padding:10px;width:100%;text-align:left;">

<div class="digc">
<table>
<tr>
<?php $clicknum = 0; ?>
<?php if(is_array($clicks)) { foreach($clicks as $value) { ?>
<?php $clicknum = $clicknum + $value['clicknum']; ?>
<?php $value['height'] = $maxclicknum?intval($value['clicknum']*50/$maxclicknum):0; ?>
<td valign="bottom"><a href="cp.php?ac=click&op=add&clickid=<?=$value['clickid']?>&idtype=<?=$idtype?>&id=<?=$id?>&hash=<?=$hash?>" id="click_<?=$idtype?>_<?=$id?>_<?=$value['clickid']?>" onclick="ajaxmenu(event, this.id, 0, 2000, 'show_click')"><?php if($value['clicknum']) { ?><div class="digcolumn"><div class="digchart dc<?=$value['classid']?>" style="height:<?=$value['height']?>px;"><em><?=$value['clicknum']?></em></div></div><?php } ?><div class="digface"><img src="image/click/<?=$value['icon']?>" alt="" /><br /><?=$value['name']?></div></a></td>
<?php } } ?>
</tr>
</table>
</div>

<?php if($clickuserlist) { ?>
<div class="trace" style="padding-bottom: 10px;">

<div>
<h2>
刚表态过的朋友 (<a href="javascript:;" onclick="show_click('click_<?=$idtype?>_<?=$id?>_<?=$value['clickid']?>')"><?=$clicknum?> 人</a>)
<?php if($_SGLOBAL['magic']['anonymous']) { ?>
<img src="image/magic/anonymous.small.gif" class="magicicon" />
<a id="a_magic_anonymous" href="magic.php?mid=anonymous&idtype=<?=$idtype?>&id=<?=$id?>" onclick="ajaxmenu(event,this.id, 1)" class="gray"><?=$_SGLOBAL['magic']['anonymous']?></a>
<?php } ?>					
</h2>
</div>
<div id="trace_div">
<ul class="avatar_list" id="trace_ul">
<?php if(is_array($clickuserlist)) { foreach($clickuserlist as $value) { ?>
<li>
<?php if($value['username']) { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>" target="_blank" title="<?=$value['clickname']?>"><?php echo avatar($value[uid], 'small'); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>"  title="<?=$_SN[$value['uid']]?>" target="_blank"><?=$_SN[$value['uid']]?></a></p>
<?php } else { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" alt="<?=$value['clickname']?>" class="avatar" /></div>
<p>匿名</p>
<?php } ?>
</li>
<?php } } ?>
</ul>
</div>
</div>
<?php } ?>

<?php if($click_multi) { ?><div class="page"><?=$click_multi?></div><?php } ?>

</div>


<div style="padding-top:20px; width:100%; overflow:hidden;" id="pic_comment">

<h2>评论</h2>
<div class="page"><?=$multi?></div>
<div class="comments_list" id="comment">
<?php if($cid) { ?>
<div class="notice">
当前只显示与你操作相关的单个评论，<a href="<?=$theurl?>#comment">点击此处查看全部评论</a>
</div>
<?php } ?>

<ul id="comment_ul">
<?php if(is_array($list)) { foreach($list as $value) { ?>
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
</div>
<div class="page"><?=$multi?></div>
<form id="quickcommentform_<?=$picid?>" name="quickcommentform_<?=$picid?>" action="cp.php?ac=comment" method="post" class="quickpost" style="padding-bottom: 1em;">
<table cellpadding="0" cellspacing="0">
<tr>
<td>
<a href="###" id="comment_face" onclick="showFace(this.id, 'comment_message');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<?php if($_SGLOBAL['magic']['doodle']) { ?>
<a id="a_magic_doodle" href="magic.php?mid=doodle&showid=comment_doodle&target=comment_message" onclick="ajaxmenu(event, this.id, 1)"><img src="image/magic/doodle.small.gif" class="magicicon" />涂鸦板</a>
<?php } ?>
<br />
<textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="5" cols="60" style="width: 380px;"></textarea>
</td>
</tr>
<tr>
<td>
<input type="hidden" name="refer" value="<?=$theurl?>" />
<input type="hidden" name="id" value="<?=$picid?>">
<input type="hidden" name="idtype" value="picid">
<input type="hidden" name="commentsubmit" value="true">
<input type="button" id="commentsubmit_btn" name="commentsubmit_btn" class="submit" value="评论" onclick="ajaxpost('quickcommentform_<?=$picid?>', 'comment_add')" />
<span id="__quickcommentform_<?=$picid?>"></span>
</td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>

</div>


<script type="text/javascript">
<!--
var interval = 5000;
var timerId = -1;
var derId = -1;
var replay = false;
var num = 0;
var endPlay = false;
function forward() {
window.location.href = '<?=$theurl?>&goto=down&play=1';
}
function derivativeNum() {
num++;
$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
}
function playNextPic(stat) {
if(stat || replay) {
derId = window.setInterval('derivativeNum();', 1000);
$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
$('playid').innerHTML = '停止播放';
timerId = window.setInterval('forward();', interval);
} else {
replay = true;
num = 0;
if(endPlay) {
$('playid').innerHTML = '重新播放';
} else {
$('playid').innerHTML = '幻灯播放';
}
$('displayNum').innerHTML = '';
window.clearInterval(timerId);
window.clearInterval(derId);
}
}
<?php if($_GET['play']) { ?>
<?php if($sequence && $album['picnum']) { ?>
if(<?=$sequence?> == <?=$album['picnum']?>) {
endPlay = true;
playNextPic(false);
} else {
playNextPic(true);
}
<?php } else { ?>
playNextPic(true);
<?php } ?>
<?php } ?>

function update_title() {
$('title_form').style.display='';
}

//彩虹炫
var elems = selector('div[class~=magicflicker]'); 
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}

//-->
</script>
<script language=javascript>
document.onkeydown=nextpage
var prev= "space.php?uid=<?=$pic['uid']?>&do=album&picid=<?=$pic['picid']?>&goto=up#topline";
var next= "space.php?uid=<?=$pic['uid']?>&do=album&picid=<?=$pic['picid']?>&goto=down#topline";
function nextpage(event) {
event = event ? event : (window.event ? window.event : null); 
if (event.keyCode==37) location=prev
if (event.keyCode==39) location=next
}
</script>
<script>
function changepic(){
var img=document.getElementById('mainpic');
var w=img.offsetWidth;
var x=event.offsetX;
if(x<w*0.4){
img.style.cursor="url('plugin/albumpicchange/left.cur'),auto";
img.href="space.php?uid=<?=$pic['uid']?>&do=album&picid=<?=$pic['picid']?>&goto=up#topline";
img.target="_self";
}
else if(x>=w*0.4&&x<=0.6*w){
img.style.cursor="url('plugin/albumpicchange/ZoomIn.cur'),auto";
img.href="<?=$pic['pic']?>";
img.target="_blank";
}
else if(x>0.6*w){
img.style.cursor="url('plugin/albumpicchange/right.cur'),auto";
img.href="space.php?uid=<?=$pic['uid']?>&do=album&picid=<?=$pic['picid']?>&goto=down#topline";
img.target="_self";
}
else{
img.style.cursor="auto";
img.href="";
img.target="";
}
}</script>


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