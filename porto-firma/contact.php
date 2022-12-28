<?php 
	include 'header.php';
	
	include 'admin/netting/baglan.php';

    $iletisimsor = $db->prepare("SELECT * FROM iletişim WHERE ayar_id=?");
    $iletisimsor->execute(array('?'));
    $iletisimcek = $iletisimsor->fetch(PDO::FETCH_ASSOC);
?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">
			<div class="col-md-7">
				<h1 class="mt-xl mb-none"> Bize Ulaşın </h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				<p class="lead mb-xl mt-lg">Bize ulaşmka için aşağıdaki formu eksisiz doldurun lütfen.</p>

				<small>
				<?php 
					if (@$_GET['durum']=='yes')
					{
						echo "<b style='color:green;'> Gönderim Başarılı... </b>";
					}
					
					else if (@$_GET['durum']=='no')
					{
						echo "<b style='color:red'> Gönderim Başarısız... </b>";
					}

				?>
				</small>

				<form action="admin/netting/islem.php" method="POST">

					
					
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Ad-Soyad <span class="required">*</span></label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="first-name" required="required" name="adsoyad" class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"> Mail <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="last-name" required="required" name="mail" class="form-control col-md-2 col-xs-3">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"> Telefon <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="last-name" required="required" name="telefon" class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"> Konu <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="last-name" required="required" name="konu" class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-2 col-sm-3 col-xs-12"> Mesajınız <span class="required">*</span></label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea class="resizable_textarea form-control" rows="10" cols="50" required="required" name="mesaj"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-9">
							<button type="submit" name="iletisim-form" class="btn btn-primary">Gönder</button>
						</div>
					</div>

				</form>




			</div>
			<div class="col-md-4 col-md-offset-1">

				<h4 class="mt-xl mb-none"> Adres & İletişim</h4>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<ul class="list list-icons list-icons-style-3 mt-xlg mb-xlg">
					<li><i class="fa fa-map-marker"></i> <strong>Addres:</strong> <?php echo $ayarcek['ayar_adres']; ?> </li>
					<li><i class="fa fa-phone"></i> <strong>Telefon:</strong> <?php echo $ayarcek['ayar_tel']; ?> </li>
					<li><i class="fa fa-envelope"></i> <strong>Mail:</strong> <a href="mailto:<?php echo $ayarcek['ayar_mail']; ?>"> <?php echo $ayarcek['ayar_mail']; ?> </a></li>
				</ul>

				<h4 class="pt-xl mb-none"> Çalışma Saatleri </h4>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<ul class="list list-icons list-dark mt-xlg">
					<li><i class="fa fa-clock-o"></i> <?php echo $ayarcek['ayar_mesai']; ?> </li>
				</ul>

			</div>
		</div>
	</div>

	<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
	<div id="googlemaps" class="google-map google-map-footer">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12478.430597473543!2d43.302254!3d38.5658526!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3392bd4a1cbe2433!2sVan%20Teknokent!5e0!3m2!1str!2str!4v1664221512469!5m2!1str!2str" width="2072" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</div>

<?php include 'footer.php'; ?>