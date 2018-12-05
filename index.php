<?php include 'conn_201751011.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Aplikasi Forecasting</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<style type="text/css">
		.footer {
			padding:10px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<a href="" class="navbar-brand"><i class="fa fa-student"></i> Aplikasi Forecasting</a>
	</nav>
	<div class="container">
		<h3>Data Penerimaan Mahasiswa Baru</h3>
		<br>
		<button class="btn btn-success" onclick="showForm()"><i class="fa fa-plus"></i> Tambah Data</button>
		<div style="clear:both"></div>
		<br>
		<table class="table table-stripped table-hovered">
			<tr>
				<td>No</td>
				<td>Periode</td>
				<td>Jumlah</td>
				<td>X</td>
				<td>Y</td>
				<td>XX</td>
				<td>XY</td>
				<td>Action</td>
			</tr>
			<?php
				$no = 0;
				$x = -1;
				$total_x = 0;
				$total_y = 0;
				$total_xx = 0;
				$total_xy = 0;
				$query = mysqli_query($conn,"select * from pmb_201751011");
				while($dt = mysqli_fetch_object($query)){
					$no++;
					$y = $dt->jumlah_pmb;
					$x++;
					$xx = $x * $x;
					$xy = $x * $y;
					$total_x = $total_x + $x;
					$total_y = $total_y + $y;
					$total_xx = $total_xx + $xx;
					$total_xy = $total_xy + $xy;
			?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $dt->periode_pmb ?></td>
				<td><?php echo $y ?></td>
				<td><?php echo $x ?></td>
				<td><?php echo $y ?></td>
				<td><?php echo $xx = $x * $x?></td>
				<td><?php echo $xy = $x * $y?></td>
				<td>
					<a href="hapus.php?id=<?php echo $dt->kode_pmb ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $dt->kode_pmb ?>"><i class="fa fa-pencil"></i></button>
					<div id="myModal<?php echo $dt->kode_pmb?>" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Data</h4>
							</div>
							<div class="modal-body">
								<form action="update.php" method="post">
									<div class="form-group">
										<label for="">Kode PMB</label>
										<input type="text" name="kode_pmb" class="form-control" value="<?=  $dt->kode_pmb; ?>" readonly>
									</div>
									<div class="form-group">
										<label for="">Periode PMB</label>
										<input type="text" name="periode_pmb" class="form-control" value="<?= $dt->periode_pmb ?>">
									</div>
									<div class="form-group">
										<label for="">Jumlah PMB</label>
										<input type="text" name="jumlah_pmb" class="form-control" value="<?= $dt->jumlah_pmb ?>">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
							</div>

						</div>
					</div>
				</td>
			</tr>
			<?php
				
				}
			?>
			<tr id="form-insert" style="display:none">
				<td>
					<button class="btn btn-warning" onclick="hideForm()"><i class="fa fa-close"></i></button>
				</td>
					<!-- form tambah data -->
					<?php 
						$q_thn = mysqli_query($conn,"select max(periode_pmb) from pmb_".nim."");
						
						foreach (mysqli_fetch_assoc($q_thn) as $key ) {
							$periode =  $key+1;
						}
					?>
					<form action="<?= 'simpan_'.nim.'.php' ?>" method="post">
						<td><input type="text" name="periode" class="form-control" id="periode" placeholder="Masukkan Periode" value="<?= $periode ?>" readonly></td>
						<td><input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Masukkan Jumlah" required></td>
						<td>
							<button name="simpan" type="submit" class="btn btn-primary"><i class="fa fa-true"></i> Simpan</button>
						</td>
					</form>
			</tr>
			<tr>
				<td colspan="3">Jumlah</td>
				<td><?php echo $total_x;?></td>
				<td><?php echo $total_y;?></td>
				<td><?php echo $total_xx;?></td>
				<td><?php echo $total_xy;?></td>
			</tr>
			<tr>
				<td colspan="3">Rata-rata</td>
				<td><?php echo $total_x/$no; ?></td>
				<td><?php echo $total_y/$no ?></td>
			</tr>
	</table>
	<?php
		error_reporting(0);
		$total_xy;
		$total_x;
		
		$b1 = ($total_xy -(($total_x * $total_y)/$no))/($total_xx - (($total_x * $total_x)/$no));
		$total_y;
		$b0 = ($total_y/$no) - ($b1 * ($total_x/$no));
		echo "Rumus Regresi Linear <br> y = $b0 + $b1 x <br>";
	?>
	
	<form method="post" action="?p=prediksi" class="form-inline">
		Peramalan wisuda untuk 
		<select name="list_pilihan" id="list_pilihan" class="form-control">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<button type="submit" name="prediksi" class="btn btn-info"><i class="fa fa-refresh"></i> Prediksi</button>
	</form>
	
	<?php
		extract($_POST);
		if($_GET['p']=='prediksi'){
			$x = $x + $list_pilihan;
			$y = $b0 + $b1 * $x;
			echo "Prediksi PMB untuk $list_pilihan tahun berikutnya adalah $y";
		}
	?>
	</div>
	<br>	
	<br>
	<div style="clear:both"></div>
<div class="footer navbar-default">
	<div class="container-fluid text-right">
		<a href="https://github.com/AnangSyfr">Anang Syaifur R. </a> | 201751011
	</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function showForm(){
		if($("#form-insert").is(':hidden')==true){
			$("#form-insert").show();
			$("#jumlah").focus();
		}
	}
	function hideForm(){
		$("#form-insert").hide();
	}
</script>
</body>
</html>