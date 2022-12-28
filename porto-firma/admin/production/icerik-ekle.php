        <!-- top navigation -->
        <?php 
          include 'header.php'; 
          
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
                      <h2 align="left"> İçerik Ekleme İşlemi </h2>
                      <a href="icerik.php"><button style="width: 90px; height: 30px;" class="btn btn-success btn-xs"><i class="success fa fa-arrow-circle-o-left fa-1x"></i>&nbsp; Geri Dön </button></a>
                    </div>

                    <ul class="nav navbar-right panel_toolbox"></ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                  <div class="x_content">
                    <br />
                    <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Resim Seç <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" required="required" name="icerik_resimyol"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>  

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> İçerik Zaman <span class="required">*</span>
                        </label>
                        <div class="">

                            <div class="col-md-3 col-sm-6 col-xs-3">
                                <input type="date" id="last-name" required="required" name="icerik_tarih" value="<?php echo date('Y-m-d'); ?>" class="form-control col-md-7 col-xs-12">
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-3">
                                <input type="time" id="last-name" required="required" name="icerik_saat" value="<?php echo date('H:i:s'); ?>" class="form-control col-md-7 col-xs-12">
                            </div>

                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> İçerik Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="icerik_ad" placeholder="İçerik adını giriniz..." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> İçerik Detay <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="editor1" name="icerik_detay"></textarea>
                        </div>
                      </div>

                      <script>
                          CKEDITOR.replace( 'editor1' );
                      </script>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> İçerik Keyword <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" required="required" name="icerik_keyword" placeholder="Anahtar kelime giriniz.." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Slider Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control" name="icerik_durum" required>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="icerik-kaydet" class="btn btn-primary"> Kaydet </button>
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
