<?php 
include 'connection.php';
session_start();


if($_GET['drop']==0){
   $id=$_GET['k'];

   //simpan disini

   date_default_timezone_set('Asia/Jakarta');
   $tanggal= date("D, j M Y, G:i:s ");
   $data=mysqli_query($conn,"SELECT * FROM customer WHERE ID=$id");



   $namaAdmin=$_SESSION['user_name'];
   $exped=$_GET['exp'];
   $code=$_GET['code'];

       foreach ($data as $key):      
          $nama = $key["Nama"];
          $kecamatan = $key["Kecamatan"];
          $alamat = $key["Alamat"];
          $kab = $key["Kab"];
          $prop  = $key["Provinsi"];
          $kpos = $key["Kode_Pos"];
          $jenis=$key['Golongan'];     
       endforeach; 


   $save=mysqli_query($conn, "INSERT INTO transaksi VALUES ('','$tanggal','$id','$jenis','','','$namaAdmin','$exped')");
   if($save){
      $url="laporan.php?id_cust=".$id."&exp=".urlencode($exped)."&code=".$code;
      header('Location: '.$url);
      echo($jenis.$_GET['jenis']);
   }else{
   echo "nothing to save";}
}else{
   $id=$_GET['k'];
   $pemesan=$_GET['l'];
   //simpan disini

   date_default_timezone_set('Asia/Jakarta');
   $tanggal= date("D, j M Y, G:i:s ");
   $data=mysqli_query($conn,"SELECT * FROM customer WHERE ID=$id");



   $namaAdmin=$_SESSION['user_name'];
   $exped=$_GET['exp'];
   $code=$_GET['code'];

       foreach ($data as $key):      
          $nama = $key["Nama"];
          $kecamatan = $key["Kecamatan"];
          $alamat = $key["Alamat"];
          $kab = $key["Kab"];
          $prop  = $key["Provinsi"];
          $kpos = $key["Kode_Pos"];
          $jenis=$key['Golongan'];     
       endforeach; 


   $save=mysqli_query($conn, "INSERT INTO transaksi VALUES ('','$tanggal','$pemesan','Dropship','','$id','$namaAdmin','$exped')");
   if($save){
      $url="laporan.php?id_cust=".$pemesan."&exp=".urlencode($exped)."&code=".$code;
      header('Location: '.$url);
      echo($jenis.$_GET['jenis']);
   }else{
   echo "nothing to save";}
}

?>