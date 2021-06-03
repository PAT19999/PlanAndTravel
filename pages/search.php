<?php

include_once '../includes/db_connection.php';

/*try {
    $db = new PDO("mysql:host=localhost","root","");
} catch (PDOException $e){
    echo $e->getMessage();
}*/

$db = new PDO("mysql:host=localhost","root","");

if($_POST["search"]==""){
    echo "<h2> Nessun risultato trovato</h2>";

}else{
    $search = trim($_POST["search"]);

    $query=$db->prepare("SELECT * FROM search WHERE title like '%$search%' OR description like '%$search%'");
    $query->execute(array());
    $control=$query->fetchAll(PDO::FETCH_OBJ);
    $count=$query->rowCount();

    if ($count>0){ ?>
        <table>
            <tr style="font-size: 32px">
                <td>Title</td>
                <td>Description</td>
            </tr>

            <?php
                foreach ($control as $list){?>
                    <tr>
                        <td><?php echo $list->title;?></td>
                        <td><?php echo $list->description;?></td>
                    </tr>
                <?php }
            ?>
        </table>

    <?php }else{
        echo "<h2> Nessun risultato trovato</h2>";

    }



}

?>