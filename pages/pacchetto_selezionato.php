<?php
include_once '../includes/db_connection.php';

session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($conn)) {
        $pacchetto_sql = "SELECT * FROM pacchetto WHERE id = '$id';";
        $pacchetto_result = $conn->query($pacchetto_sql);
        if ($pacchetto_result) {
            if ($pacchetto_result->num_rows == 1) {
                $pacchetto_row = $pacchetto_result->fetch_array(MYSQLI_ASSOC);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacchetto selezionato</title>
    <link rel="shortcut icon" href="../drawable/logo-mini.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
          integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/home_page.css"/>
    <link rel="stylesheet" href="../style/pacchetto_selezionato.css"/>
    <link rel="stylesheet" href="../style/snackbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css"
          integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ=="
          crossorigin="anonymous"/>

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<!-- navbar-->
<div class="navbg">
    <navbar>
        <div class="logo">
            <img src="../drawable/navbar-logo.png" alt="logo-sito">
        </div>
        <ul class="menu">
            <li><a href="homepage.php">Home</a></li>
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

<div class="meta">
    <div class="zoom">
        <h1 class="big-text" style="font-size: 30px"><?php echo $pacchetto_row['titolo'] ?></h1>
        <div class="stage">
            <div class="heart"></div>
        </div>
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
                            <img class="demo cursor" src="../drawable/pic-1.png" style="width:100%"
                                 onclick="currentSlide(1)" alt="The Woods">
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="../drawable/pic-2.png" style="width:100%"
                                 onclick="currentSlide(2)" alt="Cinque Terre">
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="../drawable/pic-3.png" style="width:100%"
                                 onclick="currentSlide(3)" alt="Mountains and fjords">
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="../drawable/pic-4.png" style="width:100%"
                                 onclick="currentSlide(4)" alt="Northern Lights">
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="../drawable/pic-1.png" style="width:100%"
                                 onclick="currentSlide(5)" alt="Nature and sunrise">
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="../drawable/pic-2.png" style="width:100%"
                                 onclick="currentSlide(6)" alt="Snowy Mountains">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div id="descrizione">
                    <h1 class="desc">Descrizione del pacchetto</h1>
                    <p><?php echo $pacchetto_row['descrizione'] ?></p>

                    <h1 class="desc">Costo</h1>
                    <p><?php echo "€" . $pacchetto_row['costo'] ?></p>

                    <h1 class="desc">Filtri</h1>
                    <span class="label filtro_1">Provola</span>
                    <span class="label filtro_2">filtro_2</span>
                    <span class="label filtro_3">filtro_3</span>
                    <span class="label filtro_4">filtro_4</span>

                </div>
            </div>
        </div>

        <div class="container">
            <button type="button" class="collapsible">Pacchetti Viaggio simili</button>
            <div class="contents">
                <div class="pacchetti_consigliati">
                    <p>In base al pacchetto selezionato potrrebbero interessarti i seguenti pacchetti viaggio!</p>
                    <div class="main-carousel hero__content1"
                         data-flickity='{ "cellAlign": "left", "contain": true }'><?php
                        if (isset($conn)) {
                            $pacchetto_sql = "SELECT * FROM pacchetto;";
                            $pacchetto_result = mysqli_query($conn, $pacchetto_sql);
                            foreach ($pacchetto_result as $row) {
                                echo '<a href="pacchetto_selezionato.php?id=' . $row['id'] . '">' ?>
                                <div class="carousel-cell1">
                                    <div class="carousel-cell__content2 zoom"
                                         style="background-image: url('../drawable/db/<?php echo $row['immagine'] ?>')">
                                        <h5><?php echo $row['titolo'] ?></h5>
                                    </div>
                                </div>
                                <?php
                                echo '</a>';
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <button type="button" class="collapsible">Altre Mete consigliate</button>
            <div class="contents">
                <div class="mete_consigliate">
                    <p>Mete consigliate in base alla vicinanza o ai temi</p>
                    <div class="main-carousel hero__content1 flickity-enabled is-draggable"
                         data-flickity='{ "cellAlign": "left","contain": true }'>
                        <?php
                        if (isset($conn)) {
                            $meta_sql = "SELECT * FROM meta_turistica;";
                            $meta_result = mysqli_query($conn, $meta_sql);
                            foreach ($meta_result as $row) {
                                echo '<a href="meta_selezionata.php?id=' . $row['id'] . '">' ?>
                                <div class="carousel-cell1">
                                    <div class="carousel-cell__content zoom"
                                         style="background-image: url('../drawable/db/<?php echo $row['immagine'] ?>')">
                                        <h5><?php echo $row['nome'] ?></h5>
                                    </div>
                                </div>
                                <?php
                                echo '</a>';
                            }
                        } ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="container1">
            <div class="recensioni">
                <?php
                if (isset($_SESSION['isAgenzia']) && $_SESSION['isAgenzia'] === false) {
                    ?>
                    <button class="button1" onclick="document.getElementById('id01').style.display='block'"
                            style="width:auto;">
                        Lascia una recensione!
                    </button>
                    <?php
                }
                ?>
                <div id="id01" class="modal1">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                          title="Close Modal">&times;</span>
                    <form class="modal-content" id="form">
                        <div class="container2">
                            <h2 style="font-size: 20px">Lascia una recensione!</h2>
                            <p>Si prega di compilare questo modulo per lasciare una recensione.</p>
                            <hr>
                            <label for="titolo"><b>Titolo</b></label>
                            <input type="text" placeholder="Inserisci un titolo" name="titolo" id="titolo" required>

                            <label for="desc">Recensione</label>
                            <textarea id="desc" name="desc" required placeholder="Scrivi qualcosa..."
                                      style="height:200px"></textarea>

                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" required/>
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" required/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" required/>
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" required/>
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" required/>
                                <label for="star1" title="text">1 star</label>
                            </div>

                            <p style="padding-top: 65px">By leaving a review you agree to our <a
                                        href="privacy_and_cookies.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

                            <div class="clearfix">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                                        class="cancelbtn">Chiudi
                                </button>
                                <button type="submit" class="signupbtn">Invia</button>
                            </div>
                            <!-- Snackbar -->
                            <div id='snackbar'></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Recensioni leggibili -->
        <div class="container">
            <div class="row">
                <?php
                if (isset($conn)) {
                $rec_sql = "SELECT * FROM recensione WHERE id_meta=0 && id_pacchetto='$id';";
                $rec_result = $conn->query($rec_sql);

                if ($rec_result->num_rows == 0) {

                    ?>
                    <h1 style="padding-top: 30px">Nessuna recensione!</h1>
                    <?php
                    echo '</div>';
                } else {
                ?>
                <h1 style="padding-top: 30px">Leggi le recensioni</h1>
            </div>
            <div class="main-carousel-commenti flickity-viewport-commenti "
                 data-flickity='{ "cellAlign": "left", "contain": true }'>
                <?php
                foreach ($rec_result as $row) {
                    ?>
                    <div class="carousel-cell-commenti">
                    <div class="carousel-cell__content-commenti zoom">
                    <div class="col-sm-6">
                    <div class="block-text">
                        <?php
                        switch ($row['stelle']) {
                            case 1:
                                ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <?php
                                break;
                            case 2:
                                ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <?php
                                break;
                            case 3:
                                ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <?php
                                break;
                            case 4:
                                ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <?php
                                break;
                            case 5:
                                ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <?php
                                break;
                        }
                        ?>

                        <h3><?php echo $row['titolo'] ?></h3>

                        <p style="padding-top: 10px"><?php echo $row['descrizione'] ?></p>
                    </div>
                    <?php
                    $rec_username = $row['username_utente'];
                    $user_sql = "SELECT * FROM utente WHERE username='$rec_username';";
                    $user_result = $conn->query($user_sql);
                    if ($user_result) {
                        if ($user_result->num_rows == 1) {
                            $user_row = $user_result->fetch_array(MYSQLI_ASSOC);
                            ?>
                            <div class="person-text">
                                <div class="user_foto">
                                    <?php
                                    echo '<img width="130" src="../drawable/db/' . $user_row['immagine'] . '">';
                                    ?>
                                </div>
                                <p><?php echo $user_row['nome'] . " " . $user_row['cognome'] ?></p>
                            </div>
                            </div>
                            </div>
                            </div>
                            <?php
                        }
                    }
                }
                }
                ?>
            </div>
            <?php
            }
            ?>
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

        // heart animation
        $(".heart").on("click", function () {
            $(this).toggleClass("is-active");
        });

        // Aggiungi al db
        $("#form").on('submit', function (e) {
            e.preventDefault();

            var data = new FormData($('#form')[0]);
            data.append('username', <?php echo json_encode($_SESSION['username'], JSON_HEX_TAG); ?>);
            data.append('tipo', 'false');
            data.append('id_pacchetto', <?php echo json_encode($id, JSON_HEX_TAG); ?>);

            $.ajax({
                type: 'post',
                url: '../php/add_recensione.php',
                data: data,
                processData: false,
                contentType: false,
                success: function (json_data) {
                    const data_array = $.parseJSON(json_data);
                    showSnackbar(data_array['text']);
                    if (data_array['result'] === 'success') {
                        $('#form input[type=text]').val('');
                        $('#form input[name=rate]').prop('checked', false);
                        $('#form textarea').val('');
                    }
                }
            });
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

    <!-- script per il collapsibile -->
    var acc = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener('click', function () {
            this.classList.toggle('active');
            var contents = this.nextElementSibling;
            if (contents.style.maxHeight) {
                contents.style.maxHeight = null;
            } else {
                contents.style.maxHeight = contents.scrollHeight + 'px';
            }
        });
    }


    <!-- script per la gestione immagini delle attrazioni -->
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
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }

    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>

<!-- Snackbar -->
<div id='snackbar'></div>

</body>
</html>
