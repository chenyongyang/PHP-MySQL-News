<!doctype html>
	<head>
		<meta charset="UTF-8">
		<title>登录验证</title>
	</head>
	<body>
		<?php
			error_reporting(E_ALL^E_NOTICE);
			if(isset($_GET['action']) && $_GET['action'] == "out"){
				session_start();
				unset($_SESSION['logined']);
				unset($_SESSION['loginid']);
				echo '注销成功！';
				header('Refresh:1,URL=login.html');
				exit;
			}
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$con = mysql_connect("localhost","root","root");
			mysql_select_db("XIAKE", $con);
			mysql_query("set names 'utf8'");
			$result = mysql_query("SELECT * FROM user");
			$sign=0;
			$ifid=0;
			while($row = mysql_fetch_array($result)){
				if($row['username']==$username){
					$ifid=1;
				}
				if($row['username']==$username && $row['password']==$password){
					$sign=1;
				}
			}
			if($ifid==0){
				echo "用户不存在，请先注册！";
				header('Refresh:1,URL = reg.html');
			}
			else{
				if($sign==1)
				{
					echo "登录成功！页面1秒钟后会自动跳转";
					session_start(); 
					$_SESSION['logined'] = 'yes';
					$_SESSION['loginid'] = $username;
					header('Refresh:1,URL = createinfo.php');
				}	
				else
				{
					echo "密码错误，请重新登录！";
					header('Refresh:1,URL = login.html');
				}	
			}
		?>
	</body>
</html>
