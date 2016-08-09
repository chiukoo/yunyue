-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-08-09 14:29:31
-- 伺服器版本: 5.6.26
-- PHP 版本： 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `tw`
--

-- --------------------------------------------------------

--
-- 資料表結構 `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(1, '<p>\r\n	<img alt="" src="/www/petshop/bcontroller/uploads/images/20160809142432.jpg" style="width: 960px; height: 769px;" /></p>\r\n');

-- --------------------------------------------------------

--
-- 資料表結構 `analytics_c`
--

CREATE TABLE IF NOT EXISTS `analytics_c` (
  `c_id` int(11) NOT NULL,
  `c_date` datetime DEFAULT NULL,
  `c_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_browser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_os` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_week` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `analytics_c`
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
(23, '2014-01-02 14:12:01', '127.0.0.1', 'Other', 'Unknown', 'Thu'),
(24, '2016-08-02 23:42:18', '127.0.0.1', 'Google Chrome', 'Windows7', 'Tue');

-- --------------------------------------------------------

--
-- 資料表結構 `analytics_n`
--

CREATE TABLE IF NOT EXISTS `analytics_n` (
  `n_id` int(11) NOT NULL,
  `n_date` datetime DEFAULT NULL,
  `n_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `n_num` int(11) DEFAULT NULL,
  `n_week` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `analytics_n`
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
(18, '2014-01-02 14:12:01', '127.0.0.1', 1, 'Thu'),
(19, '2016-08-02 23:42:18', '127.0.0.1', 1, 'Tue');

-- --------------------------------------------------------

--
-- 資料表結構 `demo_index`
--

CREATE TABLE IF NOT EXISTS `demo_index` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL,
  `edit_dt` datetime DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `demo_index`
--

INSERT INTO `demo_index` (`id`, `title`, `content`, `img`, `create_dt`, `edit_dt`, `url`, `order`) VALUES
(1, '', '', '1470743841.3318.jpg', '2014-01-02 11:55:15', '2016-08-09 20:00:18', '', ''),
(2, '', '', '1470743882.5441.jpg', '2016-08-09 19:58:02', '2016-08-09 20:00:13', '', ''),
(5, '', '', '1470743922.6464.jpg', '2016-08-09 19:58:34', '2016-08-09 19:58:42', '', ''),
(4, '', '', '1470743897.0339.jpg', '2016-08-09 19:58:17', NULL, '', ''),
(6, '', '', '1470743927.0606.jpg', '2016-08-09 19:58:47', NULL, '', ''),
(7, '', '', '1470743934.084.jpg', '2016-08-09 19:58:54', NULL, '', ''),
(8, '', '', '1470743949.1134.jpg', '2016-08-09 19:59:00', '2016-08-09 19:59:09', '', ''),
(9, '', '', '1470743972.4087.jpg', '2016-08-09 19:59:32', NULL, '', ''),
(10, '', '', '1470743977.281.jpg', '2016-08-09 19:59:37', NULL, '', ''),
(11, '', '', '1470743990.4397.jpg', '2016-08-09 19:59:45', '2016-08-09 19:59:50', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `edit_history`
--

CREATE TABLE IF NOT EXISTS `edit_history` (
  `id` int(11) NOT NULL,
  `e_name` varchar(50) DEFAULT NULL,
  `e_class` varchar(50) DEFAULT NULL,
  `e_move` varchar(50) DEFAULT NULL,
  `e_ip` varchar(20) DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `edit_history`
--

INSERT INTO `edit_history` (`id`, `e_name`, `e_class`, `e_move`, `e_ip`, `create_dt`) VALUES
(1, '????', '????', '/upload/demo/1470743841.3318.jpg', '127.0.0.1', '2016-08-09 19:57:21'),
(2, '????', '????', '??12', '127.0.0.1', '2016-08-09 19:57:21'),
(3, '????', '????', '??????', '127.0.0.1', '2016-08-09 19:57:47'),
(4, '????', '????', '/upload/demo/1470743882.5441.jpg', '127.0.0.1', '2016-08-09 19:58:02'),
(5, '????', '????', '???', '127.0.0.1', '2016-08-09 19:58:02'),
(6, '????', '????', '/upload/demo/1470743887.7204.jpg', '127.0.0.1', '2016-08-09 19:58:07'),
(7, '????', '????', '???', '127.0.0.1', '2016-08-09 19:58:07'),
(8, '????', '????', '/upload/demo/1470743897.0339.jpg', '127.0.0.1', '2016-08-09 19:58:17'),
(9, '????', '????', '???', '127.0.0.1', '2016-08-09 19:58:17'),
(10, '????', '????', '/upload/demo/1470743914.4649.jpg', '127.0.0.1', '2016-08-09 19:58:34'),
(11, '????', '????', '???', '127.0.0.1', '2016-08-09 19:58:34'),
(12, '????', '????', '/upload/demo/1470743922.6464.jpg', '127.0.0.1', '2016-08-09 19:58:42'),
(13, '????', '????', '??', '127.0.0.1', '2016-08-09 19:58:42'),
(14, '????', '????', '/upload/demo/1470743927.0606.jpg', '127.0.0.1', '2016-08-09 19:58:47'),
(15, '????', '????', '???', '127.0.0.1', '2016-08-09 19:58:47'),
(16, '????', '????', '/upload/demo/1470743934.084.jpg', '127.0.0.1', '2016-08-09 19:58:54'),
(17, '????', '????', '???', '127.0.0.1', '2016-08-09 19:58:54'),
(18, '????', '????', '???', '127.0.0.1', '2016-08-09 19:59:00'),
(19, '????', '????', '/upload/demo/1470743949.1134.jpg', '127.0.0.1', '2016-08-09 19:59:09'),
(20, '????', '????', '??', '127.0.0.1', '2016-08-09 19:59:09'),
(21, '????', '????', '/upload/demo/1470743972.4087.jpg', '127.0.0.1', '2016-08-09 19:59:32'),
(22, '????', '????', '???', '127.0.0.1', '2016-08-09 19:59:32'),
(23, '????', '????', '/upload/demo/1470743977.281.jpg', '127.0.0.1', '2016-08-09 19:59:37'),
(24, '????', '????', '???', '127.0.0.1', '2016-08-09 19:59:37'),
(25, '????', '????', '???', '127.0.0.1', '2016-08-09 19:59:45'),
(26, '????', '????', '/upload/demo/1470743990.4397.jpg', '127.0.0.1', '2016-08-09 19:59:50'),
(27, '????', '????', '??', '127.0.0.1', '2016-08-09 19:59:50'),
(28, '????', '????', '??????', '127.0.0.1', '2016-08-09 20:00:06'),
(29, '????', '????', '??????', '127.0.0.1', '2016-08-09 20:00:10'),
(30, '????', '????', '??', '127.0.0.1', '2016-08-09 20:00:13'),
(31, '????', '????', '??', '127.0.0.1', '2016-08-09 20:00:18'),
(32, '', '????', '???admin', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `login_history`
--

CREATE TABLE IF NOT EXISTS `login_history` (
  `id` int(11) NOT NULL,
  `l_name` varchar(30) DEFAULT NULL,
  `l_ip` varchar(30) DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `login_history`
--

INSERT INTO `login_history` (`id`, `l_name`, `l_ip`, `create_dt`) VALUES
(1, 'admin', '127.0.0.1', '2016-08-02 23:48:40'),
(2, 'admin', '127.0.0.1', '2016-08-09 19:45:42');

-- --------------------------------------------------------

--
-- 資料表結構 `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `service`
--

INSERT INTO `service` (`id`, `content`) VALUES
(1, '<p>\r\n	<img alt="" src="/www/petshop/bcontroller/uploads/images/20160809142042.jpg" style="width: 960px; height: 1182px;" /></p>\r\n');

-- --------------------------------------------------------

--
-- 資料表結構 `sysconfig`
--

CREATE TABLE IF NOT EXISTS `sysconfig` (
  `id` int(11) NOT NULL,
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
  `google_map` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `sysconfig`
--

INSERT INTO `sysconfig` (`id`, `name`, `phone`, `fax`, `email`, `address`, `cis_img`, `company_info`, `youtube_url`, `remark`, `create_dt`, `edit_dt`, `google_map`) VALUES
(1, '12', '15', '16', '17', '14', '1384770497.4.jpg', '13', '', NULL, NULL, '2013-11-11 10:12:00', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `sysuser`
--

CREATE TABLE IF NOT EXISTS `sysuser` (
  `sys_id` int(11) NOT NULL,
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
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `sysuser`
--

INSERT INTO `sysuser` (`sys_id`, `sys`, `pwd`, `group`, `type`, `name`, `pet_name`, `email`, `sex`, `mobile`, `phone`, `address`, `pwd_qus`, `pwd_ans`, `remark`, `create_dt`, `edit_dt`, `day`, `month`, `year`, `img`) VALUES
(1, 'admin', 'cGFzc3dvcmQ=', '1', '1', '管理員', 'admin', '1', '0', '1', '15', '141', '1', '1', '<p>\r\n	1</p>\r\n', NULL, '2016-08-09 20:08:06', '9', 'June', '1913', '');

-- --------------------------------------------------------

--
-- 資料表結構 `taiwancloud`
--

CREATE TABLE IF NOT EXISTS `taiwancloud` (
  `id` int(11) NOT NULL,
  `cloudname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cloudpassword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `taiwancloud`
--

INSERT INTO `taiwancloud` (`id`, `cloudname`, `cloudpassword`) VALUES
(1, 'taiwancloud', 'dGFpd2FuY2xvdWQxcWF6');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `acc_id` int(11) NOT NULL,
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
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`acc_id`, `acc`, `pwd`, `group`, `type`, `name`, `pet_name`, `email`, `sex`, `phone`, `mobile`, `address`, `pwd_qus`, `pwd_ans`, `remark`, `create_dt`, `edit_dt`, `year`, `month`, `day`, `img`) VALUES
(5, '1', 'MQ==', '1', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '<p>\r\n	1</p>\r\n', '2013-11-11 10:32:05', '2013-11-22 15:44:31', '1900', '9', '1', '1385106192.496.jpg'),
(6, 'admin', 'MTIzNA==', '1', '1', '115', '12', '16', '0', '1', '1', '1', '1', '1', '<p>\r\n	1</p>\r\n', '2013-11-12 13:44:44', '2013-11-22 17:09:16', '1996', '11', '1', '1385106018.0464.jpg');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `analytics_c`
--
ALTER TABLE `analytics_c`
  ADD PRIMARY KEY (`c_id`);

--
-- 資料表索引 `analytics_n`
--
ALTER TABLE `analytics_n`
  ADD PRIMARY KEY (`n_id`);

--
-- 資料表索引 `demo_index`
--
ALTER TABLE `demo_index`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `edit_history`
--
ALTER TABLE `edit_history`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sysconfig`
--
ALTER TABLE `sysconfig`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sysuser`
--
ALTER TABLE `sysuser`
  ADD PRIMARY KEY (`sys_id`);

--
-- 資料表索引 `taiwancloud`
--
ALTER TABLE `taiwancloud`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`acc_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `analytics_c`
--
ALTER TABLE `analytics_c`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- 使用資料表 AUTO_INCREMENT `analytics_n`
--
ALTER TABLE `analytics_n`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- 使用資料表 AUTO_INCREMENT `demo_index`
--
ALTER TABLE `demo_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `edit_history`
--
ALTER TABLE `edit_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- 使用資料表 AUTO_INCREMENT `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `sysconfig`
--
ALTER TABLE `sysconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `sysuser`
--
ALTER TABLE `sysuser`
  MODIFY `sys_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `taiwancloud`
--
ALTER TABLE `taiwancloud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
