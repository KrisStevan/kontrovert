<?php
    include "../db.inc.php";
    connect_db($db);

    $idTopik = (int)$_GET['idTopik'];

    $sql = "SELECT id, name FROM materials
            WHERE topics_id = $idTopik ORDER BY name";

    $result = mysqli_query($db,$sql);

    $data = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);
?>