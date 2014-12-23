<?php


include_once('./common.php');

if (isset($_GET["appsname"]))
	{
		$name = $_GET["appsname"];
		include_once(S_ROOT.'./source/apps_'.$name.'.php');
	}

else include_once template("apps_all");

?>