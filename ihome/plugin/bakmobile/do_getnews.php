<?php
/*
     do_getnews.php用于新闻
     Add by am@ihome.2012-10-08  11:25
	 


*/
    //include_once('../../common.php'); 

    include_once('do_mobileverify.php');   	
	//include_once(S_ROOT.'./data/data_profield.php');
	$touid = 18054;
	//$touid = 96;
	/*$userid=18;
	$username='seen';
    $touid = 3;
	$_SGLOBAL['supe_uid'] = $userid;
	$_SGLOBAL['supe_username'] = $username;*/
	
	getmember();
	
	$perpage = 20;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	//$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('blog')."  where  uid=$touid order by dateline desc LIMIT $start,$perpage ");
	$query = $_SGLOBAL['db']->query("SELECT bf.target_ids, b.uid,b.blogid,b.subject,b.dateline,bf.message FROM ".tname('blog')." b LEFT JOIN ".tname('blogfield')." bf ON bf.blogid=b.blogid
		WHERE b.uid =  '".$touid."' ORDER BY b.dateline DESC LIMIT $start,$perpage ");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
		                   realname_set($value['uid'], $value['username']);
		                   $bloglist[] = $value;
					}
				}
				realname_get();
				//将日志中的图片进行绝对路径化。 start
	preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['message'], $matche, PREG_SET_ORDER);
	//print_r($matches);
	//print_r($matches);
	
	foreach($matche as $item){
		//print_r($item[1]);
		$TmpString = $item[1]; 
		$TmpFace = $item[0];
		//print_r($item);
		//print_r($TmpFace);
		if(preg_match_all("#image\/face\/(\d+)\.gif#i",$TmpString, $matchface, PREG_SET_ORDER)){
		//print_r($matchface);
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
		//处理表情end
	if($bloglist){
		foreach($bloglist as $value){
			$result[] = array('news_title'=>$value[subject],'news_message'=>$value[message],'newstime'=>$value[dateline]);
		}
	}
	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>