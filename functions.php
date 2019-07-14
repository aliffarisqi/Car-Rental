<?php 
//koneksi dengan mysql dengan mysqli

$conn = mysqli_connect("localhost", "root", "", "finalproject");

function query($salamm)
{
	global $conn;
	$result = mysqli_query($conn, $salamm);
	$rows=[];
	while ($row=mysqli_fetch_assoc($result)) {
		$rows[]=$row;
	}
	return $rows;
}

function registrasi($data)
{
	global $conn;
		/*stripslashes berfungsi untuk menghilangkan tanda
		strtolower berfungsi untuk menjadikan semua huruf kecil

		mysqli_real_escape_string berfungsi user memasukan tanda petik*/
	$username = strtolower(stripslashes($data["username"]));
	$email = strtolower(stripslashes($data["email"]));
	$addres = strtolower(stripslashes($data["addres"]));
	$ktp = strtolower(stripslashes($data["ktp"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$repassword = mysqli_real_escape_string($conn, $data["repassword"]);

	//cek username
	$result=mysqli_query($conn, "SELECT name FROM customer WHERE name = '$username'");
	//bisa asoc atau rows atau yang lain
	if(mysqli_fetch_assoc($result)){
		echo "<script>
					alert('username yang anda masukan sudah ada');
				</script>"	;
				return false;
	}

	//cek konfirmasi password
	if( $password !== $repassword)
	{
		echo "<script>
			alert('konfirmasi password tidak sesuai!');
			</script>";
			return false;
	}  
	//enkripsi
	$password=password_hash($password, PASSWORD_DEFAULT);

	//TAMBAH KE DATABASE;
	mysqli_query($conn, "INSERT INTO customer VALUES('', '$username', '$email', '$addres', '$ktp', '$password')");

	return mysqli_affected_rows($conn);
}

?>