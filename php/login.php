<?php
include_once '../includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        if (isset($_POST['agenzia']) && $_POST['agenzia'] === '1') {
            // trova l'agenzia
            $user_sql = "SELECT * FROM agenzia WHERE username = '$username';";
        } else {
            // trova l'utente
            $user_sql = "SELECT * FROM utente WHERE username = '$username';";
        }

        $user_result = $conn->query($user_sql);
        if ($user_result) {
            if ($user_result->num_rows == 1) {
                $row = $user_result->fetch_array(MYSQLI_ASSOC);
                if (password_verify($password, $row['password'])) {
                    session_start();

                    if (isset($_POST['agenzia']) && $_POST['agenzia'] === '1') {
                        $_SESSION['isAgenzia'] = true;
                        $_SESSION['piva'] = $row['piva'];
                        $_SESSION['telefono'] = $row['telefono'];
                        $_SESSION['verificata'] = $row['verificata'];
                    } else {
                        $_SESSION['isAgenzia'] = false;
                        $_SESSION['cognome'] = $row['cognome'];
                    }

                    $_SESSION['isLogged'] = true;
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nome'] = $row['nome'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['immagine'] = $row['immagine'];

                    $output = json_encode(
                        array(
                            'result' => 'success'
                        ));
                } else {
                    $output = json_encode(
                    array(
                        'result' => 'failure',
                        'text' => 'La password non è corretta!'
                    ));
                }
            } else {
                $output = json_encode(
                    array(
                        'result' => 'failure',
                        'text' => 'Non ci sono account associati!'
                    ));
            }
        } else {
            $output = json_encode(
                array(
                    'result' => 'failure',
                    'text' => 'Errore in fase di login!'
                ));
        }
        $conn->close();
        die($output);
    }
}