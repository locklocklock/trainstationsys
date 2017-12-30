<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Train Web</title>
</head>
<body>
	<?php
		$conn=mysql_connect('localhost','root',root);
		mysql_select_db('train_tickets',$conn);

		$Aid=$_GET['aid'];
		$sql1='select * from train';

	print '<form>
		<p>
			<b>搜索：</b>                                                                                                         
			<a href="Admin_Handle_train_time.php?Aid='.$Aid.'"><input type="button" name="button" value="按出发时间" /></a>
			<a href="Admin_Handle_train_price.php?Aid='.$Aid.'"><input type="button" name="button" value="按价格" /></a>
			<a href="Admin_main_web.php?Aid='.$Aid.'"><input type="button" name="button" value="返回主页面" /></a>
			<a href="Admin_Add_train_num.php?Aid='.$Aid.'"><input type="button" name="button" value="添加车次" /></a>
		</p>
	</form>';
 
		if($result=mysql_query($sql1,$conn)){
			while($row=mysql_fetch_array($result)){
				print "<p>
						<b>车次编号：</b>{$row['trainno']} <b>起始站：</b>{$row['start']} <b>终点站：</b>{$row['finish']}
					  </p>
					  <p>
					  	<b>发车时间：</b>{$row['starttime]} <b>价格：</b>{$row['price']} <b>剩余票数：</b><b style=\"color:red;\">{$row['lastticket']}</b></br>
					  <a href=\"Admin_Delete_train_num.php?aid=$Aid&trainno={$row['trainno']}\"><input type=\"button\" name=\"button\"   value= \"删除车票\" /></a>
					  </p>
					  </br>
					  ";
			}
		}
		mysql_close($conn);
	?>
</body>
</html>