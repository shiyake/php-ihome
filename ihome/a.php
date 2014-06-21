<?php
include ("./common.php");
$message = 'a:1:{s:7:\"message\";s:469:\"<a href=space.php?uid=1037>@后勤服务</a>  求问老师空调大概什么时候才能装上嘞<img src=\"image/face_new/face_1/10.gif\" class=\"face\">。。。寝室风扇因为一直开着已经坏了，这时候再买一个不值额……那天问过三号楼下的工作人员，他们说缺货，是真的吗<img src=\"image/face_new/face_1/10.gif\" class=\"face\">，大二狗在离开沙河前真的用不上了吗?;}';
$sql = 'UPDATE ihome_feed set title_data=\''.$message.'\' where feedid=4363;';
print_r ($sql);
$_SGLOBAL['db']->query($sql);
?>
