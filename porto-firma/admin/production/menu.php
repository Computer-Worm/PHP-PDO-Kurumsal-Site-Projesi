        <!-- top navigation -->
        <?php 
          include 'header.php';

          if (isset($_POST['arama']))
          {
            $aranan = $_POST['aranan'];

            $menusor = $db->prepare("SELECT * FROM menu WHERE menu_ad LIKE '%$aranan%' ORDER BY menu_durum DESC, menu_sira ASC LIMIT 25");
            $menusor->execute();
            $say = $menusor->rowCount();
          }
          
          else
          {
            $menusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu ORDER BY menu_durum DESC, menu_sira ASC LIMIT 25");   
            $menusor->execute(array('menu' => 0));
            $say = $menusor->rowCount();
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
                      <a href="../../arama.php"><button class="btn btn-default" name="arama" type="submit">Ara!</button></a>
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
                        <h2 align="left"> Menu İşlemleri <small> 
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
                        <a href="menu-ekle.php"><button style="width: 90px; height: 30px;" class="btn btn-danger btn-xs"><i class="success fa fa-plus"></i>&nbsp; Yeni Ekle </button></a>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <th class="column-title text-center"> Menu Adı </th>
                            <th class="column-title text-center"> Menu URL </th>
                            <th class="column-title text-center"> Menu Detay </th>
                            <th class="column-title text-center"> Menu Sırası </th>
                            <th class="column-title text-center"> Menu Durumu </th>
                            <th class="column-title"> </th>
                            <th class="column-title"> </th>
                          </thead>

                          <tbody>
                            <?php

                              while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) {
                              $menu_id = $menucek['menu_id'];

                            ?>
                              <tr>
                                <td> <?php echo $menucek['menu_ad']; ?> </td>
                                <td class="text-center"> <?php echo $menucek['menu_url']; ?> </td>
                                <td class="text-center"> <?php echo substr($menucek['menu_detay'], 0, 50)."..."; ?> </td>
                                <td class="text-center"> <?php echo $menucek['menu_sira']; ?> </td>
                                <td class="text-center"> <?php
                                
                                  if ($menucek['menu_durum'] == 1)
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
                                  <a href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-primary btn-xs"><i class="success fa fa-pencil"></i>&nbsp; Düzenle </button></a>
                                  <a href="../netting/islem.php?menu_sil=yes&menu_id=<?php echo $menucek['menu_id']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-danger btn-xs"><i class="success fa fa-trash"></i>&nbsp; Sil </button></a>
                                </td>
                              </tr>

                              <?php
                                $altmenusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu_id ORDER BY menu_sira");   
                                $altmenusor->execute(array('menu_id' => $menu_id));

                                while ($altmenucek = $altmenusor->fetch(PDO::FETCH_ASSOC)) {

                              ?>

                              <tr>
                                <td> ---<p class="fa fa-chevron-right"> <?php echo $altmenucek['menu_ad']; ?> </p></td>
                                <td class="text-center"> <?php echo $altmenucek['menu_url']; ?> </td>
                                <td class="text-center"> <?php echo substr($altmenucek['menu_detay'], 0, 50)."..."; ?> </td>
                                <td class="text-center"> <?php echo $altmenucek['menu_sira']; ?> </td>
                                <td class="text-center"> <?php
                                
                                  if ($altmenucek['menu_durum'] == 1)
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
                                  <a href="menu-duzenle.php?menu_id=<?php echo $altmenucek['menu_id']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-primary btn-xs"><i class="success fa fa-pencil"></i>&nbsp; Düzenle </button></a>
                                  <a href="../netting/islem.php?menu_sil=yes&menu_id=<?php echo $altmenucek['menu_id']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-danger btn-xs"><i class="success fa fa-trash"></i>&nbsp; Sil </button></a>
                                </td>
                              </tr>

                            <?php } }?>
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