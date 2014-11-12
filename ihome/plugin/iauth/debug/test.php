<?php
// this file is ONLY used for online hot-fix test,
// which can be safely override ANY time.
// songjinghe last modifed on 2014-09-19 20:29

ini_set('display_errors',1);
error_reporting(E_ALL);
header('Content-Type: text/plain;charset=utf-8');

print_r($_SERVER);
echo file_get_contents('php://input');

?>
