<?php

if ( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	if ( $username == "admin" && $password == "123" ) {
		header("Location: admin.php");
		exit;
	} else {
		$error = true;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<?php if (isset($error)) : ?>
	<p style="color: red; font-style: italic;">username/password salah</p>
<?php endif; ?>
	<form action="" method="post">
		<label for="username">Username :</label>
		<input type="text" name="username" id="username" autocomplete="off">
		<br>
		<label for="password">Password :</label>
		<input type="password" name="password" id="password" autocomplete="off">
		<br>
		<button type="submit" name="login">Login</button>
	</form>

</body>
</html>