<?php 
    include 'header.php';
    include 'admin/netting/baglan.php';

    if (isset($_POST['aranan']))
    {
        $aranan = $_POST['aranan'];
    }

    else
    {
        $aranan = $_GET['aranan'];
    }

    if (strlen($aranan) == 0)
    {
        header('Location:index.php');
    }

    $sorgu=$db->prepare("SELECT * FROM icerik WHERE icerik_ad LIKE ?");
    $sorgu->execute(array("%$aranan%"));
    $say=$sorgu->rowCount();

?>
<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">
			<div class="col-md-9">
				<h1 class="mt-xl mb-none"> Sorgu Sonuçları </h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
                <div class="row">
                    <?php 
                    if ($say==0) {?>

                    <div class="col-md-7">
                        <p><b><?php echo $aranan ?></b> kelimesi ile ilgili sonuç bulunamadı...</p>
                    </div>
                    <?php }   ?>
                </div>

				<?php 					
                    $sayfada = 4;//sayfada gösterilecek icerik miktarı
                    $toplam_icerik = $sorgu->rowCount();
                    $toplam_sayfa = ceil($toplam_icerik / $sayfada);

                    //eger sayfa girilmemişse 1 varsayalım
                    $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                    
                    //eger 1 den kücük bir sayfa sayısı girilmemişse 1 yapalım
                    if($sayfa < 1) $sayfa = 1;

                    //toplam sayfa sayımızdan  fazla yazılırsa en son sayfayı varsayalım.
                    if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

                    $limit = ($sayfa - 1) * $sayfada;

                    $iceriksor=$db->prepare("SELECT * FROM icerik WHERE icerik_ad LIKE ? ORDER BY icerik_zaman DESC");
                    $iceriksor->execute(array("%$aranan%"));


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