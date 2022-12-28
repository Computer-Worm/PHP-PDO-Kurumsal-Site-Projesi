        <!-- top navigation -->
        <?php 
          include 'header.php';

          if (isset($_POST['arama']))
          {
            $aranan = $_POST['aranan'];

            $iceriksor = $db->prepare("SELECT * FROM icerik WHERE icerik_ad LIKE '%$aranan%' ORDER BY icerik_durum DESC, icerik_id DESC LIMIT 25");
            $iceriksor->execute();
            $say = $iceriksor->rowCount();
          }
          
          else
          {
            $iceriksor = $db->prepare("SELECT * FROM icerik ORDER BY icerik_durum DESC, icerik_id DESC LIMIT 25");   
            $iceriksor->execute();
            $say = $iceriksor->rowCount();
          }

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
                    <input type="text" class="form-control" name="aranan" placeholder="Anahtar kelime giriniz...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" name="arama" type="submit">Ara!</button>
                    </span>
                  </div>
                  </form>

                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <div align="right" class="col-md-12">
                        <h2 align="left"> İçerik İşlemleri <small> 
                            <?php
                              if (isset($_POST['arama']))
                              {
                                echo "<b style='color:#1ABC9C ;'> $say Kayıt Bulundu </b>";
                              }

                              if (@$_GET['durum'] == 'yes') {

                                echo "<b style='color:green;'> İşlem Başarılı... </b>";
                              } else if (@$_GET['durum'] == 'no') {

                                echo "<b style='color:red'> İşlem Başarısız... </b>";
                              } 
                            ?>
                          </small></h2>
                        <a href="icerik-ekle.php"><button style="width: 90px; height: 30px;" class="btn btn-danger btn-xs"><i class="success fa fa-plus"></i>&nbsp; Yeni Ekle </button></a>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <th class="column-title">İçerik Resim </th>
                            <th class="column-title text-center">İçerik Ad </th>
                            <th class="column-title text-center">İçerik Detay </th>
                            <th class="column-title text-center">İçerik Anahtar Kelime </th>
                            <th class="column-title text-center">İçerik Zaman </th>
                            <th class="column-title text-center">İçerik Durum </th>
                            <th class="column-title"> </th>
                            <th class="column-title"> </th>
                          </thead>

                          <tbody>
                            <?php

                              while ($icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                              <tr>
                                <td class=" "><img width="200" height="100" src="../../<?php echo $icerikcek['icerik_resimyol']; ?>"></td>
                                <td class="text-center"> <?php echo $icerikcek['icerik_ad']; ?> </td>
                                <td class="text-center"> <?php echo substr($icerikcek['icerik_detay'], 0, 50)."..."; ?> </td>
                                <td class="text-center"> <?php echo $icerikcek['icerik_keyword']; ?> </td>
                                <td class="text-center"> <?php echo $icerikcek['icerik_zaman']; ?> </td>
                                <td class="text-center"> <?php
                                
                                  if ($icerikcek['icerik_durum'] == 1)
                                  {
                                    echo "<b style='color:#4de600;'> Aktif </b>";
                                  }
                                  else
                                  {
                                    echo "<b style='color:red;'> Pasif </b>";
                                  }
                                
                                  ?> 
                                </td>
                                <td class="text-center">
                                  <a href="icerik-duzenle.php?icerik_id=<?php echo $icerikcek['icerik_id']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-primary btn-xs"><i class="success fa fa-pencil"></i>&nbsp; Düzenle </button></a>
                                  <a href="../netting/islem.php?icerik_sil=yes&icerik_id=<?php echo $icerikcek['icerik_id']; ?>&icerik_resimyol=<?php echo $icerikcek['icerik_resimyol']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-danger btn-xs"><i class="success fa fa-trash"></i>&nbsp; Sil </button></a>
                                </td>
                              </tr>

                            <?php } ?>
                          </tbody>
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
        <!-- /page content -->

        <!-- footer content -->
        <?php include 'footer.php'; ?>

        <!-- /footer content -->