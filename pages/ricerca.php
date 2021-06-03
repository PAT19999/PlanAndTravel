<?php
include_once '../includes/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina di ricerca</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <style>
        body{
            background: darkblue;
        }

        .search-box{
            border = 3px solid #000;
            border-radius: 100vh 100vh;
            width: 350px;
            position: absolute;
            top: 30%;
            left: 35%;
            background-color: #ffd000;
        }

        input{
            width: 280px;
            height: 50px;
            border-radius: 100vh 0 150vh 100vh;
            border: none;
            outline: none;
            padding: 0 10px;
        }

        i{
            padding: 10px 5px;

        }

        button{
            border: none;
            background-color: #ffd000;
            outline: none;
            cursor: pointer;
        }
    </style>

</head>
<body>

    <div class="search-box">
        <form action="search.php" method="POST">
            <input type="text" name="search" placeholder="Cerca una meta">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>

</body>
</html>



<?php

?>



