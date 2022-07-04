<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Adminstrator | Polaris ADV</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Desain mengkombinasi dari bootstrap
  * System dikembangkan oleh tema anemos
  * License: https://anemos.id/license/
  ======================================================== -->
</head>

<body>
  <?php include 'segment/sidebar.php';

  ?>
    <main id="main" class="main">
      
    <div class="pagetitle">
      <h1>Administrator</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboar</a></li>
          <li class="breadcrumb-item">Halaman</li>
          <li class="breadcrumb-item active">Administrator</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


<?php  
if ($_SESSION['id'] == 1) {
   include 'page_admin.php';

}else{
  echo '  <div class="col-xl-12">
            <div class="card">
              <div class="card-body pt-3">
                <div class="tab-content pt-2">

                  <h5 class="card-title text-center"><br><br>
                  <img src="assets/img/banned.png" width="200"><br><br><br>Halaman Ini Khusus Untuk Administrator<br><br><br><br><br></h5>
                </div>
              </div>
            </div>
          </div>';
        }
?> 

   
    </main>

<?php
include 'segment/footer.php';
}else{
     header("Location: login.php");
     exit();
}
 ?>
