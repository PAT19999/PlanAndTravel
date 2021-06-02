<?php
include_once '../includes/db_connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        $titolo = $_POST['titolo'];
        $descrizione = $_POST['desc'];
        $stelle = $_POST['stelle'];
        $tipo = $_POST['tipo'];
        $anno = date("Y");
        $mese = date("m");
        $giorno = date("d");


        if (isset($_SESSION['isAgenzia']) && $_SESSION['isAgenzia'] === false) {
            $username = $_SESSION['username'];
        } else {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => 'Errore, riprova!'
                ));
            die($output);
        }

        if ($tipo) {
            $id_meta = $_POST['id_meta'];
            $recensione_sql = "INSERT INTO recensione(titolo, descrizione, stelle, tipo, anno, mese, giorno, id_meta, username_utente) VALUES ('$titolo', '$descrizione', '$stelle', '$tipo', '$anno', '$mese', '$giorno', '$id_meta', '$username');";
        } else {
            $id_pacchetto = $_POST['id_pacchetto'];
            $recensione_sql = "INSERT INTO recensione(titolo, descrizione, stelle, tipo, anno, mese, giorno, id_pacchetto, username_utente) VALUES ('$titolo', '$descrizione', '$stelle', '$tipo', '$anno', '$mese', '$giorno', '$id_pacchetto', '$username');";
        }
        $recensione_run = $conn->query($recensione_sql);

        if ($recensione_run) {
            $output = json_encode(
                array(
                    'result' => 'success',
                    'text' => 'Recensione inviata!'
                ));
        } else {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => 'Recensione non inviata!'
                ));
        }
        $conn->close();
        die($output);
    }
}