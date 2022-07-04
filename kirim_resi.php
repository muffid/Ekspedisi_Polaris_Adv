<?php

session_start();
include 'connection.php';

$idcus=$_GET['idcus'];
echo ($idcus);
if($_GET['hp2']==""){
		//get Data ID customer dan Nomor rsi
	$data=mysqli_query($conn,"SELECT ID_Cus,No_Resi,Expedisi FROM transaksi WHERE ID =".$idcus);
	foreach($data as $datares):
		$ID=$datares["ID_Cus"];
		$strResi=$datares["No_Resi"];
		$strExp=urlencode($datares["Expedisi"]);

	endforeach;

	//get Data ==> Nama customer dan Nomor hp customer
	$dataCust=mysqli_query($conn,"SELECT Nama, No_Hp FROM customer WHERE ID =".$ID);
	foreach($dataCust as $custData):
		$strNama=$custData["Nama"];
		$strPhone=$custData["No_Hp"];
	endforeach;

	//mengubah no telfon dari '0' ke '+62'
	$strPhone = ltrim($strPhone, '0');
	header("Location: https://wa.me/+62".$strPhone."?text=Yth.%20".$strNama."%20Terima%20kasih%20telah%20oreder%20di%20Polaris,%20Pesanan%20anda%20telah%20kami%20kirim%20melalui".$strExp.",%20NO%20Resi%20paket%20anda%20adalah%20".$strResi);
	//echo("eei");
	exit();
}else{
		//get Data ID customer dan Nomor rsi
	$data=mysqli_query($conn,"SELECT ID_Cus,No_Resi,Expedisi FROM transaksi WHERE ID =".$idcus);
	foreach($data as $datares):
		$ID=$datares["ID_Cus"];
		$strResi=$datares["No_Resi"];
		$strExp=urlencode($datares["Expedisi"]);

	endforeach;

	//get Data ==> Nama customer dan Nomor hp customer
	$dataCust=mysqli_query($conn,"SELECT Nama, No_Hp FROM customer WHERE ID =".$ID);
	foreach($dataCust as $custData):
		$strNama=$custData["Nama"];
		$strPhone=$custData["No_Hp2"];
	endforeach;

	//mengubah no telfon dari '0' ke '+62'
	$strPhone = ltrim($strPhone, '0');
	header("Location: https://wa.me/+62".$strPhone."?text=Yth.%20".$strNama."%20Terima%20kasih%20telah%20oreder%20di%20Polaris,%20Pesanan%20anda%20telah%20kami%20kirim%20melalui".$strExp.",%20NO%20Resi%20paket%20anda%20adalah%20".$strResi);
	//echo("eei");
	exit();
}

?>