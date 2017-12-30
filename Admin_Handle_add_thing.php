<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Register Web</title>
</head>
<body>
	<?php
		$Aid=$_GET['aid'];
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$problem=FALSE;
			if(!$conn=@mysql_connect('localhost','root',null)){
				print '<p>未知错误!</p>';
				$problem=TRUE;
			}
			if(!@mysql_select_db('train_tickets',$conn)){
				print '<p>未知错误!</p>';
				$problem=TRUE;
			}
			#起点站检测
			if(!empty($_POST['start'])){
				$Start=mysql_real_escape_string(trim(strip_tags($_POST['start'])),$conn);
			}else{
				print '<p>错误：请输入起点站！</p>';
				$problem=TRUE;
			}
			#终点站检测
			if(!empty($_POST['finish'])){
				$Finish=mysql_real_escape_string(trim(strip_tags($_POST['finish'])),$conn);
			}else{
				print '<p>错误：请输入终点站！</p>';
				$problem=TRUE;
			}
			#发车时间检测
			if(!empty($_POST['starttime'])){
				$Starttime=mysql_real_escape_string(trim(strip_tags($_POST['starttime'])),$conn);
			}else{
				print '<p>错误：请输入发车时间！</p>';
				$problem=TRUE;
			}
			#车票价格检测
			if(!empty($_POST['price'])&&is_numeric($_POST['price'])){
				$Price=mysql_real_escape_string(trim(strip_tags($_POST['price'])),$conn);
			}else{
				print '<p>错误：请输入正确格式的价格！</p>';
				$problem=TRUE;
			}
			#是否有余票检测
			$Lastticket=$_POST['lastticket'];
			#插入数据
			if(!$problem){
				$sql1='insert into train (start,finish,starttime,price,lastticket) 
						values("'.$Start.'","'.$Finish.'","'.$Starttime.'",'.$Price.',"'.$Lastticket.'")';
				if(@mysql_query($sql1,$conn)){
					print '<p style="color:red;">添加成功！<a href="Admin_modify.php?aid='.$Aid.'"><b>现在查看</b></a></p>';
				}else{
					print '<p>添加失败！<a href="Admin_Add_train_num.php?aid='.$Aid.'"><b>返回重新添加</b></a></p>';
				}
			}else{
				print '<p>添加失败！<a href="Admin_Add_train_num.php?aid='.$Aid.'"><b>返回重新添加</b></a></p>';
				mysql_error($conn);
			}
			mysql_close($conn);
		}else{
			'<p>添加失败！<a href="Admin_Add_train_num.php?aid='.$Aid.'"><b>返回重新添加</b></a></p>';
		}
		
	?>

</body>
</html>