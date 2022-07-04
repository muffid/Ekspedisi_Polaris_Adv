<?php
require __DIR__.'/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf('L','A6','en', true, 'UTF-8', array(2, 2, 2, 2), false);
	$html2pdf->pdf->SetDisplayMode('fullpage');
session_start();
include 'connection.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


$content = '

        <style type="text/css">
        
    </style>
    <page backtop="5mm" backbottom="5mm" backleft="5mm" backright="5mm">
    <table>
        <tr>
            <td colspan="3"><img src="assets/img/HEADERIMG.png" height="80" width="500"></td>
        </tr>

    </table>
    <table style="width:100%">
        <tr>
            <th style="width: 20%"></th><th style="width:50%"></th><th style="width: 30%"></th>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>

        <tr>
            <td colspan="3">PENERIMA</td>
        </tr>

         <tr>
            <td colspan="3"></td>
        </tr>

        <tr>
            <td>Nama</td>
            <td colspan="2">: '.$nama.'</td>
        </tr>

        <tr>
            <td>No Hp</td>
            <td colspan="2">: '.$phone.'</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td colspan="2">: '.$alamat1.'</td>
        </tr>

        <tr>
            <td></td>
            <td colspan="2">     : '.$alamat2.'</td>
        </tr>

         <tr>
            <td>Desa/Kelurahan</td>
            <td colspan="2">: '.$desa.'</td>
        </tr>

        <tr>
            <td>Kecamatan</td>
            <td colspan="2">: '.$kecamatan.'</td>
        </tr>

        <tr>
            <td>Kota/Kab</td>
            <td>: '.$kabupaten.'</td>
            <td>Kode</td>
        </tr>

         <tr>
            <td>Provinsi</td>
            <td>: '.$provinsi.'</td>
            <td bgcolor="yellow" style=" text-align: center;
        vertical-align: middle;">'.$code.'</td>
        </tr>

         <tr>
            <td>Kode Pos</td>
            <td>: '.$kode_pos.'</td>
            <td>Ekspedisi : '.$_GET['exp'].'</td>
        </tr>
         <tr>
            <td colspan="3"></td>
        </tr>


    </table>
     <table>
        <tr>
            <td colspan="3"><img src="assets/img/FOOTERIMG.png" width="500"></td>
        </tr>

    </table>
    </page>

	';


 ob_end_clean();
	$html2pdf->writeHTML($content);
	$html2pdf->output();

	}else{
     header("Location: login.php");
     exit();
}

?>
