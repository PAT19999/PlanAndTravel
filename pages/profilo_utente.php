<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] !== true) {
    header("location: login.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Il mio profilo</title>

    <link rel="shortcut icon" href="../drawable/logo-mini.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style/home_page.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/profilo_utente.css">
</head>
<body>
<! navbar>
<div class="navbg">
    <navbar>
        <div class="logo ">
            <img src="../drawable/navbar-logo.png" alt="logo-sito">
        </div>
        <ul class="menu">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="mete.html">Mete</a></li>
            <li><a href="pacchetti.html">Pacchetti</a></li>
            <li><a href="contatti.php">Contatti</a></li>
        </ul>
        <div class="cta">
            <a href="login.html" class="button">Login</a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </navbar>
</div>


<! Box generico>
<div class="boxutente">

    <! Box profilo>
    <div class="profilo">
        <h1 class="big-text">Il mio profilo</h1>
        <div class="foto">
            <img src="../drawable/avatar.jpg">
        </div>
    </div>

    <! Box Info profilo>
    <div class="infoprofilo">
        <h1>Profilo Utente</h1>
            <div class="dati">
            <?php
            echo "Username: " . $_SESSION['username'] . "<br><br>";
            echo "Nome: " . $_SESSION['nome'] . "<br><br>";
            echo "Cognome: " . $_SESSION['cognome'] . "<br><br>";
            echo "Email: " . $_SESSION['email'] . "<br><br>";
            ?>
            </div>
        <a href="../php/logout.php">Disconnetti</a>
    </div>
</div>










<! Footer>

<footer>
    Plan&Travel | Via Roma, 24 - 55045 Pietrasana (Lucca) ITALIA | P.Iva 000000000 <br>
    <a class="trans-color-text" href="#">info@plan&travel.com</a> | <span itemprop="telephone"><a href="#">0883 200300</a></span>
    <br><a href="privacy_and_cookies.html"> privacy</a> | <a href="privacy_and_cookies.html"> cookie policy</a>

    <div class="social-cont">
        <ul class="social-list">
            <li><a target="_blank" href="#"><img src="https://icon-library.com/images/facebook-png-icon-white/facebook-png-icon-white-18.jpg"  title="facebook" alt="Facebook icon"></a></li>
            <li><a target="_blank" href="#"><img src="https://icon-library.com/images/white-instagram-icon-png/white-instagram-icon-png-14.jpg" title="Instagram" alt="Instagram icon"></a></li>
            <li><a target="_blank" href="#"><img src="https://www.suiteforlife.it/wp-content/uploads/2019/09/whatsapp-logo-112413FAA7-seeklogo-298x300.png" title="WhatsApp" alt="WhatsApp icon"></a></li>
        </ul>
    </div><!--/fine social cont-->
    Designed by<br>
    <div class="credits">
        <a href="homepage.html"><img width="32" src="../drawable/logo-mini.png" title="Plan&Travel" alt="Icona Plan&Travel"></a>
    </div>

</footer>




<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js" integrity="sha512-Nx/M3T/fWprNarYOrnl+gfWZ25YlZtSNmhjHeC0+2gCtyAdDFXqaORJBj1dC427zt3z/HwkUpPX+cxzonjUgrA==" crossorigin="anonymous"></script>

<script>
    $( document ).ready(function() {

        /* Open Panel */
        $( ".hamburger" ).on('click', function() {
            $(".menu").toggleClass("menu--open");
        });

    });


    ScrollReveal().reveal('.reveal',  { distance: '100px', duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 600 });

    ScrollReveal().reveal('.zoom',  { duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 200, scale: 0.65, mobile: false});

</script>
</body>
</html>