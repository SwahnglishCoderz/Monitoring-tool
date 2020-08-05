-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 09:23 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `report1`(IN `region` VARCHAR(45))
BEGIN



SELECT 
DISTINCT EXTRACT(MONTH FROM start_time) as Month,
count( DISTINCT user_name) as unique_logins,
COUNT(application) as number_access,
clusters_cluster_id, 
SUM(TIME_TO_SEC(`Total_system_hours`))/3600 as Total_system_hours 

FROM monitored_info 
WHERE clusters_cluster_id = region
group by   clusters_cluster_id;


SELECT
clusters_cluster_id,
EXTRACT(MONTH FROM start_time) as Month, 
count(DISTINCT user_name) as unique_logins, COUNT( application) as number_access, 
application as application_name, SUM(TIME_TO_SEC(`Total_system_hours`))/60 as Total_system_hours 
from monitored_info 
WHERE clusters_cluster_id = region
group by EXTRACT(MONTH FROM start_time), application;




SELECT 
clusters_cluster_id,
EXTRACT(MONTH FROM start_time) as Month, 
EXTRACT(WEEK FROM start_time) as week,
(select distinct user_name) as unique_login,
COUNT( application) as number_access,
SUM(TIME_TO_SEC(`Total_system_hours`))/60 as Total_system_hours 

from monitored_info 
WHERE clusters_cluster_id = region
group by EXTRACT(MONTH FROM start_time), EXTRACT(WEEK FROM start_time),user_name;



SELECT
clusters_cluster_id, 
EXTRACT(MONTH FROM start_time) as Month, 
EXTRACT(WEEK FROM start_time) as week, 
start_time as date, 
id, 
user_name as unique_logins,
count(application) as number_access,application as application_name,
SUM(TIME_TO_SEC(`Total_system_hours`))/60 as Total_system_hours 

from monitored_info 
WHERE clusters_cluster_id = region

group by EXTRACT(MONTH FROM start_time), EXTRACT(WEEK FROM start_time), user_name, application ;




SELECT 
EXTRACT(MONTH FROM start_time) as Month,
EXTRACT(WEEK FROM start_time) as week, 
start_time as date,
id, 
user_name as unique_logins, application as application_name, 
start_time as start_time, 
end_time as end_time, 
bases_base_id as bases_base_id, 
clusters_cluster_id as clusters_cluster_id, centers_center_id as centers_center_id 
from monitored_info
WHERE clusters_cluster_id = region;




END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bases`
--

CREATE TABLE IF NOT EXISTS `bases` (
  `base_id` varchar(10) NOT NULL,
  `base_name` varchar(100) NOT NULL,
  PRIMARY KEY (`base_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bases`
--

INSERT INTO `bases` (`base_id`, `base_name`) VALUES
('1', 'NOTHERN'),
('2', 'LAKE'),
('3', 'CENTRAL');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE IF NOT EXISTS `centers` (
  `center_id` varchar(10) NOT NULL,
  `center_name` varchar(100) NOT NULL,
  `clusters_cluster_id` varchar(10) NOT NULL,
  PRIMARY KEY (`center_id`),
  KEY `fk_centers_clusters1_idx` (`clusters_cluster_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`center_id`, `center_name`, `clusters_cluster_id`) VALUES
('', 'NYUMBA YA MUNGU', '1'),
('TZ 219', 'NJAU', '7'),
('TZ 315', 'MNG''ONGOSO', '3'),
('TZ 318', 'ISAYA', '7'),
('TZ 326', 'SADOCK', '7'),
('TZ 327', 'DENIS', '7'),
('TZ 330', 'EMMY', '7'),
('TZ 660', 'VUMI', '7'),
('TZ 665 ', 'ISRAEL', '7'),
('TZ-0955', 'AICT ILEMELA ', '8'),
('TZ-136', 'TAG KITETE', '6'),
('TZ-138', 'TAG MARANATHA', '6'),
('TZ-342', 'ANGLICAN ISEVYA', '6'),
('TZ-507', 'BAPTIST ISEVYA', '6'),
('TZ-557', 'MORAVIAN MORIA', '6'),
('TZ-558', 'MORAVIAN MILUMBANI', '6'),
('TZ-559', 'MORAVIAN CHEMCHEM', '6'),
('TZ-668', 'EAGT KILOLENI', '6'),
('TZ-673', 'EAGT RELI', '6'),
('TZ-820', 'FPCT NG''AMBO', '6'),
('TZ-822', 'FPCT RUFITA', '6'),
('TZ-959', 'AICT KITETE', '6'),
('TZ0112', 'TAG KARATU', '1'),
('TZ0134', 'TAG JERUSALEM BASHAI', '1'),
('TZ0225', 'OLDEAN LUTHERAN KARATU', '1'),
('TZ0402', 'ELIM PENTECOST KARATU', '1'),
('TZ0505', 'BAPTIST LONGIDO', '3');

-- --------------------------------------------------------

--
-- Table structure for table `clusters`
--

CREATE TABLE IF NOT EXISTS `clusters` (
  `cluster_id` varchar(10) NOT NULL,
  `cluster_name` varchar(100) NOT NULL,
  `bases_base_id` varchar(10) NOT NULL,
  PRIMARY KEY (`cluster_id`),
  KEY `fk_clusters_bases1_idx` (`bases_base_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clusters`
--

INSERT INTO `clusters` (`cluster_id`, `cluster_name`, `bases_base_id`) VALUES
('1', 'KARATU', '1'),
('2', 'KATESH', '1'),
('3', 'ARUSHA', '1'),
('4', 'SAME', '1'),
('5', 'NYUMBA YA MUNGU', '1'),
('6', 'TABORA', '3'),
('7', 'MPWAPWA', '3'),
('8', 'MWANZA', '2');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_files`
--

CREATE TABLE IF NOT EXISTS `deleted_files` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `application` varchar(100) NOT NULL,
  `start_time` datetime(6) NOT NULL,
  `end_time` datetime(6) NOT NULL,
  `Total_system_hours` time(6) DEFAULT NULL,
  `centers_center_id` varchar(10) NOT NULL,
  `clusters_cluster_id` varchar(10) NOT NULL,
  `bases_base_id` varchar(10) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_files`
--

INSERT INTO `deleted_files` (`id`, `user_name`, `application`, `start_time`, `end_time`, `Total_system_hours`, `centers_center_id`, `clusters_cluster_id`, `bases_base_id`, `time`) VALUES
(2, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Rogic', '2019-11-27 21:44:37.800732', '2019-11-27 21:45:15.900104', '00:00:38.099372', 'TZ0505', '7', '3', '2020-06-14 10:39:53'),
(5, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Rogic', '2019-11-27 22:13:53.034961', '2019-11-27 22:14:24.980562', '00:00:31.945601', 'TZ0505', '8', '3', '2020-06-14 10:41:29'),
(6, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms PowerPoint', '2019-11-27 23:09:20.514194', '2019-11-27 23:09:23.716569', '00:00:03.202375', 'TZ0505', '8', '3', '2020-06-14 10:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `error_log`
--

CREATE TABLE IF NOT EXISTS `error_log` (
  `ID` int(42) NOT NULL,
  `File_Name` varchar(42) NOT NULL,
  `Upload_Date` date NOT NULL,
  `Status` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monitored_info`
--

CREATE TABLE IF NOT EXISTS `monitored_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `application` varchar(100) NOT NULL,
  `start_time` datetime(6) NOT NULL,
  `end_time` datetime(6) NOT NULL,
  `Total_system_hours` time(6) DEFAULT NULL,
  `centers_center_id` varchar(10) NOT NULL,
  `clusters_cluster_id` varchar(10) NOT NULL,
  `bases_base_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_monitored_info_centers_idx` (`centers_center_id`),
  KEY `fk_monitored_info_clusters1_idx` (`clusters_cluster_id`),
  KEY `fk_monitored_info_bases1_idx` (`bases_base_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=302 ;

--
-- Dumping data for table `monitored_info`
--

INSERT INTO `monitored_info` (`id`, `user_name`, `application`, `start_time`, `end_time`, `Total_system_hours`, `centers_center_id`, `clusters_cluster_id`, `bases_base_id`) VALUES
(3, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms PowerPoint', '2019-11-27 21:45:31.693273', '2019-11-27 21:45:41.300394', '00:00:09.607121', 'TZ0505', '7', '3'),
(4, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms PowerPoint', '2019-11-27 22:12:36.131125', '2019-11-27 22:13:04.983742', '00:00:28.852617', 'TZ0505', '8', '3'),
(7, 'EXCEL.EXE', 'Ms Excel', '2019-11-28 02:03:43.420216', '2019-11-28 02:03:46.882423', '00:00:03.462207', 'TZ0505', '8', '3'),
(8, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Excel', '2019-11-28 02:06:16.355617', '2019-11-28 02:09:37.475254', '00:03:21.119637', 'TZ0505', '8', '3'),
(9, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Excel', '2019-11-28 02:11:41.954586', '2019-11-28 02:11:55.072364', '00:00:13.117778', 'TZ0505', '8', '3'),
(10, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Excel', '2019-11-28 02:12:04.889634', '2019-11-28 02:12:08.165652', '00:00:03.276018', 'TZ0505', '8', '3'),
(11, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Word', '2019-11-28 03:33:17.365836', '2019-11-28 03:33:20.490097', '00:00:03.124261', 'TZ0505', '8', '3'),
(12, 'WINWORD.EXE', 'Ms Word', '2019-11-28 03:40:33.172353', '2019-11-28 03:41:13.606915', '00:00:40.434562', 'TZ0505', '8', '3'),
(13, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Word', '2019-11-28 03:37:58.200797', '2019-11-28 04:56:29.758620', '01:18:31.557823', 'TZ0505', '8', '3'),
(14, 'WINWORD.EXE', 'Ms PowerPoint', '2019-11-28 04:56:29.758620', '2019-11-28 04:56:33.007882', '00:00:03.249262', 'TZ0505', '8', '3'),
(15, 'WINWORD.EXE', 'Ms Word', '2019-11-28 04:58:17.186385', '2019-11-28 04:58:20.404341', '00:00:03.217956', 'TZ0505', '8', '3'),
(16, 'WINWORD.EXE', 'Ms Word', '2019-11-28 05:37:15.743007', '2019-11-28 05:37:18.992211', '00:00:03.249204', 'TZ0505', '8', '3'),
(17, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Word', '2019-11-28 05:19:51.380482', '2019-11-28 05:51:43.147331', '00:31:51.766849', 'TZ0505', '8', '3'),
(18, 'WINWORD.EXE', 'Ms Word', '2019-11-28 05:39:19.416901', '2019-11-28 05:51:43.147331', '00:12:23.730430', 'TZ0505', '8', '3'),
(19, 'WINWORD.EXE', 'Ms Word', '2019-11-28 05:51:55.410058', '2019-11-28 05:51:58.643698', '00:00:03.233640', 'TZ0505', '8', '3'),
(21, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Word', '2019-11-28 08:21:24.496501', '2019-11-28 08:22:18.780797', '00:00:54.284296', 'TZ0505', '8', '3'),
(22, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 08:22:33.929895', '2019-11-28 08:22:51.997431', '00:00:18.067536', 'TZ0505', '8', '3'),
(23, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 08:22:55.022772', '2019-11-28 08:23:07.068916', '00:00:12.046144', 'TZ0505', '8', '3'),
(24, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms PowerPoint', '2019-11-28 08:23:16.113648', '2019-11-28 08:24:04.352264', '00:00:48.238616', 'TZ0505', '7', '3'),
(25, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Word', '2019-11-28 08:23:10.083827', '2019-11-28 08:24:10.382143', '00:01:00.298316', 'TZ0505', '8', '3'),
(26, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 08:24:28.471563', '2019-11-28 08:24:34.501341', '00:00:06.029778', 'TZ0505', '8', '3'),
(27, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms PowerPoint', '2019-11-28 08:33:22.107462', '2019-11-28 08:33:55.271252', '00:00:33.163790', 'TZ0505', '8', '3'),
(28, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 08:34:04.315958', '2019-11-28 08:34:22.405760', '00:00:18.089802', 'TZ0505', '8', '3'),
(29, 'ELIM_KARATU_04\\ELIM KARATU 04', 'notepad', '2019-11-28 08:34:37.511261', '2019-11-28 08:34:49.571183', '00:00:12.059922', 'TZ0505', '8', '3'),
(30, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Word', '2019-11-28 10:02:40.612764', '2019-11-28 10:03:13.777059', '00:00:33.164295', 'TZ0505', '8', '3'),
(31, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms PowerPoint', '2019-11-28 10:11:19.293108', '2019-11-28 10:12:34.712153', '00:01:15.419045', 'TZ0505', '8', '3'),
(32, 'ELIM_KARATU_04\\ELIM KARATU 04', 'scratch', '2019-11-28 10:12:49.809928', '2019-11-28 10:13:05.560515', '00:00:15.750587', 'TZ0505', '8', '3'),
(33, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms PowerPoint', '2019-11-28 10:13:41.754819', '2019-11-28 10:13:59.875738', '00:00:18.120919', 'TZ0505', '8', '3'),
(34, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 10:15:03.204278', '2019-11-28 10:15:15.264182', '00:00:12.059904', 'TZ0505', '8', '3'),
(35, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Publisher', '2019-11-28 14:24:23.960378', '2019-11-28 14:24:36.003790', '00:00:12.043412', 'TZ0505', '8', '3'),
(36, 'ELIM_KARATU_04\\EZEKIEL_TZ0134-0253', 'Ms Word', '2019-11-28 14:39:36.058098', '2019-11-28 14:39:51.132847', '00:00:15.074749', 'TZ0505', '8', '3'),
(37, 'ELIM_KARATU_04\\OMBENI_TZ0134-0169', 'Ms Word', '2019-11-28 14:45:01.731741', '2019-11-28 15:45:47.312280', '01:00:45.580539', 'TZ0505', '8', '3'),
(38, 'ELIM_KARATU_04\\EZEKIEL_TZ0134-0253', 'Ms Word', '2019-11-28 14:40:06.254051', '2019-11-28 15:49:17.968608', '01:09:11.714557', 'TZ0505', '8', '3'),
(40, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Word', '2019-11-28 08:21:24.496501', '2019-11-28 08:22:18.780797', '00:00:54.284296', 'TZ0505', '8', '3'),
(41, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 08:22:33.929895', '2019-11-28 08:22:51.997431', '00:00:18.067536', 'TZ0505', '8', '3'),
(42, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 08:22:55.022772', '2019-11-28 08:23:07.068916', '00:00:12.046144', 'TZ0505', '8', '3'),
(43, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms PowerPoint', '2019-11-28 08:23:16.113648', '2019-11-28 08:24:04.352264', '00:00:48.238616', 'TZ0505', '8', '3'),
(44, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Word', '2019-11-28 08:23:10.083827', '2019-11-28 08:24:10.382143', '00:01:00.298316', 'TZ0505', '8', '3'),
(45, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 08:24:28.471563', '2019-11-28 08:24:34.501341', '00:00:06.029778', 'TZ0505', '8', '3'),
(46, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms PowerPoint', '2019-11-28 08:33:22.107462', '2019-11-28 08:33:55.271252', '00:00:33.163790', 'TZ0505', '8', '3'),
(47, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 08:34:04.315958', '2019-11-28 08:34:22.405760', '00:00:18.089802', 'TZ0505', '8', '3'),
(48, 'ELIM_KARATU_04\\ELIM KARATU 04', 'notepad', '2019-11-28 08:34:37.511261', '2019-11-28 08:34:49.571183', '00:00:12.059922', 'TZ0505', '8', '3'),
(49, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Word', '2019-11-28 10:02:40.612764', '2019-11-28 10:03:13.777059', '00:00:33.164295', 'TZ0505', '8', '3'),
(50, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms PowerPoint', '2019-11-28 10:11:19.293108', '2019-11-28 10:12:34.712153', '00:01:15.419045', 'TZ0505', '8', '3'),
(51, 'ELIM_KARATU_04\\ELIM KARATU 04', 'scratch', '2019-11-28 10:12:49.809928', '2019-11-28 10:13:05.560515', '00:00:15.750587', 'TZ0505', '8', '3'),
(52, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms PowerPoint', '2019-11-28 10:13:41.754819', '2019-11-28 10:13:59.875738', '00:00:18.120919', 'TZ0505', '8', '3'),
(53, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Excel', '2019-11-28 10:15:03.204278', '2019-11-28 10:15:15.264182', '00:00:12.059904', 'TZ0505', '8', '3'),
(54, 'ELIM_KARATU_04\\ELIM KARATU 04', 'Ms Publisher', '2019-11-28 14:24:23.960378', '2019-11-28 14:24:36.003790', '00:00:12.043412', 'TZ0505', '8', '3'),
(55, 'ELIM_KARATU_04\\EZEKIEL_TZ0134-0253', 'Ms Word', '2019-11-28 14:39:36.058098', '2019-11-28 14:39:51.132847', '00:00:15.074749', 'TZ0505', '8', '3'),
(56, 'ELIM_KARATU_04\\OMBENI_TZ0134-0169', 'Ms Word', '2019-11-28 14:45:01.731741', '2019-11-28 15:45:47.312280', '01:00:45.580539', 'TZ0505', '8', '3'),
(57, 'ELIM_KARATU_04\\EZEKIEL_TZ0134-0253', 'Ms Word', '2019-11-28 14:40:06.254051', '2019-11-28 15:49:17.968608', '01:09:11.714557', 'TZ0505', '8', '3'),
(59, 'ELIM_KARATU_03\\ELIM KARATU 03', 'Ms Word', '2019-11-28 02:18:10.177158', '2019-11-28 02:18:29.714907', '00:00:19.537749', 'TZ0505', '8', '3'),
(60, 'ELIM_KARATU_03\\ELIM KARATU 03', 'Ms Excel', '2019-11-28 02:18:42.781571', '2019-11-28 03:14:46.804084', '00:56:04.022513', 'TZ0505', '8', '3'),
(61, 'WINWORD.EXE', 'Ms Word', '2019-11-28 03:32:45.303095', '2019-11-28 03:32:48.740983', '00:00:03.437888', 'TZ0505', '8', '3'),
(62, 'WINWORD.EXE', 'Ms Word', '2019-11-28 03:33:35.182070', '2019-11-28 03:33:38.590573', '00:00:03.408503', 'TZ0505', '8', '3'),
(63, 'WINWORD.EXE', 'Ms Word', '2019-11-28 03:33:50.088105', '2019-11-28 03:33:53.497198', '00:00:03.409093', 'TZ0505', '8', '3'),
(64, 'WINWORD.EXE', 'Ms Word', '2019-11-28 03:38:09.682726', '2019-11-28 03:38:13.160806', '00:00:03.478080', 'TZ0505', '8', '3'),
(65, 'WINWORD.EXE', 'Ms Word', '2019-11-28 03:39:00.183063', '2019-11-28 03:39:03.621198', '00:00:03.438135', 'TZ0505', '8', '3'),
(66, 'WINWORD.EXE', 'Ms Word', '2019-11-28 03:40:23.507985', '2019-11-28 03:40:26.969461', '00:00:03.461476', 'TZ0505', '8', '3'),
(67, 'usernames', 'application', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '00:00:00.000000', 'TZ0505', '8', '3'),
(68, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Hour Of Code', '2019-11-27 21:44:37.800732', '2019-11-27 21:45:15.900104', '00:00:38.099372', 'TZ0505', '8', '3'),
(69, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Excel', '2019-11-27 21:45:31.693273', '2019-11-27 21:45:41.300394', '00:00:09.607121', 'TZ0505', '8', '3'),
(70, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms PowerPoint', '2019-11-27 22:12:36.131125', '2019-11-27 22:13:04.983742', '00:00:28.852617', 'TZ0505', '8', '3'),
(71, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms PowerPoint', '2019-11-27 22:13:53.034961', '2019-11-27 22:14:24.980562', '00:00:31.945601', 'TZ0505', '8', '3'),
(72, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms PowerPoint', '2019-11-27 23:09:20.514194', '2019-11-27 23:09:23.716569', '00:00:03.202375', 'TZ0505', '8', '3'),
(73, 'EXCEL.EXE', 'Ms Excel', '2019-11-28 02:03:43.420216', '2019-11-28 02:03:46.882423', '00:00:03.462207', 'TZ0505', '8', '3'),
(74, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Excel', '2019-11-28 02:06:16.355617', '2019-11-28 02:09:37.475254', '00:03:21.119637', 'TZ0505', '8', '3'),
(75, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Excel', '2019-11-28 02:11:41.954586', '2019-11-28 02:11:55.072364', '00:00:13.117778', 'TZ0505', '8', '3'),
(76, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Excel', '2019-11-28 02:12:04.889634', '2019-11-28 02:12:08.165652', '00:00:03.276018', 'TZ0505', '8', '3'),
(77, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Word', '2019-11-28 03:33:17.365836', '2019-11-28 03:33:20.490097', '00:00:03.124261', 'TZ0505', '8', '3'),
(78, 'WINWORD.EXE', 'Ms Word', '2019-11-28 03:40:33.172353', '2019-11-28 03:41:13.606915', '00:00:40.434562', 'TZ0505', '8', '3'),
(79, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Word', '2019-11-28 03:37:58.200797', '2019-11-28 04:56:29.758620', '01:18:31.557823', 'TZ0505', '8', '3'),
(80, 'WINWORD.EXE', 'Ms Word', '2019-11-28 04:56:29.758620', '2019-11-28 04:56:33.007882', '00:00:03.249262', 'TZ0505', '8', '3'),
(81, 'WINWORD.EXE', 'Ms Word', '2019-11-28 04:58:17.186385', '2019-11-28 04:58:20.404341', '00:00:03.217956', 'TZ0505', '8', '3'),
(82, 'WINWORD.EXE', 'Ms Word', '2019-11-28 05:37:15.743007', '2019-11-28 05:37:18.992211', '00:00:03.249204', 'TZ0505', '8', '3'),
(83, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Word', '2019-11-28 05:19:51.380482', '2019-11-28 05:51:43.147331', '00:31:51.766849', 'TZ0505', '8', '3'),
(84, 'WINWORD.EXE', 'Ms Word', '2019-11-28 05:39:19.416901', '2019-11-28 05:51:43.147331', '00:12:23.730430', 'TZ0505', '8', '3'),
(85, 'WINWORD.EXE', 'Ms Word', '2019-11-28 05:51:55.410058', '2019-11-28 05:51:58.643698', '00:00:03.233640', 'TZ0505', '8', '3');

--
-- Triggers `monitored_info`
--
DROP TRIGGER IF EXISTS `after_monitored_info`;
DELIMITER //
CREATE TRIGGER `after_monitored_info` AFTER INSERT ON `monitored_info`
 FOR EACH ROW BEGIN
		  INSERT INTO uploaded_files (File_ID,File_Name,Upload_Date,Status)
          VALUES (new.id,'File NAME',NOW(),'Complite');
    
    END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_monitored_info`;
DELIMITER //
CREATE TRIGGER `before_monitored_info` AFTER UPDATE ON `monitored_info`
 FOR EACH ROW BEGIN
		  INSERT INTO updated_files (`id`,
`user_name`,
`application`,
`start_time`,
`end_time`,
`Total_system_hours`,
`centers_center_id`,
`clusters_cluster_id`,
`bases_base_id`,
`time`)
VALUES
(old.id,
old.user_name,
old.application,
old.start_time,
old.end_time,
old.Total_system_hours,
old.centers_center_id,
old.clusters_cluster_id,
old.bases_base_id,
NOW());
    
    END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_nonitored_info`;
DELIMITER //
CREATE TRIGGER `before_nonitored_info` AFTER DELETE ON `monitored_info`
 FOR EACH ROW BEGIN
		  INSERT INTO deleted_files (`id`,
`user_name`,
`application`,
`start_time`,
`end_time`,
`Total_system_hours`,
`centers_center_id`,
`clusters_cluster_id`,
`bases_base_id`,
`time`)
VALUES
(old.id,
old.user_name,
old.application,
old.start_time,
old.end_time,
old.Total_system_hours,
old.centers_center_id,
old.clusters_cluster_id,
old.bases_base_id,
NOW());
    
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `updated_files`
--

CREATE TABLE IF NOT EXISTS `updated_files` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `application` varchar(100) NOT NULL,
  `start_time` datetime(6) NOT NULL,
  `end_time` datetime(6) NOT NULL,
  `Total_system_hours` time(6) DEFAULT NULL,
  `centers_center_id` varchar(10) NOT NULL,
  `clusters_cluster_id` varchar(10) NOT NULL,
  `bases_base_id` varchar(10) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updated_files`
--

INSERT INTO `updated_files` (`id`, `user_name`, `application`, `start_time`, `end_time`, `Total_system_hours`, `centers_center_id`, `clusters_cluster_id`, `bases_base_id`, `time`) VALUES
(3, 'ELIM_KARATU_02\\ELIM KARATU 02', 'Ms Excel', '2019-11-27 21:45:31.693273', '2019-11-27 21:45:41.300394', '00:00:09.607121', 'TZ0505', '7', '3', '2020-06-14 16:48:41'),
(14, 'WINWORD.EXE', 'Ms Word', '2019-11-28 04:56:29.758620', '2019-11-28 04:56:33.007882', '00:00:03.249262', 'TZ0505', '8', '3', '2020-06-14 16:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE IF NOT EXISTS `uploaded_files` (
  `ID` int(42) NOT NULL AUTO_INCREMENT,
  `File_Name` varchar(42) NOT NULL,
  `Upload_Date` varchar(30) NOT NULL,
  `Status` varchar(42) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`ID`, `File_Name`, `Upload_Date`, `Status`) VALUES
(4, 'e3aco_smc_db.sql', '30/04/2020', ''),
(5, 'monitoring TZ-0402_Nov28-2019_elim02.csv', '05/06/2020', ''),
(6, 'monitoring_server2.csv', '05/06/2020', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `fk_centers_clusters1` FOREIGN KEY (`clusters_cluster_id`) REFERENCES `clusters` (`cluster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `clusters`
--
ALTER TABLE `clusters`
  ADD CONSTRAINT `fk_clusters_bases1` FOREIGN KEY (`bases_base_id`) REFERENCES `bases` (`base_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `monitored_info`
--
ALTER TABLE `monitored_info`
  ADD CONSTRAINT `fk_monitored_info_bases1` FOREIGN KEY (`bases_base_id`) REFERENCES `bases` (`base_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_monitored_info_centers` FOREIGN KEY (`centers_center_id`) REFERENCES `centers` (`center_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_monitored_info_clusters1` FOREIGN KEY (`clusters_cluster_id`) REFERENCES `clusters` (`cluster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
