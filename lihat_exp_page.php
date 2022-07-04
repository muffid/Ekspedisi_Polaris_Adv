<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

$web = "jualdecal";
$topIdres=mysqli_query($conn,"SELECT COUNT(*) FROM transaksi");
$row=mysqli_fetch_row($topIdres);
$topIdStr = $row[0];
    
    
    
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
       <h1> <i class="ri-truck-line"></i> LIHAT EKSPEDISI</h1>
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
               <h5 class="card-title"> Total Expedisi : <?php echo $topIdStr; ?></h5>
                  <!-- Table with stripped rows -->


                  <table id="myTable" class="hover stripe">
                             <thead>
                               <tr>
                                 <th scope="col"></th>
                                 <th scope="col">No</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Kategori</th>
                                 <th scope="col">Pemesan</th>
                                 <th scope="col">No Hp</th>
                                 <th scope="col">Alamat</th>       
                                 <th scope="col">No Resi</th>
                                 <th scope="col">Expedisi</th>
                                 <th scope="col">Tanggal</th>
                                 <th scope="col">Aksi</th>
                                 
                               </tr>
                             </thead>
                             <tbody>
                               <?php
                                  $no=1;
                                  $data=mysqli_query($conn,"SELECT * FROM transaksi ORDER BY ID DESC");?>
                                 
                                  <?php foreach ($data as $all): ?>

                                    <tr>
                                      <td><a href="setting_exp.php?m=2&n=2&id=<?php echo($all['ID']);?>"><i class="ri-settings-3-line"></i></a></td>
                                        <td><?= $no; ?></td>
                                       
                                            <?php $datacust=mysqli_query($conn,"SELECT Nama, Golongan,Alamat,No_Hp FROM customer WHERE ID=".$all["ID_Cus"]);
                                              foreach ($datacust as $resdatacust) :
                                          
                                                echo('<td>'.$resdatacust["Nama"].'</td>');
                                                echo('<td>'.$resdatacust["Golongan"].'</td>');

                                                  //mencari pemesan jika dia adalah dropship
                                                  if($resdatacust["Golongan"]=="Dropship"){
                                                    $dataPemesan=mysqli_query($conn,"SELECT Nama FROM customer WHERE ID=".$all["Keterangan"]);
                                                    foreach($dataPemesan as $d):

                                                    echo('<td>'.$d["Nama"].'</td>');
                                                    endforeach;
                                                  }else{
                                                     echo('<td>-</td>');
                                                  }

                                                echo('<td>'.$resdatacust["No_Hp"].'</td>');
                                                echo('<td>'.$resdatacust["Alamat"].'</td>');

                                              endforeach;
                                              ?>

                                        <td><?= $all["No_Resi"]; ?></td>
                                        <td><?= $all["Expedisi"]; ?></td>
                                        <td><?= $all["Tanggal"]; ?></td>  

                                       <?php 
                                            $NoResi=mysqli_query($conn,"SELECT No_Resi FROM transaksi WHERE ID=".$all["ID"]);
                                            foreach ($NoResi as $dataRes):
                                            if($dataRes["No_Resi"]===""){
                                               echo ('<td> <button  type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered');?><?=  $all["ID"].'"><i
                                                class="bi bi-upc-scan"> </i>Input Resi      </button>
                                                  
                                                </td>';
                                                    }else{
                                                        
                                                        echo ('<td> <button  type="button" id="btnKirim" value="'); echo($all["ID"].'"'); 
                                                        echo ('class="btn btn-warning" onclick="bukaWindow('.$all["ID"].')"');?><?=  $all["ID"].'"><i class="bi bi-send-check"></i> Kirim Resi</button></td>';}
                                            endforeach;?>
                                           
                                    </tr>
                           
              <!-- modal input resi -->
              <div class="modal fade" id="verticalycentered<?=  $all["ID"]; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Masukan No Resi</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <?php $idku=  $all["ID"];?> 
                       <!-- Vertical Form -->
              <form method="POST" action="input_resi.php" class="row g-3">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Transaksi ID :</label>
                  <input type="text" class="form-control" id="no" name="no" value="<?php echo $idku;?>"readonly ><br>
                  <input type="text" class="form-control" id="resi" name="resi">
                  
                </div>
                
            <!-- Vertical Form -->
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-download"> </i>Simpan</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      
                    </div>
                  </div>
                </div>
              </div>
  </form>




                                    <?php  $no++ ?>
                                    <?php  endforeach; ?>
                                  

                             </tbody>
                           </table>

            <script>
                
                
            
function bukaWindow(idcus) {
 
  window.open("kirim_resi.php?idcus="+idcus);
}

              $(document).ready(function() {
    $('#myTable').DataTable( {

         
        scrollX:        true,
        scrollCollapse: true,
        
        fixedColumns:   {
            
            right: 1
        },
        // "scrollX":true,
          dom: 'Bfrtip',
         buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
         ]

    } );
} );  
              
            </script>
             </div>
           </div>

         </div>
       </div>
     </section>




    </main>

<?php
include 'segment/footer.php';
}else{
     header("Location: login.php");
     exit();
}
 ?>
