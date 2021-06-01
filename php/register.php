<?php
include_once '../includes/db_connection.php';

$email = $_POST['email'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$passConfirm = $_POST['pass'];

$boolean = true;

// controlla che passConfirm corrisponda a pass
if ($pass != $passConfirm) {
    echo "Le password non corrispondono";
    $boolean = false;
}

if (isset($conn)) {
    // controlla che username e email non siano già nel db
    $username_sql = "SELECT * FROM utente WHERE username = '$username';";
    $username_result = mysqli_query($conn, $username_sql);
    if ($username_result->num_rows != 0) {
        echo "La mail è già associata ad un account";
        $boolean = false;
    }

    $email_sql = "SELECT * FROM utente WHERE email = '$email';";
    $email_result = mysqli_query($conn, $email_sql);
    if ($email_result->num_rows != 0) {
        echo "L'username è già associato ad un account";
        $boolean = false;
    }

    if ($boolean) {
        // inserisci l'utente nel db
        $insert_sql = "INSERT INTO utente(username, email, password, nome, cognome) VALUES ('$username', '$email', '$pass', '$nome', '$cognome');";
        $insert_run = mysqli_query($conn, $insert_sql) or die(mysqli_error($conn));

        if ($insert_run) {
            echo "Registrazione effettuata correttamente!";
        } else {
            echo "Registrazione non effettuata correttamente!";
        }
    }
}