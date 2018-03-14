-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2017 at 02:37 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ednevnik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dodadi_ucenik`
--

CREATE TABLE `dodadi_ucenik` (
  `id` int(11) NOT NULL,
  `ime` varchar(40) NOT NULL,
  `prezime` varchar(40) NOT NULL,
  `datum_raganje` date NOT NULL,
  `mesto` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `korisnicko_ime` varchar(40) NOT NULL,
  `lozinka` varchar(40) NOT NULL,
  `zabeleska` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `account_type` char(1) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `user`, `password`, `account_type`, `email`) VALUES
(1, 'Ilija', '0000', 'u', 'ileraskov123@gmail.com'),
(2, 'Ivan', '12345', 'p', 'ivan@yahoo.com'),
(3, 'Marko', 'abcd', 'p', 'markojanev@gmail.com'),
(5, 'admin', 'adminpanel', 'a', 'admin@yahoo.com'),
(32, 'ivan11', '4040', 'u', 'sdvksdobksdo'),
(33, 'marija11', 'marija', 'u', 'marija123@gmail.com'),
(34, 'stefan', '1234', 'u', 'stefan223@hotmail.com'),
(35, 'andrej12', '1111', 'u', 'aj@gmail.com'),
(36, 'martin11', '111', 'u', 'martin@gmail.com'),
(37, 'gordan1234', '111', 'u', 'gordan@gmail.com'),
(38, 'Pavel', 'Pavel', 'u', 'pavel@gmail.com'),
(39, 'Panda', 'Panda', 'u', 'Panda'),
(40, 'Stojan', 'stojan', 'u', 'stojan@gmail.com'),
(41, 'Klime', 'klime', 'u', 'klime@gmail.com'),
(42, 'Rambo', 'rambo', 'u', 'rambo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `oceni`
--

CREATE TABLE `oceni` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `makedonski` int(11) NOT NULL,
  `matematika` int(11) NOT NULL,
  `angliski` int(11) NOT NULL,
  `biznis` int(11) NOT NULL,
  `gragjansko` int(11) NOT NULL,
  `fizicko` int(11) NOT NULL,
  `programiranje` int(11) NOT NULL,
  `digitalnisistemi` int(11) NOT NULL,
  `procesno` int(11) NOT NULL,
  `praksa` int(11) NOT NULL,
  `prosek` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oceni`
--

INSERT INTO `oceni` (`id`, `id_user`, `makedonski`, `matematika`, `angliski`, `biznis`, `gragjansko`, `fizicko`, `programiranje`, `digitalnisistemi`, `procesno`, `praksa`, `prosek`) VALUES
(1, 1, 1, 3, 5, 5, 3, 5, 3, 3, 5, 1, 3.4),
(9, 32, 1, 5, 2, 5, 4, 4, 4, 4, 3, 5, 3.7),
(10, 33, 5, 4, 4, 5, 4, 3, 4, 3, 4, 4, 4),
(12, 35, 3, 4, 3, 5, 4, 2, 4, 3, 4, 5, 3.7),
(13, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 37, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 38, 4, 5, 1, 4, 4, 3, 2, 3, 2, 4, 3.2),
(16, 39, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 41, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 42, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `podatoci`
--

CREATE TABLE `podatoci` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ime` varchar(20) DEFAULT NULL,
  `prezime` varchar(20) DEFAULT NULL,
  `datum_raganje` date DEFAULT NULL,
  `mesto` varchar(30) NOT NULL,
  `pozicija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podatoci`
--

INSERT INTO `podatoci` (`id`, `id_user`, `ime`, `prezime`, `datum_raganje`, `mesto`, `pozicija`) VALUES
(1, 1, 'Ilija', 'Raskov', '1996-02-08', 'Kocani', 1),
(2, 2, 'Ivan', 'Nikolov', '1996-11-05', 'Kocani', 0),
(3, 3, 'Marko', 'Anastasov', '1990-05-01', 'Oblesevo', 0),
(11, 32, 'Ivan', 'ivanov', '2015-04-07', 'kcosakco', 1),
(12, 33, 'Marija', 'Jordanova', '1997-07-14', 'Kocani', 1),
(14, 35, 'Andrej', 'Janev', '1998-07-13', 'Kocani', 1),
(15, 36, 'Martin', 'Arsov', '2015-04-07', 'Kocani', 1),
(16, 37, 'Gordan', 'Atanasov', '1995-06-14', 'KOcani', 1),
(17, 38, 'Pavel', 'Pavel', '2017-09-13', 'struga', 1),
(18, 39, 'Panda', 'Panda', '2017-09-12', 'Panda', 1),
(19, 40, 'Stojan', 'Celevski', '2017-09-19', 'Struga', 1),
(20, 41, 'klime', 'klimeski', '2017-09-05', 'klimetica', 1),
(21, 42, 'Rambo', 'Ramboski', '2017-09-10', 'Rambomagija', 1);

-- --------------------------------------------------------

--
-- Table structure for table `povedenie`
--

CREATE TABLE `povedenie` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `opravdani` int(11) NOT NULL,
  `neopravdani` int(11) NOT NULL,
  `vkupno` int(11) NOT NULL,
  `povedenie` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `povedenie`
--

INSERT INTO `povedenie` (`id`, `id_user`, `opravdani`, `neopravdani`, `vkupno`, `povedenie`) VALUES
(1, 1, 34, 9, 43, 'p'),
(9, 32, 3, 11, 14, 'z'),
(12, 35, 0, 5, 5, 'p'),
(13, 36, 0, 0, 0, 'p'),
(14, 37, 0, 0, 0, 'p'),
(15, 38, 0, 0, 0, 'p'),
(16, 39, 0, 0, 0, 'p'),
(17, 40, 0, 0, 0, 'p'),
(18, 41, 0, 0, 0, 'p'),
(19, 42, 0, 0, 0, 'p');

-- --------------------------------------------------------

--
-- Table structure for table `promena_status`
--

CREATE TABLE `promena_status` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `zabeleska` varchar(255) NOT NULL,
  `profesor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roditelska`
--

CREATE TABLE `roditelska` (
  `id_user` int(11) NOT NULL,
  `zabeleska` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roditelska_temi`
--

CREATE TABLE `roditelska_temi` (
  `roditelska` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roditelska_temi`
--

INSERT INTO `roditelska_temi` (`roditelska`) VALUES
(' deneska nema da se odi na uciliste');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dodadi_ucenik`
--
ALTER TABLE `dodadi_ucenik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oceni`
--
ALTER TABLE `oceni`
  ADD PRIMARY KEY (`id`);
  

--
-- Indexes for table `podatoci`
--
ALTER TABLE `podatoci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `povedenie`
--
ALTER TABLE `povedenie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promena_status`
--
ALTER TABLE `promena_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dodadi_ucenik`
--
ALTER TABLE `dodadi_ucenik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `oceni`
--
ALTER TABLE `oceni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `podatoci`
--
ALTER TABLE `podatoci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `povedenie`
--
ALTER TABLE `povedenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `promena_status`
--
ALTER TABLE `promena_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `podatoci`
--
ALTER TABLE `podatoci`
  ADD CONSTRAINT `podatoci_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `korisnik` (`id`);
COMMIT;
ALTER TABLE `oceni`
  ADD CONSTRAINT `oceni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `korisnik` (`id`);
COMMIT;
ALTER TABLE `povedenie`
  ADD CONSTRAINT `povedenie_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `korisnik` (`id`);
COMMIT;
ALTER TABLE `promena_status`
  ADD CONSTRAINT `promena_status_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `korisnik` (`id`);
COMMIT;
ALTER TABLE `roditelska`
  ADD CONSTRAINT `roditelska_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `korisnik` (`id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
