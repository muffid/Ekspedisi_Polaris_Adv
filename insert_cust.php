<?php
include_once 'connection.php';
if(isset($_POST['tambah']))
{	 
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
	 $kategori = $_POST['kateg ori'];


if ( $kategori === "Admin") {
	echo "halam admin";
}else if ( $kategori === "Siswa") {
	echo "halam Siswa";
}
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


	 $sql = "INSERT INTO customer (ID,Nama,Alamat,Desa,Kecamatan,Kab,Provinsi,Kode_Pos,No_Hp,No_Hp2,Email,Golongan)
	 VALUES ('','$name','$alamat','$strDesa','$strKec','$strKab','$strProv','$kodepos','$nohp','$nohp2','$email','$kategori')";
	 if (mysqli_query($conn, $sql)) {
		 session_start();
		 $_SESSION["info"] = 'Data berhasil ditambah | go to halaman <a href="input_exp_page.php?m=2&n=1" class="btn btn-success">ekspedisi</a>';
		header("Location: insert_cust_page.php?m=3&n=1");
		exit();
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}