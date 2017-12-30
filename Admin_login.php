<!DOCTYPE html>
<html>
<head>
	<Meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
	<title>Admin Login Web</title>
</head>
<body>
	<h1>请登入管理员用户：</h1>
	<form action="Handle_Admin_login.php" method="post">
		<p>帐号：<input type="text" name="aid" size="20" /></p>
		<p>密码：<input type="password" name="password" size="20" /></p>
		<input type="submit" name="submit" value="登入">
		<a href="Main.php"><input type="button" name="button" value="返回起始页面" /></a>
	</form>
</body>
</html>