-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2012 at 10:38 PM
-- Server version: 5.0.95
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ourdonca_ow1`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `owner_id` int(10) unsigned NOT NULL default '0',
  `from_pozKon` tinyint(4) NOT NULL default '0',
  `from_pozUkl` tinyint(4) NOT NULL default '0',
  `from_pozCon` tinyint(4) NOT NULL default '0',
  `to_pozKon` tinyint(4) NOT NULL default '0',
  `to_pozUkl` tinyint(4) NOT NULL default '0',
  `to_pozCon` tinyint(4) NOT NULL default '0',
  `f_zl` varchar(8) NOT NULL default '',
  `f_lc` varchar(8) NOT NULL default '',
  `f_sc` varchar(8) NOT NULL default '',
  `f_cc` varchar(8) NOT NULL default '',
  `f_mt` varchar(8) NOT NULL default '',
  `f_dt` varchar(8) NOT NULL default '',
  `f_ms` varchar(8) NOT NULL default '',
  `f_bm` varchar(8) NOT NULL default '',
  `f_sz` varchar(8) NOT NULL default '',
  `f_kr` varchar(8) NOT NULL default '',
  `f_ow` varchar(8) NOT NULL default '',
  `f_pc` varchar(8) NOT NULL default '',
  `f_lp1` varchar(8) NOT NULL default '',
  `f_lp2` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(32) unsigned NOT NULL auto_increment,
  `name` varchar(32) character set utf8 collate utf8_polish_ci NOT NULL default '',
  `owner_id` varchar(32) NOT NULL default '',
  `pozKon` int(10) unsigned NOT NULL default '0',
  `pozUkl` int(10) unsigned NOT NULL default '0',
  `pozCon` int(10) unsigned NOT NULL default '0',
  `size` int(3) NOT NULL default '169',
  `occupy` int(5) NOT NULL default '0',
  `expence` int(32) NOT NULL default '0',
  `rock` decimal(32,3) default '1000.000',
  `metal` decimal(32,3) default '500.000',
  `petrol` decimal(32,3) default '0.000',
  `Image` varchar(255) NOT NULL default '',
  `last_click` int(32) default NULL,
  `b_km` int(11) NOT NULL default '0',
  `b_kpm` int(11) NOT NULL default '0',
  `b_rf` int(11) NOT NULL default '0',
  `b_ek` int(11) NOT NULL default '0',
  `b_zp` int(11) NOT NULL default '0',
  `b_fm` int(11) NOT NULL default '0',
  `b_st` int(11) NOT NULL default '0',
  `b_sw` int(11) NOT NULL default '0',
  `b_lb` int(11) NOT NULL default '0',
  `b_bw` int(11) NOT NULL default '0',
  `b_fp` int(11) NOT NULL default '0',
  `b_aw` int(11) NOT NULL default '0',
  `b_mr` int(11) NOT NULL default '0',
  `builid` varchar(8) character set utf8 collate utf8_polish_ci default NULL,
  `builid_t` int(32) default NULL,
  `f_zl` int(11) NOT NULL default '0',
  `f_lc` int(11) NOT NULL default '0',
  `f_sc` int(11) NOT NULL default '0',
  `f_cc` int(11) NOT NULL default '0',
  `f_mt` int(11) NOT NULL default '0',
  `f_dt` int(11) NOT NULL default '0',
  `f_ms` int(11) NOT NULL default '0',
  `f_bm` int(11) NOT NULL default '0',
  `f_sz` int(11) NOT NULL default '0',
  `f_kr` int(11) NOT NULL default '0',
  `f_ow` int(11) NOT NULL default '0',
  `f_pc` int(11) NOT NULL default '0',
  `f_lp1` int(11) NOT NULL default '0',
  `f_lp2` int(11) NOT NULL default '0',
  `o_wr` int(11) NOT NULL default '0',
  `o_ld` int(11) NOT NULL default '0',
  `o_cd` int(11) default NULL,
  `o_mz` int(11) NOT NULL default '0',
  `o_hb` int(11) NOT NULL default '0',
  `o_v1` int(11) NOT NULL default '0',
  `o_v2` int(11) NOT NULL default '0',
  `g_bj` int(4) NOT NULL default '0',
  `g_op` int(4) NOT NULL default '0',
  `g_ns` int(4) NOT NULL default '0',
  `g_lt` int(4) NOT NULL default '0',
  `g_at` int(4) NOT NULL default '0',
  `g_ek` int(4) NOT NULL default '0',
  `g_na` int(4) NOT NULL default '0',
  `g_nw` int(4) NOT NULL default '0',
  `gbuilid` varchar(5) default NULL,
  `gbuilid_t` int(32) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `owner_id`, `pozKon`, `pozUkl`, `pozCon`, `size`, `occupy`, `expence`, `rock`, `metal`, `petrol`, `Image`, `last_click`, `b_km`, `b_kpm`, `b_rf`, `b_ek`, `b_zp`, `b_fm`, `b_st`, `b_sw`, `b_lb`, `b_bw`, `b_fp`, `b_aw`, `b_mr`, `builid`, `builid_t`, `f_zl`, `f_lc`, `f_sc`, `f_cc`, `f_mt`, `f_dt`, `f_ms`, `f_bm`, `f_sz`, `f_kr`, `f_ow`, `f_pc`, `f_lp1`, `f_lp2`, `o_wr`, `o_ld`, `o_cd`, `o_mz`, `o_hb`, `o_v1`, `o_v2`, `g_bj`, `g_op`, `g_ns`, `g_lt`, `g_at`, `g_ek`, `g_na`, `g_nw`, `gbuilid`, `gbuilid_t`) VALUES
(1, 'Wales', 'admin', 1, 1, 3, 169, 0, 0, 3.000, 2.000, 1.000, 'flags/001.jpg', 1344548251, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `factory`
--

CREATE TABLE IF NOT EXISTS `factory` (
  `item_1` varchar(7) default NULL,
  `quanity_1` int(7) default '0',
  `item_2` varchar(7) default NULL,
  `quanity_2` int(7) default '0',
  `item_3` varchar(7) default NULL,
  `quanity_3` int(7) default '0',
  `item_4` varchar(7) default NULL,
  `quanity_4` int(7) default '0',
  `item_5` varchar(7) default NULL,
  `quanity_5` int(7) default '0',
  `item_6` varchar(7) default NULL,
  `quanity_6` int(7) default '0',
  `item_7` varchar(7) default NULL,
  `quanity_7` int(7) default '0',
  `item_8` varchar(7) default NULL,
  `quanity_8` int(7) default '0',
  `item_9` varchar(7) default NULL,
  `quanity_9` int(7) default '0',
  `item_10` varchar(7) default NULL,
  `quanity_10` int(7) default '0',
  `life` int(32) NOT NULL default '0',
  `start` int(32) NOT NULL default '0',
  `owner_id` varchar(32) NOT NULL default '',
  `name` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(32) NOT NULL auto_increment,
  `nick` varchar(32) character set utf8 collate utf8_polish_ci NOT NULL default '',
  `password` varchar(32) character set utf8 collate utf8_polish_ci NOT NULL default '',
  `email` varchar(255) character set ucs2 collate ucs2_polish_ci NOT NULL default '',
  `points` int(32) default NULL,
  `skin` varchar(255) character set ucs2 collate ucs2_polish_ci NOT NULL default '',
  `status` int(32) NOT NULL default '1',
  `country1` varchar(32) NOT NULL default '',
  `country2` varchar(32) NOT NULL default '',
  `country3` varchar(32) NOT NULL default '',
  `country4` varchar(32) NOT NULL default '',
  `country5` varchar(32) NOT NULL default '',
  `country6` varchar(32) NOT NULL default '',
  `country7` varchar(32) NOT NULL default '',
  `country8` varchar(32) NOT NULL default '',
  `country9` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `nick`, `password`, `email`, `points`, `skin`, `status`, `country1`, `country2`, `country3`, `country4`, `country5`, `country6`, `country7`, `country8`, `country9`) VALUES
(1, 'admin', 'test123', 'admin@example.com', 3, '', 2, 'Wales', '', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
