<!-- top navigation -->
<?php
    include 'header.php';
    include '../netting/baglan.php';

    $iletisimsor = $db->prepare("SELECT * FROM iletisim where iletisim_id=:iletisim_id");
    $iletisimsor->execute(array('iletisim_id' => $_GET['iletisim_id']));
    $iletisimcek = $iletisimsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- /top navigation -->

<head>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
</head>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ayarlar</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Anahtar kelimeniz..">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Ara!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <div align="right" class="col-md-12">
                            <h2 align="left"> Gelen Kutusu Düzenleme İşlemi <small>
                                <?php
                                    if (@$_GET['durum'] == 'yes') {

                                    echo "<b style='color:green;'> İşlem Başarılı... </b>";
                                } 
                                else if (@$_GET['durum'] == 'no') 
                                {
                                    echo "<b style='color:red'> İşlem Başarısız... </b>";
                                } ?>
                                </small> </h2>
                            <a href="iletisim.php"></a>
                        </div>

                        <ul class="nav navbar-right panel_toolbox"></ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="x_content">
                            <br />
                            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                <input type="hidden" name="iletisim_id" value="<?php echo $iletisimcek['iletisim_id']; ?>">
                                <input type="hidden" name="iletisim_durum" value="1">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Gönderen Ad Soyad <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $iletisimcek['iletisim_adsoyad']; ?>" name="iletisim_adsoyad" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Gönderen Mail <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $iletisimcek['iletisim_mail']; ?>" name="iletisim_adsoyad" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Telefon Numarası <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" required="required" value="<?php echo $iletisimcek['iletisim_telefon']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Mesaj Tarihi <span class="required">*</span>
                                    </label>
                                    <div class="">

                                        <div class="col-md-3 col-sm-6 col-xs-3">
                                            <input type="date" id="last-name" required="required" value="<?php echo substr($iletisimcek['iletisim_tarih'], 0, 10); ?>" class="form-control col-md-7 col-xs-12">
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-xs-3">
                                            <input type="time" id="last-name" required="required" value="<?php echo substr($iletisimcek['iletisim_tarih'], 11, 20); ?>" class="form-control col-md-7 col-xs-12">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Mesaj Konusu <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" value="<?php echo $iletisimcek['iletisim_konu']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Mesaj İçeriği <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="editor1" name="icerik_detay"><?php echo $iletisimcek['iletisim_mesaj']; ?></textarea>
                                    </div>
                                </div>

                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>

                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button name="iletisim-durum" style="width: 90px; height: 30px;" class="btn btn-success btn-xs"><i class="success fa fa-arrow-circle-o-left fa-1x"></i>&nbsp; Geri Dön </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- footer content -->
<?php include 'footer.php'; ?>

<!-- /footer content -->