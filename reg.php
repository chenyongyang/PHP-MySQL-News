<!doctype html>
	<head>
		<meta charset="UTF-8">
		<title>注册验证</title>
	</head>
	<body>
		<?php
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$con = mysql_connect("localhost","root","root");
			mysql_select_db("XIAKE", $con);
			mysql_query("set names 'utf8'");
			$result = mysql_query("SELECT * FROM user");
			$sign=0;
			while($row = mysql_fetch_array($result))
			{
				if($row['username']==$username){
					$sign=1;
				}
			}
			if($sign==1)
			{
				echo "用户名已存在！请更换用户名重新注册。";
				header('Refresh:1,URL = reg.html');
			}	
			else
			{
				mysql_query(
				"INSERT INTO `user` VALUES ("
				."'"
				.$username
				."','"
				.$password
				."'"
				.");"
				);
				echo "注册成功！正跳转至登录页面...";
				header('Refresh:1,URL = login.html');
			}	
		?>
	</body>
</html>
