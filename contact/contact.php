<?php 
session_start();
if(!isset($_SESSION["login"]))
{
    header("location: ../halaman_login/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aBout</title>
    <link rel="stylesheet" href="contact.css">
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
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="../data_transaksi/data_transaksi.php">Transaction data</a></li>
                    <li><a href="../logout.php">LOGOUT</a></li>              
                </ul>
            </div>
        </div>
    </div>
    <div id="content">
        <br>
        <div class="bayu">
            <br><br>
            <h3>Contact Person</h3>
            <p>Bayu_(082328714044)</p>
            <p>Fikri_(085832651046)</p>     
            <p>Syaif_(082266352705)</p>
        </div>
        <br><br><br>
        <div class="bayu">
            <br><br>
            <h3>Email</h3>         
            <p>_jakartabanyu@gmail.com<p>            
            <p>_muhamadalfikri@gmail.com<p>           
            <p>_syaifulkusing@gmail.com<p>
        </div>
    </div>
    <br><br><br><br>
    <div class="footer">
        @copyriht_informatika_UAD_2019
    </div>
</div>
</body>
</body>
</html>