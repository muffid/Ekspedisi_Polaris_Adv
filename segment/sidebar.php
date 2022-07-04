<?php
  include 'segment/session_header.php';

?>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a <?php if ($_GET['m']==1) {
        echo 'class="nav-item nav-link active"';
      }else{
        echo 'class="nav-link nav-item  collapsed" ';
      } ?> href="index.php?m=1&n=1">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item ">
            <a class="nav-link nav-item collapsed " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-fill"></i><span>Manage Customer</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <?php if($_GET['m']==3){
        echo('
      <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">');}
        else{
          echo('
      <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">');
        }?>
        <li>
            <a <?php if ($_GET['m']==3 && $_GET['n']==1) {
             echo ' class="collapse show active"   ' ;
          } else{
            echo 'class="nav-link nav-item collapsed"  ';
          } ?> href="insert_cust_page.php?m=3&n=1">
                <i class="bi bi-circle"></i><span>Input Customer</span>
            </a>
        </li>

        <li>
            <a <?php if ($_GET['m']==3 && $_GET['n']==2) {
            echo 'class="collapse show active" ';
          } else {
            echo 'class="nav-link nav-item collapsed" ';
          }?> href="lihat_cust_page.php?m=3&n=2&sort=All">
                <i class="bi bi-circle"></i><span>Lihat Customer</span>
            </a>
        </li>

    </ul>
    </li>
    <!-- End Tables Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-truck"></i><span>Manage Ekspedisi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <?php if($_GET['m']==2){ echo('
      <ul id="charts-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">');}
      else{
        echo('
      <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">');
      }?>
    <li>
        <a <?php if ($_GET['n']==1 && $_GET['m']==2) {
              echo 'class="collapse show active" ';
              echo 'class="nav-link nav-item collapsed" ';
          } else{
              echo 'class="nav-link nav-item collapsed" ';
          } ?> href="input_exp_page.php?m=2&n=1">
            <i class="bi bi-circle"></i><span>Input Ekspedisi </span>
        </a>
    </li>
    <li>
        <a <?php if ($_GET['n']==2 && $_GET['m']==2) {
              echo 'class="collapse show active" ';
          } else {
              echo 'class="nav-link nav-item collapsed" ';
          } ?> href="lihat_exp_page.php?m=2&n=2">
            <i class="bi bi-circle"></i><span>Lihat Ekspedisi</span>
        </a>
    </li>

    </ul>
    </li><!-- End Charts Nav -->





    <li class="nav-heading">Halaman</li>
    <li class="nav-item">
        <a <?php if ($_GET['m']==7) {
        echo 'class="nav-item nav-link active"';
      }else{
        echo 'class="nav-link nav-item  collapsed" ';
      } ?> href="admin_page.php?m=7&n=1">
            <i class="bi bi-file-lock-fill"></i>
            <span>Administrator</span>
        </a>
    </li>

    <li class="nav-item">
        <a <?php if ($_GET['m']==8) {
        echo 'class="nav-item nav-link active"';
      }else{
        echo 'class="nav-link nav-item  collapsed" ';
      } ?> href="profil_page.php?m=8&n=1">
            <i class="bi bi-person"></i>
            <span>Akun</span>
        </a>
    </li>

    <li class="nav-item">
        <a <?php if ($_GET['m']==9) {
        echo 'class="nav-item nav-link active"';
      }else{
        echo 'class="nav-link nav-item  collapsed" ';
      } ?> href="laporan_page.php?m=9&n=1">
            <i class="ri-questionnaire-line"></i>
            <span>Laporkan Masalah</span>
        </a>
    </li>
    <!-- End Blank Page Nav -->

    </ul>
</aside>
<!-- End Sidebar-->