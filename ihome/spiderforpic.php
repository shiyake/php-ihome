<?php
include_once('./common.php');

if(is_numeric($_SERVER['QUERY_STRING'])) {
	showmessage('enter_the_space', "space.php?uid=$_SERVER[QUERY_STRING]", 0);
}
//二级域名
if(!isset($_GET['do']) && $_SCONFIG['allowdomain']) {
	$hostarr = explode('.', $_SERVER['HTTP_HOST']);
	$domainrootarr = explode('.', $_SCONFIG['domainroot']);
	if(count($hostarr) > 2 && count($hostarr) > count($domainrootarr) && $hostarr[0] != 'www' && !isholddomain($hostarr[0])) {
		showmessage('enter_the_space', $_SCONFIG['siteallurl'].'space.php?domain='.$hostarr[0], 0);
	}
}

set_time_limit(3600);
ignore_user_abort(true); 

//保存路径
$path = $_SC['attachurl'].date('Ym').'/'.date('d').'/';
//每次遍历处理一下前三天的数据
$lastDay = strtotime("-72 hours", time());

$blogs = $_SGLOBAL['db']->query("SELECT bb.blogid,bb.pic,bf.message FROM ".tname('blog')." bb JOIN ".tname('blogfield')." bf ON bb.blogid=bf.blogid AND dateline>$lastDay");
while($blog = $_SGLOBAL['db']->fetch_array($blogs)){
	//echo 'blogid--->'.$blog['blogid'].'--->';
	
	if(isOutSitePic($blog['pic'])){
		$newpath = save_pic($blog['pic'], $path);
		if($newpath){
			//echo 'new path--->'.$newpath;
			$_SGLOBAL['db']->query("UPDATE ".tname('blog')." SET pic='$newpath' WHERE blogid='$blog[blogid]'");
			$_SGLOBAL['db']->query("UPDATE ".tname('feed')." SET image_1='$newpath' WHERE dateline>$lastDay AND image_1='$blog[pic]'");
			//echo "--->pic update OK--->";
		}
	
	}

	$pattern_src = '/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg\|.png|\.jpge]))[\'|\"].*?[\/]?>/';
    $num = preg_match_all($pattern_src, $blog['message'], $match_src); 
    $pic_arr = $match_src[1]; //获得图片数组
	//print_r($pic_arr);
	$isReplaced = false;
	$newContent = $blog['message'];
    foreach ($pic_arr as $pic_item) { //循环取出每幅图的地址 
		if(isOutSitePic($pic_item)){
			$newpath = save_pic($pic_item,$path); //下载并保存图片
			if($newpath){
				$newContent = str_replace($pic_item, $newpath, $newContent);
				//echo $newContent;
				//echo '--->content pic new path--->'.$newpath.'--->';
				$isReplaced = true;
			}
		}
    }
	if($isReplaced){
		//print_r($blog['message']);
		$newContent = addslashes($newContent);
		$_SGLOBAL['db']->query("UPDATE ".tname('blogfield')." SET message='$newContent' WHERE blogid='$blog[blogid]'");
		//echo "content pics update OK".$blog['blogid'];
	}
	//echo "\n<br/>";
}




function isOutSitePic($path){
	//判断是不是站外图片
	$outSitePic = false;
	if(!empty($path) && preg_match("/([http|https]\:\/\/)?.(\.[cn|com|net|org|edu])+.*(\.[gif|jpg|png|jpge])+/", $path)){
		if(!preg_match("/(i\.buaa)/", $path)){
			//echo "out site pic--->";
			$outSitePic = true;
		}
	}
	return $outSitePic;
}


////////////////////////////////////////////////////////////////////////////


function make_dir($path){ 
//判断要保存的图片文件目录是否存在，如果不存在则创建目录，并且将目录设置为可写权限
    if(!file_exists($path)){//不存在则建立 
        $mk = @mkdir($path,0777,true); //权限 
        @chmod($path,0777); 
    } 
    return true; 
} 



function read_filetext($filepath){ 
//使用fopen打开图片文件，然后fread读取图片文件内容
    $filepath = trim($filepath); 
    $htmlfp = @fopen($filepath,"r"); 
    //远程 
    if(strstr($filepath,"://")){ 
        while($data = @fread($htmlfp,500000)){ 
            $string .= $data; 
        } 
    } 
    //本地 
    else{ 
        $string = @fread($htmlfp,@filesize($filepath)); 
    } 
    @fclose($htmlfp); 
    return $string; 
} 





function write_filetext($filepath,$string){ 
//将图片内容fputs写入文件中，即保存图片文件
    //$string = stripSlashes($string); 
    $fp = @fopen($filepath,"w"); 
    @fputs($fp,$string); 
    @fclose($fp); 
} 


function get_filename($filepath){ 
//获取图片名称，也可以自定义要保存的文件名
    $fr = explode("/",$filepath); 
    $count = count($fr)-1; 
    return $fr[$count]; 
} 



function save_pic($url,$savepath=''){ 
//调用该函数，返回保存后的图片路径
    //处理地址 
    $url = trim($url); 
    $url = str_replace(" ","%20",$url); 
    //读文件 
    $string = read_filetext($url); 
    if(empty($string)){ 
        echo "can't read file~!";
		return false;
    } 
    //文件名 
    $yuan_filename = get_filename($url); 
	$filename_arr = explode(".",$yuan_filename); 
	$count = count($filename_arr)-1; 
	$filename = 'iHome_'.date('YmdHis')."_".rand(1000, 9999).'.'.$filename_arr[$count];
    //存放目录 
    make_dir($savepath); //建立存放目录 
    //文件地址 
    $filepath = $savepath.$filename; 
    //写文件 
    write_filetext($filepath,$string);
	if(preg_match("/\./", $filepath)){
		return $filepath;
	}else{
		return false;
	}
} 





















///////