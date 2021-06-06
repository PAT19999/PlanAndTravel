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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/filtri.css"/>

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
            ?>
            <div class="cta">
                <a href="login.html" class="button">Login</a>
            </div>
            <?php
        } else {
            ?>
            <div class="profilo">
                <div class="foto">
                    <a href="profilo_utente.php">
                        <?php echo '<img src="../drawable/db/' . $_SESSION['immagine'] . '">' ?>
                    </a>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </navbar>
</div>

<!-- Hero-->

<div class="hero">
    <div class="hero__content reveal">
        <div class="intro-text" id="messaggio"></div>
        <h1 class="big-text" style="color: white">Plan&Travel ha sempre seguito con particolare interesse
            l’evoluzione tecnologica e il sopravvento
            di nuove tendenze permettendo così la realizzazione di un sito responsivo ed intuitivo attraverso il quale
            l’utente
            può considerare numerosi aspetti che spesso vengono ignorati quando si pianifica una vacanza,
            tra cui: eventi ed usanze locali, clima, costo della vita, qualità della vita, attrazioni e molto altro
            ancora.</h1>
        <a href="#linkscopri" class="button">Scopri di più...</a>
        <div class="content2">
            <!--Ricerca-->
            <div class="wrapper">
                <div class="input-group">
                    <form id="search_form">
                        <input class="search" id="search" type="text" placeholder="Cerca..."><span class="bar"></span>
                        <button id="search_btn" type="submit" hidden></button>
                    </form>
                </div>
            </div>
            <!--Ricerca avanzata-->
            <button onclick="document.getElementById('id01').style.display='block'">Ricerca avanzata</button>
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <div class="s007">
                    <form id="form">
                        <div class="inner-form">
                            <div class="advance-search">
                                <span class="desc">Ricerca avanzata</span>
                                <div class="row">
                                    <div class="input-field">
                                        <div class="input-select">
                                            <select id="stagione" name="stagione">
                                                <option placeholder="" value="">STAGIONE</option>
                                                <option value="Inverno">Inverno</option>
                                                <option value="Primavera">Primavera</option>
                                                <option value="Estate">Estate</option>
                                                <option value="Autunno">Autunno</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field">
                                        <div class="input-select">
                                            <select id="localita" data-trigger="" name="localita">
                                                <option placeholder="" value="">LOCALITA'</option>
                                                <option value="Mare">Mare</option>
                                                <option value="Montagna">Montagna</option>
                                                <option value="Citta">Città</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field">
                                        <div class="input-select">
                                            <select id="eta" data-trigger="" name="eta">
                                                <option placeholder="" value="">ETA'</option>
                                                <option value="0-20">0-20</option>
                                                <option value="21-35">21-35</option>
                                                <option value="36-50">36-50</option>
                                                <option value="50+">50+</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row second">
                                    <div class="input-field">
                                        <div class="input-select">
                                            <select id="tipologia" data-trigger="" name="tipologia">
                                                <option placeholder="" value="">TIPOLOGIA</option>
                                                <option value="Divertimento">Divertimento</option>
                                                <option value="Cultura">Cultura</option>
                                                <option value="Scoprire">Scoprire</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field">
                                        <div class="input-select">
                                            <select id="budget" data-trigger="" name="budget">
                                                <option placeholder="" value="">BUDGET</option>
                                                <option value="Alto">Alto</option>
                                                <option value="Medio">Medio</option>
                                                <option value="Basso">Basso</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field">
                                        <div class="input-select">
                                            <select id="compagnia" name="compagnia">
                                                <option placeholder="" value="">COMPAGNIA</option>
                                                <option value="Famiglia">Famiglia</option>
                                                <option value="Coppia">Coppia</option>
                                                <option value="Amici">Amici</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row third">
                                    <div class="input-field">
                                        <button class="btn-search" type="button" onclick="filterSearch()"
                                                id="filter-search">Ricerca
                                        </button>
                                        <button class="btn-delete" id="delete">Cancella</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <video autoplay muted loop id="video-back">
        <source src="../drawable/bg-video.mp4" type="video/mp4">
    </video>
</div>


<!-- Mete più scelte con carousel-->
<div class="mt-3 sotto">
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
                    <?php
                    echo '<a href="meta_selezionata.php?id=' . $row['id'] . '">' ?>
                    <div class="carousel-cell__content zoom"
                         style="background-image: url('../drawable/db/<?php echo $row['immagine'] ?>')">
                        <h5><?php echo $row['nome'] ?></h5>
                    </div>
                    </a>
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
                    <?php
                    echo '<a href="pacchetto_selezionato.php?id=' . $row['id'] . '">' ?>
                    <div class="carousel-cell__content1 zoom"
                         style="background-image: url('../drawable/db/<?php echo $row['immagine'] ?>')">
                        <h5><?php echo $row['titolo'] ?></h5>
                    </div>
                    </a>
                </div>
                <?php
            }
        } ?>
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

<script>
    $(document).ready(function () {
        /* Open Panel */
        $(".hamburger").on('click', function () {
            $(".menu").toggleClass('menu--open');
        });

        $("#search_form").on('submit', function (e) {
            e.preventDefault();
            var text = document.getElementById("search").value;
            location.href = `risultati.php?text=${text}`
        })
    });

    function filterSearch() {
        var stagione = document.getElementById("stagione").value;
        var localita = document.getElementById('localita').value;
        var eta = document.getElementById('eta').value;
        var tipologia = document.getElementById('tipologia').value;
        var budget = document.getElementById('budget').value;
        var compagnia = document.getElementById('compagnia').value;
        location.href = `risultati.php?stagione=${stagione}&localita=${localita}&eta=${eta}&tipologia=${tipologia}&budget=${budget}&compagnia=${compagnia}`
    }

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
    const d = new Date();
    const h = d.getHours();
    let saluto;
    if (h < 12) {
        saluto = "Buongiorno!";
    } else if (h < 17) {
        saluto = "Buon pomeriggio!";
    } else {
        saluto = "Buona sera!";
    }
    const el = document.getElementById('messaggio');
    el.textContent = saluto;
</script>

<script src="../javascript/choices_filter.js"></script>
<script>
    const customSelects = document.querySelectorAll("select");
    const deleteBtn = document.getElementById('delete')
    const choices = new Choices('select',
        {
            searchEnabled: false,
            removeItemButton: true,
            itemSelectText: '',
        });
    for (let i = 0; i < customSelects.length; i++) {
        customSelects[i].addEventListener('addItem', function (event) {
            if (event.detail.value) {
                let parent = this.parentNode.parentNode
                parent.classList.add('valid')
                parent.classList.remove('invalid')
            } else {
                let parent = this.parentNode.parentNode
                parent.classList.add('invalid')
                parent.classList.remove('valid')
            }
        }, false);
    }
    deleteBtn.addEventListener("click", function (e) {
        e.preventDefault()
        const deleteAll = document.querySelectorAll('.choices__button')
        for (let i = 0; i < deleteAll.length; i++) {
            deleteAll[i].click();
        }
    });

    window.console = window.console || function (t) {
    };

    if (document.location.search.match(/type=embed/gi)) {
        window.parent.postMessage("resize", "*");
    }
</script>
</body>
</html>