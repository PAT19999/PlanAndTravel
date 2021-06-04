<?php
include_once '../includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        $password = $conn->real_escape_string($_POST['password']);
        $passConfirm = $conn->real_escape_string($_POST['passConfirm']);

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

        $email = $conn->real_escape_string($_POST['email']);
        $nome = $conn->real_escape_string($_POST['nome']);
        $username = $conn->real_escape_string($_POST['username']);

        if ($_POST['agenzia'] === 'true') {
            $piva = $_POST['piva'];
            $telefono = $_POST['telefono'];
            $immagine = "avatar.jpg";
            $verificata = false;

            $username_sql = "SELECT * FROM agenzia WHERE username = '$username';";
            $email_sql = "SELECT * FROM agenzia WHERE email = '$email';";
            $piva_sql = "SELECT * FROM agenzia WHERE piva = '$piva';";
            $telefono_sql = "SELECT * FROM agenzia WHERE telefono = '$telefono';";

            $insert_sql = "INSERT INTO agenzia(username, password, piva, nome, email, immagine, telefono, verificata) VALUES ('$username', '$hashed_password', '$piva', '$nome', '$email','$immagine', '$telefono', '$verificata');";
        } else {
            $cognome = $conn->real_escape_string($_POST['cognome']);
            $immagine = "avatar.jpg";

            $username_sql = "SELECT * FROM utente WHERE username = '$username';";
            $email_sql = "SELECT * FROM utente WHERE email = '$email';";

            $insert_sql = "INSERT INTO utente(username, email, password, nome, cognome, immagine) VALUES ('$username', '$email', '$hashed_password', '$nome', '$cognome', '$immagine');";
        }

        // controlla che username, email, piva e telefono non siano già nel db
        $username_result = $conn->query($username_sql);
        if ($username_result->num_rows != 0) {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => "L'username è già associato ad un account!"
                ));
            die($output);
        }

        $email_result = $conn->query($email_sql);
        if ($email_result->num_rows != 0) {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => "L'email è già associata ad un account!"
                ));
            die($output);
        }

        if (isset($piva_sql) && isset($telefono_sql)) {
            $piva_result = $conn->query($piva_sql);
            if ($piva_result->num_rows != 0) {
                $output = json_encode(
                    array(
                        'result' => 'failure',
                        'text' => "La p.IVA è già associata ad un account!"
                    ));
                die($output);
            }

            $telefono_result = $conn->query($telefono_sql);
            if ($telefono_result->num_rows != 0) {
                $output = json_encode(
                    array(
                        'result' => 'failure',
                        'text' => "Il telefono è già associato ad un account!"
                    ));
                die($output);
            }
        }

        $insert_run = $conn->query($insert_sql);

        if ($insert_run) {
            session_start();

            if ($_POST['agenzia'] === 'true') {
                $_SESSION['isAgenzia'] = true;
                $_SESSION['piva'] = $piva;
                $_SESSION['telefono'] = $telefono;
                $_SESSION['verificata'] = false;
            } else {
                $_SESSION['isAgenzia'] = false;
                $_SESSION['cognome'] = $cognome;
            }

            $_SESSION['isLogged'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['nome'] = $nome;
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
                    'text' => mysqli_error()
                ));
        }
        $conn->close();
        die($output);
    }
}