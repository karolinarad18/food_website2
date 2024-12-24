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
    <title>Main Page</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div id="header">
        <div id="logo"></div>
        <div id="userThings">
        <a href="shop.php"><p>Food</p></a>
            <a href="account.php"><p >Account</p></a>
            <a href="cart.php"><p>Cart</p></a>
        </div>
    </div>

    
        
        
    <div id="main">
        <div id="bottom">
        <h4>FOOD</h4>
        <p>Most popular foods</p>
        <a href="shop.php"><button id="discoverButton">Order now</button></a>
        </div>
        <div id="top">
            <img src="src/BACK.png"/>
        
        </div>
    </div>
    <div id="zakupy">
        <button class="hidden">ABOUT US</button><br/>
        <h1 id="about" class="hidden">Discover our Restaurant</h1>     
        <p class="hidden">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique ligula id velit vestibulum pretium.

        </p>
        <br/>
        <hr/>
        
        <p class="hidden">Opening Table</p>
        <h2 class="hidden">Monday To Tuesday</h2>
        <p class="hidden">9:00am - 10:00pm </p>
        <h2 class="hidden">Weekends</h2>
        <p class="hidden">9:00am - 12:00pm </p>
        
    </div>
    

    <div id="aside">
        
        <div id="first" class="logo hidden">
            <img src="src/man1.png"/>
            <p>The food was excellent and so was the service.  I had the mushroom risotto with scallops which was awesome. My wife had a burger over greens (gluten-free) which was also very good. They were very conscientious about gluten allergies. The restaurant has a vey nice ambiance and a cozy bar.</p>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
        <div id="second" class="logo hidden">
        <img src="src/woman1.png"/>
            <p>Best Pizza EVER! Not just on the lower Cape…. anywhere!</p>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
        <div id="third" class="logo hidden">
        <img src="src/woman2.png"/>
            <p>Breakfast was delicious. Like a good homestyle country savory breakfast (and Im from the south, thats saying a lot)… Enjoyed the whole experience and definitely recommend this place for a place to eat on the cape.</p>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
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