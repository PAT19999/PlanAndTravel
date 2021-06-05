<?php
include_once '../includes/db_connection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // controlla se si è inserita l'immagine
    if ($_FILES['image']['name'] == "") {
        $output = json_encode(
            array(
                'result' => 'failure',
                'text' => "Inserisci un'immagine!"
            ));
        die($output);
    }

    if (isset($conn)) {
        $username = $_SESSION['username'];
        $titolo = $_POST['name'];
        $descrizione = $_POST['desc'];
        $costo = $_POST['price'];
        $immagine = $_FILES['image']['name'];

        // inserisci pacchetto
        $pacchetto_query = "INSERT INTO pacchetto(titolo, descrizione, costo, immagine, username_agenzia) VALUES ('$titolo', '$descrizione', '$costo', '$immagine', '$username');";
        $pacchetto_run = $conn->query($pacchetto_query);

        if (!$pacchetto_run) {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => 'Errore nel caricamento del pacchetto!'
                ));
            die($output);
        }

        $pacchetto_id = $conn->insert_id;

        // inserisci i collegamenti con le attrazioni
        if (!empty($_POST['attr'])) {
            foreach ($_POST['attr'] as $attrazione) {
                $pac_attr_query = "INSERT INTO pacchetto_attrazione(id_pacchetto, id_attrazione) VALUES ('$pacchetto_id', '$attrazione');";
                $pac_attr_run = $conn->query($pac_attr_query);
                if (!$pac_attr_run) {
                    $output = json_encode(
                        array(
                            'result' => 'failure',
                            'text' => 'Errore nel caricamento del pacchetto!'
                        ));
                    die($output);
                }
            }
        }

        $target = "../drawable/db/" . basename($_FILES['image']['name']);

        // inserisci l'immagine nel sito
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => "Errore nell'insermento dell'immagine!"
                ));
            die($output);
        }

        $output = json_encode(
            array(
                'result' => 'success',
                'text' => 'Pacchetto caricato correttamente!'
            ));
        die($output);
    }
}