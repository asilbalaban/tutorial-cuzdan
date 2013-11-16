<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Genel Bakış</title>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/temalar/cuzdan/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('public/assets/temalar/cuzdan/css/bootstrap-theme.min.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('public/assets/temalar/cuzdan/css/stil.css'); ?>" />
	<link rel="stylesheet" href="http://codeorigin.jquery.com/ui/1.10.3/themes/ui-lightness/jquery-ui.css" />
</head>
<body>
	<div class="container">
		<div class="well">
			<div class="pull-left">
				Hoşgeldiniz, admin <a href="<?php echo base_url('auth/cikis'); ?>">Çıkış Yap</a>

			</div>

			<div class="pull-right">
				<span class="tutar label label-primary">Toplam Gelir: <?php echo ($toplamGelir == null) ? 0 : $toplamGelir; ?> TL</span>
				<span class="tutar label label-danger">Toplam Gider: <?php echo ($toplamGider == null) ? 0 : $toplamGider; ?> TL</span>
				<span class="tutar label label-success">Kalan Para: <?php echo $toplamGelir - $toplamGider; ?> TL</span>
			</div>
			<div class="clear"></div>
		</div>

		<div class="well">
			<div class="col-md-8">
				<a href="<?php echo base_url('cuzdan/genelBakis?baslangic='.date('Y-m-d').'&bitis='.date('Y-m-d')); ?>" class="btn btn-default">Bugün</a>
				<a href="<?php echo base_url('cuzdan/genelBakis?baslangic='.date('Y-m-d', strtotime("-7 Day")).'&bitis='.date('Y-m-d')); ?>" class="btn btn-default">Son 7 Gün</a>
				<a href="<?php echo base_url('cuzdan/genelBakis?baslangic='.date('Y-m-d', strtotime("previous monday")).'&bitis='.date('Y-m-d')); ?>" class="btn btn-default">Bu Hafta</a>
				<a href="<?php echo base_url('cuzdan/genelBakis?baslangic='.date('Y-m-d', strtotime("-1 Month")).'&bitis='.date('Y-m-d')); ?>" class="btn btn-default">Son 30 Gün</a>
				<a href="<?php echo base_url('cuzdan/genelBakis?baslangic='.date('Y-m-01').'&bitis='.date('Y-m-d')); ?>" class="btn btn-default">Bu Ay</a>
			</div>

			<div class="col-md-2">
				<input type="text" id="baslangic" name="baslangic" class="form-control" placeholder="Başlangıç YYYY-MM-DD" value="<?php echo $baslangicTarihi; ?>" />
			</div>	
			<div class="col-md-2">
				<input type="text" id="bitis" name="bitis" class="form-control" placeholder="Bitiş YYYY-MM-DD" value="<?php echo $bitisTarihi; ?>" />
			</div>				
			<div class="clear"></div>
			

		</div>



			<?php 
				if ($this->session->flashdata('mesaj') != false) {
					echo '<div class="alert alert-info">';
					echo $this->session->flashdata('mesaj');
					echo '</div>';
				}
			?>
		
			<?php 
				if ($this->session->flashdata('mesaj-hata') != false) {
					echo '<div class="alert alert-danger">';
					echo $this->session->flashdata('mesaj-hata');
					echo '</div>';
				}
			?>

		<div class="well">
			

			<div class="col-md-6">
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
			<div class="col-md-6">
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
		<div class="clear"></div>
		</div>

		
	</div>

	<script>
		var base_url = '<?php echo base_url(); ?>';
	</script>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="<?php echo base_url('public/assets/temalar/cuzdan/js/bootstrap.min.js'); ?>"></script>
	<script src="http://codeorigin.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
	<script src="<?php echo base_url('public/assets/temalar/cuzdan/js/scripts.js'); ?>"></script>



</body>
</html>