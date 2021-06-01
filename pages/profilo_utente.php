<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] !== true) {
    header("location: login.html");
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profilo Utente</title>
</head>
<body>
<h1>Profilo Utente</h1>
<?php
echo "Username: " . $_SESSION['username'] . "<br><br>";
echo "Nome: " . $_SESSION['nome'] . "<br><br>";
echo "Cognome: " . $_SESSION['cognome'] . "<br><br>";
echo "Email: " . $_SESSION['email'] . "<br><br>";
?>

<a href="../php/logout.php">Disconnetti</a>
</body>
</html>