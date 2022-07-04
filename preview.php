<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
  $nama=$_GET['id_des'];
  $data=mysqli_query($conn,"SELECT * FROM customer WHERE ID=$nama");
  $last=mysqli_query($conn,"SELECT Expedisi FROM transaksi WHERE ID_Cus=$nama");
  $strLastExp="customer ini belum pernah order sebelumnya";

 if(count(array($last))>0){
  foreach($last as $lastExp):
    $strLastExp="Expedisi terakhir customer ini : ".$lastExp["Expedisi"];
  endforeach;
 }else{

 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cetak Label Ekspedisi | Polaris ADV</title>
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
    .lblExp{
      padding: 3px;
    }
    /* HIDE RADIO */
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
       <h1> <span class="ri-printer-fill"></span> CETAK LABEL EKSPEDISI</h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="index.php?01">Dashboard</a></li>
           <li class="breadcrumb-item">Manage Ekspedisi</li>
           <li class="breadcrumb-item"><a href="input_exp_page.php?m=2&n=1"></a>Input Ekspedisi</li>
           <li class="breadcrumb-item active">Cetak Label Ekspedisi</li>
         </ol>
       </nav>
     </div><!-- End Page Title -->

     <div class="col-lg-12">

        <div class="row">

                <div class="col-sm-6">
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
    <?php foreach ($data as $newData) :
      // code...
    ?>
    <tr>
      <th scope="row">Nama</th>
      <?php echo('<td title="'.$strLastExp.'">');?>: <?php echo ($newData['Nama']);?> </td>

    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td>: <?php echo ($newData['Alamat']);?> </td>

    </tr>
    <tr>
      <th scope="row">Provinsi</th>
      <td>: <?php echo ($newData['Provinsi']);?> </td>

    </tr>
    <tr>
      <th scope="row">Kabupaten</th>
      <td>: <?php echo ($newData['Kab']);?> </td>

    </tr>
    <tr>
      <th scope="row">Kecamatan</th>
      <td>: <?php echo ($newData['Kecamatan']);?> </td>

    </tr>
  </tbody>
</table>
                    </div>
                  </div>
                </div>

                  <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                     <!-- j -->
                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Description</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Desa</th>
      <td>: <?php echo ($newData['Desa']);?> </td>

    </tr>
    <tr>
      <th scope="row">Kode Pos</th>
      <td>: <?php echo ($newData['Kode_Pos']);?> </td>

    </tr>
    <tr>
      <th scope="row">No Hp</th>
      <td>: <?php echo ($newData['No_Hp']);?> </td>

    </tr>
    <tr>
      <th scope="row">Email</th>
      <td>: <?php echo ($newData['Email']);?> </td>

    </tr>
    <tr>
      <th scope="row">Kategori</th>
      <td>: Pelanggan <?php echo ($newData['Golongan']);?> </td>

    </tr>
  </tbody>
</table>
                    </div>
                  </div>
                </div>



              </div>





<div class="card">
  <div class="card-body">
  <h5 class="card-title">Pilih Expedisi</h5>
    <div class="row mb-3">
        <div class="col-sm-12">

          <label class="lblExp">

            <input type="radio" name="test" value="small" onclick="setExp('JNE Express')">
            <img src="assets/img/jne.png" width="120">
          </label>
           &nbsp;&nbsp;
          <label class="lblExp">
            <input type="radio" name="test" value="big" onclick="setExp('J&T Express')">
            <img src="assets/img/jnt_exp.png" width="120">
          </label>
          &nbsp;&nbsp;
            <label class="lblExp">
            <input type="radio" name="test" value="small" onclick="setExp('J&T DFOD')">
            <img src="assets/img/jnt_dfod.png" width="120">
          </label>
           &nbsp;&nbsp;
          <label class="lblExp">
            <input type="radio" name="test" value="big" onclick="setExp('J&T COD')">
            <img src="assets/img/jnt_cod.png" width="120">
          </label>
          &nbsp;&nbsp;
            <label class="lblExp">
            <input type="radio" name="test" value="small" onclick="setExp('Ninja Express')">
            <img src="assets/img/ninja.png" width="120">
          </label>
           &nbsp;&nbsp;
           <label class="lblExp">
            <input type="radio" name="test" value="small" onclick="setExp('Sicepat')">
            <img src="assets/img/sicepat.png" width="120">
          </label>
           &nbsp;&nbsp;
           <label class="lblExp">
            <input type="radio" name="test" value="small" onclick="setExp('Tiki')">
            <img src="assets/img/tiki.png" width="120">
          </label>
           &nbsp;&nbsp;
           <label class="lblExp">
            <input type="radio" name="test" value="small" onclick="setExp('Pos')">
            <img src="assets/img/pos.png" width="120">
          </label>
           &nbsp;&nbsp;
           <label class="lblExp">
            <input type="radio" name="test" value="small" onclick="setExp('Anter Aja')">
            <img src="assets/img/anteraja.png" width="120">
          </label>
           &nbsp;&nbsp;
           <label class="lblExp">
            <input type="radio" name="test" value="small" onclick="setExp('Lion Parcel')">
            <img src="assets/img/lion.png" width="120">
          </label>
          &nbsp;&nbsp;
          <label class="lblExp">
            <input type="radio" name="test" value="small" onclick="setExp('KAI')">
            <img src="assets/img/kai.png" width="120">
          </label>
          &nbsp;&nbsp;
          <label class="lblExp">
            <input type="radio" name="test" value="small" onclick="setExp('SAP')">
            <img src="assets/img/sap.png" width="120">
          </label>
          &nbsp;&nbsp;
</div>
<br>

        </div>
    </div>
  </div>
</div>



<div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>


       <div class="row mb-3">
        <div class="col-sm-6">
                                    <label class="col-sm-6 col-form-label"><i class="ri-truck-line"></i> Ekspedisi yang dipilih : </label>

                                    <div class="col-sm-10">
                                        <label class="col-sm-6 col-form-label" id="lbl">-- </label>

                                    </div>
                                </div>


                                  <div class="col-sm-6">
                                    <label for="inputEmail" class="col-sm-6 col-form-label"><i class="ri-barcode-line"></i> Kode Ekspedisi (Optional) : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="code" name="code">
                                    </div>
                                </div>
                                </div>
  <button class="btn btn-primary" onclick="myFunction()" value="<?php echo $nama;?>" id="btnCetak"><i class="bi bi-check-circle"></i> Konfirmasi</button>
  <button class="btn btn-primary" onclick="myFunction()" value="<?php echo $_GET['jenis'];?>" id="btnJenis" hidden><i class="bi bi-check-circle"></i> Konfirmasi</button>
  <?php endforeach; ?>
</div>
</div>

  </main>

<script>

  function myFunction() {
  let text;
  if (confirm("Dengan menekan OK berarti transaksi ini adalah valid dan akan tersimpan di sistem, Lanjutkan?") == true) {
    bukaWindow();
  } else {
    //bukaWindow();
  }

}

function setExp(Exp){
var code = document.getElementById("code").value;
document.getElementById("lbl").innerHTML = Exp;

}

  function bukaWindow() {
  var idcus=document.getElementById("btnCetak").value;
  var codeOpt =document.getElementById("code").value;
  var exped = document.getElementById("lbl").textContent;
  window.open("simpanTransaksi.php?k="+idcus+"&exp="+encodeURIComponent(exped)+"&code="+codeOpt+"&drop=0");
}
</script>

<?php
include 'segment/footer.php';
}else{
     header("Location: login.php");
     exit();
}
 ?>
