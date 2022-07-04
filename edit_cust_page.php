<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

	$datacust=mysqli_query($conn,"SELECT * FROM customer WHERE ID=".$_GET['ID']);
	foreach($datacust as $custdata):
		
		$strNama=$custdata['Nama'];
		$strAlamat=$custdata['Alamat'];
		$strKodePos=$custdata['Kode_Pos'];
		$strNohp=$custdata['No_Hp'];
        $strNohp2=$custdata['No_Hp2'];
		$strEmail=$custdata['Email'];
        $strKategori=$custdata['Golongan'];
        $strProv=$custdata['Provinsi'];
        $strKab=$custdata['Kab'];
        $strKec=$custdata['Kecamatan'];
        $strDes=$custdata['Desa'];
	endforeach;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit</title>
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










</head>

<body>

<script>




</script>




  <?php include 'segment/sidebar.php';

  ?>
   <main id="main" class="main">

     <div class="pagetitle">
       <h1> <span class="bi bi-people-fill"></span>  EDIT CUSTOMER</h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="index.php">Home</a></li>
           <li class="breadcrumb-item">Manage Customer</li>
           <li class="breadcrumb-item"><a href="lihat_cust_page.php?m=3&n=2&sort=All">Lihat Customer</a></li>
           <li class="breadcrumb-item active">Edit Customer</li>
         </ol>
       </nav>
     </div><!-- End Page Title -->

     <div class="col-lg-12">

         
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Data Customer</h5> 

              	<form onsubmit="return checkChar()" method="POST" action="edit_cust.php">
                                <div class="row mb-3">
                                    <label for="inputID" class="col-sm-2 col-form-label">ID : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="custid" name="custid"
                                            value="<?php echo ($_GET['ID']);?> " readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namalengkap" name="namalengkap"
                                            value="<?php echo($strNama);?>" required>
                                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat : </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="height: 100px" id="alamat" name="alamat"
                                            required><?php echo($strAlamat);?></textarea>
                                    </div>
                                </div>

                                <!----- Provinsi--->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                       <input type="text" id="form_prov" name="form_prov" class="form-control"value="<?php echo($strProv);?>"required>
                                    </div>
                                </div>

                                <!----- Kabupaten--->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kabupaten</label>
                                    <div class="col-sm-10">
                                       <input type="text" id="form_kab" name="form_kab" class="form-control"value="<?php echo($strKab);?>"required>
                                    </div>
                                </div>

                                <!----- Kecamatan--->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                     <div class="col-sm-10">
                                       <input type="text" id="form_kec" name="form_kec" class="form-control"value="<?php echo($strKec);?>"required>
                                    </div>
                                </div>

                                <!----- Desa--->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Desa</label>
                                     <div class="col-sm-10">
                                       <input type="text" id="form_des" name="form_des" class="form-control"value="<?php echo($strDes);?>"required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputKode" class="col-sm-2 col-form-label">Kode Pos : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?php echo($strKodePos);?>"required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputHp" class="col-sm-2 col-form-label">No Hp : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo($strNohp);?>"required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputHp" class="col-sm-2 col-form-label">No Hp 2 : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nohp2" name="nohp2" value="<?php echo($strNohp2);?>">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo($strEmail);?>">
                                    </div>
                                </div>
                                <?php 
                                    if($strKategori=="Offline"){
                                        echo('     <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                    <select id="kategori" name="kategori" class="form-select" aria-label="Default select example">
                                      <option value="Online">Online</option>
                                      <option value="Offline" selected>Offline</option>
                                      <option value="Marketplace">Marketplace</option>
                                      <option value="Dropship">Dropship</option>
                                    </select>
                                    </div>
                              </div>');
                                    }


                                       if($strKategori=="Online"){
                                        echo('     <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                    <select id="kategori" name="kategori" class="form-select" aria-label="Default select example">
                                      <option value="Online" selected>Online</option>
                                      <option value="Offline">Offline</option>
                                      <option value="Marketplace">Marketplace</option>
                                      <option value="Dropship">Dropship</option>
                                    </select>
                                    </div>
                              </div>');
                                    }

                                     if($strKategori=="Dropship"){
                                        echo('     <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                    <select id="kategori" name="kategori" class="form-select" aria-label="Default select example">
                                      <option value="Online">Online</option>
                                      <option value="Offline">Offline</option>
                                      <option value="Marketplace">Marketplace</option>
                                      <option value="Dropship" selected>Dropship</option>
                                    </select>
                                    </div>
                              </div>');
                                    }

                                    if($strKategori=="Marketplace"){
                                        echo('     <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                    <select id="kategori" name="kategori" class="form-select" aria-label="Default select example">
                                      <option value="Online">Online</option>
                                      <option value="Offline">Offline</option>
                                      <option value="Marketplace" selected>Marketplace</option>
                                      <option value="Dropship">Dropship</option>
                                    </select>
                                    </div>
                              </div>');
                                    }
                                ?>
                           

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success" name="edit"><i
                                                class="bi bi-person-plus-fill"> </i>Perbarui data </button>
                                    </div>
                                </div>


                                <div class="modal fade " id="verticalycentered" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfrmsai</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin data akan disimpan
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>



                    </form>
               
          </div>


        </div>


 <script>




              $(document).ready(function() {

                $('#myTable').DataTable( {
                         scrollX:        true,
        scrollCollapse: true,
        
        fixedColumns:   {
            
            right: 1
        }
                } );

                 $('#myTableOnline').DataTable( {
                        scrollX:        true,
        scrollCollapse: true,
        
        fixedColumns:   {
            
            right: 1
        }
                } );
                   
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
