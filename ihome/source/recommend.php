<?php



//引入基础函数
include_once('../common.php');
include_once('./function_cp.php');
include_once('./function_magic.php');
include_once('./function_common.php');

$recommendid = $_GET['recommendid'];
$recommededid = $_GET['recommendedid'];
$cause = $_GET['cause'];
$realname = $_GET['realname'];
$commonfriendlist = getcommonfriend($recommendid,$recommededid);
$commonfriendcount = count($commonfriendlist);
$count = 0;
$response = '<ul class="avatar_list">';
$response .= '<li class="avatar_li">';
$response .= avatar($recommededid,'small');
$response .= '<p class="gray"><a href="cp.php?ac=friend&op=add&uid='.$recommededid.'" id="a_near_friend_'.$recommededid.'" onclick="ajaxmenu(event, this.id, 1)" class="addfriend">加为好友</a></p></li><br/>';
$response .= '<li class="name_li">'.$realname.'<br/>'.$cause.'<br/></li></ul>';
$response .= '共同好友：'.$commonfriendcount.'<br/><ul class="avatar_list">';
foreach ($commonfriendlist as $key=>$value) {
	$count++;
	$response .= '<li><a href="space.php?uid='.$key.'">'.avatar($key,'small').'</a><br/>';
	$response .= '<a href="space.php?uid='.$key.'">'.$value.'</a></li>';
	if($count == 3) {
		$count = 0;
		break;
	}
}
$response .= '</ul>';
echo $response;



?>