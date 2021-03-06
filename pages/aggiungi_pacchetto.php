<?php
include_once '../includes/db_connection.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="../style/add_pacchetto.css"/>
    <link rel="stylesheet" href="../style/snackbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css"
          integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ=="
          crossorigin="anonymous"/>

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
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

<div class="bg-cover">
    <div class="form zoom">
        <img src="../drawable/3466640.png" class="avatar">
        <form id="form">
            <label for="name">Nome del pacchetto:</label>
            <input type="text" name="name" id="name" placeholder="Nome Pacchetto" required>
            <label for="desc">Descrizione:</label>
            <textarea type="text" name="desc" id="desc" cols="30" rows="10" placeholder="Descrizione Pacchetto"
                      required></textarea>
            <label for="price">Costo:</label>
            <input type="number" name="price" id="price" placeholder="Costo Pacchetto" required>

            <div class="file_div">
                <input type="file" id="image" name="image" hidden/>
                <label for="image" class="file_label">Carica Immagine</label>
                <span id="file-chosen">Nessun file selezionato</span>
            </div>

            <label>Attrazioni:</label><br>
            <div class="checkbox">
                <ul>
                    <li>
                        <?php
                        if (isset($conn)) {
                            $attrazione_query = "SELECT * FROM attrazione;";
                            $attrazione_result = $conn->query($attrazione_query);
                            foreach ($attrazione_result as $row) {
                                echo "<input type='checkbox' name='attr[]' value='" . $row['id'] . "'>";
                                echo "<label for='attr[]'>" . $row['nome'] . "</label>";
                            }
                        }
                        ?>
                    </li>
                </ul>
            </div>

            <button id="aggiungi" type="submit" name="aggiungi">AGGIUNGI</button>
        </form>


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

        // Aggiungi al db
        $("#form").on('submit', function (e) {
            var data = new FormData($('#form')[0]);
            data.append('image', $('#image')[0].files[0]);

            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '../php/add_pacchetto.php',
                data: data,
                processData: false,
                contentType: false,
                success: function (json_data) {
                    const data_array = $.parseJSON(json_data);
                    showSnackbar(data_array['text']);
                    if (data_array['result'] === 'success') {
                        $('#form input').val('');
                        $('#form input[type=checkbox]').prop('checked', false);
                        $('#form textarea').val('');
                        document.getElementById('file-chosen').textContent = "Nessun file selezionato"
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

    // file button
    const actualBtn = document.getElementById('image');
    const fileChosen = document.getElementById('file-chosen');
    actualBtn.addEventListener('change', function(){
        fileChosen.textContent = this.files[0].name
    })
</script>

<!-- Snackbar -->
<div id='snackbar'></div>

<?php
if (isset($conn)) {
    $conn->close();
}
?>

</body>
</html>
