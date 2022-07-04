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

  <title>Laporkan Masalah | Polaris ADV</title>
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

</head>

<!-- =======================================================
  * Desain mengkombinasi dari bootstrap
  * System dikembangkan oleh tema anemos
  * License: https://anemos.id/license/
  ======================================================== -->

<body>
  <?php include 'segment/sidebar.php';

  ?>
    <main id="main" class="main">
       
  <div class="pagetitle">
       <h1> <span class="ri-questionnaire-line"></span>  LAPORKAN MASALAH</h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
           <li class="breadcrumb-item">Halamn</li>
           <li class="breadcrumb-item active">Laporkan Masalah</li>
         </ol>
       </nav>

       <div class="col-xl-12">
            <div class="card">
              <div class="card-body pt-3">
                <div class="tab-content pt-2">

                  <h5 class="card-title text-center">
                  <br><br>Jika Anda Memiliki Kendala Dalam Mengoprasikan Sistem Ini Hubungi Kontak Dibawa Ini<br></h5>
                  
                    <div class="text-center">
                      <button class="btn btn-outline-primary" onclick="kirim1()"><i class="ri-phone-line"></i> Mufid</button> 
                      <button class="btn btn-outline-primary" onclick="kirim2()"><i class="ri-phone-line"></i> Lukim</button> 
                    </div><br></h5>

                </div>
              </div>
            </div>
          </div>

     </div><!-- End Page Title -->
    </main>

    <script >
      function kirim1() {
        window.open("https://api.whatsapp.com/send/?phone=+6287846867493&text=Halo%20Kak%20Mufid,%20saya%20mau%20bertanya%20tentang%20sistem%20label%20PolarisADV..!");
      }
      function kirim2() {
        window.open("https://api.whatsapp.com/send/?phone=+6281233422006&text=Halo%20Kak%20Lukim,%20saya%20mau%20bertanya%20tentang%20sistem%20label%20PolarisADV..!");
      }
    </script>

<?php
include 'segment/footer.php';
}else{
     header("Location: login.php");
     exit();
}
 ?>
