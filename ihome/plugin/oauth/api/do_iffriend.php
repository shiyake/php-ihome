<?
/*
     iffriend.php查看是否是好友
     Add by am@ihome.2012-10-19  09:55

*/  
    include_once('../data_oauth_check.php');
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');
	include_once(S_ROOT.'./data/data_profield.php');	
    $userid = intval(oauth_check());
	$uid =intval($_POST['uid']);
    
	$result = array();
	
	$result = $_SGLOBAL['db']->query("select friend from ".tname('spacefield')." where uid='$userid'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$topiclist[] = $value;
					}
	
	
	$Friend = $value[friend];
	
	if(in_array($uid,$Friend)){
	$arrs = array('flag'=>'success');
	$result = json_encode($arrs);
	$result = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	  echo $result;
	}else{
	  echo 'faild';
	}
	

	
	
	
	
	
	
	
?>