<?php 
include 'connection.php';
session_start();

$passLama = $_POST["password"];
$passBaru = $_POST["newpassword"];
$ulangiPass = $_POST["renewpassword"];

$passDb = mysqli_query($conn, "SELECT Password FROM admin WHERE ID=".$_SESSION['id']);

foreach ($passDb as $k) {
	$DBpass = $k['Password'];
}

if ($passLama === $DBpass) {
	
	if ($passBaru === $ulangiPass) {
		
		$simpan = "UPDATE admin SET  Password='".$passBaru."' WHERE ID=".$_SESSION['id'];

			if (mysqli_query($conn, $simpan)) {
		 		
		 			$_SESSION["ok"] = 'Password berhasil diubah';
					header("Location: profil_page.php?m=8&n=1");
				exit();
	 		} else {
				echo "Error: " . $simpan . " " . mysqli_error($conn);
	 		}
	 			mysqli_close($conn);
	
	 //ketika pass baru salah diulangi
	}else{
		$_SESSION["passTidakSama"] = 'Password tidak sama !';
			header("Location: profil_page.php?m=8&n=1");
		exit();
	}

}else{

	$_SESSION["passSalah"] = 'Password Salah X';
		header("Location: profil_page.php?m=8&n=1");
	exit();

}




 ?>