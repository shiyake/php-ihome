<?php
/*
	do_getthearrange.php����ĳ��У����Ϣ�ľ�������
	added by am@ihome 2012-12-13
*/
    //include_once('../../common.php'); 
    include_once('do_mobileverify.php');	
    include_once(S_ROOT.'./uc_client/client.php');
    $perpage = 20;
    $page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
    $result = array();
    $arrangeid = intval(trim($_POST['arrange_id']));
    //$arrangeid = 15;
	

	$wheresql .= " arrangementid=".$arrangeid;

	$query = $_SGLOBAL['db']->query("SELECT uid,subject,message,pic,picflag,viewnum,replynum,starttime from ".tname('arrangement')." where " .$wheresql. " LIMIT $start,$perpage");
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['uid']);
				$value['message'] = getstr($value['message'], $summarylen, 0, 0, 0, 0, -1);
				if($value['pic']) $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
				$list[] = $value;
		}
	realname_get();
    foreach($list as $value){
			$result[] = array('arrange_authorpic'=>avatar($value[uid],middle),
			'arrange_title'=>$value[subject],'arrange_text'=>$value[message],'arrange_author'=>$_SN[$value[uid]],
			'arrange_authorid'=>$value[uid],'arrange_image'=>$value[pic],'arrange_noreply'=>'',
			'arrange_readnum'=>$value[viewnum],'arrange_replynum'=>$value[replynum],'arrange_time'=>$value[starttime],
			'arrange_imgflag'=>$value[picflag]);
			}
    $result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();


?>