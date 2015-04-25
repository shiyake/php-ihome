<?php if(!defined('iBUAA'))	exit('Access Denied');


if($ac != 'apply') {
	showmessage('对不起，没有这个功能！','plugin.php?pluginid=apps');
}

$uid = $_SGLOBAL['supe_uid'];

//是否为公共主页

if($_SGLOBAL['member']['groupid'] != 3){
	//showmessage('您不是公共主页,暂不能申请接入应用', 'plugin.php?pluginid=apps');exit;
}
if($_GET['ajax']){
	$name = trim($_POST['name']);
	$query = $_SGLOBAL['db']->query("SELECT id FROM ".tname('apps')." WHERE name='$name'");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		echo $value['id'];
		exit;
	}else{
		echo 0;
		exit;
	}
}
if(submitcheck('appsapply')) {

	$id = $_POST['id'] ? $_POST['id'] : '0';
	$category = $_POST['category'];
	$logo = '';
	$name = trim($_POST['name']);
	$iauth_name = trim($_POST['iauth_name']);
	$url = trim($_POST['url']);
	$type = intval($_POST['type']);
	$desc = $_POST['desc'] ? $_POST['desc'] : '';
	$log = '['.date('Y-m-d H:i').']'.$_POST['log'].'||'.$_POST['logs'];
	$desc = stripslashes($desc);
	$offline = intval($_POST['offline']);
	$app_url = $_POST['app_url'] ? $_POST['app_url'] : '';
	$back_url = $_POST['back_url'] ? $_POST['back_url'] : '';
	//使用对象
	$undergraduate = isset($_POST['undergraduate']) ? intval($_POST['undergraduate']) : 0;
	$postgraduate = isset($_POST['postgraduate']) ? intval($_POST['postgraduate']) : 0;
	$teacher = isset($_POST['teacher']) ? intval($_POST['teacher']) : 0;
	$alumnus = isset($_POST['alumnus']) ? intval($_POST['alumnus']) : 0;
	//二进制形式
	$usertype = $undergraduate.$postgraduate.$teacher.$alumnus;
	//转换为十进制形式
	$usertype = bindec($usertype);
	
	//以下信息是自动完成
	$applypass = 0;
	$applyuid = $_SGLOBAL['supe_uid'];
	$applytime = time();
	$applyip = getonlineip();
	$email = $_SGLOBAL['member']['email'];

	$name = getstr($name, 30, 1, 1, 1);

	//接收图片流:在这之前要验明$name的正身
	if($_FILES['logo']['tmp_name']){
		$pic = pic_save($_FILES['logo'], -1, $name);
		if(is_array($pic) && $pic['filepath']){
			$logo = $pic['filepath'];
		}
	}
	
	if($category==3){
		$useapi = $_POST['api'];
		$iauth_type = $_POST['iauthtype'];
	}else{
		$useapi = '';
		$iauth_type = '';
	}
		
		
	
	//插入数据库
	$applyarr = array(
		'name' => $name,
		'iauth_name' => $iauth_name,
		'desc' => $desc,
		'log' => $log,
		'offline' => $offline,
		'url' => $url,
		'app_url' => $app_url,
		'back_url' => $back_url,
		'category' => $category,
		'iauth_type' => $iauth_type,
		'usertype' => $usertype,
		'status' => 'disable',
		'ishidden' => 1,
		'type' => $type,
		'useapi' => $useapi,
		'applypass' => $applypass,
		'applyuid' => $applyuid,
		'applytime' => $applytime,
		'applyip' => $applyip
		);
		
	if($logo)$applyarr['logo'] = $logo;
	
	if($id){
		unset($applyarr['applytime']);
		updatetable('apps', $applyarr, array('id'=>$id));
	}else{
		$id = inserttable('apps',$applyarr,1);
	}
	
	$isOK = FALSE;
	if($id) {
		$isOK = TRUE;
		if($iauth_type == 'RP'){
			$app_id = $id;
			$api_name = trim($_POST['api_name']);
			$api_url = trim($_POST['api_url']);
			$fullname = trim($_POST['fullname']);
			$intro = $_POST['intro'];
			$explain = $_POST['explain'];
			
			$api_arr = array(
				'appid' => $app_id,
				'name' => $api_name,
				'fullname' => $fullname,
				'url' => $api_url,
				'intro' => $intro,
				'explain' => $explain,
				'status' => 'disable'
			);
			$api_id = inserttable('api',$api_arr,1);
			
			if(!$api_id){
				$_SGLOBAL['db']->query("DELETE FROM ".tname('apps')." WHERE id=$id");
				$isOK = FALSE;
			}
		}
	}
	if($isOK)
		showmessage('应用提交成功,请耐心等待管理员审核~!',"plugin.php?pluginid=apps",3);
	else
		showmessage('应用提交失败,请联系管理员~!',"plugin.php?pluginid=apps",3);
}

if($id = $_GET['id']){
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')." WHERE id='$id'");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		$appdetail = $value;
	}else{
		showmessage('参数错误,不存在该应用',"plugin.php?pluginid=apps&ac=mylist",3);
	}
}


$apis = array();
$query = $_SGLOBAL['db']->query("SELECT id,iauthAPIid,name FROM ".tname('api'));
while($value = $_SGLOBAL['db']->fetch_array($query)) {
	$apis[] = $value;
}

if($id){
	include_once template("/plugin/apps/applymod");
}else{
	include_once template("/plugin/apps/apply");
}



?>
