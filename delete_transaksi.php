<?php
include_once 'connection.php';
$idToDelete=$_GET['id'];
$sql = "DELETE FROM transaksi WHERE id=".$idToDelete;

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully ".$idToDelete;
   $_SESSION["info"] = 'Data berhasil ditambah | go to halaman <a href="input_exp_page.php?m=2&n=1" class="btn btn-success">ekspedisi</a>';
		header("Location: lihat_exp_page.php?m=2&n=2");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>