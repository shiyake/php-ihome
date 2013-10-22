<?php
/*
     getuserthings.php用于获得当前登录用户所发布的新鲜事
     Add by am@ihome.2012-09-26  9:35	
	 Modified by Xuxing@ihome. 2012-10-7 13:11

*/
    include_once('../../common.php'); 
	//include_once(S_ROOT.'./uc_client/client.php');
    //include_once('do_mobileverify.php');	
	//@include_once(S_ROOT.'./data/data_profield.php');
	
	$perpage = empty($_POST['count'])?25:intval($_POST['count']);
    //$targetuid = intval(trim($_POST[targetuid]));

	/**/
$userid=3;
	$targetuid=18;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	if(empty($targetuid)){
	   $id = $userid;
	}else{
	   $id = $targetuid;
	}
	chdir(dirname(dirname(dirname(__FILE__))));// go the ihome dir.
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('doing')." where uid=$id
	                                ORDER BY dateline DESC
	                                LIMIT $start,$perpage");
			
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {	

		//give the image full path. Started by xuxing 2013-3-30
		if(empty($value['image'])){
	      $value['image']='';	
		}else if(preg_match("/attachment\/(.*)/",$value['image'],$matches) && (file_exists($_SC['attachdir'].'./'.$matches[1].'.thumb.jpg') || file_exists($_SC['attachdir'].'./'.$matches[1]))){
			//echo file_exists($_SC['attachdir'].'./'.$matches[1]);exit();
		  	if (file_exists($_SC['attachdir'].'./'.$matches[1].'.thumb.jpg')) {
		  		$value['image'] = $_SCONFIG[siteallurl].'attachment/'.$matches[1].'.thumb.jpg';
			}else{
				$value['image'] = $_SCONFIG[siteallurl].'attachment/'.$matches[1];
			}
		}else{
					$value['image']='';
		}

		// full path. ended by xuxing 2013-3-30

	realname_set($value[uid], $value[username]);

		$doinglist[] = $value;
	}
	realname_get();
			
	/*foreach($topiclist as $value){
		$result[] = array('feed_id'=>$value[feedid],'create_at'=>$value[dateline],'text'=>$value[title_data],'user_thumbpic'=>avatar($value[uid],small),'type'=>$value[icon]);
	}*/
	
	foreach($doinglist as $value){
		
		//依次处理body区与general（分享）区中的a（锚）；
		preg_match_all("#[<]a(.*)[>](.*)[<][\][/]a[>]#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$TmpString = $item[1]; 
			$HrefString = $item[2];

			$value['message'] = str_replace($MatchString, $HrefString, $value['message']);
			
		}
		
		//去除<b> start
		preg_match_all("#[<]b[>](.*)[<][\][/]b[>]#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$HrefString = $item[1];
	//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
	
			$value['message'] = str_replace($MatchString, $HrefString, $value['message']);
			
		}
		//去除<b> end

			//将公告中的图片进行绝对路径化。 by xuxing start<img src=\"image\/face\/24.gif\" class=\"face\">
		preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$TmpString = $item[1]; 
			$HrefString = $_SCONFIG[siteallurl].$item[1];
	//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
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
		//将公告中的图片进行绝对路径化。 by xuxing end

$result[] = array('user_thumbpic'=>avatar($value[uid],small),'feed_uid'=>$value[uid],'feed_name'=>$_SN[$value[uid]],'feed_type'=>'doing',
			'feed_id'=>$value['doid'],'feed_target_id'=>$value['doid'],'feed_image_1'=>$value['image'],'feed_detail'=>$value['message'],
			'replynum'=>$value['replynum'], 'creat_at'=>$value['dateline'],'feed_quote'=>'','feed_comment_flag'=>'doid');
	}

	
	$result = json_encode($result);
    $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);

	echo $result;
	exit();
?>
