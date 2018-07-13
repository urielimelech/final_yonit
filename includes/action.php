<?php
    include "db.php";

    $id = $_POST['id'];

    $query = "DELETE FROM tb_playList_218 WHERE id=".$id;
    mysqli_query($connection, $query);
    $query2 = "SELECT * FROM tb_playList_218";
    $result3 = mysqli_query($connection, $query2);
    $rows = array();
    while($row = mysqli_fetch_assoc($result3)) {
        $rows[] = $row;
    }
    echo json_encode($rows);

    mysqli_free_result($result3);
    mysqli_close($connection);
?>


