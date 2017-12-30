<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Shop Web</title>
</head>
<body>
	<?php  
		$Aid=$_GET['aid'];
		$TId=$_GET['trainno'];

		$conn=mysql_connect('localhost','root',null);
		mysql_select_db('train_tickets',$conn);

		$sql1='delete from train where trainno='.$TId.' LIMIT 1';     
		$sql2='delete from sale where sale.trainno='.$TId.'';
		if($result=mysql_query($sql1,$conn)){
			if(mysql_affected_rows($conn)==1){
				print '<p>删除成功...<a href="Admin_modify.php?aid='.$Aid.'">返回</a></p>';
				mysql_query($sql2,$conn);
			}else{
				print '<p>发生错误，请检查商品否存在！<a href="Admin_modify.php?aid='.$Aid.'">返回</a></p>';
			}
		}else{
			print '<p>发生错误...<a href="Admin_modify.php?aid='.$Aid.'">返回</a></p>';
		}
		mysql_close($conn);
	?>

</body>
</html>