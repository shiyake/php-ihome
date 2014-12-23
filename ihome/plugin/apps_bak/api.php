<?php if(!defined('iBUAA'))	exit('Access Denied');


if($ac != 'api') {
	showmessage('对不起，没有这个功能！','plugin.php?pluginid=apps');
}

$uid = $_SGLOBAL['supe_uid'];

//是否为公共主页

if($_SGLOBAL['member']['groupid'] != 3){
//	showmessage('您不是公共主页,暂不能申请接入API', 'plugin.php?pluginid=apps');exit;
}

$cp = $_GET['cp'] ? trim($_GET['cp']) : '';

if($cp == 'mod'){
	$id = $_GET['id'] ? trim($_GET['id']) : 0;
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('api')." WHERE id=$id");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$url = $value['url'];
		$appid = $value['appid'];
		$name = $value['name'];
		$fullname = $value['fullname'];
		$intro = $value['intro'];
		$explain = $value['explain'];
	}
}


if(submitcheck('apiapply')) {

	//接收信息
	$url = trim($_POST['url']);
	$appid = trim($_POST['appid']);
	$name = $_POST['name'];
	$fullname = trim($_POST['fullname']);
	$intro = $_POST['intro'];
	$explain = $_POST['explain'];
	$status = 'disable';

	$api_arr = array(
		'name' => $name,
		'appid' => $appid,
		'url' => $url,
		'fullname' => $fullname,
		'intro' => $intro,
		'explain' => $explain,
		'status' => $status
		);
	
	if(!isset($_POST['mod'])){
		$id = inserttable('api',$api_arr,1);
		if($id) {
		//同步至iauth
			if(@include_once(S_ROOT.'./plugin/iauth/IAuthManage.php')){
				IAUTH_new_API( $id, $url, $status );
			}
		}
	}else{
		$id = $_POST['id'];
		$isupdate = updatetable('api' , $api_arr ,array('id'=>$id));
		if($isupdate) {
		//同步至iauth
			if(@include_once(S_ROOT.'./plugin/iauth/IAuthManage.php')){
				IAUTH_edit_API( $id, $url, $status );
			}
		}
	}
}

include_once template("/plugin/apps/api");


?>