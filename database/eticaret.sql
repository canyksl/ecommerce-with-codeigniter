-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Ara 2020, 21:41:05
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(250) NOT NULL,
  `name` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `name`, `mail`, `image`, `sifre`) VALUES
(1, 'admin', 'admin@admin.com', 'assets/upload/admin/can.png', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `topcategory` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `topcategory`, `name`, `slug`) VALUES
(1, '2', 'Gömlek', 'gomlek'),
(2, '1', 'Aksesuar', 'aksesuar'),
(3, '2', 'Gömlekkk', 'gomlekkk'),
(5, '1', 'Pantolon', 'pantolon');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `config`
--

CREATE TABLE `config` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `config`
--

INSERT INTO `config` (`id`, `title`, `logo`, `icon`, `info`, `mail`, `telefon`, `facebook`, `instagram`, `twitter`, `youtube`) VALUES
(8, 'E Ticaret Projesi update', 'assets/upload/config/logo-örnekleri-1032.png', 'assets/upload/config/online-shopping.png', 'Bu bir codeigniter eticaret projesidir. update', 'info@eticaret.com', '+90-999-999-99-99 update', 'www.facebook.com', 'www.instagram.com/', 'www.twitter.com', 'www.youtube.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `product` int(255) NOT NULL,
  `path` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `master` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `product`, `path`, `master`) VALUES
(1, 29, 'assets/upload/products/can.png', 0),
(2, 30, 'assets/upload/products/316898-P8VCZN-272.jpg', 0),
(3, 30, 'assets/upload/products/443175-PEL25D-827.jpg', 0),
(4, 31, 'assets/upload/products/WhatsApp_Image_2020-06-21_at_03_11_27.jpeg', 0),
(5, 32, 'assets/upload/products/magazakayit.jpg', 0),
(18, 42, 'assets/upload/products/jean-yirtmacli-pantolon42.png', 0),
(19, 42, 'assets/upload/products/jean-yirtmacli-pantolon42.jpg', 0),
(20, 42, 'assets/upload/products/jean-yirtmacli-pantolon421.png', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `options`
--

CREATE TABLE `options` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `options`
--

INSERT INTO `options` (`id`, `name`, `slug`) VALUES
(3, 'Renkler', 'renkler'),
(4, 'Beden', 'beden');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `category` int(255) NOT NULL,
  `subcategory` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` longtext COLLATE utf8_turkish_ci NOT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `complete` int(1) NOT NULL DEFAULT 0,
  `active` int(1) NOT NULL DEFAULT 0,
  `qrcode` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`id`, `category`, `subcategory`, `title`, `description`, `price`, `discount`, `tag`, `seo`, `complete`, `active`, `qrcode`, `date`) VALUES
(42, 1, 5, 'Jean Yırtmaçlı Pantolon', 'jean Pantolon', 57.99, 58.99, 'Jean,Pantolon,Yırtık', 'jean-yirtmacli-pantolon', 1, 0, 'assets/upload/qrcode/urun42.png', '2020-12-05 12:04:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stocks`
--

CREATE TABLE `stocks` (
  `id` int(255) NOT NULL,
  `product` int(255) NOT NULL,
  `suboption` int(255) DEFAULT NULL,
  `suboption2` int(255) DEFAULT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stocks`
--

INSERT INTO `stocks` (`id`, `product`, `suboption`, `suboption2`, `stock`) VALUES
(16, 42, 11, 9, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stocktype`
--

CREATE TABLE `stocktype` (
  `id` int(255) NOT NULL,
  `product` int(255) NOT NULL,
  `options` int(255) NOT NULL,
  `options2` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stocktype`
--

INSERT INTO `stocktype` (`id`, `product`, `options`, `options2`) VALUES
(22, 42, 3, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `suboptions`
--

CREATE TABLE `suboptions` (
  `id` int(255) NOT NULL,
  `option_id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `suboptions`
--

INSERT INTO `suboptions` (`id`, `option_id`, `name`, `slug`) VALUES
(3, 3, 'Beyaz', 'beyaz'),
(7, 4, 'S', 's'),
(8, 4, 'M', 'm'),
(9, 4, 'L', 'l'),
(10, 4, 'XL', 'xl'),
(11, 3, 'Siyah', 'siyah');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stocktype`
--
ALTER TABLE `stocktype`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `suboptions`
--
ALTER TABLE `suboptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_id` (`option_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `config`
--
ALTER TABLE `config`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `options`
--
ALTER TABLE `options`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `stocktype`
--
ALTER TABLE `stocktype`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `suboptions`
--
ALTER TABLE `suboptions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `suboptions`
--
ALTER TABLE `suboptions`
  ADD CONSTRAINT `suboptions_ibfk_1` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
