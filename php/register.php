<?php
include_once '../includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        if (isset($_POST['registrati'])) {
            $email = $conn->real_escape_string($_POST['email']);
            $nome = $conn->real_escape_string($_POST['nome']);
            $cognome = $conn->real_escape_string($_POST['cognome']);
            $username = $conn->real_escape_string($_POST['username']);
            $password = $conn->real_escape_string($_POST['password']);
            $passConfirm = $conn->real_escape_string($_POST['passConfirm']);

            $boolean = true;

            // controlla che passConfirm corrisponda a pass
            if ($password !== $passConfirm) {
                echo "Le password non corrispondono";
                $boolean = false;
            }

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // controlla che username e email non siano già nel db
            $username_sql = "SELECT * FROM utente WHERE username = '$username';";
            $username_result = $conn->query($username_sql);
            if ($username_result->num_rows != 0) {
                echo "L'username è già associato ad un account";
                $boolean = false;
            }

            $email_sql = "SELECT * FROM utente WHERE email = '$email';";
            $email_result = $conn->query($email_sql);
            if ($email_result->num_rows != 0) {
                echo "La mail è già associata ad un account";
                $boolean = false;
            }

            if ($boolean) {
                // inserisci l'utente nel db
                $insert_sql = "INSERT INTO utente(username, email, password, nome, cognome) VALUES ('$username', '$email', '$hashed_password', '$nome', '$cognome');";
                $insert_run = $conn->query($insert_sql);

                if ($insert_run) {
                    echo "Registrazione effettuata correttamente!";
                    session_start();

                    $_SESSION['isLogged'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['nome'] = $nome;
                    $_SESSION['cognome'] = $cognome;
                    $_SESSION['email'] = $email;
                    header("location: ../pages/profilo_utente.php");
                } else {
                    echo "Registrazione non effettuata correttamente!";
                }
            }
        }
        $conn->close();
    }
}