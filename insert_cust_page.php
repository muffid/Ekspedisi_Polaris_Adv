<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
  include 'connection.php';


$web = "jualdecal";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Input Customer | Polaris ADV</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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


    <?php include 'segment/sidebar.php';?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> <span class="bi bi-person-plus-fill"></span> Customer Baru</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item">Manage Customer</li>
                    <li class="breadcrumb-item active">Input Customer</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Isi Data Customer</h5>

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

                            <!-- General Form Elements -->
                            <form onsubmit="return checkChar()" method="POST" action="insert_cust.php">
                                

                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-2 col-form-label"><i class="ri-file-user-line"></i> Nama Lengkap: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namalengkap" name="namalengkap"
                                            required urlencode>
                                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputAlamat" class="col-sm-2 col-form-label"><i class="ri-map-pin-line"></i> Alamat : </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="height: 100px" id="alamat" name="alamat"
                                            required></textarea>
                                    </div>
                                </div>

                                <!----- Provinsi--->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"><i class="ri-map-pin-line"></i> Provinsi</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" id="form_prov"
                                            name="form_prov" required>
                                            <option value=""> Pilih Provinsi</option>
                                            <?php 
                                                $daerah = mysqli_query($conn,"SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");
                                                while($d = mysqli_fetch_array($daerah)){
                                            ?>
                                            <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                                            <?php    } ?>
                                        </select>
                                    </div>
                                </div>

                                <!----- Kabupaten--->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"><i class="ri-map-pin-line"></i> Kabupaten</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" id="form_kab"
                                            name="form_kab" required>

                                        </select>
                                    </div>
                                </div>

                                <!----- Kecamatan--->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"><i class="ri-map-pin-line"></i> Kecamatan</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" id="form_kec"
                                            name="form_kec" required>

                                        </select>
                                    </div>
                                </div>

                                <!----- Desa--->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"><i class="ri-map-pin-line"></i> Desa</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" id="form_des"
                                            name="form_des" required>

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputKode" class="col-sm-2 col-form-label"><i class="ri-mail-send-line"></i> Kode Pos : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kodepos" name="kodepos" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputHp" class="col-sm-2 col-form-label"><i class="ri-phone-line"></i> No Hp : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nohp" name="nohp" required>
                                    </div>
                                </div>

                                  <div class="row mb-3">
                                    <label for="inputHp" class="col-sm-2 col-form-label"><i class="ri-phone-line"></i> No Hp 2 : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nohp2" name="nohp2">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label"><i class="ri-mail-line"></i> Email : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"><i class="ri-menu-2-line"></i> Kategori</label>
                                    <div class="col-sm-10">
                                    <select id="kategori" name="kategori" class="form-select" aria-label="Default select example">
                                      <option value="Online">Online</option>
                                      <option value="Offline">Offline</option>
                                      <option value="Marketplace">Marketplace</option>
                                      <option value="Dropship">Dropship</option>
                                    </select>
                              </div>
                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success" name="tambah"><i
                                                class="bi bi-person-plus-fill"> </i>Tambah data </button>
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



                    </form><!-- End General Form Elements -->

                </div>
            </div>

            </div>



            </form><!-- End General Form Elements -->

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