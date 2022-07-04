<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

$web = "jualdecal";
$topIdres=mysqli_query($conn,"SELECT COUNT(*) FROM transaksi");
$row=mysqli_fetch_row($topIdres);
$topIdStr = $row[0];
$idUser="";
$idDari="";
$exped="";
$nohp2="";
$resi="";
  $nama=$_GET['id'];
  $data=mysqli_query($conn,"SELECT * FROM transaksi WHERE ID=$nama");

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lihat Ekspedisi - PolarisADV</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.dataTables.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>

  <style>
    tr.highlight {
    background-color: #000C66 !important;
   
    color: white;
    }

    th, td {
    white-space: nowrap;
    border: none;
    }</style>

</head>

<body>
  <?php include 'segment/sidebar.php';

  ?>
    <main id="main" class="main">


      <?php
                            @session_start();
                            if(isset($_SESSION["info"])){
                              ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION["info"]; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>

                            <?php
                                  unset($_SESSION["info"]);
                            }

                            ?>

                            <?php
                            @session_start();
                            if(isset($_SESSION["fail"])){
                              ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION["fail"]; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>

                            <?php
                                  unset($_SESSION["fail"]);
                            }

                            ?>


      
  <div class="pagetitle">
       <h1> <span class="ri-settings-line"></span> SETTING EKSPEDISI</h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="index.php">Home</a></li>
           <li class="breadcrumb-item">Manage Ekspedisi</li>
           <li class="breadcrumb-item active">Lihat Ekspedisi</li>
         </ol>
       </nav>
     </div><!-- End Page Title -->

     <section class="section">
       <div class="row">
         <div class="col-lg-12">
            <div class="card">
                    <div class="card-body">
                     <!-- JNE -->
                     <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Description</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $dtTransact) :
      // code...
       $idUser=$dtTransact['ID_Cus'];
      $nama=mysqli_query($conn,"SELECT Nama,No_Hp2 FROM customer WHERE ID=".$dtTransact["ID_Cus"]);
      foreach ($nama as $d):
        $namacus=$d['Nama'];
        $nohp2=$d['No_Hp2'];
       
      endforeach;
    ?>
    <tr>
      <th scope="row">Nama</th>
      <td>: <?php echo ($namacus. '<button  type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#myModal"><i class="ri-user-search-fill"></i></button>');?> </td>

    </tr>
    <tr>
      <th scope="row">Jenis customer</th>
      <td>: <?php echo ($dtTransact['Jenis_Customer']);?> </td>

    </tr>
    <?php 

    if($dtTransact['Keterangan']==""){

    }else{
      echo('<tr>
      <th scope="row">Pemesan</th>
      <td>:');
      $idDari=$dtTransact['Keterangan'];
      $datadari=mysqli_query($conn,"SELECT Nama FROM customer WHERE ID=".$dtTransact['Keterangan']);
      foreach($datadari as $dd):

      echo ($dd['Nama'].'<button  type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#myModal1"><i class="ri-user-search-fill"></i></button></td> </tr>');endforeach;
    }

     ?> 

   
    <tr>
      <th scope="row">No Resi</th>
      <td>: <?php echo ($dtTransact['No_Resi']); $resi=$dtTransact['No_Resi'];?> </td>

    </tr>
    <tr>
      <th scope="row">Ekspedisi</th>
      <td>: <?php echo ($dtTransact['Expedisi']);$exped=$dtTransact['Expedisi'];?> </td>

    </tr>
     <tr>
      <th scope="row">Di input oleh</th>
      <td>: <?php echo ($dtTransact['admin']);?> </td>

    </tr>
    <tr>
      <th scope="row">Tanggal Record</th>
      <td>: <?php echo ($dtTransact['Tanggal']); endforeach;?> </td>

    </tr>

  </tbody>
</table>
                    </div>
                  </div>
                </div>

       </div>
     </section>



     <section class="section">
       <div class="row">
         <div class="col-lg-8">
            <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><i class="ri-menu-2-line"></i> Menu</h5>
                      <button type="button" class="btn btn-danger" onclick="deleteData(<?php echo($_GET['id']);?>)"><i class="ri-delete-bin-line"></i> Hapus Data</button>
                      <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalresi"><i class="ri-edit-box-line"></i> Ganti Resi</button>
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalcetak"><i class="ri-printer-line"></i> Cetak Ulang</button>
                      <?php 
                      if($nohp2=="" || $resi==""){
                           echo('<button type="button" class="btn btn-link" disabled>unavailable</button>');
                      }else{
                          echo('<button type="button" class="btn btn-outline-primary" onclick="sendWA('.$_GET['id'].')"><i class="bi bi-send-check"></i> Kirim Resi Via No Hp 2</button>');
                      }?>

                      
                    </div>
                  </div>
                </div>

       </div>
     </section>

<div class="modal fade" id="myModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><i class="ri-user-search-fill"></i> Detail Customer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Description</th>

    </tr>
  </thead>
  <tbody>
    <?php

      $datauser=mysqli_query($conn,"SELECT * FROM customer WHERE ID=".$idUser);
     foreach ($datauser as $dtU) :
      // code...
     
    ?>
    <tr>
      <th scope="row">Nama</th>
      <td>: <?php echo ($dtU["Nama"]);?> </td>

    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td>: <?php echo ($dtU['Alamat']);?> </td>
    </tr>
    <tr>
      <th scope="row">Desa</th>
      <td>: <?php echo ($dtU['Desa']);?> </td>
    </tr>
    <tr>
      <th scope="row">Kecamatan</th>
      <td>: <?php echo ($dtU['Kecamatan']);?> </td>
    </tr>
    <tr>
      <th scope="row">Kabupaten</th>
      <td>: <?php echo ($dtU['Kab']);?> </td>
    </tr>
    <tr>
      <th scope="row">Provinsi</th>
      <td>: <?php echo ($dtU['Provinsi']);?> </td>
    </tr>
    <tr>
      <th scope="row">Kode Pos</th>
      <td>: <?php echo ($dtU['Kode_Pos']);?> </td>
    </tr>
    <tr>
      <th scope="row">No Hp</th>
      <td>: <?php echo ($dtU['No_Hp']);?> </td>
    </tr>
    <tr>
      <th scope="row">No Hp 2</th>
      <td>: <?php echo ($dtU['No_Hp2']);?> </td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td>: <?php echo ($dtU['Email']);?> </td>
    </tr>
    <tr>
      <th scope="row">Jenis Customer</th>
      <td>: <?php echo ($dtU['Golongan']);endforeach?> </td>
    </tr>

  </tbody>
</table>
                    <div class="modal-footer">
                    
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      
                    </div>
                  </div>
                </div>
              </div>
</div>




<div class="modal fade" id="myModal1" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><i class="ri-user-search-fill"></i> Detail Customer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Description</th>

    </tr>
  </thead>
  <tbody>
    <?php

      $datauser=mysqli_query($conn,"SELECT * FROM customer WHERE ID=".$idDari);
     foreach ($datauser as $dtU) :
      // code...
     
    ?>
    <tr>
      <th scope="row">Nama</th>
      <td>: <?php echo ($dtU["Nama"]);?> </td>

    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td>: <?php echo ($dtU['Alamat']);?> </td>
    </tr>
    <tr>
      <th scope="row">Desa</th>
      <td>: <?php echo ($dtU['Desa']);?> </td>
    </tr>
    <tr>
      <th scope="row">Kecamatan</th>
      <td>: <?php echo ($dtU['Kecamatan']);?> </td>
    </tr>
    <tr>
      <th scope="row">Kabupaten</th>
      <td>: <?php echo ($dtU['Kab']);?> </td>
    </tr>
    <tr>
      <th scope="row">Provinsi</th>
      <td>: <?php echo ($dtU['Provinsi']);?> </td>
    </tr>
    <tr>
      <th scope="row">Kode Pos</th>
      <td>: <?php echo ($dtU['Kode_Pos']);?> </td>
    </tr>
    <tr>
      <th scope="row">No Hp</th>
      <td>: <?php echo ($dtU['No_Hp']);?> </td>
    </tr>
    <tr>
      <th scope="row">No Hp 2</th>
      <td>: <?php echo ($dtU['No_Hp2']);?> </td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td>: <?php echo ($dtU['Email']);?> </td>
    </tr>
    <tr>
      <th scope="row">Jenis Customer</th>
      <td>: <?php echo ($dtU['Golongan']);endforeach?> </td>
    </tr>

  </tbody>
</table>
                    <div class="modal-footer">
                    
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      
                    </div>
                  </div>
                </div>
              </div>
</div>


<div class="modal fade" id="modalresi" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><i class="ri-user-search-fill"></i>Update No Resi</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form method="POST" action="input_resi.php" class="row g-3">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">ID Transaksi</label>
                  <input type="text" class="form-control" id="no" name="no" value="<?php echo($_GET['id']);?>"readonly ><br>
                  <label for="inputNanme4" class="form-label">NO Resi Baru:</label>
                  <input type="text" class="form-control" id="resi" name="resi">
                  
                </div>
                
                    <div class="modal-footer">
                      <button type="submit" id="updateResi"class="btn btn-success" data-bs-dismiss="modal">Update Resi</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>




</div>





<div class="modal fade" id="modalcetak" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><i class="ri-user-search-fill"></i>Cetak Ulang Label</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                        <label for="inputNanme4" class="form-label">Expedisi : </label>
                  <input type="text" class="form-control" id="exped" name="exped" value="<?php echo($exped);?>"readonly ><br>
                        <label for="inputNanme4" class="form-label">Kode Expedisi (Optional):</label>
                        <input type="text" class="form-control" id="code" name="code">

                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" onclick="print(<?php echo($idUser);?>)" data-bs-dismiss="modal">Cetak</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
 
                    </div>
                  </div>
                </div>
              </div>             
</div>


    </main>

    <script>

      function sendWA(idcus){
       window.open("kirim_resi.php?idcus="+idcus+"&hp2=1");
      }


      function print(idcus){
        var code=document.getElementById("code").value;
        var exped=document.getElementById("exped").value;
        window.open("laporan.php?id_cust="+idcus+"&exp="+encodeURIComponent(exped)+"&code="+code);
        console.log("laporan.php?id_cust="+idcus+"&exp="+encodeURIComponent(exped)+"&code="+code);
      }

function deleteData(idToDelete) {
  
  if (confirm("WARNING! Anda yakin ingin menghapus data ini?")) {
   location.replace("delete_transaksi.php?m=2&n=2&id="+idToDelete);
  } else {
    
  }
  
}
</script>

<?php
include 'segment/footer.php';
}else{
     header("Location: login.php");
     exit();
}
 ?>
