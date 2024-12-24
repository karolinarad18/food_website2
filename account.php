<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: startPage.php"); 
    exit();
}

$email = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>55</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="script.js" defer></script>

</head>
<body>
    <div id="header">
        <div id="logo">
            <a href="main.php"><img src="src/homepage.png" id="img" /></a>
        </div>
        <div id="userThings">
        <a href="shop.php"><p>Food</p></a>
        <a href="account.php"><p >Account</p></a>
            <a href="cart.php"><p>Cart</p></a>
        </div>
        
    </div>
    <div id="twojeKonto">
        <h1>Your account</h1>
    <?php
            $conn = mysqli_connect("localhost", "root", "", "strona") or die("Błąd połączenia");

            // Przygotowane zapytanie
            $q = "SELECT `Imie`, `Nazwisko`, `Email`, `Adres`, `Numer_telefonu` FROM `uzytkownicy` WHERE Email = '$email'";
            $query = mysqli_query($conn, $q);
            while($row=mysqli_fetch_row($query)){
                echo "<p class='dzialaj'>Name and surname:</p><h3 class='dane'> $row[0] $row[1]</h3>";
                echo "<p class='dzialaj'>E-mail:</p><h5 class='dane'>$row[2]</h5>";
                echo "<p class='dzialaj'>Phone number:</p><h5 class='dane'>$row[4]</h5>";
                echo "<p class='dzialaj'>Adres:</p><h5 class='dane'>$row[3]</h5>";
            }
            mysqli_close($conn);
    ?>
    <form method="POST" action="">
    <input type="submit" name="btnLogOut" id="btnLogOut" value="Log out"/>
    </form>            
            <?php

                if (isset($_POST['btnLogOut'])) {
                    session_destroy();
                    header("Location: startPage.php");
                    exit();
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
</div>
</body>
</html>