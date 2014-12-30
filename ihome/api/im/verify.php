<?php 
 	if (!$_SGLOBAL['supe_uid']) {
 		$result = array();
 		$result['status'] = 0;
 		$result['msg'] = '蜀黍~~想、想做什么坏事的话，正义的小i可是不会答应的哦~~';
 		echo json_encode($result);
 		exit();
 	}

?>