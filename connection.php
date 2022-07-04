<!-- =======================================================
  * Desain mengkombinasi dari bootstrap
  * System dikembangkan oleh tema anemos
  * License: https://anemos.id/license/
  ======================================================== -->

<?php

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "jual_decal";

// $conn = mysqli_connect($sname, $unmae, $password, $db_name);

// $sname= "srv27";
// $unmae= "u2968544_jual_decal";
// $password = "db54321jualDecal";

// $db_name = "u2968544_jual_decal";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
function hapus($ID){
	global	$conn;
	mysqli_query($conn, "DELETE FROM admin WHERE ID=$ID");

	return mysqli_affected_rows($conn);
}