<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('/plugin/apps/apply|plugin/apps/header|plugin/apps/left|plugin/apps/right_nav|plugin/apps/footer', '1381737595', '/plugin/apps/apply');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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
            <script type="text/javascript">
$(function(){
$(".yingyong_c span>a:first").addClass("tabActive");
$(".yingyong_c ul").not(":first").hide();
$(".yingyong_c span>a").unbind("click").bind("click", function(){
$(this).siblings("a").removeClass("tabActive").end().addClass("tabActive");
var index = $(".yingyong_c span>a").index( $(this) );
$(".yingyong_c ul").eq(index).siblings(".yingyong_c ul").hide().end().fadeIn("fast");
   });
   
   
   $("#WSC").click(function(){
$("#for_rp").show();
$("#for_wsc").show();
});
$("#UAC").click(function(){
$("#for_rp").show();
$("#for_wsc").hide();
});
$("#RP").click(function(){
$("#for_rp").hide();
});


});
function isexist(id){
var names = $("#"+id).val();
$.post("plugin.php?pluginid=apps&ac=apply&ajax=1",{name:names},
function(data){
if(data!=0){
alert('该名称已存在~!');
$("#"+id).focus();
}
});
}
</script>

            <div class="yingyong_c">
            
<span class="yingyong_tab clear">
<a href="javascript:" class="margin_left_100">校内应用</a>
                    <a href="javascript:">第三方应用</a>
                </span><!-- end yingyong_tab -->

                <ul>
                    <div class="yingyong_req">
<form id="app-apply" class="form-horizontal" action="plugin.php?pluginid=apps&ac=apply" method="post" enctype="multipart/form-data">
                        <div class="yingyong_t">校内应用</div><!-- end yingyong_t -->
                        <div class="clear height_10"></div>
                        
                        <div class="left inline width_100 text_align_right">应用名称&nbsp;&nbsp;</div>
                        <div class="left"><input type="text" id="name1" onblur="isexist('name1')" name="name" style="width:220px;" class="border_input">&nbsp;&nbsp;&nbsp;&nbsp;少于20字</div>
                        <div class="clear height_10"></div>
                        
                        <div class="left inline width_100 text_align_right">应用LOGO&nbsp;&nbsp;</div>
                        <div class="left"><input  type="file" name="logo" id="logo" style="border:none;" >120*120像素的图片</div>
                        <div class="clear height_10"></div>
                        
<div class="left inline width_100 text_align_right">应用网址&nbsp;&nbsp;</div>
                        <div class="left"><input type="text" id="url" name="url" style="width:220px;" class="border_input"></div>
                        <div class="clear height_10"></div>

<div class="left inline width_100 text_align_right">所属类别&nbsp;&nbsp;</div>
                        <div class="left">
<select name="type">
  <option selected="selected" value="0">请选择</option>
  <option value="1">教学类</option>
  <option value="2">科研类</option>
  <option value="3">财务类</option>
  <option value="4">人力资源类</option>
  <option value="5">资产类</option>
  <option value="6">生活服务类</option>
  <option value="7">其他</option>
</select>
                        </div>
                        <div class="clear height_10"></div>

<div class="left inline width_100 text_align_right">适用对象&nbsp;&nbsp;</div>
                        <div class="left">
                            <label><input type="checkbox" name="undergraduate" value ="1" >本科生</label>
<label><input type="checkbox" name="postgraduate" value ="1" >研究生</label>
<label><input type="checkbox" name="teacher" value ="1" >教职工</label>
<label><input type="checkbox" name="alumnus" value ="1" >校友</label>
                        </div>
                        <div class="clear height_10"></div>

                        <div class="left inline width_100 text_align_right">应用描述&nbsp;&nbsp;</div>
                        <div class="left">
                            <textarea id="desc"  name="desc" style="width:220px;" rows="4" class="border_input"></textarea>
                            &nbsp;&nbsp;&nbsp;不超过220字
                        </div>
                        <div class="clear height_10"></div>
                        
                        <div class="neirong_5">
                            <input type="hidden" name="category" value="1" />
<input type="hidden" name="appsapply" value="true" />
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<input type="submit" id="submit" name="submit" value="提交" class="neirong_submit">
                        </div>
                        <div class="clear height_10"></div>
                        
                     </form>  
                    </div><!-- end yingyong_req -->
                </ul>
                <ul>
                    <div class="yingyong_req">
<form id="app-apply" class="form-horizontal" action="plugin.php?pluginid=apps&ac=apply" method="post" enctype="multipart/form-data">
                        <div class="yingyong_t">第三方应用</div><!-- end yingyong_t -->
                        <div class="clear height_10"></div>

                        <div class="left inline width_100 text_align_right">接入类型&nbsp;&nbsp;</div>
                        <div class="left">
<label>
<input type="radio" name="iauthtype" id="WSC" checked class="iauthtype-bt" action-for="for_WSC" value="WSC" />
Web Site Client</label>
<label>
<input type="radio" name="iauthtype" id="UAC" class="iauthtype-bt" action-for="for_UAC" value="UAC" />
User Agent Client</label>
<label>
<input type="radio" name="iauthtype" id="RP" class="iauthtype-bt" action-for="for_RP" value="RP" />
Resource Provider</label>
</div>
                        <div class="clear height_10"></div>

                        <div class="left inline width_100 text_align_right">应用中文名称&nbsp;&nbsp;</div>
                        <div class="left"><input type="text" id="name3" onblur="isexist('name3')" name="name" style="width:220px;" class="border_input">&nbsp;&nbsp;&nbsp;&nbsp;不超过20字</div>
                        <div class="clear height_10"></div>

<div class="left inline width_100 text_align_right">应用英文简称&nbsp;&nbsp;</div>
                        <div class="left"><input type="text" id="iauth_name" onblur="isexist('iauth_name')" name="iauth_name" style="width:220px;" class="border_input">数字,字母,下划线组成,少于48字符</div>
                        <div class="clear height_10"></div>

                        <div id="for_rp">
                        <div class="left inline width_100 text_align_right">应用LOGO&nbsp;&nbsp;</div>
                        <div class="left"><input  type="file" name="logo" id="logo" style="border:none;" >120*120像素的图片</div>
                        <div class="clear height_10"></div>
                        
<div id="for_wsc">
<div class="left inline width_100 text_align_right">会话初始化网址</div>
                        <div class="left"><input type="text" id="url" name="url" style="width:220px;" class="border_input"></div>
                        <div class="clear height_10"></div>

<div class="left inline width_100 text_align_right">授权回调网址&nbsp;&nbsp;</div>
                        <div class="left"><input type="text" id="back_url" name="back_url" style="width:220px;" class="border_input"></div>
                        <div class="clear height_10"></div>

<div class="left inline width_100 text_align_right">登录回调网址 &nbsp;&nbsp;</div>
                        <div class="left"><input type="text" id="app_url" name="app_url" style="width:220px;" class="border_input"></div>
                        <div class="clear height_10"></div>
</div>

<div class="left inline width_100 text_align_right">所属类别&nbsp;&nbsp;</div>
                        <div class="left">
<select name="type">
  <option selected="selected" value="0">请选择</option>
  <option value="1">教学类</option>
  <option value="2">科研类</option>
  <option value="3">财务类</option>
  <option value="4">人力资源类</option>
  <option value="5">资产类</option>
  <option value="6">生活服务类</option>
  <option value="7">其他</option>
</select>
                        </div>
                        <div class="clear height_10"></div>

<div class="left inline width_100 text_align_right">适用对象&nbsp;&nbsp;</div>
                        <div class="left">
                            <label><input type="checkbox" name="undergraduate" value ="1" >本科生</label>
<label><input type="checkbox" name="postgraduate" value ="1" >研究生</label>
<label><input type="checkbox" name="teacher" value ="1" >教职工</label>
<label><input type="checkbox" name="alumnus" value ="1" >校友</label>
                        </div>
                        <div class="clear height_10"></div>

<div class="left inline width_100 text_align_right">所需API&nbsp;&nbsp;</div>
                        <div class="left">
                            <?php if($apis) { ?>
<?php if(is_array($apis)) { foreach($apis as $api) { ?>
<label><input type="checkbox" name="apis" onclick="getapi()" value="<?=$api['id']?>" /><?=$api['name']?></label><br />
<?php } } ?>
<?php } ?>
<input type="hidden" name="api" id="api" value="" />
<script>
function getapi(){
var api_value = '0';    
$('input[name="apis"]:checked').each(function(){    
api_value += ',' + $(this).val();    
});
$("#api").val(api_value);
}
</script>
                        </div>
                        <div class="clear height_10"></div>
</div>
                        <div class="left inline width_100 text_align_right">应用描述&nbsp;&nbsp;</div>
                        <div class="left">
                            <textarea id="desc"  name="desc" style="width:220px;" rows="4" class="border_input"></textarea>
                            &nbsp;&nbsp;&nbsp;不超过220字
                        </div>
                        <div class="clear height_10"></div>
                        
                        <div class="neirong_5">
                            <input type="hidden" name="category" value="3" />
<input type="hidden" name="appsapply" value="true" />
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<input type="submit" id="submit" name="submit" value="提交" class="neirong_submit">
                        </div>
                        <div class="clear height_10"></div>
                        
                     </form>  
                    </div><!-- end yingyong_req -->
                </ul>                
            </div><!-- end yingyong_c -->
            
        </div><!-- end yingyong_right -->
    </div><!-- end main -->

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