<?php

ob_start();
session_start();
include "baglan.php";
date_default_timezone_set('Europe/Istanbul');


if (isset($_POST['loggin'])) 
{
    $kullanici_ad = $_POST['kullanici_ad'];
    $kullanici_password = md5($_POST['kullanici_password']);

    if ($kullanici_ad && $kullanici_password)
    {
        $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_ad=:ad AND kullanici_password=:passwords");
        $kullanicisor->execute(array('ad' => $kullanici_ad, 'passwords' => $kullanici_password));
        $say = $kullanicisor->rowCount();
        $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

        if ($say > 0)
        {
            $_SESSION['kullanici_ad'] = $kullanici_ad;
            $_SESSION['kullanici_password'] = $kullanici_password;
            $_SESSION['kullanici_id'] = $kullanicicek['kullanici_id'];

            header('Location:../production/index.php');
        }

        else
        {
            header('Location:../production/login.php?durum=no');
        }
    }

    else
    {
        header('Location:../production/login.php?durum=no');
    }
}


if (isset($_POST["genel-ayar-kaydet"])) {

    $uploads_dir = '../../dimg/logo';
 
    @$tmp_name = $_FILES['ayar_logo']['tmp_name'];
    @$name = $_FILES['ayar_logo']['name'];
    $benzersizsayi1 = rand(20000, 32000);
    $benzersizsayi2 = rand(20000, 52006);
    $benzersizsayi3 = rand(20000, 52066);
    $benzersizsayi4 = rand(20000, 32000);
    $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $ayarkaydet = $db->prepare("UPDATE ayar SET 
            ayar_logo=:logo,
            ayar_siteurl=:siteurl,
            ayar_title=:title,
            ayar_description=:site_description,
            ayar_keywords=:keywords,
            ayar_author=:author
            WHERE ayar_id=0");

    $ayarupdate = $ayarkaydet->execute(array(
        'logo'     => $refimgyol,
        'siteurl'  => $_POST['ayar_siteurl'],
        'title'    => $_POST['ayar_title'],
        'site_description' => $_POST['ayar_description'],
        'keywords' => $_POST['ayar_keywords'],
        'author'   => $_POST['ayar_author']
    ));

    
    echo $refimgyol; 

    if ($ayarupdate) 
    {
        header("Location: ../production/genel-ayar.php?durum=yes");
    } 
    
    else
    {
        header("Location: ../production/genel-ayar.php?durum=no");
    }
}

if (isset($_POST["iletisim-ayar-kaydet"])) {
    $ayarkaydet = $db->prepare("UPDATE ayar SET 
            ayar_tel=:tel,
            ayar_gsm=:gsm,
            ayar_faks=:faks,
            ayar_mail=:mail,
            ayar_adres=:adres,
            ayar_il=:il,
            ayar_ilce=:ilce,
            ayar_mesai=:mesai
            WHERE ayar_id=0");

    $ayarupdate = $ayarkaydet->execute(array(
        'tel'   => $_POST['ayar_tel'],
        'gsm'   => $_POST['ayar_gsm'],
        'faks'  => $_POST['ayar_faks'],
        'mail'  => $_POST['ayar_mail'],
        'adres' => $_POST['ayar_adres'],
        'il'    => $_POST['ayar_il'],
        'ilce'  => $_POST['ayar_ilce'],
        'mesai' => $_POST['ayar_mesai']
    ));

    if ($ayarupdate) {
        header("Location: ../production/iletisim-ayar.php?durum=yes");
    } else {
        header("Location: ../production/iletisim-ayar.php?durum=no");
    }
}

if (isset($_POST["sosyal-medya-ayar-kaydet"])) {
    $ayarkaydet = $db->prepare("UPDATE ayar SET 
            ayar_facebook=:facebook,
            ayar_twitter=:twitter,
            ayar_instagram=:instagram,
            ayar_youtube=:youtube
            WHERE ayar_id=0");

    $ayarupdate = $ayarkaydet->execute(array(
        'facebook'   => $_POST['ayar_facebook'],
        'twitter'    => $_POST['ayar_twitter'],
        'instagram'  => $_POST['ayar_instagram'],
        'youtube'    => $_POST['ayar_youtube']
    ));

    if ($ayarupdate) {
        header("Location: ../production/sosyal-medya-ayar.php?durum=yes");
    } else {
        header("Location: ../production/sosyal-medya-ayar.php?durum=no");
    }
}

if (isset($_POST["api-ayar-kaydet"])) {
    $ayarkaydet = $db->prepare("UPDATE ayar SET 
            ayar_recaptha=:recaptha,
            ayar_googlemap=:googlemap,
            ayar_analystic=:analystic
            WHERE ayar_id=0");

    $ayarupdate = $ayarkaydet->execute(array(
        'recaptha'   => $_POST['ayar_recaptha'],
        'googlemap'  => $_POST['ayar_googlemap'],
        'analystic'  => $_POST['ayar_analystic']
    ));

    if ($ayarupdate) {
        header("Location: ../production/api-ayar.php?durum=yes");
    } else {
        header("Location: ../production/api-ayar.php?durum=no");
    }
}

if (isset($_POST["mail-ayar-kaydet"])) {
    $ayarkaydet = $db->prepare("UPDATE ayar SET 
            ayar_smtphost=:smtphost,
            ayar_smtpuser=:smtpuser,
            ayar_smtppassword=:smtppassword,
            ayar_smtpport=:smtpport
            WHERE ayar_id=0");

    $ayarupdate = $ayarkaydet->execute(array(
        'smtphost'      => $_POST['ayar_smtphost'],
        'smtpuser'      => $_POST['ayar_smtpuser'],
        'smtppassword'  => $_POST['ayar_smtppassword'],
        'smtpport'      => $_POST['ayar_smtpport']
    ));

    if ($ayarupdate) {
        header("Location: ../production/mail-ayar.php?durum=yes");
    } else {
        header("Location: ../production/mail-ayar.php?durum=no");
    }
}

if (isset($_POST["hakkimizda-ayar-kaydet"])) {
    $ayarkaydet = $db->prepare("UPDATE hakkimizda SET 
            hakkimizda_baslik=:baslik,
            hakkimizda_icerik=:icerik,
            hakkimizda_video=:video,
            hakkimizda_video_basligi=:video_basligi,
            hakkimizda_vizyon=:vizyon,
            hakkimizda_misyon=:misyon
            WHERE hakkimizda_id=0");

    $ayarupdate = $ayarkaydet->execute(array(
        'baslik'        => $_POST['hakkimizda_baslik'],
        'icerik'        => $_POST['hakkimizda_icerik'],
        'video'         => $_POST['hakkimizda_video'],
        'video_basligi' => $_POST['hakkimizda_video_basligi'],
        'vizyon'        => $_POST['hakkimizda_vizyon'],
        'misyon'        => $_POST['hakkimizda_misyon']
    ));

    if ($ayarupdate) {
        header("Location: ../production/hakkimizda.php?durum=yes");
    } else {
        header("Location: ../production/hakkimizda.php?durum=no");
    }
}


if (isset($_POST["iletisim-form"])) // bu benim yaptığım sql ekle kodu
{
    
    $adsoyad = $_POST['adsoyad'];
    $mail    = $_POST['mail'];
    $telefon = $_POST['telefon'];
    $konu    = $_POST['konu'];
    $mesaj   = $_POST['mesaj'];
    $tarih   = date("Y-m-d H:i:s");
    $durum   = "0";

    $sql = "INSERT INTO iletisim VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
    $ekle = $db->prepare($sql);
    $ekle->execute(array($adsoyad, $mail, $telefon, $konu, $mesaj, $tarih, $durum));
    $index = $_POST['index'];

    if ($ekle == true) 
    {
        if ($index == '1')
        {
            header("Location: ../../index.php?durum=yes");
        }

        else
        {
            header("Location: ../../contact.php?durum=yes");
        }
    }
    
    else 
    {
        if ($index == '1')
        {
            header("Location: ../../index.php?durum=no");
        }

        else
        {
            header("Location: ../../contact.php?durum=no");
        }
    }
}


if (isset($_POST["slider-kaydet"])) // bu da emrah yükselin yaptığı sql ekle kodu
{

    $uploads_dir = '../../dimg/slider';
    @$tmp_name = $_FILES['slider_resimyol']['tmp_name'];
    @$name = $_FILES['slider_resimyol']['name'];
    $benzersizsayi1 = rand(20000, 32000);
    $benzersizsayi2 = rand(20000, 52006);
    $benzersizsayi3 = rand(20000, 52066);
    $benzersizsayi4 = rand(20000, 32000);
    $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $kaydet = $db->prepare("INSERT INTO slider SET 
            slider_ad=:ad,
            slider_link=:link,
            slider_sira=:sira,
            slider_durum=:durum,
            slider_resimyol=:resimyol");

    $sliderkaydet = $kaydet->execute(array(
        'ad'       => $_POST['slider_ad'],
        'link'     => $_POST['slider_link'],
        'sira'     => $_POST['slider_sira'],
        'durum'    => $_POST['slider_durum'],
        'resimyol' => $refimgyol
    ));

    if ($sliderkaydet) {
        header("Location: ../production/slider.php?durum=yes");
    } else {
        header("Location: ../production/slider.php?durum=no");
    }
}


if ($_GET['slider_sil'] == 'yes') {
    $sil = $db->prepare("DELETE FROM slider WHERE slider_id=:slider_id");
    $kontrol = $sil->execute(array('slider_id' => $_GET['slider_id']));

    if ($kontrol)
    {
        $resimsilunlink = $_GET['slider_resimyol'];
        unlink("../../$resimsilunlink");

        header("Location: ../production/slider.php?durum=yes");
    } 
    
    else 
    {
        header("Location: ../production/slider.php?durum=no");
    }
}


if (isset($_POST["sliderduzenle"])) {

    if ($_FILES['slider_resimyol']['size'] > 0) 
    {
        $uploads_dir = '../../dimg/slider';
        @$tmp_name = $_FILES['slider_resimyol']['tmp_name'];
        @$name = $_FILES['slider_resimyol']['name'];
        $benzersizsayi1 = rand(20000, 32000);
        $benzersizsayi2 = rand(20000, 52006);
        $benzersizsayi3 = rand(20000, 52066);
        $benzersizsayi4 = rand(20000, 32000);
        $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
        $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

        $slider_id = $_POST['slider_id'];
        $duzenle = $db->prepare("UPDATE slider SET 
            slider_ad=:ad,
            slider_link=:link,
            slider_sira=:sira,
            slider_durum=:durum,
            slider_resimyol=:resimyol
            WHERE slider_id=$slider_id");

        $update = $duzenle->execute(array(
            'ad'       => $_POST['slider_ad'],
            'link'     => $_POST['slider_link'],
            'sira'     => $_POST['slider_sira'],
            'durum'    => $_POST['slider_durum'],
            'resimyol' => $refimgyol
        ));

        if ($update) 
        {
            $resimsilunlink = $_POST['slider_resimyol'];
            unlink("../../$resimsilunlink");
            
            header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&durum=yes");
        } 
        
        else 
        {
            header("Location: ../production/slider-duzenle.php?durum=no");
        }
    } 
    
    else 
    {
        $slider_id = $_POST['slider_id'];
        $duzenle = $db->prepare("UPDATE slider SET 
            slider_ad=:ad,
            slider_link=:link,
            slider_sira=:sira,
            slider_durum=:durum
            WHERE slider_id=$slider_id");

        $update = $duzenle->execute(array(
            'ad'    => $_POST['slider_ad'],
            'link'  => $_POST['slider_link'],
            'sira'  => $_POST['slider_sira'],
            'durum' => $_POST['slider_durum']
        ));

        if ($update) {
            header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&durum=yes");
        } else {
            header("Location: ../production/slider-duzenle.php?durum=no");
        }
    }
}



if (isset($_POST["icerik-kaydet"])) // bu da emrah yükselin yaptığı sql ekle kodu
{
    $icerik_zaman = $_POST['icerik_tarih']." ".$_POST['icerik_saat'];

    $uploads_dir = '../../dimg/icerik';
    @$tmp_name = $_FILES['icerik_resimyol']['tmp_name'];
    @$name = $_FILES['icerik_resimyol']['name'];
    $benzersizsayi1 = rand(20000, 32000);
    $benzersizsayi2 = rand(20000, 52006);
    $benzersizsayi3 = rand(20000, 52066);
    $benzersizsayi4 = rand(20000, 32000);
    $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $kaydet = $db->prepare("INSERT INTO icerik SET 
            icerik_ad=:ad,
            icerik_detay=:detay,
            icerik_resimyol=:resimyol,
            icerik_keyword=:keyword,
            icerik_zaman=:zaman,
            icerik_durum=:durum");

    $icerikkaydet = $kaydet->execute(array(
        'ad'       => $_POST['icerik_ad'],
        'detay'    => $_POST['icerik_detay'],
        'resimyol' => $refimgyol,
        'keyword'  => $_POST['icerik_keyword'],
        'zaman'    => $icerik_zaman,
        'durum'    => $_POST['icerik_durum']
    ));

    if ($icerikkaydet) 
    {
        header("Location: ../production/icerik.php?durum=yes");
    }

    else 
    {
        header("Location: ../production/icerik.php?durum=no");
    }
}


if ($_GET['icerik_sil'] == 'yes') 
{
    
    $sil = $db->prepare("DELETE FROM icerik WHERE icerik_id=:icerik_id");
    $kontrol = $sil->execute(array('icerik_id' => $_GET['icerik_id']));

    if ($kontrol) 
    {
        $resimsilunlink = $_GET['icerik_resimyol'];
        unlink("../../$resimsilunlink");

       header("Location: ../production/icerik.php?durum=yes");
    } 

    else 
    {
        header("Location: ../production/icerik.php?durum=no");
    }
    
}


if (isset($_POST["icerik-duzenle"])) {

    $icerik_zaman = $_POST['icerik_tarih']." ".$_POST['icerik_saat'];
    $icerik_id = $_POST['icerik_id'];

    if ($_FILES['icerik_resimyol']['size'] > 0) 
    {
        $uploads_dir = '../../dimg/icerik';
        @$tmp_name = $_FILES['icerik_resimyol']['tmp_name'];
        @$name = $_FILES['icerik_resimyol']['name'];
        $benzersizsayi1 = rand(20000, 32000);
        $benzersizsayi2 = rand(20000, 52006);
        $benzersizsayi3 = rand(20000, 52066);
        $benzersizsayi4 = rand(20000, 32000);
        $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
        $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

        
        $duzenle = $db->prepare("UPDATE icerik SET 
            icerik_ad=:ad,
            icerik_detay=:detay,
            icerik_resimyol=:resimyol,
            icerik_keyword=:keyword,
            icerik_zaman=:zaman,
            icerik_durum=:durum
            WHERE icerik_id=$icerik_id");

        $update = $duzenle->execute(array(
            'ad'       => $_POST['icerik_ad'],
            'detay'    => $_POST['icerik_detay'],
            'resimyol' => $refimgyol,
            'keyword'  => $_POST['icerik_keyword'],
            'zaman'    => $icerik_zaman,
            'durum'    => $_POST['icerik_durum']
        ));

        if ($update) 
        {
            $resimsilunlink = $_POST['icerik_resimyol'];
            unlink("../../$resimsilunlink");
            
            header("Location: ../production/icerik-duzenle.php?icerik_id=$icerik_id&durum=yes");
        } 
        
        else 
        {
            header("Location: ../production/icerik-duzenle.php?durum=no");
        }
    } 
    
    else 
    {
        $duzenle = $db->prepare("UPDATE icerik SET 
            icerik_ad=:ad,
            icerik_detay=:detay,
            icerik_keyword=:keyword,
            icerik_zaman=:zaman,
            icerik_durum=:durum
            WHERE icerik_id=$icerik_id");

        $update = $duzenle->execute(array(
            'ad'       => $_POST['icerik_ad'],
            'detay'    => $_POST['icerik_detay'],
            'keyword'  => $_POST['icerik_keyword'],
            'zaman'    => $icerik_zaman,
            'durum'    => $_POST['icerik_durum']
        ));

        if ($update) 
        {     
            header("Location: ../production/icerik-duzenle.php?icerik_id=$icerik_id&durum=yes");
        } 
        
        else 
        {
            header("Location: ../production/icerik-duzenle.php?durum=no");
        }
    }
}

if ($_GET['iletisim_sil'] == 'yes') 
{
    $sil = $db->prepare("DELETE FROM iletisim WHERE iletisim_id=:iletisim_id");
    $kontrol = $sil->execute(array('iletisim_id' => $_GET['iletisim_id']));

    if ($kontrol)
    {
        header("Location: ../production/iletisim.php?durum=yes");
    } 
    
    else 
    {
        header("Location: ../production/iletisim.php?durum=no");
    }
}


if (isset($_POST["iletisim-durum"])) {

    $iletisim_id = $_POST['iletisim_id'];

    $iletisimkaydet = $db->prepare("UPDATE iletisim SET 
            iletisim_durum=:durum
            WHERE iletisim_id=$iletisim_id");

    $iletisimupdate = $iletisimkaydet->execute(array(
        'durum' => $_POST['iletisim_durum']
    ));

    if ($iletisimupdate) {
        header("Location: ../production/iletisim.php?durum=yes");
    } else {
        header("Location: ../production/iletisim.php?durum=no");
    }
}



if (isset($_POST["menu-kaydet"])) // bu da emrah yükselin yaptığı sql ekle kodu
{

    $kaydet = $db->prepare("INSERT INTO menu SET 
        menu_ust=:ust,
        menu_ad=:ad,
        menu_url=:urll,
        menu_detay=:detay,
        menu_sira=:sira,
        menu_durum=:durum");

    $menukaydet = $kaydet->execute(array(
        'ust'    => $_POST['menu_ust'],
        'ad'    => $_POST['menu_ad'],
        'urll'  => $_POST['menu_url'],
        'detay' => $_POST['menu_detay'],
        'sira'  => $_POST['menu_sira'],
        'durum' => $_POST['menu_durum']
    ));

    if ($menukaydet) 
    {
        header("Location: ../production/menu.php?durum=yes");
    } 

    else
    {
        header("Location: ../production/menu.php?durum=no");
    }
}



if (isset($_POST["menu-duzenle"])) {

    $menu_id = $_POST['menu_id'];

    $menukaydet = $db->prepare("UPDATE menu SET 
            menu_ust=:ust,
            menu_ad=:ad,
            menu_url=:urll,
            menu_detay=:detay,
            menu_sira=:sira,
            menu_durum=:durum
            WHERE menu_id=$menu_id");

    $menuupdate = $menukaydet->execute(array(
        'ust'    => $_POST['menu_ust'],
        'ad'    => $_POST['menu_ad'],
        'urll'  => $_POST['menu_url'],
        'detay' => $_POST['menu_detay'],
        'sira'  => $_POST['menu_sira'],
        'durum' => $_POST['menu_durum']
    ));

    if ($menuupdate) 
    {
        header("Location: ../production/menu.php?durum=yes");
    }
    
    else 
    {
        header("Location: ../production/menu.php?durum=no");
    }
}



if ($_GET['menu_sil'] == 'yes') 
{
    $sil = $db->prepare("DELETE FROM menu WHERE menu_id=:menu_id");
    $kontrol = $sil->execute(array('menu_id' => $_GET['menu_id']));

    if ($kontrol)
    {
        header("Location: ../production/menu.php?durum=yes");
    } 
    
    else 
    {
        header("Location: ../production/menu.php?durum=no");
    }
}




if (isset($_POST["kullanici-proje-ekle"])) {

    $kullanici_id = $_POST['kullanici_id'];

    $kullanici_proje_kaydet = $db->prepare("INSERT INTO kullanici_proje SET
        proje_ad=:ad,
        proje_sirket=:sirket,
        proje_saati=:saati,
        proje_katkipayi=:katkipayi,
        kullanici_id=:id");

    $kullanici_proje_add = $kullanici_proje_kaydet->execute(array(
        'ad'        => $_POST['proje_ad'],
        'sirket'    => $_POST['proje_sirket'],
        'saati'     => $_POST['proje_saati'],
        'katkipayi' => $_POST['proje_katkipayi'],
        'id'        => $kullanici_id
    ));

    if ($kullanici_proje_add)
    {
        header('Location:../production/profil-duzenle.php?durum=yes');
    }
    
    else
    {
        header('Location:../production/profil-duzenle.php?durum=no');
    }
}


if (isset($_POST['kullanici-yetenek-ekle']))
{
    $kullanici_id = $_POST['kullanici_id'];

    $kullanici_yetenek_kaydet = $db->prepare("INSERT INTO kullanici_yetenek SET
        yetenek_ad=:ad,
        yetenek_seviyesi=:seviyes,
        kullanici_id=:id");

    $kullanici_yetenek_add = $kullanici_yetenek_kaydet->execute(array(
        'ad'      => $_POST['yetenek_ad'],
        'seviyes' => $_POST['yetenek_seviyesi'],
        'id'      => $kullanici_id
    ));

    if ($kullanici_yetenek_add)
    {
        header('Location: ../production/profil-duzenle.php?durum=yes');
    }

    else 
    {
        header('Location:../production/profil-duzenle.php?durum=no');
    }
}


if (isset($_POST["kullanici-ayar-guncelle"])) {

    $kullanici_id = $_POST['kullanici_id'];
    $resim_yol    = $_POST['kullanici_resimyol'];

    if ($_POST['mevcut_kullanici_password']) // burda kaldık
    {
        $mevcut_password = md5($_POST['mevcut_kullanici_password']);
        $yeni_password  = md5($_POST['yeni_kullanici_password']);

        if ($_POST['kullanici_password'] == $mevcut_password)
        {
            $kullanici_duzenle = $db->prepare("UPDATE kullanici SET
                kullanici_password=:passwords
                WHERE kullanici_id=$kullanici_id");
    
            $kullanici_update = $kullanici_duzenle->execute(array(
                'passwords' => $yeni_password
            ));
    
            header("Location:../production/ayarlar.php?pass=yes");
        }

        else
        {
            header("Location:../production/ayarlar.php?pass=no");
        }
    }


    if ($_FILES['kullanici_resimyol']['size'] > 0) 
    {
        $uploads_dir = '../../dimg/user';
        @$tmp_name = $_FILES['kullanici_resimyol']['tmp_name'];
        @$name = $_FILES['kullanici_resimyol']['name'];
        $benzersizsayi1 = rand(20000, 32000);
        $benzersizsayi2 = rand(20000, 52006);
        $benzersizsayi3 = rand(20000, 52066);
        $benzersizsayi4 = rand(20000, 32000);
        $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
        $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


        $kullanici_duzenle = $db->prepare("UPDATE kullanici SET
            kullanici_adsoyad=:adsoyad,
            kullanici_yetki=:yetki
        WHERE kullanici_id=$kullanici_id");

        $kullanici_update = $kullanici_duzenle->execute(array(
            'adsoyad'   => $_POST['kullanici_adsoyad'],
            'yetki'     => $_POST['kullanici_yetki']
        ));

        $kullanici_bilgi_duzenle = $db->prepare("UPDATE kullanici_bilgi SET
            bilgi_lokasyon=:lokasyon,
            bilgi_departman=:departman,
            bilgi_site=:sites
            WHERE kullanici_id=$kullanici_id");

        $kullanici_bilgi_update = $kullanici_bilgi_duzenle->execute(array(
            'lokasyon'  => $_POST['bilgi_lokasyon'],
            'departman' => $_POST['bilgi_departman'],
            'sites'     => $_POST['bilgi_site']
        ));


        if ($kullanici_update and $kullanici_bilgi_update) 
        {
            $resimsilunlink = $_POST['icerik_resimyol'];
            unlink("../../$resimsilunlink");

            header("Location: ../production/ayarlar.php?durum=yes");
        } 

        else 
        {
            header("Location: ../production/ayarlar.php?durum=no");
        }
    } 
    
    else 
    {
        $kullanici_duzenle = $db->prepare("UPDATE kullanici SET
            kullanici_adsoyad=:adsoyad,
            kullanici_yetki=:yetki
        WHERE kullanici_id=$kullanici_id");

        $kullanici_update = $kullanici_duzenle->execute(array(
            'adsoyad'   => $_POST['kullanici_adsoyad'],
            'yetki'     => $_POST['kullanici_yetki']
        ));

        $kullanici_bilgi_duzenle = $db->prepare("UPDATE kullanici_bilgi SET
            bilgi_lokasyon=:lokasyon,
            bilgi_departman=:departman,
            bilgi_site=:sites
            WHERE kullanici_id=$kullanici_id");

        $kullanici_bilgi_update = $kullanici_bilgi_duzenle->execute(array(
            'lokasyon'  => $_POST['bilgi_lokasyon'],
            'departman' => $_POST['bilgi_departman'],
            'sites'     => $_POST['bilgi_site']
        ));


        if ($kullanici_update and $kullanici_bilgi_update) 
        {
            header("Location: ../production/ayarlar.php?durum=yes");
        } 

        else 
        {
            header("Location: ../production/ayarlar.php?durum=no");
        }
    }
}







?>