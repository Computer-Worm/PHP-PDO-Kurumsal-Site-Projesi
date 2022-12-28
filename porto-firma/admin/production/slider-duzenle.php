        <!-- top navigation -->
        <?php
        include 'header.php';
        include '../netting/baglan.php';

        $slidersor = $db->prepare("SELECT * FROM slider where slider_id=:slider_id");
        $slidersor->execute(array('slider_id' => $_GET['slider_id']));
        $slidercek = $slidersor->fetch(PDO::FETCH_ASSOC);

        ?>
        <!-- /top navigation -->

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
                      <h2 align="left"> Silider Düzenleme İşlemi <small>
                          <?php
                          if (@$_GET['durum'] == 'yes') {

                            echo "<b style='color:green;'> İşlem Başarılı... </b>";
                          } else if (@$_GET['durum'] == 'no') {

                            echo "<b style='color:red'> İşlem Başarısız... </b>";
                          } ?>
                        </small></h2>
                      <a href="slider.php"><button style="width: 90px; height: 30px;" class="btn btn-success btn-xs"><i class="success fa fa-arrow-circle-o-left fa-1x"></i>&nbsp; Geri Dön </button></a>
                    </div>

                    <ul class="nav navbar-right panel_toolbox"></ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="x_content">
                      <br />
                      <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">
                        <input type="hidden" name="slider_resimyol" value="<?php echo $slidercek['slider_resimyol']; ?>">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Resim Düzenle <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <img alt="<?php echo $slidercek['slider_ad']; ?>" style="width: 660px; height: 220px;" src="../../<?php echo $slidercek['slider_resimyol']; ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Resim Seç <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="first-name" name="slider_resimyol" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Slider Adı <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" required="required" name="slider_ad" value="<?php echo $slidercek['slider_ad']; ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Slider URL <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="slider_link" value="<?php echo $slidercek['slider_link']; ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Slider Sırası <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" required="required" name="slider_sira" value="<?php echo $slidercek['slider_sira']; ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Slider Durum <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="heard" class="form-control" name="slider_durum" required>

                              <?php
                              if ($slidercek['slider_durum'] == 1) { ?>

                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>

                              <?php } else if ($slidercek['slider_durum'] == 0) { ?>

                                <option value="0">Pasif</option>
                                <option value="1">Aktif</option>
                              <?php } ?>

                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="sliderduzenle" class="btn btn-primary"> Güncelle </button>
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