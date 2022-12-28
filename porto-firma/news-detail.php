<?php
include 'header.php';
include 'admin/netting/baglan.php';

$iceriksor = $db->prepare("SELECT * FROM icerik WHERE icerik_id=:id");
$iceriksor->execute(array('id' => $_GET['icerik_id']));
$icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC);

$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
$hakkimizdasor->execute(array('?'));
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>


<div role="main" class="main">
    <div class="container">
        <div class="row pt-xl">

            <div class="col-md-9">

                <h1 class="mt-xl mb-none"> <?php echo $icerikcek['icerik_ad']; ?> </h1>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
                            <span class="thumb-info-side-image-wrapper p-none hidden-xs">
                                <img src="<?php echo $icerikcek['icerik_resimyol']; ?>" class="img-responsive" alt="<?php echo $icerikcek['icerik_ad']; ?>" style="width: 300px; height: 250px; padding: 10px;">
                            </span>
                            <span class="thumb-info-caption">
                                <span class="thumb-info-caption-text">
                                    <span class="post-meta">
                                        <span> <?php echo substr($icerikcek['icerik_zaman'], 0, 16); ?> | <a href="#"> Computer Worm </a></span>
                                    </span>
                                    <p class="h3"> <?php echo $icerikcek['icerik_detay']; ?> </p>
                                    <hr>
                                    <p><b>Anahtar Kelimeler: </b>
                                    
                                    <?php 
                                        $etiketler = explode(',',$icerikcek['icerik_keyword']); 

                                        foreach ($etiketler as $keywords) { ?>
                                            <a href="arama.php?aranan=<?php echo $keywords; ?>">
                                                <button class="btn btn-primary btn-xs"><?php echo $keywords; ?></button>
                                            </a>
                                    <?php } ?>                             
                                    </p>
                                </span>
                            </span>
                        </span>

                    </div>
                </div>

            </div>

            <div class="col-md-3">
                <aside class="sidebar">
                    <?php include 'rightbar.php' ?>
                </aside>
            </div>

        </div>
    </div>

    <?php include 'footer.php'; ?>