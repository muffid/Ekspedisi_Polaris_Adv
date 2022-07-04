<?php 	
require 'connection.php';

$id = $_GET["ID"];

if ($id == 1) {
	echo	"
		<script>
				alert('Super Admin Tidak Boleh Dihapus..!');
				document.location.href = 'admin_page.php?m=7&n=1';
		</script>
		";
}else{
	if (hapus($id) > 0) {
	echo	"
		<script>
				alert('Data Berhasil Dihapus');
				document.location.href = 'admin_page.php?m=7&n=1';
		</script>
		";
}else{
	echo	"
		<script>
				alert('Data Gagal Dihapus');
				document.location.href = 'admin_page.php?m=7&n=1';
		</script>
	";
}

}






 ?>