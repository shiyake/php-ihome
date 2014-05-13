<?php
/*
     getblogreplylist.php用于获取某篇日志的评论列表
     Add by am@ihome.2012-10-09  09:14
	 modified by xuxing@ihome. 2012-12-6 15:44

*/
    //include_once('../../common.php'); 
	//include_once(S_ROOT.'./uc_client/client.php');
    include_once('do_mobileverify.php');	
	//@include_once(S_ROOT.'./data/data_profield.php');

	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$blogid = intval(trim($_POST['blogid']));
	
	/*$blogid=622;
	$userid=96;
	$username='anminghao';*/
	//$_SGLOBAL['supe_uid'] = $userid;
	//$_SGLOBAL['supe_username'] = $username;
	
	getmember();

	$result = array();
	$replylist = array();
	$wheresql = "b.blogid=$blogid";
	$query = $_SGLOBAL['db']->query("SELECT bf.target_ids, b.uid,b.friend FROM ".tname('blog')." b left join ".tname('blogfield')." bf  on b.blogid=bf.blogid where  ".$wheresql);
	$blog = $_SGLOBAL['db']->fetch_array($query);
	if(!ckfriend($blog['uid'], $blog['friend'], $blog['target_ids'])) {
		$result = array('flag'=>'no_privilege');
	}else{
	    $wheresql1 = "id=$blogid and idtype='blogid'";
		$query = $_SGLOBAL['db']->query("SELECT authorid,cid,message,dateline FROM ".tname('comment')."  where ".$wheresql1." order by dateline desc LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$replylist[] = $value;
			realname_set($value['authorid'],$value['author']);
			
		}
		realname_get();	
		if($replylist){		
			foreach($replylist as $value){
			//将公告中的图片进行绝对路径化。  <img src=\"image\/face\/24.gif\" class=\"face\">
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
//end
				$result[] = array('comm_authorpic'=>avatar($value['authorid'],middle),'comm_id'=>$value['cid'],'comm_userid'=>$value['authorid'],'comm_username'=>$_SN[$value['authorid']],'comm_text'=>$value['message'],'comm_time'=>$value['dateline']);
			}
		}
	}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>