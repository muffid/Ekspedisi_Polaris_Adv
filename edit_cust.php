<?php 

include_once 'connection.php';
if(isset($_POST['edit']))
{	 $cusid=$_POST['custid'];
	 $name = $_POST['namalengkap'];
	 $alamat = $_POST['alamat'];
	 $desa = $_POST['form_des'];
	 $kecamatan = $_POST['form_kec'];
	 $kabupaten = $_POST['form_kab'];
	 $provinsi = $_POST['form_prov'];
	 $kodepos = $_POST['kodepos'];
	 $nohp = $_POST['nohp'];
	 $nohp2 = $_POST['nohp2'];
	 $email = $_POST['email'];
	 $kategori = $_POST['kategori'];

	 //mengambil nama daerah
	 //1. DESA
	 $dataWil=mysqli_query($conn,"SELECT nama FROM wilayah_2020 WHERE kode LIKE '$desa'" );

	 while ($row = $dataWil->fetch_assoc()) {
    	$strDesa=$row['nama'];
	 }
	//2. KECAMATAN
	 $dataWil=mysqli_query($conn,"SELECT nama FROM wilayah_2020 WHERE kode LIKE '$kecamatan'" );

	 while ($row = $dataWil->fetch_assoc()) {
    	$strKec=$row['nama'];
	 }
	 //3. KABUPATEN
	 $dataWil=mysqli_query($conn,"SELECT nama FROM wilayah_2020 WHERE kode LIKE '$kabupaten'" );

	 while ($row = $dataWil->fetch_assoc()) {
    	$strKab=$row['nama'];
	 }
	 //4. PROVINSI
	 $dataWil=mysqli_query($conn,"SELECT nama FROM wilayah_2020 WHERE kode LIKE '$provinsi'" );

	 while ($row = $dataWil->fetch_assoc()) {
    	$strProv=$row['nama'];
	 }


	 $sql = "UPDATE customer SET ID='".$cusid."', Nama='".$name."', Alamat='".$alamat."', Desa='".$desa."', Kecamatan='".$kecamatan."', Kab='".$kabupaten."', Provinsi='".$provinsi."', Kode_Pos='".$kodepos."', No_Hp='".$nohp."',No_Hp2='".$nohp2."', Email='".$email."', Golongan='".$kategori."' WHERE ID=".$cusid;
	 if (mysqli_query($conn, $sql)) {
		 session_start();
		 $_SESSION["info"] = 'Data berhasil diubah';
		header("Location: lihat_cust_page.php?m=3&n=1&sort=All");
		exit();
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

if (isset($_POST['simpan'])) {
	$idadmin = $_POST['idadmin'];
	$name = $_POST['nama'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$simpan = "UPDATE admin SET ID='".$idadmin."', Nama='".$name."', User='".$user."', Password='".$pass."' WHERE ID=".$idadmin;

	if (mysqli_query($conn, $simpan)) {
		 session_start();
		 $_SESSION["ok"] = 'Data berhasil diubah';
		header("Location: admin_page.php?m=7&n=1");
		exit();
	 } else {
		echo "Error: " . $simpan . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
	
// echo $idadmin." ".$name." ".$user." ".$pass;
}

?>