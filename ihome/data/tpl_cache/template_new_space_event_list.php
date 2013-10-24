<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('template/new/space_event_list|template/new/header|template/new/space_menu|template/new/footer', '1382618823', 'template/new/space_event_list');?><?php $_TPL['titles'] = array('活动'); ?>
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



<?php if(!empty($_SGLOBAL['inajax'])) { ?>
<div id="space_event">
<h3 class="feed_header">
<a href="cp.php?ac=event" class="r_option" target="_blank">组织活动</a>
活动(共 <?=$count?> 个)</h3>
<?php if($eventlist) { ?>
<ul class="line_list">
<?php if(is_array($eventlist)) { foreach($eventlist as $event) { ?>
<li>
<p class="r_option">
<?php if($event['grade'] == 0) { ?>
<span class="event_state">待审核</span>
<?php } ?>
<?php if($event['endtime']<$_SGLOBAL['timestamp']) { ?>
<span class="event_state">已结束</span>
<?php } elseif($event['deadline']<$_SGLOBAL['timestamp']) { ?>
<span class="event_state">报名截止</span>
<?php } ?>
</p>
<h4><a href="space.php?do=event&id=<?=$event['eventid']?>" target="_blank"><?=$event['title']?></a><span class="gray">[<?=$_SGLOBAL['eventclass'][$event['classid']]['classname']?>]</span></h4>

<p><span class="gray">活动时间:</span> 	<?php echo sgmdate("m月d日 H:i", $event[starttime]) ?> - <?php echo sgmdate("m月d日 H:i", $event[endtime]) ?></p>
<p><span class="gray">活动地点:</span> 	<?=$event['province']?> <?=$event['city']?> <?=$event['location']?></p>
</li>
<?php } } ?>
</ul>
<div class="page"><?=$multi?></div>

<?php } else { ?>
<div class="c_form">还没有相关的活动。</div>
<?php } ?>
</div><br>
<?php } else { ?>

<?php if($space['self']) { ?>
<div class="searchbar floatright">
<form method="get" action="space.php">
<input name="searchkey" value="" size="15" class="t_input" type="text">
<input name="searchsubmit" value="搜索活动" class="submit" type="submit">
<input type="hidden" name="searchmode" value="1" />
<input type="hidden" name="do" value="event" />
<input type="hidden" name="view" value="all" />
</form>
</div>
<h2 class="title"><img src="image/app/event.gif" />活动</h2>
<div class="tabs_header">
    <ul class="tabs">
        <li <?=$menu['all']?>><a href="space.php?do=event&view=all"><span>全部活动</span></a></li>
        <li <?=$menu['recommend']?>><a href="space.php?do=event&view=recommend"><span>推荐活动</span></a></li>
        <li <?=$menu['city']?>><a href="space.php?do=event&view=city"><span>同城活动</span></a></li>
        <?php if($space['friendnum']) { ?>
        <li <?=$menu['friend']?>><a href="space.php?do=event&view=friend"><span>好友的活动</span></a></li>
        <?php } ?>
<li <?=$menu['me']?>><a href="space.php?uid=<?=$space['uid']?>&do=event&view=me"><span>我的活动</span></a></li>
<li class="null"><a href="cp.php?ac=event" class="t_button">发起新活动</a></li>
    </ul>
</div>
<?php } else { ?>
<?php $_TPL['spacetitle'] = "活动";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=event&view=me\">TA的所有活动</a>"; ?>
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
<?php if($menu['all']) { ?>
<a <?=$submenus['going']?> href="space.php?do=event&view=all&type=going">尚未结束的活动</a>
<span class="pipe">|</span><a <?=$submenus['over']?> href="space.php?do=event&view=all&type=over">已结束的活动</a>
<?php } elseif($menu['recommend']) { ?>
<a <?=$submenus['hot']?> href="space.php?do=event&view=recommend&type=hot">热门活动</a>
<span class="pipe">|</span><a <?=$submenus['admin']?> href="space.php?do=event&view=recommend&type=admin">站长推荐</a>
<?php } elseif($menu['city']) { ?>	
<a <?=$submenus['going']?> href="space.php?do=event&view=city&type=going">尚未结束的活动</a>
<span class="pipe">|</span><a <?=$submenus['over']?> href="space.php?do=event&view=city&type=over">已结束的活动</a>
<?php } elseif($menu['friend']) { ?>
<a <?=$submenus['all']?> href="space.php?do=event&view=friend&type=all">全部</a>
<span class="pipe">|</span><a <?=$submenus['join']?> href="space.php?do=event&view=friend&type=join">参加的活动</a>
<span class="pipe">|</span><a <?=$submenus['follow']?> href="space.php?do=event&view=friend&type=follow">关注的活动</a>
<span class="pipe">|</span><a <?=$submenus['org']?> href="space.php?do=event&view=friend&type=org">组织的活动</a>
<?php } elseif($menu['me']) { ?>
<a <?=$submenus['all']?> href="space.php?uid=<?=$space['uid']?>&do=event&view=me&type=all">全部</a>
<span class="pipe">|</span><a <?=$submenus['join']?> href="space.php?uid=<?=$space['uid']?>&do=event&view=me&type=join">参加的活动</a>
<span class="pipe">|</span><a <?=$submenus['follow']?> href="space.php?uid=<?=$space['uid']?>&do=event&view=me&type=follow">关注的活动</a>
<span class="pipe">|</span><a <?=$submenus['org']?> href="space.php?uid=<?=$space['uid']?>&do=event&view=me&type=org">组织的活动</a>
<?php } ?>
</div>

<?php if($searchkey) { ?>
<div class="h_status">以下是搜索活动 <span style="color:red;font-weight:bold;"><?=$searchkey?></span> 结果列表</div>
<?php } ?>

<div id="content">
<?php if($view == "all" && !empty($recommendevents)) { ?>
<div class="rec_event_list">
<h2>
<div class="r_option"><a href="space.php?do=event&view=recommend&type=admin">更多</a></div>
站长推荐
</h2>
<ol>
<?php if(is_array($recommendevents)) { foreach($recommendevents as $key => $value) { ?>
<li>
<div class="event_icon">
<a href="space.php?do=event&id=<?=$value['eventid']?>"><img class="poster_pre" src="<?=$value['pic']?>" alt="<?=$value['title']?>" onerror="this.src='<?=$_SGLOBAL['eventclass'][$value['classid']]['poster']?>'"></a>
</div>
<div class="event_content">
<h4><a href="space.php?do=event&id=<?=$value['eventid']?>"><?=$value['title']?></a> <span class="gray">[<?=$_SGLOBAL['eventclass'][$value['classid']]['classname']?>]</span></h4>
<p>活动时间: <?php echo sgmdate("m月d日 H:i", $value[starttime]) ?> - <?php echo sgmdate("m月d日 H:i", $value[endtime]) ?></p>
</div>
</li>
<?php } } ?>
</ol>
</div>
<?php } ?>

<?php if($view == "city") { ?>
<div>
<?php if($_GET['city']) { ?>
您现在浏览的是 <b><?=$_GET['province']?> - <?=$_GET['city']?></b> 的活动。
<a href="#" onclick="$('viewcityevents').style.display=''; this.blur(); return false;">浏览其他城市</a>
<?php } elseif($_GET['province']) { ?>
您现在浏览的是 <?=$_GET['province']?> 的活动。
<?php if($space['province'] == $_GET['province'] && $space['city']) { ?>
您还可以只浏览 <a href="space.php?do=event&view=city&province=<?=$space['province']?>&city=<?=$space['city']?>"><?=$space['city']?></a> 的活动。
<?php } ?>
<a href="#" onclick="$('viewcityevents').style.display=''; this.blur(); return false;">浏览其他城市</a>
<?php } ?>
<script type="text/javascript" src="source/script_city.js"></script>
<form id="viewcityevents" action="space.php" method="GET" style="display:none;">
<input type="hidden" name="do" value="event" />
<input type="hidden" name="view" value="city" />
<span id="eventcitybox"></span>
 <script type="text/javascript">
showprovince('province', 'city', '<?=$_GET['province']?>', 'eventcitybox');
                showcity('city', '<?=$_GET['city']?>', 'province', 'eventcitybox');
            </script>
<input class="submit" type="submit" value="浏览" />
</form>
<?php if(!$space['resideprovince']) { ?>
<div class="c_form">
您还没有设置居住城市。<a href="cp.php?ac=profile" target="_blank">现在就去设置</a>
</div>
<?php } ?>
</div>
<?php } ?>

<?php if(!empty($eventlist)) { ?>
<div class="event_list">
<ol>
<?php $hiddecount = 0 ?>
<?php if(is_array($eventlist)) { foreach($eventlist as $key => $event) { ?>
<?php if($event['uid'] != $_SGLOBAL['supe_uid'] && ($event['grade']==0 || ($event['public']==0 && ($_GET['view']!='me' || $_GET['uid'] != $_SGLOBAL['supe_uid'])))) { ?>
<?php $hiddencount = $hiddencount + 1 ?>
<?php } else { ?>
<li>
<div class="event_icon">
<a href="space.php?do=event&id=<?=$event['eventid']?>"><img class="poster_pre" src="<?=$event['pic']?>" alt="<?=$event['title']?>" onerror="this.src='<?=$_SGLOBAL['eventclass'][$event['classid']]['poster']?>'"></a>
</div>
<div class="event_content">
<h4 class="event_title"><a href="space.php?do=event&id=<?=$event['eventid']?>"><?=$event['title']?></a><span class="gray">[<?=$_SGLOBAL['eventclass'][$event['classid']]['classname']?>]</span></h4>
<ul>
<li>
<span class="gray">活动时间:</span> 	<?php echo sgmdate("m月d日 H:i", $event[starttime]) ?> - <?php echo sgmdate("m月d日 H:i", $event[endtime]) ?>
<?php if($event['grade'] == 0) { ?>
<span class="event_state"> 待审核</span>
<?php } ?>
<?php if($event['endtime']<$_SGLOBAL['timestamp']) { ?>
<span class="event_state"> 已结束</span>
<?php } elseif($event['deadline']<$_SGLOBAL['timestamp']) { ?>
<span class="event_state"> 报名截止</span>
<?php } ?>						
</li>
<li><span class="gray">活动地点:</span>
<a href="space.php?uid=<?=$_GET['uid']?>&do=event&view=<?=$view?>&type=<?=$type?>&classid=<?=$_GET['classid']?>&province=<?=$event['province']?>&date=<?=$_GET['date']?>"><?=$event['province']?></a>
<a href="space.php?uid=<?=$_GET['uid']?>&do=event&view=<?=$view?>&type=<?=$type?>&classid=<?=$_GET['classid']?>&province=<?=$event['province']?>&city=<?=$event['city']?>&date=<?=$_GET['date']?>"><?=$event['city']?></a>
<?=$event['location']?>
</li>
<li><span class="gray">发起人:</span> <a href="space.php?uid=<?=$event['uid']?>"><?=$_SN[$event['uid']]?></a></li>
<?php if($fevents[$event['eventid']]) { ?>
<li><span class="gray">好友:</span> 
<?php if(is_array($fevents[$event['eventid']])) { foreach($fevents[$event['eventid']] as $value) { ?>
<a href="space.php?uid=<?=$value['fuid']?>"><?=$_SN[$value['fuid']]?></a>
<?php if($value['status'] == 2) { ?><span class="gray">参加</span>
<?php } elseif($value['status'] == 3) { ?><span class="gray">组织者</span>
<?php } elseif($value['status'] == 4) { ?><span class="gray">发起者</span>
<?php } else { ?><span class="gray">关注</span>
<?php } ?>
&nbsp;
<?php } } ?>
</li>
<?php } ?>
<li style="margin: 5px 0 0;"><?=$event['viewnum']?> 次查看&nbsp; <?=$event['membernum']?> 人参加&nbsp; <?=$event['follownum']?> 人关注</li>
</ul>
</div>
</li>
<?php } ?>
<?php } } ?>
</ol>
<?php if($hiddencount) { ?>
<div>本页有 <?=$hiddencount?> 个活动因隐私设置而隐藏</div>
<?php } ?>
<div class="page"><?=$multi?></div>		
</div>
<?php } else { ?>
<div class="c_form">
<?php if($view == "me") { ?>
现在还没有相关的活动
<?php } else { ?>
<br/>
还没有相关的活动。您可以 <a href="cp.php?ac=event">发起一个新活动</a>		
<?php } ?>
</div>
<?php } ?>
</div><!--//左侧内容结束//-->

<div id="sidebar">

<?php if($view == "all") { ?>
<div class="sidebox">			
<h2 class="title">
<p class="r_option">
<a href="space.php?uid=<?=$_GET['uid']?>&do=event&view=<?=$view?>&type=<?=$type?>&classid=<?=$_GET['classid']?>&province=<?=$_GET['province']?>&city=<?=$_GET['city']?>">全部</a>
</p>
日历
</h2>
<div class="calendarbox" id="eventcalendar"></div>
</div>
<script type="text/javascript" charset="<?=$_SC['charset']?>">
function showcalendar(month){
var month = month ? "&month="+month : "";
ajaxget('cp.php?ac=event&op=calendar' + month + '&date=<?=$_GET['date']?>&url=<?php echo urlencode($theurl) ?>', 'eventcalendar');
}
showcalendar();
</script>
<?php } ?>

<?php if($view != 'friend') { ?>
<div class="sidebox">
<h2 class="title">
<p class="r_option">
<a href="space.php?uid=<?=$_GET['uid']?>&do=event&view=<?=$view?>&type=<?=$type?>&date=<?=$_GET['date']?>&uid=<?=$_GET['uid']?>">全部</a>
</p>
分类
</h2>
<ul class="event_cat">
<?php if(is_array($_SGLOBAL['eventclass'])) { foreach($_SGLOBAL['eventclass'] as $value) { ?>			
<li<?php if($_GET['classid'] == $value['classid']) { ?> class="on"<?php } ?>>
<a href="space.php?uid=<?=$_GET['uid']?>&do=event&view=<?=$view?>&type=<?=$type?>&classid=<?=$value['classid']?>&province=<?=$_GET['province']?>&city=<?=$_GET['city']?>&date=<?=$_GET['date']?>"><?=$value['classname']?></a></li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if($followevents) { ?>
<div class="sidebox">
<h2 class="title">
<div class="r_option"><a href="space.php?do=event&view=me&type=follow">更多</a></div>
我关注的活动
</h2>
<ul class="attention">
<?php if(is_array($followevents)) { foreach($followevents as $value) { ?>
<li style="height: auto;">
<p>
<a href="space.php?do=event&id=<?=$value['eventid']?>"><?=$value['title']?></a>					
</p>
<p class="gray" style="text-align:left">
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

<?php if($friendevents) { ?>
<div class="sidebox">
<h2 class="title">
<div class="r_option"><a href="space.php?do=event&view=friend">更多</a></div>
好友最近参加的活动
</h2>
<ul class="attention">			
<?php if(is_array($friendevents)) { foreach($friendevents as $value) { ?>
<li style="height: auto;">
<p>
<a href="space.php?do=event&id=<?=$value['eventid']?>"><?=$value['title']?></a>					
</p>
<p class="gray" style="text-align:left">
好友：
<?php if(is_array($value['friends'])) { foreach($value['friends'] as $fuid) { ?>
<a href="space.php?uid=<?=$fuid?>" target="_blank"><?=$_SN[$fuid]?></a>&nbsp;
<?php } } ?>
</p>
<p class="gray" style="text-align:left">
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

<?php if($hotevents) { ?>
<div class="sidebox">
<h2 class="title">
<div class="r_option"><a href="space.php?do=event&view=recommend&type=hot">更多</a></div>
热门活动
</h2>
<ul class="attention">
<?php if(is_array($hotevents)) { foreach($hotevents as $value) { ?>
<li style="height: auto;">
<p>
<a href="space.php?do=event&id=<?=$value['eventid']?>"><?=$value['title']?></a>					
</p>
<p class="gray" style="text-align:left">
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
<?php } ?>
<?php ob_out();?>