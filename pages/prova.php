<?php
    include_once 'includes/dbh-inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina di prova</title>
</head>
<body>

<?php
    $sql = "SELECT * FROM meta_turistica;";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);

    if ($result_check > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['meta_uid'];
        }
    }
?>

</body>
</html>
