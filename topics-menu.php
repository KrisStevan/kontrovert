<?php
    require_once 'db.inc.php';
    connect_db($db);

    $sqlstr = 'SELECT id, namaTopik FROM topics WHERE fg_in_materi = 1 ORDER BY namaTopik ASC';
    $result = mysqli_query($db, $sqlstr);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = (int) $row['id'];
            $namaTopik = htmlspecialchars($row['namaTopik'], ENT_QUOTES, 'UTF-8');
            $topicUrl = 'materi.php?id=' . $id;

            //url contoh = http://localhost/kontrovert/materi.php?id=5
            echo '<li><a href="' . htmlspecialchars($topicUrl, ENT_QUOTES, 'UTF-8') . '">' . $namaTopik . '</a></li>';
        }
    } else {
        echo '<li><a href="#">Tidak ada materi</a></li>';
    }
?>
