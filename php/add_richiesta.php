<?php
include_once '../includes/db_connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];
        $oggetto = $_POST['testo'];

        if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === true) {
            $username = $_SESSION['username'];
        }

        if (isset($username)) {
            $contatti_sql = "INSERT INTO richiesta(nome, cognome, email, oggetto, username_utente) VALUES ('$nome', '$cognome', '$email', '$oggetto', '$username');";
        } else {
            $contatti_sql = "INSERT INTO richiesta(nome, cognome, email, oggetto) VALUES ('$nome', '$cognome', '$email', '$oggetto');";
        }

        $contatti_run = $conn->query($contatti_sql);

        if ($contatti_run) {
            $output = json_encode(
                array(
                    'result' => 'success',
                    'text' => 'Richiesta inviata!'
                ));
        } else {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => 'Richiesta non inviata!'
                ));
        }
        $conn->close();
        die($output);
    }
}