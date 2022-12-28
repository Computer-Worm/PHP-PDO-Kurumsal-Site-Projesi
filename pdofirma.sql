-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 28 Ara 2022, 10:51:18
-- Sunucu sürümü: 8.0.27
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `pdofirma`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

DROP TABLE IF EXISTS `ayar`;
CREATE TABLE IF NOT EXISTS `ayar` (
  `ayar_id` int NOT NULL DEFAULT '0',
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_siteurl` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_faks` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_recaptha` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_googlemap` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_instagram` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ayar_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_siteurl`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_adres`, `ayar_ilce`, `ayar_il`, `ayar_mesai`, `ayar_recaptha`, `ayar_googlemap`, `ayar_analystic`, `ayar_facebook`, `ayar_twitter`, `ayar_instagram`, `ayar_youtube`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`) VALUES
(0, 'dimg/logo/28712281293753021554porto-logo.png', 'http://localhost/porto-firma/', 'PHP PDO Yönetim Paneli Scripti', 'Donec condimentum hendrerit nibh, et maximus purus pretium eu. Vestibulum vel odio volutpat, tempor justo et, luctus eros. Maecenas vel cursus augue. Mauris ex nulla, eleifend ac sollicitudin eleifend, tincidunt vel ante. Curabitur egestas velit in t', 'php, eğitim, yazılım, pdo', 'Computer Worm', '0555 444 33 22', '0555 444 33 22', '0555 444 33 22', 'info@computerworm.com', 'Bardakçı, 65090 Van Merkez', 'Tuşba', 'Van', 'Pazartesi - Cuma  |  09.00 - 18.00', '', 'AIzaSyBr4Ox-V2DrkbrFTqaFIq2ek1uDj1VvUwQ', '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'mail.yusufhasar.com', 'test@yusufhasar.com', 'IQDmrVrha', '587');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

DROP TABLE IF EXISTS `hakkimizda`;
CREATE TABLE IF NOT EXISTS `hakkimizda` (
  `hakkimizda_id` int NOT NULL,
  `hakkimizda_baslik` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hakkimizda_icerik` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hakkimizda_video` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hakkimizda_video_basligi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `hakkimizda_vizyon` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hakkimizda_misyon` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`hakkimizda_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_video_basligi`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'Biz Kimiz ??', '<blockquote>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dapibus ullamcorper magna non lacinia. In vitae rutrum lorem. Nullam quis hendrerit est. Nulla facilisi. Morbi pretium tortor id elit venenatis laoreet. Proin id nulla in erat pharetra consectetur non ut est. Aliquam non convallis lacus. Cras vel tortor pellentesque, lacinia dolor vel, euismod felis. Maecenas nulla justo, eleifend eget sagittis et, imperdiet vitae quam. Pellentesque dignissim euismod blandit. Sed id tortor ut risus rhoncus ullamcorper. Nullam non nunc turpis. Vivamus ullamcorper rhoncus faucibus. Nam ac tempor magna. Integer varius pharetra neque, vitae sodales odio rutrum et.</p>\r\n</blockquote>\r\n\r\n<p><img alt=\"\" src=\"https://i.picsum.photos/id/1084/536/354.jpg?grayscale&amp;hmac=Ux7nzg19e1q35mlUVZjhCLxqkR30cC-CarVg-nlIf60\" style=\"height:354px; width:536px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Donec suscipit nisl justo, vitae accumsan felis consequat at. Maecenas vestibulum&nbsp;&nbsp;ultricies enim, sit amet luctus nisl vehicula tempus. Vestibulum dignissim&nbsp;&nbsp;semper velit, consequat ultricies lectus eleifend ac. Aliquam erat volutpat. Donec in dignissim ipsum, sed ornare ipsum. Fusce fringilla convallis lectus non vehicula. Fusce posuere ac arcu a varius. In mattis mollis tristique. Cras sit amet lorem sed justo dictum condimentum at ut arcu. Cras a scelerisque ante, vitae placerat elit. Morbi sapien ipsum, sollicitudin sed nisl sit amet, porttitor venenatis nunc.</p>\r\n\r\n<p>Suspendisse commodo elit vel dapibus bibendum. Aenean vestibulum, lorem sed dapibus tincidunt, nisi velit ultrices ipsum, ut ullamcorper neque orci id tellus. Quisque a arcu quis sapien gravida iaculis. Duis quis urna felis. Aliquam erat volutpat. Maecenas posuere sem eget elementum scelerisque. Suspendisse sollicitudin massa eget pretium convallis. Duis ut elit quis ligula aliquam porta ullamcorper rutrum est. Nam blandit pretium erat sit amet porta.</p>\r\n\r\n<p>Vivamus dictum eros ut tincidunt efficitur. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur et ipsum gravida, euismod ante in, consequat nunc. Aenean tempus hendrerit massa at porta. Morbi interdum porttitor purus eget feugiat. Quisque sit amet velit quis turpis suscipit interdum. Ut ac urna tortor. Praesent condimentum erat ac vulputate blandit. Aliquam facilisis sed enim eget luctus. In id purus eget erat molestie consequat ut vitae lacus. Donec vestibulum sem sed justo efficitur lacinia. In eget volutpat dolor. Pellentesque sodales tristique lacus sed varius.</p>\r\n\r\n<p>Donec cursus nulla a urna finibus porttitor. Aenean eget enim non arcu dictum sagittis vitae ut lorem. Nam interdum dictum lacinia. Vivamus nec tristique turpis, in laoreet libero. Vivamus blandit, erat id vehicula sodales, enim mauris sodales urna, vel fermentum lorem purus in eros. Nulla tincidunt ultricies lorem quis luctus. Duis eu velit in libero commodo pretium in sit amet odio. Aenean efficitur porttitor massa, eu porttitor dolor laoreet et. Integer rutrum non metus vel euismod. Nulla sit amet nibh ut lacus molestie egestas. Ut eget ultrices mi. Proin laoreet accumsan lorem tempor gravida. Curabitur scelerisque pellentesque magna, id accumsan ligula scelerisque in. Nunc consectetur lorem eget mauris lobortis, ac feugiat sem pellentesque. Nam cursus, erat non semper tincidunt, sapien nunc placerat odio, at tristique augue tortor eget nisl. Donec urna neque, aliquet ac ante ornare, sagittis scelerisque ligula.</p>\r\n\r\n<p>Nullam diam nulla, dignissim auctor dapibus at, consequat sed nibh. Aliquam erat volutpat. Aenean molestie, augue quis mollis congue, risus sem tempor lectus, eu ultricies lorem ante non nisl. Aenean elit dolor, pellentesque quis ipsum vitae, placerat congue neque. Proin aliquam sed lectus non consequat. Fusce bibendum nisl orci. Mauris id nisi eu turpis cursus tincidunt. Pellentesque varius metus a enim dapibus, condimentum convallis odio euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Suspendisse a risus ligula. Etiam id rutrum ipsum, porttitor cursus dui.</p>\r\n\r\n<p>Integer suscipit augue facilisis, laoreet est vitae, tristique nibh. Nunc dictum lobortis aliquet. Vivamus nec ultricies nisl. Integer sed semper tellus, ut rhoncus est. Cras ullamcorper, elit sit amet condimentum mollis, nisi diam cursus dui, ac sagittis lectus nisl eu dolor. Nunc pellentesque dui odio, porttitor ullamcorper lectus finibus eu. Duis dapibus nec erat suscipit cursus. Suspendisse potenti. Vivamus blandit at est sit amet lobortis. Pellentesque a gravida nisi. Nulla viverra commodo tellus, eget finibus justo elementum eget. Integer euismod ex dui, et ullamcorper purus pellentesque nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n\r\n<p>Donec condimentum hendrerit nibh, et maximus purus pretium eu. Vestibulum vel odio volutpat, tempor justo et, luctus eros. Maecenas vel cursus augue. Mauris ex nulla, eleifend ac sollicitudin eleifend, tincidunt vel ante. Curabitur egestas velit in tellus tincidunt, nec porta tellus aliquet. Nulla id eros ex. Mauris libero est, ultrices vel tincidunt in, tincidunt non arcu. Curabitur quis placerat orci. Ut gravida fringilla ipsum.</p>\r\n', 'Aq2PNBN_zz4', 'Tanıtım Günleri Müziği 🎵🎵', 'Biz Senenin Sonunda Hem PHP Hem De Flutter Çok İyi Öğrenecez', 'Vizyon Yolunda Yuotube ve Dızcı İle Devam...');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `icerik`
--

DROP TABLE IF EXISTS `icerik`;
CREATE TABLE IF NOT EXISTS `icerik` (
  `icerik_id` int NOT NULL AUTO_INCREMENT,
  `icerik_ad` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icerik_detay` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icerik_resimyol` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icerik_keyword` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icerik_zaman` datetime NOT NULL,
  `icerik_durum` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`icerik_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `icerik`
--

INSERT INTO `icerik` (`icerik_id`, `icerik_ad`, `icerik_detay`, `icerik_resimyol`, `icerik_keyword`, `icerik_zaman`, `icerik_durum`) VALUES
(24, 'LoL Nasıl Oynanır', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'dimg/icerik/25357397615013829603slide01.jpg', 'lorem,ipsum', '2022-10-23 07:56:30', '1'),
(21, 'NEWS', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 'dimg/icerik/21605517534852731920news01.jpg', 'php', '2022-10-21 20:00:00', '1'),
(22, 'Yeni News', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'dimg/icerik/25411461393506421624news02.png', 'php,html,css', '2022-10-22 10:00:00', '1'),
(25, 'HIMETECH SOFTWARE', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'dimg/icerik/31730315902079224119WhatsApp Image 2022-10-04 at 13.52.49.jpeg', 'himetech,software', '2022-10-24 07:57:38', '1'),
(26, 'NEWS', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 'dimg/icerik/21605517534852731920news01.jpg', 'php', '2022-10-25 20:00:00', '1'),
(27, 'Yeni News', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'dimg/icerik/25411461393506421624news02.png', 'php,html,css', '2022-10-26 10:00:00', '1'),
(28, 'LoL Nasıl Oynanır', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'dimg/icerik/25357397615013829603slide01.jpg', 'lorem,ipsum', '2022-10-27 07:56:30', '1'),
(29, 'Himetech Software', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>MErhaba</li>\r\n	<li>İsmo</li>\r\n	<li>AMi</li>\r\n	<li>Mami</li>\r\n	<li>Mistefa</li>\r\n	<li>Gami</li>\r\n</ul>\r\n', 'dimg/icerik/31730315902079224119WhatsApp Image 2022-10-04 at 13.52.49.jpeg', 'himetech,software', '2022-10-28 07:57:38', '1'),
(32, 'Merhaba Danemsi', '<p>Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;Merhaba Danemsi&nbsp;</p>\r\n', 'dimg/icerik/22699296213932131160maxresdefault.jpg', 'denem,merhaba', '2022-11-20 20:00:10', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

DROP TABLE IF EXISTS `iletisim`;
CREATE TABLE IF NOT EXISTS `iletisim` (
  `iletisim_id` int NOT NULL AUTO_INCREMENT,
  `iletisim_adsoyad` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iletisim_mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iletisim_telefon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iletisim_konu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iletisim_mesaj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iletisim_tarih` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iletisim_durum` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`iletisim_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`iletisim_id`, `iletisim_adsoyad`, `iletisim_mail`, `iletisim_telefon`, `iletisim_konu`, `iletisim_mesaj`, `iletisim_tarih`, `iletisim_durum`) VALUES
(3, 'deneme', 'deneem@deneme.com', '4545454545', 'deneme', 'deneme deneme deneme deneme deneme deneme deneme deneme deneme deneme deneme deneme ', '2022-10-30 19:21:56', 0),
(4, 'AASCA', 'CAC@csc.com', '6151515', 'sdvssv', 'acsdcsvsdvsvsvd', '2022-10-28 19:21:05', 0),
(5, 'AASCA', 'CAC@csc.com', '6151515', 'sdvssv', 'acsdcsvsdvsvsvd', '2022-10-28 19:21:05', 0),
(6, 'mami piçi', 'mami@mai.com', '4851515', 'csdvs', 'deneme masli', '2022-10-28 19:21:05', 0),
(7, 'mami piçi', 'mami@mai.com', '4851515', 'csdvs', 'deneme masli', '2022-10-28 19:21:05', 0),
(8, 'yusuf hasar', 'sanane@mail.com', '2626226', 'mail', 'mail deneme', '2022-10-28 19:21:05', 0),
(9, 'yusuf hasar', 'sanane@mail.com', '2626226', 'mail', 'mail deneme', '2022-10-28 19:21:05', 0),
(10, 'asas', 'asas@m.caom', '544545', 'acacac', 'acavavcava', '2022-10-28 19:21:05', 0),
(11, 'asas', 'asas@m.caom', '544545', 'acacac', 'acavavcava', '2022-10-28 19:21:05', 0),
(12, 'cvcvc', 'cvcvvccv@cvcv.com', '846211515', 'sdvsvsbvsd', 'svdvdfbdfbdf', '2022-10-28 19:21:05', 0),
(13, 'cvcvc', 'cvcvvccv@cvcv.com', '846211515', 'sdvsvsbvsd', 'svdvdfbdfbdf', '2022-10-29 19:21:05', 0),
(14, 'fff', 'ggg@jj.com', '84526596', 'ssssvsdv', 'gdgddhdgdghd', '2022-10-29 19:21:05', 0),
(15, 'merhaba', 'merhaab@mm.com', '26266262', 'csvsvsvs', 'merhaab', '2022-10-29 19:21:05', 0),
(16, 'deneme ', 'denem@deneme.com', '555443322', 'deneme', 'bu bir deneme maili', '2022-10-29 19:21:05', 0),
(17, 'ddmdmdm', 'mdmdm@ssd.com', '4451151541', 'acadcacca', 'sdvdsvdsvsvsvsv', '2022-10-29 19:21:05', 0),
(18, 'xcxcxcxc', 'xxc@xc.vcm', '48611515', 'csdvsvdv', 'dfbbdfbdfbdfbdfbdf', '2022-10-29 19:21:05', 0),
(19, 'yeni', 'yeni@yeni.com', '2622622', 'yeniyeni', 'yeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeniyeni', '2022-10-30 19:21:05', 0),
(20, 'index', 'index@a.com', '155151', 'sdcvvs', '51ac15sd1vsv51sv15v', '2022-10-30 19:22:39', 0),
(21, 'deneme', 'denem@de.com', '266226', 'acacac', 'acsvasdvsvsvs', '2022-10-30 19:27:45', 0),
(22, 'yenimail', 'yenimail@cd.com', '481525', 'a15c65cac', '6ac6c651cs6s', '2022-10-30 19:28:39', 1),
(23, 'bos', 'bos@as.com', '515115', 's165v 65s1', 's651v65v1sv16s5', '2022-10-30 19:29:29', 1),
(27, 'aaxaxaax', 'xaxaxa@ax.com', '51151', 'cds51cd15sdc', '6a5cs6dccsdv1ds56sv', '2022-11-30 20:54:01', 1),
(28, 'DENEME', 'DENEME@DENEM.COM', '2515115', '165SDC165S1SD1', '6854SADCSV1SD1VDVSVD65V6', '2022-11-30 20:55:35', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `kullanici_id` int NOT NULL AUTO_INCREMENT,
  `kullanici_zaman` datetime NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_yetki` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_resimyol` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_durum` int NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_ad`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_yetki`, `kullanici_resimyol`, `kullanici_durum`) VALUES
(1, '2022-11-28 18:52:02', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Yusuf Hasarasasa', '4', 'dimg/user/25678330203605122353admin.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_bilgi`
--

DROP TABLE IF EXISTS `kullanici_bilgi`;
CREATE TABLE IF NOT EXISTS `kullanici_bilgi` (
  `bilgi_id` int NOT NULL AUTO_INCREMENT,
  `bilgi_lokasyon` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bilgi_departman` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bilgi_site` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_id` int NOT NULL,
  PRIMARY KEY (`bilgi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kullanici_bilgi`
--

INSERT INTO `kullanici_bilgi` (`bilgi_id`, `bilgi_lokasyon`, `bilgi_departman`, `bilgi_site`, `kullanici_id`) VALUES
(1, 'İpekyolu / Van / Türkiye', 'Backend Developer', 'www.mytyazilim.com', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_proje`
--

DROP TABLE IF EXISTS `kullanici_proje`;
CREATE TABLE IF NOT EXISTS `kullanici_proje` (
  `proje_id` int NOT NULL AUTO_INCREMENT,
  `proje_ad` varchar(26) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `proje_sirket` varchar(26) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `proje_saati` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `proje_katkipayi` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_id` int NOT NULL,
  PRIMARY KEY (`proje_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kullanici_proje`
--

INSERT INTO `kullanici_proje` (`proje_id`, `proje_ad`, `proje_sirket`, `proje_saati`, `proje_katkipayi`, `kullanici_id`) VALUES
(1, 'Merhaba', 'Merhaba', '12', '20', 1),
(2, 'Habe Uygulaması', 'HIMETEH SOFWARE', '18', '62', 1),
(14, 'Flütter', 'Yasin Bek', '20', '80', 1),
(13, 'proje', 'proje', '12', '56', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_yetenek`
--

DROP TABLE IF EXISTS `kullanici_yetenek`;
CREATE TABLE IF NOT EXISTS `kullanici_yetenek` (
  `yetenek_id` int NOT NULL AUTO_INCREMENT,
  `yetenek_ad` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `yetenek_seviyesi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_id` int NOT NULL,
  PRIMARY KEY (`yetenek_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kullanici_yetenek`
--

INSERT INTO `kullanici_yetenek` (`yetenek_id`, `yetenek_ad`, `yetenek_seviyesi`, `kullanici_id`) VALUES
(1, 'PHP', '60', 1),
(2, 'Python', '40', 1),
(3, 'Flutter', '10', 1),
(21, 'MySQL', '56', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `kategori_id` int NOT NULL,
  `menu_ust` int NOT NULL,
  `menu_icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_ad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_detay` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_sira` int NOT NULL,
  `menu_durum` int NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `kategori_id`, `menu_ust`, `menu_icon`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`) VALUES
(1, 0, 0, 'fa-home', 'Anasayfa', '', 'index', 1, 1),
(3, 0, 0, '', 'Hakkımızda', '', 'about', 3, 1),
(8, 0, 0, '', 'İletişim', '', 'contact', 9, 1),
(10, 0, 5, '', 'Van Haberleri', '<p>Van haberleri burda g&ouml;r&uuml;necek..</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '', 0, 1),
(5, 0, 0, '', 'Haberler', '', 'news', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int NOT NULL AUTO_INCREMENT,
  `slider_ad` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_resimyol` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_link` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_sira` int NOT NULL,
  `slider_durum` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_link`, `slider_sira`, `slider_durum`) VALUES
(13, 'resim4', 'dimg/slider/25202498073678524325slider04.jpg', 'urlsasa', 3, '1'),
(10, 'resim1', 'dimg/slider/28055303774938022070slider01.jpg', 'qq', 0, '0'),
(11, 'resim2', 'dimg/slider/29927356032459021750slider02.jpg', 'qq', 1, '0'),
(12, 'resim3', 'dimg/slider/24986264994005128107slider03.jpg', 'qwsa', 2, '1'),
(16, 'resim5', 'dimg/slider/20437337063107829777slider05.jpg', 'aa', 4, '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
