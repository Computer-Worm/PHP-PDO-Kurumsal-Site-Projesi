<?php 
  ob_start();
  session_start();
  include '../netting/baglan.php';

  if (!isset($_SESSION['kullanici_id']))
  {
    header('Location:login.php?durum=fakegiris');
  }

  $ayarsor = $db->prepare("select * from ayar where ayar_id=:id");
  $ayarsor->execute(array('id' => '0'));
  $ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

  $iletisimsayisisor = $db->prepare("SELECT * FROM iletisim WHERE iletisim_durum=:durum");
  $iletisimsayisisor->execute(array('durum' => '0'));
  $say = $iletisimsayisisor->rowCount();
  $iletisimsayisicek = $iletisimsayisisor->fetch(PDO::FETCH_ASSOC);

  $iletisimsor = $db->prepare("SELECT * FROM iletisim WHERE iletisim_durum=:durum LIMIT 8");
  $iletisimsor->execute(array('durum' => '0'));

  $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kuladi");
  $kullanicisor->execute(array('kuladi' => $_SESSION['kullanici_ad']));
  $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/> -->

    <title> Yönetim Paneli | MYT Yazılım </title>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../../index.php" target="_blank" class="site_title"><i class="fa fa-paw"></i> <span> MYT Yazılım </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../<?php echo $kullanicicek['kullanici_resimyol']; ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span> Hoş Geldiniz </span>
                <h2> <?php echo $_SESSION['kullanici_ad']; ?> </h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include 'sidebar.php'; ?>
            <!-- /sidebar menu -->

            
          </div>
        </div>


<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../<?php echo $kullanicicek['kullanici_resimyol']; ?>" alt=""> <?php echo $_SESSION['kullanici_ad']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="profil.php"><i class="fa fa-user pull-right"></i> Profil </a>
                    </li>

                    <li>
                      <a href="ayarlar.php">
                        <i class="fa fa-gear pull-right"></i>
                        <span> Ayarlar </span>
                      </a>
                    </li>

                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Çıkış </a></li>
                  </ul>
                </li>


                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"><?php echo $say; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    
                    <?php                       
                      while ($iletisimcek = $iletisimsor->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <li>
                      <a>
                        <span class="image"><img src="../../dimg/ismo.jpg" alt="Profile Image" /></span>
                        <span>
                          <span> <?php echo $iletisimcek['iletisim_adsoyad'] ?> </span>
                          <span class="time"> <?php echo substr($iletisimcek['iletisim_tarih'],0,10) ?>  </span>
                        </span>
                        <span class="message"> <?php echo substr($iletisimcek['iletisim_mesaj'],0,77)."..."; ?> </span>
                      </a>
                    </li>
                    <?php }?>
                    <li>
                      <div class="text-center">
                        <a href="iletisim.php">
                          <strong> Tüm Mesajları Görüntüle </strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>

        