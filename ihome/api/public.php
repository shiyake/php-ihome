<?php
include_once('../common.php');
include_once(S_ROOT.'../source/function_cp.php');
include_once(S_ROOT.'../source/function_common.php');
function getEmpty($var) {
	if (empty($var))	{
		return "";
	}
	else {
		return $var;
	}
}

function public_interface($uid,$username,$cat) {
	global $_SGLOBAL;
	$cat_rel = array("1"=>"学院","2"=>"部处","3"=>"名人","4"=>"学生组织","5"=>"兴趣社团","6"=>"学生党组织","7"=>"活动主页","8"=>"品牌主页","20"=>"班级主页","100"=>"航路研语","200"=>"名师工作坊");
	if($cat)	{
		foreach( $cat_rel as $key=>$value )	{
			if ($value == $cat)	{
				$cat = $key;
				break;
			}
		}
	}
	if ($uid)	{
		$sql = "SELECT uid,username,pptype FROM ihome_space where uid=".$uid." and groupid=3";
		$res = $_SGLOBAL['db']->query($sql);
		$arr = array();
		if (empty($res))	{
			$arr = array("status"=>"This uid not exists or not a public page!");
		}
		else {
			$resuid = $uid;
			$resusername = "";
			$rescat = "";
			$cat_id = "";
			while($value = $_SGLOBAL['db']->fetch_array($res))	{
				$resusername = $value['username'];
				$rescat = $cat_rel[$value['pptype']];
				$cat_id = $value['pptype'];
			}
			$r = $_SGLOBAL['db']->query('SELECT body_data,image_1,title_template FROM ihome.ihome_feed where uid='.$uid.' and image_2 = "" order by dateline desc limit 1') ;
			$body_data = "";
			$image = "";
			$title_template = "";
			while($value = $_SGLOBAL['db']->fetch_array($r))	{
				$body_data = $value['body_data'];
				$image = $value['image_1'];
				$title_template = $value['title_tamplate'];
			}
			$arr = array("status"=>"success","uid"=>$resuid,"username"=>$resusername,"cat_id"=>$cat_id,"avatar"=>avatar_file($uid,'middle'),"body_data" => $body_data,"title_template"=>$title_template,"image" => $image,"category"=>$rescat);
		}
		echo json_encode($arr);
		return json_encode($arr);
	}
	elseif ($username)	{
		$sql = "SELECT uid,username,pptype FROM ihome_space where username='".$username."' and groupid=3";
		$res = $_SGLOBAL['db']->query($sql);
		$arr = array();
		if (empty($res))	{
			$arr = array("status"=>"This username not exists or not a public page!");
		}
		else {
$resuid = $uid;
			$resusername = "";
			$rescat = "";
			$cat_id = "";
			while($value = $_SGLOBAL['db']->fetch_array($res))	{
				$resusername = $value['username'];
				$rescat = $cat_rel[$value['pptype']];
				$cat_id = $value['pptype'];
			}
			$r = $_SGLOBAL['db']->query('SELECT body_data,image_1,title_template FROM ihome.ihome_feed where username="'.$username.'" and image_2 = "" order by dateline desc limit 1') ;
			$body_data = "";
			$image = "";
			$title_template = "";
			while($value = $_SGLOBAL['db']->fetch_array($r))	{
				$body_data = $value['body_data'];
				$image = $value['image_1'];
				$title_template = $value['title_template'];
			}
			$arr = array("status"=>"success","uid"=>$resuid,"username"=>$resusername,"cat_id"=>$cat_id,"avatar"=>avatar_file($uid,'middle'),"body_data" => $body_data,"title_template"=>$value['title_template'],"image" => $image,"category"=>$rescat);
		}
		echo json_encode($arr);
		return json_encode($arr);
	}
	elseif ($cat)	{
		$sql = "SELECT uid,username,pptype FROM ihome_space where pptype=".$cat." and groupid=3";
		$res = $_SGLOBAL['db']->query($sql);
		$arr = array();
		if (empty($res))	{
			$arr = array("status"=>"This category not exists or not a public page!");
		}
		else {
			$resuid = $uid;
			$resusername = "";
			$rescat = "";
			$cats = array();
			while($value = $_SGLOBAL['db']->fetch_array($res))	{
				$resusername = $value['username'];
				$rescat = $value['pptype'];
				$resuid = $value['uid'];
				$r = $_SGLOBAL['db']->query('SELECT body_data,image_1,title_template FROM ihome.ihome_feed where uid='.$resuid.' and image_2 = "" order by dateline desc limit 1') ;
				$body_data = "";
				$image = "";
				$title_template = "";
				while($value = $_SGLOBAL['db']->fetch_array($r))	{
					$body_data = $value['body_data'];
					$image = $value['image_1'];
					$title_template = $value['title_template'];
				}
				$cats[] = array("uid"=>$value['uid'],"username"=>$value['username'],"category"=>$cat_rel[$value['pptype']],"body_data"=>$body_data,"title_template"=>$title_template,"image"=>$image);
			}
			$arr = array("status"=>"success","categroies"=>$cats);
		}
		echo json_encode($arr);
		return json_encode($arr);
	}
	else {
		echo json_encode($cat_rel);
		return json_encode($cat_rel);
	}
}

$uid = $_POST['uid'];
$username = $_POST['username'];
$cat = $_POST['cat'];
public_interface($uid,$username,$cat);
?>
