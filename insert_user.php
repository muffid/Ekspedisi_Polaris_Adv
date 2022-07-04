<?php
include_once'connection.php';



function upload(){
	global $gagal;	

	$namaFile = $_FILES['Gambar']['name'];
	$ukuranGambar = $_FILES['Gambar']['size'];
	$error = $_FILES['Gambar']['error'];
	$tmpName = $_FILES['Gambar']['tmp_name'];

	//cek gambar ada/ tidak
	// if ($error === 4) {
	// 			$gagal = "Gambar Format salh";
	// 			return false;
	// }

	//cek ekstensi gambar
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$eksGambarSatu = explode('.',$namaFile);
	$eksGambar = strtolower(end($eksGambarSatu));

	if (!in_array($eksGambar, $ekstensiGambarValid)) {
		if(empty($_FILES['Gambar']['name'])){

		}else{
		$gagal = "Gambar yang diinput harus berformat (.jpg .jpeg .png)";
	
				return false;}
		
	}

	//cek ukuran file
	if ($ukuranGambar > 2400000) {
				$gagal = "Gambar Tidak Boleh Melebihi Dari 2MB";
				return false;
	}

$namaFileBaru = uniqid();
$namaFileBaru .= ".";
$namaFileBaru .= $eksGambar;

move_uploaded_file($tmpName, 'assets/img/'.$namaFileBaru);

return $namaFileBaru;
}


if(isset($_POST['simpan']))
{	 
	 $name = $_POST['Nama'];
	 $jabatan = $_POST['Jabatan'];
	 $user = $_POST['User'];
	 $pass = $_POST['Password'];
	 $gambarDefault = "user.png";


	 
	 
	 //upload gambar
	 $gambar = upload();
	 if(empty($_FILES['Gambar']['name'])){

			$sql = "INSERT INTO admin (ID,Nama,Jabatan,User,Password,Gambar)
			VALUES ('','$name','$jabatan','$user','$pass','$gambarDefault')";

			 if (mysqli_query($conn, $sql)) {
				 session_start();
				 $_SESSION["sukses"] = 'Data Sub Admin Berhasil Ditambah';
				header("Location: admin_page.php?m=7&n=1");
				
	 } else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	 }
	 mysqli_close($conn);
	 }
 

	 if (!$gambar) {
	 	session_start();
		 $_SESSION["kebesaran"] = $gagal;
		header("Location: admin_page.php?m=7&n=1");
	 }else{
	 	 $sql = "INSERT INTO admin (ID,Nama,Jabatan,User,Password,Gambar)
	 VALUES ('','$name','$jabatan','$user','$pass','$gambar')";


	 if (mysqli_query($conn, $sql)) {
		 session_start();
		 $_SESSION["sukses"] = 'Data Sub Admin Berhasil Ditambah';
		header("Location: admin_page.php?m=7&n=1");
		
	 } else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	 }
	 mysqli_close($conn);
	 }

}


if (isset($_POST['rubahGambar'])){
	$idAd = $_POST['idadmin'];
	$gambarLam = $_POST['gambarLama'];
	$name = $_POST['fullName'];

	if ($_FILES['Gambar']['error'] === 4 ) {
		$gambar = $gambarLam;
		
			}else{

				$gambar = upload();

			}

	$simpan = "UPDATE admin SET ID='".$idAd."', Nama='".$name."', Gambar='".$gambar."' WHERE ID=".$idAd;

	if (mysqli_query($conn, $simpan)) {

		 session_start();
		 $_SESSION["ok"] = 'Data berhasil diubah';
		 
		  $datausname=mysqli_query($conn,"SELECT * FROM admin WHERE ID=".$_SESSION['id']);

		  foreach($datausname as $d):
		  	$_SESSION['user_name']=$d["Nama"];
		  	$_SESSION['gmr']=$d["Gambar"];
		  endforeach;
		  

		header("Location: profil_page.php?m=8&n=1");
		exit();
	 } else {
		echo "Error: " . $simpan . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
	
// echo $idadmin." ".$name." ".$user." ".$pass;
// }

	
	

	
}

