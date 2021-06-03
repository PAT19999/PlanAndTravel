<?php
include_once '../includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        $email = $conn->real_escape_string($_POST['email']);
        $nome = $conn->real_escape_string($_POST['nome']);
        $cognome = $conn->real_escape_string($_POST['cognome']);
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        $passConfirm = $conn->real_escape_string($_POST['passConfirm']);
        $immagine = "avatar.jpg";

        // controlla che passConfirm corrisponda a password
        if ($password !== $passConfirm) {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => 'Le password non corrispondono!'
                ));
            die($output);
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // controlla che username e email non siano già nel db
        $username_sql = "SELECT * FROM utente WHERE username = '$username';";
        $username_result = $conn->query($username_sql);
        if ($username_result->num_rows != 0) {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => "L'username è già associato ad un account!"
                ));
            die($output);
        }

        $email_sql = "SELECT * FROM utente WHERE email = '$email';";
        $email_result = $conn->query($email_sql);
        if ($email_result->num_rows != 0) {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => "L'email è già associata ad un account!"
                ));
            die($output);
        }

        $insert_sql = "INSERT INTO utente(username, email, password, nome, cognome, immagine) VALUES ('$username', '$email', '$hashed_password', '$nome', '$cognome', '$immagine');";
        $insert_run = $conn->query($insert_sql);

        if ($insert_run) {
            session_start();

            $_SESSION['isLogged'] = true;
            $_SESSION['isAgenzia'] = false;
            $_SESSION['username'] = $username;
            $_SESSION['nome'] = $nome;
            $_SESSION['cognome'] = $cognome;
            $_SESSION['email'] = $email;
            $_SESSION['immagine'] = $immagine;

            $output = json_encode(
                array(
                    'result' => 'success'
                ));
        } else {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => 'Registrazione non effettuata correttamente!'
                ));
        }
        $conn->close();
        die($output);
    }
}