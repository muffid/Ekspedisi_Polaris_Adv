<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
$web = "jualdecal";
$topIdres=mysqli_query($conn,"SELECT COUNT(*) FROM customer");
$row=mysqli_fetch_row($topIdres);
$topIdStr = $row[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Data Customer | Polaris ADV</title>
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

  </style>

</head>
<!-- =======================================================
  * Desain mengkombinasi dari bootstrap
  * System dikembangkan oleh tema anemos
  * License: https://anemos.id/license/
  ======================================================== -->
<body>

<script type="text/javascript">
    $(document).ready(function() {

        // sembunyikan form kabupaten, kecamatan dan desa
        $("#form_kab").hide();
        $("#form_kec").hide();
        $("#form_des").hide();

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "get_daerah.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab").html(hasil);
                    $("#form_kab").show();
                    $("#form_kec").hide();
                    $("#form_des").hide();
                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "get_daerah.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec").html(hasil);
                    $("#form_kec").show();
                    $("#form_des").hide();
                }
            });
        });

        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "get_daerah.php",
                data: data,
                success: function(hasil) {
                    $("#form_des").html(hasil);
                    $("#form_des").show();
                }
            });
        });


    });
    </script>



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
       <h1> <span class="bi bi-people-fill"></span>  Data Customer</h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
           <li class="breadcrumb-item">Manage Customer</li>
           <li class="breadcrumb-item active">Data Customer</li>
         </ol>
       </nav>
     </div><!-- End Page Title -->

     <section class="section">
       <div class="row">
         <div class="col-lg-12">

           <div class="card">
             <div class="card-body">

               <h5 class="card-title">Lihat customer</h5>
               <div class="row">
  <div class="col-3"><div class="col-12">
                                    <select id="sorter" name="sorter" class="form-select" aria-label="Default select example">
                                        <?php if($_GET['sort']=='All'){
                                            echo('
                                             <option value="All" selected>All</option>
                                      <option value="Online">Online</option>
                                      <option value="Offline">Offline</option>
                                      <option value="Marketplace">Marketplace</option>
                                      <option value="Dropship">Dropship</option>
                                            ');
                                        }
                                        if($_GET['sort']=='Online'){
                                            echo('
                                             <option value="All">All</option>
                                      <option value="Online" selected>Online</option>
                                      <option value="Offline">Offline</option>
                                      <option value="Marketplace">Marketplace</option>
                                      <option value="Dropship">Dropship</option>
                                            ');
                                        }
                                           if($_GET['sort']=='Offline'){
                                            echo('
                                             <option value="All">All</option>
                                      <option value="Online">Online</option>
                                      <option value="Offline" selected>Offline</option>
                                      <option value="Marketplace">Marketplace</option>
                                      <option value="Dropship">Dropship</option>
                                            ');
                                        }   if($_GET['sort']=='Marketplace'){
                                            echo('
                                             <option value="All">All</option>
                                      <option value="Online">Online</option>
                                      <option value="Offline">Offline</option>
                                      <option value="Marketplace" selected>Marketplace</option>
                                      <option value="Dropship">Dropship</option>
                                            ');
                                        }
                                        if($_GET['sort']=='Dropship'){
                                           echo('
                                            <option value="All">All</option>
                                     <option value="Online">Online</option>
                                     <option value="Offline">Offline</option>
                                     <option value="Marketplace">Marketplace</option>
                                     <option value="Dropship" selected>Dropship</option>
                                           ');
                                       }?>

                                    </select>
                              </div><br></div>
  <div class="col-3"><img src="assets/img/reload.png" onclick="image(this)"></div>
</div>


                  <!-- Table with stripped rows -->
               <table id="myTable" class="hover stripe">
                 <thead>
                   <tr>
                     <th scope="col">No</th>

                     <th scope="col">Nama</th>
                     <th scope="col">No HP</th>
                     <th scope="col">Kategori</th>
                     <th scope="col">Alamat</th>
                     <th scope="col">Desa</th>
                     <th scope="col">Kecamatan</th>
                     <th scope="col">Kabupaten</th>
                     <th scope="col">Provinsi</th>
                     <th scope="col">Kode Pos</th>
                     <th scope="col">Email</th>
                     <th scope="col">Aksi</th>

                   </tr>
                 </thead>
                 <tbody>
                   <?php
                      $no=1;
                      if ($_GET['sort']=="All"){
                        $data=mysqli_query($conn,"SELECT * FROM customer ORDER BY ID DESC");
                      }
                       if ($_GET['sort']=="Offline"){
                        $data=mysqli_query($conn,"SELECT * FROM customer WHERE Golongan LIKE 'Offline'  ORDER BY ID DESC");
                      }
                       if ($_GET['sort']=="Online"){
                        $data=mysqli_query($conn,"SELECT * FROM customer WHERE Golongan LIKE 'Online'  ORDER BY ID DESC");
                      }
                       if ($_GET['sort']=="Marketplace"){
                        $data=mysqli_query($conn,"SELECT * FROM customer WHERE Golongan LIKE 'Marketplace'  ORDER BY ID DESC");
                      }
                       if ($_GET['sort']=="Dropship"){
                        $data=mysqli_query($conn,"SELECT * FROM customer WHERE Golongan LIKE 'Dropship'  ORDER BY ID DESC");
                      }

                      while($d = mysqli_fetch_array($data)){
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>

                            <td><?php echo $d['Nama']; ?></td>
                            <td><?php echo $d['No_Hp']; ?></td>
                            <td><?php echo $d['Golongan']; ?></td>
                            <td><?php echo $d['Alamat']; ?></td>
                            <td><?php echo $d['Desa']; ?></td>
                            <td><?php echo $d['Kecamatan']; ?></td>
                            <td><?php echo $d['Kab']; ?></td>
                            <td><?php echo $d['Provinsi']; ?></td>
                            <td><?php echo $d['Kode_Pos']; ?></td>
                            <td><?php echo $d['Email']; ?></td>

                            <td>
                               <a href="edit_cust_page.php?m=3&n=2&ID=<?php echo($d['ID']); ?>"  class="btn btn-success">
                                <i class="bi bi-person-lines-fill"></i> edit</a>
                            </td>
                          </tr>
                          <?php
                      }
                      ?>

                 </tbody>
               </table>

             </div>
           </div>

         </div>
       </div>
     </section>

  </main>

<script>

    function image(img){
        var src = img.src;
        var e = document.getElementById("sorter");
        var strSort = e.options[e.selectedIndex].text;
        location.replace('lihat_cust_page.php?m=3&n=2&sort='+strSort);
    }

              $(document).ready(function() {
    $('#myTable').DataTable( {

         "pageLength": 15,
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

<?php
include 'segment/footer.php';
}else{
     header("Location: login.php");
     exit();
}
 ?>
