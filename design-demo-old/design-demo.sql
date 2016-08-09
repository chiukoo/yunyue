-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 01 月 02 日 07:28
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `design-demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `analytics_c`
--

CREATE TABLE IF NOT EXISTS `analytics_c` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_date` datetime DEFAULT NULL,
  `c_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_browser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_os` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_week` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `analytics_c`
--

INSERT INTO `analytics_c` (`c_id`, `c_date`, `c_ip`, `c_browser`, `c_os`, `c_week`) VALUES
(4, '2013-12-18 13:57:33', '127.0.0.1', 'Google Chrome', 'Windows7', 'Wed'),
(14, '2013-12-19 11:09:46', '111.81.228.71', 'Google Chrome', 'Android', 'Thu'),
(13, '2013-12-18 18:19:26', '42.77.140.107', 'Safari', 'iPhone', 'Wed'),
(7, '2013-12-18 16:14:41', '192.168.10.131', 'Google Chrome', 'Windows7', 'Wed'),
(12, '2013-12-18 16:44:27', '42.78.87.132', 'Safari', 'Android', 'Wed'),
(10, '2013-12-18 16:34:39', '59.125.4.19', 'Google Chrome', 'Windows7', 'Wed'),
(15, '2013-12-19 11:22:23', '192.168.10.131', 'Google Chrome', 'Windows7', 'Thu'),
(16, '2013-12-19 14:39:27', '192.168.10.131', 'Internet Explorer', 'Windows7', 'Thu'),
(17, '2013-12-23 17:04:58', '127.0.0.1', 'Google Chrome', 'Windows7', 'Mon'),
(18, '2013-12-30 17:31:32', '127.0.0.1', 'Other', 'Unknown', 'Mon'),
(19, '2014-01-02 10:26:30', '127.0.0.1', 'Other', 'Unknown', 'Thu'),
(20, '2014-01-02 10:26:33', '127.0.0.1', 'Google Chrome', 'Windows7', 'Thu'),
(21, '2014-01-02 10:28:52', '127.0.0.1', 'Other', 'Unknown', 'Thu'),
(22, '2014-01-02 13:57:16', '127.0.0.1', 'Other', 'Unknown', 'Thu'),
(23, '2014-01-02 14:12:01', '127.0.0.1', 'Other', 'Unknown', 'Thu');

-- --------------------------------------------------------

--
-- 表的结构 `analytics_n`
--

CREATE TABLE IF NOT EXISTS `analytics_n` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_date` datetime DEFAULT NULL,
  `n_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `n_num` int(11) DEFAULT NULL,
  `n_week` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `analytics_n`
--

INSERT INTO `analytics_n` (`n_id`, `n_date`, `n_ip`, `n_num`, `n_week`) VALUES
(1, '2013-12-18 15:19:55', '127.0.0.1', 6, 'Wed'),
(2, '2013-12-19 11:15:03', '192.168.10.131', 6, 'Wed'),
(9, '2013-12-19 11:09:46', '111.81.228.71', 1, 'Thu'),
(8, '2013-12-18 18:19:26', '42.77.140.107', 1, 'Wed'),
(5, '2013-12-19 11:02:47', '59.125.4.19', 6, 'Wed'),
(6, '2013-12-19 11:18:51', '42.78.87.132', 4, 'Wed'),
(10, '2013-12-19 11:22:23', '192.168.10.131', 1, 'Thu'),
(11, '2013-12-19 14:39:27', '192.168.10.131', 1, 'Thu'),
(12, '2013-12-23 17:04:58', '127.0.0.1', 1, 'Mon'),
(13, '2013-12-30 17:31:32', '127.0.0.1', 1, 'Mon'),
(14, '2014-01-02 10:26:30', '127.0.0.1', 1, 'Thu'),
(15, '2014-01-02 10:26:33', '127.0.0.1', 1, 'Thu'),
(16, '2014-01-02 10:28:52', '127.0.0.1', 1, 'Thu'),
(17, '2014-01-02 13:57:16', '127.0.0.1', 1, 'Thu'),
(18, '2014-01-02 14:12:01', '127.0.0.1', 1, 'Thu');

-- --------------------------------------------------------

--
-- 表的结构 `demo_index`
--

CREATE TABLE IF NOT EXISTS `demo_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL,
  `edit_dt` datetime DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `demo_index`
--

INSERT INTO `demo_index` (`id`, `title`, `content`, `img`, `create_dt`, `edit_dt`, `url`, `order`) VALUES
(1, '12', '12', '1388635527.9916.jpg', '2014-01-02 11:55:15', '2014-01-02 13:43:37', 'http://tw.yahoo.com/', '12');

-- --------------------------------------------------------

--
-- 表的结构 `sysconfig`
--

CREATE TABLE IF NOT EXISTS `sysconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cis_img` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_info` text COLLATE utf8_unicode_ci,
  `youtube_url` text COLLATE utf8_unicode_ci,
  `remark` text COLLATE utf8_unicode_ci,
  `create_dt` datetime DEFAULT NULL,
  `edit_dt` datetime DEFAULT NULL,
  `google_map` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sysconfig`
--

INSERT INTO `sysconfig` (`id`, `name`, `phone`, `fax`, `email`, `address`, `cis_img`, `company_info`, `youtube_url`, `remark`, `create_dt`, `edit_dt`, `google_map`) VALUES
(1, '12', '15', '16', '17', '14', '1384770497.4.jpg', '13', '', NULL, NULL, '2013-11-11 10:12:00', '1');

-- --------------------------------------------------------

--
-- 表的结构 `sysuser`
--

CREATE TABLE IF NOT EXISTS `sysuser` (
  `sys_id` int(11) NOT NULL AUTO_INCREMENT,
  `sys` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pet_name` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd_qus` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd_ans` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `create_dt` datetime DEFAULT NULL,
  `edit_dt` datetime DEFAULT NULL,
  `day` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sysuser`
--

INSERT INTO `sysuser` (`sys_id`, `sys`, `pwd`, `group`, `type`, `name`, `pet_name`, `email`, `sex`, `mobile`, `phone`, `address`, `pwd_qus`, `pwd_ans`, `remark`, `create_dt`, `edit_dt`, `day`, `month`, `year`, `img`) VALUES
(1, 'admin', 'YWRtaW4xMjM0NQ==', '1', '1', '台灣雲端', 'admin', '1', '0', '1', '15', '141', '1', '1', '<p>\r\n	1</p>\r\n', NULL, '2013-12-19 11:02:20', '9', 'June', '1913', ''),
(2, 'taiwancloud', 'dGFpd2FuY2xvdWR6eGN2', '2', '2', 'admin嘿嘿嘿123', '台灣雲端', '2', '0', '2', '2', '2', '2', '2', '<p>\r\n	2</p>\r\n', '2013-11-06 14:05:35', '2013-12-13 18:20:08', '19', 'October', '1983', '');

-- --------------------------------------------------------

--
-- 表的结构 `taiwancloud`
--

CREATE TABLE IF NOT EXISTS `taiwancloud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cloudname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cloudpassword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `taiwancloud`
--

INSERT INTO `taiwancloud` (`id`, `cloudname`, `cloudpassword`) VALUES
(1, 'taiwancloud', 'dGFpd2FuY2xvdWQxcWF6');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pet_name` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` char(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd_qus` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd_ans` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `create_dt` datetime DEFAULT NULL,
  `edit_dt` datetime DEFAULT NULL,
  `year` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`acc_id`, `acc`, `pwd`, `group`, `type`, `name`, `pet_name`, `email`, `sex`, `phone`, `mobile`, `address`, `pwd_qus`, `pwd_ans`, `remark`, `create_dt`, `edit_dt`, `year`, `month`, `day`, `img`) VALUES
(5, '1', 'MQ==', '1', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '<p>\r\n	1</p>\r\n', '2013-11-11 10:32:05', '2013-11-22 15:44:31', '1900', '9', '1', '1385106192.496.jpg'),
(6, 'admin', 'MTIzNA==', '1', '1', '115', '12', '16', '0', '1', '1', '1', '1', '1', '<p>\r\n	1</p>\r\n', '2013-11-12 13:44:44', '2013-11-22 17:09:16', '1996', '11', '1', '1385106018.0464.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
