<?php echo ('
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.php?m=1&n=1" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">PolarisADV</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>
<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li>


    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">');?><img alt="Profile" width="30" height="30" class="rounded-circle" src="assets/img/<?php echo ($_SESSION['gmr']);?>"><span class="d-none d-md-block dropdown-toggle ps-2">


        <?php echo ("Hai, ".$_SESSION['usname']);?>
        <?php echo ('
        </span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>');?> <?php echo ($_SESSION['user_name']);?><?php echo ('</h6>
          <span>');?> <?php echo ($_SESSION['name']);?><?php echo ('</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>


        <li>
          <a class="dropdown-item d-flex align-items-center" href="signout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav>
</header>');?>
