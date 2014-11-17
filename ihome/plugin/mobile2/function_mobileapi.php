<?php
	/*
		function_mobileapi.php is used to deal with the processes which are fit for mobile api.
		Added by xuxing@ihome. 2013-3-26. 
	*/

//get filepath is dir is exist, if $mkdir=true to create the dir.
//$filename is the filename of the foreign website picture, $name1 is the year and month, $name is the day.
function getforeignpicpath($filename, $name1, $name2, $mkdir=false) {
	global $_SGLOBAL, $_SC;

	$filepath = "foreign".$filename;
	//$name1 = gmdate('Ym');
	//$name2 = gmdate('j');

	chdir(dirname(dirname(dirname(__FILE__)))); //change the current dir to ihome dir.
	if($mkdir) {
		$newfilename = $_SC['attachdir'].'./'.$name1;
		if(!is_dir($newfilename)) {
			if(!@mkdir($newfilename)) {
				runlog('error', "DIR: $newfilename can not make");
				return $filepath;
			}
		}
		$newfilename .= '/'.$name2;
		if(!is_dir($newfilename)) {
			if(!@mkdir($newfilename)) {
				runlog('error', "DIR: $newfilename can not make");
				return $name1.'/'.$filepath;
			}
		}
	}
	return $name1.'/'.$name2.'/'.$filepath;
}

//get the remote site picture.
function GrabImage($url,$originname,$dir1, $dir2) {
	global $_SC;
	if($url==""|| $originname=="") return false; 
	chdir(dirname(dirname(dirname(__FILE__))));//change to the ihome dir.
	chdir($_SC['attachdir'].$dir1.'/'.$dir2);
	//echo $_SC['attachdir'].$dir1.'/'.$dir2;exit();
	$ext=strrchr($url,"."); 
	if($ext!=".gif" && $ext!=".jpg" && $ext!=".jpeg" && $ext!=".png") return false; 
	$filename="foreign".$originname; 

	ob_start(); 
	readfile($url); 
	$img = ob_get_contents(); 
	ob_end_clean(); 
	$size = strlen($img); 

	$fp2=@fopen($filename, "a"); 
	fwrite($fp2,$img); 
	fclose($fp2); 

	return $filename; 
} 

//create the smaller picture from the source.
function makemobilethumb($url, $originname, $dir1, $dir2) {
	global $_SGLOBAL, $_SC;
	//ÅÐ¶ÏÎÄ¼þÊÇ·ñ´æÔÚ
	$srcfile = GrabImage($url, $originname, $dir1, $dir2);
	chdir(dirname(dirname(dirname(__FILE__))));
	//include_once('./data/data_setting.php');
	chdir($_SC['attachdir'].$dir1.'/'.$dir2);

	if (!file_exists($srcfile)) {
		return '';
	}
	//chdir('../../');
	$filename = basename($url);
	$dstpath = $srcfile;
	$dstthumbfile = $dstpath.'.thumb.jpg';
	
	//ËõÂÔÍ¼´óÐ¡
	$tow = 60;
	$toh = 60;

	$make_mobile = 1;
	$mobiletow = 400;
	$mobiletoh = 400;
	
	//»ñÈ¡Í¼Æ¬ÐÅÏ¢
	$im = '';
	if($data = getimagesize($srcfile)) {
		if($data[2] == 1) {
			$make_mobile = 0;//make the picture fit for mobile device
			if(function_exists("imagecreatefromgif")) {
				$im = imagecreatefromgif($srcfile);
			}
		} elseif($data[2] == 2) {
			if(function_exists("imagecreatefromjpeg")) {
				$im = imagecreatefromjpeg($srcfile);
			}
		} elseif($data[2] == 3) {
			if(function_exists("imagecreatefrompng")) {
				$im = imagecreatefrompng($srcfile);
			}
		}
	}
	if(!$im) return '';
	
	$srcw = imagesx($im);
	$srch = imagesy($im);
	
	$towh = $tow/$toh;
	$srcwh = $srcw/$srch;
	if($towh <= $srcwh){
		$ftow = $tow;
		$ftoh = $ftow*($srch/$srcw);
		
		$fmobiletow = $mobiletow;
		$fmobiletoh = $fmobiletow*($srch/$srcw);
	} else {
		$ftoh = $toh;
		$ftow = $ftoh*($srcw/$srch);
		
		$fmobiletoh = $mobiletoh;
		$fmobiletow = $fmobiletoh*($srcw/$srch);
	}
	if($srcw <= $mobiletow && $srch <= $mobiletoh) {
		$make_mobile = 0;//if the source picture is smaller than the size of mobile requested, then keep the origin.
	}
	if($srcw > $tow || $srch > $toh) {
		if(function_exists("imagecreatetruecolor") && function_exists("imagecopyresampled") && @$ni = imagecreatetruecolor($ftow, $ftoh)) {
			imagecopyresampled($ni, $im, 0, 0, 0, 0, $ftow, $ftoh, $srcw, $srch);
			//´óÍ¼Æ¬
			if($make_mobile && @$mobileni = imagecreatetruecolor($fmobiletow, $fmobiletoh)) {
				imagecopyresampled($mobileni, $im, 0, 0, 0, 0, $fmobiletow, $fmobiletoh, $srcw, $srch);
			}
		} elseif(function_exists("imagecreate") && function_exists("imagecopyresized") && @$ni = imagecreate($ftow, $ftoh)) {
			imagecopyresized($ni, $im, 0, 0, 0, 0, $ftow, $ftoh, $srcw, $srch);
			//´óÍ¼Æ¬
			if($make_mobile && @$mobileni = imagecreate($fmobiletow, $fmobiletoh)) {
				imagecopyresized($mobileni, $im, 0, 0, 0, 0, $fmobiletow, $fmobiletoh, $srcw, $srch);
			}
		} else {
			return '';
		}
		if(function_exists('imagejpeg')) {
			imagejpeg($ni, $dstthumbfile);
			//´óÍ¼Æ¬
			if($make_mobile) {
				imagejpeg($mobileni, $srcfile);
			}
		} elseif(function_exists('imagepng')) {
			imagepng($ni, $dstthumbfile);
			//´óÍ¼Æ¬
			if($make_mobile) {
				imagepng($mobileni, $srcfile);
			}
		}
		imagedestroy($ni);
		if($make_mobile) {
			imagedestroy($mobileni);
		}
	}
	imagedestroy($im);

	if(!file_exists($dstthumbfile)) {
		return '';
	} else {
		return $dstthumbfile;
	}
}
?>