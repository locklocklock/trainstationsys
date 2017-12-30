<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Shop Web</title>
</head>
<body>
	<?php
		$Aid=$_GET['aid'];

		print '<h2>增加车票：</h2>';
		print '<form action="Admin_handle_add_thing.php?aid='.$Aid.'" method="post">
				<p><b>起点站：</b><input type="text" name="start" size="20" /></p>
				<p><b>终点站：</b><input type="text" name="finish" size="20" /></p>
				<p><b>发车时间：</b><input type="text" name="starttime" size="20" /></p>
				<p><b>价格：</b><input type="text" name="price" size="20" /></p>
				<p><b>余票：</b><input type="text" name="lastticket" size="20" /></p>
				<p><input type="submit" name="submit" value="添加" />
					<a href="Admin_modify.php?aid='.$Aid.'"><input type="button" name="button" value="返回" /></a>
				</p></form>';
	?>
</body>
</html>