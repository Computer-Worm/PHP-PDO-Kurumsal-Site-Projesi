<!-- top navigation -->
<?php
    include 'header.php';

    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kuladi");
    $kullanicisor->execute(array('kuladi' => $_SESSION['kullanici_ad']));
    $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

    $yeteneksor = $db->prepare("SELECT * FROM kullanici_yetenek WHERE kullanici_id=:kulid");
    $yeteneksor->execute(array('kulid' => $_SESSION['kullanici_id']));

    $projesor = $db->prepare("SELECT * FROM kullanici_proje WHERE kullanici_id=:kulid");
    $projesor->execute(array('kulid' => $_SESSION['kullanici_id']));

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
                        <div class="x_title">

                            <div align="right" class="col-md-12">
                                <h2 align="left"> Kullanıcı Profili <small>
                                <?php
                                    if (@$_GET['durum'] == 'yes') {

                                    echo "<b style='color:green;'> İşlem Başarılı... </b>";
                                } 
                                else if (@$_GET['durum'] == 'no') 
                                {
                                    echo "<b style='color:red'> İşlem Başarısız... </b>";
                                } ?>
                                </small></h2>
                                <a href="profil.php" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left fa-1x"></i> Geri Dön </a>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            
                                <div class="col-md-2 col-sm-3 col-xs-12 profile_left">
                                    <div class="profile_img">
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <img src="../../<?php echo $kullanicicek['kullanici_resimyol']; ?>" style="width: 200px;">
                                            <h3><i class="fa fa-user fa-x"></i> <?php echo $kullanicicek['kullanici_ad']; ?></h3>
                                        </div> 
                                    </div>
                                </div>

                                
                                <div class="col-md-6 col-sm-5 col-xs-12">
                                    <div class="col-md-12">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="home-tab" data-toggle="tab" aria-expanded="false"> Proje Ekle </a></li>
                                            </ul>
                                               
                                            <form action="../netting/islem.php" method="POST">
                                                <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="home-tab">
                                                        <table class="data table table-striped no-margin">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-4"> &nbsp;Proje Adı </th>
                                                                <th class="col-md-4"> Müşteri Şirketi </th>
                                                                <th class="col-md-2"> Çalışma Saatleri </th>
                                                                <th class="col-md-2"> Katkı Payı (%) </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr> <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                                                                <td> <input type="text" name="proje_ad" placeholder="Projenin adı.." class="form-control col-md-7 col-xs-12"> </td>
                                                                <td> <input type="text" name="proje_sirket" placeholder="Şirket adı.." class="form-control col-md-7 col-xs-12"> </td> </td>
                                                                <td class="col-md-2"> <input type="text" name="proje_saati" placeholder="Saati.." class="form-control col-md-2 col-xs-12"> </td>
                                                                <td class="col-md-2"> <input type="number" name="proje_katkipayi" min="1" max="100" value="10" class="form-control col-md-2 col-xs-12"> </td>
                                                                <td class="col-md-1"> <button type="submit" name="kullanici-proje-ekle" class="btn btn-success"><i class="fa fa-check"></i> Ekle </button> </td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="home-tab" data-toggle="tab" aria-expanded="false"> Görev Aldığı Projeler </a></li>
                                            </ul>
                                            
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="home-tab">
                                                    <!-- start user projects -->
                                                    <table class="data table table-striped no-margin">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th> Proje Adı </th>
                                                            <th> Müşteri Şirketi </th>
                                                            <th class="col-md-3"> Çalışma Saatleri </th>
                                                            <th class="col-md-3"> Katkı Payı </th>
                                                        </tr>
                                                    </thead>

                                                    <?php 
                                                        while($projecek = $projesor->fetch(PDO::FETCH_ASSOC)) { 
                                                            if ($projecek['proje_katkipayi'] <= 50)
                                                            {    $seviye_rengi = 'danger';}
                    
                                                            else {$seviye_rengi = 'success';}
                                                    ?>

                                                    <tbody>
                                                        <tr>
                                                            <td> <?php echo $projecek['proje_id']; ?> </td>
                                                            <td> <?php echo $projecek['proje_ad']; ?> </td>
                                                            <td> <?php echo $projecek['proje_sirket']; ?> </td>
                                                            <td class="col-md-3"> <?php echo $projecek['proje_saati']; ?> </td>
                                                            <td class="col-md-3">
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-<?php echo $seviye_rengi; ?>" data-transitiongoal="<?php echo $projecek['proje_katkipayi']; ?>"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                    <?php } ?>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                       
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="col-md-12">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="home-tab" data-toggle="tab" aria-expanded="false"> Yetenek Ekle </a></li>
                                            </ul>
                                            
                                            <form action="../netting/islem.php" method="POST">
                                                <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="home-tab">
                                                        <table class="data table table-striped no-margin">
                                                        <thead>
                                                            <tr>
                                                            <th class="col-md-7"> Yetenek Adı </th>
                                                            <th class="col-md-2"> Yetenek Seviyesi </th>
                                                            <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr> <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                                                            <td class="col-md-7"> <input type="text" name="yetenek_ad" placeholder="Yetenek adı.." class="form-control col-md-7 col-xs-12"> </td>
                                                            <td class="col-md-2"> <input type="number" name="yetenek_seviyesi" min="1" max="100" value="10" class="form-control col-md-7 col-xs-12"> </td>
                                                            <td> <button type="submit" name="kullanici-yetenek-ekle" class="btn btn-success"><i class="fa fa-check"></i> Ekle </button> </td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="home-tab" data-toggle="tab" aria-expanded="false"> Kişisel Yetenekler </a></li>
                                            </ul>
                                            
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="home-tab">

                                                    <!-- start user projects -->
                                                    <table class="data table table-striped no-margin">
                                                    <thead>
                                                        <tr>
                                                        <th> # </th>
                                                        <th class="col-md-7"> Yetenek Adı </th>
                                                        <th class="col-md-7"> Yetenek Seviyesi </th>
                                                        </tr>
                                                    </thead>

                                                    <?php 
                                                        while($yetenekcek = $yeteneksor->fetch(PDO::FETCH_ASSOC)) { 
                                                            if ($yetenekcek['yetenek_seviyesi'] <= 50)
                                                            {    $seviye_rengi = 'danger';}
                    
                                                            else {$seviye_rengi = 'success';}
                                                    ?>

                                                    <tbody>
                                                        <tr>
                                                        <td> <?php echo $yetenekcek['yetenek_id']; ?> </td>
                                                        <td class="col-md-7"> <?php echo $yetenekcek['yetenek_ad']; ?> </td>
                                                        <td class="col-md-7">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-<?php echo $seviye_rengi; ?>" data-transitiongoal="<?php echo $yetenekcek['yetenek_seviyesi']; ?>"></div>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    </tbody>

                                                    <?php } ?>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>        
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- footer content -->
<?php include 'footer.php'; ?>
<!-- /footer content -->