<?php
include_once '../includes/db_connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        $username = $_SESSION['username'];
        $titolo = $_POST['titolo'];
        $descrizione = $_POST['desc'];
        $stelle = $_POST['rate'];
        $tipo = $_POST['tipo'];
        $anno = date("Y");
        $mese = date("m");
        $giorno = date("d");

        if ($tipo === 'true') {
            $id_meta = $_POST['id_meta'];
            $id_pacchetto = 0;
            $tipo = 1;
            $recensione_sql = "INSERT INTO recensione(titolo, descrizione, stelle, tipo, anno, mese, giorno, id_meta, id_pacchetto, username_utente) VALUES ('$titolo', '$descrizione', '$stelle', '$tipo', '$anno', '$mese', '$giorno', '$id_meta', '$id_pacchetto', '$username');";
        } else {
            $tipo = 0;
            $id_meta = 0;
            $id_pacchetto = $_POST['id_pacchetto'];
            $recensione_sql = "INSERT INTO recensione(titolo, descrizione, stelle, tipo, anno, mese, giorno, id_meta, id_pacchetto, username_utente) VALUES ('$titolo', '$descrizione', '$stelle', '$tipo', '$anno', '$mese', '$giorno', '$id_meta', '$id_pacchetto', '$username');";
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