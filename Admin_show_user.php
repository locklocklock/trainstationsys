<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Admin Web</title>
</head>
<body>
	<?php  
		$Aid=$_GET[aid'];
		$conn=mysql_connect('localhost','root',null);
		mysql_select_db('train_tickets',$conn);

		print '<h2>该系统所有用户为：</h2>';
		$sql1='select * from user';
		if($result=mysql_query($sql1,$conn)){
			if(mysql_num_rows($result)==0){
				print '<p>该系统没有注册用户</p> <a href="Admin_main_web.php?aid='.$Aid.'">返回</a></p>';
			}else{
				while($row=mysql_fetch_array($result)){
					print '<p><b>用户名：</b><b style="color:red;">'.$row['username'].'</b> <b>证件类型：</b>'.$row['type'].'';
					print '<p><a href="What_is_user.php?aid='.$Aid.'&id='.$row['username'].'"><input type="button" name="button1" value="查看该用户详细信息" /> ';
					print '<a href="Admin_Delete_user.php?aid='.$Aid.'&id='.$row['username'].'"><input type="button" name="button2" value="删除该用户" /></a></p>';
				}
			}
		}else{
			print '<p>发生错误,<a href="Admin_main_web.php?aid='.$Aid.'">返回</a></p>';
		}
		print '<p><a href="Admin_main_web.php?aid='.$Aid.'"><input type="button" name="button3" value="返回" /></a></p>';
		mysql_close($conn);
	?>

</body>
</html>