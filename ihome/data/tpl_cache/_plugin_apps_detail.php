<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('/plugin/apps/detail|plugin/apps/header|plugin/apps/left|plugin/apps/right_nav|plugin/apps/footer', '1381737587', '/plugin/apps/detail');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="i北航">
<link rel="shortcut icon" href="favicon.ico">
<title>i 北航</title>
<link href="plugin/apps/css/reset.css" rel="stylesheet" type="text/css" />
<link href="plugin/apps/css/color.css" rel="stylesheet" type="text/css" />
<link href="plugin/apps/css/layout.css" rel="stylesheet" type="text/css" />
<link href="plugin/apps/css/style.css" rel="stylesheet" type="text/css" />
<link href="plugin/apps/css/yingyong.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="plugin/apps/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="plugin/apps/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugin/apps/js/ihome_dialog.js"></script>
<script type="text/javascript" src="plugin/apps/js/touming.js"></script>
<script type="text/javascript" src="plugin/apps/js/pie.js"></script>
<script>
$(function() {
    if (window.PIE) {
        $('.rounded').each(function() {
            PIE.attach(this);
        });
    }
});
</script>
<!--[if lte IE 6]>
<script src="touming.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, img , a, png');
    </script>
<![endif]-->
</head>
<body>
<div class="container">
  <div class="header">
    <div class="header_c">
      <div class="logo"></div>
      <!-- end logo -->
      <div class="nav">
        <ul class="nav_ul">
          <li class="nav_li"><a href="space.php?do=home">我的首页</a></li>
          <li class="nav_li"><a href="space.php">个人主页</a></li>
          <li class="nav_li"><a href="space.php?do=friend">好友</a></li>
          <li class="nav_li"><a href="plugin.php?pluginid=apps">应用大厅</a></li>
          <li class="nav_li"><a href="cp.php">设置</a></li>
          <li class="nav_li"><a href="cp.php?ac=common&op=logout&uhash=<?=$_SGLOBAL['uhash']?>">退出</a></li>
        </ul>
      </div>
      <!-- end nav -->
      <div class="setup"></div>
      <!-- end setup -->
    </div>
    <!-- end header_c -->
  </div>
  <!-- end head -->
<?php } ?>
  <div class="main">
    
<div class="yingyong_left">
<div style="text-align:center !important;color:#FF6700 !important;font-size:16px">
测试版
</div>
<?php if($_SGLOBAL['member']['groupid'] != 3) { ?>
  <div class="yingyong_left_list_t" id="list_1"><a href="#">全部应用</a></div>
      <!-- end yingyong_left_list_t -->
      <div class="yingyong_left_list_c">
        <ul>
  <?php if($collegeid_len != 0) { ?>
  <li class="yingyong_left_list_li"><a href="plugin.php?pluginid=apps&ac=list&category=1">校内应用</a></li>
          <?php } ?>
  <li class="yingyong_left_list_li"><a href="plugin.php?pluginid=apps&ac=list&category=3">第三方应用</a></li>
  <li class="yingyong_left_list_li"><a href="plugin.php?pluginid=apps&ac=list&category=2">站内应用</a></li>
        </ul>
      </div>
      <!-- end yingyong_left_list_c -->
  <?php } ?>
      <div class="yingyong_left_list_t" id="list_3"><a href="#">管理</a></div>
      <!-- end yingyong_left_list_t -->
      <div class="yingyong_left_list_c">
        <ul>
          <li class="yingyong_left_list_li"><a href="plugin.php?pluginid=apps&ac=mine">我授权的应用</a></li>
  <?php if($_SGLOBAL['member']['groupid'] == 3) { ?>
  <li class="yingyong_left_list_li"><a href="plugin.php?pluginid=apps&ac=apply">应用申请</a></li>
  <?php } ?>
        </ul>
      </div>
      <!-- end yingyong_left_list_c -->
    </div>
    <!-- end yingyong_left -->


    <div class="yingyong_right">

      <div class="yingyong_nav">
        <ul>
          <li class="yingyong_nav_li<?php if($ac!='mine') { ?> li_active<?php } ?>"><a href="plugin.php?pluginid=apps">应用大厅</a></li>
          <li class="yingyong_nav_li<?php if($ac=='mine') { ?> li_active<?php } ?>"><a href="plugin.php?pluginid=apps&ac=mine">应用管理</a></li>
        </ul>
      </div>
      <!-- end yingyong_nav -->
      <div class="yingyong_range">
        <div class="yy_green"></div>
        <div>本科&nbsp;&nbsp;</div>
        <div class="yy_yellow"></div>
        <div>研究生&nbsp;&nbsp;</div>
        <div class="yy_red"></div>
        <div>教职工&nbsp;&nbsp;</div>
        <div class="yy_blue"></div>
        <div>校友&nbsp;&nbsp;</div>
      </div>
      <!-- end yingyong_range -->
      <div class="search">
        <form class="form-search" action="plugin.php?pluginid=apps&ac=list" method="post">
          <input style=" color:#666; border:1px solid #ddd; margin: 5px 0 0 5px; padding-left:5px; width:160px; float:left; height:34px; line-height:34px; " maxlength="100" size="30" onfocus="this.value=&#39;&#39;" value="请输入关键字" name="keyword">
  <input style="border-style: none; border-color: inherit; border-width: 0;margin:6px 0 0 0px;float:left; background:url(plugin/apps/images/search.jpg) no-repeat left top; width: 36px; height:36px;cursor:pointer;" type="submit" name="submit" value="">
  <input type="hidden" name="appssearch" value="true" />
  <input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
        </form>
      </div>
      <!-- end search -->
  
      <div class="clear"></div>
      <div class="yingyong_c">
        <div class="yingyong_text">
          <div class="yingyong_img"><img src="<?=$app['logo']?>" title="<?=$app['name']?>" width="120" height="120" /></div>
          <!-- end yingyong_img -->
          <div class="yingyong_intr">
            <h1><?=$app['name']?></h1>
            使用次数：<?=$app['clicktime']?>次<br />
授权人数：<?=$app['usernumber']?>人<br />
            评价人数：<?=$app['comment']?>人<br />
            <span class="left">适用对象：</span>
<?php if($app['usertype'] & 8) { ?>
<div class="yy_green left inline"></div>
<?php } ?>
<?php if($app['usertype'] & 4) { ?>
<div class="yy_yellow left inline"></div>
<?php } ?>
<?php if($app['usertype'] & 2) { ?>
<div class="yy_red left inline"></div>
<?php } ?>
<?php if($app['usertype'] & 1) { ?>
<div class="yy_blue left inline"></div>
<?php } ?>
          </div>
          <div class="yingyong_eva"> <span class="left">总体评价：</span><span class="left" id="all_score"></span><span class="score_num"><?=$app['score']?></span>
            <div class="clear"></div>
            <span class="left">易&nbsp;用&nbsp;&nbsp;性：</span><span class="left" id="all_score_easy"></span><span class="score_num"><?=$app['score_easy']?></span>
            <div class="clear"></div>
            <span class="left">服务质量：</span><span class="left" id="all_score_service"></span><span class="score_num"><?=$app['score_service']?></span>
            <div class="clear"></div>
            <span class="left">响应速度：</span><span class="left" id="all_score_speed"></span><span class="score_num"><?=$app['score_speed']?></span>
            <div class="clear"></div>
          </div>
          <!-- end yingyong_eva -->
          <div class="quanli">
            <?php if($isAuthorized) { ?>
<?php if($app['iauth_type']) { ?>
<div class="shiyong"><a onclick="gourl();" href="javascript:void(0)">立即使用</a></div>
<?php } else { ?>
<div class="shiyong"><a onclick="useApp('<?=$appsid?>');" href="javascript:void(0)">立即使用</a></div>
<?php } ?>
            <div class="jiechu"><a onclick="removeiAuth('<?=$appsid?>');" href="javascript:void(0)">解除授权</a></div>
<?php } else { ?>
<?php if($app['iauth_type']) { ?>
<div class="shouquan"><a onclick="gourl();" href="javascript:void(0)">授权使用</a></div>
<?php } else { ?>
<div class="shouquan"><a onclick="authiAuth('<?=$appsid?>');" href="javascript:void(0)">授权使用</a></div>
<?php } ?>
<?php } ?>
          <script type="text/javascript">
$(function() {
var isconfirm = location.hash;
if(isconfirm == '#confirm'){
$("#msg-box").load("plugin.php?pluginid=apps&ac=detail&isConfirm=1&appsid=<?=$appsid?>&state=<?=$state?>",function(){
showDialog();
});
}
});
function gourl(){
var iauth_type = '<?=$app['iauth_type']?>';
if(iauth_type == 'UAC'){
$("#msg-box").load("plugin.php?pluginid=apps&ac=detail&isConfirm=1&appsid=<?=$appsid?>&state=<?=$state?>",function(){
showDialog();
});
}
else
location = '<?=$app['url']?>';
}
function authiAuth(appid){
$.get("plugin.php?pluginid=apps&ac=detail&authorize=1&appsid=" + appid,
{appsid:appid},
function(data){
if(data != 0)
location=data;
else
alert('授权失败~!');
});
}
function useApp(appid){
$.get("plugin.php?pluginid=apps&ac=detail&gotoapp=1&appsid=" + appid,
{appsid:appid},
function(data){
if(data != 0)
location=data;
else
alert('跳转失败~!');
});
}
function removeiAuth(appid){
$.get("plugin.php?pluginid=apps&ac=detail&resetauthorize=1&appsid=" + appid,
{appsid:appid},
function(data){
if(data != 0){
alert('已解除授权~!');
location=data;
}
else
alert('解除授权失败~!');
});
}
  </script>
  </div>
          <!-- end quanli -->
          <div class="clear"></div>
          <div class="yy_jieshao">
            <h2 class="block">应用介绍</h2>
            <div class="yy_jieshao_c"> <?=$app['desc']?> </div>
            <!-- end yy_jieshao_c -->
          </div>
          <!-- end yy_jieshao -->
  
  <?php if($isAuthorized) { ?>
  <?php if(!$isGrade) { ?>
          <div class="yy_eva">
            <h2 class="block">应用评价</h2>
            <div class="yy_eva_c">
<span class="left margin_left_40">总体评价：</span><span class="left" id="add_score"></span>
<span class="left margin_left_80">易&nbsp;&nbsp;用&nbsp;&nbsp;性：</span><span class="left" id="add_score_easy"></span>
              <div class="clear"></div>
              <span class="left margin_left_40">服务质量：</span><span class="left" id="add_score_service"></span>
  <span class="left margin_left_80">响应速度：</span><span class="left" id="add_score_speed"></span>
              <div class="clear"></div>
  <form action="plugin.php?pluginid=apps&ac=detail&appsid=<?=$appsid?>" method="post">
              <div class="shuru">
                <textarea rows="2" class="width_95" name="content"></textarea>
<input name="score" id="score" type="hidden" value="5" />
<input name="score_easy" id="score_easy" type="hidden" value="5" />
<input name="score_service" id="score_service" type="hidden" value="5" />
<input name="score_speed" id="score_speed" type="hidden" value="5" />
              </div>
              <!-- end shuru -->
              <div class="anniu">
                <label><input type="checkbox" value="1" name="anonymous">匿名</label><br />
<input type="hidden" name="comment_submit" value="true" />
<input type="hidden" name="appsid" value="<?=$appsid?>" />
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
                <button type="submit" class="pinf">评分</button>
              </div>
  </form>
              <!-- end anniu -->
            </div>
            <!-- end yy_eva_c -->
            <div class="clear"></div>
          </div>
  <?php } ?>
  <?php } ?>

          <!-- end yy_eva -->
          <div class="user_com">
            <h2 class="block padding_bottom_10">用户评价</h2>
            <?php if($comments) { ?>
<?php if(is_array($comments)) { foreach($comments as $comment) { ?>
<div class="user_com_c">
              <div class="user_img">
<?php if($comment['anonymous']) { ?>
<a href="javascript:void(0)" target="_blank"><?php echo avatar(0,small); ?></a>
(匿名)
<?php } else { ?>
<a href="space.php?uid=<?=$comment['uid']?>" target="_blank"><?php echo avatar($comment[uid],small); ?></a>
<a href="space.php?uid=<?=$comment['uid']?>" target="_blank"><?=$_SN[$comment['uid']]?></a>
<?php } ?>
  </div>
              <div class="user_com_c_c">
                <div class="user_c_neirong"><?=$comment['content']?></div>
                <span class="left">总体评价：</span><span class="score_num"><?=$comment['score']?>&nbsp;&nbsp;&nbsp;</span>
<span class="left">易用性：</span><span class="score_num"><?=$comment['score_easy']?>&nbsp;&nbsp;&nbsp;</span>
<span class="left">服务质量：</span><span class="score_num"><?=$comment['score_service']?>&nbsp;&nbsp;&nbsp;</span>
<span class="left">响应速度：</span><span class="score_num"><?=$comment['score_speed']?>&nbsp;&nbsp;&nbsp;</span>
  </div>
              <div class="com_c_time"><?=$comment['time']?></div>
            </div>
            <!-- end user_com_c -->
            <div class="clear dashed"></div>
<?php } } ?>
<?php } ?>
<link href="plugin/apps/css/star.css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="plugin/apps/js/star_big.js"></script>
<script type="text/javascript">
/******************************以下显示现有总分***********************************/
var options_score = {
value : <?=$app['score']?>,
 enabled : false
}
$('#all_score').rater(options_score);
var options_score_easy = {
value : <?=$app['score_easy']?>,
 enabled : false
}
$('#all_score_easy').rater(options_score_easy);
var options_score_service = {
value : <?=$app['score_service']?>,
 enabled : false
}
$('#all_score_service').rater(options_score_service);
var options_score_speed = {
value : <?=$app['score_speed']?>,
 enabled : false
}
$('#all_score_speed').rater(options_score_speed);
/******************************以下显示将输入的分数***********************************/
var options_add_score = {
value : 5,
after_click : function(ret) {  
$('#score').val(ret.number);  
}  
}
$('#add_score').rater(options_add_score);
var options_add_score_easy = {
value : 5,
after_click : function(ret) {  
$('#score_easy').val(ret.number);  
}
}
$('#add_score_easy').rater(options_add_score_easy);
var options_add_score_service = {
value : 5,
after_click : function(ret) {  
$('#score_service').val(ret.number);  
}
}
$('#add_score_service').rater(options_add_score_service);
var options_add_score_speed = {
value : 5,
after_click : function(ret) {  
$('#score_speed').val(ret.number);  
}
}
$('#add_score_speed').rater(options_add_score_speed);
</script>
            <div class="clear dashed margin_bottom_10"></div>
            <!--<div class="more"> <a href="#">显示更多</a> </div>-->
          </div>
          <!-- end user_com -->
        </div>
        <!-- end yingyong_text -->
      </div>
      <!-- end yingyong_c -->
        <div class="solid_666 clear"></div>
      </div>
      <!-- end yingyong_c -->
    </div>
    <!-- end yingyong_right -->
  </div>
  <!-- end main -->
  
  <div class="clear"></div>
  <div class="footer">
    <div class="footer_c">
      <div class="footer_c_list border_right">
        <div class="footer_c_list_t">用户帮助</div>
        <!-- end footer_c_list_t -->
        <div class="footer_c_list_c"> <a href="#">1.玩转i北航</a><br />
          <a href="#">2.常见问题</a> </div>
        <!-- end footer_c_list_c -->
      </div>
      <!-- end footer_c_list -->
      <div class="footer_c_list border_right">
        <div class="footer_c_list_t">客户端</div>
        <!-- end footer_c_list_t -->
        <div class="footer_c_list_c"> <a href="#">1.客户端下载</a> </div>
        <!-- end footer_c_list_c -->
      </div>
      <!-- end footer_c_list -->
      <div class="footer_c_list border_right">
        <div class="footer_c_list_t ">应用大厅简介</div>
        <!-- end footer_c_list_t -->
        <div class="footer_c_list_c"> <a href="#">1.使用说明</a><br />
          <a href="#">2.接入说明</a> </div>
        <!-- end footer_c_list_c -->
      </div>
      <!-- end footer_c_list -->
      <div class="footer_c_list">
        <div class="footer_c_list_t">爱北航信息</div>
        <!-- end footer_c_list_t -->
        <div class="footer_c_list_c"> <a href="#">1.关于我们</a><br />
          <a href="#">2.加入我们</a><br />
          <a href="#">3.意见提醒</a> </div>
        <!-- end footer_c_list_c -->
      </div>
      <!-- end footer_c_list -->
    </div>
    <!-- end footer_c -->
  </div>
  <!-- end footer -->
  <div class="foot"> ©&nbsp;2013&nbsp;i&nbsp;北航&nbsp;V2.1.1_1&nbsp;-&nbsp;京ICP备05004617<br />
    技术支持&nbsp;北京航空航天大学&nbsp;网络信息中心 </div>
  <!-- end foot -->
</div>
<!-- end container -->
</body>
</html>
<?php ob_out();?>