<?php 
session_start(); 
include "connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admin WHERE User LIKE '$uname' AND Password LIKE '$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['User'] === $uname && $row['Password'] === $pass) {
            	//$_SESSION['user'] = $row['User'];
            	$_SESSION['user_name'] = $row['Nama'];
            	$_SESSION['name'] = $row['Jabatan'];
            	$_SESSION['id'] = $row['ID'];
            	$_SESSION['usname'] = $row['User'];
            	$_SESSION['gmr'] = $row['Gambar'];
            	header("Location: index.php?m=1&n=1");
		        exit();
            }else{
				header("Location: login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}