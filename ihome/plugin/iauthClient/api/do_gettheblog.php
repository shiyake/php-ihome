<?php
/*
     gettheblog.php用于获得用户的具体信息
     Add by am@ihome.2012-10-08  16:58
	 modified by xuxing@ihome. 2012-12-5 22:46

*/
    //include_once('../../common.php'); 
	//include_once(S_ROOT.'./uc_client/client.php');
    include_once('../iauth_verify_forward.php');	
	include_once('../../../common.php');
    $userid = intval(iauth_verify());
	//@include_once(S_ROOT.'./data/data_profield.php');
	
	$blogid = intval(trim($_POST[blogid]));
	/*$blogid=89;
	$userid = 18;
	$username = 'seen';
	$_SGLOBAL['supe_uid'] = $userid;
	$_SGLOBAL['supe_username'] = $username;*/
	
	getmember();
	//print_r($_SGLOBAL);exit();
	
	$result = array();

	$query = $_SGLOBAL['db']->query("SELECT b.blogid,b.friend,bf.target_ids,b.subject,bf.message,b.username,b.uid,b.pic,b.noreply,b.viewnum,b.replynum,b.dateline FROM ".tname('blog')." b 
				left join ".tname('blogfield')." bf  on b.blogid=bf.blogid where b.blogid=$blogid ");
				$blog = $_SGLOBAL['db']->fetch_array($query);
	//检查权限 start 
	if(empty($blog)) {
		$result = array('flag'=>'blog_not_exist');
		returnvalue($result);
	}
	//检查好友权限
	if(!ckfriend($blog['uid'], $blog['friend'], $blog['target_ids'])) {
		//没有权限
		$result = array('flag'=>'no_privilege');
		returnvalue($result);
	} elseif($userid!=$blog['uid'] && $blog['friend'] == 4) {
		//密码输入问题
		$result = array('flag'=>'need_password');
		returnvalue($result);
	}
	//检查权限 end
	
	realname_set($blog['uid'],$blog[username]);
	realname_get();

       
	   /* preg_match_all("#[<]a(.*)[>](.*)[<][\][/]a[>]#U",$blog['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$TmpString = $item[1]; 
			$HrefString = $item[2];	
			$blog['message'] = str_replace($MatchString, $HrefString, $blog['message']);
			
		}
				
		//去除<b> start
		preg_match_all("#[<]b[>](.*)[<][\][/]b[>]#U",$blog['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$HrefString = $item[1];
	
			$blog['message'] = str_replace($MatchString, $HrefString, $blog['message']);
			
		}
		//去除<b> end
		//去除<i> start
		preg_match_all("#[<]i[>](.*)[<][\][/]i[>]#U",$blog['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$HrefString = $item[1];
	
			$blog['message'] = str_replace($MatchString, $HrefString, $blog['message']);
			
		}
		//去除<i> end
		//去除<div> start
		preg_match_all("#[<]div[>](.*)[<][\][/]div[>]#U",$blog['message'], $matches, PREG_SET_ORDER);

		foreach($matches as $item){
			$MatchString = $item[0]; 
			$HrefString = $item[1];
	
			$blog['message'] = str_replace($MatchString, "\n".$HrefString, $blog['message']);
			
		}
		//去除<div> end*/
		
			 //$blog['message'] = str_replace("#[<][/]div[>]#U", "[/]n", $blog['message']);
			
		//访问统计
		if($userid!=$blog['uid']) {
			$_SGLOBAL['db']->query("UPDATE ".tname('blog')." SET viewnum=viewnum+1 WHERE blogid='$blog[blogid]'");
			inserttable('log', array('id'=>$userid, 'idtype'=>'uid'));//延迟更新
		}	
		$result = array('flag'=>'success','blog_authorpic'=>avatar($blog[uid],small),'blog_title'=>$blog[subject],'blog_text'=>$blog[message],'blog_author'=>$_SN[$blog[uid]],'blog_authorid'=>$blog[uid],'blog_image'=>$blog[pic],'blog_noreply'=>$blog[noreply],'blog_readnum'=>$blog[viewnum],'blog_replynum'=>$blog[replynum],'blog_time'=>$blog[dateline]);
		returnvalue($result);
	
	function returnvalue($result){
		$result = json_encode($result);
		$result = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $result);
		echo $result;
		exit();
	}
	//如果输出结果为空，则次日志不存在或已被删除
?>