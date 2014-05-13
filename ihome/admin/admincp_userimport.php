<?php
if(!defined('iBUAA') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$msg = '请选择需要导入的excel文件~!';
if(isset($_POST['importsubmit'])) {
	include_once(S_ROOT.'./plugin/excel/reader.php');
	
	$file = uploadFile($_FILES['file']);
	if ($file && is_array($file)) {
		$xls = new Spreadsheet_Excel_Reader();
		$xls->setOutputEncoding('utf-8');
		$xls->read(S_ROOT.'./attachment/'.$file['filepath']);
		
		$succesNum = 0;
		$failedNum = 0;
		//从第二行开始读取数据
		for ($i=1; $i<=$xls->sheets[0]['numRows']; $i++) {
			$setarr['collegeid'] = $xls->sheets[0]['cells'][$i][1];
			$setarr['longid'] = $xls->sheets[0]['cells'][$i][2];
			$setarr['realname'] = $xls->sheets[0]['cells'][$i][3];
			
			try {
				$newdoid = inserttable('baseprofile', $setarr, 1);
			}catch(Exception $e){
				//print_r($e);
				$data[] = $setarr;
				$failedNum++;
			}
			if($newdoid){
				$list[] = $setarr;
				$succesNum++;
			}
		}
		$msg = '数据导入完毕~!成功'.$succesNum.'条,失败'.$failedNum.'条~!';
		/*
		if(empty($data)){
			foreach($data as $row){
				$name = $row['collegeid'];
				$sex = $row['longid'];
				$str .= $name."\t".$sex."\t".$row['realname']."\t\n";
			}
			$filename = date('Ymd').'.xls';
			print_r($str);
			//exportExcel($filename,$str);
			//export_csv($filename,$str);
		}
		*/		
	}else{
		$msg = '文件上传失败了~!';
	}
	//print_r($file);
	//print_r($data);
}





include_once template("admin/tpl/userimport");


function exportExcel($filename,$content){
 	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Type: application/vnd.ms-execl");
	header("Content-Type: application/force-download");
	header("Content-Type: application/download");
    header("Content-Disposition: attachment; filename=".$filename);
    header("Content-Transfer-Encoding: binary");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo $content;
}

function export_csv($filename,$data) { 
    header("Content-type:text/csv"); 
    header("Content-Disposition:attachment;filename=".$filename); 
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0'); 
    header('Expires:0'); 
    header('Pragma:public'); 
    echo $data; 
} 




?>


