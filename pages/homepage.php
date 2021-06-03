<?php
include_once '../includes/db_connection.php';

session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plan & Travel - Homepage</title>
    <link rel="shortcut icon" href="../drawable/logo-mini.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
          integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
          crossorigin="anonymous"/>

    <link rel="stylesheet" href="../style/home_page.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css"
          integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ=="
          crossorigin="anonymous"/>

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>

<body>

<!-- schermata caricamento-->

<div id="schermata_caricamento">
    <p>Caricamento in corso</p>
    <img src="../drawable/logo-mini.png" alt="logo-sito">
</div>

<! navbar>
<div class="navbg">
    <navbar>
        <div class="logo ">
            <img src="../drawable/navbar-logo.png" alt="logo-sito">
        </div>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="mete.php">Mete</a></li>
            <li><a href="pacchetti.php">Pacchetti</a></li>
            <li><a href="contatti.php">Contatti</a></li>
        </ul>
        <?php
        if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] !== true) {
            echo '<div class="cta">',
            '<a href="profilo_utente.php" class="button">Login</a>',
            '</div>';
        } else {
            echo '<div class="profilo">',
            '<div class="foto">',
            '<a href="profilo_utente.php"/a>',
            '<img src="../drawable/db/' . $_SESSION['immagine'] . '">',
            '</div>',
            '</div>';
        }
        ?>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </navbar>
</div>

<! Hero>

<div class="hero">
    <div class="hero__content reveal">
        <div class="intro-text" id="messaggio"></div>
        <h1 class="big-text" style="color: white">Il team di sviluppo ha sempre seguito con particolare interesse
            l’evoluzione tecnologica e il sopravvento
            di nuove tendenze permettendo così la realizzazione di un sito responsivo ed intuitivo attraverso il quale
            l’utente
            può considerare numerosi aspetti che spesso vengono ignorati quando si pianifica una vacanza,
            tra cui: eventi ed usanze locali, clima, costo della vita, qualità della vita, attrazioni e molto altro
            ancora.</h1>
        <a href="#linkscopri" class="button">Scopri di più...</a>
    </div>
    <video autoplay muted loop id="video-back">
        <source src="../drawable/bg-video.mp4" type="video/mp4">
    </video>
</div>


<!-- Mete più scelte con carousel-->
<div class="mt-1">
    <div class="grid hero__content">
        <div class="col reveal">
            <a name="linkscopri"></a>
            <h3 class="big-text">Mete più scelte:</h3>
        </div>
        <div class="col reveal">
            <h2>Scopri nuove mete tra le più selezionate dai nostri clienti!</h2>
        </div>
    </div>

    <div class="main-carousel hero__content flickity-enabled is-draggable"
         data-flickity='{ "cellAlign": "left","contain": true }'>
        <?php
        if (isset($conn)) {
            $meta_sql = "SELECT * FROM meta_turistica;";
            $meta_result = $conn->query($meta_sql);
            foreach ($meta_result as $row) {
                ?>
                <div class="carousel-cell">
                    <div class="carousel-cell__content zoom"
                         style="background-image: url('../drawable/db/<?php echo $row['immagine'] ?>')">
                        <h5><?php echo $row['nome'] ?></h5>
                    </div>
                </div>

                <?php
            }
        } ?>
    </div>
</div>

<!-- Pacchetti viaggio con carousel-->
<div class="mt-1 mb-1">
    <div class="grid hero__content">
        <div class="col reveal">
            <h3 class="big-text">Pacchetti viaggio:</h3>
        </div>
        <div class="col reveal">
            <h2>Scopri i pacchetti selezionati e offerti su misura per te dalle nostre agenzie partner!</h2>
        </div>
    </div>

    <div class="main-carousel hero__content"
         data-flickity='{ "cellAlign": "left", "contain": true }'><?php
        if (isset($conn)) {
            $pacchetto_sql = "SELECT * FROM pacchetto;";
            $pacchetto_result = $conn->query($pacchetto_sql);
            foreach ($pacchetto_result as $row) {
                ?>
                <div class="carousel-cell">
                    <div class="carousel-cell__content1 zoom"
                         style="background-image: url('../drawable/db/<?php echo $row['immagine'] ?>')">
                        <h5><?php echo $row['titolo'] ?></h5>
                    </div>
                </div>
                <?php
            }
        } ?>
    </div>
</div>


<!-- Footer-->

<footer>
    Plan&Travel | Via Roma, 24 - 55045 Pietrasana (Lucca) ITALIA | P.Iva 000000000 <br>
    <a class="trans-color-text" href="#">info@plan&travel.com</a> | <span itemprop="telephone"><a
                href="#">0883 200300</a></span>
    <br><a href="privacy_and_cookies.php"> privacy</a> | <a href="privacy_and_cookies.php"> cookie policy</a>

    <div class="social-cont">
        <ul class="social-list">
            <li><a target="_blank" href="#"><img
                            src="https://icon-library.com/images/facebook-png-icon-white/facebook-png-icon-white-18.jpg"
                            title="facebook" alt="Facebook icon"></a></li>
            <li><a target="_blank" href="#"><img
                            src="https://icon-library.com/images/white-instagram-icon-png/white-instagram-icon-png-14.jpg"
                            title="Instagram" alt="Instagram icon"></a></li>
            <li><a target="_blank" href="#"><img
                            src="https://www.suiteforlife.it/wp-content/uploads/2019/09/whatsapp-logo-112413FAA7-seeklogo-298x300.png"
                            title="WhatsApp" alt="WhatsApp icon"></a></li>
        </ul>
    </div><!--/fine social cont-->
    Designed by<br>
    <div class="credits">
        <a href="homepage.php"><img width="32" src="../drawable/logo-mini.png" title="Plan&Travel"
                                    alt="Icona Plan&Travel"></a>
    </div>

</footer>


<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"
        integrity="sha512-Nx/M3T/fWprNarYOrnl+gfWZ25YlZtSNmhjHeC0+2gCtyAdDFXqaORJBj1dC427zt3z/HwkUpPX+cxzonjUgrA=="
        crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        /* Open Panel */
        $(".hamburger").on('click', function () {
            $(".menu").toggleClass('menu--open');
        });

    });

    $("#schermata_caricamento").fadeOut(500);

    ScrollReveal().reveal('.reveal', {
        distance: '100px',
        duration: 1500,
        easing: 'cubic-bezier(.215, .61, .355, 1)',
        interval: 600
    });

    ScrollReveal().reveal('.zoom', {
        duration: 1500,
        easing: 'cubic-bezier(.215, .61, .355, 1)',
        interval: 200,
        scale: 0.65,
        mobile: false
    });

</script>
<script type="text/javascript">
    var d = new Date();
    var h = d.getHours();
    var saluto;
    if (h < 12) {
        saluto = "Buongiorno!";
    } else if (h < 17) {
        saluto = "Buon pomeriggio!";
    } else {
        saluto = "Buona sera!";
    }
    var el = document.getElementById('messaggio');
    el.textContent = saluto;
</script>

</body>
</html>