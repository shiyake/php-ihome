<?php
/*
     getuserthings.php用于获得当前登录用户所发布的新鲜事
     Add by am@ihome.2012-09-26  9:35	
	 Modified by Xuxing@ihome. 2012-10-7 13:11

*/
	//include_once(S_ROOT.'./uc_client/client.php');
    include_once('../iauth_verify_forward.php');
    include_once('../../../common.php');	
    $userid = intval(iauth_verify());
	//@include_once(S_ROOT.'./data/data_profield.php');
	
	$perpage = empty($_POST['count'])?25:intval($_POST['count']);
	//$userid=18;
	$page = empty($_POST['page'])?0:intval($_POST['page']);
	if($page < 1) $page = 1;
	$start = ($page-1)*$perpage;
	$result = array();
	
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('feed')." where uid=$userid
	                                ORDER BY dateline DESC
	                                LIMIT $start,$perpage");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					realname_set($value['uid'], $value['username']);
					$topiclist[] = $value;
				}
				realname_get();
			
	/*foreach($topiclist as $value){
		$result[] = array('feed_id'=>$value[feedid],'create_at'=>$value[dateline],'text'=>$value[title_data],'user_thumbpic'=>avatar($value[uid],small),'type'=>$value[icon]);
	}*/
	
	foreach($topiclist as $value){
		$doingflag = 0;
		$value = mkfeed($value);
		
		//如果为记录，则将title内容置为body内容；
		if($value['icon'] == 'doing'){
			$doingflag = 1;
			$value['body_template'] = $value['title_template'];
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

		preg_match_all("#[<]a(.*)[>](.*)[<][\][/]a[>]#U",$value['body_general'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$TmpString = $item[1]; 
			$HrefString = $item[2];
	//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
	
			$value['body_general'] = str_replace($MatchString, $HrefString, $value['body_general']);
			}
			//将公告中的图片进行绝对路径化。 by xuxing start<img src=\"image\/face\/24.gif\" class=\"face\">
		preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$value['body_template'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$TmpString = $item[1]; 
			$HrefString = $_SCONFIG[siteallurl].$item[1];
	//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
	
			$value['body_template'] = str_replace($TmpString, $HrefString, $value['body_template']);
			}
		//将公告中的图片进行绝对路径化。 by xuxing end

		$result[] = array('user_thumbpic'=>avatar($value[uid],small),'feed_uid'=>$value[uid],'feed_name'=>$_SN[$value[uid]],'feed_id'=>$value[feedid],'feed_type'=>in_array($value['icon'], array('blog','album','share','poll','thread','event','doing'))?$value['icon']:'','feed_target_id'=>$value['id'],'feed_comment_flag'=>in_array($value['idtype'], array('blogid','picid','albumid','sid','pid','eventid','doid'))?'1':'0','feed_image_1'=>$value[image_1],'feed_image_2'=>$value[image_2],'feed_image_3'=>$value[image_3],'feed_image_4'=>$value[image_4],'feed_detail'=>$value[body_template],'feed_quote'=>$value[body_general],'creat_at'=>$value[dateline]);
	}

	
	$result = json_encode($result);
    $result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);

	echo $result;
	exit();
?>