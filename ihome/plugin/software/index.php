<?

/*	[iBUAA] (C)2012-2111 BUAANIC . 
	Create By 
	Last Modfile By 
	Last Time : 2012年10月19日11:05:32
*/

if(!defined('iBUAA')) {
	exit('Access Denied');
}

$ac = $_GET['ac']?$_GET['ac']:index;


$user = $_SGLOBAL['db']->query("select usertype from ".tname(baseprofile)." WHERE uid = ".$space[uid]."  and collegeid like '0%' LIMIT 1 ");
$usertype = $_SGLOBAL['db']->result($user);

if ($usertype != '4' && $usertype != '教师' && $_SGLOBAL['member']['groupid'] !=1) {
	showmessage('仅限教师访问！');
}

if($ac == 'index') {
	$Software = array();
	$Query = $_SGLOBAL['db']->query("SELECT * FROM ".tname(software)." ORDER BY id ASC ");
	if($Value = $_SGLOBAL['db']->fetch_array($Query)) {
		if($Value['pic']) {
			$Value['pic'] = "plugin/software/image/".$Value['id'].".jpg";
		} else {
			$Value['pic'] = "plugin/software/image/software.png";
		}		
		$Software[] = $Value;
	}
	include_once( template( "plugin/software/template/index" ) );
}

elseif($ac =='show') {

	//取得单个数据
	$thevalue = array();
	$_GET['id'] = empty($_GET['id'])?0:intval($_GET['id']);
	
	if($_GET['id']) {
		$_SGLOBAL['db']->query('UPDATE '.tname('software').' SET views=views+1 WHERE id='.$_GET['id']);
		$query = $_SGLOBAL['db']->query("SELECT name,nums,views,modders,score,pic,id,des,size FROM ".tname('software')." WHERE id='$_GET[id]'");
		$thevalue = $_SGLOBAL['db']->fetch_array($query);
			if($thevalue['pic']){
				$thevalue['pic'] = "plugin/software/image/".$thevalue['id'].".jpg";
			} else {
				$thevalue['pic'] = "plugin/software/image/software.png";
			}
	
		$query = $_SGLOBAL['db']->query("SELECT sp.name as username,s.score as sscore,s.content as scotent FROM ".tname('software_comment')." s LEFT JOIN ".tname('space')." sp on s.uid=sp.uid WHERE s.sid='$_GET[id]'");
		$thecomment = $_SGLOBAL['db']->fetch_array($query);
	
	}


	//评论列表
	$pllist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('software_comment')." where sid=".$_GET['id']." ORDER BY comid desc;");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$pllist[$value['comid']] = $value;
	}
	$membername = empty($_SCOOKIE['loginuser'])?'':sstripslashes($_SCOOKIE['loginuser']);
	$wheretime = $_SGLOBAL['timestamp']-3600*24*30;
	$_TPL['css'] = 'network';
	
	realname_get();
	
	include_once( template( "plugin/software/template/software_show" ) );
	

}

elseif ($ac =='download') {
    //showmessage(ddddddd);
	include_once (S_ROOT.'./plugin/software/source/software_'.$ac.'.php');
	}
elseif ($ac =='pl') {
    //showmessage(ddddddd);
	include_once (S_ROOT.'./plugin/software/source/software_'.$ac.'.php');
	}
	
else{
	showmessage('参数错误');
}

?>
