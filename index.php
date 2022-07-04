<?php
session_start();



if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
$web = "jualdecal";
include 'connection.php';

//routing default
if(!isset($_GET['m'])){
  header("Location: index.php?m=1&n=1");
}

date_default_timezone_set('Asia/Jakarta');
$tanggal= date("D, j M Y");
$monthly=date("M Y");

//penjualan hari ini
$topIdres=mysqli_query($conn,"SELECT COUNT(*) FROM transaksi WHERE Tanggal LIKE "."'%".$tanggal."%'");
$row=mysqli_fetch_row($topIdres);
$topIdStr = $row[0];


//Total Penjualan bulan ini
$countMonthly=mysqli_query($conn,"SELECT COUNT(*) FROM transaksi WHERE Tanggal LIKE "."'%".$monthly."%'");
$rowMonthly=mysqli_fetch_row($countMonthly);
$salesMonthly = $rowMonthly[0];

//Total Penjualan bulan ini
$countTotal=mysqli_query($conn,"SELECT COUNT(*) FROM transaksi");
$rowTotal=mysqli_fetch_row($countTotal);
$salesTotal = $rowTotal[0];

//Total cust
$custTotal=mysqli_query($conn,"SELECT COUNT(*) FROM customer");
$rowCust=mysqli_fetch_row($custTotal);
$custCount = $rowCust[0];

//Total yang belum ada resi
$resiTotal=mysqli_query($conn,"SELECT COUNT(*) FROM transaksi WHERE NO_Resi LIKE ''");
$rowResi=mysqli_fetch_row($resiTotal);
$resiCount = $rowResi[0];
?>


         <?php
                  //mengambil data untuk di passing ke html
                  $offlineTotal=mysqli_query($conn,"SELECT COUNT(*) FROM customer WHERE Golongan LIKE 'Offline'");
                  $rowOffline=mysqli_fetch_row($offlineTotal);
                  $salesOfflineTotal = $rowOffline[0];

                  $onlineTotal=mysqli_query($conn,"SELECT COUNT(*) FROM customer WHERE Golongan LIKE 'Online'");
                  $rowOnline=mysqli_fetch_row($onlineTotal);
                  $salesOnlineTotal = $rowOnline[0];

                  $DropTotal=mysqli_query($conn,"SELECT COUNT(*) FROM customer WHERE Golongan LIKE 'Dropship'");
                  $rowDrop=mysqli_fetch_row($DropTotal);
                  $salesDropTotal = $rowDrop[0];

                  $MPTotal=mysqli_query($conn,"SELECT COUNT(*) FROM customer WHERE Golongan LIKE 'Marketplace'");
                  $rowMP=mysqli_fetch_row($MPTotal);
                  $salesMPTotal = $rowMP[0];
              ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Polaris ADV</title>
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
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
<?php
include 'segment/sidebar.php'; ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard  <?php echo ($_SESSION['user_name'])?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">


             <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">



                <div class="card-body">
                  <h5 class="card-title">Reminder <span>| Input Resi</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo($resiCount." ekspedisi belum ada resi");?></h6>
                      <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Hai <?php echo ($_SESSION['usname']);?>, Silahkan input resi <a href="lihat_exp_page.php?m=2&n=2">disini</a></span>

                    </div>
                  </div>

                </div>
              </div>

            </div>


            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Online <span> | Jumlah customer</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo ($salesOnlineTotal." orang");?></h6>
                      <span class="text-success small pt-1 fw-bold"></span>  <span class="text-muted small pt-2 ps-1">dari total <?php echo($custCount);?> customer</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Offline <span> | jumlah customer</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo ($salesOfflineTotal." orang");?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">dari total <?php echo($custCount);?> customer</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Dropship <span>| Jenis customer</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart4"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo($salesDropTotal);?> Orang</h6>
                       <span class="text-muted small pt-2 ps-1">dari total <?php echo($custCount);?> customer </span><!-- <span class="text-success small pt-1 fw-bold"><?php  echo($salesTotal);?></span><span class="text-muted small pt-2 ps-1">Penjualan</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Marketplace <span>| Jenis customer</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-shop"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo($salesMPTotal);?> Orang</h6>
                       <span class="text-muted small pt-2 ps-1">dari total <?php echo($custCount);?> customer </span><!-- <span class="text-success small pt-1 fw-bold"><?php  echo($salesTotal);?></span><span class="text-muted small pt-2 ps-1">Penjualan</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Customers Card -->





            <!-- Reports -->
         <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Customer coverage</h5>

              <div id="donutChart" style="min-height: 400px;" class="echart"></div>
              <input type="text" id="online" value="<?php echo ($salesOnlineTotal)?>" hidden>
              <input type="text" id="offline" value="<?php echo ($salesOfflineTotal)?>" hidden>
              <input type="text" id="marketplace" value="<?php echo ($salesMPTotal)?>" hidden>
              <input type="text" id="dropship" value="<?php echo ($salesDropTotal)?>" hidden>

              <script>
                var online=document.getElementById("online").value;
                var offline=document.getElementById("offline").value;
                var marketplace=document.getElementById("marketplace").value;
                var dropship=document.getElementById("dropship").value;

                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#donutChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Total Customer',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: false,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: true
                      },
                      data: [{
                          value: offline,
                          name: 'Offline'
                        },
                        {
                          value: online,
                          name: 'Online'
                        },
                        {
                          value: dropship,
                          name: 'Dropshiper'
                        },
                        {
                          value: marketplace,
                          name: 'Marketplace'
                        }

                      ]
                    }]
                  });
                });
              </script>


            </div>
          </div>
        </div>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-printer-fill"></i> Print Activity <span>| Hari ini</span></h5>

              <div class="activity">

                <?php


                    $transData=mysqli_query($conn,"SELECT * FROM transaksi WHERE Tanggal LIKE "."'%".$tanggal."%' ORDER BY ID DESC");

                    foreach($transData as $dataTrans):

                      echo ('<div class="activity-item d-flex"><div class="activite-label">');
                      echo(substr($dataTrans["Tanggal"], -9));
                      echo('</div><i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                  <div class="activity-content">');

                       $dataNama=mysqli_query($conn,"SELECT * FROM customer WHERE ID =".$dataTrans["ID_Cus"]);
                      foreach($dataNama as $namaData):

                        echo('print label untuk customer <font style="font-weight:bold;">'.$namaData["Nama"]);
                        echo('</font></div></div>');
                      endforeach;
                    endforeach;

                ?>

                <!-- End activity item-->

               <!-- End activity item-->


              </div>

            </div>
          </div><!-- End Recent Activity -->


        </div><!-- End Right side columns -->

      </div>
    </section>


  </main><!-- End #main -->

<?php
include 'segment/footer.php';
}else{
     header("Location: login.php");
     exit();
}
 ?>
