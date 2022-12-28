<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function mailgonder($post)
{
	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->SMTPKeepAlive = true;
	$mail->SMTPAuth = true;
	$mail->SMTPDebug = 0;
	$mail->SMTPSecure = 'tls';

	$mail->Port = 587;
	$mail->Host = 'smtp.gmail.com';

	$mail->Username = "isimsizkasiff@gmail.com";//Hangi mailden mesaj gidicek
	$mail->Password = "a1B2c3d4#";

	$mail->SetFrom($post["email"]);//alıcı kullanıcı kimden geldiğini görsün
	$mail->addAddress("yusufhasarrk@gmail.com");//nereye gönderilecek

	$mail->Subject = $post["konu"]." Porto Firma İletişim Formu";
	$body = $post["adsoyad"] . " - " . $post["email"] . " - " . $post["mesaj"];
	$mail->Body = $body;

	if ($mail->send()) {
		return true;
	}else{
		return $mail->ErrorInfo;
	}
}

if (!empty($_POST)) {
	$gonder = mailgonder($_POST);
	if ($gonder === true) {
		echo "<center><a href='index.php'><p class='btn btn-success' style='width: 100%;'>Mail Gönderme Başarılı..<p></a></center>";
   		//header("Refresh: 1.6; url=index.php?iletisimgonder=ok");
	}else{
		echo "<center><a href='index.php'><p class='btn btn-danger' style='width: 100%;'>Mail Gönderilirken Bir Hata Oluştu!<p></a></center>";
   		//header("Refresh: 1.4; url=index.php?iletisimgonder=no");
	}
}

?>