<?php
/*
     gettheblog.php用于获得用户的具体信息
     Add by am@ihome.2012-10-08  16:58
	 modified by xuxing@ihome. 2012-12-5 22:46

*/
    //include_once('../../common.php'); 
	include_once(S_ROOT.'./uc_client/client.php');
    include_once('do_mobileverify.php');	
	//@include_once(S_ROOT.'./data/data_profield.php');
	include_once('function_mobileapi.php');
	
	$blogid = intval(trim($_POST[blogid]));
	/*$blogid=645;
	$userid = 18;
	$username = 'seen';
	*/
	
	getmember();
	//print_r($_SGLOBAL);exit();
	
	$result = array();
    //chdir(dirname(dirname(dirname(__FILE__))));
	$query = $_SGLOBAL['db']->query("SELECT b.blogid,b.friend,bf.target_ids,b.subject,bf.message,b.username,b.uid,b.pic,b.noreply,b.viewnum,b.replynum,b.dateline FROM ".tname('blog')." b 
				left join ".tname('blogfield')." bf  on b.blogid=bf.blogid where b.blogid=$blogid ");
	$blog = $_SGLOBAL['db']->fetch_array($query);	
	/*
//将日志中的图片进行绝对路径化。 start
	preg_match_all("#[<]img\s+src[=]\"(.*)\".*[>]#U",$blog['message'], $matche, PREG_SET_ORDER);
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
			$blog['message'] = str_replace($TmpFace, $newface, $blog['message']);
			}
		}

	//echo 111111111111111111111111111111111111111111;
	//print_r($HrefString);
	//echo "----matchstring: $MatchString----tmpstring: $TmpString----username: $HrefString\n";
	
			$blog['message'] = str_replace($TmpString, $HrefString, $blog['message']);
			
			}
		//将日志中的图片进行绝对路径化。  end
	*/	
	//检查权限 start 
	if(empty($blog)) {
		$result = array('flag'=>'blog_not_exist');
		returnblog($result);
	}
	//检查好友权限
	if(!ckfriend($blog['uid'], $blog['friend'], $blog['target_ids'])) {
		//没有权限
		$result = array('flag'=>'no_privilege');
		returnblog($result);
	} elseif($userid!=$blog['uid'] && $blog['friend'] == 4) {
		//密码输入问题
		$result = array('flag'=>'need_password');
		returnblog($result);
	}
	//检查权限 end
	
	realname_set($blog['uid'],$blog[username]);

	realname_get();

       
		//访问统计
		if($userid!=$blog['uid']) {
			$_SGLOBAL['db']->query("UPDATE ".tname('blog')." SET viewnum=viewnum+1 WHERE blogid='$blog[blogid]'");
			inserttable('log', array('id'=>$userid, 'idtype'=>'uid'));//延迟更新
		}	
		$result = array('flag'=>'success',
		'blog_authorpic'=>avatar($blog[uid],middle),
		'blog_author'=>$_SN[$blog[uid]],
		'blog_authorid'=>$blog[uid],
		'blog_image'=>$blog[pic],
		'blog_noreply'=>$blog[noreply],
		'blog_readnum'=>$blog[viewnum],
		'blog_replynum'=>$blog[replynum],
		'blog_time'=>$blog[dateline],
		'blog_title'=>$blog[subject],
		'blog_text'=>$blog[message]
		);
		returnblog($result);
	
	function returnblog($result){
		$result = json_encode($result);
		$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}
	//如果输出结果为空，则次日志不存在或已被删除
?>