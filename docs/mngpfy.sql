-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2019 at 04:29 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mngpfy`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumi`
--

CREATE TABLE `albumi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datum_izdavanja` date NOT NULL,
  `autor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albumi`
--

INSERT INTO `albumi` (`id`, `naziv`, `datum_izdavanja`, `autor_id`) VALUES
(1, 'Singlovi', '2019-06-01', 1),
(2, 'Singlovi', '2019-06-01', 2),
(3, 'Singlovi', '2019-06-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE `autori` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemlja` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `bend` tinyint(1) NOT NULL,
  `datum_pojavljivanja` date DEFAULT NULL,
  `ref_slika` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`id`, `ime`, `prezime`, `zemlja`, `bend`, `datum_pojavljivanja`, `ref_slika`) VALUES
(1, 'Dire Straits', '', 'Engleska', 1, '1977-06-08', 'https://tonedeaf.thebrag.com/wp-content/uploads/2018/04/dire-straits.jpg'),
(2, 'Neil', 'Young', 'Kanada', 0, '1960-10-04', ''),
(3, 'Queen', '', 'Engleska', 1, '1975-10-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mejl` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pol` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datum_rodj` date NOT NULL,
  `lozinka` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `premijum` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `korisnicko_ime`, `mejl`, `pol`, `datum_rodj`, `lozinka`, `premijum`, `admin`) VALUES
(1, 'stefan', 'Mirkovic', 'stef98', 'jagssi14@gmail.com', 'm', '2019-06-14', 'c55143f7e4fab8622f32e587eb90cdab', 0, 0),
(2, 'Mirko', 'Spanac', 'spanac123', 'jagssi@nadlanu.com', 'm', '2019-06-14', 'fdc9b22ce91545f5ac66658e06db7a53', 0, 0),
(3, 'Ilija', 'Jovanovic', 'ikac2009', 'ilijajovanovic@gmail.com', 'm', '2019-06-30', '5d4fddf73bf7e5a8806a96e89e6c83dd', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `metapodaci`
--

CREATE TABLE `metapodaci` (
  `id` int(11) NOT NULL,
  `format` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `velicina` int(30) NOT NULL,
  `ref_fajla` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `ref_omot` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `metapodaci`
--

INSERT INTO `metapodaci` (`id`, `format`, `velicina`, `ref_fajla`, `ref_omot`) VALUES
(1, 'mp3', 6, 'http://k007.kiwi6.com/hotlink/rvkw4q4mpw/dire-straits-sultans-of-swing.mp3', 'https://is3-ssl.mzstatic.com/image/thumb/Music/v4/c6/55/6d/c6556dd3-e25d-62d4-19ae-204c78185b96/source/1200x1200bb.jpg'),
(2, 'mp3', 12312, 'http://k007.kiwi6.com/hotlink/6begnf2rxd/Dire-Straits-Water-Of-Love.mp3', 'https://upload.wikimedia.org/wikipedia/en/thumb/8/86/Water_of_lovesingle.jpg/220px-Water_of_lovesingle.jpg'),
(3, 'mp3', 21312, 'http://k007.kiwi6.com/hotlink/nsb8toewqr/Neil-Young_-_Heart-Of-Gold.mp3', 'http://1.bp.blogspot.com/-X-KVRbnnqtA/TshhdOkZgKI/AAAAAAAADKY/x7OgNtQyV2k/s320/1230340.jpg'),
(4, 'mp3', 21312, 'http://k007.kiwi6.com/hotlink/jalftcimo9/Queen-We-Are-The-Champions.mp3', 'https://img.cdandlp.com/2015/12/imgL/117803072.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `numere`
--

CREATE TABLE `numere` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `duzina_trajanja` int(20) NOT NULL,
  `datum_objavljivanja` date NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `metapodatak_id` int(11) NOT NULL,
  `zanr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `numere`
--

INSERT INTO `numere` (`id`, `naziv`, `duzina_trajanja`, `datum_objavljivanja`, `album_id`, `metapodatak_id`, `zanr_id`) VALUES
(1, 'Sultans of Swing', 348, '1978-06-14', 1, 1, 1),
(2, 'Water of Love', 315, '2018-01-23', 1, 2, 1),
(3, 'Heart of Gold', 183, '2019-06-29', NULL, 3, 1),
(4, 'We are the Champions', 183, '1975-06-03', NULL, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plejliste`
--

CREATE TABLE `plejliste` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datum_azuriranja` date NOT NULL,
  `korinsik_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pripadanje_autora`
--

CREATE TABLE `pripadanje_autora` (
  `numera_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `uloga` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pripadanje_autora`
--

INSERT INTO `pripadanje_autora` (`numera_id`, `autor_id`, `uloga`) VALUES
(1, 1, 'Izvodjac'),
(2, 1, 'Izvodjac'),
(3, 2, 'Izvodjac'),
(4, 3, 'Izvodjac');

-- --------------------------------------------------------

--
-- Table structure for table `pripadanje_plejlista`
--

CREATE TABLE `pripadanje_plejlista` (
  `plejlista_id` int(11) NOT NULL,
  `numera_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stavke_usluga`
--

CREATE TABLE `stavke_usluga` (
  `id` int(11) NOT NULL,
  `datum_vrsenja` date NOT NULL,
  `numera_id` int(11) NOT NULL,
  `usluga_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usluge`
--

CREATE TABLE `usluge` (
  `id` int(11) NOT NULL,
  `tip` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zanrovi`
--

CREATE TABLE `zanrovi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zanrovi`
--

INSERT INTO `zanrovi` (`id`, `naziv`) VALUES
(1, 'Rock'),
(2, 'Rap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumi`
--
ALTER TABLE `albumi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Indexes for table `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metapodaci`
--
ALTER TABLE `metapodaci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numere`
--
ALTER TABLE `numere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`,`metapodatak_id`,`zanr_id`),
  ADD KEY `zanr_id` (`zanr_id`),
  ADD KEY `metapodatak_id` (`metapodatak_id`);

--
-- Indexes for table `plejliste`
--
ALTER TABLE `plejliste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korinsik_id` (`korinsik_id`);

--
-- Indexes for table `pripadanje_autora`
--
ALTER TABLE `pripadanje_autora`
  ADD PRIMARY KEY (`numera_id`,`autor_id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Indexes for table `pripadanje_plejlista`
--
ALTER TABLE `pripadanje_plejlista`
  ADD PRIMARY KEY (`plejlista_id`,`numera_id`),
  ADD KEY `numera_id` (`numera_id`);

--
-- Indexes for table `stavke_usluga`
--
ALTER TABLE `stavke_usluga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numera_id` (`numera_id`,`usluga_id`,`korisnik_id`),
  ADD KEY `usluga_id` (`usluga_id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `usluge`
--
ALTER TABLE `usluge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zanrovi`
--
ALTER TABLE `zanrovi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumi`
--
ALTER TABLE `albumi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `autori`
--
ALTER TABLE `autori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `metapodaci`
--
ALTER TABLE `metapodaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `numere`
--
ALTER TABLE `numere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plejliste`
--
ALTER TABLE `plejliste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stavke_usluga`
--
ALTER TABLE `stavke_usluga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usluge`
--
ALTER TABLE `usluge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zanrovi`
--
ALTER TABLE `zanrovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albumi`
--
ALTER TABLE `albumi`
  ADD CONSTRAINT `albumi_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `autori` (`id`);

--
-- Constraints for table `numere`
--
ALTER TABLE `numere`
  ADD CONSTRAINT `numere_ibfk_1` FOREIGN KEY (`zanr_id`) REFERENCES `zanrovi` (`id`),
  ADD CONSTRAINT `numere_ibfk_2` FOREIGN KEY (`metapodatak_id`) REFERENCES `metapodaci` (`id`),
  ADD CONSTRAINT `numere_ibfk_3` FOREIGN KEY (`album_id`) REFERENCES `albumi` (`id`);

--
-- Constraints for table `pripadanje_autora`
--
ALTER TABLE `pripadanje_autora`
  ADD CONSTRAINT `pripadanje_autora_ibfk_1` FOREIGN KEY (`numera_id`) REFERENCES `numere` (`id`),
  ADD CONSTRAINT `pripadanje_autora_ibfk_2` FOREIGN KEY (`autor_id`) REFERENCES `autori` (`id`);

--
-- Constraints for table `pripadanje_plejlista`
--
ALTER TABLE `pripadanje_plejlista`
  ADD CONSTRAINT `pripadanje_plejlista_ibfk_1` FOREIGN KEY (`plejlista_id`) REFERENCES `plejliste` (`id`),
  ADD CONSTRAINT `pripadanje_plejlista_ibfk_2` FOREIGN KEY (`numera_id`) REFERENCES `numere` (`id`);

--
-- Constraints for table `stavke_usluga`
--
ALTER TABLE `stavke_usluga`
  ADD CONSTRAINT `stavke_usluga_ibfk_1` FOREIGN KEY (`usluga_id`) REFERENCES `usluge` (`id`),
  ADD CONSTRAINT `stavke_usluga_ibfk_2` FOREIGN KEY (`numera_id`) REFERENCES `numere` (`id`),
  ADD CONSTRAINT `stavke_usluga_ibfk_3` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
