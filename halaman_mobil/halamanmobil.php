<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header("location: ../halaman_login/login.php");
    exit;
}
require '../functions.php';
$totalday = query("SELECT * FROM tempattanggal ORDER BY id DESC LIMIT 1")[0];
if (isset($_POST["submit"]))
{
    $price;
    $total;
    $totalday=$_POST["totalday"];
    $car=$_POST["car"];
    if($car=="avanza")
    {
        $price=400000;
    }
    else if($car=="xenia")
    {
        $price=400000;
    }
    else if($car=="calya")
    {
        $price=300000;
    }
    else if($car=="fortuner")
    {
        $price=700000;
    }
    else if($car=="ertiga")
    {
        $price=500000;
    }
    else if($car=="inova")
    {
        $price=600000;
    }
    if($price>0)
    {
    $total=$price*$totalday;
    $insert="INSERT INTO tempattmobil VALUES
            ('', '$car', '$price', '$total')";
    mysqli_query($conn, $insert);
    header("location:../halaman_bayar/halamanbayar.php");
    }
    else
    {
        echo "<script>
                alert('Data must be complete !');
                </script>";
                header("location:../halaman_mobil/halamanmobil.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="mobil.css">
    <title>halamanmobil</title>
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
                    <li><a href="../data_transaksi/data_transaksi.php">Transaction Date</a></li>
                    <li><a href="../logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="content">
    <form action="" method="post">
    <input type="hidden" name="totalday" value="<?php echo $totalday["totalday"] ?>">
        <br><br>
        <div class="kotak">
            <br>
            <div class="avanza">
                <br>
                <input type="checkbox" name="car" value="avanza">
                <button type="submit" name="submit">Rent Now</button>
            </div>
            <div class="xenia"><br>
                <input type="checkbox" name="car" value="xenia">
                <button type="submit" name="submit">Rent Now</button>
            </div> 
        </div>
        <div class="kotak">
            <div class="fortuner"><br>
                <input type="checkbox" name="car" value="fortuner">
                <button type="submit" name="submit">Rent Nowt</button>
            </div>
            <div class="calya"><br>
                <input type="checkbox" name="car" value="calya">
                <button type="submit" name="submit">Rent Now</button>
            </div> 
            <br>
        </div>
        <div class="kotak">
            <div class="inova"><br>
                <input type="checkbox" name="car" value="inova">
                <button type="submit" name="submit">Rent Now</button>
            </div> 
            <div class="ertiga"><br>
                <input type="checkbox" name="car" value="ertiga">
                <button type="submit" name="submit">Rent Now</button>
            </div> 
        </div>
        <br>
    </form>
    </div>
    <br><br><br><br>
    <div class="footer">
        @copyriht_informatika_UAD_2019
    </div> 
</div>
</body>
</html>