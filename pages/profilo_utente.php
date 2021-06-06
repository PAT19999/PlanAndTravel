<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Il mio profilo</title>

    <link rel="shortcut icon" href="../drawable/logo-mini.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
          integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/home_page.css"/>
    <link rel="stylesheet" href="../style/snackbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css"
          integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ=="
          crossorigin="anonymous"/>

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/profilo_utente.css">
</head>
<body>
<!-- navbar-->
<div class="navbg">
    <navbar>
        <div class="logo ">
            <img src="../drawable/navbar-logo.png" alt="logo-sito">
        </div>
        <ul class="menu">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="mete.php">Mete</a></li>
            <li><a href="pacchetti.php">Pacchetti</a></li>
            <li><a href="contatti.php">Contatti</a></li>
        </ul>
        <div class="cta">
            <a href="../php/logout.php" class="button">Logout</a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </navbar>
</div>


<!-- Box generico-->
<div class="background">
    <div class="boxutente">
        <!-- Box profilo-->
        <div class="profilo zoom">
            <div class="foto">
                <?php
                echo '<img id="propic" src="../drawable/db/' . $_SESSION['immagine'] . '">';
                ?>
            </div>
            <div class="file_div">
                <input type="file" id="image" name="image" hidden/>
                <label for="image" class="file_label">Cambia Immagine</label>
            </div>
        </div>

        <!-- Box Info profilo-->
        <div class="infoprofilo zoom">
            <div class="dati">
                <?php
                if ($_SESSION['isAgenzia']) {
                    if ($_SESSION['verificata']) {
                        ?>
                        <div class="verificato">
                            <img src="../drawable/8224836a6169b5fb1120109040e92d96.png" alt="agenzia verificata"
                                 width="25" title="Agenzia verificata">
                        </div>
                        <?php
                    }
                }
                ?>
                <h1 class="big-text">Il mio profilo</h1>
                <hr>
                <div class="valoriphp"><?php
                    echo "Username:  " . $_SESSION['username'] . "<br><br>";
                    echo "Nome: " . $_SESSION['nome'] . "<br><br>";
                    if ($_SESSION['isAgenzia']) {
                        echo "P.IVA: " . $_SESSION['piva'] . "<br><br>";
                        echo "Telefono: " . $_SESSION['telefono'] . "<br><br>";
                    } else {
                        echo "Cognome: " . $_SESSION['cognome'] . "<br><br>";
                    }
                    echo "Email: " . $_SESSION['email'] . "<br><br>";
                    ?>
                </div>
            </div>
            <!-- Aggiungi pacchetto -->
            <div class="pacchetto_div">
                <?php
                if ($_SESSION['isAgenzia']) {
                    ?>
                    <a href="aggiungi_pacchetto.php" class="add_button">Aggiungi pacchetto</a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>


</div>

<!-- Footer-->
<footer>
    Plan&Travel | Via Roma, 20 - 76121 Barletta (BT) ITALIA | P.Iva 000000000 <br>
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

<script type="text/javascript" src="../javascript/utils.js"></script>

<script>
    $(document).ready(function () {

        /* Open Panel */
        $(".hamburger").on('click', function () {
            $(".menu").toggleClass("menu--open");
        });

    });


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

    // file button
    const fileBtn = document.getElementById('image');
    fileBtn.addEventListener('change', function () {
        var data = new FormData($('#form')[0]);
        data.append('image', $('#image')[0].files[0]);

        $.ajax({
            type: 'post',
            url: '../php/change_propic.php',
            data: data,
            processData: false,
            contentType: false,
            success: function (json_data) {
                const data_array = $.parseJSON(json_data);
                showSnackbar(data_array['text']);
                $('#propic').attr('src', data_array['immagine'])
            }
        });
    })

</script>

<!-- Snackbar -->
<div id='snackbar'></div>

</body>
</html>