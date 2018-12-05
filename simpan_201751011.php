<?php
	include 'conn_201751011.php';
	extract($_POST);
	if(isset($_POST['simpan'])){
		mysqli_query($conn,"insert into pmb_".nim." values('','$periode','$jumlah')");
		header('location:index.php');
	}
	