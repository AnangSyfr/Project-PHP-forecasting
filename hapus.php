<?php
	include 'conn_201751011.php';
	$id = $_GET['id'];
	$row = mysqli_query($conn,"delete from pmb_".nim." where kode_pmb=".$id);
	if($row==1){
		header('location:index.php');
	}
?>