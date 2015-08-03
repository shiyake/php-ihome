<?php
$ac = $_GET['ac'];
$showmyrequest = false;
$sql = "SELECT * FROM ".tname("language_user")." WHERE uid=".$_SGLOBAL['supe_uid'];
$query = $_SGLOBAL['db']->query($sql);
while($row = $_SGLOBAL['db']->fetch_array($query)) {
	$showmyrequest = true;
}
# 请求编辑
if($ac == "edit_request") {
	$sql = "SELECT * FROM ".tname("language_user")." WHERE uid = ".$_SGLOBAL['supe_uid'];
	$query = $_SGLOBAL['db']->query($sql);
	$know = $want_to_know = '';
	while($row = $_SGLOBAL['db']->fetch_array($query))	{
		$know = $row['knows'];
		$want_to_know = $row['want_to_know'];
	}
		
	include_once template("/plugin/language_help/template/edit_request");
}
# 发送请求
elseif($ac == 'post_request') {
	if($_POST['known']=="" && $_POST['want_to_know']=="") {
		showmessage("至少写点神马吧~","plugin.php?pluginid=language_help&ac=edit_request");
	}
    $sql = "SELECT * FROM ".tname("language_user")." WHERE uid = ".$_SGLOBAL['supe_uid'];
    $query = $_SGLOBAL['db']->query($sql);
    $fuid = NULL;
    while($row = $_SGLOBAL['db']->fetch_array($query)){
      $fuid = $row['fuid'];
    }
    if($fuid)
	$sql = "REPLACE INTO ".tname("language_user")." (uid,knows,want_to_know,dateline,fuid) VALUES (".$_SGLOBAL['supe_uid'].",'".$_POST['known']."','".$_POST['want_to_know']."','".time()."',".$fuid.")";
    else
        $sql = "REPLACE INTO ".tname("language_user")." (uid,knows,want_to_know,dateline) VALUES (".$_SGLOBAL['supe_uid'].",'".$_POST['known']."','".$_POST['want_to_know']."','".time()."')";

	$query = $_SGLOBAL['db'] -> query($sql);
	if($query) {
		showmessage("信息更新成功，稍等为您跳转到匹配页面","plugin.php?pluginid=language_help&ac=finding");
	}
}
# 我的请求
elseif($ac == 'finding') {
	$sql = "SELECT * FROM ".tname('language_user')." WHERE uid = ".$_SGLOBAL['supe_uid'];
	$query = $_SGLOBAL['db']->query($sql);
    $know = $want_to_know = '';
    $fuid =NULL;
    if($row = $_SGLOBAL['db']->fetch_array($query)) {
		$know = str_replace(" ","，",$row['knows']);
		$want_to_know = str_replace(" ","，",$row['want_to_know']);
        $fuid = $row['fuid'];
    }
    if ($fuid){
        $fsql = "SELECT * FROM ".tname("language_user")." WHERE uid=".$fuid;
        $query = $_SGLOBAL['db']->query($fsql);
        $row = $_SGLOBAL['db']->fetch_array($query);
        $f_know = str_replace(" ","，",$row['knows']);
        $f_want_to_know = str_replace(" ","，",$row['want_to_know']);
		include_once template("/plugin/language_help/template/finding");
    }
	include_once template("/plugin/language_help/template/finding");
}

# 互动请求列表
elseif($ac == 'request_list') {
	$sql = "SELECT * FROM ".tname('language_user')." WHERE uid!=".$_SGLOBAL['supe_uid']." and (fuid is NULL or fuid='')";
	$query = $_SGLOBAL['db']->query($sql);
	$value = array();
	while($row = $_SGLOBAL['db']->fetch_array($query)) {
		$value[] = $row;
	}
	$sql = "SELECT * FROM ".tname("language_user")." where fuid";
	$query = $_SGLOBAL['db']->query($sql);
	$partiners = array();
	while($row = $_SGLOBAL['db']->fetch_array($query)) {
		$partiners[] = $row;
	}
	for($i = 0;$i<count($partiners);$i++) {
		for($j = $i;$j<count($partiners);$j++) {
			if($partiners[$i]['uid']==$partiners[$j]['fuid'] && $partiners[$i]['fuid']==$partiners[$j]['uid']) {
				unset($partiners[$j]);
			}
		}
	}
	include_once template("/plugin/language_help/template/requests");
}
# 向某人发送请求信息
elseif($ac == 'send_request') {
	$can = false;
	$sql = "SELECT * FROM ".tname("language_user")." WHERE uid=".$_SGLOBAL['supe_uid'];
	$query = $_SGLOBAL['db']->query($sql);
	while($row = $_SGLOBAL['db']->fetch_row($query)) {
		$can = true;
	}
	if(!$can) {
		showmessage("请先填写您的请求信息","plugin.php?pluginid=language_help&ac=edit_request");	
	}
	$sql = "SELECT * FROM ".tname("language_help_requests")." WHERE uid=".$_SGLOBAL['supe_uid']." and fuid=".$_GET['fuid']." ORDER BY dateline DESC limit 1";
	$query = $_SGLOBAL['db']->query($sql);
	$flag = 0;

	while($row = $_SGLOBAL['db']->fetch_array($query))	{
		$flag = 1;
		if(time()-$row['dateline']<3600)	{
			showmessage("您向同一用户请求过于频繁，请稍后再试","plugin.php?pluginid=language_help&ac=request_list");	
		}
		else {
			$data = array("uid"=>$_SGLOBAL['supe_uid'],"fuid"=>$_GET['fuid'],"dateline"=>time());
            inserttable("language_help_requests",$data);
            $note =$_SN[$_SGLOBAL['supe_uid']].'给您发来了语言互助请求.请选择 <a href=\\"plugin.php?pluginid=language_help&ac=confirm_request&fuid='.$_SGLOBAL['supe_uid'].'\\">同意</a>或者<a href=\\"plugin.php?pluginid=language_help&ac=refuse_request&fuid='.$_SGLOBAL['supe_uid'].'\\">拒绝</a>';
            notification_add($_GET['fuid'], 'language_help', $note);
			showmessage("请求成功，请耐心等待对方回应结果","plugin.php?pluginid=language_help&ac=request_list");
		}

	}
	if(!$flag) {
	$data = array("uid"=>$_SGLOBAL['supe_uid'],"fuid"=>$_GET['fuid'],"dateline"=>time());
        inserttable("language_help_requests",$data);
        $note =$_SN[$_SGLOBAL['supe_uid']].'给您发来了语言互助请求.请选择 <a href=\\"plugin.php?pluginid=language_help&ac=confirm_request&fuid='.$_SGLOBAL['supe_uid'].'\\">同意</a>或者<a  href=\\"plugin.php?pluginid=language_help&ac=refuse_request&fuid='.$_SGLOBAL['supe_uid'].'\\">拒绝</a>';
         notification_add($_GET['fuid'], 'language_help', $note);
	#	notification_add($_GET['fuid'], 'language_help', $_SN[$_SGLOBAL['supe_uid']]."给您发来了语言互助请求");
		showmessage("请求成功，请耐心等待对方回应结果","plugin.php?pluginid=language_help&ac=request_list");
	}
	exit();
	
}
# 拒绝请求
elseif($ac == 'refuse_request'){
	$sql = "SELECT * FROM ".tname("language_help_requests")." WHERE uid=".$_SGLOBAL['supe_uid']." and fuid=".$_GET['fuid'];
	$query = $_SGLOBAL['db']->query($sql);
	while($row = $_SGLOBAL['db']->fetch_array($query))	{
		$sql = "UPDATE ".tname("language_help_requests")." SET result='refuse' where uid=".$_SGLOBAL['supe_uid']." and fuid=".$_GET['fuid'];
		$_SGLOBAL['db']->query($sql);
	}
	notification_add($_GET['fuid'], 'note', $_SN[$_SGLOBAL['supe_uid']]."拒绝了您的语言互助请求");
     $sql = "DELETE FROM ".tname("notification")." WHERE uid=".$_SGLOBAL['supe_uid']." and type='language_help'";
     $_SGLOBAL['db']->query($sql);
     showmessage("您已拒绝对方语言互助配对请求","space.php?do=notice");
     
}

# 同意请求 
elseif($ac == 'confirm_request'){
	$already = $notexist = false;
    $sql = "SELECT * FROM ".tname("language_user")." WHERE uid=".$_GET['fuid'];
	$query = $_SGLOBAL['db']->query($sql);
    if(!($row = $_SGLOBAL['db']->fetch_array($query))){
        $notexist = true; 
    }
    if($notexist){
        $sql = "DELETE FROM ".tname("notification")." WHERE uid=".$_SGLOBAL['supe_uid']." and type='language_help'";
        $_SGLOBAL['db']->query($sql);
        showmessage("对不起，对方已取消语言互助配对","space.php?do=notice");
    }
	$sql = "SELECT * FROM ".tname("language_user")." WHERE fuid=".$_GET['fuid'];
	$query = $_SGLOBAL['db']->query($sql);
	while($row = $_SGLOBAL['db']->fetch_array($query)) {

		$already = true;
	}	
	if($already) {
         $sql = "DELETE FROM ".tname("notification")." WHERE uid=".$_SGLOBAL['supe_uid']." and type='language_help'";
         $_SGLOBAL['db']->query($sql);

		showmessage("对方已经完成配对，若要配对请选择其他人","space.php?do=notice");
	}
    
	$sql = "SELECT * FROM ".tname("language_help_requests")." WHERE uid=".$_GET['fuid']." and fuid=".$_SGLOBAL['supe_uid'];

	$query = $_SGLOBAL['db']->query($sql);
	while($row = $_SGLOBAL['db']->fetch_array($query))	{
		$sql = "UPDATE ".tname("language_help_requests")." SET result='pass' where fuid=".$_SGLOBAL['supe_uid']." and uid=".$_GET['fuid'];
		$_SGLOBAL['db']->query($sql);
		$sql = "UPDATE ".tname("language_user")." SET fuid=".$_GET['fuid']." WHERE uid=".$_SGLOBAL['supe_uid'];
		$_SGLOBAL['db']->query($sql);
		$sql = "UPDATE ".tname("language_user")." SET fuid=".$_SGLOBAL['supe_uid']." WHERE uid=".$_GET['fuid'];
		$_SGLOBAL['db']->query($sql);		
	}
	$sql = "DELETE FROM ".tname("notification")." WHERE uid=".$_SGLOBAL['supe_uid']." and type='language_help'";
	$_SGLOBAL['db']->query($sql);
	notification_add($_GET['fuid'], 'note', $_SN[$_SGLOBAL['supe_uid']]."同意了您的语言互助请求");
	showmessage("您已同意对方语言互助配对请求","plugin.php?pluginid=language_help&ac=request_list");
}
# 取消中外语言互助
elseif($ac == 'cancel_me') {
	$sql = "DELETE FROM ".tname("language_user")." WHERE uid=".$_SGLOBAL['supe_uid'];
	$_SGLOBAL['db']->query($sql);
    $sql = "DELETE FROM ".tname("notification")." WHERE uid=".$_SGLOBAL['supe_uid']." and type='language_help'";
    $_SGLOBAL['db']->query($sql);
    $sql = "UPDATE ".tname("language_user")." SET fuid=NULL WHERE fuid= ".$_SGLOBAL['supe_uid'];
    $_SGLOBAL['db']->query($sql);
	showmessage("您已取消中外语言互助","plugin.php?pluginid=language_help&ac=request_list");
}
# 取消配对
elseif($ac == 'cancel')	{
	$sql = "SELECT * FROM ".tname("language_user")." WHERE uid=".$_SGLOBAL['supe_uid'];
	$query = $_SGLOBAL['db']->query($sql);
	while($row = $_SGLOBAL['db']->fetch_array($query)) {
		$sql = "UPDATE ".tname("language_user")." SET fuid=NULL WHERE uid=".$row['fuid'];
		$_SGLOBAL['db']->query($sql);
		$sql = "UPDATE ".tname("language_user")." SET fuid=NULL WHERE uid=".$_SGLOBAL['supe_uid'];
		$_SGLOBAL['db']->query($sql);
		notification_add($row['fuid'], 'note', $_SN[$_SGLOBAL['supe_uid']]."取消了与您的语言互助");
		showmessage("取消配对成功","plugin.php?pluginid=language_help&ac=finding");
	}
	

}
elseif($ac == 'share') {
	$sql = "SELECT * FROM ".tname("language_user")." WHERE uid=".$_SGLOBAL['supe_uid'];
	$query = $_SGLOBAL['db']->query($sql);
	while($row = $_SGLOBAL['db']->fetch_array($query)) {
		$s = '<div class="part-container"><div class="pull-left clearfix"><div class="part-avatar-container">'.avatar($_SGLOBAL['supe_uid'],'middle').'</div><div class="part-name"><a href="space.php?uid='.$_SGLOBAL['supe_uid'].'">'.getUsername($_SGLOBAL['supe_uid'],$_SGLOBAL['db']).'</a></div></div><div class="pull-right clearfix"><div class="part-avatar-container">'.avatar($row['fuid'],'middle').'</div><div class="part-name"><a href="space.php?uid='.$row['fuid'].'">'.getUsername($row['fuid'],$_SGLOBAL['db']).'</a></div></div></div>';
		$arr = array("type"=>"doing","uid"=>$row['uid'],"username"=>$_SGLOBAL['supe_username'],"dateline"=>time(),"id"=>0,"title_template"=>getUsername($row['uid'],$_SGLOBAL['db'])."与".getUsername($row['fuid'],$_SGLOBAL['db'])."达成语言互助关系","body_template"=>$s,"body_data"=>"","body_general"=>"","image"=>"","image_link"=>"","hot"=>0,"hotuser"=>"","fromdevice"=>"");
		$setarr = saddslashes($arr);
		$sid = inserttable("share",$setarr,1);
		
		require_once('source/function_feed.php');
		feed_publish($sid,'sid',0,'');
	}
	showmessage("动态已成功分享",'index.php');
}
?>
