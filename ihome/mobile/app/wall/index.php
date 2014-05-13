<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By Ancon
	Last Modfile By Ancon
	Last Time : 2013-6-20 16:00:26
*/

include_once('./../../../common.php');
//得重新架构
/*
if(!defined('iBUAA')) {
	exit('Access Denied');
}
*/
//exit('a');
checkclose();

$uid=$_SGLOBAL['supe_uid'];

if($uid) {
	$space = getspace($uid);
	
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
	
	//禁止访问
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}
}


if(empty($_SCONFIG['networkpublic'])) {
	mobile_login();
}

/*
print_r($_SGLOBAL);
exit();
*/

$ac = $_GET['ac'];

//echo $ac;
//exit;



if(!@include_once(''.$ac.'.php')) {
	exit("error!");
}

/*
echo $ac;
exit;

//include_once(S_ROOT.'./admin/admincp_'.$acfile.'.php');
//include_once template("admin/tpl/$acfile");

include_once(''.$ac.'.php');

/*

$ac_array = array('tracking','list','track','screen','apply');
if(in_array($ac, $ac_array))
	{
		include_once(''$ac.'.php');
	}

else
	{
		$ac = 'track';
		include_once(''.$ac.'.php');
	}

*/

//showmessage($ac);

?>
