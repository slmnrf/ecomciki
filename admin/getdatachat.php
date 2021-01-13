<?php
		$kdfaktur = $_GET['kdfaktur'];
		$sql_dpesan = $con->query("SELECT a.*, b.* FROM inbox_detail as a, inbox as b WHERE b.judul LIKE '%$kdfaktur' AND a.kd_inbox=b.kd_inbox");
		$row_dpesan = $sql_dpesan->fetch(PDO::FETCH_LAZY);
?>