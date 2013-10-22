<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('/plugin/apps/foru|plugin/apps/header|plugin/apps/left|plugin/apps/right_nav|plugin/apps/footer', '1381737581', '/plugin/apps/foru');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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
<?php if($allapps) { ?>
    <div class="yingyong_c">
      <div class="yingyong_c_t">
        <div class="left inline">
          <h2>所有应用</h2>
        </div>
        <div class="right"></div>
      </div>
      <!-- end ynigyong_c_t -->
  <?php if(is_array($allapps)) { foreach($allapps as $app) { ?>
      <div class="yy_list">
        <div class="gezi">
<?php if($app['usertype'] & 8) { ?>
<div class="yy_green"></div>
<?php } ?>
<?php if($app['usertype'] & 4) { ?>
<div class="yy_yellow"></div>
<?php } ?>
<?php if($app['usertype'] & 2) { ?>
<div class="yy_red"></div>
<?php } ?>
<?php if($app['usertype'] & 1) { ?>
<div class="yy_blue"></div>
<?php } ?>
        </div>
        <!-- end gezi -->
        <div class="yy_list_img_2"><a href="plugin.php?pluginid=apps&ac=detail&appsid=<?=$app['id']?>" target="_blank"><img src="<?=$app['logo']?>" title="<?=$app['name']?>" /></a></div>
        <div class="yy_list_c_2"><a href="plugin.php?pluginid=apps&ac=detail&appsid=<?=$app['id']?>" target="_blank"><?=$app['name']?></a>
          <div class="yy_list_c_x"><span class="score_star" id="allapps_app_<?=$app['id']?>"></span><span class="score_num"><?=$app['score']?></span></div>
          <div class="yy_info_2">使用次数:<?=$app['clicktime']?>次<br />
            授权人数:<?=$app['usernumber']?>人</div>
          <!-- end yy_info -->
        </div>
        <!-- end yy_list_c -->
      </div>
      <!-- end yy_list -->
  <?php } } ?>
      <div class="clear"></div>
    </div>
    <!-- end yingyong_c -->
<?php } ?>
<?php if($myfavorite) { ?>
    <div class="yingyong_c">
      <div class="yingyong_c_t">
        <div class="left inline">
          <h2>我最常用</h2>
        </div>
        <div class="right"></div>
      </div>
      <!-- end ynigyong_c_t -->
  <?php if(is_array($myfavorite)) { foreach($myfavorite as $app) { ?>
      <div class="yy_list">
        <div class="gezi">
<?php if($app['usertype'] & 8) { ?>
<div class="yy_green"></div>
<?php } ?>
<?php if($app['usertype'] & 4) { ?>
<div class="yy_yellow"></div>
<?php } ?>
<?php if($app['usertype'] & 2) { ?>
<div class="yy_red"></div>
<?php } ?>
<?php if($app['usertype'] & 1) { ?>
<div class="yy_blue"></div>
<?php } ?>
        </div>
        <!-- end gezi -->
        <div class="yy_list_img_2"><a href="plugin.php?pluginid=apps&ac=detail&appsid=<?=$app['id']?>" target="_blank"><img src="<?=$app['logo']?>" title="<?=$app['name']?>" /></a></div>
        <div class="yy_list_c_2"><a href="plugin.php?pluginid=apps&ac=detail&appsid=<?=$app['id']?>" target="_blank"><?=$app['name']?></a>
          <div class="yy_list_c_x"><span class="score_star" id="myfavorite_app_<?=$app['id']?>"></span><span class="score_num"><?=$app['score']?></span></div>
          <div class="yy_info_2">使用次数:<?=$app['clicktime']?>次<br />
            授权人数:<?=$app['usernumber']?>人</div>
          <!-- end yy_info -->
        </div>
        <!-- end yy_list_c -->
      </div>
      <!-- end yy_list -->
  <?php } } ?>
      <div class="clear"></div>
    </div>
    <!-- end yingyong_c -->
<?php } ?>
    <?php if($hot) { ?>
    <div class="yingyong_c">
      <div class="yingyong_c_t">
        <div class="left inline">
          <h2>热门应用</h2>
        </div>
        <div class="right"></div>
      </div>
      <!-- end ynigyong_c_t -->
  <?php if(is_array($hot)) { foreach($hot as $app) { ?>
      <div class="yy_list">
        <div class="gezi">
<?php if($app['usertype'] & 8) { ?>
<div class="yy_green"></div>
<?php } ?>
<?php if($app['usertype'] & 4) { ?>
<div class="yy_yellow"></div>
<?php } ?>
<?php if($app['usertype'] & 2) { ?>
<div class="yy_red"></div>
<?php } ?>
<?php if($app['usertype'] & 1) { ?>
<div class="yy_blue"></div>
<?php } ?>
        </div>
        <!-- end gezi -->
        <div class="yy_list_img_2"><a href="plugin.php?pluginid=apps&ac=detail&appsid=<?=$app['id']?>" target="_blank"><img src="<?=$app['logo']?>" title="<?=$app['name']?>" /></a></div>
        <div class="yy_list_c_2"><a href="plugin.php?pluginid=apps&ac=detail&appsid=<?=$app['id']?>" target="_blank"><?=$app['name']?></a>
          <div class="yy_list_c_x"><span class="score_star" id="hot_app_<?=$app['id']?>"></span><span class="score_num"><?=$app['score']?></span></div>
          <div class="yy_info_2">使用次数:<?=$app['clicktime']?>次<br />
            授权人数:<?=$app['usernumber']?>人</div>
          <!-- end yy_info -->
        </div>
        <!-- end yy_list_c -->
      </div>
      <!-- end yy_list -->
  <?php } } ?>
      <div class="clear"></div>
    </div>
    <!-- end yingyong_c -->
<?php } ?>
    <?php if($popular) { ?>
    <div class="yingyong_c">
      <div class="yingyong_c_t">
        <div class="left inline">
          <h2>得分最高</h2>
        </div>
        <div class="right"></div>
      </div>
      <!-- end ynigyong_c_t -->
  <?php if(is_array($popular)) { foreach($popular as $app) { ?>
      <div class="yy_list">
        <div class="gezi">
<?php if($app['usertype'] & 8) { ?>
<div class="yy_green"></div>
<?php } ?>
<?php if($app['usertype'] & 4) { ?>
<div class="yy_yellow"></div>
<?php } ?>
<?php if($app['usertype'] & 2) { ?>
<div class="yy_red"></div>
<?php } ?>
<?php if($app['usertype'] & 1) { ?>
<div class="yy_blue"></div>
<?php } ?>

        </div>
        <!-- end gezi -->
        <div class="yy_list_img_2"><a href="plugin.php?pluginid=apps&ac=detail&appsid=<?=$app['id']?>" target="_blank"><img src="<?=$app['logo']?>" title="<?=$app['name']?>" /></a></div>
        <div class="yy_list_c_2"><a href="plugin.php?pluginid=apps&ac=detail&appsid=<?=$app['id']?>" target="_blank"><?=$app['name']?></a>
          <div class="yy_list_c_x"><span class="score_star" id="popular_app_<?=$app['id']?>"></span><span class="score_num"><?=$app['score']?></span></div>
          <div class="yy_info_2">使用次数:<?=$app['clicktime']?>次<br />
            授权人数:<?=$app['usernumber']?>人</div>
          <!-- end yy_info -->
        </div>
        <!-- end yy_list_c -->
      </div>
      <!-- end yy_list -->
  <?php } } ?>
      <div class="clear"></div>
    </div>
    <!-- end yingyong_c -->
<?php } ?>
<link href="plugin/apps/css/star.css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="plugin/apps/js/star_small.js"></script>
<script type="text/javascript">
<?php if(is_array($allapps)) { foreach($allapps as $key=>$app) { ?>
var allapps_options_<?=$app['id']?> = {
value : <?=$app['score']?>,
enabled : false
}
$('#allapps_app_<?=$app['id']?>').rater(allapps_options_<?=$app['id']?>);
<?php } } ?>
<?php if(is_array($myfavorite)) { foreach($myfavorite as $key=>$app) { ?>
var myfavorite_options_<?=$app['id']?> = {
value : <?=$app['score']?>,
enabled : false
}
$('#myfavorite_app_<?=$app['id']?>').rater(myfavorite_options_<?=$app['id']?>);
<?php } } ?>
<?php if(is_array($hot)) { foreach($hot as $key=>$app) { ?>
var hot_options_<?=$app['id']?> = {
value : <?=$app['score']?>,
enabled : false
}
$('#hot_app_<?=$app['id']?>').rater(hot_options_<?=$app['id']?>);
<?php } } ?>
<?php if(is_array($popular)) { foreach($popular as $key=>$app) { ?>
var popular_options_<?=$app['id']?> = {
value : <?=$app['score']?>,
enabled : false
}
$('#popular_app_<?=$app['id']?>').rater(popular_options_<?=$app['id']?>);
<?php } } ?>
</script>
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