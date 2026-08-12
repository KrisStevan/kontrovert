<?php
	include("../db.inc.php");
	connect_db($db);

    $table = isset($_GET['table']) ? $_GET['table'] : '';
    $id = isset($_GET['linkID']) ? $_GET['linkID'] : '';
    $fromPage = isset($_GET['from']) ? $_GET['from'] : '';

    if(isset($_GET['linkID'])){
		$hapus_berita = mysqli_query($db, "DELETE FROM $table WHERE id='$id'");
		echo "<b>Data sudah dihapus!<br>silahkan tunggu....";
		echo "<meta http-equiv=Refresh content=4;url=$fromPage.php>";
	}
	else{
		echo "Maaf ada masalah...";
	}
?>