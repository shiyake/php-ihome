<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('template/blue/cp_feed|template/blue/header|template/blue/space_comment_li|template/blue/space_feed_li|template/blue/footer', '1381749045', 'template/blue/cp_feed');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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


<?php if($_GET['op'] == 'getcomment') { ?>

<div class="fc">
<form id="feedform_<?=$feedid?>" method="post" action="cp.php?ac=feed&feedid=<?=$feedid?>" style="padding:0.5em;">
<a href="###" id="face_<?=$feedid?>" title="插入表情" onclick="showFace(this.id, 'feedmessage_<?=$feedid?>');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<span id="note_<?=$feedid?>"></span><label><input type="checkbox" name="withshare" value="true" />同时转发</label><br>
<textarea id="feedmessage_<?=$feedid?>" class="t_input" name="message" rows="2" style="width:100%;" onfocus="at()"></textarea><br>
<input type="hidden" name="commentsubmit" value="true" />
<input type="button" name="feedbutton" class="submit" onclick="ajaxpost('feedform_<?=$feedid?>', 'feedcomment_add')" value="评论">
<span id="__feedform_<?=$feedid?>"></span>
<input type="hidden" name="refer" value="space.php?do=hot&id=<?=$feedid?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<div class="comments_list">
<ul id="comment_ol_<?=$feedid?>">
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
<?php if($multi) { ?><div class="page"><?=$multi?></div><?php } ?>

<?php } elseif($_GET['op'] == 'getfeed') { ?>


<div class="feed">
<div id="feed_div">
<ul>
<?php $_TPL['hidden_menu']=1;$_TPL['hidden_hot']=1;$_TPL['hidden_time']=1;$_TPL['hidden_more']=1; ?>
<?php if(is_array($feedlist)) { foreach($feedlist as $value) { ?>
<?php $value=mkfeed($value); ?>
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
<?php if($feed_multi) { ?><div class="page"><?=$feed_multi?></div><?php } ?>

<?php } elseif($_GET['op'] == 'menu') { ?>

<?php if($feed['uid']==$_SGLOBAL['supe_uid']) { ?>

<h1>删除动态</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner" id="__feedform_<?=$feedid?>">
<form method="post" id="feedform_<?=$feedid?>" name="feedform_<?=$feedid?>" action="cp.php?ac=feed&op=delete&feedid=<?=$feedid?>">
<p>确定删除该动态吗？</p>
<p class="btn_line">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<?php if($_SGLOBAL['inajax']) { ?>
<input type="hidden" name="feedsubmit" value="true" />
<button name="feedsubmit_btn" type="button" class="submit" value="true" onclick="ajaxpost('feedform_<?=$feedid?>', 'feed_delete', 2000)">确定</button>
<?php } else { ?>
<button name="feedsubmit" type="submit" class="submit" value="true">确定</button>
<?php } ?>
<?php if(checkperm('managefeed')) { ?>
<a href="admincp.php?ac=feed&op=edit&feedid=<?=$feedid?>" target="_blank">编辑</a>
<?php } ?>
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } else { ?>

<h1>屏蔽动态</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner" id="__feedform_<?=$feedid?>">
<form method="post" id="feedform_<?=$feedid?>" name="feedform_<?=$feedid?>" action="cp.php?ac=feed&op=ignore&icon=<?=$feed['icon']?>">
<p>在下次浏览时不再显示此类动态</p>
<p class="btn_line">
<input type="radio" name="uid" id="uid1" value="<?=$feed['uid']?>" checked> <label for="uid1">仅屏蔽该好友的</label>
<br>
<input type="radio" name="uid" id="uid0" value="0"> <label for="uid0">屏蔽所有好友的</label>
<br><br>
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<?php if($_SGLOBAL['inajax']) { ?>
<input type="hidden" name="feedignoresubmit" value="true" />
<button name="feedignoresubmit_btn" type="button" class="submit" value="true" onclick="ajaxpost('feedform_<?=$feedid?>','',2000)">确定</button>
<?php } else { ?>
<button name="feedignoresubmit" type="submit" class="submit" value="true">确定</button>
<?php } ?>
<?php if(checkperm('managefeed')) { ?>
<a href="admincp.php?ac=feed&op=edit&feedid=<?=$feedid?>" target="_blank">编辑</a>
<?php } ?>
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } ?>

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