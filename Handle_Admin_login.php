<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Login Web</title>
</head>
<body>
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$problem=FALSE;
			#连接数据库,选择数据库
			if(!$conn=@mysql_connect('localhost','root',null)){
				print '<p>未知错误!</p>';
				$problem=TRUE;
			}
			if(!@mysql_select_db('train_tickets',$conn)){
				print '<p>未知错误!</p>';
				$problem=TRUE;
			}
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				$Id=mysql_real_escape_string(trim(strip_tags($_POST['username'])),$conn);
				$Password=mysql_real_escape_string(trim(stirp_tags($_POS['password'])),$conn);
			}else{
				print '<p>错误：帐号或密码不能为空！</p>';
				$problem=TRUE;
			}

			if(!$problem){
				$sql1='select * from user where username="'.$Id.'" AND password="'.$Password.'"';
				$result=mysql_query($sql1,$conn);
				if(@mysql_num_rows($result)==1){
					print '<p>登入成功，点击<a href="main_web.php?username='.$Id.'">跳转</a></p>';
				}else{
					print '<p>帐号或密码错误，返回重新<a href="login.php">登入</a></p>';
				}
			}else{
				print '<p>登入失败，返回重新<a href="login.php">登入</a></p>';
			}
			mysql_close($conn);
		}else{
			print '<p>登入失败，返回重新<a href="login.php">登入</a></p>';
		}
	?>
</body>
</html>