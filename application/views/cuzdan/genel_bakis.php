<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Genel Bakış</title>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/temalar/cuzdan/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('public/assets/temalar/cuzdan/css/bootstrap-theme.min.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('public/assets/temalar/cuzdan/css/stil.css'); ?>" />
</head>
<body>
	<div class="container">
		<div class="well">
			Bu bölüme sadece adminler erişebilir <a href="<?php echo base_url('auth/cikis'); ?>">Çıkış Yap</a>
		</div>
		
		<div class="col-md-6 well">
			<h2>Giderler</h2>
			<form class="form" action="<?php echo base_url('cuzdan/paraHareketiEkle'); ?>" method="post">
				<label>Tutar</label>
				<input type="text" name="tutar" class="form-control" placeholder="tutar" />
				<label>Açıklama</label>
				<input type="text" name="aciklama" class="form-control" placeholder="aciklama" />
				<div class="h30"></div>
				<input type="hidden" name="islem" value="gider" />
				<input type="submit" value="gider ekle" class="btn btn-block btn-danger" />
			</form>

			<div class="h30"></div>
			<table class="table">
				
				<thead>
					<tr>
						<td>Tutar</td>
						<td>Açıklama</td>
						<td>Tarih</td>
					</tr>
				</thead>
				
				<tbody>	
					<?php foreach($giderler as $gider): ?>
						<tr>
							<td><?php echo $gider['tutar']; ?> TL</td>
							<td><?php echo $gider['aciklama']; ?></td>
							<td><?php echo $gider['tarih']; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>

			</table>
		</div>
		<div class="col-md-6 well">
			<h2>Gelirler</h2>
			<form class="form" action="<?php echo base_url('cuzdan/paraHareketiEkle'); ?>" method="post">
				<label>Tutar</label>
				<input type="text" name="tutar" class="form-control" placeholder="tutar" />
				<label>Açıklama</label>
				<input type="text" name="aciklama" class="form-control" placeholder="aciklama" />
				<div class="h30"></div>
				<input type="hidden" name="islem" value="gelir" />
				<input type="submit" value="gider ekle" class="btn btn-block btn-primary" />
			</form>	

			<div class="h30"></div>
			<table class="table">

				<thead>
					<tr>
						<td>Tutar</td>
						<td>Açıklama</td>
						<td>tarih</td>
					</tr>
				</thead>

				<tbody>	
					<?php foreach($gelirler as $gelir): ?>
						<tr>
							<td><?php echo $gelir['tutar']; ?> TL</td>
							<td><?php echo $gelir['aciklama']; ?></td>
							<td><?php echo $gelir['tarih']; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>

			</table>
		</div>



		
	</div>



	<script src="<?php echo base_url('public/assets/temalar/cuzdan/css/bootstrap.min.css'); ?>"></script>
</body>
</html>