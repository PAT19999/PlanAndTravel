<?php
include_once '../includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($conn)) {
        if (isset($_POST['login'])) {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $username = $conn->real_escape_string($_POST['username']);
                $password = $conn->real_escape_string($_POST['password']);

                // trova l'utente
                $user_sql = "SELECT * FROM utente WHERE username = '$username';";
                $user_result = $conn->query($user_sql);
                if ($user_result) {
                    if ($user_result->num_rows == 1) {
                        $row = $user_result->fetch_array(MYSQLI_ASSOC);
                        if (password_verify($password, $row['password'])) {
                            session_start();

                            $_SESSION['isLogged'] = true;
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['nome'] = $row['nome'];
                            $_SESSION['cognome'] = $row['cognome'];
                            $_SESSION['email'] = $row['email'];
                            header("location: ../pages/profilo_utente.php");
                        } else {
                            echo "La password non è corretta";
                        }
                    } else {
                        echo "Non ci sono account associati";
                    }
                } else {
                    echo "Errore in fase di login";
                }
            } else {
                echo "All data required";
            }
        }
        $conn->close();
    }
}