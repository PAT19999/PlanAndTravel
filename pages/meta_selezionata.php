<?php
include_once '../includes/db_connection.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meta selezionata</title>
    <link rel="shortcut icon" href="../drawable/logo-mini.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style/home_page.css"/>
    <link rel="stylesheet" href="../style/mete.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>

<body>

<! navbar>
<div class="navbg">
    <navbar>
        <div class="logo">
            <img src="../drawable/navbar-logo.png" alt="logo-sito">
        </div>
        <ul class="menu">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="mete.html">Mete</a></li>
            <li><a href="pacchetti.html">Pacchetti</a></li>
            <li><a href="contatti.php">Contatti</a></li>
        </ul>
        <div class="cta">
            <a href="login.html" class="button"> Login</a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </navbar>
</div>

<div class="meta">
    <h1 class="big-text">Meta selezionata: San Francisco</h1>
    <div class="row row1">
        <div class="sezione_img">
            <div class="container">

                <! immagine con titolo al centro >
                <div class="mySlides">
                    <div class="numbertext">1 / 6</div>
                    <a href="#">
                        <img src="../drawable/pic-1.png" style="width:100%" alt="San Francisco">
                    </a>
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 6</div>
                    <img src="../drawable/pic-2.png" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 6</div>
                    <img src="../drawable/pic-3.png" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">4 / 6</div>
                    <img src="../drawable/pic-4.png" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">5 / 6</div>
                    <img src="../drawable/pic-1.png" style="width:100%">
                </div>

                <div class="mySlides">
                    <div class="numbertext">6 / 6</div>
                    <img src="../drawable/pic-2.png" style="width:100%">
                </div>


                <! freccette per cambiare pagina >
                <a class="prev" onclick="plusSlides(-1)"><</a>
                <a class="next" onclick="plusSlides(1)">></a>

                <div class="row">
                    <div class="column">
                        <img class="demo cursor" src="../drawable/pic-1.png" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../drawable/pic-2.png" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../drawable/pic-3.png" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../drawable/pic-4.png" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../drawable/pic-1.png" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../drawable/pic-2.png" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div id="descrizione">
                <h2>Informazioni generali</h2>
                <p>Testo di prova che ahhahdddoadk</p>
                <h2>Località</h2>
                <p><img src="../drawable/position.jpg" width="13px" height="13px" alt="position">
                    <a title="Città" href="https://www.comune.barletta.bt.it/retecivica/" target="_blank">Città</a> ,Nazione</p>

                <h2>Filtri</h2>
                <span class="label filtro_1">Provola</span>
                <span class="label filtro_2">filtro_2</span>
                <span class="label filtro_3">filtro_3</span>
                <span class="label filtro_4">filtro_4</span>

            </div>
        </div>
    </div>
    <div class="container">
        <button type="button" class="collapsible"><h6>Altre Mete consigliate</h6></button>
        <div class="contents">
            <div class="mete_consigliate">
                <p>Mete consigliate in base alla vicinanza o ai temi</p>
                <div class="main-carousel hero__content flickity-enabled is-draggable"
                     data-flickity='{ "cellAlign": "left","contain": true }'>
                    <?php
                    if (isset($conn)) {
                        $meta_sql = "SELECT * FROM meta_turistica;";
                        $meta_result = mysqli_query($conn, $meta_sql);
                        foreach ($meta_result as $row) {
                            ?>
                            <div class="carousel-cell">
                                <div class="carousel-cell__content zoom"
                                     style="background-image: url('../drawable/db/<?php echo $row['immagine']?>')">
                                    <h5><?php echo $row['nome'] ?></h5>
                                </div>
                            </div>

                            <?php
                        }
                    } ?>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <button type="button" class="collapsible"><h6>Pacchetti Viaggio simili</h6></button>
        <div class="contents">
            <div class="pacchetti_consigliati">
                <p>In base alla meta selezionata potrrebbero interessarti i seguenti pacchetti viaggio!</p>
                    <div class="main-carousel hero__content"
                         data-flickity='{ "cellAlign": "left", "contain": true }'><?php
                        if (isset($conn)) {
                            $pacchetto_sql = "SELECT * FROM pacchetto;";
                            $pacchetto_result = mysqli_query($conn, $pacchetto_sql);
                            foreach ($pacchetto_result as $row) {
                                ?>
                                <div class="carousel-cell">
                                    <div class="carousel-cell__content1 zoom"
                                         style="background-image: url('../drawable/db/<?php echo $row['immagine']?>')">
                                        <h5><?php echo $row['titolo'] ?></h5>
                                    </div>
                                </div>
                                <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="recensioni">
        <h2>Recensioni degli utenti</h2>
        <p>varie recensioni</p>
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
        <a href="homepage.php"><img width="32" src="../drawable/logo-mini.png" title="Plan&Travel" alt="Icona Plan&Travel"></a>
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

<!--/ script per il collapsibile -->

<script>
    var acc = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener('click', function() {
            this.classList.toggle('active');
            var contents = this.nextElementSibling;
            if (contents.style.maxHeight) {
                contents.style.maxHeight = null;
            } else {
                contents.style.maxHeight = contents.scrollHeight + 'px';
            }
        });
    }
</script>
<!--/ script per la gestione immagini delle attrazioni -->
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>
</body>
</html>
