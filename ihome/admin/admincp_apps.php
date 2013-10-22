<?php if(!defined('iBUAA') || !defined('IN_ADMINCP')) exit('Access Denied');

if(!checkperm('managepublic')) {
	cpmessage('no_authority_management_operation');
}


$type = $_GET['type'] ? trim($_GET['type']) : 'appslist';
$page = $_GET['page'] ? trim($_GET['page']) : '1';
$op = $_GET['op'] ? trim($_GET['op']) : '';


if($type == 'api'){
	$tab = 2;
	
	if($op == 'mod'){
		$url = '';
		$id = $_GET['id'];
		$api_arr['status'] = $_GET['status'];
		$isupdate = updatetable('api' , $api_arr ,array('id'=>$id));
		if(@include_once(S_ROOT.'./plugin/iauth/IAuthManage.php')){
			IAUTH_edit_API( $id, $url, $api_arr['status'] );
		}
		echo 1;
		exit();
	}
	if($op == 'delete'){
		$id = $_GET['id'];
		$_SGLOBAL['db']->query("DELETE FROM ".tname('api')." WHERE id=$id");
		if(@include_once(S_ROOT.'./plugin/iauth/IAuthManage.php')){
			IAUTH_remove_API($id);
		}
		echo 1;
		exit();
	}
	$url = "admincp.php?ac=$ac&type=api";
	$wheresql = "WHERE 1=1";
	/*
	if(isset($_GET['applypass']) && $_GET['applypass'] != 5){
		$applypass = $_GET['applypass'];
		$wheresql .= " AND applypass=$applypass";
		$url .= "&applypass=$applypass";
	}
	if(isset($_GET['category']) && $_GET['category'] != 0){
		$category = $_GET['category'];
		$wheresql .= " AND category=$category";
		$url .= "&category=$category";
	}
	if(isset($_GET['types']) && $_GET['types'] != 0){
		$types = $_GET['types'];
		$wheresql .= " AND type=$types";
		$url .= "&types=$types";
	}
	*/
	$perpage = 20;
	$page = empty($_GET['page'])?0:intval($_GET['page']);
	if($page<1) {
		$page=1;
	}
	$start = ($page-1)*$perpage;
	ckstart($start, $perpage);
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('api')." ".$wheresql));
	$multi = multi($count, $perpage, $page, $url);

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('api')." $wheresql ORDER BY id DESC LIMIT ".$start.",".$perpage);
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		$apis[] = $value;
	}
	
	
	
}elseif($type == 'appdetail'){
	$tab = 0;
	$appsid = $_GET['appsid'] ? $_GET['appsid'] : 0;
	$verify = $_GET['verify'] ? $_GET['verify'] : 0;
	
	if($op == 'delete'){
		$id = $_GET['id'];
		$_SGLOBAL['db']->query("DELETE FROM ".tname('apps')." WHERE id=$id");
		if(@include_once(S_ROOT.'./plugin/iauth/IAuthManage.php')){
			IAuth_remove_app($id);
		}
		echo 1;
		exit();
	}
	
	if($verify){
		
		//print_r($_GET);exit;
		
		$applypass = trim($_GET['applypass']);
		$category = $_GET['category'];
		$name = trim($_GET['name']);
		$status = isset($_GET['status']) ? trim($_GET['status']) : 'disable';
		$url = isset($_GET['url']) ? trim($_GET['url']) : '';
		$type = isset($_GET['types']) ? intval($_GET['types']) : 0;
		$desc = isset($_GET['desc']) ? $_GET['desc'] : '';
		$app_url = isset($_GET['app_url']) ? $_GET['app_url'] : 'http://i.buaa.edu.cn';
		$back_url = isset($_GET['back_url']) ? $_GET['back_url'] : 'http://i.buaa.edu.cn';
		$starttime = isset($_GET['starttime']) ? strtotime($_GET['starttime']) : strtotime('2036-12-31');
		$endtime = isset($_GET['endtime']) ? strtotime($_GET['endtime']) : strtotime('2036-12-31');
		$ishidden = isset($_GET['ishidden']) ? intval($_GET['ishidden']) : 1;
	
		$undergraduate = isset($_GET['undergraduate']) ? intval($_GET['undergraduate']) : 0;
		$postgraduate = isset($_GET['postgraduate']) ? intval($_GET['postgraduate']) : 0;
		$teacher = isset($_GET['teacher']) ? intval($_GET['teacher']) : 0;
		$alumnus = isset($_GET['alumnus']) ? intval($_GET['alumnus']) : 0;
		//二进制形式
		$usertype = $undergraduate.$postgraduate.$teacher.$alumnus;
		//转换为十进制形式
		$usertype = bindec($usertype);
		$iauth_name = isset($_GET['iauth_name']) ? trim($_GET['iauth_name']) : '';
		$iauth_type = isset($_GET['iauth_type']) ? trim($_GET['iauth_type']) : '';
		$iauth_id = trim($_GET['iauth_id']) ? trim($_GET['iauth_id']) : 0;

		$app_arr = array(
			'iauth_type' => $iauth_type,
			'iauth_name' => $iauth_name,
			'name' => $name,
			'desc' => $desc,
			'url' => $url,
			'app_url' => $app_url,
			'back_url' => $back_url,
			'category' => $category,
			'type' => $type,
			'ishidden' => $ishidden,
			'status' => $status,
			'usertype' => $usertype,
			'starttime' => $starttime,
			'endtime' => $endtime,
			'applypass' => $applypass
		);
		//以上接收并处理数据
		//图片
		if($_FILES['logo']['tmp_name']){
			$pic = pic_save($_FILES['logo'], -1, $name);
			if(is_array($pic) && $pic['filepath']){
				$app_arr['logo'] = $pic['filepath'];
			}
		}
		//print_r($app_arr);
		if($category == 3){
			if(!@include_once(S_ROOT.'./plugin/iauth/IAuthManage.php')){
				header("Location:admincp.php?ac=apps");exit();
			}
			if($iauth_id){
				//修改iauth中app信息
				IAUTH_edit_app( $iauth_id, $iauth_name, $back_url, $app_url, $status);
				$app_arr['iauth_id'] = $iauth_id;
			}else{
				//在iauth中新增app信息
				//print_r($iauth_type);
				if($iauth_type == 'WSC')
					$iauth_arr = IAUTH_new_WSC( $iauth_name, $back_url, $app_url, $status);
				elseif($iauth_type == 'UAC')
					$iauth_arr = IAUTH_new_UAC( $iauth_name, $status);
				else
					$iauth_arr = IAUTH_new_RP( $iauth_name, $status);
				
				
				$app_arr['iauth_id'] = $iauth_arr['id'];
				$app_arr['iauth_secret'] = $iauth_arr['secret'];
				
				if($iauth_type == 'RP'){
				//如果是api,则更新api信息,同时同步api信息至iauth
					$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('api')." WHERE appid=$appsid");
					if($value = $_SGLOBAL['db']->fetch_array($query)) {
						$api_id = $value['id'];
						$iauth_api_name = $value['iauth_api_name'];
						$api['appid'] = $iauth_arr['id'];
						$api['url'] = $value['url'];
						//print_r($value);
						//print_r($api);
					}

					$api['iauthAPIid']=IAUTH_new_API( $api['appid'], $iauth_api_name, $api['url']);
					updatetable('api' , $api ,array('id'=>$api_id));
				}
			}		
		}
		//更新本地app信息
		//print_r($app_arr);
		updatetable('apps' , $app_arr ,array('id'=>$appsid));
		//通知申请者
		$applyuid = $_GET['applyuid'];
		$notes = trim($_GET['notes']) ? $_GET['notes'] : '您的应用已通过审核~!';
		notification_add($applyuid, 'systemnote', $notes);

		header("Location:admincp.php?ac=apps");exit();

	}else{
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')." WHERE id=$appsid");
		if($value = $_SGLOBAL['db']->fetch_array($query)) {
			$logo = $value['logo'] ? $_SC['attachurl'].$value['logo'] : 'plugin/apps/images/app.gif';
			$appsid = $value['id'];
			$name = $value['name'];
			$iauth_name = $value['iauth_name'];
			$url = $value['url'];
			$app_url = $value['app_url'];
			$back_url = $value['back_url'];
			$desc = $value['desc'];
			$category = $value['category'];
			$usertype = $value['usertype'];
			$types = $value['type'];
			$status = $value['status'];
			$ishidden = $value['ishidden'];
			$applypass = $value['applypass'];
			$applyuid = $value['applyuid'];
			$applytime = date("Y-m-d" ,$value['applytime']);
			$starttime = date("Y-m-d" ,$value['starttime']);
			$endtime = date("Y-m-d" ,$value['endtime']);
			
			$iauth_type = $value['iauth_type'];
			$iauth_id = $value['iauth_id'];
		}
	}

		
}else{
	$tab = 0;
	
	$url = "plugin.php?pluginid=apps&ac=list";
	$wheresql = "WHERE 1=1";
	if(isset($_GET['applypass']) && $_GET['applypass'] != 5){
		$applypass = $_GET['applypass'];
		$wheresql .= " AND applypass=$applypass";
		$url .= "&applypass=$applypass";
	}
	if(isset($_GET['category']) && $_GET['category'] != 0){
		$category = $_GET['category'];
		$wheresql .= " AND category=$category";
		$url .= "&category=$category";
	}
	if(isset($_GET['types']) && $_GET['types'] != 0){
		$types = $_GET['types'];
		$wheresql .= " AND type=$types";
		$url .= "&types=$types";
	}
	
	$perpage = 20;
	$page = empty($_GET['page'])?0:intval($_GET['page']);
	if($page<1) {
		$page=1;
	}
	$start = ($page-1)*$perpage;
	ckstart($start, $perpage);
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('apps')." ".$wheresql));
	$multi = multi($count, $perpage, $page, $url);

	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('apps')." $wheresql ORDER BY applytime DESC LIMIT ".$start.",".$perpage);
	while($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['applytime'] = date("Y-m-d" ,$value['applytime']);
		realname_set($value['applyuid'], $value['uname']);
		$apps[] = $value;
	}
	realname_get();
}
//激活
$actives = array($tab => ' class="active"');
if(!isset($tab)) {
	$actives = array('all' => ' class="active"');
} else {
	$mpurl .= '&tab='.$tab;
}
include_once template("admin/tpl/apps");



?>
