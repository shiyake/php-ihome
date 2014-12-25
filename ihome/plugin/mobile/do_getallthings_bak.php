<?php
/*
     getallthings.php用于获取当前登录用户及其好友的最新新鲜事列表
     Add by am@ihome.2012-09-18  14:35

*/
    include_once('../../common.php'); 
    //include_once('do_mobileverify.php');	
	include_once('function_mobileapi.php');

	$perpage = empty($_POST['count'])?15:intval($_POST['count']);
	$perpage = 40;
	$userid=3;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	$time = empty($_POST['dateline'])?0:intval(trim($_POST['dateline']));
	//$time = 0;
	//$page=3;
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	$space = getspace($userid, 'uid');
	if($space[feedfriend]){
		$wheresql = "uid IN (0,$space[feedfriend],$space[uid]) and dateline>$time";
	}else{
		$wheresql = "1";
	}
	$wheresql .= " and (body_template not like '%{eventname}%' and body_template not like '%{option}%') and icon in ('doing','blog','arrangement','thread','share','album')";

	chdir(dirname(dirname(dirname(__FILE__))));// go the ihome dir.
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." USE INDEX(dateline) WHERE ".$wheresql." ORDER BY dateline DESC LIMIT ".$start.",".$perpage);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		
		//skip the event, option of the share. started by xuxing@ihome
		//if (($value[icon] == 'share' && (strstr($value[body_template], '{eventname}') || strstr($value[body_template], '{option}'))) /*|| $value[icon]=='poll' || $value[icon] == 'event'/*|| $value[icon] == 'arrangement'*/) {
			//continue;
		//}
		//skip the event..... ended by xuxing@ihome 

		realname_set($value[uid], $value[username]);

		// start by an, modified by xuxing. 2013-3-27.
		//deal with the image size, if the picture is from ihome-self, get the thumb pic, if from foreign site, resize it.
		if(empty($value[image_1])){
	      $value[image_1]='';	
		}else if(preg_match("/attachment\/(.*)/",$value['image_1'],$matches) && (file_exists($_SC['attachdir'].'./'.$matches[1].'.thumb.jpg') || file_exists($_SC['attachdir'].'./'.$matches[1]))){
			//echo file_exists($_SC['attachdir'].'./'.$matches[1]);exit();
		  	if (file_exists($_SC['attachdir'].'./'.$matches[1].'.thumb.jpg')) {
		  		$value['image_1'] = $_SCONFIG[siteallurl].'attachment/'.$matches[1].'.thumb.jpg';
			}else{
				$value['image_1'] = $_SCONFIG[siteallurl].'attachment/'.$matches[1];
			}
		  /*if (!file_exists($value['image_1'])) {
		  $value['image_1']='（图片来自外网，耗费流量较多，请使用浏览器查看）';
		  }*/
		}else{
          //$value['image_1']='（图片来自外网，耗费流量较多，请使用浏览器查看）';
			$dir1 = gmdate('Ym',$value['dateline']);
			$dir2 = gmdate('d',$value['dateline']);
			$filename = basename($value['image_1']);
			$filepath = getforeignpicpath($filename, $dir1, $dir2, true);

			//echo $_SC['attachdir'].'./'.$filepath;exit();
			if(file_exists($_SC['attachdir'].'./'.$filepath.'.thumb.jpg')) {
				$value['image_1'] = $_SCONFIG[siteallurl].'attachment/'.$filepath.'.thumb.jpg';
			}else{
				if($foreignthumb = makemobilethumb($value['image_1'], $filename, $dir1, $dir2)){
					$value['image_1'] = $_SCONFIG[siteallurl].'attachment/'.$foreignthumb;					
				}else{
					$value['image_1']='';
				}

			}

		}
		// image size end.

		$topiclist[] = $value;	
	}
		realname_get();

	foreach($topiclist as $value){
		$doingflag = 0;
		$value = mkfeed($value);
	
		//如果为记录，则将title内容置为body内容；
		if($value['icon'] == 'doing'){
			$doingflag = 1;
			$value[body_template] = $value[title_template];
		}
		 
		//依次处理body区与general（分享）区中的a（锚）；
		preg_match_all("#[<]a(.*)[>](.*)[<][\][/]a[>]#U",$value['body_template'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$TmpString = $item[1]; 
			$HrefString = $item[2];
	//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
	
			$value['body_template'] = str_replace($MatchString, $HrefString, $value['body_template']);
			
		}
		
		//去除记录的撰写者标记
		/*if($doingflag == 1){
			//echo $value['body_template'] = str_replace($MatchString, $HrefString, $value['body_template'])."\n";
			$SpePos = strpos($value['body_template'], "：");
			echo "1111\n";
			if($SpcPos != false){
			echo "2222\n";
				$value['body_template'] = trim(substr($value['body_template'],$SpePos+1));
			}
		}*/
		
		//去除<b> start
		preg_match_all("#[<]b[>](.*)[<][\][/]b[>]#U",$value['body_template'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$HrefString = $item[1];
	//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
	
			$value['body_template'] = str_replace($MatchString, $HrefString, $value['body_template']);
			
		}
		//去除<b> end
//将公告中的图片进行绝对路径化。 by xuxing start<img src=\"image\/face\/24.gif\" class=\"face\">
		preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['body_template'], $matches, PREG_SET_ORDER);

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
			$value['body_template'] = str_replace($TmpFace, $newface, $value['body_template']);
			}
		}
			//$value['body_template'] = str_replace($TmpString, $HrefString, $value['body_template']);
			}
		//将公告中的图片进行绝对路径化。 by xuxing end
		$result[] = array('user_thumbpic'=>avatar($value[uid],small),'feed_uid'=>$value[uid],'feed_name'=>$_SN[$value[uid]],'feed_id'=>$value[feedid],
		'feed_type'=>in_array($value['icon'], array('blog','album','share','poll','thread','event','doing','arrangement'))?$value['icon']:'','feed_target_id'=>$value['id'],
		'feed_comment_flag'=>in_array($value['idtype'], array('blogid','picid','albumid','sid','pid','eventid','doid'))?'1':'0',
		'feed_image_2'=>$value[image_2],'feed_image_3'=>$value[image_3],'feed_image_4'=>$value[image_4],'feed_detail'=>$value['body_template'],
		'feed_quote'=>$value[body_general],'creat_at'=>$value[dateline],'feed_image_1'=>$value[image_1]);
	}

	$result = json_encode($result);
	$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
	echo $result;
	exit();
?>
