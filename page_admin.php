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
    if(isset($_SESSION["kebesaran"])){
?>

  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $_SESSION["kebesaran"]; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
  </div>

<?php
  unset($_SESSION["kebesaran"]);
}

?>

<?php
  @session_start();
    if(isset($_SESSION["sukses"])){
?>

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $_SESSION["sukses"]; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
  </div>

<?php
  unset($_SESSION["sukses"]);
}

?>


<section class="section profile">
  <div class="row">
    <div class="col-xl-4">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="assets/img/<?php echo ($_SESSION["gmr"]); ?>" alt="Profile" class="rounded-circle">
            <h2><?php echo ($_SESSION['user_name']);?></h2>
          <h3><?php echo ($_SESSION['name']);?></h3>
              
        </div>
      </div>
    </div>

    <div class="col-xl-8">
      <div class="card">
        <div class="card-body pt-3">
          <div class="tab-content pt-2">

              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tambah_admin">Tambah Sub Admin</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#data_admin">Data Admin</button>
                </li>

              </ul>

            <!-- Tambah Sub Admin -->
            <div class="tab-pane fade show active tambah_admin" id="tambah_admin">
              <form onsubmit="return checkChar()" method="POST" action="insert_user.php"  enctype="multipart/form-data">
                  <h5 class="card-title">Tambah</h5>
                    

                    <div class="row mb-3">
                      <label  class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Nama" type="text" class="form-control" id="namalengkap" required>
                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Status</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Jabatan" type="text" class="form-control" id="Job"  value="Sub Admin" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="User" type="text" class="form-control" id="Username" autocomplete="off" required  >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label  class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Password" type="password" class="form-control" id="Pass" required >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label  class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Gambar" type="file" class="form-control" id="gambar" >
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
              </form><!-- End Profile Edit Form -->

               
            </div>
            <!-- End Tambah Admin -->

            <div class="tab-pane fade show data_admin" id="data_admin">
            <br>
              <table id="table" class="table table-striped">
                 <thead>
                   <tr>
                     <th scope="col">No</th>
                     <th scope="col">Nama</th>
                     <th scope="col">Jabatan</th>
                     <th scope="col">Username</th>
                     <th scope="col">Profil </th>
                 
                     <th scope="col">Aksi</th>
                  </tr>
                 </thead>
                 <tbody>
                   <?php



                      $no=1;
                      $data=mysqli_query($conn,"SELECT * FROM admin ");?>
                      <?php foreach ($data as $all): ?>
                          <tr>
                            <td valign="middle"><?php echo $no++; ?></td>                            
                            <td valign="middle"><?php echo $all['Nama']; ?></td>
                            <td valign="middle"><?php echo $all['Jabatan']; ?></td>
                            <td valign="middle"><?php echo $all['User']; ?></td>
                            <td valign="middle"><img src="assets/img/<?php echo $all['Gambar']; ?> " alt="Profile" class="rounded-circle" width="50" height="50"></td>                    
                            
                            <td valign="middle">
                              
                              <button  type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=  $all["ID"]?>"><i class="ri-edit-2-line"></i> Edit</button>

                                <a href="hapus_admin.php?m=3&n=2&ID=<?php echo($all['ID']);?>"  class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapus <?php echo($all['Nama']);?> Sebagai <?php echo($all['Jabatan']);?>  ')">
                                <i class="ri-delete-bin-6-line"></i> Hapus</a>

                            </td>
                          </tr>

                          <!-- Modal -->

                          <div class="modal fade" id="verticalycentered<?=  $all["ID"]; ?>" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Edit Admin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <?php $idku = $all["ID"];?>
                                  <?php $nama = $all['Nama']; ?>
                                  <?php $user = $all['User']; ?> 
                                  <?php $pass = $all['Password'] ?>
                                 
                                <!-- Vertical Form -->
                                  <form method="POST" action="edit_cust.php" class="row g-3">
                                    <div class="col-12">
                                      <label for="id" class="form-label">ID Admin:</label>
                                        <input type="text" class="form-control" id="idadmin" name="idadmin" value="<?php echo $idku;?>"readonly ><br>
                                      <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= "$nama"; ?>"><br>
                                      <label for="user" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="user" name="user" value="<?= "$user"; ?>"><br>
                                      <label for="pass" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="pass" name="pass" value="<?= "$pass"; ?>">
                                      </div>                


                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" name="simpan" data-bs-dismiss="modal">Simpan</button>
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          <?php
                      endforeach;
                      ?>

                 </tbody>
               </table>
            </div>  



          </div>
        </div>
      </div>
    </div>
  </div>
</section>



