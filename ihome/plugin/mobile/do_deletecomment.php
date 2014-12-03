<?php
/*
     deletecomment.php删除评论
     Add by am@ihome.2012-10-19  09:44

*/
    include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
	@include_once(S_ROOT.'./data/data_profield.php');
	include_once('do_mobileverify.php');
	$id =intval($_POST['id']);
	
    $allowmanage = checkperm('managedoing');
	$query = $_SGLOBAL['db']->query("SELECT dc.*, d.uid as duid FROM ".tname('docomment')." dc, ".tname('doing')." d WHERE dc.id='$id' AND dc.doid=d.doid");
		if($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($allowmanage || $value['uid'] == $_SGLOBAL['supe_uid'] || $value['duid'] == $_SGLOBAL['supe_uid'] ) {
					//更新内容
				$up=updatetable('docomment', array('uid'=>0, 'username'=>'', 'message'=>''), array('id'=>$id));
				if($value['uid'] != $_SGLOBAL['supe_uid'] && $value['duid'] != $_SGLOBAL['supe_uid']) {
						//扣除积分
					getreward('delcomment', 1, $value['uid']);
				}
			}
		}
	if($up){
	$arrs = array('flag'=>'success');
	}else{
	$arrs = array('flag'=>'fail');
	}
	   $result = json_encode($arrs);
	   $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
    exit();
	
	
	
	
	
	
?>