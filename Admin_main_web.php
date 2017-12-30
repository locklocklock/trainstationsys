<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Admin Main Web</title>
</head>
<body>
	<?php
		$conn=mysql_connect('localhost','root',null);
		mysql_select_db('train_tickets',$conn);

		$Aid=$_GET['aid'];
		$sql1="select * from admin where Aid='$aid'";

		if($result=mysql_query($sql1,$conn)){
			$row=mysql_fetch_array($result);
			print "<p><h2>欢迎管理员{$row['aname']}...</h2></p>";
			print   '<p><ul>
						<li><a href="Admin_show_user.php?aid='.$Aid.'">用户管理</a></li>
						<li><a href="Admin_modify.php?aid='.$Aid.'">车票管理</a></li>
						<li><a href="Admin_login.php">退出</a></li>
					';
		}else{
			print '<p>连接数据库失败！<a href="admin_login.php">返回</a></p>';
		}
		mysql_close($conn);
	?>
</body>
</html>