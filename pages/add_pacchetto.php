<?php
include_once '../includes/db_connection.php';
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css"
          integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ=="
          crossorigin="anonymous"/>

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
            <li><a href="contatti.html">Contatti</a></li>
        </ul>
        <div class="cta">
            <a href="profilo_utente.php" class="button"> Login</a>
        </div>
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
        <form action="add_pacchetto.php" method="post" enctype="multipart/form-data">
            <label for="nome">Nome del pacchetto:</label>
            <input type="text" name="name" id="nome" placeholder="Nome Pacchetto" required>
            <label for="desc">Descrizione:</label>
            <textarea type="text" name="desc" id="desc" cols="30" rows="10" placeholder="Descrizione Pacchetto"
                      required></textarea>
            <label for="costo">Costo:</label>
            <input type="number" name="price" id="costo" placeholder="Costo Pacchetto" required>
            <input type="file" name="image" required>
            <label for="albergo">Albergo: </label>
            <select id="albergo" name="albergo">
                <?php
                if (isset($conn)) {
                    $albergo_query = "SELECT * FROM albergo;";
                    $albergo_result = $conn->query($albergo_query);
                    foreach ($albergo_result as $row) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                    }
                }
                ?>
            </select><br><br>
            <label>Attrazioni:</label><br>
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
            <button type="submit" name="aggiungi">Aggiungi</button>
        </form>

    </div>
</div>

<?php
if (isset($conn)) {
    if (isset($_POST['aggiungi'])) {
        $titolo = $_POST['name'];
        $descrizione = $_POST['price'];
        $costo = $_POST['price'];
        $immagine = $_FILES['image']['name'];
        $albergo = $_POST['albergo'];

        $target = "../drawable/db/" . basename($_FILES['image']['name']);

        // inserisci pacchetto
        $pacchetto_query = "INSERT INTO pacchetto(titolo, descrizione, costo, immagine, id_albergo) VALUES ('$titolo', '$descrizione', '$costo', '$immagine', '$albergo');";
        $pacchetto_run = $conn->query($pacchetto_query);

        // trova l'id del pacchetto appena caricato
        $pacchetto_id_query = "SELECT MAX(id) as max_id FROM pacchetto;";
        $pacchetto_id_result = $conn->query($pacchetto_id_query);
        $pacchetto_id = $pacchetto_id_result->fetch_assoc()['max_id'];

        // inserisci i collegamenti con le attrazioni
        if (!empty($_POST['attr'])) {
            foreach ($_POST['attr'] as $attrazione) {
                $pac_attr_query = "INSERT INTO pacchetto_attrazione(id_pacchetto, id_attrazione) VALUES ('$pacchetto_id', '$attrazione');";
                $pac_attr_run = $conn->query($pac_attr_query);
            }
        }

        // inserisci l'immagine nel sito
        $image_added = false;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image_added = true;
        } else {
            $image_added = false;
        }

        // controlla se la query è andata a buon fine
        $boolean = true;
        if (isset($pac_attr_run)) {
            $boolean = $pac_attr_run;
        }

        if ($pacchetto_run && $boolean && $image_added) {
            echo "Form submitted!";
        } else {
            echo "Form not submitted!";
        }

        $_POST = array();
    }
}
?>

<! Footer>

<footer>
    Plan&Travel | Via Roma, 24 - 55045 Pietrasana (Lucca) ITALIA | P.Iva 000000000 <br>
    <a class="trans-color-text" href="#">info@plan&travel.com</a> | <span itemprop="telephone"><a
                href="#">0883 200300</a></span>
    <br><a href="privacy_and_cookies.html"> privacy</a> | <a href="privacy_and_cookies.html"> cookie policy</a>

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
</script>

</body>
</html>
