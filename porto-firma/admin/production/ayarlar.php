<!-- top navigation -->
<?php
    include 'header.php';

    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kuladi");
    $kullanicisor->execute(array('kuladi' => $_SESSION['kullanici_ad']));
    $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

    $bilgisor = $db->prepare("SELECT * FROM kullanici_bilgi WHERE kullanici_id=:kulid");
    $bilgisor->execute(array('kulid' => $_SESSION['kullanici_id']));
    $bilgicek = $bilgisor->fetch(PDO::FETCH_ASSOC);

?>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Yönetim Paneli</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <form action="" method="POST">
                        <div class="input-group">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <form action="../netting/islem.php" method="POST">
                        <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                        <input type="hidden" name="kullanici_resimyol" value="<?php echo $kullanicicek['kullanici_resimyol']; ?>">
                        <input type="hidden" name="kullanici_password" value="<?php echo $kullanicicek['kullanici_password']; ?>">

                        <div class="x_title">
                            <div align="right" class="col-md-10">
                                <h2 align="left"> Kullanıcı Ayarları <small>
                                <?php
                                    if (@$_GET['durum'] == 'yes') {

                                    echo "<b style='color:green;'> İşlem Başarılı... </b>";
                                } 
                                else if (@$_GET['durum'] == 'no') 
                                {
                                    echo "<b style='color:red'> İşlem Başarısız... </b>";
                                } ?>
                                </small></h2>
                            </div>
                            <div align="right" class="col-md-1">
                                <button type="submit" name="kullanici-ayar-guncelle" class="btn btn-success"><i class="fa fa-check"></i> Kaydet </button>
                            </div>
                            <div align="right" class="col-md-1">
                                <a href="profil.php" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left fa-1x"></i> Geri Dön </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div class="col-md-11 col-sm-6 col-xs-12">
                                        <input type="file" name="kullanici_resimyol" class="form-control col-md-12 col-xs-12">
                                        <hr>
                                        <img src="../../<?php echo $kullanicicek['kullanici_resimyol']; ?>" style="width: 280px;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1"></div>
                            
                            <div class="col-md-9 col-sm-5 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_content">
                                                    <br/>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Kullanıcı Ad Soyad
                                                            </label>
                                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                                <input type="text" id="first-name"  name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div> <br/><br/>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Kullanıcı Ad 
                                                            </label>
                                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                                <input type="text" id="first-name" disabled name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad']; ?>" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div> <br/><br/>
                                                    
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name"> Kullanıcı Yetki
                                                            </label>
                                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                                <select id="heard" class="form-control" name="kullanici_yetki">

                                                                    <?php
                                                                    if ($kullanicicek['kullanici_yetki'] == 6) { ?>

                                                                        <option value="6" selected>CEO</option>
                                                                        <option value="5">CFO</option>
                                                                        <option value="4">COO</option>
                                                                        <option value="3">CIO</option>
                                                                        <option value="2">CMO</option>
                                                                        <option value="1">CTO</option>

                                                                    <?php } else if ($kullanicicek['kullanici_yetki'] == 5) { ?>

                                                                        <option value="6">CEO</option>
                                                                        <option value="5" selected>CFO</option>
                                                                        <option value="4">COO</option>
                                                                        <option value="3">CIO</option>
                                                                        <option value="2">CMO</option>
                                                                        <option value="1">CTO</option>

                                                                    <?php } else if ($kullanicicek['kullanici_yetki'] == 4) { ?>

                                                                        <option value="6">CEO</option>
                                                                        <option value="5">CFO</option>
                                                                        <option value="4" selected>COO</option>
                                                                        <option value="3">CIO</option>
                                                                        <option value="2">CMO</option>
                                                                        <option value="1">CTO</option>

                                                                    <?php } else if ($kullanicicek['kullanici_yetki'] == 3) { ?>

                                                                        <option value="6">CEO</option>
                                                                        <option value="5">CFO</option>
                                                                        <option value="4">COO</option>
                                                                        <option value="3" selected>CIO</option>
                                                                        <option value="2">CMO</option>
                                                                        <option value="1">CTO</option>

                                                                    <?php } else if ($kullanicicek['kullanici_yetki'] == 2) { ?>

                                                                        <option value="6">CEO</option>
                                                                        <option value="5">CFO</option>
                                                                        <option value="4">COO</option>
                                                                        <option value="3">CIO</option>
                                                                        <option value="2" selected>CMO</option>
                                                                        <option value="1">CTO</option>

                                                                    <?php } else if ($kullanicicek['kullanici_yetki'] == 1) { ?>

                                                                        <option value="6">CEO</option>
                                                                        <option value="5">CFO</option>
                                                                        <option value="4">COO</option>
                                                                        <option value="3">CIO</option>
                                                                        <option value="2">CMO</option>
                                                                        <option value="1" selected>CTO</option>

                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div> <br/><br/> 

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Mevcut Şifre
                                                            </label>
                                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                                <input type="password" id="first-name" name="mevcut_kullanici_password" placeholder="Mevcut şifreniz.." class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div> <br/><br/>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"> Yeni Şifre
                                                            </label>
                                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                                <input type="password" id="first-name" name="yeni_kullanici_password" placeholder="Yeni şifreniz.." class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div> <br/><br/><small>
                                                        <?php
                                                            if (@$_GET['pass'] == 'yes') {

                                                            echo "<b style='color:green;'> Şifre Değiştirme İşlemi Başarılı... </b>";
                                                            } 
                                                            else if (@$_GET['pass'] == 'no') 
                                                            {
                                                                echo "<b style='color:red'> Şifre Değiştirme İşlemi Başarısız... </b>";
                                                        } ?></small>
                                                        <hr>

                                                        <!-- <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                <button type="submit" name="duzenle" class="btn btn-primary"> Kaydet </button>
                                                            </div>
                                                        </div> -->

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"><i class="fa fa-map-marker user-profile-icon"></i>&nbsp Lokasyon
                                                            </label>
                                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                                <input type="text" name="bilgi_lokasyon" value="<?php echo $bilgicek['bilgi_lokasyon']; ?>" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div> <br/><br/>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"><i class="fa fa-briefcase user-profile-icon"></i>&nbsp Departman
                                                            </label>
                                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                                <input type="text" name="bilgi_departman" value="<?php echo $bilgicek['bilgi_departman']; ?>" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div> <br/><br/>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"><i class="fa fa-external-link user-profile-icon"></i>&nbsp URL
                                                            </label>
                                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                                <input type="text" name="bilgi_site" value="<?php echo $bilgicek['bilgi_site']; ?>" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div> <br/><br/>
                                                    </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>                      
                        </div> 
                                                                    </form>       
            </div>
        </div>
    </div>
</div>
</div>

<!-- footer content -->
<?php include 'footer.php'; ?>
<!-- /footer content -->

