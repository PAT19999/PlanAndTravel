<?php
include_once '../includes/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form method = "post">
    <label>Ricerca</label>
    <input type = "text" name="search">
    <input type = "submit" name="submit">
</form>

</body>
</html>



<?php

$con = new PDO("mysql:host=localhost, dbname=plantraveldb", 'root', '');

if (isset($_POST["submit"])){
   $str = $_POST["search"];
   $sth = $con->prepare("SELECT * FROM `search` WHERE name = '$str'");

   $sth->setFetchMode(PDO:: FETCH_OBJ);
   $sth->execute();

   if($row = $sth->fetch()){
        ?>
        <br><br><br>
        <table>
            <tr>
                <th>name</th>
                <th>description</th>
            </tr>
            <tr>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->description; ?></td>
            </tr>
        </table>

       <?php
   }

       else{
           echo "Risultato non trovato";
       }

}
?>



