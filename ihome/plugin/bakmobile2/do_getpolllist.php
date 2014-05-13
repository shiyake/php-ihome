<?php
/*
     do_getpolllist.php获得热门投票的列表信息
     Add by am@ihome.2013-08-29  11:07


*/
    include_once('../../common.php'); 
    //include_once('do_mobileverify.php');	
	@include_once(S_ROOT.'./data/data_profield.php');
    $perpage = 20;
    $page = empty($_POST['page'])?1:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
    $a =time();
	echo $a;
	$result = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('poll')." ORDER BY dateline DESC LIMIT $start,$perpage");
		//echo "SELECT * FROM ".tname('poll')." ORDER BY dateline DESC LIMIT 0, 10";
	$b = time();
	echo $b;
	while($value = $_SGLOBAL['db']->fetch_array($query)){
			realname_set($value['uid'], $value['username']);//实名
			$hotpoll[] = $value;
		}
		realname_get();	
	foreach($hotpoll as $value){
		$result[] = array('poll_id'=>$value[pid],'poll_userpic'=>avatar($value['uid'],middle),'poll_username'=>$_SN[$value['uid']],
		'poll_userid'=>$value[uid],'poll_time'=>$value[dateline],'poll_title'=>$value[subject],
		'poll_voternum'=>$value[voternum],'poll_replynum'=>$value[replynum],'poll_multiple'=>$value[multiple],
		'poll_maxchoice'=>$value[maxchoice],'poll_sex'=>$value[sex],'poll_noreply'=>$value[noreply],
		'poll_expiration'=>$value[expiration],'poll_lastvote'=>$value[lastvote]
	);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	$c = time();
	echo $c;
	exit();
?>