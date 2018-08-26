-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2018 at 04:25 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashioncanin`
--

-- --------------------------------------------------------

--
-- Table structure for table `chien`
--

CREATE TABLE `chien` (
  `ID_CHIEN` int(4) NOT NULL,
  `ID_RACE` int(4) NOT NULL,
  `ID_CONCOURS` int(4) NOT NULL,
  `ID_INDIVIDU` int(4) NOT NULL,
  `NOM_CHIEN` varchar(128) NOT NULL,
  `PEDIGREE_CHIEN` varchar(128) NOT NULL,
  `DATENAISSANCE_CHIEN` date NOT NULL,
  `LOCALITE_CHIEN` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chien`
--

INSERT INTO `chien` (`ID_CHIEN`, `ID_RACE`, `ID_CONCOURS`, `ID_INDIVIDU`, `NOM_CHIEN`, `PEDIGREE_CHIEN`, `DATENAISSANCE_CHIEN`, `LOCALITE_CHIEN`) VALUES
(2, 1, 3, 4, 'toto', 'pure', '2018-08-21', 'geneve'),
(3, 1, 3, 4, 'bouboule', 'batard', '2018-08-07', 'Geneve');

-- --------------------------------------------------------

--
-- Table structure for table `concours`
--

CREATE TABLE `concours` (
  `ID_CONCOURS` int(4) NOT NULL,
  `TYPE_CONCOURS` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concours`
--

INSERT INTO `concours` (`ID_CONCOURS`, `TYPE_CONCOURS`) VALUES
(3, 'BEAU'),
(4, 'OBST'),
(5, 'POKE'),
(6, 'OBST'),
(7, 'POKE');

-- --------------------------------------------------------

--
-- Table structure for table `individu`
--

CREATE TABLE `individu` (
  `ID_INDIVIDU` int(4) NOT NULL,
  `NOM_INDIVIDU` varchar(128) NOT NULL,
  `PRENOM_INDIVIDU` varchar(128) NOT NULL,
  `DATENAISSANCE_INDIVIDU` date NOT NULL,
  `LOCALITE_INDIVIDU` varchar(128) NOT NULL,
  `EMAIL_INDIVIDU` varchar(128) DEFAULT NULL,
  `LOGIN_INDIVIDU` varchar(128) DEFAULT NULL,
  `PASSWORD_INDIVIDU` varchar(128) DEFAULT NULL,
  `TELEPHONE_INDIVIDU` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `individu`
--

INSERT INTO `individu` (`ID_INDIVIDU`, `NOM_INDIVIDU`, `PRENOM_INDIVIDU`, `DATENAISSANCE_INDIVIDU`, `LOCALITE_INDIVIDU`, `EMAIL_INDIVIDU`, `LOGIN_INDIVIDU`, `PASSWORD_INDIVIDU`, `TELEPHONE_INDIVIDU`) VALUES
(4, 'val', 'val', '0000-00-00', '', 'val@gmail.com', 'val', '$2y$10$2Z3uPGDZke1ckWcdKt.Lke/bpyYOQ3SZ7.BqVis7WbTU9U0c2xklG', ''),
(6, 'valou', 'valou', '0000-00-00', '', 'caca@gmail.com', 'valou', '$2y$10$JsPG9Txy8T.8SJcZ3vEivOnW6EDHFm5Ne5KKalhb7YVGBjUv.C3fu', ''),
(7, 'milan', 'milan', '0000-00-00', 'zuzu', 'milan@gmail.com', 'milan', '$2y$10$MHxHFjHN0FWtpD/olAeccuFj/0FAu/ssYPY8OElbkdCrnTk7uR1NK', '1207'),
(8, 'test', 'test', '0000-00-00', 'geneve', 'test@gmail.com', 'test', '$2y$10$SSREWSlkeVLsPKFcDb/6FeRnW5nNdY4Voe5Hg6lJhj1cKzQJdR5CC', 'w646');

-- --------------------------------------------------------

--
-- Table structure for table `inscription_chien`
--

CREATE TABLE `inscription_chien` (
  `ID_CONCOURS` int(4) NOT NULL,
  `ID_CHIEN` int(4) NOT NULL,
  `DATE_INSCRIPTIONCHIEN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscription_chien`
--

INSERT INTO `inscription_chien` (`ID_CONCOURS`, `ID_CHIEN`, `DATE_INSCRIPTIONCHIEN`) VALUES
(3, 2, '2018-08-21'),
(3, 3, '2018-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `inscription_joueur`
--

CREATE TABLE `inscription_joueur` (
  `ID_CONCOURS` int(4) NOT NULL,
  `ID_INDIVIDU` int(4) NOT NULL,
  `DATE_INSCRIPTIONJOUEUR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscription_joueur`
--

INSERT INTO `inscription_joueur` (`ID_CONCOURS`, `ID_INDIVIDU`, `DATE_INSCRIPTIONJOUEUR`) VALUES
(3, 4, '2018-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `race_chien`
--

CREATE TABLE `race_chien` (
  `ID_RACE` int(4) NOT NULL,
  `NOM_RACE` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race_chien`
--

INSERT INTO `race_chien` (`ID_RACE`, `NOM_RACE`) VALUES
(1, 'dalmatien'),
(2, 'Berger allemand'),
(3, 'Bouvier'),
(4, 'teckel'),
(5, 'husky');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chien`
--
ALTER TABLE `chien`
  ADD PRIMARY KEY (`ID_CHIEN`),
  ADD KEY `fk_race` (`ID_RACE`),
  ADD KEY `fk_individu` (`ID_INDIVIDU`),
  ADD KEY `fk_concours` (`ID_CONCOURS`);

--
-- Indexes for table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`ID_CONCOURS`);

--
-- Indexes for table `individu`
--
ALTER TABLE `individu`
  ADD PRIMARY KEY (`ID_INDIVIDU`),
  ADD UNIQUE KEY `EMAIL_INDIVIDU` (`EMAIL_INDIVIDU`),
  ADD UNIQUE KEY `LOGIN_INDIVIDU` (`LOGIN_INDIVIDU`),
  ADD UNIQUE KEY `PASSWORD_INDIVIDU` (`PASSWORD_INDIVIDU`);

--
-- Indexes for table `inscription_chien`
--
ALTER TABLE `inscription_chien`
  ADD PRIMARY KEY (`ID_CONCOURS`,`ID_CHIEN`),
  ADD KEY `fkins_chien` (`ID_CHIEN`);

--
-- Indexes for table `inscription_joueur`
--
ALTER TABLE `inscription_joueur`
  ADD PRIMARY KEY (`ID_CONCOURS`,`ID_INDIVIDU`),
  ADD KEY `fk_insc_jou` (`ID_INDIVIDU`);

--
-- Indexes for table `race_chien`
--
ALTER TABLE `race_chien`
  ADD PRIMARY KEY (`ID_RACE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chien`
--
ALTER TABLE `chien`
  MODIFY `ID_CHIEN` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `concours`
--
ALTER TABLE `concours`
  MODIFY `ID_CONCOURS` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `individu`
--
ALTER TABLE `individu`
  MODIFY `ID_INDIVIDU` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `race_chien`
--
ALTER TABLE `race_chien`
  MODIFY `ID_RACE` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chien`
--
ALTER TABLE `chien`
  ADD CONSTRAINT `fk_concours` FOREIGN KEY (`ID_CONCOURS`) REFERENCES `concours` (`ID_CONCOURS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_individu` FOREIGN KEY (`ID_INDIVIDU`) REFERENCES `individu` (`ID_INDIVIDU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_race` FOREIGN KEY (`ID_RACE`) REFERENCES `race_chien` (`ID_RACE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inscription_chien`
--
ALTER TABLE `inscription_chien`
  ADD CONSTRAINT `fkins_chien` FOREIGN KEY (`ID_CHIEN`) REFERENCES `chien` (`ID_CHIEN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkins_con` FOREIGN KEY (`ID_CONCOURS`) REFERENCES `concours` (`ID_CONCOURS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inscription_joueur`
--
ALTER TABLE `inscription_joueur`
  ADD CONSTRAINT `fk_insc_conc` FOREIGN KEY (`ID_CONCOURS`) REFERENCES `concours` (`ID_CONCOURS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_insc_jou` FOREIGN KEY (`ID_INDIVIDU`) REFERENCES `individu` (`ID_INDIVIDU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
