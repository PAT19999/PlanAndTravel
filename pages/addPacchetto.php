<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserisci un pacchetto</title>
</head>
<body>

    <form action="../methods/insertPacchetto.php" method="post">
        <label>Nome: <input type="text" name="name"></label><br><br>
        <label>Descrizione: <input type="text" name="desc"></label><br><br>
        <label>Costo :<input type="number" name="price"></label><br><br>
        <label>Tipo :<input type="text" name="type"></label><br><br>
        <button type="submit" name="aggiungi">Aggiungi</button>
    </form>

</body>
</html>
