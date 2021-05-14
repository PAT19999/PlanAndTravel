<?php
include_once '../includes/db_connection.php';

if (isset($conn)) {
    if (isset($_POST['aggiungi'])) {
        if (!empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['price']) && !empty($_POST['type'])) {
            $titolo = $_POST['name'];
            $descrizione = $_POST['price'];
            $costo = $_POST['price'];
            $tipo = $_POST['type'];

            $query = "INSERT INTO pacchetto(titolo, descrizione, costo, tipo) VALUES ('$titolo', '$descrizione', '$costo', '$tipo');";
            $run = mysqli_query($conn, $query) or die(mysqli_error($conn));

            if ($run) {
                echo "Form submitted!";
            } else {
                echo "Form not submitted!";
            }
        } else {
            echo "All fields required";
        }
    }

    $sql = "SELECT * FROM pacchetto;";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);

    if ($result_check > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br>" . $row['id'] . "<br>";
            echo $row['titolo'] . "<br>";
            echo $row['descrizione'] . "<br>";
            echo $row['costo'] . "<br>";
            echo $row['tipo'] . "<br>";
        }
    }
}