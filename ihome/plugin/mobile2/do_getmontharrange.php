<?php
/*
	do_getmontharrange.php用于返回本周的校园日历
	added by am@ihome 2012-12-13
*/
    //include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
    include_once('do_mobileverify.php');	

    $perpage = 20;
    $page = empty($_POST['page'])?1:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
    $result = array();

	$y=date("Y",time());
	$m=date("m",time());
	$d=date("d",time());
	$t0=date('t');           // 本月一共有几天
	$Fday=mktime(0,0,0,$m,1,$y);        // 创建本月开始时间 
	$Lday=mktime(23,59,59,$m,$t0,$y);       // 创建本月结束时间
    //echo $Fday;
	//echo $Lday;
    //摘要截取
	$summarylen = 1000;
	$orderby = " order by starttime asc";
	$wheresql .= " starttime between ".$Fday." and ".$Lday; 

	$query = $_SGLOBAL['db']->query("SELECT uid,message,subject,starttime,pic from ".tname('arrangement')." where  ".$wheresql."  LIMIT $start,$perpage");
    while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				realname_set($value['uid']);
				//去除空格符号
		preg_match_all("#&nbsp;#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$HrefString = $item[1];
	
			$value['message'] = str_replace($MatchString, $HrefString, $value['message']);
			
		}

				if($value['pic']) $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
				$list[] = $value;
		}
	realname_get();
    foreach($list as $value){
		$result[] = array('user_thumbpic'=>avatar($value[uid],middle),'feed_uid'=>$value[uid],'feed_name'=>$_SN[$value[uid]],'feed_id'=>'',
		'feed_type'=>'arrangement','feed_target_id'=>'',
		'feed_comment_flag'=>'arrangement',
		'feed_image_2'=>'','feed_image_3'=>'','feed_image_4'=>'','feed_detail'=>$value['message'],
		'feed_quote'=>$value[subject],'creat_at'=>$value[starttime],'feed_image_1'=>$value[pic]);
			}
    $result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();


?>