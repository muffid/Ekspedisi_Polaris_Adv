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

  <title>Profil | Polaris ADV</title>
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item">Halaman</li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php
      @session_start();
       if(isset($_SESSION["ok"])){
    ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION["ok"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
      </div>

    <?php
      unset($_SESSION["ok"]);
      }

    ?>

    <?php
      @session_start();
       if(isset($_SESSION["passTidakSama"])){
    ?>

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_SESSION["passTidakSama"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
      </div>

    <?php
      unset($_SESSION["passTidakSama"]);
      }

    ?>

    <?php
      @session_start();
       if(isset($_SESSION["passSalah"])){
    ?>

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_SESSION["passSalah"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
      </div>

    <?php
      unset($_SESSION["passSalah"]);
      }

    ?>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img width="100" height="100" src="assets/img/<?php echo ($_SESSION['gmr']);?>" alt="Profile" class="rounded-circle" >
              <h2><?php echo ($_SESSION['user_name']);?></h2>
              <h3><?php echo ($_SESSION['name']);?></h3>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ganti Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">


                <script > 
                  //matikan tombol
                  window.onload=disbld;
                  function disbld(){
                    document.getElementById("rubahGambar").disabled=true;
                  }

                   function enbld(){
                    document.getElementById("rubahGambar").disabled=false;
                  }
                  //untuk menampilkan gambar sebelum di upload
                  function PreviewImage(){
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("Gambar").files[0]);
                    oFReader.onload = function (oFREvent)
                    {
                      document.getElementById("uploadPreview").src = oFREvent.target.result;
                       document.getElementById("rubahGambar").disabled=false;
                    };
                  };

                  //hapus gambar
                  function hapus(){
                     document.getElementById("tmptgmbr").innerHTML =' <img class="rounded-circle" id="uploadPreview" style="width: 200px; height: 100px;">';
                     document.getElementById("tmptSRC").innerHTML ='<br><input id="Gambar" type="file" name="Gambar" class="form-control " onchange="PreviewImage();">';
                      document.getElementById("rubahGambar").disabled=true;


                  }

                </script>



                  <!-- Profile Edit Form -->
                  <form  method="POST" action="insert_user.php" enctype="multipart/form-data"> 
                    <input type="hidden" name="gambarLama" value="<?= $_SESSION['gmr']; ?>">
                    <input type="hidden" name="idadmin" value="<?= $_SESSION['id']; ?>">
                    <div class="row mb-6">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>

                      <div class="col-md-6 col-lg-6">
                        <div class="row " id="tmptgmbr">
                          <img class="rounded-circle" id="uploadPreview" style="width: 200px; height: 100px;">
                        </div>
                        <div class="row" >
                          <div class="col col-md-10" id="tmptSRC">
                          <br><input id="Gambar" type="file" name="Gambar" class="form-control " onchange="PreviewImage();">
                        </div>

                          <div class="col col-md-2">
                       <br><button type="button" class="btn btn-danger" onclick="hapus()">Hapus</button><br><br>
                      </div>

                      </div>

                    </div>
                  </div>
                    <div class="row mb-6">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>

                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id=" fullName" value="<?php echo ($_SESSION['user_name']);?>" onkeypress="enbld()">
                        <br>
                         <button id="rubahGambar" type="submit" name="rubahGambar" class="btn btn-primary">Simpan Perubahan</button>
                      </div>

                    </div>

                   
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" action="update_pass.php">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="simpanPass" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

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
