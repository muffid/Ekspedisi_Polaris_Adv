<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
$web = "jualdecal";
$topIdres=mysqli_query($conn,"SELECT COUNT(*) FROM customer");
$row=mysqli_fetch_row($topIdres);
$topIdStr = $row[0];
?>
<!-- =======================================================
  * Desain mengkombinasi dari bootstrap
  * System dikembangkan oleh tema anemos
  * License: https://anemos.id/license/
  ======================================================== -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Input Ekspedisi | Polaris ADV</title>
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


    }

    [type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #6495ED ;
}
    </style>

</head>

<body>
  <?php include 'segment/sidebar.php';

  ?>
   <main id="main" class="main">

     <div class="pagetitle">
       <h1> <span class="ri-truck-line"></span>  MANAGE EKSPEDISI</h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="index.php?01">Dashboard</a></li>
           <li class="breadcrumb-item">Manage Ekspedisi</li>
           <li class="breadcrumb-item active">Input Ekspedisi</li>
         </ol>
       </nav>
     </div><!-- End Page Title -->

     <div class="col-lg-12">

         
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pilih Jenis Pembelian</h5> 


               <section class="section">
                   <div class="row">
                     <div class="col-lg-12">

                       <div class="card">
                         <div class="card-body">
                           <h6 class="card-title">Tidak menemukan customer yang anda cari? <img src="assets/img/sad.png" height="32" width="32"></h6> masukan customer baru disini <a href="insert_cust_page.php?m=3&n=1" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> input customer</a>
                

                         </div>
                       </div>

                     </div>
                   </div>
                 </section>

                  <div class="col-lg-12">

              <!-- Default Tabs -->
              <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="ri-user-fill"></i> Customer Offline</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="ri-earth-fill"></i> Customer Online</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="ri-shopping-cart-fill"></i> Customer Dropship</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                 <br><br>
                  <table id="tableOffline" class="hover stripe">
                    <thead>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">No Hp</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Kabupaten</th>
                      <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 

                        $no=1;
                        $data=mysqli_query($conn,"SELECT * FROM customer WHERE Golongan LIKE 'Offline' ORDER BY ID DESC");
                        foreach ($data as $datacust) :
                          echo('<tr>');

                            echo('<td>'.$no.'</td> <td>'.$datacust["Nama"].'</td> <td>'.$datacust["No_Hp"].'</td><td>'
                            .$datacust["Alamat"].'</td><td>'.$datacust["Kab"].'</td>');?>
                            <td>
                              <a href="preview.php?id_des=<?php echo($datacust['ID']); ?>&m=2&n=1"  class="btn btn-primary">
                                <i class="bi bi-check"></i> pilih</a></td>
                          <?php
                          echo('</tr>');
                          $no++;
                        endforeach;
                        ?>
                    </tbody>
                    
                  </table>   
                </div>
                <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                <br><br>
                  <table id="tableOnline" class="hover stripe">
                    <thead>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">No Hp</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Kabupaten</th>
                      <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 

                        $no=1;
                        $data=mysqli_query($conn,"SELECT * FROM customer WHERE Golongan LIKE 'Online' ORDER BY ID DESC");
                        foreach ($data as $datacust) :
                          echo('<tr>');

                            echo('<td>'.$no.'</td> <td>'.$datacust["Nama"].'</td> <td>'.$datacust["No_Hp"].'</td><td>'
                            .$datacust["Alamat"].'</td><td>'.$datacust["Kab"].'</td>');?>
                            <td>
                              <a href="preview.php?id_des=<?php echo($datacust['ID']); ?>&m=2&n=1"  class="btn btn-primary">
                                <i class="bi bi-check"></i> pilih</a></td>
                          <?php
                          echo('</tr>');
                          $no++;
                        endforeach;
                        ?>
                    </tbody>
                    
                  </table>   
                </div>
                <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
                <br>

                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <br>
                            <p><i class="ri-user-shared-fill"></i> Customer dropship : </p>
                            <div class="input-group mb-3">

                              <input type="text" class="form-control" id="dropshiper" placeholder="Dropshiper" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                              <div class="input-group-append">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modaldropship" type="button"><i class="ri-search-line"></i></button>
                              </div>
                            </div>
                          </div>

                      <div class="col-sm-6">
                        <br>
                        <p><i class="ri-user-received-fill"></i> Customer Pemesan : </p>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" id="pemesan" placeholder="Pemesan" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                              <div class="input-group-append">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalpemesan" type="button"><i class="ri-search-line"></i></button>
                              </div>

                            </div>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
           
                            <div class="input-group mb-3">
                              
                            </div>
                </div>
                 <div class="col-sm-6">
                          <div class="row">
                            <div class="d-flex flex-row-reverse bd-highlight">
                              <div class="p-2 bd-highlight"><button class="btn btn-primary" id="btnKonf" onclick="openPage()">konfirmasi</button></div>
                            </div>
                          </div>
                </div>

              </div>

<!-- MODAL DROPSHIPER -->
<div class="modal fade" id="modaldropship" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Dropshiper</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table id="tableOfflineModal" class="hover stripe">
                    <thead>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">No Hp</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Kabupaten</th>
                      <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 

                        $no=1;
                        $data=mysqli_query($conn,"SELECT * FROM customer WHERE Golongan LIKE 'Dropship' ORDER BY ID DESC");
                        foreach ($data as $datacust) :
                          echo('<tr>');

                            echo('<td>'.$no.'</td> <td>'.$datacust["Nama"].'</td> <td>'.$datacust["No_Hp"].'</td><td>'
                            .$datacust["Alamat"].'</td><td>'.$datacust["Kab"].'</td>');?>
                            <td>
                             <button class="btn btn-primary" id="btnDrop" data-id="<?php echo($datacust["ID"]);?>" data-nama="<?php echo($datacust["Nama"]);?>">Pilih</button></td>
                          <?php
                          echo('</tr>');
                          $no++;
                        endforeach;
                        ?>
                    </tbody>
                    
                  </table> 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                     
                    </div>
                  </div>
                </div>
              </div>
               



<!-- MODAL PEMESAN -->
<div class="modal fade" id="modalpemesan" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Pemesan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table id="tablePemesanModal" class="hover stripe">
                    <thead>
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">No Hp</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Kabupaten</th>
                      <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 

                        $no=1;
                        $data=mysqli_query($conn,"SELECT * FROM customer WHERE Golongan LIKE 'Offline' ORDER BY ID DESC");
                        foreach ($data as $datacust) :
                          echo('<tr>');

                            echo('<td>'.$no.'</td> <td>'.$datacust["Nama"].'</td> <td>'.$datacust["No_Hp"].'</td><td>'
                            .$datacust["Alamat"].'</td><td>'.$datacust["Kab"].'</td>');?>
                            <td>
                             <button class="btn btn-primary" id="btnPemesan" data-id="<?php echo($datacust["ID"]);?>" data-nama="<?php echo($datacust["Nama"]);?>">Pilih</button></td>
                          <?php
                          echo('</tr>');
                          $no++;
                        endforeach;
                        ?>
                    </tbody>
                    
                  </table> 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                     
                    </div>
                  </div>
                </div>
              </div>
               

 <script>
  var vldPemesan=false;
  var vldDropship=false;
  var idDrop='';
  var idP='';

  function openPage(){
    
    window.location.href = 'preview_dropship.php?k='+idDrop+'&l='+idP+'&m=2&n=1';
  }
  
    $(document).ready(function() {

      document.getElementById("btnKonf").disabled=true;
    
    $('#tableOnline').DataTable( {

         
        scrollX:        true,
        scrollCollapse: true,
        
        fixedColumns:   {
            
            right: 1
        },
        

    } );

      $('#tableOffline').DataTable( {

         
        scrollX:        true,
        scrollCollapse: true,
        
        fixedColumns:   {
            
            right: 1
        },
        

    } );


          $('#tableOfflineModal').DataTable( {

         
        scrollX:        true,
        scrollCollapse: true,
        
        fixedColumns:   {
            
            right: 1
        },
        

    } );


         $('#tablePemesanModal').DataTable( {

         
        scrollX:        true,
        scrollCollapse: true,
        
        fixedColumns:   {
            
            right: 1
        },
        

    } );


  $(document).on('click','#btnPemesan', function(){
    vldPemesan=true;
    idP=$(this).data('id');
    var namap=$(this).data('nama');
    $('#pemesan').val(namap);

    if(vldDropship && vldPemesan){
      document.getElementById("btnKonf").disabled=false;
    }
    $('#modalpemesan').modal('hide');
  })

  $(document).on('click','#btnDrop', function(){
    vldDropship=true;
    idDrop=$(this).data('id');
    var nama=$(this).data('nama');
    $('#dropshiper').val(nama);
     if(vldDropship && vldPemesan){
      document.getElementById("btnKonf").disabled=false;
    }
    $('#modaldropship').modal('hide');
  })
} );   

 </script>
  </main>

<?php
include 'segment/footer.php';
}else{
     header("Location: login.php");
     exit();
}
 ?>
