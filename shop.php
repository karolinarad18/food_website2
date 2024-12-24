

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="scriptSHOP.js" defer></script>
</head>
<body>
<div id="header">
        <div id="logo">
        <a href="main.php"><img src="src/homepage.png" id="img" /></a>
        </div>
        <div id="userThings">
            <a href="shop.php"><p>Food</p></a>
            <a href="account.php"><p>Account</p></a>
            <a href="cart.php"><p>Cart</p></a>
        </div>
</div>
<div id="yy">
    <p id="ourmost">order now</p>
    <h1 id="allproducts">the best dishes</h1>
</div>
<div id="shopping">
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: startPage.php");
    exit();
}

$email = $_SESSION['user'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents("php://input");
    $rzeczy = json_decode($data, true);

    if ($rzeczy && isset($rzeczy["nazwa"]) && isset($rzeczy["cena"])) {
        echo $rzeczy["nazwa"];

        $conn = mysqli_connect("localhost", "root", "", "strona") or die("Błąd połączenia");
        $email_escaped = mysqli_real_escape_string($conn, $email); 
        $userid_query = "SELECT ID_uzytkownika FROM uzytkownicy WHERE email='$email_escaped'";
        $query_id = mysqli_query($conn, $userid_query);

        if($query_id){
            $row = mysqli_fetch_assoc($query_id);
            if ($row) {
                $userid = $row['ID_uzytkownika'];
                $nazwa_produktu_escaped = mysqli_real_escape_string($conn, $rzeczy["nazwa"]); 
                $cena = mysqli_real_escape_string($conn, $rzeczy["cena"]); 
                $wprowadzanieDanych = "INSERT INTO `zamowienie`( `ID_uzytkownika`, `nazwa`,`cena` ) VALUES ('$userid','$nazwa_produktu_escaped','$cena')";
                $q = mysqli_query($conn, $wprowadzanieDanych);
                if($q){
                    echo "dodano";
                }else{
                    echo "nie dodano:(";
                }
            }
        } else {
            echo "Błąd zapytania do bazy danych.";
        }
    } else {
        echo "Brak poprawnych danych.";
    }
}
?>



</div>
<div id="opis">
        <h1 >Enjoy your food!</h1>
        <img src="src/1.png" class="object" data-value="-2"/>
        <img src="src/2.png" class="object" data-value="6"/>
        <img src="src/3.png" class="object" data-value="4"/>
        <img src="src/4.png" class="object" data-value="-6"/>
        <img src="src/5.png" class="object" data-value="8"/>
        <img src="src/6.png" class="object" data-value="-4"/>
        <img src="src/7.png" class="object" data-value="-9"/>
    </div>
    <script>
    document.addEventListener("mousemove", parallax);

    function parallax(e) {
        document.querySelectorAll('.object').forEach(function(move) {
            var moving_value = move.getAttribute("data-value");
            var x = (e.clientX * moving_value) / 250;
            var y = (e.clientY * moving_value) / 250;

            move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
        });
    }
</script>
<div id="footer">
    <div id="footerTOP">
        <div id="left">
            <p>About us</p>
            <p>Contact us</p>
            <p>Returns and refunds</p>
            <p>Follow your order</p>
            <p>Shipping</p>
        </div>
        <div id="right">
            <p>Privacy policy</p>
            <p>Cookie policy</p>
            <p>DPO</p>
            <p>Follow us</p>
        </div>
    </div>
    <hr/>
    <p id="copyright">Powered by radu Copyright 2024 raducka S.p.A. - All rights reserved - VAT 05412951005 Vendor information</p>
</div>
</body>
</html>
