-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 01:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bighms`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbar`
--

CREATE TABLE `addbar` (
  `id` int(32) NOT NULL,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(45) DEFAULT '',
  `instock` varchar(45) DEFAULT '0',
  `itemleft` int(45) DEFAULT 0,
  `measure` varchar(50) DEFAULT 'bottle',
  `quantity` varchar(50) DEFAULT '1',
  `costprice` int(50) DEFAULT 0,
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `barcode` varchar(80) DEFAULT '',
  `newstock` int(45) DEFAULT 0,
  `oldremstock` int(45) DEFAULT 0,
  `laststockadd` int(45) DEFAULT 0,
  `datelaststockadd` varchar(50) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `addbar`
--

INSERT INTO `addbar` (`id`, `name`, `categoryid`, `instock`, `itemleft`, `measure`, `quantity`, `costprice`, `price`, `description`, `barcode`, `newstock`, `oldremstock`, `laststockadd`, `datelaststockadd`, `issync`) VALUES
(12, 'BLACK LABEL', '8', '479', 90, 'Bottle', '1', 6350, '14000', '', '', 90, 82, 8, '1613827706', '2'),
(13, 'CARLO ROSSI', '8', '680', 59, 'Bottle', '1', 2000, '8000', '', '085000001882', 66, 60, 6, '1606137094', '2'),
(14, 'ANDRE ROSE', '8', '1737', 185, 'Bottle', '1', 1950, '9000', '', '085000007495', 189, 183, 6, '1612181260', '2'),
(16, 'BAILEYS (BIG)', '8', '105', 16, 'Bottle', '1', 4350, '10000', '', '5011013100156', 16, 10, 6, '1613398591', '2'),
(17, 'METUS ROSE', '8', '547', 65, 'Bottle', '1', 0, '5000', '', '5601012011500', 66, 63, 3, '1613136945', '2'),
(18, 'DROSTDY HOF (SMALL)', '8', '23', 0, 'Bottle', '1', 0, '2000', '', '6001495200146', 0, 0, 0, NULL, '2'),
(21, 'CAN STAR', '8', '72', 9, 'Bottle', '1', 0, '1000', '', '5025866000129', 54, 0, 54, NULL, '2'),
(22, 'CAN GULDER', '8', '24', 9, 'Bottle', '1', 0, '1000', '', '5025866000259', 15, 0, 15, NULL, '2'),
(23, 'CAN MONSTER', '8', '628', 99, 'Bottle', '1', 0, '1000', '', '5060337502702', 127, 103, 24, '1607347261', '2'),
(24, 'MOET ROSE', '8', '130', 24, 'Bottle', '1', 0, '45000', '', '3185370377369', 24, 12, 12, '1613828216', '2'),
(25, 'MOET ROSE (SMALL)', '8', '0', 0, 'Bottle', '1', 0, '15000', '', '3185370489437', 0, 0, 0, NULL, '2'),
(26, 'CAMPARI (BIG)', '8', '352', 58, 'Bottle', '1', 0, '10000', '', '8000040000802', 58, 52, 6, '1613828190', '2'),
(27, 'AMERICAN HONEY', '8', '128', 27, 'Bottle', '1', 0, '7000', '', '721059817509', 29, 17, 12, '1612016419', '2'),
(28, 'BEST CREAM (BIG)', '8', '267', 30, 'Bottle', '1', 0, '6000', '', '6009675692484', 30, 24, 6, '1613398569', '2'),
(29, 'HENESSY XO', '8', '22', 12, 'Bottle', '1', 80000, '150000', '', '3245990001218', 12, 9, 3, '1612014976', '2'),
(30, 'HENNESSY VSOP', '8', '141', 18, 'Bottle', '1', 21250, '50000', '', '3245990969402', 18, 12, 6, '1613828165', '2'),
(31, 'HENNESSY VS', '8', '207', 39, 'Bottle', '1', 13750, '35000', '', '3245990250203', 39, 33, 6, '1613828141', '2'),
(32, 'HENNESSY VS (SMALL)', '8', '77', 8, 'Bottle', '1', 7000, '18000', '', '3245990250302', 8, 2, 6, '1613398617', '2'),
(33, 'RAZON (RED WINE VIN ROUGE)', '8', '176', 68, 'Bottle', '1', 0, '4000', '', '8437008052519', 68, 56, 12, '1613827662', '2'),
(34, 'GOTAS DE PLATA', '8', '365', 88, 'Bottle', '1', 1200, '6000', '', '8429309001020', 97, 67, 30, '1606299916', '2'),
(35, 'CAN MALTINA', '3', '1', 0, 'Bottle', '1', 0, '500', '', '5025866000181', 0, 0, 0, NULL, '2'),
(36, 'CAN SMIRNOFF ICE ', '8', '88', 10, 'Bottle', '1', 0, '1000', '', '5410316946131', 24, 0, 24, '1578739085', '2'),
(37, 'CAN AMSTEL MALTA', '3', '20', 13, 'Bottle', '1', 0, '500', '', '5025866000082', 13, 0, 13, NULL, '2'),
(46, 'JACK DANIELS', '8', '174', 20, 'Bottle', '1', 6100, '15000', '', '082184090466', 31, 26, 5, '1603711278', '2'),
(48, 'WATER', '8', '6132', 1235, 'Bottle', '1', 0, '200', '', '', 1235, 1175, 60, '1613827929', '2'),
(49, 'ABSOLUTE VODKA', '8', '3', 0, 'Bottle', '1', 0, '8000', '', '7312040017034', 0, 0, 0, NULL, '2'),
(50, 'SMIRNOFF ORANGE 1 LITRE', '8', '1', 0, 'Bottle', '1', 0, '8000', '', '5410316982382', 1, 0, 1, NULL, '2'),
(51, 'MAGIC MOMENTS', '8', '254', 30, 'Bottle', '1', 1600, '5000', '', '8902147000511', 30, 25, 5, '1613827728', '2'),
(52, 'SMIRNOFF  CHOCOLATE VODKA 75CL', '8', '165', 47, 'Bottle', '1', 1350, '6000', '', '5410316948791', 47, 43, 4, '1613827751', '2'),
(53, 'SMIRNOFF GREEN APPLE ', '8', '2', 0, 'Bottle', '2', 0, '8000', '', '5410316984775', 1, 0, 1, NULL, '2'),
(54, 'RED LABEL', '8', '1485', 140, 'Bottle', '1', 3500, '7000', '', '5000267014203', 140, 128, 12, '1613827680', '2'),
(55, 'CAN POWER HORSE', '8', '2013', 307, 'Bottle', '1', 0, '500', '', '9008442000320', 307, 259, 48, '1613827140', '2'),
(56, 'CAN CLIMAX', '8', '983', 127, 'Bottle', '1', 0, '500', '', '5025866000952', 127, 103, 24, '1613828012', '2'),
(57, ' PLASTIC COCA COLA', '8', '2418', 533, 'Bottle', '1', 0, '500', '', '5449000000996', 548, 524, 24, '1613827953', '2'),
(58, 'CAN HEINEKEN ', '8', '402', 69, 'Bottle', '1', 0, '1000', '', '5025866000099', 69, 45, 24, '1611582993', '2'),
(59, 'CAN STAR RADLER', '8', '24', 2, 'Bottle', '1', 0, '1000', '', '5025866001027', 19, 0, 19, NULL, '2'),
(60, 'CAN ORIGIN', '8', '24', 4, 'Bottle', '1', 0, '1000', '', '5010103935630', 12, 0, 12, NULL, '2'),
(61, 'VEUVE CLICQUET', '8', '2', 0, 'Bottle', '1', 0, '25000', '', '3049610004104', 0, 0, 0, NULL, '2'),
(62, 'CAN 33', '8', '192', 50, 'Bottle', '1', 0, '1000', '', '5025866001195', 88, 40, 48, '1562571078', '2'),
(63, 'ORIS', '8', '391', 112, 'Bottle', '1', 0, '500', '', '4260093460877', 112, 102, 10, '1613827852', '2'),
(64, 'BENSON', '8', '683', 183, 'Bottle', '1', 0, '500', '', '6156000056388', 183, 173, 10, '1613827829', '2'),
(65, 'DORCHESTER', '8', '260', 51, 'Bottle', '1', 0, '500', '', '5010175801574', 51, 41, 10, '1613827804', '2'),
(66, 'ROTHMANS', '8', '30', 1, 'Bottle', '1', 0, '500', '', '6156000056364', 3, 0, 3, NULL, '2'),
(67, 'CAN GUINESS', '8', '166', 41, 'Bottle', '1', 0, '1000', '', '5000213010952', 106, 10, 96, '1560155090', '2'),
(68, 'CAN MALTA GUINNESS', '8', '2', 1, 'Bottle', '1', 0, '500', '', '5010162000164', 1, 0, 1, NULL, '2'),
(69, 'Dunhill', '8', '622', 94, 'Bottle', '1', 0, '600', '', '7612400026189', 94, 84, 10, '1613137204', '2'),
(70, 'chamdor', '3', '148', 25, 'Bottle', '1', 0, '3000', '', '6001495080106', 25, 19, 6, '1612613107', '2'),
(71, 'SHISHA', '8', '595', 192, 'Bottle', '2', 0, '2000', '', '', 192, 177, 15, '1613136860', '2'),
(72, 'Extra Chacoal shisha', '8', '1', 1, 'Bottle', '1', 0, '1000', '', '', 1, 0, 1, NULL, '2'),
(126, ' LA MONDENSE LAMBRUSCO', '8', '66', 0, 'Bottle', '1', 0, '4000', '', '8008920850080', 6, 0, 6, '1575884245', '2'),
(127, 'REUNITE LAMBRUSCO', '8', '363', 121, 'Bottle', '1', 0, '5000', '', '080516135144', 121, 109, 12, '1613828084', '2'),
(133, 'MARTELL BLUE SWIFT', '8', '51', 10, 'Bottle', '1', 18350, '32000', '', '3219820005608', 11, 6, 5, '1599572550', '2'),
(134, 'DUSSE VSOP', '8', '6', 3, 'Bottle', '1', 0, '20000', '', '080480002923', 4, 0, 4, NULL, '2'),
(135, 'GLENFIDDICH WHISKY 12 YEARS', '8', '83', 13, 'Bottle', '1', 9100, '25000', '', '5010327000176', 13, 8, 5, '1613137002', '2'),
(136, 'CIROC', '8', '115', 41, 'Bottle', '1', 0, '30000', '', '5010103912976', 41, 40, 1, '1613730866', '2'),
(139, 'REMY MARTINS VSOP', '8', '61', 2, 'Bottle', '1', 14600, '30000', '', ' ', 11, 5, 6, '1600515115', '2'),
(141, ' PET COKE SMALL', '3', '130', 20, 'Bottle', '1', 0, '300', '', '', 27, 0, 27, NULL, '2'),
(146, 'GLENFFIDISH 15 YRS OLD', '8', '34', 15, 'Bottle', '1', 15450, '35000', '', '', 15, 11, 4, '1612613085', '2'),
(147, 'BOTTLE COKE', '8', '261', 252, 'Bottle', '1', 0, '200', '', '', 252, 204, 48, '1560153388', '2'),
(150, 'DROSTDY HOF (BIG)', '8', '32', 0, 'Bottle', '1', 0, '4000', '', '6001495201501', 12, 0, 12, '1560621087', '2'),
(154, 'CRANBERRY JUICE', '8', '423', 77, 'Bottle', '1', 0, '2000', '', '1', 77, 69, 8, '1613828237', '2'),
(158, 'JAMESON', '8', '208', 68, 'Bottle', '1', 5000, '10000', '', '5011007003005', 68, 62, 6, '1613828110', '2'),
(163, 'SMALL BLACK LABEL ', '8', '24', 4, 'Bottle', '1', 0, '7000', '', '5000267024608', 7, 6, 1, '1602929718', '2'),
(168, 'NECTAR ROSE', '8', '60', 15, 'Bottle', '1', 0, '5000', '', '', 32, 26, 6, '1563474580', '2'),
(169, ' BULLET ', '3', '744', 172, 'Bottle', '1', 0, '500', '', '', 176, 128, 48, '1613827085', '2'),
(174, 'CLIMAX PET', '8', '48', 12, 'Bottle', '1', 167, '500', '', '', 12, 0, 12, '1611583142', '2'),
(175, 'GLENFIDDCH (18YRS)', '8', '49', 15, 'Bottle', '1', 20000, '70000', '', '', 15, 12, 3, '1611581998', '2'),
(176, 'CELLA LAMBRUSCO', '8', '36', 7, 'Bottle', '1', 0, '5000', '', '', 7, 1, 6, '1610806054', '2'),
(177, 'BOTTLE AMSTEL MALT', '8', '48', 48, 'Bottle', '1', 0, '200', '', '', 48, 0, 48, '1562571166', '2'),
(178, 'JAMESON BLACK BARREL', '8', '84', 28, 'Bottle', '1', 6300, '15000', '', '', 28, 22, 6, '1612016557', '2'),
(179, 'MARTINI ROSE', '8', '12', 0, 'Bottle', '1', 0, '6000', '', '', 6, 0, 6, '1581097052', '2'),
(180, 'TERRAZAC MELBEC', '8', '3', 2, 'Bottle', '1', 7000, '15000', '', '', 3, 0, 3, '1569836480', '2'),
(181, 'CLOUDY BAY', '8', '9', 5, 'Bottle', '1', 10500, '20000', '', '', 5, 2, 3, '1580998014', '2'),
(182, 'VEUVE CLICQOUT RICH', '8', '3', 1, 'Bottle', '1', 35500, '60000', '', '', 2, 1, 1, '1569848238', '2'),
(183, 'MOET IMPERIAL BRUT', '8', '0', 0, 'Bottle', '1', 20850, '40000', '', '', 0, 0, 0, '1569612447', '2'),
(184, 'MOET NECTAR IMPERIAL', '8', '0', 0, 'Bottle', '1', 25000, '45000', '', '', 0, 0, 0, '1569612476', '2'),
(185, 'MOET IMPERIAL ROSE', '8', '0', 0, 'Bottle', '1', 0, '40000', '', '', 0, 0, 0, '1569612498', '2'),
(186, 'MOET NECTAR IMPERIAL ROSE', '8', '2', 2, 'Bottle', '1', 26700, '50000', '', '', 2, 0, 2, '1569836330', '2'),
(187, 'MOET ICE IMPERIAL', '8', '15', 7, 'Bottle', '1', 29200, '60000', '', '6', 7, 4, 3, '1611582642', '2'),
(188, 'VEUVE CLICQUOT BRUT', '8', '2', 2, 'Bottle', '1', 23350, '50000', '', '', 2, 0, 2, '1569854708', '2'),
(189, 'VEUVE CLICQUOT  ROSE', '8', '2', 1, 'Bottle', '1', 30500, '55000', '', '', 2, 0, 2, '1569848390', '2'),
(190, 'DOM PENIGNOM LUMINOUS', '8', '5', 4, 'Bottle', '1', 85000, '150000', '', '', 4, 1, 3, '1577042553', '2'),
(191, 'GLENMORANGIE EXTREMELY RARE', '8', '2', 2, 'Bottle', '1', 43500, '80000', '', '', 2, 0, 2, '1569847616', '2'),
(192, 'GLENMORANGIE ORIGINAL', '8', '9', 6, 'Bottle', '1', 14200, '25000', '', '', 6, 2, 4, '1599637620', '2'),
(193, 'GLENMORANGIE LASANTA', '8', '3', 1, 'Bottle', '1', 17000, '30000', '', '', 1, 0, 1, '1583152310', '2'),
(194, 'GLENMORANGIE QVINTA RUBAN', '8', '3', 2, 'Bottle', '1', 17000, '35000', '', '', 2, 1, 1, '1583152276', '2'),
(195, 'GLENMORANGIE  SIGNET', '8', '2', 2, 'Bottle', '1', 52000, '99900', '', '', 2, 0, 2, '1569847239', '2'),
(196, 'BELEVEDERE PINK GRAPE FRUIT', '8', '2', 2, 'Bottle', '1', 17500, '35000', '', '', 2, 0, 2, '1569854745', '2'),
(197, 'BELEVEDERE VODKA INTENSE', '8', '3', 3, 'Bottle', '1', 18500, '35000', '', '', 3, 2, 1, '1598886932', '2'),
(198, 'BELEVEDERE VODKA', '8', '2', 1, 'Bottle', '1', 0, '26000', '', '', 2, 0, 2, '1569854770', '2'),
(199, 'BELEVEDERE CITRUS', '8', '0', 0, 'Bottle', '1', 17500, '40000', '', '', 0, 0, 0, '1569612866', '2'),
(200, 'BELEVEDERE BLACK RASPBERRY', '8', '0', 0, 'Bottle', '1', 17500, '35000', '', '', 0, 0, 0, '1569612884', '2'),
(201, 'GLENFIDDICH 21YRS', '8', '3', 3, 'Bottle', '1', 80000, '160000', '', '', 3, 2, 1, '1598886488', '2'),
(202, 'DOM P. VINTAGE BRUT', '8', '0', 0, 'Bottle', '1', 85000, '150000', '', '', 0, 0, 0, '1569848040', '2'),
(203, 'GLENMORANGIE NECTAR\'DOR', '8', '2', 0, 'Bottle', '1', 18750, '30000', '', '0', 2, 0, 2, '1570006365', '2'),
(204, 'SANGRIA RED WINE', '8', '0', 0, 'Bottle', '1', 0, '4000', '', '', 0, 0, 0, '1572248031', '2'),
(205, 'WHITE WALKER', '8', '24', 8, 'Bottle', '1', 9760, '20000', '', '', 15, 3, 12, '1574432545', '2'),
(206, 'VEGA CEDRON WINE', '8', '12', 0, 'Bottle', '1', 0, '5500', '', '', 6, 0, 6, '1582316303', '2'),
(207, 'FRAGOLINO ROSE', '8', '24', 15, 'Bottle', '1', 0, '8000', '', '', 17, 5, 12, '1601291633', '2'),
(208, 'MARLANGO RED WINE', '8', '12', 2, 'Bottle', '1', 0, '5500', '', '', 9, 3, 6, '1576486114', '2'),
(209, 'CARUSSO', '8', '41', 26, 'Bottle', '1', 0, '8000', '', '', 26, 14, 12, '1612612918', '2'),
(210, 'BLANC CUVEE', '8', '66', 59, 'Bottle', '1', 0, '8000', '', '', 59, 35, 24, '1611582671', '2'),
(211, 'FOUR LOKO', '8', '48', 22, 'Bottle', '1', 0, '4000', '', '', 31, 19, 12, '1601974150', '2'),
(212, 'DOUBLE BLACK', '8', '72', 72, 'Bottle', '1', 0, '500', '', '', 72, 48, 24, '1613224185', '2'),
(213, 'SMALL CAMPARI', '8', '0', 0, 'Bottle', '1', 1800, '5000', '', '', 0, 0, 0, '1581692411', '2'),
(214, 'SMALL CAAMPARI', '8', '0', 0, 'Bottle', '1', 1800, '4500', '', '', 0, 0, 0, '1581692451', '2'),
(215, 'BAILEYS DELIGHT', '8', '0', 0, 'Bottle', '1', 1700, '6000', '', '', 0, 0, 0, '1597996756', '2'),
(216, ' BLACK BULLET ', '8', '360', 249, 'Bottle', '1', 0, '1000', '', '', 249, 201, 48, '1613827112', '2'),
(217, 'BAILEYS DELIGHT', '8', '6', 6, 'Bottle', '1', 0, '6000', '', '', 6, 0, 6, '1599312057', '2'),
(218, 'AKWA FRESH', '3', '12', 11, 'Bottle', '1', 0, '200', '', '', 12, 0, 12, '1607603620', '2'),
(219, 'CAN BUDWISER ', '8', '24', 24, 'Bottle', '1', 0, '500', '', '', 24, 0, 24, '1611583049', '2'),
(220, 'GRAN DESSERT', '8', '12', 12, 'Bottle', '1', 0, '0', '', '', 12, 0, 12, '1613827907', '2'),
(221, 'BLUE MALT', '8', '20', 20, 'Bottle', '1', 0, '0', '', '', 20, 0, 20, '1613925983', '2');

-- --------------------------------------------------------

--
-- Table structure for table `addbar2`
--

CREATE TABLE `addbar2` (
  `id` int(32) NOT NULL,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(45) DEFAULT '',
  `instock` varchar(45) DEFAULT '0',
  `itemleft` int(45) DEFAULT 0,
  `measure` varchar(50) DEFAULT 'bottle',
  `quantity` varchar(50) DEFAULT '1',
  `costprice` int(50) DEFAULT 0,
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `barcode` varchar(80) DEFAULT '',
  `newstock` int(45) DEFAULT 0,
  `oldremstock` int(45) DEFAULT 0,
  `laststockadd` int(45) DEFAULT 0,
  `datelaststockadd` varchar(50) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `addbar2`
--

INSERT INTO `addbar2` (`id`, `name`, `categoryid`, `instock`, `itemleft`, `measure`, `quantity`, `costprice`, `price`, `description`, `barcode`, `newstock`, `oldremstock`, `laststockadd`, `datelaststockadd`, `issync`) VALUES
(1, 'STAR', '8', '554', 0, 'Bottle', '1', 179, '400', '', '0', 12, 0, 12, '1581177562', '2'),
(2, 'GULDER', '8', '1181', 263, 'Bottle', '1', 208, '400', '', '', 263, 251, 12, '1613656424', '2'),
(3, 'MEDIUM STOUT', '8', '4269', 955, 'Bottle', '1', 211, '500', '', '', 955, 937, 18, '1613827299', '2'),
(4, 'SMALL STOUT', '8', '3012', 590, 'Bottle', '1', 183, '400', '', '', 590, 542, 48, '1613827274', '2'),
(5, 'TIGER', '8', '1067', 280, 'Bottle', '1', 160, '300', '', '', 280, 220, 60, '1612611538', '2'),
(6, 'HOLLANDIA', '8', '791', 245, 'Bottle', '1', 450, '1000', '', '', 245, 235, 10, '1613656585', '2'),
(7, 'SATZENBRAU', '8', '1113', 49, 'Bottle', '1', 100, '300', '', '', 49, 31, 18, '1607166090', '2'),
(8, 'CHAMPION', '8', '9441', 2264, 'Bottle', '1', 170, '300', '', '', 2264, 2144, 120, '1613827336', '2'),
(9, 'BENSON', '8', '132', 17, 'Bottle', '1', 208, '500', '', '', 23, 3, 20, '1602241269', '2'),
(10, 'CARLO ROSSI', '8', '270', 67, 'Bottle', '1', 1500, '3500', '', '', 67, 64, 3, '1611582204', '2'),
(11, 'DUNHILL', '8', '58', 0, 'Bottle', '1', 240, '600', '', '', 10, 0, 10, '1595672969', '2'),
(12, 'MATUES ROSE', '8', '60', 24, 'Bottle', '1', 1285, '4000', '', '', 24, 21, 3, '1612612620', '2'),
(13, 'ANDRE ROSE ', '8', '215', 55, 'Bottle', '1', 1875, '6000', '', '', 55, 53, 2, '1613224488', '2'),
(14, 'RED LABEL', '8', '184', 35, 'Bottle', '1', 3500, '6000', '', '', 35, 33, 2, '1612869456', '2'),
(15, 'BEST CREAM', '8', '77', 13, 'Bottle', '1', 1500, '5000', '', '', 13, 11, 2, '1612016989', '2'),
(16, 'POWER HORSE', '8', '747', 194, 'Bottle', '1', 350, '800', '', '', 194, 146, 48, '1613224330', '2'),
(17, 'BIG BLACK LABEL', '8', '83', 9, 'Bottle', '1', 6800, '13000', '', '', 9, 7, 2, '1612016908', '2'),
(18, 'MC DOWEL ', '8', '29', 0, 'Bottle', '1', 1170, '3500', '', '', 29, 0, 29, '1560087598', '2'),
(19, 'PLASTIC COKE', '8', '7072', 2132, 'Bottle', '1', 117, '200', '', '', 2132, 2072, 60, '1613827638', '2'),
(20, 'LIFE', '8', '2120', 723, 'Bottle', '1', 158, '300', '', '', 723, 687, 36, '1613827570', '2'),
(21, 'HERO', '8', '2974', 826, 'Bottle', '1', 160, '300', '', '', 826, 790, 36, '1613827358', '2'),
(22, 'MAGIC MOMENT', '8', '101', 42, 'Bottle', '1', 1375, '4000', '', '', 42, 39, 3, '1613826998', '2'),
(23, 'BUDWISER ', '8', '5565', 756, 'Bottle', '1', 229, '500', '', '', 756, 696, 60, '1613225319', '2'),
(24, 'CLIMAX', '8', '504', 73, 'Bottle', '1', 200, '500', '', '', 73, 49, 24, '1613136257', '2'),
(25, 'HEINEKEN (BOTTLE)', '8', '10999', 2860, 'Bottle', '1', 240, '500', '', '', 2860, 2740, 120, '1613827231', '2'),
(26, 'STAR RADLER', '8', '8282', 2047, 'Bottle', '1', 150, '300', '', '', 2047, 1947, 100, '1613827317', '2'),
(27, 'AMSTEL MALT', '8', '3668', 467, 'Bottle', '1', 0, '250', '', '', 467, 443, 24, '1613225722', '2'),
(28, 'EXOTIC JUICE ', '8', '1165', 408, 'Bottle', '1', 0, '700', '', '', 408, 388, 20, '1613827613', '2'),
(29, 'VITA MILK', '8', '476', 0, 'Bottle', '1', 0, '400', '', '', 24, 0, 24, '1588241941', '2'),
(30, 'EVA WATER', '8', '9762', 2552, 'Bottle', '1', 63, '200', '', '', 2552, 2504, 48, '1613475076', '2'),
(31, 'DORCHESTER', '8', '126', 4, 'Bottle', '1', 240, '500', '', '', 10, 0, 10, '1602241327', '2'),
(32, 'ORIS', '8', '98', 9, 'Bottle', '1', 250, '500', '', '', 10, 0, 10, '1602241301', '2'),
(33, 'ROYAL CHALLENGE', '8', '27', 14, 'Bottle', '1', 0, '3500', '', '', 14, 10, 4, '1605187096', '2'),
(34, 'CHAMDOR', '8', '76', 32, 'Bottle', '1', 0, '3000', '', '', 32, 30, 2, '1613827520', '2'),
(35, 'FAYROUZ', '8', '5014', 1407, 'Bottle', '1', 94, '200', '', '', 1407, 1311, 96, '1613827407', '2'),
(36, 'SMALL RED LABEL', '8', '53', 22, 'Bottle', '1', 0, '2500', '', '', 22, 17, 5, '1613224550', '2'),
(37, 'SMALL BLACK LABEL', '8', '23', 7, 'Bottle', '1', 0, '5000', '', '', 7, 2, 5, '1602764096', '2'),
(38, 'SMALL FIVE ALIVE', '8', '0', 0, 'Bottle', '1', 0, '250', '', '', 0, 0, 0, '1560099412', '2'),
(39, 'AMSTEL MALT CAN', '8', '14', 0, 'Bottle', '1', 0, '200', '', '', 14, 0, 14, '1560696728', '2'),
(40, 'SMIRNOFF ICE CAN', '8', '0', 0, 'Bottle', '1', 0, '300', '', '', 0, 0, 0, '1560099509', '2'),
(41, 'MALTINA', '8', '3172', 811, 'Bottle', '1', 0, '250', '', '', 811, 763, 48, '1613225686', '2'),
(42, 'LAMBRUSCO REUNITE', '8', '311', 50, 'Bottle', '1', 0, '3500', '', '', 50, 48, 2, '1612355860', '2'),
(43, 'PEANUT BIG', '8', '5', 0, 'Bottle', '1', 0, '1000', '', '', 5, 0, 5, '1566916130', '2'),
(44, 'PEANUT SMALL', '8', '332', 0, 'Bottle', '1', 85, '250', '', '', 68, 8, 60, '1583768079', '2'),
(45, 'GRAND MALT CAN', '8', '0', 0, 'Bottle', '1', 0, '500', '', '', 0, 0, 0, '1563534515', '2'),
(46, 'CHIVITA JUICE', '8', '1016', 403, 'Bottle', '1', 300, '700', '', '', 403, 383, 20, '1613827378', '2'),
(47, 'SNAPP', '8', '245', 0, 'Bottle', '1', 0, '300', '', '', 54, 31, 23, '1566574985', '2'),
(48, 'DUBIC MALT ', '8', '3000', 1440, 'Bottle', '1', 100, '200', '', '', 1440, 1368, 72, '1613827254', '2'),
(49, 'SMALL SMIRNOFF ICE ', '8', '5470', 678, 'Bottle', '1', 0, '400', '', '', 678, 606, 72, '1606909303', '2'),
(50, 'HENNESSY VS', '8', '29', 9, 'Bottle', '1', 14800, '23000', '', '', 9, 4, 5, '1610807539', '2'),
(51, 'ORIGIN MEDIUM', '8', '20', 0, 'Bottle', '1', 0, '300', '', '', 20, 0, 20, '1560696137', '2'),
(52, 'CHAMPION MALT ', '8', '917', 66, 'Bottle', '1', 0, '200', '', '', 66, 42, 24, '1605523310', '2'),
(53, 'BAILEYS ', '8', '22', 2, 'Bottle', '1', 4350, '8000', '', '', 2, 1, 1, '1606907052', '2'),
(54, 'HENNESSY VS 35CL', '8', '27', 6, 'Bottle', '1', 7000, '14000', '', '', 8, 3, 5, '1600699318', '2'),
(55, 'CAMPARI ', '8', '81', 28, 'Bottle', '1', 0, '9000', '', '', 28, 26, 2, '1613827553', '2'),
(57, 'CLIMAX ', '8', '24', 0, 'Bottle', '1', 200, '500', '', '', 24, 0, 24, '1564590841', '2'),
(58, 'GRAND MALT', '8', '904', 24, 'Bottle', '1', 75, '200', '', '', 24, 0, 24, '1611235753', '2'),
(59, 'TROPHY', '8', '818', 226, 'Bottle', '1', 155, '300', '', '', 226, 214, 12, '1611235682', '2'),
(60, 'EAGLE STOUT', '8', '500', 183, 'Bottle', '1', 175, '300', '', '', 183, 171, 12, '1611235727', '2'),
(61, 'MONSTER ', '8', '642', 126, 'Bottle', '1', 321, '700', '', '', 126, 102, 24, '1606738493', '2'),
(62, 'CLIMAX PET', '8', '76', 72, 'Bottle', '1', 167, '500', '', '', 72, 48, 24, '1613827443', '2'),
(63, '33 EXPORT', '8', '21644', 4448, 'Bottle', '1', 158, '300', '', '', 4448, 4328, 120, '1613827193', '2'),
(64, 'BIG LEGEND', '8', '1844', 490, 'Bottle', '1', 225, '500', '', '', 490, 466, 24, '1613657836', '2'),
(65, 'AFRICAN SPECIAL LEGEND', '8', '447', 0, 'Bottle', '1', 200, '400', '', '', 33, 0, 33, '1568998513', '2'),
(66, 'BIG ORIGIN', '8', '2018', 353, 'Bottle', '1', 210, '400', '', '', 353, 341, 12, '1613731132', '2'),
(67, 'GUINESS MALT', '8', '137', 0, 'Bottle', '1', 110, '200', '', '', 13, 18, 0, '1563629782', '2'),
(68, 'ORIGIN BITTERS PLASTIC', '8', '516', 2, 'Bottle', '1', 216, '500', '', '', 25, 13, 12, '1597152769', '2'),
(69, '1960', '8', '144', 0, 'Bottle', '1', 270, '700', '', '', 13, 1, 12, '1581347896', '2'),
(70, 'RAZON WINE', '8', '6', 0, 'Bottle', '1', 0, '3000', '', '', 1, 0, 1, '1576755604', '2'),
(71, 'DOUBLE BLACK', '8', '311', 72, 'Bottle', '1', 175, '500', '', '', 72, 48, 24, '1613827595', '2'),
(72, 'FOUR LOKO', '8', '24', 0, 'Bottle', '1', 1670, '3000', '', '', 12, 0, 12, '1579884448', '2'),
(73, 'LA MONDENSE LAMBRUSCO', '8', '6', 0, 'Bottle', '1', 0, '3500', '', '', 5, 2, 3, '1576674770', '2'),
(74, 'VEGA CENTRON RED WINE', '8', '11', 0, 'Bottle', '1', 0, '4500', '', '', 2, 0, 2, '1583740367', '2'),
(75, 'MARLANGO RED WINE', '8', '6', 0, 'Bottle', '1', 0, '4500', '', '', 6, 3, 3, '1577033852', '2'),
(76, 'FEARLESS ENERGY DRINK', '8', '264', 58, 'Bottle', '1', 191, '500', '', '', 58, 34, 24, '1611062873', '2'),
(77, 'SMALL LEGEND', '8', '120', 0, 'Bottle', '1', 125, '300', '', '', 27, 3, 24, '1582561379', '2'),
(78, 'SMIRNOFF VODKA', '8', '50', 29, 'Bottle', '1', 1350, '4000', '', '', 29, 26, 3, '1613827024', '2'),
(79, 'CRUNCHES GROUNDNUT SMALL', '8', '12', 0, 'Bottle', '1', 200, '400', '', '', 12, 0, 12, '1579190303', '2'),
(80, 'CRUNCHES GROUNDNUT MEDIUM', '8', '3', 0, 'Bottle', '1', 300, '600', '', '', 3, 0, 3, '1579190336', '2'),
(81, 'CRUNCHES GROUNDNUT BIG', '8', '2', 0, 'Bottle', '1', 650, '1000', '', '', 2, 0, 2, '1579190364', '2'),
(82, 'FRIUTA JUICE', '8', '30', 0, 'Bottle', '1', 290, '700', '', '', 11, 1, 10, '1582557534', '2'),
(83, 'PLASTIC FAYROUZ', '8', '72', 0, 'Bottle', '1', 0, '200', '', '', 55, 31, 24, '1582186601', '2'),
(84, 'CAN ORIGIN', '8', '48', 0, 'Bottle', '1', 167, '400', '', '', 25, 1, 24, '1583741720', '2'),
(85, 'SMALL ROYAL CHALLENGE', '8', '110', 36, 'Bottle', '1', 480, '1000', '', '', 36, 31, 5, '1607347963', '2'),
(86, 'HAPPY HOUR JUICE', '8', '30', 20, 'Bottle', '1', 230, '700', '', '', 20, 0, 20, '1613223851', '2'),
(87, '1960 BEER', '8', '12', 0, 'Bottle', '1', 225, '500', '', '', 12, 0, 12, '1581580311', '2'),
(88, 'EXTRA SMOOTH STOUT', '8', '1067', 587, 'Bottle', '1', 205, '500', '', '', 587, 551, 36, '1613225500', '2'),
(89, 'SMALL CAMPARI', '8', '87', 40, 'Bottle', '1', 1062, '3000', '', '', 40, 36, 4, '1611581773', '2'),
(90, 'BOTTLE ORIGIN BITTERS', '8', '3', 0, 'Bottle', '1', 917, '3000', '', '', 3, 0, 3, '1590240044', '2'),
(91, 'SHISHA', '8', '75', 49, 'Bottle', '1', 0, '2000', '', '', 49, 39, 10, '1613475011', '2'),
(92, 'JAMESON BLACK BARREL', '8', '15', 9, 'Bottle', '1', 7000, '15000', '', '', 9, 5, 4, '1604066190', '2'),
(93, 'JAMESON', '8', '36', 21, 'Bottle', '1', 4800, '9000', '', '', 21, 19, 2, '1613730696', '2'),
(94, 'BLANC CUVEE', '8', '7', 5, 'Bottle', '1', 0, '8000', '', '', 5, 3, 2, '1612182977', '2'),
(95, 'CRANBERRY JUICE', '8', '16', 8, 'Bottle', '1', 0, '1500', '', '', 8, 0, 8, '1604143729', '2'),
(96, 'CAN STAR RADLER', '8', '48', 0, 'Bottle', '1', 0, '300', '', '', 48, 0, 48, '1591180883', '2'),
(97, 'BLUE BULLET', '8', '530', 335, 'Bottle', '1', 250, '500', '', '', 335, 311, 24, '1613827469', '2'),
(98, ' BLACK BULLET ', '8', '408', 233, 'Bottle', '1', 350, '700', '', '', 233, 209, 24, '1613224617', '2'),
(99, 'LA SIEN BOTTLE WATER 75CL', '3', '476', 193, 'Bottle', '1', 55, '200', '', '', 193, 133, 60, '1613827497', '2'),
(100, 'TROPHY STOUT', '8', '444', 281, 'Bottle', '1', 208, '500', '', '', 281, 269, 12, '1613225836', '2'),
(101, 'SHISHA FLAVOR', '8', '4', 4, 'Bottle', '1', 0, '0', '', '', 4, 2, 2, '1596532620', '2'),
(102, 'JACK DANIELS', '8', '1', 1, 'Bottle', '1', 0, '0', '', '', 1, 0, 1, '1604066350', '2'),
(103, 'AKWA FRESH', '3', '108', 108, 'Bottle', '1', 0, '0', '', '', 108, 96, 12, '1607603798', '2'),
(104, 'BIG SMIRNOFF ICE', '8', '528', 528, 'Bottle', '1', 0, '0', '', '', 528, 468, 60, '1613827174', '2');

-- --------------------------------------------------------

--
-- Table structure for table `addbar3`
--

CREATE TABLE `addbar3` (
  `id` int(32) NOT NULL,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(45) DEFAULT '',
  `instock` varchar(45) DEFAULT '0',
  `itemleft` int(45) DEFAULT 0,
  `measure` varchar(50) DEFAULT 'bottle',
  `quantity` varchar(50) DEFAULT '1',
  `costprice` int(50) DEFAULT 0,
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `barcode` varchar(80) DEFAULT '',
  `newstock` int(45) DEFAULT 0,
  `oldremstock` int(45) DEFAULT 0,
  `laststockadd` int(45) DEFAULT 0,
  `datelaststockadd` varchar(50) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addcab`
--

CREATE TABLE `addcab` (
  `id` int(11) NOT NULL,
  `carno` varchar(20) DEFAULT '',
  `lastname` varchar(50) DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(32) DEFAULT '',
  `address` varchar(100) DEFAULT '',
  `regdate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addclient`
--

CREATE TABLE `addclient` (
  `id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT '',
  `lastname` varchar(50) DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT 'password',
  `phone` varchar(32) DEFAULT '',
  `city` varchar(45) DEFAULT '',
  `state` varchar(45) DEFAULT '',
  `country` varchar(45) DEFAULT '',
  `isin` varchar(10) DEFAULT '0',
  `company` varchar(50) DEFAULT '',
  `amount` int(50) DEFAULT 0,
  `lastdeposit` int(50) DEFAULT 0,
  `lastddate` date DEFAULT NULL,
  `lastwithdraw` int(50) DEFAULT 0,
  `lastwdate` date DEFAULT NULL,
  `pic` varchar(65) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `addclient`
--

INSERT INTO `addclient` (`id`, `title`, `lastname`, `firstname`, `email`, `password`, `phone`, `city`, `state`, `country`, `isin`, `company`, `amount`, `lastdeposit`, `lastddate`, `lastwithdraw`, `lastwdate`, `pic`, `issync`) VALUES
(1, 'Mr', 'Anonymous', 'Guest', 'info@bighms.com', 'password', '07070000000', 'Ikeja.', 'Lagos', 'Nigeria', '0', '', NULL, NULL, NULL, NULL, NULL, '', '2'),
(11, 'Mr', 'User1', 'Jame1', 'user1@hotmail.com', 'password', '7060665367', '', '', 'Nigeria', '0', '', 49000, 9000, '2022-12-30', 0, NULL, '', '2'),
(12, 'Mr', 'User2', 'James2', 'user2@gmail.com', 'password', '08044455656', '', '', 'Nigeria', '0', '', 0, 0, NULL, 0, NULL, '', '2'),
(13, 'Mr', 'Adebowale', 'james3', 'jamesuser3@hotmail.com', 'password', '07066655777', 'Agege', 'Lagos State', 'Nigeria', '0', '2', 3000, 6000, '2022-11-28', 3000, '2022-11-28', '', '2'),
(15, 'Mr', 'Osei', 'Akinade', 'osei@gmail.com', 'password', '08099988999', 'Ikeja', 'Lagos', 'Nigeria', '0', '1', 120000, 120000, '2022-12-29', 0, NULL, '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `addlaundary`
--

CREATE TABLE `addlaundary` (
  `id` int(65) NOT NULL,
  `title` varchar(100) DEFAULT '',
  `categoryid` varchar(50) DEFAULT '',
  `description` varchar(100) DEFAULT '',
  `price` varchar(80) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `addlaundary`
--

INSERT INTO `addlaundary` (`id`, `title`, `categoryid`, `description`, `price`, `issync`) VALUES
(1, 'Trouser and Shirt', '', '', '3000', '2'),
(2, 'Agbada', '', 'Complete Agbada', '5500', '2'),
(3, 'Trouser', '', '', '1500', '2'),
(4, 'Shirt', '', '', '1000', '2'),
(5, 'Shoe Polishing', '', '', '500', '2');

-- --------------------------------------------------------

--
-- Table structure for table `addresturant`
--

CREATE TABLE `addresturant` (
  `id` int(32) NOT NULL,
  `name` varchar(50) DEFAULT '',
  `categoryid` varchar(65) DEFAULT '',
  `measure` varchar(50) DEFAULT 'Plate',
  `quantity` varchar(45) DEFAULT '1',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `ingredients` text DEFAULT NULL,
  `issync` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `addresturant`
--

INSERT INTO `addresturant` (`id`, `name`, `categoryid`, `measure`, `quantity`, `price`, `description`, `ingredients`, `issync`) VALUES
(2, 'SEA FOOD PIZZA REGULAR..', '10', 'Plate', '1', '4000', '', '', '2'),
(4, 'SEA FOOD PIZZA FAMILY', '10', 'Plate', '1', '5000', '', '', '2'),
(5, 'PEPPERONI PIZZA REGULAR', '10', 'Plate', '1', '3200', '', '', '2'),
(6, 'PEPPERONI PIZZA FAMILY', '10', 'Plate', '1', '4500', '', NULL, '2'),
(9, 'MEMOSA BOLOGNES PIZZA Regular', '10', 'Plate', '1', '4000', '', '', '2'),
(10, 'MEMOSA BOLOGNES PIZZA LARGE', '10', 'Plate', '1', '5000', '', '', '2'),
(13, 'VEGETARIAN PIZZA Regular', '10', 'Plate', '1', '3000', '', '', '2'),
(14, 'VEGETARIAN PIZZA LARGE', '10', 'Plate', '1', '3500', '', NULL, '2'),
(17, 'MEAT FACE PIZZA MEDIUM', '10', 'Plate', '1', '3500', '', '', '2'),
(18, 'MEAT FACE PIZZA LARGE', '10', 'Plate', '1', '5000', '', '', '2'),
(19, 'BOVEERI PAVILION SPECIAL PIZZA ', '10', 'Plate', '1', '5000', '', '', '2'),
(20, 'BOVEERI PAVILION SPECIAL PIZZA LARGE', '10', 'Plate', '1', '5000', '', NULL, '2'),
(25, 'TUNA SANDWICHES ', '11', 'Plate', '1', '2500', '', '', '2'),
(26, 'CHICKEN SANDWICHES', '11', 'Plate', '1', '2500', '', NULL, '2'),
(27, 'STEAK SANDWICHES', '10', 'Plate', '1', '2000', '', NULL, '2'),
(28, 'CHICKEN / HOTDOG SHARWAMA (MINI)', '11', 'Unit', '1', '1000', '', '', '2'),
(29, 'BEEF w HOTDOG SHARWARMA', '11', 'Plate', '1', '1000', '', NULL, '2'),
(30, 'CHICKEN/BEEF w HOTDOG SHAWARMA', '11', 'Plate', '1', '1500', '', NULL, '2'),
(31, 'CLUB SANDWICHES ', '11', 'Plate', '1', '3000', '', NULL, '2'),
(32, 'BEEF BURGERS (BIG) WITH CHIPS', '11', 'Unit', '1', '2500', '', '', '2'),
(33, 'CHEESE BURGER', '11', 'Plate', '1', '2500', '', NULL, '2'),
(34, 'CEASAR SALAD', '13', 'Plate', '1', '2500', '', NULL, '2'),
(36, 'VEGETABLE SALAD', '13', 'Plate', '1', '1500', '', NULL, '2'),
(37, 'CHICKEN SALAD', '13', 'Plate', '1', '2000', '', NULL, '2'),
(39, 'COLESLAW SALAD ', '13', 'Plate', '1', '1000', '', NULL, '2'),
(40, 'MEDITERRENIAN SALAD', '13', 'Plate', '1', '2000', '', NULL, '2'),
(42, 'PEPPERED SNAILS ', '14', 'Plate', '1', '2500', '', NULL, '2'),
(43, 'PEPPERED FRIED CHICKEN WINGS', '14', 'Plate', '1', '2000', '', NULL, '2'),
(44, 'PEPPERED GIZZARD', '14', 'Plate', '1', '1500', '', NULL, '2'),
(45, 'PEPPERED PRAWN ', '14', 'Plate', '3', '3000', '', NULL, '2'),
(46, 'STIR FRY NOODLES w  SHREDDED CHICKEN', '15', 'Plate', '1', '2500', '', NULL, '2'),
(47, 'STIR FRY NOODLES w  MIXED VEGETABLE', '15', 'Plate', '1', '2500', '', NULL, '2'),
(48, 'STIR FRY NOODLES w  SHRIMPS', '15', 'Plate', '1', '2500', '', NULL, '2'),
(49, 'CRIPSY NODDLES w MIXED VEGETABLES', '15', 'Plate', '1', '2500', '', NULL, '2'),
(53, 'WHITE RICE (THAI JASMINE RICE)', '16', 'Plate', '1', '700', '', NULL, '2'),
(54, 'CHINESE FRIED RICE WITH SHRIMPS', '16', 'Plate', '1', '3000', '', NULL, '2'),
(55, 'CHINESE FRIED RICE WITH BEEF ', '16', 'Plate', '1', '2500', '', NULL, '2'),
(56, 'CHINESE FRIED RICE WITH SHREDDED CHICKEN', '16', 'Plate', '1', '2500', '', NULL, '2'),
(60, 'PRAWN IN w VEGETABLES', '17', 'Plate', '1', '4500', '', NULL, '2'),
(62, 'GRILL LAMB CHOP', '18', 'Plate', '1', '3000', '', NULL, '2'),
(66, 'CHICKEN SPRING ROLL', '19', 'Plate', '4', '2000', '', NULL, '2'),
(67, 'VEGETABLE SPRING ROLL', '19', 'Plate', '4', '2000', '', NULL, '2'),
(70, 'STIR FRY BITTER GOURD/ BEEF', '20', 'Plate', '1', '2000', '', NULL, '2'),
(71, 'DEEP FRIED CRISPY CHICKEN', '21', 'Plate', '1', '2000', '', NULL, '2'),
(72, 'FRIED CHICKEN w CASHEW NUT', '21', 'Plate', '1', '2000', '', NULL, '2'),
(73, 'PRAWN w MIXED VEGETABLES', '22', 'Plate', '1', '4500', '', NULL, '2'),
(74, 'CRAB w OYSTER SAUCE', '22', 'Plate', '1', '3500', '', NULL, '2'),
(75, 'SHRIMPS w CASHEW NUTS', '22', 'Plate', '1', '3500', '', NULL, '2'),
(76, 'FISH FILLET w SWEET AND SOUR SAUCE', '23', 'Plate', '1', '2500', '', NULL, '2'),
(77, 'FISH FILLET w BEAN CURD IN HOT POT', '23', 'Plate', '1', '2500', '', NULL, '2'),
(78, 'SWEET AND SOUP PORK ', '24', 'Plate', '1', '2500', '', NULL, '2'),
(79, 'CRISPY PORK SHANGHAI STYLE', '24', 'Plate', '1', '2500', '', NULL, '2'),
(80, 'BRAISED MIXED VEGETABLE / CHOPSUEY', '25', 'Plate', '1', '1500', '', NULL, '2'),
(81, 'SAUTEED STRING BEANS w SHRIMPS', '25', 'Plate', '1', '1500', '', NULL, '2'),
(82, 'SHREDDED CHICKEN IN VEGETABLE SAUCE ', '26', 'Plate', '1', '3500', '', NULL, '2'),
(83, 'SHREDDED CHICKEN IN GREEN PEPPER SAUCE', '26', 'Plate', '1', '3500', '', NULL, '2'),
(84, 'GRILLED CHICKEN SERVED w TOMATO SAUCES', '25', 'Plate', '1', '4000', '', NULL, '2'),
(85, 'GRILLED STEAK SERVED w BLACK PEPPER SAUCES', '26', 'Plate', '1', '4000', '', NULL, '2'),
(86, 'GRILLED PRAWN ', '26', 'Plate', '1', '8000', '', NULL, '2'),
(87, 'GRILL CHICKEN ', '26', 'Plate', '1', '8000', '', NULL, '2'),
(88, 'GRILLED STEAK ', '26', 'Plate', '1', '8000', '', NULL, '2'),
(89, 'GRILLED FISH SERVED w VEGETABLE RICE ', '26', 'Plate', '1', '4000', '', NULL, '2'),
(90, 'GRILLED PRAWN IN TOMATO SAUCE', '26', 'Plate', '1', '4000', '', NULL, '2'),
(91, 'GRILLED FISH BONELESS CHICKEN SERVED w LEMON SAUCE', '26', 'Plate', '1', '4000', '', NULL, '2'),
(92, 'GRILLED BONELESS CHICKEN SERVED w BLACK PEPPER SAU', '26', 'Plate', '1', '4000', '', NULL, '2'),
(93, 'MIXED FRUITS', '27', 'Plate', '1', '1500', '', NULL, '2'),
(94, 'ICE CREAM', '27', 'Cup', '1', '2000', '', NULL, '2'),
(95, 'SHRIMPS COCKTAIL', '22', 'Plate', '1', '2000', '', NULL, '2'),
(96, 'MUSHROOM SOUP ', '19', 'Plate', '1', '1500', '', NULL, '2'),
(97, 'CHICKEN SOUP', '19', 'Plate', '1', '2000', '', NULL, '2'),
(98, 'SEA FOOD PEPPER SOUP', '19', 'Plate', '1', '2500', '', NULL, '2'),
(99, 'CHICKEN AND CHIPS', '5', 'Plate', '1', '2000', '', NULL, '2'),
(100, 'HOT SPICY SHRIMPS ', '17', 'Plate', '1', '3500', '', NULL, '2'),
(101, 'GAUNTUNUS SHRIMPS', '17', 'Plate', '1', '3500', '', NULL, '2'),
(102, 'FISH AND CHIPS', '19', 'Plate', '1', '2500', '', NULL, '2'),
(103, 'CHICKEN WINGS AND CHIPS', '19', 'Plate', '1', '2000', '', NULL, '2'),
(104, 'WHITE RICE ', '16', 'Plate', '1', '500', '', NULL, '2'),
(105, 'COCONUT RICE/GOAT MEAT/CHICKEN', '16', 'Plate', '1', '3000', '', '', '2'),
(106, 'JOLLOF RICE WITH CHICKEN/GOAT MEAT', '16', 'Plate', '1', '3000', '', '', '2'),
(107, 'FRIED RICE', '16', 'Plate', '1', '1000', '', NULL, '2'),
(108, 'CHINESE FRIED RICE', '16', 'Plate', '1', '1000', '', NULL, '2'),
(109, 'SAVIER RICE', '16', 'Plate', '1', '1000', '', NULL, '2'),
(110, 'SPAGHETTI SEA FOOD', '30', 'Plate', '1', '3500', '', NULL, '2'),
(111, 'SPAGHETTI BOLOGNOISE', '30', 'Plate', '1', '2500', '', NULL, '2'),
(124, 'GOAT MEAT PEPPER SOUP', '32', 'Plate', '1', '1500', '', NULL, '2'),
(125, 'FRESH FISH PEPPER SOUP', '32', 'Plate', '1', '2000', '', NULL, '2'),
(126, 'DRY FISH PEPPER SOUP', '32', 'Plate', '1', '3500', '', '', '2'),
(127, 'FRIED GOAT MEAT SAUCE', '33', 'Plate', '1', '1000', '', NULL, '2'),
(128, 'FRIED CHICKEN PEPPER SAUCE', '33', 'Plate', '1', '2500', '', NULL, '2'),
(131, 'STOCKFISH SAUCE or VEGETABLE SAUCE', '33', 'Plate', '1', '2000', '', NULL, '2'),
(132, 'ISI EWU w PLANTAIN', '33', 'Plate', '1', '3000', '', NULL, '2'),
(133, 'ISI EWU (GOAT HEAD)', '33', 'Plate', '1', '3000', '', '', '2'),
(140, 'COFFE TEA (NIGERIAN)', '31', 'Plate', '1', '2000', '', NULL, '2'),
(141, 'FRIED / BOILED PLANTAIN', '31', 'Plate', '1', '500', '', NULL, '2'),
(142, 'FRUIT SALAD', '34', 'Plate', '1', '1500', '', NULL, '2'),
(143, 'FRUIT PLATTER', '34', 'Plate', '1', '1500', '', NULL, '2'),
(144, 'VEGETABLE SALAD ', '5', 'Plate', '1', '2000', '', NULL, '2'),
(145, 'MEDITERRENIAN SALAD ', '5', 'Plate', '1', '2000', '', NULL, '2'),
(146, 'CHICKEN SALAD ', '5', 'Plate', '1', '2000', '', NULL, '2'),
(147, 'CEASAR SALAD ', '5', 'Plate', '1', '2000', '', NULL, '2'),
(149, 'RUSSIAN SALAD', '5', 'Plate', '1', '2000', '', NULL, '2'),
(150, 'SARDINE SALAD ', '5', 'Plate', '1', '2000', '', NULL, '2'),
(151, 'TUNA SALAD', '5', 'Plate', '1', '2000', '', NULL, '2'),
(152, 'TUNA SANDWICHES with CHIPS', '11', 'Plate', '1', '2500', '', '', '2'),
(153, 'TRADITIONAL CLUB SANDWICHES', '11', 'Plate', '1', '2500', '', NULL, '2'),
(155, 'STEAK SANDWICHES ', '11', 'Plate', '1', '2000', '', NULL, '2'),
(159, 'VEGETABLE', '31', 'Plate', '1', '700', '', NULL, '2'),
(160, 'AFANG SOUP', '31', 'Plate', '1', '700', '', NULL, '2'),
(161, 'EGUSI SOUP &FISH', '31', 'Plate', '1', '2500', '', NULL, '2'),
(162, 'OGBONO SOUP/GOAT/CHICKEN/BEEF', '31', 'Plate', '1', '2000', '', NULL, '2'),
(163, 'OKRO', '31', 'Plate', '1', '700', '', NULL, '2'),
(164, 'EWEDU & GBEGIRI', '31', 'Plate', '1', '700', '', NULL, '2'),
(165, 'BANGA', '31', 'Plate', '1', '700', '', NULL, '2'),
(166, 'BITTERLEAF SOUP/GOAT/CHICKEN/BEEF', '31', 'Plate', '1', '2000', '', NULL, '2'),
(167, 'OHA', '31', 'Plate', '1', '700', '', NULL, '2'),
(168, 'NATIVE RICE WITH FISH', '31', 'Plate', '1', '3000', '', NULL, '2'),
(169, 'FISHERMAN Cat Fish', '31', 'Plate', '1', '3000', '', '', '2'),
(170, 'GARRI', '31', 'Plate', '1', '300', '', NULL, '2'),
(171, 'STARCH', '31', 'Plate', '1', '300', '', NULL, '2'),
(172, 'AMALA', '31', 'Plate', '1', '300', '', NULL, '2'),
(173, 'SEMOVITA', '31', 'Plate', '1', '300', '', NULL, '2'),
(174, 'WHEAT', '31', 'Plate', '1', '500', '', NULL, '2'),
(175, 'PLANTAIN FLOUR', '31', 'Plate', '1', '500', '', NULL, '2'),
(176, 'POUNDED YAM', '31', 'Plate', '1', '500', '', NULL, '2'),
(177, 'ASSORTED', '31', 'Plate', '1', '800', '', NULL, '2'),
(178, 'GOAT MEAT', '31', 'Plate', '1', '800', '', NULL, '2'),
(179, 'COW HEAD', '31', 'Plate', '1', '1000', '', NULL, '2'),
(180, 'COW TAIL', '31', 'Plate', '1', '1000', '', NULL, '2'),
(181, 'COW LEG', '31', 'Plate', '1', '1000', '', NULL, '2'),
(182, 'BEEF', '31', 'Plate', '1', '700', '', NULL, '2'),
(183, 'CHICKEN', '31', 'Plate', '1', '1000', '', NULL, '2'),
(184, 'SNAIL', '31', 'Plate', '1', '1500', '', NULL, '2'),
(185, 'CATFISH (fresh)', '31', 'Plate', '1', '800', '', NULL, '2'),
(186, 'TILAPIA (whole)', '31', 'Plate', '1', '1500', '', NULL, '2'),
(187, 'RED SNAPPER', '31', 'Plate', '1', '1500', '', NULL, '2'),
(188, 'BARRACUDA', '31', 'Plate', '1', '1500', '', NULL, '2'),
(189, 'SHINE NOSE ', '31', 'Plate', '1', '1500', '', NULL, '2'),
(190, 'CROAKER', '31', 'Plate', '1', '1500', '', NULL, '2'),
(191, 'DRIED CATFISH', '31', 'Plate', '1', '1300', '', NULL, '2'),
(193, 'STOCK FISH', '31', 'Plate', '1', '1300', '', NULL, '2'),
(194, 'BREAKFAST', '28', 'Plate', '1', '1500', '', NULL, '2'),
(195, 'FULL ENGLISH BREAKFAST', '28', 'Plate', '1', '2500', '', NULL, '2'),
(196, 'PEPPER GOATMEAT SAUCE', '14', 'Plate', '1', '1000', '', NULL, '2'),
(197, 'CHIPS', '11', 'Plate', '1', '500', '', NULL, '2'),
(198, 'CHIPS', '11', 'Plate', '1', '500', '', NULL, '2'),
(199, 'take way', '35', '', '1', '100', '', NULL, '2'),
(200, 'FRIED RICE WITH CHICKEN/GOAT MEAT', '5', 'Plate', '1', '3000', 'RICE AND CHICKEN', '', '2'),
(201, 'EGG OMLETE', '5', 'Unit', '1', '500', '', NULL, '2'),
(202, 'FRIED/BOILED YAM', '6', 'Plate', '1', '500', '', NULL, '2'),
(203, 'VEGETARIAN SAUCE', '5', '', '1', '500', '', NULL, '2'),
(204, ' FISHERMAN SPECIAL POT FOR 2', '6', 'Bowl', '1', '6000', '', NULL, '2'),
(205, 'CHICKEN PEPPER SOUP', '32', 'Plate', '1', '1500', '', NULL, '2'),
(206, 'FISH PEPPER SOUP', '6', 'Plate', '1', '1000', '', NULL, '2'),
(207, 'INDOMINE AND EGG', '7', 'Plate', '1', '1000', '', NULL, '2'),
(208, 'INDOMINE AND CHICKEN', '7', 'Plate', '1', '1500', '', NULL, '2'),
(209, 'FISHERMAN SPECIAL POT EXTRA', '6', '', '1', '4500', '', NULL, '2'),
(210, 'FRIED PLANTIAN', '7', '', '1', '500', '', NULL, '2'),
(211, 'BARBIQUIE CROCKA FISH AND CHIPS (MEDIUM)', '7', 'Unit', '1', '2500', '', NULL, '2'),
(212, 'BARBIQUIE CROCKA FISH AND CHIPS (SMALL)', '5', '', '1', '2000', '', NULL, '2'),
(213, 'WHITE SOUP/GARRI/PANDO', '7', 'Plate', '1', '2500', '', NULL, '2'),
(214, 'FISH PEPPER SOUP WITH WHITE RICE', '7', 'Plate', '1', '2500', '', '2,3,4', '2'),
(215, 'BARBIQUIE CROCKA FISH AND CHIPS (LARGE)', '7', 'Bowl', '1', '3000', '', NULL, '2'),
(216, 'BARBIQUIE CROCKA FISH AND CHIPS (XLARGE)', '7', 'Unit', '1', '3500', '', NULL, '2'),
(217, 'GBAGA SOUP/GOAT MEAT', '6', 'Plate', '1', '2000', '', NULL, '2'),
(218, 'AFHAN SOUP/GOAT MEAT', '6', '', '1', '2000', '', NULL, '2'),
(219, 'OKORO SOUP/GOAT/BEEF/CHICKEN', '6', 'Plate', '1', '2000', '', NULL, '2'),
(220, 'VEGETABLE SOUP/GOAT MEAT', '6', '', '1', '2000', '', NULL, '2'),
(221, 'CHICKEN PEPPER SAUCE', '7', 'Plate', '1', '1500', '', NULL, '2'),
(222, 'EXTRE FISHERMAN SOUP', '6', '', '1', '500', '', NULL, '2'),
(223, 'TEA/COFFEE,BREAD AND EGG', '7', '', '1', '1200', '', NULL, '2'),
(224, 'EGUSI SOUP/GOAT/CHICKEN/BEEF', '6', 'Plate', '1', '2000', '', NULL, '2'),
(226, 'BARBIQUIE CROCKA FISH AND  CHIPS(XX LARGE)', '31', 'Plate', '1', '4000', '', NULL, '2'),
(227, 'AFHAN SOUP/FISH', '6', 'Plate', '1', '2500', '', NULL, '2'),
(228, 'GBAGA SOUP& FISH', '6', '', '1', '2500', '', NULL, '2'),
(229, 'VEGETABLE SOUP/FISH', '6', 'Plate', '1', '2500', '', NULL, '2'),
(230, 'OKORO SOUP/FISH', '6', '', '1', '2500', '', NULL, '2'),
(232, 'Shrimps', '7', 'Unit', '1', '500', '', NULL, '2'),
(233, 'BARBIQUIE CROCKA FISH AND  CHIPS(XXX LARGE)', '7', 'Unit', '1', '4500', '', NULL, '2'),
(234, 'BARBIQUIE CROCKA FISH AND  CHIPS(XV LARGE)', '7', 'Unit', '1', '5000', '', NULL, '2'),
(235, 'RICE/CHICKEN PEPPER SOUP', '6', 'Plate', '1', '2000', '', NULL, '2'),
(236, 'BARBIQUIE CROCKA FISH AND CHIPS (SMALL)', '6', 'Unit', '1', '1000', '', NULL, '2'),
(237, 'FISHERMAN SOUP Red Snapper', '7', 'Plate', '1', '3000', '', NULL, '2'),
(238, 'VEGETABLE SOUP/CHICKEN/GOAT/BEEF', '5', 'Plate', '1', '2000', '', NULL, '2'),
(239, 'AFANG/GOAT/CHICKEN', '5', 'Plate', '1', '2500', '', '', '2'),
(240, 'QUAKER OATH/EGG', '5', 'Plate', '1', '1500', '', NULL, '2'),
(241, 'WHITE SOUP/SEMO', '5', 'Plate', '1', '3000', '', NULL, '2'),
(242, 'WHITE RICE/PLAINTAIN/GOAT MEAT', '7', 'Plate', '1', '2500', '', NULL, '2'),
(243, 'PAN CAKE', '6', 'Plate', '1', '1000', '', NULL, '2'),
(244, 'GIZZARD', '29', 'Plate', '1', '1500', '', NULL, '2'),
(245, 'ROOM SERVICE', '6', 'Plate', '1', '300', '', NULL, '2'),
(246, 'BEEF BURGER MINI', '5', 'Unit', '1', '500', '', '', '2'),
(247, 'CHICKEN BURGER MINI', '29', 'Unit', '1', '600', '', NULL, '2'),
(248, 'CHICKEN BURGER BIG', '29', 'Unit', '1', '2500', '', NULL, '2'),
(249, 'BEEF SHARWARMA MINI', '29', 'Unit', '1', '1000', '', NULL, '2'),
(250, 'BEEF SHAWARMA BIG', '29', 'Unit', '1', '1500', '', NULL, '2'),
(251, 'COCONUT RICE /FISH', '7', 'Plate', '1', '3500', '', '', '2'),
(252, 'JELLOF RICE/GOAT/CHICKEN', '5', 'Plate', '1', '2500', '', NULL, '2'),
(253, 'JELLOF RICE/FISH', '5', 'Plate', '1', '3000', '', NULL, '2'),
(254, 'AVOCADO SALAD', '5', 'Plate', '1', '2500', '', NULL, '2'),
(255, 'MINESTRONE SOUP', '5', 'Plate', '1', '1500', '', NULL, '2'),
(256, 'CREAM OF CHICKEN SOUP', '7', 'Plate', '1', '1500', '', NULL, '2'),
(257, 'AFANG SOUP/FISH', '5', 'Plate', '1', '2500', '', '', '2'),
(258, 'OGBONO SOUP/FISH', '7', 'Plate', '1', '2500', '', NULL, '2'),
(259, 'BITTERLEAF SOUP/FISH', '5', 'Plate', '1', '2500', '', '', '2'),
(260, 'BANGA SOUP/GOAT/CHICKEN/BEEF', '5', 'Plate', '1', '2000', '', NULL, '2'),
(261, 'BANGA SOUP/FISH', '7', 'Plate', '1', '2500', '', NULL, '2'),
(262, 'EXTRA SWALLOW', '6', 'Unit', '1', '500', '', NULL, '2'),
(263, 'GOAT MEAT BARBEQUE', '6', 'Plate', '1', '2000', '', NULL, '2'),
(264, 'LAMB CHOP BARBEQUE', '6', 'Plate', '1', '2000', '', NULL, '2'),
(265, 'CHICKEN BARBEQUE', '6', 'Plate', '1', '2000', '', NULL, '2'),
(266, 'FULL ROASTED CHICKEN /CHIP/SALAD LARGE', '6', 'Plate', '1', '10000', '', NULL, '2'),
(267, 'FULL ROASTED CHICKEN /CHIP/SALAD LARGE', '6', 'Plate', '1', '8000', '', NULL, '2'),
(268, 'ASU', '6', 'Plate', '1', '1500', '', NULL, '2'),
(269, 'ISHI-EWU', '6', 'Plate', '1', '2500', '', NULL, '2'),
(270, 'PEPPERED SNAIL', '6', 'Plate', '1', '2000', '', NULL, '2'),
(271, 'PEPPERED GIZZARD', '6', 'Plate', '1', '1500', '', NULL, '2'),
(272, 'CHICKEN SAUSAGE REGULAR', '6', 'Plate', '1', '3000', '', NULL, '2'),
(273, 'CHICKEN SAUSAGE FAMILY', '7', 'Plate', '1', '4500', '', NULL, '2'),
(274, 'BOVEERI SPECIAL REGULAR', '5', 'Plate', '1', '4000', '', NULL, '2'),
(275, 'BOVEERI SPECIAL FAMILY', '6', 'Plate', '1', '5000', '', NULL, '2'),
(276, 'MEMOSA BOLOGNES REGULAR', '5', 'Plate', '1', '3000', '', NULL, '2'),
(277, 'MEMOSA BOLOGNES FAMILY', '5', 'Plate', '1', '4500', '', NULL, '2'),
(278, 'MEAT FACE REGULAR', '7', 'Plate', '1', '3000', '', NULL, '2'),
(279, 'MEAT FACE FAMILY', '6', 'Plate', '1', '4500', '', NULL, '2'),
(280, 'EXTRA TOPPINGS SWEET CORN/OLIVE/AVOCADO/SHRIMPS/TU', '6', 'Plate', '1', '700', '', '', '2'),
(281, 'ICE CREAM', '5', 'Cup', '1', '500', '', NULL, '2'),
(282, 'CAKE', '5', 'Unit', '1', '500', '', NULL, '2'),
(283, 'PLANTAIN PORRAGE WITH FISH', '6', 'Plate', '1', '3000', '', NULL, '2'),
(284, 'PLANTAIN PORRAGE WITH GOAT MEAT/CHICKEN', '6', 'Plate', '1', '2500', '', NULL, '2'),
(285, 'YAM PORRAGE WITH FRESH FISH', '6', 'Plate', '1', '3000', '', NULL, '2'),
(286, 'YAM PORRAGE WITH GOAT MEAT/CHICKEN ', '6', 'Plate', '1', '2500', '', NULL, '2'),
(287, 'Dry Fish n Sauce', '6', '', '1', '2000', '', NULL, '2'),
(288, 'Fried Plantain', '6', 'Plate', '1', '500', '', NULL, '2'),
(289, 'Boiled Potato', '6', 'Plate', '1', '500', '', NULL, '2'),
(290, 'FRESH FISH PEPPER SAUCE', '6', 'Plate', '1', '2000', '', NULL, '2'),
(291, 'BOIL YAM AND EGG SAUCE', '6', 'Plate', '1', '1500', '', NULL, '2'),
(292, 'BOIL PLANTAIN AND EGG SAUCE', '6', 'Plate', '1', '1500', '', NULL, '2'),
(293, 'FRIE PLANTAIN AND EGG SAUCE', '6', 'Plate', '1', '1500', '', NULL, '2'),
(294, 'CHICKEN PEPPER SAUCE ', '6', 'Plate', '1', '1000', '', NULL, '2'),
(295, 'WHITE RICE PEPPER SAUCE WITH GOAT MEAT/CHICKEN', '6', 'Plate', '1', '2000', '', NULL, '2'),
(296, 'WHITE RICE AND SNAIL PEPPER SAUCE', '31', 'Plate', '1', '2500', '', NULL, '2'),
(297, 'SNAIL PEPPER SAUCE', '31', 'Plate', '1', '1500', '', NULL, '2'),
(298, 'SOUP&PROTEIN ONLY(FOR STAFF)', '6', 'Plate', '1', '1500', '', NULL, '2'),
(299, 'GIZARD PEPPER SAUCE', '6', 'Plate', '1', '1000', '', NULL, '2'),
(300, 'AFANG SOUP WITH DRY FISH AND ANY SWALLOW', '6', 'Plate', '1', '3500', '', '2,3,4,5', '2'),
(301, 'VEGETABLE SOUP WITH DRY FISH', '6', 'Plate', '1', '3500', '', '2,3,4,5', '2'),
(302, 'FISHERMAN SOUP/SEMO/POUNDO/GARRI', '6', 'Plate', '1', '3500', '', '2,3,4,5', '2'),
(303, 'AFANG SOUP WITH FRESH FISH/SEMO/POUNDP/GARI', '6', 'Plate', '1', '3000', '', '2,3,4,5', '2'),
(304, 'FRIED RICE WITH FRIED FISH AND SALAD', '6', 'Plate', '1', '3500', '', '', '2'),
(305, 'JELLOF RICE WITH FRIED FISH AND SALAD', '6', 'Plate', '1', '3000', '', '', '2'),
(306, 'NATIVE RICE WITH GOAT MEAT OR CHICKEN', '6', 'Plate', '1', '2500', '', '', '2'),
(307, 'VEGETABLE WITH FRESH FISH', '6', 'Plate', '1', '3000', '', '', '2'),
(308, 'CHICKEN SAUSAGE PIZZA REGULAR', '10', 'Unit', '1', '4000', '', '', '2'),
(309, 'CHICKEN SAUSAGE PIZZA FAMILY', '10', 'Unit', '1', '5000', '', '', '2'),
(310, 'BEEF SHARWAMA (BIG)', '11', 'Unit', '1', '1500', '', '', '2'),
(311, 'CHICKEN/HOT-DOG SHARWAMA (BIG)', '11', 'Unit', '1', '1500', '', '', '2'),
(312, 'JOLLOF RICE WITH FISH', '16', 'Plate', '1', '3500', '', '', '2'),
(313, 'GRILL STEAK IN MUSHROOM SAUCE', '5', 'Plate', '1', '4000', '', '', '2'),
(314, 'yamarita', '29', 'Plate', '1', '1500', '', '1,3,4,6', '2');

-- --------------------------------------------------------

--
-- Table structure for table `addroom`
--

CREATE TABLE `addroom` (
  `id` int(50) NOT NULL,
  `roomType` varchar(50) NOT NULL,
  `categoryid` varchar(45) DEFAULT NULL,
  `roomrate` varchar(50) DEFAULT '0',
  `roomDescription` varchar(300) DEFAULT '',
  `pic` varchar(80) DEFAULT '',
  `roomQuantity` varchar(50) DEFAULT '',
  `roomleft` int(45) DEFAULT 0,
  `facilities` varchar(200) DEFAULT '',
  `noofadult` varchar(45) DEFAULT '0',
  `noofchildren` varchar(45) DEFAULT '0',
  `currentinv` varchar(65) DEFAULT '',
  `rcardno` varchar(45) DEFAULT NULL,
  `rlockno` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `addroom`
--

INSERT INTO `addroom` (`id`, `roomType`, `categoryid`, `roomrate`, `roomDescription`, `pic`, `roomQuantity`, `roomleft`, `facilities`, `noofadult`, `noofchildren`, `currentinv`, `rcardno`, `rlockno`, `issync`) VALUES
(1, 'Room 1101', '1', '15000', '', '', '1', 1, '5,8,6,4,2,1,7,3', '1', '2', '', '1101', '101101', '2'),
(2, 'Room 1102', '1', '20000', '', '', '1', 0, '5,8,6,4,2,1,7,3', '2', '2', '67277853', '1102', '101102', '2'),
(3, 'Room 1103', '2', '25000', '', '', '1', 0, '5,8,6,4,2,1,7,3', '2', '3', '24531639', '1103', '101103', '2'),
(4, 'Room 1104', '38', '35000', '', '', '1', 1, '5,8,6,4,2,1,7,3', '2', '4', '', '1104', '101104', '2');

-- --------------------------------------------------------

--
-- Table structure for table `addroomfacility`
--

CREATE TABLE `addroomfacility` (
  `id` int(32) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `addroomfacility`
--

INSERT INTO `addroomfacility` (`id`, `name`, `description`, `issync`) VALUES
(1, 'Flat Screen TV', '', '2'),
(2, 'Fan', '', '2'),
(3, 'Refrigerator', '', '2'),
(4, 'Chairs', '', '2'),
(5, ' Tables', '', '2'),
(6, 'Bed', '', '2'),
(7, 'Office Table', '', '2'),
(8, 'AC', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `addspa`
--

CREATE TABLE `addspa` (
  `id` int(32) NOT NULL,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(50) DEFAULT '',
  `measure` varchar(50) DEFAULT 'Sale',
  `duration` varchar(50) DEFAULT '1',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addsport`
--

CREATE TABLE `addsport` (
  `id` int(32) NOT NULL,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(50) DEFAULT '',
  `status` varchar(50) DEFAULT 'Sale',
  `quantity` varchar(50) DEFAULT '1',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addswimpool`
--

CREATE TABLE `addswimpool` (
  `id` int(32) NOT NULL,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(50) DEFAULT '',
  `measure` varchar(50) DEFAULT 'Sale',
  `duration` varchar(50) DEFAULT '1',
  `price` varchar(50) DEFAULT '0',
  `description` varchar(100) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `addswimpool`
--

INSERT INTO `addswimpool` (`id`, `name`, `categoryid`, `measure`, `duration`, `price`, `description`, `issync`) VALUES
(1, 'Swimming Pool 001', '', 'Hour', '1', '1000', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `barrequest`
--

CREATE TABLE `barrequest` (
  `id` int(45) NOT NULL,
  `bartype` varchar(80) DEFAULT NULL,
  `itemname` varchar(80) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT NULL,
  `qty` int(45) DEFAULT 0,
  `staffid` varchar(45) DEFAULT NULL,
  `approveby` varchar(35) DEFAULT '',
  `approvedate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(32) NOT NULL,
  `department_name` varchar(62) DEFAULT NULL,
  `department_budget` varchar(62) DEFAULT NULL,
  `issync` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ewallet`
--

CREATE TABLE `ewallet` (
  `id` int(45) NOT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `lastdeposit` int(50) DEFAULT 0,
  `lastddate` date DEFAULT NULL,
  `lastwithdraw` int(45) DEFAULT 0,
  `lastwdate` date DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(45) NOT NULL,
  `title` varchar(80) DEFAULT NULL,
  `expdate` date DEFAULT NULL,
  `amount` int(45) DEFAULT 0,
  `description` varchar(100) DEFAULT NULL,
  `staffid` varchar(45) DEFAULT NULL,
  `approveby` varchar(35) DEFAULT '',
  `dept` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `id` int(45) NOT NULL,
  `surname` varchar(50) DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `address` varchar(80) DEFAULT '',
  `dob` varchar(45) DEFAULT '',
  `email` varchar(65) DEFAULT '',
  `phone` varchar(45) DEFAULT '',
  `gender` varchar(35) DEFAULT '',
  `nationality` varchar(45) DEFAULT '',
  `origin` varchar(45) DEFAULT '',
  `lga` varchar(45) DEFAULT '',
  `enametel` varchar(100) DEFAULT '',
  `nokname` varchar(65) DEFAULT '',
  `nokphone` varchar(45) DEFAULT '',
  `nokaddress` varchar(80) DEFAULT '',
  `how2contact` varchar(65) DEFAULT '',
  `howuhear` varchar(45) DEFAULT '',
  `regdate` varchar(45) DEFAULT '',
  `pix` varchar(65) DEFAULT '',
  `currentinv` varchar(50) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gym1`
--

CREATE TABLE `gym1` (
  `id` int(45) NOT NULL,
  `regno` varchar(45) DEFAULT '',
  `userid` varchar(45) DEFAULT '',
  `goals` varchar(100) DEFAULT '',
  `smoker` varchar(35) DEFAULT '',
  `alcoholperwk` varchar(45) DEFAULT '',
  `ghealth` varchar(80) DEFAULT '',
  `details` varchar(100) DEFAULT '',
  `mednotes` varchar(35) DEFAULT '',
  `waterdaily` varchar(35) DEFAULT '',
  `healthdiet` varchar(35) DEFAULT '',
  `mmeal` varchar(50) DEFAULT '',
  `emeal` varchar(50) DEFAULT '',
  `foodweak` varchar(35) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gymdurations`
--

CREATE TABLE `gymdurations` (
  `id` int(45) NOT NULL,
  `title` varchar(45) DEFAULT '',
  `duration` varchar(35) DEFAULT '1',
  `price` varchar(45) DEFAULT '0',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gympayments`
--

CREATE TABLE `gympayments` (
  `id` int(45) NOT NULL,
  `userid` varchar(45) DEFAULT '',
  `invoiceid` varchar(50) DEFAULT '',
  `duration` varchar(35) DEFAULT '',
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `membertype` varchar(45) DEFAULT '',
  `regfee` varchar(45) DEFAULT '0',
  `debittype` varchar(45) DEFAULT '',
  `paymenttype` varchar(50) DEFAULT '',
  `amount` varchar(50) DEFAULT '0',
  `ddamount` varchar(50) DEFAULT '0',
  `total` varchar(50) DEFAULT '0',
  `amountpaid` varchar(50) DEFAULT '0',
  `balance` varchar(45) DEFAULT '0',
  `ispaid` varchar(30) DEFAULT '1',
  `status` varchar(50) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `onlineorders`
--

CREATE TABLE `onlineorders` (
  `id` int(65) NOT NULL,
  `hotelid` varchar(65) DEFAULT '',
  `invoiceid` varchar(80) DEFAULT '',
  `customerid` varchar(65) DEFAULT '',
  `customerlname` varchar(50) DEFAULT NULL,
  `customerfname` varchar(45) DEFAULT '',
  `customeremail` varchar(85) DEFAULT '',
  `customerphone` varchar(65) DEFAULT '',
  `roomid` varchar(50) DEFAULT '',
  `roomname` varchar(80) DEFAULT '',
  `bookingsite` varchar(100) DEFAULT '',
  `adult` varchar(50) DEFAULT '0',
  `children` varchar(50) DEFAULT '0',
  `noofroom` varchar(45) DEFAULT '0',
  `amount` varchar(45) DEFAULT '0',
  `paymenttype` varchar(60) DEFAULT '',
  `ispaid` varchar(10) DEFAULT '0',
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `orderdate` varchar(10) DEFAULT '',
  `status` int(15) DEFAULT 0 COMMENT '0-New, 1-Viewed, 2-Processed, 3-Cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `isroom` varchar(10) DEFAULT '',
  `isbar` varchar(10) DEFAULT '',
  `isbar2` varchar(35) DEFAULT '0',
  `isbar3` varchar(45) DEFAULT '0',
  `issport` varchar(10) DEFAULT '',
  `isspa` varchar(10) DEFAULT NULL,
  `islaundary` varchar(10) DEFAULT NULL,
  `isrestaurant` varchar(10) DEFAULT '0',
  `isswimpool` varchar(10) DEFAULT '0',
  `orderdate` date DEFAULT NULL,
  `ordertime` time DEFAULT NULL,
  `checkouttime` time DEFAULT NULL,
  `total` varchar(65) DEFAULT '',
  `servicecharge` int(45) DEFAULT 0,
  `roomfoodcat` varchar(45) DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `iswallet` varchar(20) DEFAULT '0',
  `issync` varchar(20) DEFAULT '0',
  `paystatus` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoiceid`, `guestid`, `roomid`, `isroom`, `isbar`, `isbar2`, `isbar3`, `issport`, `isspa`, `islaundary`, `isrestaurant`, `isswimpool`, `orderdate`, `ordertime`, `checkouttime`, `total`, `servicecharge`, `roomfoodcat`, `ispaid`, `iswallet`, `issync`, `paystatus`) VALUES
(1, '56067604', '11', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '2022-08-22', '21:37:00', NULL, '30000', 0, NULL, '1', '0', '2', ''),
(2, '1661200822', '1', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '2022-08-22', '21:40:00', NULL, '16500', 0, NULL, '1', '0', '2', ''),
(3, '1661202144', '1', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '2022-08-22', '22:02:00', NULL, '1300', 0, NULL, '1', '0', '0', ''),
(4, '1669635579', '13', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-11-28', '12:39:39', NULL, '6000', 0, NULL, '1', '0', '0', 'cw'),
(5, 'D1669635597', '13', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0000-00-00', '12:39:57', NULL, '3000', 0, NULL, '1', '0', '0', 'ww'),
(6, 'D1669635718', '', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-11-28', '12:41:58', NULL, '1500', 0, NULL, '1', '0', '0', 'cw'),
(7, 'D1669635737', '13', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-11-28', '12:42:17', NULL, '1500', 0, NULL, '1', '0', '0', 'ew'),
(8, '64507419', '13', '2', '1', '0', '0', '0', '0', '0', '0', '0', '0', '2022-11-28', '14:00:00', NULL, '38000', 0, NULL, '0', '0', '0', ''),
(9, '1669756238', '13', '2', '0', '1', '0', '0', '0', '0', '0', '0', '0', '2022-11-29', '22:10:00', NULL, '2700', 0, NULL, '0', '0', '0', ''),
(10, '66940220', '13', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '2022-12-26', '17:47:00', NULL, '60000', 0, NULL, '0', '0', '0', ''),
(11, '1672301494', '11', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-12-29', '09:11:34', NULL, '60000', 0, NULL, '1', '0', '0', 'cw'),
(12, '1672301511', '15', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-12-29', '09:11:51', NULL, '120000', 0, NULL, '1', '0', '0', 'cw'),
(13, '1672301532', '1', '', '0', '1', '0', '0', '0', '0', '0', '0', '0', '2022-12-29', '09:12:00', NULL, '14000', 0, NULL, '1', '0', '2', ''),
(14, '1672410833', '11', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-12-30', '15:33:53', NULL, '9000', 0, NULL, '1', '0', '0', 'cw'),
(15, '67277853', '11', '2', '1', '0', '0', '0', '0', '0', '0', '0', '0', '2022-12-30', '15:34:00', NULL, '20000', 0, NULL, '1', '0', '0', 'dw');

-- --------------------------------------------------------

--
-- Table structure for table `order_bar`
--

CREATE TABLE `order_bar` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `itemdescr` varchar(200) DEFAULT '',
  `qty` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT 0,
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `servicecharge` int(45) DEFAULT 0,
  `roomitemcat` varchar(45) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `waiter` varchar(50) DEFAULT '',
  `isflag` varchar(20) DEFAULT '1',
  `issync` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_bar`
--

INSERT INTO `order_bar` (`id`, `invoiceid`, `guestid`, `roomid`, `itemid`, `itemdescr`, `qty`, `discount`, `vat`, `unitprice`, `total`, `servicecharge`, `roomitemcat`, `orderdate`, `ordertime`, `ispaid`, `staffid`, `waiter`, `isflag`, `issync`) VALUES
(1, '1661200822', '1', '', '169', '', '1', '0', 0, '500', '500', 0, '', '2022-08-22', '21:40:00', '1', '5', '', '1', '2'),
(2, '1661200822', '1', '', '27', '', '1', '0', 0, '7000', '7000', 0, '', '2022-08-22', '21:40:00', '1', '5', '', '1', '2'),
(3, '1661200822', '1', '', '14', '', '1', '0', 0, '9000', '9000', 0, '', '2022-08-22', '21:40:00', '1', '5', '', '1', '2'),
(4, '1661202144', '1', '', '169', '', '1', '0', 0, '500', '500', 0, '', '2022-08-22', '22:02:00', '1', '5', 'Waiter 1 (Salt)', '1', ''),
(5, '1661202144', '1', '', '141', '', '1', '0', 0, '300', '300', 0, '', '2022-08-22', '22:02:00', '1', '5', 'Waiter 1 (Salt)', '1', ''),
(6, '1661202144', '1', '', '57', '', '1', '0', 0, '500', '500', 0, '', '2022-08-22', '22:02:00', '1', '5', 'Waiter 1 (Salt)', '1', ''),
(7, '1669756238', '13', '2', '141', '', '4', '0', 0, '300', '1200', 0, 'Beverage', '2022-11-29', '22:10:00', '0', '5', 'Waiter 1 (Salt)', '1', ''),
(8, '1669756238', '13', '2', '57', '', '3', '0', 0, '500', '1500', 0, 'Beverage', '2022-11-29', '22:10:00', '0', '5', 'Waiter 1 (Salt)', '1', ''),
(9, '1672301532', '1', '', '14', '', '1', '0', 0, '9000', '9000', 0, '', '2022-12-29', '09:12:00', '1', '5', '', '1', '2'),
(10, '1672301532', '1', '', '17', '', '1', '0', 0, '5000', '5000', 0, '', '2022-12-29', '09:12:00', '1', '5', '', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `order_bar2`
--

CREATE TABLE `order_bar2` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `itemdescr` varchar(200) DEFAULT '',
  `qty` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT 0,
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `servicecharge` int(45) DEFAULT 0,
  `roomitemcat` varchar(45) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `waiter` varchar(50) DEFAULT '',
  `isflag` varchar(20) DEFAULT '1',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_bar3`
--

CREATE TABLE `order_bar3` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `itemdescr` varchar(200) DEFAULT '',
  `qty` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT 0,
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `servicecharge` int(45) DEFAULT 0,
  `roomitemcat` varchar(45) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `waiter` varchar(50) DEFAULT '',
  `isflag` varchar(20) DEFAULT '1',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_laundary`
--

CREATE TABLE `order_laundary` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT 0,
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) NOT NULL DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_restaurant`
--

CREATE TABLE `order_restaurant` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `qty` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT 0,
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `servicecharge` int(50) DEFAULT 0,
  `roomfoodcat` varchar(45) DEFAULT NULL,
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `tableno` varchar(45) DEFAULT '',
  `waiter` varchar(50) DEFAULT NULL,
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_room`
--

CREATE TABLE `order_room` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(50) DEFAULT '',
  `noofroom` varchar(50) DEFAULT '',
  `noofperson` varchar(50) DEFAULT '',
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `ordertime` time DEFAULT NULL,
  `duration` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '',
  `vat` varchar(45) DEFAULT '0',
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `checkstatus` varchar(20) DEFAULT 'in' COMMENT 'in/out',
  `ispaid` varchar(20) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_room`
--

INSERT INTO `order_room` (`id`, `invoiceid`, `guestid`, `roomid`, `noofroom`, `noofperson`, `checkin`, `checkout`, `timein`, `timeout`, `orderdate`, `ordertime`, `duration`, `discount`, `vat`, `unitprice`, `total`, `checkstatus`, `ispaid`, `staffid`, `issync`) VALUES
(1, '56067604', '11', '1', '1', '1', '2022-08-22', '2022-08-24', NULL, NULL, '2022-08-22', '21:37:00', '2', '0', '0', '15000', '30000', 'out', '1', '5', '2'),
(2, '64507419', '13', '2', '1', '2', '2022-11-28', '2022-11-30', NULL, NULL, '2022-11-28', '14:00:00', '2', '5', '0', '20000', '38000', 'out', '0', '5', '2'),
(3, '66940220', '13', '1', '1', '2', '2022-12-26', '2022-12-30', NULL, NULL, '2022-12-26', '17:47:00', '4', '0', '0', '15000', '60000', 'out', '0', '5', '2'),
(4, '67277853', '11', '2', '1', '1', '2022-12-30', '2022-12-31', NULL, NULL, '2022-12-30', '15:34:00', '1', '0', '0', '20000', '20000', 'in', '1', '5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `order_spa`
--

CREATE TABLE `order_spa` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `noofperson` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT 0,
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_sportitem`
--

CREATE TABLE `order_sportitem` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(65) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `tranxtype` varchar(45) DEFAULT NULL COMMENT 'Sale or Rent',
  `qty` varchar(50) DEFAULT '',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT 0,
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_swimpool`
--

CREATE TABLE `order_swimpool` (
  `id` int(65) NOT NULL,
  `invoiceid` varchar(80) DEFAULT '',
  `guestid` varchar(65) DEFAULT '',
  `roomid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT '',
  `descr` varchar(200) DEFAULT '',
  `noofperson` varchar(50) DEFAULT '',
  `duration` varchar(45) DEFAULT '1',
  `discount` varchar(45) DEFAULT '0',
  `vat` double DEFAULT 0,
  `unitprice` varchar(55) DEFAULT '',
  `total` varchar(65) DEFAULT '',
  `orderdate` varchar(45) DEFAULT '',
  `ordertime` time DEFAULT NULL,
  `ispaid` varchar(10) DEFAULT '0',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otherpictures`
--

CREATE TABLE `otherpictures` (
  `id` int(65) NOT NULL,
  `pictype` varchar(50) DEFAULT '',
  `pic` varchar(80) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paycab`
--

CREATE TABLE `paycab` (
  `id` int(45) NOT NULL,
  `cabid` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT 0,
  `paydate` varchar(45) DEFAULT NULL,
  `payrealdate` date DEFAULT NULL,
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roompictures`
--

CREATE TABLE `roompictures` (
  `id` int(50) NOT NULL,
  `roomid` varchar(50) DEFAULT '',
  `pic1` varchar(80) DEFAULT '',
  `pic2` varchar(80) DEFAULT '',
  `pic3` varchar(80) DEFAULT '',
  `pic4` varchar(80) DEFAULT '',
  `pic5` varchar(80) DEFAULT '',
  `pic6` varchar(80) DEFAULT '',
  `pic7` varchar(80) DEFAULT '',
  `pic8` varchar(80) DEFAULT '',
  `pic9` varchar(80) DEFAULT '',
  `pic10` varchar(80) DEFAULT '',
  `pic11` varchar(80) DEFAULT '',
  `pic12` varchar(80) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roompictures`
--

INSERT INTO `roompictures` (`id`, `roomid`, `pic1`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `pic7`, `pic8`, `pic9`, `pic10`, `pic11`, `pic12`, `issync`) VALUES
(1, '1', '', '', '', '', '', '', '', '', '', '', '', '', '2'),
(2, '2', '', '', '', '', '', '', '', '', '', '', '', '', '2'),
(3, '3', '', '', '', '', '', '', '', '', '', '', '', '', '2'),
(4, '4', '', '', '', '', '', '', '', '', '', '', '', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(40) NOT NULL,
  `hotelid` varchar(65) DEFAULT '',
  `bookingsite` varchar(80) DEFAULT '',
  `hotelname` varchar(65) DEFAULT '',
  `address` varchar(100) DEFAULT '',
  `state` varchar(45) DEFAULT '',
  `country` varchar(65) DEFAULT '',
  `phone` varchar(65) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `website` varchar(50) DEFAULT '',
  `promodiscount` varchar(50) DEFAULT '',
  `minnoofroom` varchar(50) DEFAULT '1',
  `vat` varchar(50) DEFAULT '0',
  `facebook` varchar(50) DEFAULT '',
  `twitter` varchar(50) DEFAULT '',
  `youtube` varchar(50) DEFAULT '',
  `googlemap` varchar(50) DEFAULT '',
  `logo` varchar(100) DEFAULT '',
  `loginbgpic` varchar(100) DEFAULT '',
  `baritemlimit` varchar(35) DEFAULT '5',
  `servicecharge` int(45) DEFAULT 500,
  `showguestcatlist` varchar(25) DEFAULT '0',
  `currency` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `hotelid`, `bookingsite`, `hotelname`, `address`, `state`, `country`, `phone`, `email`, `website`, `promodiscount`, `minnoofroom`, `vat`, `facebook`, `twitter`, `youtube`, `googlemap`, `logo`, `loginbgpic`, `baritemlimit`, `servicecharge`, `showguestcatlist`, `currency`, `issync`) VALUES
(1, '', '', 'Prenox Hotel', 'Ijebu, Ode', 'Ijebu', 'Nigeria', '07060000000', 'prenox@gmail.com', 'www.prenox.com', '0', '1', '0', 'www.facebook.com/divancrest', 'www.twitter.com/divancrest', 'www.youtube.com/divancrest', 'www.gmap.com/divancrest', '1544506158logo.png', '1544506226lbg.jpg', '5', 0, '1', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tablenos`
--

CREATE TABLE `tablenos` (
  `id` int(45) NOT NULL,
  `name` varchar(50) DEFAULT '',
  `staffid` varchar(45) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tablenos`
--

INSERT INTO `tablenos` (`id`, `name`, `staffid`, `issync`) VALUES
(1, 'Table 001', '5', '2'),
(2, 'Table 002', '5', '2'),
(3, 'Table 003', '5', '2'),
(4, 'Table 004', '5', '2'),
(5, 'Table 005', '5', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `cattype` varchar(50) DEFAULT '',
  `catname` varchar(80) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `cattype`, `catname`, `issync`) VALUES
(1, 'room', 'Classic', '2'),
(2, 'room', 'Deluxe', '2'),
(3, 'bar', 'Non Alcoholic', '2'),
(5, 'restaurant', 'Continental Dishes', '2'),
(6, 'restaurant', 'African Dishes', '2'),
(7, 'restaurant', 'Conventionary', '2'),
(8, 'bar', 'Alcoholic', '2'),
(9, 'room', 'Junior Suite', '2'),
(10, 'restaurant', 'ITALIAN PIZZA MENU', '2'),
(11, 'restaurant', 'SANDWICHES', '2'),
(12, 'restaurant', 'BURGER', '2'),
(13, 'restaurant', 'SALAD', '2'),
(14, 'restaurant', 'FINGER FOODS', '2'),
(15, 'restaurant', 'NOODLES', '2'),
(16, 'restaurant', 'RICE', '2'),
(17, 'restaurant', 'CHIEF FAVOURITE DISH ', '2'),
(18, 'restaurant', 'GRILL CORNER', '2'),
(19, 'restaurant', 'STARTER', '2'),
(20, 'restaurant', 'BEEF', '2'),
(21, 'restaurant', 'CHICKEN', '2'),
(22, 'restaurant', 'SEA FOOD', '2'),
(23, 'restaurant', 'FISH ', '2'),
(24, 'restaurant', 'PORK', '2'),
(25, 'restaurant', 'VEGETABLES', '2'),
(26, 'restaurant', 'SAUCES', '2'),
(27, 'restaurant', 'DESERT', '2'),
(28, 'restaurant', 'BREAKFAST', '2'),
(29, 'restaurant', 'AMERICAN', '2'),
(30, 'restaurant', 'PASTA DISHES', '2'),
(31, 'restaurant', 'NIGERIAN DISHES', '2'),
(32, 'restaurant', 'NIGERIAN DISHES (PEPPER SOUP)', '2'),
(33, 'restaurant', 'PEPPER SAUCE', '2'),
(34, 'restaurant', 'FRUIT', '2'),
(35, 'restaurant', 'pack', '2'),
(36, 'room', '1 Bedroom Suite', '2'),
(37, 'room', 'Premium Deluxe', '2'),
(38, 'room', 'Premium Classic', '2'),
(39, 'room', 'Premium Deluxe Pool', '2'),
(40, 'room', 'Deluxe Pool', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(45) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contactperson` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `regdate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `name`, `contactperson`, `address`, `phone`, `regdate`, `issync`) VALUES
(1, 'Lantex Inc.', 'Rasheed', '897 Janny road, Agege.', '08088877888', '1625402208', '2'),
(2, 'Walex Ranny', 'Adewale Cole', '65 Dosun Agric road', '016765667', '1625402236', '2'),
(3, 'Jammy Corp', 'James Alex', '121 Desmond road', '09088877876', '1625405964', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblcountry`
--

CREATE TABLE `tblcountry` (
  `id` int(45) NOT NULL,
  `country` varchar(50) DEFAULT '',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcountry`
--

INSERT INTO `tblcountry` (`id`, `country`, `issync`) VALUES
(1, 'Nigeria', '2'),
(2, 'United States of America', '2'),
(3, 'Afghanistan', '2'),
(4, 'Albania', '2'),
(5, 'Algeria', '2'),
(6, 'American Samoa', '2'),
(7, 'Andorra', '2'),
(8, 'Angola', '2'),
(9, 'Anguilla', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblingredients`
--

CREATE TABLE `tblingredients` (
  `id` int(50) NOT NULL,
  `name` varchar(65) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblingredients`
--

INSERT INTO `tblingredients` (`id`, `name`, `issync`) VALUES
(1, 'Palm Oil', '0'),
(2, 'Red Oil', '2'),
(3, ' Meat', '0'),
(4, ' Salt', '0'),
(5, 'Sugar', '0'),
(6, 'Melon', '0'),
(8, 'Vegetable', '0'),
(9, 'Semolina', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblinstruct`
--

CREATE TABLE `tblinstruct` (
  `id` int(45) NOT NULL,
  `itemid` varchar(45) DEFAULT '',
  `overallstock` varchar(50) DEFAULT '0',
  `itemleft` varchar(45) DEFAULT '0',
  `regdate` date DEFAULT NULL,
  `regtime` varchar(45) DEFAULT NULL,
  `elapsedate` date DEFAULT NULL,
  `qty2restock` int(45) DEFAULT 0,
  `qtyrestocked` int(45) DEFAULT 0,
  `message` varchar(500) DEFAULT '',
  `servicetype` varchar(45) DEFAULT 'bar',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblmcardreason`
--

CREATE TABLE `tblmcardreason` (
  `id` int(45) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `staffid` varchar(45) DEFAULT NULL,
  `regdate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblrestock`
--

CREATE TABLE `tblrestock` (
  `id` int(45) NOT NULL,
  `itemid` varchar(45) DEFAULT '',
  `itemtype` varchar(35) DEFAULT '',
  `qty` int(50) DEFAULT 0,
  `itemleft` varchar(45) DEFAULT '0',
  `regdate` date DEFAULT NULL,
  `regstamp` varchar(45) DEFAULT '',
  `staff` varchar(45) DEFAULT '',
  `regtime` time(6) DEFAULT NULL,
  `costprice` int(50) DEFAULT 0,
  `price` int(50) DEFAULT 0,
  `newstock` int(45) DEFAULT 0,
  `oldremstock` int(45) DEFAULT 0,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `id` int(45) NOT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `checkindate` date DEFAULT NULL,
  `checkoutdate` date DEFAULT NULL,
  `roomid` varchar(40) DEFAULT NULL,
  `paystatus` varchar(45) DEFAULT NULL,
  `orderdate` varchar(50) DEFAULT NULL,
  `invoiceid` varchar(50) DEFAULT NULL,
  `amount` varchar(45) DEFAULT '0',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblshifts`
--

CREATE TABLE `tblshifts` (
  `id` int(50) NOT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `openshift` varchar(45) DEFAULT NULL,
  `closeshift` varchar(45) DEFAULT NULL,
  `servicetype` varchar(50) DEFAULT NULL,
  `xlsurl` varchar(80) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblshifts`
--

INSERT INTO `tblshifts` (`id`, `userid`, `openshift`, `closeshift`, `servicetype`, `xlsurl`, `issync`) VALUES
(2, '6', '2021-07-15 07:44 AM', '2021-08-19 11:16 AM', 'bar1', '2021-07-15-07-44-37-AM-bar1.xls', '2'),
(3, '5', '2021-08-19 11:16 AM', '2021-08-19 03:40 PM', 'bar1', '2021-08-19-11-16-32-AM-bar1.xls', '2'),
(4, '5', '2021-08-19 03:40 PM', '2021-08-19 03:40 PM', 'bar1', '2021-08-19-03-40-25-PM-bar1.xls', '2'),
(5, '5', '2021-08-19 03:40 PM', '2021-08-19 03:40 PM', 'bar1', '2021-08-19-03-40-28-PM-bar1.xls', '2'),
(6, '5', '2021-08-19 03:40 PM', '2021-08-19 03:40 PM', 'bar1', '2021-08-19-03-40-34-PM-bar1.xls', '2'),
(7, '5', '2021-08-19 03:40 PM', '2021-08-19 03:41 PM', 'bar1', '2021-08-19-03-40-55-PM-bar1.xls', '2'),
(8, '5', '2021-08-19 03:41 PM', '2021-08-19 03:41 PM', 'bar1', '2021-08-19-03-41-02-PM-bar1.xls', '2'),
(9, '5', '2021-08-19 03:41 PM', '2021-08-19 03:43 PM', 'bar1', '2021-08-19-03-41-31-PM-bar1.xls', '2'),
(10, '5', '2021-08-19 03:43 PM', '', 'bar1', '2021-08-19-03-43-07-PM-bar1.xls', '2'),
(11, '9', '2021-08-19 04:41 PM', '2021-08-22 07:26 PM', 'receptionist', '2021-08-19-04-41-19-PM-receptionist.xls', '2'),
(12, '9', '2021-08-22 07:26 PM', '2021-08-22 09:37 PM', 'receptionist', '2021-08-22-07-26-45-PM-receptionist.xls', '2'),
(13, '9', '2021-08-22 09:37 PM', '2021-09-02 02:58 PM', 'receptionist', '2021-08-22-09-37-06-PM-receptionist.xls', '2'),
(14, '9', '2021-09-02 02:58 PM', '2022-05-23 01:40 PM', 'receptionist', '2021-09-02-02-58-56-PM-receptionist.xls', '2'),
(15, '5', '2022-05-11 02:03 PM', '', 'bar3', '2022-05-11-02-03-35-PM-bar3.xls', '0'),
(16, '5', '2022-05-23 01:36 PM', '', 'bar2', '2022-05-23-01-36-08-PM-bar2.xls', '0'),
(17, '9', '2022-05-23 01:40 PM', '2022-05-23 02:03 PM', 'receptionist', '2022-05-23-01-40-27-PM-receptionist.xls', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `id` int(50) NOT NULL,
  `cid` varchar(50) DEFAULT '1',
  `state` varchar(50) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`id`, `cid`, `state`, `issync`) VALUES
(1, '1', 'Abia', '2'),
(2, '1', 'Abuja', '2'),
(3, '1', 'Adamawa', '2'),
(4, '1', 'Akwa Ibom', '2'),
(5, '1', 'Anambra', '2'),
(6, '1', 'Bauchi', '2'),
(7, '1', 'Bayelsa', '2'),
(8, '1', 'Benue', '2'),
(9, '1', 'Borno', '2'),
(10, '1', 'Cross River', '2'),
(11, '1', 'Delta', '2'),
(12, '1', 'Ebonyi', '2'),
(13, '1', 'Edo', '2'),
(14, '1', 'Ekiti', '2'),
(15, '1', 'Enugu', '2'),
(16, '1', 'Gombe', '2'),
(17, '1', 'Imo', '2'),
(18, '1', 'Jigawa', '2'),
(19, '1', 'Kaduna', '2'),
(20, '1', 'Kano', '2'),
(21, '1', 'Katsina', '2'),
(22, '1', 'Kebbi', '2'),
(23, '1', 'Kogi', '2'),
(24, '1', 'Kwara', '2'),
(25, '1', 'Lagos', '2'),
(26, '1', 'Nassarawa', '2'),
(27, '1', 'Niger', '2'),
(28, '1', 'Ogun', '2'),
(29, '1', 'Ondo', '2'),
(30, '1', 'Osun', '2'),
(31, '1', 'Oyo', '2'),
(32, '1', 'Plateau', '2'),
(33, '1', 'Rivers', '2'),
(34, '1', 'Sokoto', '2'),
(35, '1', 'Taraba', '2'),
(36, '1', 'Yobe', '2'),
(37, '1', 'Zamfara', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblstore`
--

CREATE TABLE `tblstore` (
  `id` int(32) NOT NULL,
  `name` varchar(62) DEFAULT '',
  `categoryid` varchar(45) DEFAULT '',
  `qtyinstore` int(45) DEFAULT 0,
  `measure` varchar(50) DEFAULT 'bottle',
  `quantity` varchar(50) DEFAULT '1',
  `costprice` int(50) DEFAULT 0,
  `price` varchar(50) DEFAULT '0',
  `barcode` varchar(80) DEFAULT '',
  `newstock` int(45) DEFAULT 0,
  `oldremstock` int(45) DEFAULT 0,
  `regdate` varchar(45) DEFAULT NULL,
  `lastupdate` varchar(45) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstore`
--

INSERT INTO `tblstore` (`id`, `name`, `categoryid`, `qtyinstore`, `measure`, `quantity`, `costprice`, `price`, `barcode`, `newstock`, `oldremstock`, `regdate`, `lastupdate`, `issync`) VALUES
(1, ' BLACK BULLET ', '8', 48, 'Bottle', '1', 0, '0', '', 48, 48, '1565716159', '1565716159', '2'),
(2, ' LA MONDENSE LAMBRUSCO', '8', 0, 'Bottle', '1', 0, '0', '', 12, 0, '1565716183', '1565716183', '2'),
(3, 'CAN CLIMAX ', '8', 24, 'Bottle', '1', 0, '0', '', 24, 24, '1565716207', '1565716207', '2'),
(4, 'ORIS', '8', 0, 'Bottle', '1', 0, '0', '', 10, 0, '1565716226', '1565716226', '2'),
(5, 'SMALL SMIRNOFF ICE ', '8', 0, 'Bottle', '1', 0, '0', '', 72, 0, '1565716242', '1565716242', '2'),
(6, 'DOTCHESTER', '8', 20, 'Bottle', '1', 0, '0', '', 30, 0, '1565716325', '1565716325', '2'),
(7, 'AMSTEL MALT', '8', 0, 'Bottle', '1', 0, '0', '', 120, 0, '1565716386', '1565716386', '2'),
(8, 'AMSTEL MALT CAN', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565716408', '1565716408', '2'),
(9, 'RED LABEL', '8', 25, 'Bottle', '1', 0, '0', '', 12, 25, '1565716533', '1565716533', '2'),
(10, 'CARLO ROSSI', '8', 8, 'Bottle', '1', 0, '0', '', 19, 0, '1565716547', '1565716547', '2'),
(11, 'SMIRNOFF GREEN APPLE ', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565716567', '1565716567', '2'),
(12, 'CAN POWER HORSE', '8', 0, 'Bottle', '1', 0, '0', '', 48, 0, '1565716616', '1565716616', '2'),
(13, 'BIG LEGEND', '8', 96, 'Bottle', '1', 0, '0', '', 36, 60, '1565716677', '1565716677', '2'),
(14, 'BENSON', '8', 0, 'Bottle', '1', 0, '0', '', 40, 0, '1565716687', '1565716687', '2'),
(15, 'BEST CREAM', '8', 2, 'Bottle', '1', 0, '0', '', 12, 2, '1565716698', '1565716698', '2'),
(16, 'EXOTIC JUICE ', '3', 30, 'Bottle', '1', 0, '0', '', 50, 0, '1565716721', '1565716721', '2'),
(17, 'METUS ROSE', '8', 1, 'Bottle', '1', 0, '0', '', 12, 1, '1565716751', '1565716751', '2'),
(18, 'ROTHMANS', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565716801', '1565716801', '2'),
(19, 'BOTTLE AMSTEL MALT', '8', 0, 'Bottle', '1', 0, '0', '', 96, 0, '1565717638', '1565717638', '2'),
(20, 'CAN MONSTER', '8', 0, 'Bottle', '1', 0, '0', '', 24, 0, '1565717717', '1565717717', '2'),
(21, 'BOTTLE STAR RADLER', '8', 100, 'Bottle', '1', 0, '0', '', 80, 120, '1565717842', '1565717842', '2'),
(22, 'CLIMAX PET', '8', 0, 'Bottle', '1', 0, '0', '', 24, 0, '1565717880', '1565717880', '2'),
(23, 'SMALL BLACK LABEL', '8', 0, 'Bottle', '1', 0, '0', '', 5, 1, '1565717921', '1565717921', '2'),
(24, 'BOTTLE GUINESS MALT', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565717958', '1565717958', '2'),
(25, 'MAGIC MOMENT', '8', 0, 'Bottle', '1', 0, '0', '', 24, 0, '1565718022', '1565718022', '2'),
(26, 'GRAND MALT', '8', 0, 'Bottle', '1', 0, '0', '0', 24, 0, '1565718049', '1565718049', '2'),
(27, 'CAN MALTA GUINNESS', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565718065', '1565718065', '2'),
(28, 'FAYROUZ', '8', 120, 'Bottle', '1', 0, '0', '', 72, 144, '1565718079', '1565718079', '2'),
(29, 'EAGLE STOUT', '8', 84, 'Bottle', '1', 0, '0', '', 12, 84, '1565718102', '1565718102', '2'),
(30, 'SMALL RED LABEL', '8', 4, 'Bottle', '1', 0, '0', '', 24, 0, '1565718117', '1565718117', '2'),
(31, 'HERO', '8', 0, 'Bottle', '1', 0, '0', '', 60, 60, '1565718141', '1565718141', '2'),
(32, 'TROPHY', '8', 216, 'Bottle', '1', 0, '0', '', 120, 96, '1565718158', '1565718158', '2'),
(33, 'CELLA LAMBRUSCO', '8', 0, 'Bottle', '1', 0, '0', '', 12, 0, '1565718207', '1565718207', '2'),
(34, 'CHAMDOR', '8', 15, 'Bottle', '1', 0, '0', '', 12, 5, '1565718229', '1565718229', '2'),
(35, 'GOTAS DE PLATA', '8', 0, 'Bottle', '1', 0, '0', '', 60, 0, '1565718248', '1565718248', '2'),
(36, 'CHAMPION', '8', 144, 'Bottle', '1', 0, '0', '', 60, 204, '1565718285', '1565718285', '2'),
(37, 'SMIRNOFF  CHOCOLATE VODKA 75CL', '8', 12, 'Bottle', '1', 0, '0', '', 12, 7, '1565718368', '1565718368', '2'),
(38, 'JACK DANIELS', '8', 0, 'Bottle', '1', 0, '0', '', 4, 0, '1565718387', '1565718387', '2'),
(39, 'CIROC', '8', 50, 'Bottle', '1', 0, '0', '', 1, 50, '1565718400', '1565718400', '2'),
(40, 'MOET ROSE', '8', 0, 'Bottle', '1', 0, '0', '', 12, 0, '1565718413', '1565718413', '2'),
(41, 'CRANBERRY JUICE', '8', 8, 'Bottle', '1', 0, '0', '', 16, 0, '1565718432', '1565718432', '2'),
(42, 'HENNESSY VS', '8', 3, 'Bottle', '1', 0, '0', '', 6, 3, '1565718457', '1565718457', '2'),
(43, 'DROSTDY HOF (BIG)', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565718475', '1565718475', '2'),
(44, 'MC DOWEL ', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565718489', '1565718489', '2'),
(45, 'WATER', '3', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565718531', '1565718531', '2'),
(46, 'DUNHILL', '8', 0, 'Bottle', '1', 0, '0', '', 10, 0, '1565718555', '1565718555', '2'),
(47, 'DUSSE VSOP', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565718571', '1565718571', '2'),
(48, 'HENNESSY VSOP', '8', 0, 'Bottle', '1', 0, '0', '54334767774534', 6, 0, '1565718592', '1565718592', '2'),
(49, 'EXTRA CHACOAL SHISHA', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565718609', '1565718609', '2'),
(50, 'GLENFFIDISH 15 YRS OLD', '8', 2, 'Bottle', '1', 0, '0', '', 6, 0, '1565718624', '1565718624', '2'),
(51, 'GLENFIDDCH (18YRS)', '8', 1, 'Bottle', '1', 0, '0', '', 6, 1, '1565718639', '1565718639', '2'),
(52, 'GLENFIDDICH WHISKY 12 YEARS', '8', 3, 'Bottle', '1', 0, '0', '', 6, 11, '1565718751', '1565718751', '2'),
(53, 'GRAND MALT CAN', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565718770', '1565718770', '2'),
(54, 'GULDER', '8', 60, 'Bottle', '1', 0, '0', '', 72, 48, '1565718810', '1565718810', '2'),
(55, 'MOET ROSE (SMALL)', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565718826', '1565718826', '2'),
(56, 'VITA MILK', '3', 0, 'Bottle', '1', 0, '0', '', 120, 0, '1565718840', '1565718840', '2'),
(57, 'SMIRNOFF ORANGE 1 LITRE', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565718858', '1565718858', '2'),
(58, 'HOLLANDIA', '3', 50, 'Bottle', '1', 0, '0', '', 20, 50, '1565718950', '1565718950', '2'),
(59, 'JAMESON', '8', 12, 'Bottle', '1', 0, '0', '', 12, 6, '1565718963', '1565718963', '2'),
(60, 'LAMBRUSCO REUNITE', '8', 12, 'Bottle', '1', 0, '0', '', 24, 0, '1565718980', '1565718980', '2'),
(61, 'LIFE', '8', 102, 'Bottle', '1', 0, '0', '', 180, 66, '1565719033', '1565719033', '2'),
(62, 'ORIGIN BIG', '8', 72, 'Bottle', '1', 0, '0', '', 180, 0, '1565719045', '1565719045', '2'),
(63, 'MALTINA', '3', 312, 'Bottle', '1', 0, '0', '', 360, 120, '1565719066', '1565719066', '2'),
(64, 'MARTELL BLUE SWIFT', '8', 4, 'Bottle', '1', 0, '0', '', 12, 0, '1565719141', '1565719141', '2'),
(65, 'MEDIUM STOUT', '8', 90, 'Bottle', '1', 0, '0', '', 54, 54, '1565719199', '1565719199', '2'),
(66, 'VEUVE CLICQUET', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565719229', '1565719229', '2'),
(67, 'NECTAR ROSE', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565719242', '1565719242', '2'),
(68, 'PEANUT BIG', '3', 0, 'Bottle', '1', 0, '0', '', 5, 0, '1565719257', '1565719257', '2'),
(69, 'PEANUT SMALL', '3', 0, 'Bottle', '1', 0, '0', '', 60, 0, '1565719269', '1565719269', '2'),
(70, 'ROYAL CHALLENGE', '8', 30, 'Bottle', '1', 0, '0', '', 21, 7, '1565719328', '1565719328', '2'),
(71, 'REMY MARTINS VSOP', '8', 0, 'Bottle', '1', 0, '0', '', 6, 0, '1565719339', '1565719339', '2'),
(72, 'SATZENBRAU', '8', 72, 'Bottle', '1', 0, '0', '', 72, 0, '1565719372', '1565719372', '2'),
(73, 'SHISHA', '8', 35, 'Bottle', '1', 0, '0', '', 50, 10, '1565719390', '1565719390', '2'),
(74, 'SMALL FIVE ALIVE', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1565719423', '1565719423', '2'),
(75, 'SNAPP', '8', 0, 'Bottle', '1', 0, '0', '', 24, 0, '1565719440', '1565719440', '2'),
(76, 'STAR', '8', 72, 'Bottle', '1', 0, '0', '', 120, 180, '1565719479', '1565719479', '2'),
(77, 'TIGER', '8', 60, 'Bottle', '1', 0, '0', '', 60, 0, '1565719503', '1565719503', '2'),
(78, 'CHIVITA JUICE', '3', 70, 'Bottle', '1', 0, '0', '', 30, 60, '1565719931', '1565719931', '2'),
(79, '33 EXPORT', '8', 216, 'Bottle', '1', 0, '0', '0', 180, 156, '1565720054', '1565720054', '2'),
(80, 'BUDWISER ', '8', 0, 'Bottle', '1', 0, '0', '0', 60, 0, '1565720561', '1565720561', '2'),
(81, 'HEINEKEN (BOTTLE)', '8', 120, 'Bottle', '1', 0, '0', '', 120, 120, '1565795976', '1565795976', '2'),
(82, 'ANDRE ROSE', '8', 1, 'Bottle', '1', 0, '0', '', 25, 0, '1565796026', '1565796026', '2'),
(83, 'BAILEYS', '3', 6, 'Bottle', '1', 0, '0', '', 12, 0, '1565796317', '1565796317', '2'),
(84, 'HENESSY XO', '8', 0, 'Bottle', '1', 0, '0', '', 3, 0, '1565796516', '1565796516', '2'),
(85, 'HENNESSY VS (SMALL)', '8', 5, 'Bottle', '1', 0, '0', '', 9, 2, '1565796620', '1565796620', '2'),
(86, 'PLASTIC COKE', '3', 720, 'Bottle', '1', 0, '0', '', 228, 576, '1565798297', '1565798297', '2'),
(87, 'EVA WATER', '3', 24, 'Bottle', '1', 0, '0', '', 300, 96, '1565798929', '1565798929', '2'),
(88, 'SMALL STOUT', '8', 72, 'Bottle', '1', 0, '0', '', 144, 24, '1565867356', '1565867356', '2'),
(89, 'AFRICAN SPECIAL LEGEND', '8', 0, 'Bottle', '1', 0, '0', '', 36, 0, '1565969125', '1565969125', '2'),
(90, 'CAMPARI', '8', 4, 'Bottle', '1', 0, '0', '', 12, 0, '1565977351', '1565977351', '2'),
(91, 'AMERICAN HONEY', '8', 0, 'Bottle', '1', 0, '0', '', 12, 0, '1566031350', '1566031350', '2'),
(92, 'BLACK LABEL', '8', 28, 'Bottle', '1', 0, '0', '', 24, 12, '1566145684', '1566145684', '2'),
(93, 'CAN HEINEKEN', '8', 0, 'Bottle', '1', 0, '0', '', 24, 0, '1567235021', '1567235021', '2'),
(94, 'BLUE BULLET', '8', 100, 'Bottle', '1', 0, '0', '', 100, 0, '1567235183', '1567235183', '2'),
(95, 'DORCHESTER', '8', 0, 'Bottle', '1', 0, '0', '', 20, 0, '1567360507', '1567360507', '2'),
(96, 'JAMESON BLACK BARREL', '8', 18, 'Bottle', '1', 0, '0', '', 24, 0, '1567532084', '1567532084', '2'),
(97, '1960', '8', 0, 'Bottle', '1', 0, '0', '', 36, 0, '1569001324', '1569001324', '2'),
(98, 'ORIGIN BITTERS PLASTIC', '8', 0, 'Bottle', '1', 0, '0', '', 12, 0, '1569001352', '1569001352', '2'),
(99, 'MARTINI ROSE', '8', 0, 'Bottle', '1', 0, '0', '', 12, 0, '1569055672', '1569055672', '2'),
(100, 'MOET NECTAR IMPERIAL ROSE', '8', 0, 'Bottle', '1', 0, '0', '', 6, 0, '1569685905', '1569685905', '2'),
(101, 'MOET ICE IMPERIAL', '8', 0, 'Bottle', '1', 0, '0', '', 1, 2, '1569686005', '1569686005', '2'),
(102, 'GLENMORANGIE EXTREMELY RARE', '8', 0, 'Bottle', '1', 0, '0', '', 2, 0, '1569686060', '1569686060', '2'),
(103, 'GLENMORANGIE ORIGINAL', '8', 0, 'Bottle', '1', 0, '0', '', 6, 0, '1569686090', '1569686090', '2'),
(104, 'GLENMORANGIE LASANTA', '8', 0, 'Bottle', '1', 0, '0', 'N', 3, 0, '1569686114', '1569686114', '2'),
(105, 'GLENMORANGIE QVINTA RUBAN', '8', 0, 'Bottle', '1', 0, '0', '', 3, 0, '1569686138', '1569686138', '2'),
(106, 'GLENMORANGIE  SIGNET', '8', 1, 'Bottle', '1', 0, '0', '', 3, 0, '1569686157', '1569686157', '2'),
(107, 'VEUVE CLICQOWT RICH', '8', 0, 'Bottle', '1', 0, '0', '', 3, 0, '1569686182', '1569686182', '2'),
(108, 'VEUVE CLICQUOT  ROSE', '8', 1, 'Bottle', '1', 0, '0', '', 3, 0, '1569686194', '1569686194', '2'),
(109, 'TERRAZAC MELBEC', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1569686217', '1569686217', '2'),
(110, 'BELEVEDERE PINK GRAPEFRUIT', '8', 1, 'Bottle', '1', 0, '0', '', 3, 0, '1569686242', '1569686242', '2'),
(111, 'BELEVEDERE VODKA INTENSE', '8', 0, 'Bottle', '1', 0, '0', '', 3, 0, '1569686257', '1569686257', '2'),
(112, 'BELEVEDERE VODKA', '8', 1, 'Bottle', '1', 0, '0', '', 3, 0, '1569686282', '1569686282', '2'),
(113, 'BELEVEDERE BLACK RASPBERRY', '8', 3, 'Bottle', '1', 0, '0', '', 3, 0, '1569686311', '1569686311', '2'),
(114, 'CLOUDY BAY', '8', 15, 'Bottle', '1', 0, '0', '', 12, 3, '1569686341', '1569686341', '2'),
(115, 'GLENFIDDICH 21YRS', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1569847831', '1569847831', '2'),
(116, 'DON PERIGNON', '8', 4, 'Bottle', '1', 0, '0', '', 3, 4, '1569848065', '1569848065', '2'),
(117, 'VEUVE CLICQUOT BRUT', '8', 1, 'Bottle', '1', 0, '0', '', 3, 0, '1569854678', '1569854678', '2'),
(118, 'GLENMORANGIE NECTAR\'DOR', '8', 1, 'Bottle', '1', 0, '0', '', 3, 0, '1570006315', '1570006315', '2'),
(119, 'RAZON (RED WINE VIN ROUGE)', '8', 0, 'Bottle', '1', 0, '0', '', 60, 0, '1572247870', '1572247870', '2'),
(120, 'SANGRIA RED WINE', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1572248057', '1572248057', '2'),
(121, 'WHITE WALKER', '8', 12, 'Bottle', '1', 0, '0', '', 12, 0, '1572509559', '1572509559', '2'),
(122, 'CHAMPION MALT', '8', 144, 'Bottle', '1', 0, '0', '', 72, 72, '1574070342', '1574070342', '2'),
(123, 'BLANC CUVEE', '8', 80, 'Bottle', '1', 0, '0', '', 72, 8, '1574082044', '1574082044', '2'),
(124, 'VEGA CEDRON WINE', '8', 0, 'Bottle', '1', 0, '0', '', 2, 6, '1574082070', '1574082070', '2'),
(125, 'FRAGOLINO ROSE', '8', 6, 'Bottle', '1', 0, '0', '', 30, 0, '1574082098', '1574082098', '2'),
(126, 'MARLANGO RED WINE', '8', 66, 'Bottle', '1', 0, '0', '', 60, 6, '1574082145', '1574082145', '2'),
(127, 'CARUSSO', '8', 18, 'Bottle', '1', 0, '0', '', 30, 0, '1574082171', '1574082171', '2'),
(128, 'DOUBLE BLACK', '8', 0, 'Bottle', '1', 0, '0', '', 24, 0, '1574351215', '1574351215', '2'),
(129, 'FOUR LOKO', '8', 8, 'Bottle', '1', 0, '0', '', 20, 0, '1574458327', '1574458327', '2'),
(130, 'FEARLESS ENERGY DRINK', '8', 36, 'Bottle', '1', 0, '0', '', 24, 12, '1578048333', '1578048333', '2'),
(131, 'SMALL LEGEND', '8', 0, 'Bottle', '1', 0, '0', '', 120, 0, '1578051247', '1578051247', '2'),
(132, 'DUBIC MALT', '8', 48, 'Bottle', '1', 0, '0', '', 360, 0, '1578663150', '1578663150', '2'),
(133, 'CRUNCHES GROUNDNUT SMALL', '8', 0, 'Bottle', '1', 0, '0', '', 12, 0, '1579190226', '1579190226', '2'),
(134, 'CRUNCHES GROUNDNUT MEDIUM', '8', 0, 'Bottle', '1', 0, '0', '', 3, 0, '1579190248', '1579190248', '2'),
(135, 'CRUNCHES GROUNDNUT BIG', '8', 0, 'Bottle', '1', 0, '0', '', 2, 0, '1579190263', '1579190263', '2'),
(136, 'FRIUTA JUICE', '8', 0, 'Bottle', '1', 0, '0', '', 10, 0, '1579263143', '1579263143', '2'),
(137, 'PLASTIC FAYROUZ', '8', 0, 'Bottle', '1', 0, '0', '', 72, 0, '1581516832', '1581516832', '2'),
(138, 'CAN ORIGIN', '8', 0, 'Bottle', '1', 0, '0', '', 48, 0, '1581516972', '1581516972', '2'),
(139, 'SMALL ROYAL CHALLENGE', '8', 0, 'Bottle', '1', 0, '0', '', 0, 0, '1581517357', '1581517357', '2'),
(140, 'HAPPY HOUR JUICE', '8', 80, 'Bottle', '1', 0, '0', '', 40, 50, '1581521418', '1581521418', '2'),
(141, '1960 BEER', '8', 0, 'Bottle', '1', 0, '0', '', 12, 0, '1581580215', '1581580215', '2'),
(142, 'EXTRA SMOOTH STOUT', '8', 90, 'Bottle', '1', 0, '0', '', 90, 0, '1581587964', '1581587964', '2'),
(143, 'SMALL CAAMPARI', '8', 20, 'Bottle', '1', 0, '0', '', 24, 0, '1581692480', '1581692480', '2'),
(144, 'CAN STAR RADLER', '8', 0, 'Bottle', '1', 0, '0', '', 48, 0, '1583136917', '1583136917', '2'),
(145, 'BOTTLE ORIGIN BITTERS', '8', 9, 'Bottle', '1', 0, '0', '', 0, 0, '1584100780', '1584100780', '2'),
(146, 'LA SIEN BOTTLE WATER 75CL', '3', 216, 'Bottle', '1', 0, '0', '54334767774534', 564, 0, '1591431430', '1591431430', '2'),
(147, 'TROPHY STOUT', '8', 132, 'Bottle', '1', 0, '0', '', 120, 48, '1595336845', '1595336845', '2'),
(148, 'SHISHA FLAVOR', '8', 16, 'Bottle', '1', 0, '0', '', 20, 0, '1595669095', '1595669095', '2'),
(149, 'BAILEYS DELIGHT', '8', 0, 'Bottle', '1', 0, '0', '', 6, 0, '1597996672', '1597996672', '2'),
(150, 'AKWA FRESH', '3', 12, 'Bottle', '1', 0, '0', '', 132, 0, '1607603373', '1607603373', '2'),
(151, 'BIG SMIRNOFF ICE', '8', 36, 'Bottle', '1', 0, '0', '', 120, 0, '1610531691', '1610531691', '2'),
(152, 'CAN BUDWISER ', '8', 0, 'Bottle', '1', 0, '0', '', 24, 0, '1611580899', '1611580899', '2'),
(153, 'EXTRA ROSE FRANATINA', '8', 12, 'Bottle', '1', 0, '0', '', 12, 0, '1612352739', '1612352739', '2'),
(154, 'GRAN DESSERT', '8', 6, 'Bottle', '1', 0, '0', '', 18, 0, '1612352774', '1612352774', '2'),
(155, 'TROY', '8', 150, 'Bottle', '1', 0, '0', '', 100, 50, '1613813832', '1613813832', '2'),
(156, 'BLUE MALT', '8', 80, 'Bottle', '1', 0, '0', '', 100, 0, '1613925849', '1613925849', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblstorehistory`
--

CREATE TABLE `tblstorehistory` (
  `id` int(45) NOT NULL,
  `itemid` varchar(45) DEFAULT '',
  `itemtype` varchar(35) DEFAULT '',
  `qty` int(50) DEFAULT 0,
  `itemleft` varchar(45) DEFAULT '0',
  `regdate` date DEFAULT NULL,
  `regstamp` varchar(45) DEFAULT '',
  `staff` varchar(45) DEFAULT '',
  `regtime` time(6) DEFAULT NULL,
  `costprice` int(50) DEFAULT 0,
  `price` int(50) DEFAULT 0,
  `newstockadded` int(45) DEFAULT 0,
  `stockremove` int(45) DEFAULT 0,
  `status` varchar(45) DEFAULT '' COMMENT 'r-restock, t-transfer',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstoretransfer`
--

CREATE TABLE `tblstoretransfer` (
  `id` int(45) NOT NULL,
  `itemid` varchar(45) DEFAULT '',
  `itemtype` varchar(35) DEFAULT '',
  `qty` int(50) DEFAULT 0,
  `regdate` date DEFAULT NULL,
  `regstamp` varchar(45) DEFAULT '',
  `staff` varchar(45) DEFAULT '',
  `regtime` time(6) DEFAULT NULL,
  `costprice` int(50) DEFAULT 0,
  `price` int(50) DEFAULT 0,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `hotelid` varchar(45) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `companyname` varchar(72) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `users_role` varchar(32) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `staff_salary` varchar(32) DEFAULT NULL,
  `staff_hiring_date` varchar(32) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `hotelid`, `username`, `lastname`, `firstname`, `companyname`, `password`, `email`, `users_role`, `date`, `staff_salary`, `staff_hiring_date`, `photo`, `issync`) VALUES
(5, NULL, 'admin', 'Jeremy', 'Maxwell', 'Davin Crest Hotel', '698d51a19d8a121ce581499d7b701668', 'admin@bighms.com', 'admin', '2016-02-14 18:53:11', '', '', '14555380121454709879+234 818 138 6937Ã¢â‚¬Â¬ 20150427_061539.jpg', '2'),
(6, NULL, 'bar', 'Maley', 'Kehinde', NULL, '698d51a19d8a121ce581499d7b701668', '', 'bar', NULL, '', '', '', '2'),
(7, NULL, 'restaurant', 'Remi', 'Akinde', NULL, '698d51a19d8a121ce581499d7b701668', '', 'restaurant', NULL, '', '', '', '2'),
(8, NULL, 'bar2', 'Seun', 'Ademoye', NULL, '698d51a19d8a121ce581499d7b701668', '', 'bar2', NULL, '', '', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `waiters`
--

CREATE TABLE `waiters` (
  `id` int(45) NOT NULL,
  `name` varchar(65) DEFAULT '',
  `staffid` varchar(45) DEFAULT '',
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `usagepermit` varchar(30) DEFAULT '0' COMMENT '0-no access, 1-bar1 only, 2-bar2 only, 3-both bar1 and bar2',
  `issync` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `waiters`
--

INSERT INTO `waiters` (`id`, `name`, `staffid`, `username`, `password`, `usagepermit`, `issync`) VALUES
(1, 'Waiter 1 (Salt)', '5', 'salt', '2005fba07412ca49fb9090610c3c564a', '3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `wallettrans`
--

CREATE TABLE `wallettrans` (
  `id` int(45) NOT NULL,
  `uid` varchar(45) NOT NULL,
  `aid` varchar(45) NOT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `cashflow` varchar(30) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'pending',
  `paymethod` varchar(45) DEFAULT NULL,
  `paymid` varchar(35) DEFAULT NULL,
  `refno` varchar(65) DEFAULT NULL,
  `transid` varchar(65) DEFAULT NULL,
  `ipaid` varchar(20) DEFAULT '0',
  `regtime` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbar`
--
ALTER TABLE `addbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addbar2`
--
ALTER TABLE `addbar2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addbar3`
--
ALTER TABLE `addbar3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addcab`
--
ALTER TABLE `addcab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addclient`
--
ALTER TABLE `addclient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addlaundary`
--
ALTER TABLE `addlaundary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresturant`
--
ALTER TABLE `addresturant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addroom`
--
ALTER TABLE `addroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addroomfacility`
--
ALTER TABLE `addroomfacility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addspa`
--
ALTER TABLE `addspa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addsport`
--
ALTER TABLE `addsport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addswimpool`
--
ALTER TABLE `addswimpool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barrequest`
--
ALTER TABLE `barrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ewallet`
--
ALTER TABLE `ewallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym1`
--
ALTER TABLE `gym1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gymdurations`
--
ALTER TABLE `gymdurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gympayments`
--
ALTER TABLE `gympayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onlineorders`
--
ALTER TABLE `onlineorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_bar`
--
ALTER TABLE `order_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_bar2`
--
ALTER TABLE `order_bar2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_bar3`
--
ALTER TABLE `order_bar3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_laundary`
--
ALTER TABLE `order_laundary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_restaurant`
--
ALTER TABLE `order_restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_room`
--
ALTER TABLE `order_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_spa`
--
ALTER TABLE `order_spa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_sportitem`
--
ALTER TABLE `order_sportitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_swimpool`
--
ALTER TABLE `order_swimpool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherpictures`
--
ALTER TABLE `otherpictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paycab`
--
ALTER TABLE `paycab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roompictures`
--
ALTER TABLE `roompictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablenos`
--
ALTER TABLE `tablenos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcountry`
--
ALTER TABLE `tblcountry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblingredients`
--
ALTER TABLE `tblingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinstruct`
--
ALTER TABLE `tblinstruct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmcardreason`
--
ALTER TABLE `tblmcardreason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrestock`
--
ALTER TABLE `tblrestock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblshifts`
--
ALTER TABLE `tblshifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstore`
--
ALTER TABLE `tblstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstorehistory`
--
ALTER TABLE `tblstorehistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstoretransfer`
--
ALTER TABLE `tblstoretransfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waiters`
--
ALTER TABLE `waiters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallettrans`
--
ALTER TABLE `wallettrans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbar`
--
ALTER TABLE `addbar`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `addbar2`
--
ALTER TABLE `addbar2`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `addbar3`
--
ALTER TABLE `addbar3`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addcab`
--
ALTER TABLE `addcab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addclient`
--
ALTER TABLE `addclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `addlaundary`
--
ALTER TABLE `addlaundary`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `addresturant`
--
ALTER TABLE `addresturant`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `addroom`
--
ALTER TABLE `addroom`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `addroomfacility`
--
ALTER TABLE `addroomfacility`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `addspa`
--
ALTER TABLE `addspa`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addsport`
--
ALTER TABLE `addsport`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addswimpool`
--
ALTER TABLE `addswimpool`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barrequest`
--
ALTER TABLE `barrequest`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ewallet`
--
ALTER TABLE `ewallet`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gym1`
--
ALTER TABLE `gym1`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gymdurations`
--
ALTER TABLE `gymdurations`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gympayments`
--
ALTER TABLE `gympayments`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onlineorders`
--
ALTER TABLE `onlineorders`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_bar`
--
ALTER TABLE `order_bar`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_bar2`
--
ALTER TABLE `order_bar2`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_bar3`
--
ALTER TABLE `order_bar3`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_laundary`
--
ALTER TABLE `order_laundary`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_restaurant`
--
ALTER TABLE `order_restaurant`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_room`
--
ALTER TABLE `order_room`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_spa`
--
ALTER TABLE `order_spa`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_sportitem`
--
ALTER TABLE `order_sportitem`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_swimpool`
--
ALTER TABLE `order_swimpool`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otherpictures`
--
ALTER TABLE `otherpictures`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paycab`
--
ALTER TABLE `paycab`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roompictures`
--
ALTER TABLE `roompictures`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tablenos`
--
ALTER TABLE `tablenos`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcountry`
--
ALTER TABLE `tblcountry`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblingredients`
--
ALTER TABLE `tblingredients`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblinstruct`
--
ALTER TABLE `tblinstruct`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblmcardreason`
--
ALTER TABLE `tblmcardreason`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrestock`
--
ALTER TABLE `tblrestock`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblshifts`
--
ALTER TABLE `tblshifts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblstate`
--
ALTER TABLE `tblstate`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblstore`
--
ALTER TABLE `tblstore`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `tblstorehistory`
--
ALTER TABLE `tblstorehistory`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstoretransfer`
--
ALTER TABLE `tblstoretransfer`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `waiters`
--
ALTER TABLE `waiters`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallettrans`
--
ALTER TABLE `wallettrans`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
