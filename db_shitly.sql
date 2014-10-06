-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2014 at 03:30 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_shitly`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hashes`
--

DROP TABLE IF EXISTS `tbl_hashes`;
CREATE TABLE IF NOT EXISTS `tbl_hashes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
