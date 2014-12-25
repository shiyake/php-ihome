<?php
/*
	getmessages.php文件用于获取私信收件箱中的信息。
	Add by xuxing@ihome. 2012-09-13  20:33
*/
    include_once('../data_oauth_check.php');	
    $userid = intval(oauth_check());
	include_once('../../../common.php');
	include_once(S_ROOT.'./uc_client/client.php');

	//$filter = in_array($_GET['filter'], array('newpm', 'privatepm', 'systempm', 'announcepm'))?$_GET['filter']:($space['newpm']?'newpm':'privatepm');
	$filter = 'privatepm';
	
	//分页
	$perpage = 10;
	//$perpage = mob_perpage($perpage);
	
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page<1) $page = 1;
//$userid=3;	
	//获取私信收件箱信息
	$result = uc_pm_list($userid, $page, $perpage, 'inbox', $filter, 50);
	
	$count = $result['count'];
	$list = $result['data'];
	
	$result = array();
	//$result['count'] = $count;
	
	//获取姓名
	foreach($list as $values){
		realname_set($values['msgfromid'], $values['msgfrom']);
	}
	realname_get();	
	
	//生成数组
	foreach($list as $values){
	//将公告中的图片进行绝对路径化。  start<img src=\"image\/face\/24.gif\" class=\"face\">
		preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$TmpString = $item[1]; 
			$HrefString = $_SCONFIG[siteallurl].$item[1];
	        	       	$TmpFace = $item[0];
		//print_r($TmpString);
		//开始处理图片	
		if(preg_match_all("#image\/face\/(\d+)\.gif#i",$TmpString, $matchface, PREG_SET_ORDER)){
			foreach($matchface as $facenum){
				switch($facenum[1]){
					case 1:
						$newface=' [:what] ';
						break;
					case 2:
						$newface=' [:nothing] ';
						break;
					case 3:
						$newface=' [:breakdown] ';
						break;
					case 4:
						$newface=' [:caml] ';
						break;
					case 5:
						$newface=' [:coldsweat] ';
						break;
					case 6:
						$newface=' [:congratulationsgirl] ';
						break;
					case 7:
						$newface=' [:curse] ';
						break;
					case 8:
						$newface=' [:dead] ';
						break;
					case 9:
						$newface=' [:donot] ';
						break;
					case 10:
						$newface=' [:doubt] ';
						break;
					case 11:
						$newface=' [:embarrassed] ';
						break;
					case 12:
						$newface=' [:envy] ';
						break;
					case 13:
						$newface=' [:full] ';
						break;
					case 14:
						$newface=' [:furious] ';
						break;
					case 15:
						$newface=' [:happy] ';
						break;
					case 16:
						$newface=' [:laugh] ';
						break;
					case 17:
						$newface=' [:little] ';
						break;
					case 18:
						$newface=' [:loveboy] ';
						break;
					case 19:
						$newface=' [:no] ';
						break;
					case 20:
						$newface=' [:alexander] ';
						break;
					case 21:
						$newface=' [:please] ';
						break;
					case 22:
						$newface=' [:proud] ';
						break;
					case 23:
						$newface=' [:regret] ';
						break;
					case 24:
						$newface=' [:shout] ';
						break;
					case 25:
						$newface=' [:shyboy] ';
						break;
					case 26:
						$newface=' [:sinistersmile] ';
						break;
					case 27:
						$newface=' [:spit] ';
						break;
					case 28:
						$newface=' [:tears] ';
						break;
					case 29:
						$newface=' [:unconcern] ';
						break;
					case 30:
						$newface=' [:bored] ';
						break;
					

				}
			$value['message'] = str_replace($TmpFace, $newface, $value['message']);
			}
			}
			}
		$result[] = array('msg_name'=>$_SN[$values[msgfromid]],'msg_userid'=>$values[msgfromid],'msg_username'=>$_SN[$value[msgfromid]],'msg_user_pic'=>avatar($values[msgfromid],small),'msg_id'=>$values[pmid],'msg_content'=>$values[message],'msg_time'=>$values[dateline]);
	}
	
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>