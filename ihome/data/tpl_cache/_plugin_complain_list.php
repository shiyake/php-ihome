<?php if(!defined('iBUAA')) exit('Access Denied');?><?php subtplcheck('/plugin/complain/list|plugin/complain/header|plugin/complain/footer', '1381308098', '/plugin/complain/list');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="i北航">
<link rel="shortcut icon" href="favicon.ico">
<title>i 北航</title>
<link href="plugin/complain/css/style2.css" rel="stylesheet" type="text/css" />
<link href="plugin/complain/css/reset.css" rel="stylesheet" type="text/css" />
<link href="plugin/complain/css/color.css" rel="stylesheet" type="text/css" />
<link href="plugin/complain/css/layout.css" rel="stylesheet" type="text/css" />
<link href="plugin/complain/css/style.css" rel="stylesheet" type="text/css" />
<link href="plugin/complain/css/yingyong.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="plugin/complain/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="plugin/complain/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugin/complain/js/ihome_dialog.js"></script>
<script type="text/javascript" src="plugin/complain/js/touming.js"></script>
<script type="text/javascript" src="plugin/complain/js/pie.js"></script>
<script language="javascript" type="text/javascript" src="plugin/complain/js/My97DatePicker/WdatePicker.js"></script>
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

<div class="complain_tabs">
<span<?=$actives['0']?>><a href="plugin.php?pluginid=complain&type=baseinfo">基本信息</a></span>
<span<?=$actives['1']?>><a href="plugin.php?pluginid=complain&type=complains">诉求记录</a></span>
</div>
<style type="text/css">
.complain_tabs{line-height:30px;margin:30px 0 0 0;font-size:16px;}
.complain_tabs span{margin:0 0 0 15px;padding:5px;background: none repeat scroll 0 0 #FCF9E6;}
.active{background:#FF8E00 !important; font-weight:blod;}
th {
text-align: right;
}
.listtable th{
text-align: center;
}
.listtable td{
text-align: center;
}
.listtable tr:hover{ 
/*background-color:#A2F4A2 !important;*/
}
.listtable a{
color:#000000;
}
</style>  
<script>
$(function(){
 $(".listtable tr:odd").css("background-color","#FCF9E6");
 $(".listtable tr:even").css("background-color","#d0e7fc");
});
</script>
<?php if($type=='complains') { ?>
<div style="padding: 1em; border: 1px solid #FF8E00; zoom: 1; margin:20px 0 0 0;">
<form id="from1" method="get" action="plugin.php?pluginid=complain&type=complains">
<div class="block style4">
  <table width="750" height="123" cellpadding="3" cellspacing="3" style="margin:0 auto;">
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
  <input type="hidden" name="type" value="complains">
  <input type="hidden" name="pluginid" value="complain">
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
  <th>姓名</th>
  <th>诉求信息</th>
  <th>发起时间</th>
  <th>处理阶段</th>
  <th>处理状况</th>
</tr>
<?php if(is_array($Complains)) { foreach($Complains as $key=>$value) { ?>
<tr>
  <td style="width:110px;"><a href=space.php?uid=<?=$value['uid']?>><?=$_SN[$value['uid']]?></a></td>
  <td style=""><?=$value['message']?></td>
  <td style="width:125px;"><?=$value['addtime']?></td>
  <td style="width:160px;"><a href=space.php?uid=<?=$value['atuid']?>><?=$value['atuname']?></a></td>
  <td style="width:60px;"><a href="space.php?do=doing&doid=<?=$value['doid']?>" target="_blank"><?php if($value['isreply'] == '0') { ?>未回复<?php } else { ?>已回复<?php } ?></a></td>
</tr>
<?php } } ?>
  </tbody>
</table>
</div>
<div class="footactions">
<div class="pages"><?=$multi?></div>
</div>
<?php } else { ?>
<div style="padding: 1em; border: 1px solid #FF8E00; zoom: 1; margin:20px 0 0 0;">
<form id="from1" method="get" action="plugin.php?pluginid=complain&type=baseinfo">
<div class="block style4">
  <table width="750" height="123" cellpadding="3" cellspacing="3" style="margin:0 auto;">
<tr>
  <th>处理阶段</th>
  <td>
  <select name="times">
<option value="0">请选择</option>
<option value="1">部处</option>
<option value="3">处长</option>
<option value="7">副校长</option>
<option value="10">校长</option>
  </select>
  </td>
  <th>起止时间</th>
  <td>
  <input class="Wdate" name="starttime" id="starttime" type="text" onClick="WdatePicker({startDate:'%y-%M-%d',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true})" value="<?=$startDay?>">~
  <input class="Wdate" name="endtime" id="endtime" type="text" onClick="WdatePicker({startDate:'%y-%M-%d',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true})" value="<?=$endDay?>">
  </td>
</tr>
<tr>
  <td colspan="4" style="text-align:center;">
  <input type="hidden" name="type" value="baseinfo">
  <input type="hidden" name="pluginid" value="complain">
  <input type="submit" name="submit" value="搜索" class="submit">
  </td>
</tr>
  </table>
</div>
</form>
</div>
<div class="bdrcontent">
<div class="title">
<h3>从 <?=$startDay?> 到 <?=$endDay?> ，总共 <font color="#FF0000"><?=$totalNum?></font> 条诉求，已处理 <font color="#FF0000"><?=$isreplyNum?></font> 条</h3>
</div>
<table cellspacing="2" cellpadding="2" class="listtable">
  <tbody>
<tr class="line">
  <th>单位UID</th>
  <th>单位名称</th>
  <th>诉求总数</th>
  <th>已处理数量</th>
  <th>操作</th>
</tr>
<?php if(is_array($complains)) { foreach($complains as $value) { ?>
<tr>
  <td><?=$value['atdeptuid']?></td>
  <td><?=$value['department']?></td>
  <td><?=$value['total']?></td>
  <td><?=$value['isreply']?></td>
  <td>
  <a href="plugin.php?pluginid=complain&message=<?=$value['department']?>&isreply=3&type=complains">详情</a>
  </td>
</tr>
<?php } } ?>
  </tbody>
</table>
</div>
<?php } ?>
  
  
  <div style="text-align:center; padding-top:10px;">
<img src="plugin/complain/images/ciyun.jpg" />
  </div>
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