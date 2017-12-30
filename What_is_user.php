<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Admin Web</title>
</head>
<body>
	<?php  
		$Aid=$_GET['aid'];
		$Id=$_GET['username'];

		$conn=mysql_connect('localhost','root',null);
		mysql_select_db('train_tickets',$conn);

		print '<h2>该用户详细信息：</h2></br>';
		print '<h3>用户基本资料：</h3>';
		$sql1='select * from user where username="'.$Id.'"';
		if($result=mysql_query($sql1,$conn)){
			$row=mysql_fetch_array($result);
				print '<p><b>用户名：</b>'.$Id.'</p>';
				print '<p><b>登入密码：</b>'.$row['password'].'</p>';
				print '<p><b>证件类型：</b>'.$row['type'].'</p>';
			
		}else{
			print '<p>发生错误，<a href="Admin_show_user.php?aid='.$Aid.'">返回</a></p>';
		}

		
		print '<p><a href="Admin_show_user.php?Aid='.$AId.'"><input type="button" name="button3" value="返回主页面" /></a></p>';
		mysql_close($conn);
	?>
 
</body>
</html>