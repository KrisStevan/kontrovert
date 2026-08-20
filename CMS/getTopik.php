<?php
    include "../db.inc.php";
    connect_db($db);

    $idJenis = (int)$_GET['idJenis'];

    if($idJenis === 5) 
    {
        $sql = "SELECT id, namaTopik FROM topics WHERE fg_in_materi = '1' ORDER BY namaTopik";
    } 
    else if ($idJenis === 1)
    {
        $sql = "SELECT id, namaTopik FROM topics WHERE fg_in_news = '1' ORDER BY namaTopik";
    }
    else
    {
        $sql = "SELECT id, namaTopik FROM topics ORDER BY namaTopik";
    }

    $result = mysqli_query($db, $sql);

    $data = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);
?>