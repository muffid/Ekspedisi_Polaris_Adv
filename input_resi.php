<?php


session_start();
include 'connection.php';
$sql="UPDATE transaksi SET No_Resi = '".$_POST['resi']."' WHERE ID=".$_POST['no'];
 if (mysqli_query($conn, $sql)) {
		 session_start();
		 $_SESSION["info"] = "Nomor Resi Berhasil Disimpan";
		header("Location: lihat_exp_page.php?m=2&n=2");
		exit();
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
?>