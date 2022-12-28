<!-- top navigation -->
<?php 
  include 'header.php'; 
?>
<!-- /top navigation -->

<head>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">

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
                      <h2 align="left"> Menu Ekleme İşlemi </h2>
                      <a href="menu.php"><button style="width: 90px; height: 30px;" class="btn btn-success btn-xs"><i class="success fa fa-arrow-circle-o-left fa-1x"></i>&nbsp; Geri Dön </button></a>
                    </div>

                    <ul class="nav navbar-right panel_toolbox"></ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                  <div class="x_content">
                    <br />
                    <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Üst Menu Seç </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="menu_ust" tabindex="-1">
                            <option></option>
                            <option value="0"> Üst Menu </option>

                            <?php 
                              $menusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu ORDER BY menu_sira");   
                              $menusor->execute(array('menu' => 0));

                              while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                              <option value="<?php echo $menucek['menu_id']; ?>"> <?php echo $menucek['menu_ad']; ?> </option>
                            <?php } ?>

                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Menu Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="menu_ad" placeholder="Menu adını giriniz..." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Menu URL *
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="menu_url" placeholder="Menu url giriniz.." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Menu Detay <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="editor1" name="menu_detay"></textarea>
                        </div>
                      </div>

                      <script>
                          CKEDITOR.replace( 'editor1' );
                      </script>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Menu Sırası <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" required="required" name="menu_sira" value="0" placeholder="Menu sırası giriniz.." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Menu Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control" name="menu_durum" required>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="menu-kaydet" class="btn btn-primary"> Kaydet </button>
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

        <script src="../vendors/select2/dist/js/select2.full.min.js"></script>

        <!-- Select2 -->
        <script>
          $(document).ready(function() {
            $(".select2_single").select2({
              placeholder: "Select a state",
              allowClear: true
            });
            $(".select2_group").select2({});
            $(".select2_multiple").select2({
              maximumSelectionLength: 4,
              placeholder: "With Max Selection limit 4",
              allowClear: true
            });
          });
        </script>
        <!-- /Select2 -->


        <!-- footer content -->
        <?php include 'footer.php'; ?>
        
        <!-- /footer content -->
