<?php 
	include 'header.php';
	include 'admin/netting/baglan.php';
?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">
			<div class="col-md-9">
				<h1 class="mt-xl mb-none"> Güncel Haberler </h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<?php 					
					$sorgu = $db->prepare("SELECT * FROM icerik WHERE icerik_durum=:sonuc");
					$sorgu->execute(array('sonuc' =>1));				
					$toplam_icerik = $sorgu->rowCount();

					$kac = 4;
					$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
					$hangisayfa = ($sayfa * $kac) - $kac;

					$iceriksor = $db->prepare("SELECT * FROM icerik WHERE icerik_durum=:sonuc ORDER BY icerik_zaman DESC LIMIT $hangisayfa, $kac");
					$iceriksor->execute(array('sonuc' =>1));
					
					$sayfasayisi = ceil($toplam_icerik / $kac);

					while ($icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC)){ ?>

					<div class="row">
						<div class="col-md-12">
							<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
								<span class="thumb-info-side-image-wrapper p-none hidden-xs">
									<img src="<?php echo $icerikcek['icerik_resimyol']; ?>" class="img-responsive" alt="<?php echo $icerikcek['icerik_ad']; ?>" style="width: 300px; height: 250px; padding: 10px;">
								</span>
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">
										<h2 class="mb-md mt-xs"> <?php echo $icerikcek['icerik_ad']; ?> </h2>
										<span class="post-meta">
											<span> <?php echo substr($icerikcek['icerik_zaman'], 0, 16); ?> | <a href="#"> Computer Worm </a></span>
										</span>
										<p class="font-size-md"> <?php echo substr($icerikcek['icerik_detay'], 0, 250)."..."; ?> </p>
										<a class="mt-md" href="<?=fonki($icerikcek['icerik_ad']).'-'.$icerikcek['icerik_id'] ?>"> Daha fazla... <i class="fa fa-long-arrow-right"></i></a>
									</span>
								</span>
							</span>

						</div>
					</div>
				<?php } ?>

				<div align="right" class="col-md-12">
					<ul class="pagination">
						<?php
							$i = 1;

							while ($i <= $sayfasayisi) {?>
								<li class="<?php if($i==$sayfa) echo 'active'; ?>"><a href="?sayfa=<?php echo $i; ?>"> <?php echo $i; ?></a></li>
							<?php $i++; } 
						?> 
					</ul>
				</div>

			</div>

			<div class="col-md-3">
				<aside class="sidebar">
					<div id="combinationFilters" class="filters">
					<?php include 'rightbar.php' ?>
				</aside>
			</div>
		</div>

	</div>
</div>

<?php include 'footer.php'; ?>