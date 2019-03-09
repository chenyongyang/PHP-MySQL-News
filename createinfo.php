<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>侠客信息发布系统</title>
	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
	<script type="text/javascript" src="./js/createinfo.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/createinfo.css">
</head>
<body>
	<?php
		session_start(); 
		if (isset($_SESSION["logined"]) && $_SESSION["logined"] == 'yes') {
			echo '<div class="hwrap">';
			echo '<span class="hspan">欢迎你，'.$_SESSION['loginid'].'!</span>';
			echo '<a class="headera" href="./login.php?action=out">退出登录</a>';
			echo '<a class="headera" href="../index/index.php">返回主页</a>';
			echo '</div>';
			echo '
				<div class="wrap">
					<div class="header">
						<h1>侠客信息发布系统</h1>
					</div>
					<form name="example" method="post" action="createinfo.php">
						<table border="1">
							<tr>
								<td class="key">上传头像：</td>
								<td><textarea type="edit" name="pic"></textarea></td>
							</tr>
							<tr>
								<td class="key">姓名：</td>
								<td><textarea type="edit" name="name"></textarea></td>
							</tr>
							<tr>
								<td class="key">年龄：</td>
								<td><textarea type="edit" name="age"></textarea></td>
							</tr>
							<tr>
								<td class="key">性别：</td>
								<td><textarea type="edit" name="sex"></textarea></td>
							</tr>
							<tr>
								<td class="key">所属门派：</td>
								<td><textarea type="edit" name="type"></textarea></td>
							</tr>
							<tr>
								<td class="key">掌握武功：</td>
								<td><textarea type="edit" name="skill"></textarea></td>
							</tr>
							<tr>
								<td colspan="2" class="col2">
									<input type="submit" id="btn" name="submit" value="发布" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			';
		}else{
			header('Refresh:2,URL=login.html');
			echo '请先登录！';
			die;
		}
		if(isset($_POST['submit']))
		{		
			$con = mysql_connect("localhost","root","root");
			mysql_query("set names 'utf8'");
			mysql_select_db("XIAKE", $con);
			$db_table="info";
			$name=$_REQUEST['name'];
			$age=$_REQUEST['age'];
			$sex=$_REQUEST['sex'];
			$type=$_REQUEST['type'];
			$skill=$_REQUEST['skill'];
			$pic=stripcslashes($_REQUEST['pic']);
			preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i',$pic,$match);
			$picdir = $match[1];
			$query=
			"INSERT INTO " . $db_table . "(pic,name,age,sex,type,skill) VALUES ("
			. "'" . $picdir . "',"
			. "'" . $name . "',"
			. "'" . $age . "',"
			. "'" . $sex . "',"
			. "'" . $type . "',"
			. "'" . $skill . "')";
			mysql_query($query) 
			or die("Invalid query: " . mysql_error());
			echo '<script language="javascript">alert("发布成功!")</script>';
		}
	?>
</body>
</html>