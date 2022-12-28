<?php
	include 'header.php';
	include 'admin/netting/baglan.php';

	$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
	$hakkimizdasor->execute(array('?'));
	$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>

<div role="main" class="main">
    <div class="container">
        <div class="row pt-xl">
            <div class="col-md-7">
                <h1 class="mt-xl mb-none"> <?php echo $hakkimizdacek['hakkimizda_baslik'] ?> </h1>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>
                <p><?php echo $hakkimizdacek['hakkimizda_icerik'] ?></p>
            </div>

            <?php include 'rightbar.php'; ?>
        </div>
    </div>
</div>

<?php 
	include 'footer.php'; 
?>