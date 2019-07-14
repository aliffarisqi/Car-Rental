<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header("location: ../halaman_login/login.php");
    exit;
}
require '../functions.php';
if(isset($_POST["submit"]))
{
    if($_POST["totalday"]==0||$_POST["calender1"]==00000000000000)
    {
        $error=true;
    }
    else {
    $transaction_time=$_POST["transaction_time"];
	$totalday= $_POST["totalday"];
	$calender1=$_POST["calender1"];
    $insert="INSERT INTO tempattanggal VALUES
            ('', '$totalday', '$calender1', '$transaction_time')";
    mysqli_query($conn, $insert);
    header("location:../halaman_mobil/halamanmobil.php");}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mainmenu</title>
	<link rel="stylesheet" href="utama.css">
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
                    <li><a href="../contact/cobtact.php">Contact</a></li>
                    <li><a href="../data_transaksi/data_transaksi.php">Transaction Date</a></li>
                    <li><a href="../logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
	</div>
	<form action="" method="post">
	    <div class="today"><p>Today</p>
            <?php $today=date("D-d-M-Y h:i:s",time()+60*60*5);
                echo $today;?>
        </div>
        <input type="hidden" name="transaction_time" value="<?php echo date("d-M-Y h:i:s",time()+60*60*5);?>">
            <div class="chose"><p>Chose Date Rental</p></div>
            <table cellspacing="20">
                <tr>
                    <td>
                        <label for="totadday">Total of Day</label>
                    </td>
                    <td>
	                    <input type="number" name="totalday">
                    </td>
                </tr>
                <tr>
                    <td>
	                    <label for="calender1">Rental Date Start</label>
                    </td>
                    <td>
                        <input type="datetime-local" name="calender1" id="calender1" ><br><br>
                    </td>
                </tr>
            </table>
            <br><br>
                <button type="submit" name="submit">Search Car Now</button><?php if(isset($error)) :?>
					<div class="anouncement"><p>Date must Completed!!!</p></div>
				<?php endif; ?>
		</form>
    <br><br><br><br><br><br><br><br>
    <div class="footer">
        @copyriht_informatika_UAD_2019
    </div>
</div>
</body>
</html>