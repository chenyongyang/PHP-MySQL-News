<!doctype html>
<head>
	<meta charset="UTF-8">
	<title>侠客网主页</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
</head>
<body>
	<div class="wrap">
		<div class="wraplg">
			<img class="logo" src="./img/logo.png">
			<span>侠客网</span>
		</div>
		<div class="wrapa">
			<a href="./login.html">登录</a>
			<a href="./reg.html">注册</a>
			<a href="./createinfo.php">发布信息</a>
		</div>
		<div class="cardwrap">
			<?php
				error_reporting(E_ALL^E_NOTICE);
				$con = mysql_connect("localhost","root","root");
				mysql_select_db("XIAKE", $con);
				mysql_query("set names 'utf8'");
				$rs = mysql_query("SELECT * FROM info",$con);
				if(mysql_affected_rows()){
					while($row = mysql_fetch_array($rs)){
						echo '<div class="card"><img class="imghover" src="'.$row['pic'].'" onclick="javascript:window.location.href=\'info.php?name='.$row['name'].'\'" />'.'<span>'.$row['name'].'</span></div>';
					}
				}else{
					echo "数据库暂无数据！";
				}
			?>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>
