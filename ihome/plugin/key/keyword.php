<html xmlns="http://ihome.buaa.edu.cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tag Clouds</title>
<link rel="stylesheet" type="text/css" href="ball.css" />
<script type="text/javascript" src="ball.js"></script>
</head>

<body>
<div id="div1">
	<?php
		$colors = array(
			1 => "a",
			2 => "b",
			3 => "c",
			4 => "d",
			5 => "e",
			6 => "f",
			7 => "g",
			8 => "h",
			9 => "i",
			10 => "j",
		);
		$array = file("keyword.txt");
		for($i = 1; $i <= 10; $i++)
		{
			echo "<a href=\"http://ihome.buaa.edu.cn/?$array[$i]\" class=\"$colors[$i]\">$array[$i]</a>";
		}
	?>
</div>
<p>Tag Clouds <a href="http://ihome.buaa.edu.cn">http://ihome.buaa.edu.cn</a></p>
</body>
</html>
