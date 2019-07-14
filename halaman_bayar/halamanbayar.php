<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header("location: ../halaman_login/login.php");
    exit;
}
require '../functions.php';
$tempattanggal = query("SELECT * FROM tempattanggal ORDER BY id DESC LIMIT 1")[0];
$masuk = query("SELECT * FROM masuk ORDER BY id DESC LIMIT 1")[0];
$tempattmobil =query("SELECT * FROM tempattmobil ORDER BY id DESC LIMIT 1")[0];
if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $addres=$_POST["addres"];
    $ktp=$_POST["ktp"];
    $totalday= $_POST["totalday"];
	$calender1=$_POST["calender1"];
    $price=$_POST["price"];
    $car=$_POST["car"];
    $totalprice=$_POST["totalprice"];
    $transaction_time=$_POST["transaction_time"];
    $insert="INSERT INTO transaksiakhir VALUES
    ('', '$name', '$addres','$ktp', '$transaction_time', '$calender1', '$totalday', '$car', '$price', '$totalprice')";
    mysqli_query($conn, $insert); echo "<script>
		alert('transaksi berhasil !');
        </script>";
        header("location: ../menu/menu.php");
       
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="nota.css">
    <title>bayar</title>
</head>
<body>
<script language="javascript">
window.onscroll = changePos;
function changePos() {
    var header = document.getElementById("header");
    if (window.pageYOffset > 50) {
        header.style.position = "absolute";
        header.style.top = pageYOffset + "px";
    } else {
        header.style.position = "";
        header.style.top = "";
    }
  var content = document.getElementById("content");
    if (window.pageYOffset > 50) {
        content.style.marginTop = "50px";
    } else {
        content.style.marginTop = "0";
    }
}
</script>
<div id="container">
    <div class="domain_header">
        <div class="head">
            <div class="name"> 
                CAR RENTAL
            </div>
        </div>
    </div>
    <div id="header">
		<div class="head">
            <div id="nav">
                <ul>
                    <li><a href="../menu/menu.php">Home</a></li>
                    <li><a href="../about/about.php">About</a></li>
                    <li><a href="../contact/contact.php">Contact</a></li>
                    <li><a href="../data_transaksi/data_transaksi.php">Transaction Data</a></li>
                    <li><a href="../logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <form action="" method="post">

            <div class="chose"><p>Payment Notes</p></div>
            <table cellspacing="20">
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                    :<input type="text" name="name" value="<?php echo $masuk["name"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Addres
                    </td>
                    <td>
                       :<input type="text" name="addres" value="<?php echo $masuk["addres"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        NO. Ktp
                    </td>
                    <td>
                       :<input type="text" name="ktp" value="<?php echo $masuk["ktp"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Rent Date
                    </td>
                    <td>
                       :<input type="text" name="calender1" value="<?php echo $tempattanggal["date_rent"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Total of Day
                    </td>
                    <td>
                       :<input type="text" name="totalday" value="<?php echo $tempattanggal["totalday"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                       Car
                    </td>
                    <td>
                       :<input type="text" name="car" value="<?php echo $tempattmobil["car"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Price
                    </td>
                    <td>
                       :<input type="text" name="price" value="<?php echo $tempattmobil["price"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Total price
                    </td>
                    <td>
                       :<input type="text" name="totalprice" value="<?php echo $tempattmobil["total price"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Time
                    </td>
                    <td>
                       :<input type="text" name="transaction_time" value="<?php echo $tempattanggal["transaction_time"] ?>">
                    </td>
                </tr>
                
            </table>
            <br><br>
                <button type="submit" name="submit">PAY</button>
        </div>
    </form>
    <br><br><br><br><br><br><br><br>
    <div class="footer">
        @copyriht_informatika_UAD_2019
    </div>
</div>
</body>
</html>