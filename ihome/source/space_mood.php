<?php

if(!defined('iBUAA')) {
	exit('Access Denied');
}

//��ҳ
$perpage = 20;
$page = empty($_GET['page'])?0:intval($_GET['page']);
if($page<1) $page=1;
$start = ($page-1)*$perpage;

//��鿪ʼ��
ckstart($start, $perpage);

$list = array();
$count = 0;

if($space['mood']) {
	$theurl = "space.php?uid=$space[uid]&do=mood";
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('space')." s WHERE s.mood='$space[mood]'"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT s.*,sf.note,sf.sex FROM ".tname('space')." s
			LEFT JOIN ".tname('spacefield')." sf ON sf.uid=s.uid
			WHERE s.mood='$space[mood]'
			ORDER BY s.updatetime DESC LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['isfriend'] = ($value['uid']==$space['uid'] || ($space['friends'] && in_array($value['uid'], $space['friends'])))?1:0;
			realname_set($value['uid'], $value['username'], $value['name'], $value['namestatus']);
			$list[] = $value;
		}
	}
	
	realname_get();
	
	//��ҳ
	$multi = multi($count, $perpage, $page, $theurl);

}

include_once template("space_mood");

?>