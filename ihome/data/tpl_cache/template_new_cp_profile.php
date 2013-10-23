<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('template/new/cp_profile|template/new/header|template/new/cp_header|template/new/footer', '1382538715', 'template/new/cp_profile');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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

<h2 class="title"><img src="image/icon/profile.gif">个人设置</h2>
<div class="tabs_header">
<a href="cp.php?ac=advance" class="r_option">&raquo; 高级管理</a>
<ul class="tabs">
<li<?=$actives['profile']?>><a href="cp.php?ac=profile"><span>个人资料</span></a></li>
<li<?=$actives['avatar']?>><a href="cp.php?ac=avatar"><span>我的头像</span></a></li>
<?php if($_SCONFIG['videophoto']) { ?>
<li<?=$actives['videophoto']?>><a href="cp.php?ac=videophoto"><span>视频认证</span></a></li>
<?php } ?>
<li<?=$actives['credit']?>><a href="cp.php?ac=credit"><span>我的积分</span></a></li>
<?php if($_SCONFIG['allowdomain'] && $_SCONFIG['domainroot'] && checkperm('domainlength')) { ?>
<li<?=$actives['domain']?>><a href="cp.php?ac=domain"><span>我的域名</span></a></li>
<?php } ?>
<?php if($_SCONFIG['sendmailday']) { ?>
<li<?=$actives['sendmail']?>><a href="cp.php?ac=sendmail"><span>邮件提醒</span></a></li>
<?php } ?>
<li<?=$actives['privacy']?>><a href="cp.php?ac=privacy"><span>隐私筛选</span></a></li>
<li<?=$actives['theme']?>><a href="cp.php?ac=theme"><span>个性化设置</span></a></li>
</ul>
</div>

<div class="l_status c_form">
<a href="cp.php?ac=profile&op=base"<?=$cat_actives['base']?>>基本资料</a><span class="pipe">|</span>
<a href="cp.php?ac=profile&op=contact"<?=$cat_actives['contact']?>>联系方式</a><span class="pipe">|</span>
<a href="cp.php?ac=profile&op=edu"<?=$cat_actives['edu']?>>教育情况</a><span class="pipe">|</span>
<a href="cp.php?ac=profile&op=work"<?=$cat_actives['work']?>>工作情况</a><span class="pipe">|</span>
<a href="cp.php?ac=profile&op=info"<?=$cat_actives['info']?>>个人信息</a><span class="pipe">|</span>
<a href="cp.php?ac=profile&op=cour">课程备忘录</a>
</div>

<?php $farr = array(0=>'全用户','1'=>'仅好友','3'=>'仅自己'); ?>
<form method="post" action="<?=$theurl?>&ref" class="c_form">

<?php if($_GET['op'] == 'base') { ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th style="width:10em;">您的登录用户名:</th>
<td>
<?php echo stripslashes($space['username']); ?> (<a href="cp.php?ac=password">修改登录密码</a>)
</td>
<td></td>
</tr>
<?php if(!$_SCONFIG['realname']) { ?>
<tr>
<th style="width:10em;">真实姓名:</th>
<td>
<input type="text" id="name" name="name" value="<?php echo stripslashes($space['name']); ?>" class="t_input" />
</td>
<td>&nbsp;</td>
</tr>
<?php } else { ?>
<tr>
<th style="width:10em;">真实姓名:</th>
<td>
<?php if($space['name'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?php echo stripslashes($space['name']); ?></span>
<?php if($_SCONFIG['namechange']) { ?>[<a href="<?=$theurl?>&namechange=1">修改</a>]<?php } ?>
<?php if($space['namestatus']) { ?>[<font color="red">认证通过</font>]<?php } else { ?><br>等待验证中，您目前将只能使用用户名，并且一些操作可能会受到限制<?php } ?>
<input type="hidden" name="name" value="<?php echo stripslashes($space['name']); ?>" />
<?php } else { ?>
<?php if($rncredit && $_GET['namechange']) { ?><img src="image/credit.gif" align="absmiddle"> 本操作需要支付积分 <?=$rncredit?> 个，您现在的积分 <?=$space['credit']?> 个。<br><?php } ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的真实姓名一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<?php if($_SCONFIG['namecheck']) { ?>您填写/修改真实姓名后，需要等待我们认证后才能有效，在认证通过之前，您将只能使用用户名，并且一些操作可能会受到限制。<br><?php } ?>
<input type="text" id="name" name="name" value="<?php echo stripslashes($space['name']); ?>" class="t_input" /> (请输入2～20个汉字)
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>
<?php } ?>
<tr>
<th style="width:10em;">性别:</th>
<td>
<?php if(empty($space['sex'])) { ?>
<label for="sexm"><input id="sexm" type="radio" value="1" name="sex"<?=$sexarr['1']?> />男</label> 
<label for="sexw"><input id="sexw" type="radio" value="2" name="sex"<?=$sexarr['2']?> />女</label>
<span style="font-weight:bold;color:red;">(性别选择确定后，将不能再次修改)</span>
<?php } else { ?>
<?php if($space['sex']==1) { ?>男<?php } else { ?>女<?php } ?>
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<th style="width:10em;">婚恋状态:</th>
<td>
<select id="marry" name="marry">
<option value="0">&nbsp;</option>
<option value="1"<?=$marryarr['1']?>>单身</option>
<option value="2"<?=$marryarr['2']?>>非单身</option>
</select>
<a href="cp.php?ac=friend&op=search&view=sex" target="_blank">&raquo; 查找男女朋友</a>
</td>
<td>
<select name="friend[marry]">
<option value="0"<?=$friendarr['marry']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['marry']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['marry']['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<tr>
<th>生日:</th>
<td>
<select id="birthyear" name="birthyear" onchange="showbirthday();">
<option value="0">&nbsp;</option>
<?=$birthyeayhtml?>
</select> 年 
<select id="birthmonth" name="birthmonth" onchange="showbirthday();">
<option value="0">&nbsp;</option>
<?=$birthmonthhtml?>
</select> 月 
<select id="birthday" name="birthday">
<option value="0">&nbsp;</option>
<?=$birthdayhtml?>
</select> 日
<a href="cp.php?ac=friend&op=search&view=birthyear" target="_blank">&raquo; 查找同生日朋友</a>
</td>
<td>
<select name="friend[birth]">
<option value="0"<?=$friendarr['birth']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['birth']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['birth']['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<tr>
<th>血型:</th>
<td>
<select id="blood" name="blood">
<option value="">&nbsp;</option>
<?=$bloodhtml?>
</select>
</td>
<td>
<select name="friend[blood]">
<option value="0"<?=$friendarr['blood']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['blood']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['blood']['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<tr>
<th>家乡:</th>
<td id="birthcitybox">
<script type="text/javascript" src="source/script_city.js"></script>
<script type="text/javascript">
<!--
showprovince('birthprovince', 'birthcity', '<?=$space['birthprovince']?>', 'birthcitybox');
showcity('birthcity', '<?=$space['birthcity']?>', 'birthprovince', 'birthcitybox');

//-->
</script>
<a href="cp.php?ac=friend&op=search&view=birth" target="_blank">&raquo; 查找老乡</a>
</td>
<td>
<select name="friend[birthcity]">
<option value="0"<?=$friendarr['birthcity']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['birthcity']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['birthcity']['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<tr>
<th>居住地:</th>
<td id="residecitybox">
<script type="text/javascript">
<!--
showprovince('resideprovince', 'residecity', '<?=$space['resideprovince']?>', 'residecitybox');
showcity('residecity', '<?=$space['residecity']?>', 'resideprovince', 'residecitybox');
//-->
</script>
<a href="cp.php?ac=friend&op=search&view=reside" target="_blank">&raquo; 查找同城</a>
</td>
<td>
<select name="friend[residecity]">
<option value="0"<?=$friendarr['residecity']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['residecity']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['residecity']['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<?php if(is_array($profilefields)) { foreach($profilefields as $value) { ?>
<tr>
<th><?=$value['title']?><?php if($value['required']) { ?>*<?php } ?>:</th>
<td>
<?=$value['formhtml']?>
<?php if($value['note']) { ?> <span class="gray"><?=$value['note']?></span><?php } ?>
</td>
<td>
<select name="friend[field_<?=$value['fieldid']?>]">
<?php $field_friendarr = $friendarr["field_$value[fieldid]"]; ?>
<option value="0"<?=$field_friendarr['0']?>>全用户可见</option>
<option value="1"<?=$field_friendarr['1']?>>仅好友可见</option>
<option value="3"<?=$field_friendarr['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<?php } } ?>

<tr>
<th style="width:10em;">&nbsp;</th>
<td>
<input type="submit" name="nextsubmit" value="继续下一项" class="submit" />
<input type="submit" name="profilesubmit" value="保存" class="submit" />
</td>
<td>&nbsp;</td>
</tr>
</table>

<?php } elseif($_GET['op'] == 'contact') { ?>

<table cellspacing="0" cellpadding="0" class="formtable">

<?php if($_GET['editemail']) { ?>
</table>

<div class="borderbox">
<table cellspacing="0" cellpadding="0" class="formtable">
<tbody>
<tr>
<th style="width:10em;">本网站的登录密码:</th>
<td>
<input type="password" id="password" name="password" value="" class="t_input" />
<br>为了您的账号安全，更换新邮箱的时候，需要输入您在本网站的密码。
</td>
<td></td>
</tr>
<tr>
<th style="width:10em;">新邮箱:</th>
<td>
<input type="text" id="email" class="t_input" name="email" value="<?=$space['email']?>" />
<?php if($space['emailcheck']) { ?>
<br>注意：新填写的邮箱只有在验证激活之后，才可以生效。
<?php } ?>
</td>
<td></td>
</tr>
</tbody>
</table>
</div><br>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php } else { ?>
<?php if(!$space['email']) { ?>
<tr>
<th style="width:10em;">本网站的登录密码:</th>
<td>
<input type="password" id="password" name="password" value="" class="t_input" />
<br>为了您的账号安全，填写邮箱的时候，需要输入您在本网站的密码。
</td>
<td></td>
</tr>
<?php } ?>
<tr>
<th style="width:10em;">常用邮箱:</th>
<td>
<?php if($space['email']) { ?>
<?=$space['email']?><br>
<?php if($space['emailcheck']) { ?>
当前邮箱已经验证激活 (<a href="<?=$theurl?>&editemail=1">更换</a>)
<?php } else { ?>
邮箱等待验证中...<br>
系统已经向该邮箱发送了一封验证激活邮件，请查收邮件，进行验证激活。<br>
如果没有收到验证邮件，您可以<a href="<?=$theurl?>&editemail=1">更换一个邮箱</a>，或者<a href="<?=$theurl?>&resend=1">重新接收验证邮件</a>
<?php } ?>
<?php } else { ?>
<input type="text" id="email" class="t_input" name="email" value="" />
<br>请准确填写，取回密码、获取通知的时候都会发送到该邮箱。
<br>系统同时会向该邮箱发送一封验证激活邮件，请注意查收。<br>
<?php } ?>
<?php if($space['newemail']) { ?>
<p>您要更换的新邮箱：<strong><?=$space['newemail']?></strong> 需要激活后才能替换当前邮箱并生效。<br>
如果没有收到验证邮件，您可以<a href="<?=$theurl?>&resend=1">重新接收验证邮件</a></p>
<?php } ?>
</td>
<td></td>
</tr>
<?php } ?>
<tr>
<th style="width:10em;">手机:</th>
<td>
<input id="mobile" type="text" class="t_input" name="mobile" value="<?=$space['mobile']?>" />  
</td>
<td>
<select name="friend[mobile]">
<option value="0"<?=$friendarr['mobile']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['mobile']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['mobile']['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<tr>
<th style="width:10em;">QQ:</th>
<td>
<input type="text" class="t_input" name="qq" value="<?=$space['qq']?>" /> 
</td>
<td>
<select name="friend[qq]">
<option value="0"<?=$friendarr['qq']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['qq']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['qq']['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<tr>
<th>MSN:</th>
<td>
<input type="text" class="t_input" name="msn" value="<?=$space['msn']?>" /> 
</td>
<td>
<select name="friend[msn]">
<option value="0"<?=$friendarr['msn']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['msn']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['msn']['3']?>>仅自己可见</option>
</select>
</td>
</tr>

<tr>
<th style="width:10em;">&nbsp;</th>
<td>
<input type="submit" name="nextsubmit" value="继续下一项" class="submit" />
<input type="submit" name="profilesubmit" value="保存" class="submit" />
</td>
<td>&nbsp;</td>
</tr>
</table>

<?php } elseif($_GET['op'] == 'edu') { ?>

<?php if($list) { ?>
<table cellspacing="0" cellpadding="0" class="listtable">
<tr class="title">
<td>学校</td>
<td>入学年份</td>
<td>隐私设置</td>
<td>操作</td>
</tr>
<?php if(is_array($list)) { foreach($list as $key => $value) { ?>
<?php if($key%2==1) { ?><tr class="line"><?php } else { ?><tr><?php } ?>
<td><?=$value['title']?><br><?=$value['subtitle']?><br><?=$value['class']?></td>
<td><?=$value['startyear']?></td>
<td><?=$farr[$value['friend']]?></td>
<td><a href="<?=$theurl?>&subop=delete&infoid=<?=$value['infoid']?>">删除信息</a><br><a href="cp.php?ac=friend&op=search&searchmode=1&type=edu&title=<?=$value['title_s']?>" target="_blank">寻找同学</a></td>
</tr>
<?php } } ?>
</table>
<br>
<?php } ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php if($list) { ?>
<caption>
<h2>添加新学校</h2>
</caption>
<?php } ?>
<tbody id="oldtbody">
<tr>
<th style="width:10em;">学校名称:</th>
<td>
<input type="text" name="title[]" value="北京航空航天大学" class="t_input" >
</td>
</tr>
<tr>
<th>院系:</th>
<td>
<select name="subtitle[]" class="t_input" >
<option value="材料科学与工程学院">材料科学与工程学院（1系）</option>
<option value="电子信息工程学院" selected>电子信息工程学院（2系）</option>
<option value="自动化科学与电气工程学院">自动化科学与电气工程学院（3系）</option>
<option value="能源与动力工程学院">能源与动力工程学院（4系）</option>
<option value="航空科学与工程学院">航空科学与工程学院（5系）</option>
<option value="计算机学院">计算机学院（6系）</option>
<option value="机械工程及自动化学院">机械工程及自动化学院（7系）</option>
<option value="经济管理学院">经济管理学院（8系）</option>
<option value="数学与系统科学学院">数学与系统科学学院（9系）</option>
<option value="生物与医学工程学院">生物与医学工程学院（10系）</option>
<option value="人文社会科学学院（公共管理学院）">人文社会科学学院（公共管理学院）（11系）</option>
<option value="外国语学院">外国语学院（12系）</option>
<option value="交通科学与工程学院">交通科学与工程学院（13系）</option>
<option value="可靠性与系统工程学院">可靠性与系统工程学院（14系）</option>
<option value="宇航学院">宇航学院（15系）</option>
<option value="飞行学院">飞行学院（16系）</option>
<option value="仪器科学与光电工程学院">仪器科学与光电工程学院（17系）</option>
<option value="物理科学与核能工程学院">物理科学与核能工程学院（19系）</option>
<option value="法学院">法学院（20系）</option>
<option value="软件学院">软件学院（21系）</option>
<option value="继续教育学院">继续教育学院（22系）</option>
<option value="高等工程学院">高等工程学院（23系）</option>
<option value="中法工程师学院">中法工程师学院（24系）</option>
<option value="国际学院">国际学院（25系）</option>
<option value="新媒体艺术与设计学院">新媒体艺术与设计学院（26系）</option>
<option value="化学与环境学院">化学与环境学院（27系）</option>
<option value="思想政治理论学院">思想政治理论学院（28系）</option>
</select>
</td>
</tr>
<tr>
<th>入学年份:</th>
<td>
<select name="startyear[]">
<?=$yearhtml?>
</select> 年
</td>
</tr>
<tr>
<th>班别:</th>
<td>
<input type="text" name="class[]" value="" class="t_input">
</td>
</tr>
<tr>
<th>隐私设置:</th>
<td>
<select name="friend[]">
<option value="0">全用户可见</option>
<option value="1">仅好友可见</option>
<option value="3">仅自己可见</option>
</select>
</td>
</tr>
</tbody>

<tbody id="newtbody"></tbody>

<tr>
<th style="width:10em;">&nbsp;</th>
<td><a href="javascript:;" onclick="add_tbody();">添加新的学校信息</a></td>
</tr>
<tr>
<th style="width:10em;">&nbsp;</th>
<td>
<input type="submit" name="nextsubmit" value="继续下一项" class="submit" />
<input type="submit" name="profilesubmit" value="保存" class="submit" /></td>
</tr>
</table>

<?php } elseif($_GET['op'] == 'work') { ?>

<?php if($list) { ?>
<table cellspacing="0" cellpadding="0" class="listtable">
<tr class="title">
<td>公司或机构/部门</td>
<td>公司所在省/市</td>
<td>工作时间</td>
<td>隐私设置</td>
<td>操作</td>
</tr>
<?php if(is_array($list)) { foreach($list as $key => $value) { ?>
<?php if($key%2==1) { ?><tr class="line"><?php } else { ?><tr><?php } ?>
<td><?=$value['title']?><br><?=$value['subtitle']?></td>
<td><?=$value['province']?><br><?=$value['city']?></td>
<td>
<?=$value['startyear']?>年<?=$value['startmonth']?>月 ~ 
<?php if($value['endyear']) { ?><?=$value['endyear']?>年<?php } ?>
<?php if($value['endmonth']) { ?><?=$value['endmonth']?>月<?php } ?>
<?php if(!$value['endyear'] && !$value['endmonth']) { ?>现在<?php } ?>
</td>
<td><?=$farr[$value['friend']]?></td>
<td><a href="<?=$theurl?>&subop=delete&infoid=<?=$value['infoid']?>">删除信息</a><br><a href="cp.php?ac=friend&op=search&searchmode=1&type=work&title=<?=$value['title_s']?>" target="_blank">寻找同事</a></td>
</tr>
<?php } } ?>
</table>
<br>
<?php } ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php if($list) { ?>
<caption>
<h2>添加新公司或机构</h2>
</caption>
<?php } ?>
<tbody id="oldtbody">
<tr>
<th style="width:10em;">公司或机构:</th>
<td>
<input type="text" name="title[]" value="" class="t_input">
</td>
</tr>
<tr>
<th>部门:</th>
<td>
<input type="text" name="subtitle[]" value="" class="t_input">
</td>
</tr>
<tr>
<script type="text/javascript" language="javascript">
function select()
{
   var x = [35]; 
　　　　　　　 x[0]="" ;
　　　　　　　 x[1]="北京,东城,西城,崇文,宣武,朝阳,丰台,石景山,海淀,门头沟,房山,通州,顺义,昌平,大兴,平谷,怀柔,密云,延庆" ;
　　　　　　　 x[2]="上海,黄浦,卢湾,徐汇,长宁,静安,普陀,闸北,虹口,杨浦,闵行,宝山,嘉定,浦东,金山,松江,青浦,南汇,奉贤,崇明" ;
　　　　　　　 x[3]="天津,和平,东丽,河东,西青,河西,津南,南开,北辰,河北,武清,红挢,塘沽,汉沽,大港,宁河,静海,宝坻,蓟县,大邱庄"; 
　　　　　　　 x[4]="重庆,万州,涪陵,渝中,大渡口,江北,沙坪坝,九龙坡,南岸,北碚,万盛,双挢,渝北,巴南,黔江,长寿,綦江,潼南,铜梁,大足,荣昌,壁		山,梁平,城口,丰都,垫江,武隆,忠县,开县,云阳,奉节,巫山,巫溪,石柱,秀山,酉阳,彭水,江津,合川,永川,南川"; 
　　　　　　　 x[5]="石家庄,邯郸,邢台,保定,张家口,承德,廊坊,唐山,秦皇岛,沧州,衡水"; 
　　　　　　　 x[6]="太原,大同,阳泉,长治,晋城,朔州,吕梁,忻州,晋中,临汾,运城"; 
　　　　　　　 x[7]="呼和浩特,包头,乌海,赤峰,呼伦贝尔盟,阿拉善盟,哲里木盟,兴安盟,乌兰察布盟,锡林郭勒盟,巴彦淖尔盟,伊克昭盟" ;
　　　　　　　 x[8]="沈阳,大连,鞍山,抚顺,本溪,丹东,锦州,营口,阜新,辽阳,盘锦,铁岭,朝阳,葫芦岛" ;
　　　　　　　 x[9]="长春,吉林,四平,辽源,通化,白山,松原,白城,延边" ;
　　　　　　　 x[10]="哈尔滨,齐齐哈尔,牡丹江,佳木斯,大庆,绥化,鹤岗,鸡西,黑河,双鸭山,伊春,七台河,大兴安岭" ;
　　　　　　　 x[11]="南京,镇江,苏州,南通,扬州,盐城,徐州,连云港,常州,无锡,宿迁,泰州,淮安" ;
　　　　　　　 x[12]="杭州,宁波,温州,嘉兴,湖州,绍兴,金华,衢州,舟山,台州,丽水" ;
　　　　　　　 x[13]="合肥,芜湖,蚌埠,马鞍山,淮北,铜陵,安庆,黄山,滁州,宿州,池州,淮南,巢湖,阜阳,六安,宣城,亳州" ;
　　　　　　　 x[14]="福州,厦门,莆田,三明,泉州,漳州,南平,龙岩,宁德" ;
　　　　　　　 x[15]="南昌市,景德镇,九江,鹰潭,萍乡,新馀,赣州,吉安,宜春,抚州,上饶" ;
　　　　　　　 x[16]="济南,青岛,淄博,枣庄,东营,烟台,潍坊,济宁,泰安,威海,日照,莱芜,临沂,德州,聊城,滨州,菏泽,博兴" ;
　　　　　　　 x[17]="郑州,开封,洛阳,平顶山,安阳,鹤壁,新乡,焦作,濮阳,许昌,漯河,三门峡,南阳,商丘,信阳,周口,驻马店,济源" ;
　　　　　　　 x[18]="武汉,宜昌,荆州,襄樊,黄石,荆门,黄冈,十堰,恩施,潜江,天门,仙桃,随州,咸宁,孝感,鄂州" ;
　　　　　　　 x[19]="长沙,常德,株洲,湘潭,衡阳,岳阳,邵阳,益阳,娄底,怀化,郴州,永州,湘西,张家界" ;
　　　　　　　 x[20]="广州,深圳,珠海,汕头,东莞,中山,佛山,韶关,江门,湛江,茂名,肇庆,惠州,梅州,汕尾,河源,阳江,清远,潮州,揭阳,云浮" ;
　　　　　　　 x[21]="南宁,柳州,桂林,梧州,北海,防城港,钦州,贵港,玉林,南宁地区,柳州地区,贺州,百色,河池" ;
　　　　　　　 x[22]="海口,三亚" ;
　　　　　　　 x[23]="成都,绵阳,德阳,自贡,攀枝花,广元,内江,乐山,南充,宜宾,广安,达川,雅安,眉山,甘孜,凉山,泸州" ;
　　　　　　　 x[24]="贵阳,六盘水,遵义,安顺,铜仁,黔西南,毕节,黔东南,黔南" ;
　　　　　　　 x[25]="昆明,大理,曲靖,玉溪,昭通,楚雄,红河,文山,思茅,西双版纳,保山,德宏,丽江,怒江,迪庆,临沧" ;
　　　　　　　 x[26]="拉萨,日喀则,山南,林芝,昌都,阿里,那曲" ;
　　　　　　　 x[27]="西安,宝鸡,咸阳,铜川,渭南,延安,榆林,汉中,安康,商洛" ;
　　　　　　　 x[28]="兰州,嘉峪关,金昌,白银,天水,酒泉,张掖,武威,定西,陇南,平凉,庆阳,临夏,甘南" ;
　　　　　　　 x[29]="银川,石嘴山,吴忠,固原" ;
　　　　　　　 x[30]="西宁,海东,海南,海北,黄南,玉树,果洛,海西" ;
　　　　　　　 x[31]="乌鲁木齐,石河子,克拉玛依,伊犁,巴音郭勒,昌吉,克孜勒苏柯尔克孜,博 尔塔拉,吐鲁番,哈密,喀什,和田,阿克苏" ;
　　　　　　　 x[32]="香港," ;
　　　　　　　 x[33]="澳门," ;
　　　　　　　 x[34]="台北,高雄,台中,台南,屏东,南投,云林,新竹,彰化,苗栗,嘉义,花莲,桃园,宜兰,基隆,台东,金门,马祖,澎湖" ;
　　　　　　　 var citys=x[province.value].split(",");
　　　　　　　 for(var i=0;i<citys.length;i++)
　　　　　　　 city.options[i]=new Option(citys[i],citys[i]);
}
function result()
{
var provinces=",北京,上海,天津,重庆, 河北,山西,内蒙古,辽宁,吉林,黑龙江,江苏,浙江,安徽,福建,江西,山东,河南,湖北,湖南,广东,广西,海南,四川,贵州,云南,西藏,陕西,甘肃,宁夏,青海,新疆,香港,澳门,台湾";
var province=provinces.split(",");
}
</script>
<th style="width:10em;">公司所在省市:</th>
<td>
 <select id="province" name="province[]" onchange="return select();" >
　　　		 <option selected="selected"></option>
　　　　　　 <option value="1">北京</option>
　　　　　　 <option value="2">上海</option>
　　　　　　 <option value="3">天津</option>
　　　　　　 <option value="4">重庆</option>
　　　　　　 <option value="5">河北</option>
　　　　　　 <option value="6">山西</option>
　　　　　　 <option value="7">内蒙古</option>
　　　　　　 <option value="8">辽宁</option>
　　　　　　 <option value="9">吉林</option>
　　　　　　 <option value="10">黑龙江</option>
　　　　　　 <option value="11">江苏</option>
　　　　　　 <option value="12">浙江</option>
　　　　　　 <option value="13">安徽</option>
　　　　　　 <option value="14">福建</option>
　　　　　　 <option value="15">江西</option>
　　　　　　 <option value="16">山东</option>
　　　　　　 <option value="17">河南</option>
　　　　　　 <option value="18">湖北</option>
　　　　　　 <option value="19">湖南</option>
　　　　　　 <option value="20">广东</option>
　　　　　　 <option value="21">广西</option>
　　　　　　 <option value="22">海南</option>
　　　　　　 <option value="23">四川</option>
　　　　　　 <option value="24">贵州</option>
　　　　　　 <option value="25">云南</option>
　　　　　　 <option value="26">西藏</option>
　　　　　　 <option value="27">陕西</option>
　　　　　　 <option value="28">甘肃</option>
　　　　　　 <option value="29">宁夏</option>
　　　　　　 <option value="30">青海</option>
　　　　　　 <option value="31">新疆</option>
　　　　　　 <option value="32">香港</option>
　　　　　　 <option value="33">澳门</option>
　　　　　　 <option value="34">台湾</option>
　　　</select>省
　　　<select id="city"  name="city[]" onchange="return result();" >
　　　　　<option selected="selected"></option>
　　 </select>市
</td>
</tr>
<tr>
<th>工作时间:</th>
<td>
<select name="startyear[]">
<?=$yearhtml?>
</select> 年
<select name="startmonth[]">
<?=$monthhtml?>
</select> 月 ~ 
<select name="endyear[]">
<option value="">现在</option>
<?=$yearhtml?>
</select> 年
<select name="endmonth[]">
<option value=""></option>
<?=$monthhtml?>
</select>月
</td>
</tr>
<tr>
<th>隐私设置:</th>
<td>
<select name="friend[]">
<option value="0">全用户可见</option>
<option value="1">仅好友可见</option>
<option value="3">仅自己可见</option>
</select>
</td>
</tr>
</tbody>

<tbody id="newtbody"></tbody>

<tr>
<th style="width:10em;">&nbsp;</th>
<td><a href="javascript:;" onclick="add_tbody();">添加新的公司或机构</a></td>
</tr>
<tr>
<th style="width:10em;">&nbsp;</th>
<td>
<input type="submit" name="nextsubmit" value="继续下一项" class="submit" />
<input type="submit" name="profilesubmit" value="保存" class="submit" /></td>
</tr>
</table>

<?php } elseif($_GET['op'] == 'info') { ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php $infoarr = array(
	'trainwith' => '我想结交',
	'interest' => '兴趣爱好',
	'book' => '喜欢的书籍',
	'movie' => '喜欢的电影',
	'tv' => '喜欢的电视',
	'music' => '喜欢的音乐',
	'game' => '喜欢的游戏',
	'sport' => '喜欢的运动',
	'idol' => '偶像',
	'motto' => '座右铭',
	'wish' => '最近心愿',
	'intro' => '我的简介'
); ?>
<tr>
<th>栏目</th>
<td>内容</td>
<td>隐私设置</td>
</tr>

<?php if(is_array($infoarr)) { foreach($infoarr as $key => $value) { ?>
<tr>
<th><?=$value?>:</th>
<td>
<textarea name="info[<?=$key?>]" rows="3" cols="50"><?=$list[$key]['title']?></textarea>
</td>
<td>
<select name="info_friend[<?=$key?>]">
<option value="0"<?=$friends[$key]['0']?>>全用户可见</option>
<option value="1"<?=$friends[$key]['1']?>>仅好友可见</option>
<option value="3"<?=$friends[$key]['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<?php } } ?>

<tr>
<th style="width:10em;">&nbsp;</th>
<td><input type="submit" name="profilesubmit" value="保存" class="submit" /></td>
</tr>
</table>

<!--修改-->
<?php } elseif($_GET['op'] == 'cour') { ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<td> 星期（如周一）</td>
<td> 时间（如9-11）</td>
<td> 课程名（如高等计算机网络）</td>
</tr>



<tr>
<td> 周 <input type="text" name="day" size="7"></td>
<td><input type="text" name="times" size="3">-<input type="text" name="timef" size="3"></td>
<td><input type="text" name="coursename" size="20"></td>
<td><input type="submit" name="profilesubmit" value="保存" class="submit" /></td>
</tr>
<?php if($list) { ?>
<?php if(is_array($list)) { foreach($list as $key => $value) { ?>
<tr>
<td> 周 <?=$value['day']?> </td>
<td> 第 <?=$value['times']?> 到 <?=$value['timef']?> 节 </td>
<td>  <?=$value['coursename']?> </td>
<td><a href="<?=$theurl?>&subop=delete&courseid=<?=$value['courseid']?>">删除信息</a><br>
<a href="<?=$value['fpath']?>">查询学友</a><br>
<a href="<?=$value['gpath']?>">查看学习本课小组</a></td>
</tr>
<?php } } ?>
<?php } ?>

</table>

<!--修改-->
<?php } ?>


<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>

<script>
function add_tbody() {
for(i=0; i<$("oldtbody").rows.length; i++) {
newnode = $("oldtbody").rows[i].cloneNode(true);
$("newtbody").appendChild(newnode);
}
}
</script>

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