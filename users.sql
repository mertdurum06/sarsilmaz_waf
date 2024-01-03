-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Oca 2024, 13:47:54
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `arama`
--
CREATE DATABASE IF NOT EXISTS `arama` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `arama`;
--
-- Veritabanı: `dvwa`
--
CREATE DATABASE IF NOT EXISTS `dvwa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dvwa`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `guestbook`
--

CREATE TABLE `guestbook` (
  `comment_id` smallint(5) UNSIGNED NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `guestbook`
--

INSERT INTO `guestbook` (`comment_id`, `comment`, `name`) VALUES
(1, '&lt;/div&gt;&lt;scirpt&gt;alert(6)&lt;/script&gt;', 'a'),
(2, 'gt', 'a'),
(3, '%3Cscript%3E', 'a'),
(4, '</div><scirpt>alert(6)</script>', 'a'),
(5, '</div><script>alert(6)</script>', 'a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `user` varchar(15) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `avatar` varchar(70) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `failed_login` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user`, `password`, `avatar`, `last_login`, `failed_login`) VALUES
(1, 'admin', 'admin', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '/LAB/hackable/users/admin.jpg', '2023-03-02 19:56:56', 0),
(2, 'Gordon', 'Brown', 'gordonb', 'e99a18c428cb38d5f260853678922e03', '/LAB/hackable/users/gordonb.jpg', '2023-03-02 19:56:56', 0),
(3, 'Hack', 'Me', '1337', '8d3533d75ae2c3966d7e0d4fcc69216b', '/LAB/hackable/users/1337.jpg', '2023-03-02 19:56:56', 0),
(4, 'Pablo', 'Picasso', 'pablo', '0d107d09f5bbe40cade3de5c71e9e9b7', '/LAB/hackable/users/pablo.jpg', '2023-03-02 19:56:56', 0),
(5, 'Bob', 'Smith', 'smithy', '5f4dcc3b5aa765d61d8327deb882cf99', '/LAB/hackable/users/smithy.jpg', '2023-03-02 19:56:56', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `comment_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Veritabanı: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Tablo döküm verisi `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"users\",\"table\":\"user\"},{\"db\":\"users\",\"table\":\"haberler\"},{\"db\":\"users\",\"table\":\"duyurular\"},{\"db\":\"asadasd\",\"table\":\"telefon_kayit\"},{\"db\":\"telefon_kayit\",\"table\":\"telefon_servis\"},{\"db\":\"telefon_kayit\",\"table\":\"telefon_kayit\"},{\"db\":\"telefon_kayit\",\"table\":\"sat\\u0131s\"},{\"db\":\"telefon_kayit\",\"table\":\"Telefon_kayit\"},{\"db\":\"tv\",\"table\":\"film_tablosu\"},{\"db\":\"tv\",\"table\":\"biletler\"}]');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Tablo döküm verisi `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'telefon_kayit', 'telefon_kayit', '{\"sorted_col\":\"`telefon_kayit`.`id` ASC\"}', '2023-05-24 20:00:24'),
('root', 'telefon_kayit', 'telefon_servis', '{\"sorted_col\":\"`telefon_servis`.`Servis \\u0130\\u015flemi` ASC\"}', '2023-06-07 10:48:26'),
('root', 'users', 'haberler', '{\"sorted_col\":\"`haberler`.`gorsel` DESC\"}', '2023-10-18 16:12:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Tablo döküm verisi `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-01-03 12:47:23', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"tr\",\"NavigationWidth\":0}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Tablo için indeksler `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Tablo için indeksler `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Tablo için indeksler `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Tablo için indeksler `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Tablo için indeksler `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Tablo için indeksler `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Tablo için indeksler `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Tablo için indeksler `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Tablo için indeksler `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Tablo için indeksler `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Tablo için indeksler `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Tablo için indeksler `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Tablo için indeksler `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Tablo için indeksler `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Tablo için indeksler `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Tablo için indeksler `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Tablo için indeksler `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Veritabanı: `telefon_kayit`
--
CREATE DATABASE IF NOT EXISTS `telefon_kayit` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `telefon_kayit`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satıs`
--

CREATE TABLE `satıs` (
  `İd` int(11) NOT NULL,
  `Ad` varchar(25) NOT NULL,
  `Soyad` varchar(25) NOT NULL,
  `Adres` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `satıs`
--

INSERT INTO `satıs` (`İd`, `Ad`, `Soyad`, `Adres`) VALUES
(1, 'Furkan', 'Durum', 'kuscagız mah...'),
(3, 'Furkan', 'Durum', 'kuscagız mah...');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `telefon_kayit`
--

CREATE TABLE `telefon_kayit` (
  `id` int(11) NOT NULL,
  `Marka` varchar(25) NOT NULL,
  `Model` varchar(25) NOT NULL,
  `Renk` varchar(25) NOT NULL,
  `Fiyat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `telefon_kayit`
--

INSERT INTO `telefon_kayit` (`id`, `Marka`, `Model`, `Renk`, `Fiyat`) VALUES
(1, 'Samsung', 'A70', 'Siyah', 35000),
(3, 'Samsung', 'A70', 'Siyah', 35000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `telefon_servis`
--

CREATE TABLE `telefon_servis` (
  `İd` int(11) NOT NULL,
  `Garanti` varchar(5) NOT NULL,
  `servis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `telefon_servis`
--

INSERT INTO `telefon_servis` (`İd`, `Garanti`, `servis`) VALUES
(1, 'Var', 'Görmedi'),
(3, 'Var', 'Görmedi');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `satıs`
--
ALTER TABLE `satıs`
  ADD PRIMARY KEY (`İd`);

--
-- Tablo için indeksler `telefon_kayit`
--
ALTER TABLE `telefon_kayit`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `telefon_servis`
--
ALTER TABLE `telefon_servis`
  ADD PRIMARY KEY (`İd`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `satıs`
--
ALTER TABLE `satıs`
  MODIFY `İd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `telefon_kayit`
--
ALTER TABLE `telefon_kayit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `telefon_servis`
--
ALTER TABLE `telefon_servis`
  MODIFY `İd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Veritabanı: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Veritabanı: `tv`
--
CREATE DATABASE IF NOT EXISTS `tv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tv`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_dizileri`
--

CREATE TABLE `admin_dizileri` (
  `id` int(11) NOT NULL,
  `dizi_adi` varchar(50) NOT NULL,
  `dizi_bolum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin_dizileri`
--

INSERT INTO `admin_dizileri` (`id`, `dizi_adi`, `dizi_bolum`) VALUES
(1, 'Kurtlar Vadisi', '97'),
(2, 'Behzat Ç.', '105'),
(3, 'Breaking Bad', '62'),
(4, 'Game of Thrones', '73'),
(5, 'Leyla İle Mecnun', '104');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_tablo`
--

CREATE TABLE `admin_tablo` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `kullanici_sifre` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin_tablo`
--

INSERT INTO `admin_tablo` (`id`, `kullanici_adi`, `kullanici_sifre`, `e_mail`) VALUES
(1, 'admin', 'secret', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `biletler`
--

CREATE TABLE `biletler` (
  `id` int(11) NOT NULL,
  `bilet_no` varchar(50) NOT NULL,
  `bilet_fiyat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `biletler`
--

INSERT INTO `biletler` (`id`, `bilet_no`, `bilet_fiyat`) VALUES
(1, '6411', '55'),
(2, '4062', '35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_tablosu`
--

CREATE TABLE `film_tablosu` (
  `id` int(11) NOT NULL,
  `film_adi` varchar(50) NOT NULL,
  `film_saati` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `film_tablosu`
--

INSERT INTO `film_tablosu` (`id`, `film_adi`, `film_saati`) VALUES
(1, 'The Shawshank Redemption(Esaretin Bedeli)', '13.00'),
(3, 'The Dark Knight(Kara Şovalye)', '14.00'),
(4, 'Fight Clup(Dövüş Kulübü)', '15.00'),
(5, 'Pulp Fiction(Ucuz Roman)', '16.00'),
(6, 'The Matrix(Matrix)', '17.00'),
(7, 'Interstellar(Yıldızlararası)', '18.00'),
(8, 'Kİll Bill Volume 1(Billi Öldür Bölüm1)', '19.00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kart_bilgileri`
--

CREATE TABLE `kart_bilgileri` (
  `id` int(11) NOT NULL,
  `kart_no` varchar(50) NOT NULL,
  `skt` varchar(50) NOT NULL,
  `cvv` varchar(50) NOT NULL,
  `ad_soyad` varchar(50) NOT NULL,
  `bagis_miktari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kart_bilgileri`
--

INSERT INTO `kart_bilgileri` (`id`, `kart_no`, `skt`, `cvv`, `ad_soyad`, `bagis_miktari`) VALUES
(1, '4563 1236 7896 7854 ', '12/28', '142', 'FAZIL ERDOĞAN', '60'),
(2, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_sifre_ad`
--

CREATE TABLE `kullanici_sifre_ad` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `kullanici_sifre` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanici_sifre_ad`
--

INSERT INTO `kullanici_sifre_ad` (`id`, `kullanici_adi`, `kullanici_sifre`, `e_mail`) VALUES
(1, 'fazil', '06fazil', 'fazil@gmail.com'),
(3, 'polatalemdar', 'elif', 'polat@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `topon_dizi`
--

CREATE TABLE `topon_dizi` (
  `id` int(11) NOT NULL,
  `dizi_adi` varchar(50) NOT NULL,
  `dizi_sezon` varchar(50) NOT NULL,
  `dizi_bolum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `topon_dizi`
--

INSERT INTO `topon_dizi` (`id`, `dizi_adi`, `dizi_sezon`, `dizi_bolum`) VALUES
(1, 'Breaking Bad', '5', '62'),
(2, 'Band OF Brothers', '1', '10'),
(3, 'Chernobyl', '1', '5'),
(4, 'The Wire', '5', '60'),
(5, 'The Sopranos', '6', '86'),
(6, 'Game Of Thrones', '8', '73'),
(7, 'Sherlock', '4', '12'),
(8, 'The Twilight Zone', '2', '37'),
(9, 'Firefly', '1', '14'),
(10, 'The Office', '9', '201');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tv_favori_tablosu`
--

CREATE TABLE `tv_favori_tablosu` (
  `id` int(11) NOT NULL,
  `film_adi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `tv_favori_tablosu`
--

INSERT INTO `tv_favori_tablosu` (`id`, `film_adi`) VALUES
(1, 'Yeşil Yol');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_dizileri`
--
ALTER TABLE `admin_dizileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `admin_tablo`
--
ALTER TABLE `admin_tablo`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `biletler`
--
ALTER TABLE `biletler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `film_tablosu`
--
ALTER TABLE `film_tablosu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kart_bilgileri`
--
ALTER TABLE `kart_bilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici_sifre_ad`
--
ALTER TABLE `kullanici_sifre_ad`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `topon_dizi`
--
ALTER TABLE `topon_dizi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tv_favori_tablosu`
--
ALTER TABLE `tv_favori_tablosu`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_dizileri`
--
ALTER TABLE `admin_dizileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `admin_tablo`
--
ALTER TABLE `admin_tablo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `biletler`
--
ALTER TABLE `biletler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `film_tablosu`
--
ALTER TABLE `film_tablosu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `kart_bilgileri`
--
ALTER TABLE `kart_bilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_sifre_ad`
--
ALTER TABLE `kullanici_sifre_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `topon_dizi`
--
ALTER TABLE `topon_dizi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `tv_favori_tablosu`
--
ALTER TABLE `tv_favori_tablosu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Veritabanı: `users`
--
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `aciklama` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`id`, `baslik`, `aciklama`, `link`) VALUES
(1, 'Ceh ', 'Ceh Eğitimimiz Çok Yakında...', '#'),
(2, 'CTF', 'Ctf Yarışmamız Çok Yakında...', '#'),
(3, 'KTO', 'SA', '#');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE `haberler` (
  `id` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `aciklama` text NOT NULL,
  `gorsel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `baslik`, `aciklama`, `gorsel`) VALUES
(1, 'İkili Doğrulama', 'Siber dolandırıcılar çeşitli yöntemlerle veri güvenliğini tehdit ederken vatandaşların özellikle internet sitelerinde \"farklı parolalar\" kullanması ve \"ikili doğrulama\" uygulamalarından yararlanması muhtemel dolandırıcılıklara kalkan görevi görüyor.', 'https://trthaberstatic.cdn.wp.trt.com.tr/resimler/1946000/siber-zorbalik-siber-suclar-1946764.jpg'),
(15, 'Nato,Ibm İş Birliği', 'NATO İletişim ve Bilgi Ajansı (NCI Agency) ile IBM Consulting  kurumun ağlarındaki siber güvenlik görünürlüğünü ve varlık yönetimini iyileştirmeye yönelik bir sözleşme imzaladı.', 'https://siberbulten.com/wp-content/uploads/2023/12/nato_sayfason-450x281.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `panel`
--

CREATE TABLE `panel` (
  `background` text NOT NULL,
  `arkaplan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `arkaplan_rengi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `site`
--

INSERT INTO `site` (`id`, `baslik`, `arkaplan_rengi`) VALUES
(2, 'SCS', '# ffffff');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'test', 'test'),
(8, 'mert', 'mert');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `duyurular`
--
ALTER TABLE `duyurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `haberler`
--
ALTER TABLE `haberler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
