<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header("location: ../halaman_login/login.php");
    exit;
}
require '../functions.php' ;
$dattrans= query("SELECT * FROM transaksiakhir"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>data transaksi</title>
    <link rel="stylesheet" href="nota.css">
</head>
<body>
<script language="javascript">
window.onscroll = changePos;

function changePos() {
    var header = document.getElementById("header");
    if (window.pageYOffset > 70) {
        header.style.position = "absolute";
        header.style.top = pageYOffset + "px";
    } else {
        header.style.position = "";
        header.style.top = "";
    }
  var content = document.getElementById("content");
    if (window.pageYOffset > 70) {
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
                    <li><a href="data_transaksi.php">Transaction Data</a></li>
                    <li><a href="../logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="content">
    <br><br><br>
    <table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Name</th>
            <th>Addres</th>
            <th>Ktp</th>
            <th>Transaction_date</th>
			<th>Rent Date</th>
			<th>Total of day</th>
			<th>car</th>
            <th>price</th>
            <th>total price</th>
		</tr>
		<?php $i=1; ?>
		<?php foreach ($dattrans as $row): ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["addres"]; ?></td>
            <td><?php echo $row["ktp"]; ?></td>
            <td><?php echo $row["transaction_time"]; ?></td>
			<td><?php echo $row["date_rent"]; ?></td>
            <td><?php echo $row["total_day"]; ?></td>
            <td><?php echo $row["car"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td><?php echo $row["total_price"]; ?></td>		
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
    <br><br><br><br>
    <div class="footer">
        @copyriht_informatika_UAD_2019
    </div>
</div>
</body>
</html>