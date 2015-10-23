-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2015 at 05:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Table structure for table `aperture_settings`
--

CREATE TABLE IF NOT EXISTS `aperture_settings` (
  `websitetitle` text NOT NULL,
  `subtitle` text NOT NULL,
  `footer` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `github` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aperture_settings`
--

INSERT INTO `aperture_settings` (`websitetitle`, `subtitle`, `footer`, `facebook`, `twitter`, `instagram`, `github`, `email`) VALUES
('Aperture', 'Minimal Photo Album', '', 'vsaravind007', 'vsaravind007', 'vsaravind007', 'vsaravind007', 'mail@aravindvs.com');

-- --------------------------------------------------------

--
-- Table structure for table `aperture`
--

CREATE TABLE IF NOT EXISTS `aperture` (
  `filename` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `dateuploaded` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
