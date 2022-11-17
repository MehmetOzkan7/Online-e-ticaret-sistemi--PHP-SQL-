-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 May 2022, 20:06:23
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adres`
--

CREATE TABLE `adres` (
  `id` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `adres` longtext NOT NULL,
  `postakodu` varchar(255) NOT NULL,
  `sehir` varchar(255) NOT NULL,
  `ulke` varchar(255) NOT NULL,
  `sirket` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `adres`
--

INSERT INTO `adres` (`id`, `kullanici`, `adres`, `postakodu`, `sehir`, `ulke`, `sirket`) VALUES
(1, 1, 'nasırhadeler han no 44 ', '34300', 'eminönü', 'istanbul', 'yıldızlar Kollektif');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alisveris`
--

CREATE TABLE `alisveris` (
  `id` int(11) NOT NULL,
  `tarih` datetime NOT NULL,
  `kullanici` int(11) NOT NULL,
  `tutar` decimal(11,2) NOT NULL,
  `no` varchar(255) NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `alisveris`
--

INSERT INTO `alisveris` (`id`, `tarih`, `kullanici`, `tutar`, `no`, `durum`) VALUES
(1, '2022-05-23 00:45:42', 1, '159.90', '83n1555', 1),
(2, '2022-05-23 17:49:09', 1, '64.90', 'rbt1562', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fatura`
--

CREATE TABLE `fatura` (
  `id` int(11) NOT NULL,
  `no` varchar(255) NOT NULL,
  `tedarikci` int(11) NOT NULL,
  `toplam` decimal(11,2) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `fatura`
--

INSERT INTO `fatura` (`id`, `no`, `tedarikci`, `toplam`, `tarih`) VALUES
(1, 'Kl32556', 1, '14023.31', '2022-05-17'),
(2, 'GY87452', 2, '3329.10', '2022-05-04'),
(3, 'Cd654365', 3, '11379.60', '2022-05-14'),
(4, 'Gh548566', 2, '3231.00', '2022-04-10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fatura_detay`
--

CREATE TABLE `fatura_detay` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `urun` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `fiyat` decimal(11,2) NOT NULL,
  `tplm` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `fatura_detay`
--

INSERT INTO `fatura_detay` (`id`, `no`, `urun`, `adet`, `fiyat`, `tplm`) VALUES
(2, 2, 1, 45, '11.35', '510.75'),
(3, 2, 2, 60, '3.25', '195.00'),
(4, 2, 3, 35, '12.25', '428.75'),
(5, 2, 4, 10, '3.75', '37.50'),
(6, 2, 5, 10, '3.75', '37.50'),
(7, 2, 10, 6, '25.00', '150.00'),
(8, 2, 11, 5, '69.10', '345.50'),
(9, 2, 12, 10, '61.25', '612.50'),
(10, 2, 6, 12, '28.05', '336.60'),
(11, 2, 7, 15, '45.00', '675.00'),
(12, 3, 8, 10, '10.95', '109.50'),
(13, 3, 9, 25, '8.25', '206.25'),
(14, 3, 13, 25, '110.00', '2750.00'),
(15, 3, 14, 22, '39.00', '858.00'),
(16, 3, 15, 55, '38.00', '2090.00'),
(17, 3, 16, 50, '37.90', '1895.00'),
(18, 3, 23, 35, '52.35', '1832.25'),
(19, 3, 24, 32, '27.65', '884.80'),
(20, 3, 25, 15, '9.80', '147.00'),
(21, 3, 26, 41, '14.80', '606.80'),
(22, 1, 27, 15, '9.25', '138.75'),
(23, 1, 28, 15, '45.00', '675.00'),
(24, 1, 36, 50, '21.15', '1057.50'),
(25, 1, 37, 32, '20.15', '644.80'),
(26, 1, 38, 22, '18.50', '407.00'),
(27, 1, 39, 35, '9.25', '323.75'),
(28, 1, 17, 22, '194.50', '4279.00'),
(29, 1, 18, 18, '81.15', '1460.70'),
(30, 1, 19, 16, '111.56', '1784.96'),
(31, 1, 20, 21, '154.85', '3251.85'),
(32, 4, 21, 14, '45.25', '633.50'),
(33, 4, 22, 14, '102.65', '1437.10'),
(34, 4, 29, 15, '8.65', '129.75'),
(35, 4, 30, 15, '8.65', '129.75'),
(36, 4, 31, 22, '12.15', '267.30'),
(37, 4, 32, 17, '12.15', '206.55'),
(38, 4, 33, 16, '6.45', '103.20'),
(39, 4, 34, 22, '8.55', '188.10'),
(40, 4, 35, 15, '9.05', '135.75');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) NOT NULL,
  `bag` int(11) NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `adi`, `bag`, `durum`) VALUES
(1, 'Süt Ürünleri', 0, 1),
(2, 'Yoğurt', 1, 1),
(3, 'Peynir', 1, 1),
(4, 'Süt', 1, 1),
(5, 'TereYağ', 1, 1),
(6, 'Temel Gıda', 0, 1),
(7, 'Sıvı Yağ', 6, 1),
(8, 'Bakliyat', 6, 1),
(9, 'Şeker', 6, 1),
(10, 'Makarna', 6, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `soyad` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  `yetki` int(11) NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `isim`, `soyad`, `mail`, `sifre`, `tel`, `tarih`, `ip`, `yetki`, `durum`) VALUES
(1, 'oguz', 'güralp', 'deneme@hotmail.com', '12345', '0215588922', '2022-05-17 07:48:08', '::1', 1, 1),
(2, 'admin', 'Panel', 'admin@panel.com', '12345', '0215588922', '2022-05-17 07:48:08', '::1', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemeler`
--

CREATE TABLE `odemeler` (
  `id` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `miktar` decimal(11,2) NOT NULL,
  `tur` int(11) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `odemeler`
--

INSERT INTO `odemeler` (`id`, `kullanici`, `miktar`, `tur`, `tarih`) VALUES
(1, 1, '14000.00', 1, '2022-05-09'),
(2, 2, '3000.00', 1, '2022-05-22'),
(3, 2, '5000.00', 1, '2022-05-22'),
(4, 1, '700.00', 2, '2022-05-09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemetur`
--

CREATE TABLE `odemetur` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `odemetur`
--

INSERT INTO `odemetur` (`id`, `adi`) VALUES
(1, 'Tedarikci Ödemesi'),
(2, 'Müşteri Ödemesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `id` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `urun` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `fiyat` decimal(11,2) NOT NULL,
  `toplam` decimal(11,2) NOT NULL,
  `durum` int(11) NOT NULL,
  `alverno` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`id`, `kullanici`, `urun`, `adet`, `fiyat`, `toplam`, `durum`, `alverno`) VALUES
(17, 1, 9, 1, '14.95', '14.95', 1, 'rbt1562'),
(18, 1, 7, 1, '49.95', '49.95', 1, 'rbt1562'),
(15, 1, 20, 1, '159.90', '159.90', 1, '83n1555');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tedarikci`
--

CREATE TABLE `tedarikci` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) NOT NULL,
  `yetkili` varchar(255) NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tedarikci`
--

INSERT INTO `tedarikci` (`id`, `adi`, `yetkili`, `durum`) VALUES
(1, 'Kardeşler Gıda Dağıtım', 'Mustafa Alkaevli', 1),
(2, 'Tomris Gıda', 'Atilla Sungur ', 1),
(3, 'Yıldızlar Toptancılık', 'Emin Süreyya', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uretici`
--

CREATE TABLE `uretici` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uretici`
--

INSERT INTO `uretici` (`id`, `adi`, `durum`) VALUES
(1, 'Sek', 1),
(2, 'Pınar', 1),
(3, 'Danone ', 1),
(4, 'Nestle', 1),
(5, 'Yudum', 1),
(6, 'Komili', 1),
(7, 'Tariş', 1),
(8, 'Yayla', 1),
(9, 'Duru Bulgur', 1),
(10, 'Pastavilla', 1),
(11, 'Barilla', 1),
(12, 'Filiz', 1),
(13, 'Irmak', 1),
(14, 'Dr.Oetker', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `id` int(11) NOT NULL,
  `kod` varchar(255) NOT NULL,
  `urunadi` varchar(255) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `kategori` int(11) NOT NULL,
  `altkategori` int(11) NOT NULL,
  `uretici` int(11) NOT NULL,
  `alisfiyat` decimal(11,2) NOT NULL,
  `satisfiyat` decimal(11,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `detay` longtext NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`id`, `kod`, `urunadi`, `resim`, `kategori`, `altkategori`, `uretici`, `alisfiyat`, `satisfiyat`, `stok`, `detay`, `durum`) VALUES
(1, 'ST001', 'Sek Süt 1 Lt', '220945051744jexd.jpeg', 1, 4, 1, '11.35', '13.95', 45, '', 1),
(2, 'St002', 'Danone Disney Kakaolu Süt 180 Ml', '220947051707cnxg.jpeg', 1, 4, 3, '3.25', '4.53', 60, '', 1),
(3, 'St003', 'Pınar Süt 1 L', '220948051729350b.jpeg', 1, 4, 2, '12.25', '14.95', 35, '', 1),
(4, 'St004', 'Nesquik Çilek Aromalı Süt 180 Ml', '2209550517148c9g.jpeg', 1, 4, 4, '3.75', '4.50', 10, '', 1),
(5, 'St005', 'Nesquik Muz Aromalı Süt 180 Ml', '220956051756d7bg.jpeg', 1, 4, 4, '3.75', '4.50', 10, '', 1),
(6, 'StY001', 'Pınar Organik Yoğurt 1000 G', '220959051705as63.jpeg', 1, 2, 2, '28.05', '30.95', 12, '', 1),
(7, 'StY002', 'Pınar Yoğurt 2 Kg', '2210000517193hn7.jpeg', 1, 2, 2, '45.00', '49.95', 14, '', 1),
(8, 'StY003', 'Sek Çiftlik Kaymaksız Yoğurt 450 G', '221001051744f2si.jpeg', 1, 2, 1, '10.95', '11.95', 10, '', 1),
(9, 'StY004', 'Danone Çilekli Yoğurt 450 G', '221002051755758o.jpeg', 1, 2, 3, '8.25', '14.95', 24, '', 1),
(10, 'Stp001', 'Pınar Süzme Peynir 500 G', '221006051748jtry.jpeg', 1, 3, 2, '25.00', '27.95', 6, '', 1),
(11, 'Stp002', 'Sek Tam Yağlı Taze Kaşar Peyniri 600 G', '2210070517400d41.jpeg', 1, 3, 1, '69.10', '72.50', 5, '', 1),
(12, 'Stp003', 'Sek Tam Yağlı Beyaz Peynir 800 G', '22100805175275sc.jpeg', 1, 3, 1, '61.25', '65.50', 10, '', 1),
(13, 'Styg001', 'Pınar Tereyağı 1 Kg', '221012051709n28t.jpeg', 1, 5, 2, '110.00', '113.90', 25, '', 1),
(14, 'Styg002', 'Pınar Geleneksel Tuzsuz Tereyağı 200 G', '2210140517069sr2.jpeg', 1, 5, 2, '39.00', '41.50', 22, '', 1),
(15, 'Styg003', 'Sek Köy Tereyağı 225 G', '221015051742c485.jpeg', 1, 5, 1, '38.00', '41.95', 55, '', 1),
(16, 'Styg004', 'Sek Paket Tereyağı 250 G', '221016051739al19.jpeg', 1, 5, 1, '37.90', '41.50', 50, '', 1),
(17, 'TgYd001', 'Tariş Güney Ege Sızma Zeytinyağı 2 L', '221029051739nwpx.jpeg', 6, 7, 7, '194.50', '196.90', 22, '', 1),
(18, 'TgYd002', 'Tariş Naturel Sızma Zeytinyağı 750 Ml', '2210300517307h40.jpeg', 6, 7, 7, '81.15', '83.50', 18, '', 1),
(19, 'TgYd003', 'Yudum Egemden Riviera Zeytinyağı 2 L', '221031051726yh97.jpeg', 6, 7, 5, '111.56', '114.90', 16, '', 1),
(20, 'TgYd004', 'Komili Ayçiçek Yağı 4L', '221032051756rnl3.jpeg', 6, 7, 6, '154.85', '159.90', 21, '', 1),
(21, 'TgYd005', 'Komili Ayçiçek Yağı 1L', '221033051743uybk.jpeg', 6, 7, 6, '45.25', '49.90', 14, '', 1),
(22, 'TgYd006', 'Yudum Ayçiçek Yağı 3 Lt.', '221035051706kayb.jpeg', 6, 7, 5, '102.65', '109.90', 14, '', 1),
(23, 'TgBk001', 'Yayla Baldo Pirinç 2 Kg Gönen Bölgesi Mahsulü', '221039051722gp9k.jpeg', 6, 8, 8, '52.35', '54.90', 35, '', 1),
(24, 'TgBk002', 'Yayla Kırmızı Mercimek 1 Kg', '221041051730lyen.jpeg', 6, 8, 8, '27.65', '29.90', 32, '', 1),
(25, 'TgBk003', 'Yayla Gurme Fit Kırmızı Kinoalı Bulgur 360 G', '2210420517188zgy.jpeg', 6, 8, 8, '9.80', '11.59', 15, '', 1),
(26, 'TgBk004', 'Duru Başbaşı Bulgur 1 Kg', '221043051753xk0d.jpeg', 6, 8, 9, '14.80', '16.65', 41, '', 1),
(27, 'TgBk005', 'Duru Dual Firikli Pilavlık Bulgur 250 G', '2210450517496mx3.jpeg', 6, 8, 9, '9.25', '10.19', 15, '', 1),
(28, 'TgBk006', 'Duru Karabuğday ( Greçka ) 1 Kg', '221046051740kj6o.jpeg', 6, 8, 9, '45.00', '47.50', 15, '', 1),
(29, 'YgMk001', 'Pastavilla Spaghetti Makarna 500 G', '221049051704eohn.jpeg', 6, 10, 10, '8.65', '9.90', 15, '', 1),
(30, 'YgMk002', 'Pastavilla Burgu Makarna 500 G', '221050051702jlgs.jpeg', 6, 10, 10, '8.65', '9.90', 15, '', 1),
(31, 'YgMk003', 'Barilla Fusilli (Burgu) Makarna 500 G', '221051051746xg5u.jpeg', 6, 10, 11, '12.15', '11.75', 22, '', 1),
(32, 'YgMk004', 'Barilla Linguine (Yassı) Spagetti Makarna', '221052051757rc2g.jpeg', 6, 10, 11, '12.15', '11.75', 17, '', 1),
(33, 'YgMk005', 'Filiz Fiyonk Makarna 500 G', '221054051710pc3l.jpeg', 6, 10, 12, '6.45', '7.90', 16, '', 1),
(34, 'YgMk006', 'Filiz Sebzeli Burgu Makarna 350 G', '221055051747bs7t.jpeg', 6, 10, 12, '8.55', '9.90', 22, '', 1),
(35, 'YgMk007', 'Filiz Yumurtalı Bukle Makarna 350 G', '221056051735cti7.jpeg', 6, 10, 12, '9.05', '10.90', 15, '', 1),
(36, 'TgSk001', 'Irmak Küp Şeker 1 Kg', '2210580517472cgf.jpeg', 6, 9, 13, '21.15', '23.90', 50, '', 1),
(37, 'TgSk002', 'Irmak Toz Şeker 1 Kg', '221059051750c8wj.jpeg', 6, 9, 13, '20.15', '22.90', 32, '', 1),
(38, 'TgSk003', 'Irmak Küp Şeker 750 G', '221101051742u16v.jpeg', 6, 9, 13, '18.50', '19.90', 22, '', 1),
(39, 'TgSk004', 'Dr.Oetker Pudra Şekeri 250 G', '221102051742i413.jpeg', 6, 9, 14, '9.25', '10.98', 35, '', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `alisveris`
--
ALTER TABLE `alisveris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `fatura_detay`
--
ALTER TABLE `fatura_detay`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odemeler`
--
ALTER TABLE `odemeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odemetur`
--
ALTER TABLE `odemetur`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tedarikci`
--
ALTER TABLE `tedarikci`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uretici`
--
ALTER TABLE `uretici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adres`
--
ALTER TABLE `adres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `alisveris`
--
ALTER TABLE `alisveris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `fatura_detay`
--
ALTER TABLE `fatura_detay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `odemeler`
--
ALTER TABLE `odemeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `odemetur`
--
ALTER TABLE `odemetur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `tedarikci`
--
ALTER TABLE `tedarikci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `uretici`
--
ALTER TABLE `uretici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
