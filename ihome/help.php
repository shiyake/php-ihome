<?php

include_once('./common.php');

if(empty($_GET['ac'])) $_GET['ac'] = 'activate';

$actives = array($_GET['ac'] => ' style="font-weight:bold;"');


include template('help');

?>