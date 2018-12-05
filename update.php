<?php
	include 'conn_201751011.php';
	extract($_POST);
	$row = mysqli_query($conn,"update pmb_".nim." set periode_pmb='$periode_pmb', jumlah_pmb='$jumlah_pmb' where kode_pmb='$kode_pmb' ");
	if($row==1){
		header('location:index.php');
	}

?>