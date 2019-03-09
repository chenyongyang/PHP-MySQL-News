<!doctype html>
	<head>
		<meta charset="UTF-8">
		<title>侠客信息详情页</title>
		<link rel="stylesheet" type="text/css" href="./css/info.css">
	</head>
	<body>
		<h1>侠客信息详情页</h1>
		<a href="./index.php">返回主页</a>
		<?php 
			header("content-type:text/html; charset=utf-8");
			$name = $_REQUEST['name'];
			$con = mysql_connect("localhost","root","root");
			mysql_query("set names 'utf8'");
			mysql_select_db("XIAKE", $con);
			$sql = "SELECT * FROM `info` WHERE `name` = '$name'";
			$result = mysql_query($sql,$con);
			if(mysql_affected_rows()){
				echo "<table border='1' cellpadding='10' style='margin:0 auto;margin-top:50px;background-color:#fff;'>";
				while($row = mysql_fetch_assoc($result)){
					echo 
					'<tr><td class="key">头像：</td><td><img src="'.$row['pic'].'" /></td></tr>'
					.'<tr><td class="key">姓名：</td><td>'.$row['name'].'</td></tr>'
					.'<tr><td class="key">年龄：</td><td>'.$row['age'].'</td></tr>'
					.'<tr><td class="key">性别：</td><td>'.$row['sex'].'</td></tr>'
					.'<tr><td class="key">所属门派：</td><td>'.$row['type'].'</td></tr>'
					.'<tr><td class="key">掌握武功：</td><td>'.$row['skill'].'</td></tr>';
				}
				echo "</table>";
			}else{
				echo "数据库暂无数据！";
			}
		?>
	</body>
</html>