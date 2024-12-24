
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="scriptCART.js" defer></script>
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

    <div id="cart">
    <div id="productsContainer">
    
        <?php
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: startPage.php"); 
            exit();
        }
        
        $email = $_SESSION['user'];
        $suma=0;
        $conn = mysqli_connect("localhost", "root", "", "strona") or die("Błąd połączenia");
        $email_escaped = mysqli_real_escape_string($conn, $email);
        $userid = "SELECT ID_uzytkownika FROM uzytkownicy WHERE email='$email_escaped'";
        $query_id = mysqli_query($conn,$userid);
        if($query_id){
            $row = mysqli_fetch_assoc($query_id);
            if ($row) {
                $userid = $row['ID_uzytkownika'];
                
                $kwerenda = "SELECT nazwa, cena FROM zamowienie WHERE ID_uzytkownika=$userid";
                $q = mysqli_query($conn, $kwerenda);
                
                while($row=mysqli_fetch_row($q)){
                    $suma += $row[1];
                    echo "<div id='rzeczPojedyncza'><p>".$row[0]. " ".$row[1]. ".00$</p></div>";
                }

        }else{
            echo "Nie znaleziono użytkownika";
        }}
        else{
            echo "błąd";
        }
        if($suma==0){
            echo "<h1>The cart is empty!</h1>";
        }else{
            echo "<hr/><p>Total prize: $suma.00$</p>";
            echo "<form action='' method='post'><input type='submit' class='delete' name='deleteBtn' value='empty the cart' id='delete'/></form>";
        }
        
        if (isset($_POST['deleteBtn'])) {
            
            $usuwanie = "DELETE FROM `zamowienie` WHERE ID_uzytkownika=$userid";
            $queryusuwanie = mysqli_query($conn, $usuwanie);
            echo "<meta http-equiv='refresh' content='0'>";
        }


        mysqli_close($conn);
        ?>
        <p id="sum"></p>
        </div>
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