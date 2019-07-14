<?php 
session_start();
if(isset($_SESSION["login"]))
{
	header("location: ../menu/menu.php");
	exit;
}
require '../functions.php';
if (isset($_POST["login"]))
{
	$login_time=$_POST["login_time"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "SELECT * FROM customer WHERE name='$username'");
	if(mysqli_num_rows($result)===1){
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"]))
		{
			$addres= $row["addres"];
			$ktp=$row["ktp"];
			$insert="INSERT INTO masuk VALUES
			('', '$username', '$addres','$login_time','$ktp')";
	    	mysqli_query($conn, $insert);
	    	$_SESSION["login"]=true;
			header("location: ../menu/menu.php");
			exit;
		}
}
	$error=true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<div class="container">
		<br><br>	
			<h2>Login here</h2>
			<br>
			<clas class="form">
			<form action="" method="post">
			<input type="hidden" name="login_time" value="<?php echo date("d-M-Y h:i:s",time()+60*60*5);?>">
				<br>
				<label for="username">Username</label>
				<input type="text" name="username" id="username">
				<br><br>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
				<br><br>
				<button type="submit" name="login">LOGIN</button>
				<button type="reset" name="reset">Reset</button>
			</form>
			</clas>
			<br>
				<a href="../halaman_registrasi/registrasi.php">Creat an account ?</a>
				<?php if(isset($error)) :?>
					<p>Password and username not same !!!</p>
				<?php endif; ?>
	</div>
</body>
</html>