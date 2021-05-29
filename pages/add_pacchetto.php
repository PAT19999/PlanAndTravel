<?php
include_once '../includes/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserisci un pacchetto</title>
</head>
<body>

<form action="add_pacchetto.php" method="post" enctype="multipart/form-data">
    <label>Nome: <input type="text" name="name"></label><br><br>
    <label>Descrizione: <input type="text" name="desc"></label><br><br>
    <label>Costo: <input type="number" name="price"></label><br><br>
    <input type="file" name="image"><br><br>
    <button type="submit" name="aggiungi">Aggiungi</button>
</form>

<?php
if (isset($conn)) {
    if (isset($_POST['aggiungi'])) {
        if (!empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['price']) && !empty($_FILES['image']['name'])) {
            $titolo = $_POST['name'];
            $descrizione = $_POST['price'];
            $costo = $_POST['price'];
            $immagine = $_FILES['image']['name'];

            $target = "../drawable/db/" . basename($_FILES['image']['name']);

            $query = "INSERT INTO pacchetto(titolo, descrizione, costo, immagine) VALUES ('$titolo', '$descrizione', '$costo', '$immagine');";
            $run = mysqli_query($conn, $query) or die(mysqli_error($conn));

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                echo "Image added" . "<br>";
            } else {
                echo "Image not added" . "<br>";
            }

            if ($run) {
                echo "Form submitted!" . "<br>";

                $sql = "SELECT * FROM pacchetto;";
                $result = mysqli_query($conn, $sql);
                $result_check = mysqli_num_rows($result);

                if ($result_check > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<br>" . $row['id'] . "<br>";
                        echo $row['titolo'] . "<br>";
                        echo $row['descrizione'] . "<br>";
                        echo $row['costo'] . "<br>";
                        echo $image_path = "../drawable/db/" . $row['immagine'] . "<br>";
                        echo "<div id='img_div'>";
                        echo "<img src='../drawable/db/" . $row['immagine'] . "' >";
                        echo "</div>";
                    }
                }
            } else {
                echo "Form not submitted!";
            }
        } else {
            echo "All fields required";
        }
    }
}
?>

</body>
</html>
