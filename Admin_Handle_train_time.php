<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Shop Web</title>
</head>
<body>
	<?php
		$Aid=$_GET['aid'];
		print '<form action="Admin_Handle_train_time.php?aid='.$Aid.'" method="post">
					<p><b>按类型：</b><input type="text" name="seltype" size="20" />
						<input type="submit" name="submit" value="搜索" />
					<a href="Admin_modify.php?aid='.$Aid.'"><input type="button" name="button" value="返回" /></a></p>
				</form>';

		$conn=mysql_connect('localhost','root',null);
		mysql_select_db('train_tickets',$conn);

		if(isset($_POST['seltime'])){
			$SEL=$_POST['seltime'];
			$sql1='select * from train where starttime like "%'.$SEL.'%"';
		}else{
			$sql1='select * from train';
		}

		if($result=mysql_query($sql1,$conn)){
			if(mysql_num_rows($result)==0){
				print '没有';
			}else{
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
			
		}else{
			print '未知错误，请<a href="Admin_modify.php?aid='.$Aid.'">返回</a>';
		}
		mysql_close($conn);
	  ?>

</body>
</html>