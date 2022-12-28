        <!-- top navigation -->
        <?php 
          include 'header.php';

          if (isset($_POST['arama']))
          {
            $aranan = $_POST['aranan'];

            $slidersor = $db->prepare("SELECT * FROM slider WHERE slider_ad LIKE '%$aranan%' ORDER BY slider_durum DESC,slider_sira DESC LIMIT 25");
            $slidersor->execute();
            $say = $slidersor->rowCount();
          }
          
          else
          {
            $slidersor = $db->prepare("SELECT * FROM slider ORDER BY slider_durum DESC,slider_sira DESC LIMIT 25");
            $slidersor->execute();
            $say = $slidersor->rowCount();
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
                        <h2 align="left"> Silider İşlemleri <small> 
                            <?php
                            if (isset($_POST['arama']))
                            {
                              echo "<b style='color:#1ABC9C ;'> $say Kayıt Bulundu </b>";
                            }

                            if (@$_GET['durum'] == 'yes') {

                              echo "<b style='color:green;'> İşlem Başarılı... </b>";
                            } else if (@$_GET['durum'] == 'no') {

                              echo "<b style='color:red'> İşlem Başarısız... </b>";
                            } ?>
                          </small></h2>
                        <a href="slider-ekle.php"><button style="width: 90px; height: 30px;" class="btn btn-danger btn-xs"><i class="success fa fa-plus"></i>&nbsp; Yeni Ekle </button></a>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <th class="column-title">Slider Resim </th>
                            <th class="column-title text-center">Slider Ad </th>
                            <th class="column-title text-center">Slider Sıra </th>
                            <th class="column-title text-center">Slider Durum </th>
                            <th class="column-title"> </th>
                            <th class="column-title"> </th>
                          </thead>

                          <tbody>
                            <?php

                              while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                              <tr>
                                <td class=" "><img width="200" height="100" src="../../<?php echo $slidercek['slider_resimyol']; ?>"></td>
                                <td class="text-center"> <?php echo $slidercek['slider_ad']; ?> </td>
                                <td class="text-center"> <?php echo $slidercek['slider_sira']; ?> </td>
                                <td class="text-center"> <?php
                                
                                  if ($slidercek['slider_durum'] == 1)
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
                                  <a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-primary btn-xs"><i class="success fa fa-pencil"></i>&nbsp; Düzenle </button></a>
                                  <a href="../netting/islem.php?slider_sil=yes&slider_id=<?php echo $slidercek['slider_id']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-danger btn-xs"><i class="success fa fa-trash"></i>&nbsp; Sil </button></a>
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