        <!-- top navigation -->
        <?php 
          include 'header.php';

          if (isset($_POST['arama']))
          {
            $aranan = $_POST['aranan'];

            $iletisimsor = $db->prepare("SELECT * FROM iletisim WHERE iletisim_adsoyad LIKE '%$aranan%' ORDER BY iletisim_tarih DESC LIMIT 25");
            $iletisimsor->execute();
            $say = $iletisimsor->rowCount();
          }
          
          else
          {
            $iletisimsor = $db->prepare("SELECT * FROM iletisim ORDER BY iletisim_tarih DESC LIMIT 25");   
            $iletisimsor->execute();
            $say = $iletisimsor->rowCount();
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
                        <h2 align="left"> Mesaj Kutusu <small> 
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
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <th class="column-title"> Durum </th>
                            <th class="column-title"> Ad Soyad </th>
                            <th class="column-title text-center"> Mail </th>
                            <th class="column-title text-center"> Telefon </th>
                            <th class="column-title text-center"> Mesaj Konu </th>
                            <th class="column-title text-center"> Mesaj </th>
                            <th class="column-title text-center"> Tarih </th>
                            <th class="column-title"> </th>
                            <th class="column-title"> </th>
                          </thead>

                          <tbody>
                            <?php

                              while ($iletisimcek = $iletisimsor->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                              <tr>
                                <?php if ($iletisimcek["iletisim_durum"] == 1){  ?>
                                  <td class="text-center"> <button type="submit" style="width: 80px; height: 30px;" class="btn btn-success btn-xs"><i class="success fa fa-check-square"></i>&nbsp; Okundu </td> 
                                <?php } 
                                  else { ?>
                                    <td class="text-center"> <button type="submit" style="width: 100px; height: 30px;" class="btn btn-danger btn-xs"><i class="success fa fa-minus-circle" ></i>&nbsp; Okunmadı </td> 
                                <?php } ?>

                                <td class="text-center"> <?php echo $iletisimcek['iletisim_adsoyad']; ?> </td>
                                <td class="text-center"> <?php echo $iletisimcek['iletisim_mail']; ?> </td>
                                <td class="text-center"> <?php echo $iletisimcek['iletisim_telefon']; ?> </td>
                                <td class="text-center"> <?php echo $iletisimcek['iletisim_konu']; ?> </td>
                                <td class="text-center"> <?php echo substr($iletisimcek['iletisim_mesaj'], 0, 50)."..."; ?> </td>
                                <td class="text-center"> <?php echo $iletisimcek['iletisim_tarih']; ?> </td>
                                <td class="text-center">
                                  <a href="iletisim-goster.php?iletisim_id=<?php echo $iletisimcek['iletisim_id']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-primary btn-xs"><i class="success fa fa-pencil"></i>&nbsp; Detay </button></a>
                                  <a href="../netting/islem.php?iletisim_sil=yes&iletisim_id=<?php echo $iletisimcek['iletisim_id']; ?>"><button type="submit" style="width: 80px; height: 30px;" class="btn btn-danger btn-xs"><i class="success fa fa-trash"></i>&nbsp; Sil </button></a>
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