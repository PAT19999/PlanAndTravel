<?php
include_once '../includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        $titolo = $_POST['name'];
        $descrizione = $_POST['desc'];
        $costo = $_POST['price'];
        $immagine = $_FILES['image']['name'];
        $albergo = $_POST['albergo'];

        // inserisci pacchetto
        $pacchetto_query = "INSERT INTO pacchetto(titolo, descrizione, costo, immagine, id_albergo) VALUES ('$titolo', '$descrizione', '$costo', '$immagine', '$albergo');";
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