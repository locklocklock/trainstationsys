<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Admin Web</title>
</head>
<body>
	<?php  
		$Id=$_GET['username'];
		$Aid=$_GET['aid'];

		$conn=mysql_connect('localhost','root',null);
		mysql_select_db('train_tickets',$conn);

		$sql1='delete from user where username="'.$Id.'"';
		

		if($result=mysql_query($sql1,$conn)){
			if(mysql_affected_rows($conn)==1){
				print '<p>删除该用户成功...<a href="Admin_show_user.php?aid='.$Aid.'">返回</a></p>';
			}else{
				print '<p>发生错误，请检查该用户是否存在！<a href="Admin_show_user.php?Aid='.$AId.'">返回</a></p>';
			}
		}else{
			print '<p>发生错误...<a href="Admin_show_user.php?Aid='.$AId.'">返回</a></p>';
		}
		mysql_close($conn);
	?>

</body>
</html>