<?php 
require '../functions.php';
if( isset($_POST["signup"])){
	if( registrasi($_POST)>0)
	{
		echo "<script>
				alert('new customer succesfully added !');
				</script>";
				header("location:../halaman_login/login.php");
	}
	else{
		echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>signup</title>
	<link rel="stylesheet" href="registrasi.css">
</head>
<body>
	<div class="container"><br><br>
	<h2>SIGNUP</h2>
	<br>
			<form action="" method="post">
				<br>	
				<table>
					<tr>
						<td>
							<label for="username">username</label>
						</td>
						<td>
							<input type="text" name="username" id="username">
						</td>
					</tr>
					<tr>
						<td>
							<label for="email">Email</label>
						</td>
						<td>
							<input type="text" name="email" id="email">
						</td>
					</tr>
					<tr>
						<td>
							<label for="addres">Addres</label>
						</td>
						<td>
							<input type="text" name="addres" id="addres">
						</td>
					</tr>
					<tr>
						<td>
							<label for="ktp">No. KTP</label>
						</td>
						<td>
							<input type="text" name="ktp" id="ktp">
						</td>
					</tr>
					<tr>
						<td>
							<label for="password">Password</label>
						</td>
						<td>
							<input type="password" name="password" id="password">
						</td>
					</tr>
					<tr>
						<td>
							<label for="repassword">Re-Password</label>
						</td>
						<td>
							<input type="password" name="repassword" id="repassword">
						</td>
					</tr>
				</table>
				<br>	
					<button type="submit" name="signup">SIGNUP</button>
					<button type="reset" name="reset">Reset</button>	
			</form>
			<a href="../halaman_login/login.php">Back to Login</a>
	</div>
</body>
</html>