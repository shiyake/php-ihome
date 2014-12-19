<?php
	include_once('./common.php');
	
	$atuid = $_GET["atuid"]? intval(trim($_GET["atuid"])):0;
	$width = $_GET["width"]? intval(trim($_GET["width"])):500;
	$width = $width."px";
	$text_width = $width-60;
	$height = $_GET["height"]? intval(trim($_GET["height"])):500;
	$height = $height."px";

	$wheresql = ' where status=0';
	if ($atuid) {
		$wheresql .= ' and atuid='.$atuid;
	}
	$complainQuery = $_SGLOBAL['db']->query("select distinct doid from ".tname("complain").$wheresql." order by addtime DESC LIMIT 30");
	$doids = array();
	while ($value = $_SGLOBAL['db']->fetch_array($complainQuery)) {
		$doids[] = $value['doid'];
	}

	$topic = array();
	if ($doids) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." where icon='doing' and id in (".implode(',', $doids).") order by dateline desc");
		while ($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);
			// $value['title_template'] = "{actor}：{message}";
			// $value['title_data'] = $value['body_data'];
			// $value['body_template'] = '';
			// $value['body_data'] = '';
			$topic[] = $value;
		}
		realname_get();
	}
	$iscp = 1;
	include_once template("cpexshow");

?>