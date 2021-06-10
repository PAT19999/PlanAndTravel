<?php
include_once '../includes/db_connection.php';
session_start();
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        $immagine = $_FILES['image']['name'];

        // inserisci l'immagine nel sito
        $target = "../drawable/db/" . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => "Errore! Immagine non cambiata correttamente!"
                ));
            die($output);
        } else {
            // cambia immagine sul db
            $propic_query = "UPDATE utente SET immagine='$immagine' WHERE username='$username';";
            $propic_run = $conn->query($propic_query);

            if (!$propic_run) {
                $output = json_encode(
                    array(
                        'result' => 'failure',
                        'text' => "Errore! Immagine non cambiata correttamente!"
                    ));
                die($output);
            } else {
                $_SESSION['immagine'] = $immagine;
                $output = json_encode(
                    array(
                        'result' => 'success',
                        'text' => "Immagine cambiata correttamente!",
                        'immagine' => "../drawable/db/" . $immagine
                    ));
                die($output);
            }
        }
    }
}