<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('admin/tpl/apps|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/blue/header|template/blue/footer', '1381213256', 'admin/tpl/apps');?><?php $_TPL['menunames'] = array(
		'index' => '管理首页',
		'config' => '站点设置',
		'privacy' => '隐私设置',
		'usergroup' => '用户组',
		'credit' => '积分规则',
		'profilefield' => '用户栏目',
		'profield' => '群组栏目',
		'eventclass' => '活动分类',
		'magic' => '道具设置',
		'task' => '有奖任务',
		'spam' => '防灌水设置',
		'censor' => '词语屏蔽',
		'ad' => '广告设置',
		'userapp' => 'MYOP应用',
		'app' => 'uc应用',
		'network' => '随便看看',
		'cache' => '缓存更新',
		'log' => '系统log记录',
		'wallmanage' => '足迹墙管理',
		'space' => '用户管理',
		'feed' => '动态(feed)',
		'share' => '分享',
		'blog' => '日志',
		'album' => '相册',
		'pic' => '图片',
		'comment' => '评论/留言',
		'thread' => '话题',
		'post' => '回帖',
		'doing' => '记录',
		'tag' => '标签',
		'mtag' => '群组',
		'poll' => '投票',
		'wallcontentmanage' => '足迹审核',
		'event' => '活动',
		'magiclog' => '道具记录',
		'report' => '举报',
		'block' => '数据调用',
		'template' => '模板编辑',
		'backup' => '数据备份',
		'stat' => '统计更新',
		'cron' => '系统计划任务',
		'click' => '表态动作',
		'ip' => '访问IP设置',
		'hotuser' => '推荐成员设置',
		'defaultuser' => '默认好友设置',
		'publictype' => '公共主页分类',
		'publicapply' => '公共主页审批',
		'complain' => '诉求信息管理',
		'apps' => '应用管理',
	); ?>
<?php $_TPL['nosidebar'] = 1; ?>
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


<style type="text/css">
@import url(admin/tpl/style.css);
</style>

<div id="cp_content">


<div class="mainarea">
<div class="maininner">
<style type="text/css">
th {
text-align: right;
}
.listtable th{
text-align: center;
}
.listtable td{
text-align: center;
}
#official_msg,#mobile_msg,#up_uid_msg,#dept_uid_msg{color:#FF0000;padding-left:3px;}
</style>
<div class="tabs_header">
<ul class="tabs">
<li<?=$actives['0']?>><a href="admincp.php?ac=<?=$ac?>&type=appslist"><span>应用列表</span></a></li>
<li<?=$actives['1']?>><a href="admincp.php?ac=<?=$ac?>&type=appslist"><span>应用列表</span></a></li>
<li<?=$actives['2']?>><a href="admincp.php?ac=<?=$ac?>&type=api"><span>API列表</span></a></li>
</ul>
</div>

<div style="margin-top:20px;">
<?php if($type=='api') { ?>
<div style="padding: 1em; border: 1px solid #FF8E00; zoom: 1;">
<form id="from1" method="get" action="admincp.php?ac=complain&type=complains">
<div class="block style4">
  <table width="750" height="123" cellpadding="3" cellspacing="3">
<tr>
  <th width="100">用户UID</th>
  <td width="250">
  <input type="text" name="uid" id="uid" value="" size="10"><span id="dept_uid_msg">用户UID</span></td>
  <th width="100">姓名</th>
  <td width="300"><input type="text" id="uname" name="uname" value=""><span id="up_uid_msg">姓名</span></td>
</tr>
<tr>
  <th>诉求部门</th>
  <td><input type="text" name="message" id="message" value="" size="10"><span id="up_uid_msg">部门名称</span></td>
  <th>当前处理阶段</th>
  <td><input type="text" name="atuname" id="atuname" value=""><span id="official_msg">部门名称或领导姓名<span></td>
</tr>
<tr>
  <th>处理状况</th>
  <td>
  <select name="isreply">
<option value="3">==所有==</option>
<option value="2">未回复</option>
<option value="1">已回复</option>
  </select>
  </td>
  <th></th>
  <td></td>
</tr>
<tr>
  <td colspan="4" style="text-align:center;">
  <input type="hidden" name="ac" value="complain">
  <input type="hidden" name="type" value="complains">
  <input type="submit" name="submit" value="搜索" class="submit">
  </td>
</tr>
  </table>
</div>
</form>
</div>
<div class="bdrcontent">
<table cellspacing="2" cellpadding="2" class="listtable">
  <tbody>
<tr class="line">
  <th>ID</th>
  <th>API名称</th>
  <th>API en name</th>
  <th>URL</th>
  <th>API简介</th>
  <th>当前状态</th>
  <th>操作</th>
</tr>
<?php if(is_array($apis)) { foreach($apis as $key=>$value) { ?>
<tr id="api_<?=$value['id']?>"<?php if($key%2==1) { ?> class="line"<?php } ?>>
  <td style="width:20px;"><?=$value['iauthAPIid']?></td>
  <td style="width:80px;"><?=$value['name']?></td>
  <td style="width:160px;"><?=$value['iauthENname']?></td>
  <td style="width:200px;"><?=$value['url']?></td>
  <td><?=$value['intro']?></td>
  <td style="width:60px;">
  <select name="status_<?=$value['id']?>" id="status_<?=$value['id']?>" onChange="mod_status(<?=$value['id']?>)">
<option value="disable" <?php if($value['status']=='disable') { ?>selected="selected"<?php } ?>>禁用</option>
<option value="debug" <?php if($value['status']=='debug') { ?>selected="selected"<?php } ?>>调试</option>
<option value="normal" <?php if($value['status']=='normal') { ?>selected="selected"<?php } ?>>正常</option>
  </select>
  </td>
  <td style="width:60px;"><a href="javascript:void(0);" onClick="deleteById(<?=$value['id']?>)">删除</a></td>
</tr>
<?php } } ?>
  </tbody>
</table>
</div>
<script type="text/javascript">
var i = jQuery.noConflict();
i(function () {

})
function deleteById(api_id){
i.ajax({
type: "GET",
url: "admincp.php?ac=<?=$ac?>&type=api&op=delete",
data: {id:api_id},
success: function(data){
if(data != 0)
alert("删除成功!");
i("#api_" + api_id).remove();
}
});
}
function mod_status(api_id){
var status = i("#status_" + api_id).val();
i.ajax({
type: "GET",
url: "admincp.php?ac=<?=$ac?>&type=api&op=mod",
data: {id:api_id ,status:status},
success: function(data){
if(data != 0){
alert("修改成功!");
}else{
alert("修改失败!");
}
}
});
}
</script>
<div class="footactions">
<div class="pages"><?=$multi?></div>
</div>
<?php } elseif($type=='appdetail') { ?>
<div style="padding: 1em; border: 1px solid #FF8E00; zoom: 1;">
<form id="from1" method="get" action="admincp.php?ac=apps&type=appdetail" enctype="multipart/form-data">
<div class="block style4">
  <table width="750" height="123" cellpadding="3" cellspacing="3">
<tr>
<td width="144" align="right">应用中文名称:</td>
<td width="565" align="left"><input name="name" value="<?=$name?>" /></td>
</tr>
<tr>
<td width="144" align="right">应用英文名称:</td>
<td width="565" align="left"><input name="iauth_name" value="<?=$iauth_name?>" />第三方应用必填(数字,字母,下划线组成,小于48字符)</td>
</tr>
<tr>
<td align="right">logo:</td>
<td align="left"><img src="<?=$logo?>" width=100 /></td>
</tr>
<tr>
<td align="right">修改logo:</td>
<td align="left"><input type="file" id="logo" name="logo" /></td>
</tr>
<tr>
<td align="right">所属分类:</td>
<td align="left">
<select name="category">
<option value="0" <?php if($category==0) { ?>selected="selected"<?php } ?>>请选择</option>
<option value="1" <?php if($category==1) { ?>selected="selected"<?php } ?>>校内应用</option>
<option value="2" <?php if($category==2) { ?>selected="selected"<?php } ?>>站内应用</option>
<option value="3" <?php if($category==3) { ?>selected="selected"<?php } ?>>第三方应用</option>
    </select>
</td>
</tr>
<?php if($category==3) { ?>
<tr>
<td align="right">使用状态:</td>
<td align="left">
<label><input name="iauth_type" type="radio" value="WSC" <?php if($iauth_type=='WSC') { ?>checked="checked"<?php } ?> />Web Site Client</label>
<label><input name="iauth_type" type="radio" value="UAC" <?php if($iauth_type=='UAC') { ?>checked="checked"<?php } ?> />User Agent Client</label>
<label><input name="iauth_type" type="radio" value="RP" <?php if($iauth_type=='RP') { ?>checked="checked"<?php } ?> />Resource Provider</label>
</td>
</tr>
<?php } ?>
<?php if($iauth_type!='RP') { ?>
<tr>
<td align="right">应用URL:</td>
<td align="left"><textarea name="url" cols="60" rows="1"><?=$url?></textarea></td>
</tr>
<tr>
<td align="right">授权回调URL:</td>
<td align="left"><textarea name="app_url"  cols="60" rows="1"><?=$app_url?></textarea></td>
</tr>
<tr>
<td align="right">登录回调URL:</td>
<td align="left"><textarea name="back_url" cols="60" rows="1"><?=$back_url?></textarea></td>
</tr>
<tr>
<td align="right">应用描述:</td>
<td align="left"><textarea name="desc" cols="60" rows="3"><?=$desc?></textarea></td>
</tr>
<tr>
<td align="right">应用类型:</td>
<td align="left">
<select name="types">
<option value="0" <?php if($types==0) { ?>selected="selected"<?php } ?>>请选择</option>
<option value="1" <?php if($types==1) { ?>selected="selected"<?php } ?>>生活类</option>
<option value="2" <?php if($types==2) { ?>selected="selected"<?php } ?>>科研类</option>
<option value="3" <?php if($types==3) { ?>selected="selected"<?php } ?>>教学类</option>
<option value="4" <?php if($types==4) { ?>selected="selected"<?php } ?>>人力资源类</option>
<option value="5" <?php if($types==5) { ?>selected="selected"<?php } ?>>资产类</option>
<option value="6" <?php if($types==6) { ?>selected="selected"<?php } ?>>生活服务类</option>
<option value="7" <?php if($types==7) { ?>selected="selected"<?php } ?>>其他</option>
    </select>
</td>
</tr>
<tr>
<td align="right">使用对象:</td>
<td align="left">
<label><input name="undergraduate" type="checkbox" value="1" <?php if($usertype & 8) { ?>checked="checked"<?php } ?> />本科生</label>
<label><input name="postgraduate" type="checkbox" value="1" <?php if($usertype & 4) { ?>checked="checked"<?php } ?> />研究生</label>
<label><input name="teacher" type="checkbox" value="1" <?php if($usertype & 2) { ?>checked="checked"<?php } ?> />教职工</label>
<label><input name="alumnus" type="checkbox" value="1" <?php if($usertype & 1) { ?>checked="checked"<?php } ?> />校友</label>
</td>
</tr>
<tr>
<td align="right">开始时间:</td>
<td align="left"><input name="starttime" value="<?=$starttime?>" /></td>
</tr>
<tr>
<td align="right">结束时间:</td>
<td align="left"><input name="endtime" value="<?=$endtime?>" /></td>
</tr>
<?php } ?>
<tr>
<td align="right">申请人:</td>
<td align="left"><?=$applyuid?></td>
</tr>
<tr>
<td align="right">申请时间:</td>
<td align="left"><?=$applytime?></td>
</tr>
<tr>
<td align="right">使用状态:</td>
<td align="left">
<label><input name="status" type="radio" value="disable" <?php if($status=='disable') { ?>checked="checked"<?php } ?> />disable</label>
<label><input name="status" type="radio" value="debug" <?php if($status=='debug') { ?>checked="checked"<?php } ?> />debug</label>
<label><input name="status" type="radio" value="normal" <?php if($status=='normal') { ?>checked="checked"<?php } ?> />normal</label>
</td>
</tr>
<tr>
<td align="right">审核状态:</td>
<td align="left">
<label><input name="applypass" type="radio" value="0" <?php if($applypass==0) { ?>checked="checked"<?php } ?> />尚未审核</label>
<label><input name="applypass" type="radio" value="1" <?php if($applypass==1) { ?>checked="checked"<?php } ?> />审核通过</label>
<label><input name="applypass" type="radio" value="2" <?php if($applypass==2) { ?>checked="checked"<?php } ?> />审核不通过</label>
</td>
</tr>
<tr>
<td align="right">用户可见:</td>
<td align="left">
<label><input name="ishidden" type="radio" value="0" <?php if($ishidden==0) { ?>checked="checked"<?php } ?> />可见</label>
<label><input name="ishidden" type="radio" value="1" <?php if($ishidden==1) { ?>checked="checked"<?php } ?> />不可见</label>
</td>
</tr>
<tr>
<td align="right">通知:</td>
<td align="left"><textarea name="notes" cols="60" rows="3"></textarea></td>
</tr>
<tr>
  <td colspan="2" style="text-align:center;">
  <input type="hidden" name="applyuid" value="<?=$applyuid?>">
  <input type="hidden" name="appsid" value="<?=$appsid?>">
  <input type="hidden" name="ac" value="apps">
  <input type="hidden" name="verify" value="1">
  <input type="hidden" name="type" value="appdetail">
  <input type="hidden" name="iauth_id" value="<?=$iauth_id?>">
  <input type="submit" name="submit" value="提交" class="submit">
  </td>
</tr>
  </table>
</div>
</form>
</div>

<div class="footactions">
</div>
<?php } else { ?>
<div style="padding: 1em; border: 1px solid #FF8E00; zoom: 1;">
<form id="from1" method="get" action="admincp.php?ac=apps&type=appslist">
<div class="block style4">
  <table width="750" height="123" cellpadding="3" cellspacing="3">
<tr>
  <th>审核状态</th>
  <td>
  <select name="applypass">
<option value="5">请选择</option>
<option value="0">尚未审核</option>
<option value="1">审核通过</option>
<option value="2">审核未通过</option>
  </select>
  </td>
  <th>所属分类</th>
  <td>
  <select name="category">
<option value="0">请选择</option>
<option value="1">校内应用</option>
<option value="2">站内应用</option>
<option value="3">第三方应用</option>
  </select>
  </td>
  <th>应用类型</th>
  <td>
  <select name="types">
<option value="1">教学类</option>
<option value="2">科研类</option>
<option value="3">财务类</option>
<option value="4">人力资源类</option>
<option value="5">资产类</option>
<option value="6">生活服务类</option>
<option value="7">其他</option>
  </select>
  </td>
</tr>
<tr>
  <td colspan="4" style="text-align:center;">
  <input type="hidden" name="ac" value="apps">
  <input type="hidden" name="type" value="appslist">
  <input type="submit" name="submit" value="搜索" class="submit">
  </td>
</tr>
  </table>
</div>
</form>
</div>
<div class="bdrcontent">
<table cellspacing="2" cellpadding="2" class="listtable">
  <tbody>
<tr class="line">
  <th>应用名称</th>
  <th>所属分类</th>
  <th>应用类型</th>
  <th>申请时间</th>
  <th>申请人</th>
  <th>用户可见</th>
  <th>是否审核</th>
  <th>操作</th>
</tr>
<?php if(is_array($apps)) { foreach($apps as $key=>$value) { ?>
<tr id="app_<?=$value['id']?>"<?php if($key%2==1) { ?> class="line"<?php } ?>>
  <td><?=$value['name']?></td>
  <td>
  <?php if($value['category']==1) { ?>
  校内应用
  <?php } elseif($value['category']==2) { ?>
  站内应用
  <?php } else { ?>
  第三方应用
  <?php } ?>
  </td>
  <td>
  <?php if($value['type']==1) { ?>生活类
  <?php } elseif($value['type']==2) { ?>科研类
  <?php } elseif($value['type']==3) { ?>教学类
  <?php } elseif($value['type']==4) { ?>人力资源类
  <?php } elseif($value['type']==5) { ?>资产类
  <?php } elseif($value['type']==6) { ?>生活服务类
  <?php } else { ?>其他
  <?php } ?></td>
  <td><?=$value['applytime']?></td>
  <td><?=$_SN[$value['applyuid']]?></td>
  <td>
  <?php if($value['ishidden']==0) { ?>
  可见
  <?php } else { ?>
  不可见
  <?php } ?>
  </td>
  <td>
  <?php if($value['applypass']==0) { ?>
  尚未审核
  <?php } elseif($value['applypass']==1) { ?>
  审核通过
  <?php } else { ?>
  审核未通过
  <?php } ?>
  </td>
  <td>
  <a href="admincp.php?ac=apps&type=appdetail&appsid=<?=$value['id']?>">详情</a>
  <a href="javascript:void(0);" onClick="deleteById(<?=$value['id']?>)">删除</a>
  </td>
</tr>
<?php } } ?>
  </tbody>
</table>
</div>
<?php } ?>
</div>
<script type="text/javascript">
var i = jQuery.noConflict();
i(function(){})
function deleteById(app_id){
if(!confirm("删除后不可恢复~!确定要删除吗?")){
return false;
}
i.ajax({
type: "GET",
url: "admincp.php?ac=apps&type=appdetail&op=delete",
data: {id:app_id},
success: function(data){
if(data != 0)
alert("删除成功!");
i("#app_" + app_id).remove();
}
});
}
</script>
</div>
</div>

<div class="side">
<?php if($menus['0']) { ?>
<div class="block style1">
<h2>基本设置</h2>
<ul class="folder">
<?php if(is_array($acs['0'])) { foreach($acs['0'] as $value) { ?>
<?php if($menus['0'][$value]) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } ?>
<?php } } ?>
</ul>
</div>
<?php } ?>

<div class="block style1">
<h2>批量管理</h2>
<ul class="folder">
<?php if(is_array($acs['3'])) { foreach($acs['3'] as $value) { ?>
<?php if($value=='wallcontentmanage') { ?>
<?php if(!$WallStartFlag) { ?>
<?php continue; ?>
<?php } ?>
<?php } ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } } ?>
<?php if(is_array($acs['1'])) { foreach($acs['1'] as $value) { ?>
<?php if($menus['1'][$value]) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } ?>
<?php } } ?>
</ul>

</div>

<?php if($menus['2']) { ?>
<div class="block style1">
<h2>高级设置</h2>
<ul class="folder">
<?php if(is_array($acs['2'])) { foreach($acs['2'] as $value) { ?>
<?php if($menus['2'][$value]) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } ?>
<?php } } ?>
<?php if($menus['0']['config']) { ?><li><a href="<?=UC_API?>" target="_blank">UCenter</a></li><?php } ?>
</ul>
</div>
<!--<li><a href="admincp.php?ac=publicapply"  target="_blank">申请公共主页</a></li>
<li><a href="admincp.php?ac=publictype"  target="_blank">公共主页分类</a></li>-->

<?php } ?>


<?php if($menus['2']) { ?>
        <div class="block style1">
                <h2>积分换礼</h2>
                <ul class="folder">
                <?php if($ac=='jifen_lb') { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=jifen_lb">礼品类别</a></li>
                <?php if($ac=='jifen_lp') { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=jifen_lp">礼品设置</a></li>
                <?php if($ac=='jifen_cj') { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=jifen_cj">抽奖设置</a></li>
                <?php if($ac=='jifen_pl') { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=jifen_pl">评论管理</a></li>
                <?php if($ac=='jifen_dhlog') { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=jifen_dhlog">兑换记录</a></li>
                <?php if($ac=='jifen_cjlog') { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=jifen_cjlog">抽奖记录</a></li>
                </ul>
        </div>
<?php } ?>


</div>

</div>

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