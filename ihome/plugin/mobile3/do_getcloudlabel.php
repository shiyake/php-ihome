<?php
/*
     do_getcloudlabel.php用于标签内容
     Add by am@ihome.2014-03-17  09:09


*/
    //include_once('../../common.php'); 
    include_once('do_mobileverify.php');	
	include_once(S_ROOT.'./data/data_profield.php');
	include_once(S_ROOT.'./uc_client/client.php');
	$tags = array();
	$query = $_SGLOBAL['db']->query("SELECT id,tag_word,max_type FROM ".tname("tagcloud")." ORDER BY id DESC LIMIT 0,10");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
		$tags[] = $value;
	}
	
	foreach($tags as $value){
		$result[] = array(
		'labelid'=>$value[id],
		'label_tagword'=>$value[tag_word],
		'labeltype'=>$value[max_type]
		);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>