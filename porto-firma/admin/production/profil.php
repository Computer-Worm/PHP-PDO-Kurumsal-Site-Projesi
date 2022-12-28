<!-- top navigation -->
<?php
    include 'header.php';

    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kuladi");
    $kullanicisor->execute(array('kuladi' => $_SESSION['kullanici_ad']));
    $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

    $bilgisor = $db->prepare("SELECT * FROM kullanici_bilgi WHERE kullanici_id=:kulid");
    $bilgisor->execute(array('kulid' => $_SESSION['kullanici_id']));
    $bilgicek = $bilgisor->fetch(PDO::FETCH_ASSOC);

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
                            <h2 align="left"> Kullanıcı Profili </h2>
                            <div class="clearfix"><a href="profil-duzenle.php" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Profili Düzenle </a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="../../<?php echo $kullanicicek['kullanici_resimyol']; ?>" style="width: 400px;">
                                </div>
                            </div>
                            <h3> <?php echo $kullanicicek['kullanici_ad']; ?> </h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $bilgicek['bilgi_lokasyon']; ?>
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $bilgicek['bilgi_departman']; ?>
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a href="<?php echo $bilgicek['bilgi_site']; ?>" target="_blank"> <?php echo $bilgicek['bilgi_site']; ?> </a>
                                </li>
                            </ul>

                            
                            <br />

                            <!-- start skills -->
                            <h4> Yetenekler </h4>
                            <ul class="list-unstyled user_data">
                                <?php 
                                    while($yetenekcek = $yeteneksor->fetch(PDO::FETCH_ASSOC)) {
                                        if ($yetenekcek['yetenek_seviyesi'] <= 50)
                                        {    $seviye_rengi = 'red';}

                                        else {$seviye_rengi = 'green';}
                                ?>
                                <li>
                                    <p> <?php echo $yetenekcek['yetenek_ad']; ?> </p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-<?php echo $seviye_rengi; ?>" role="progressbar" data-transitiongoal="<?php echo $yetenekcek['yetenek_seviyesi']; ?>"></div>
                                    </div>
                                </li>
                                <?php }?>
                            </ul>
                            <!-- end of skills -->

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

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
                                        <th class="col-md-1"> # </th>
                                        <th class="col-md-3"> Proje Adı </th>
                                        <th class="col-md-3"> Müşteri Şirketi </th>
                                        <th class="col-md-2"> Çalışma Saatleri </th>
                                        <th class="col-md-7"> Katkı Payı </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($projecek = $projesor->fetch(PDO::FETCH_ASSOC)) {
                                                if ($projecek['proje_katkipayi'] <= 50)
                                                {    $seviye_rengi = 'danger';}

                                                else {$seviye_rengi = 'success';}
                                        ?>

                                        <tr>
                                        <td> <?php echo $projecek['proje_id'] ?></td>
                                        <td> <?php echo $projecek['proje_ad']; ?> </td>
                                        <td> <?php echo $projecek['proje_sirket']; ?> </td>
                                        <td class="hidden-phone"> <?php echo $projecek['proje_saati']; ?> </td>
                                        <td class="vertical-align-mid">
                                            <div class="progress">
                                            <div class="progress-bar progress-bar-<?php echo $seviye_rengi; ?>" data-transitiongoal="<?php echo $projecek['proje_katkipayi']; ?> "></div>
                                            </div>
                                        </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                    <!-- end user projects -->

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