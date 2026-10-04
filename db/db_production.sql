-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2025 at 03:48 AM
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
-- Database: `db_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cust` int(25) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telp` int(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cust`, `cust_name`, `address`, `telp`, `email`) VALUES
(1001, 'PT Inchcape', 'Jl. Mercedes-Benz, Wanaherang, Gunung Putri', 628119901, 'Inchcape@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `finished_report`
--

CREATE TABLE `finished_report` (
  `id_finished` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `total_finished` int(11) NOT NULL,
  `fdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finished_report`
--

INSERT INTO `finished_report` (`id_finished`, `id_project`, `total_finished`, `fdate`) VALUES
(1002, 1002, 104, '2025-11-03 01:09:34'),
(1003, 1003, 116, '2025-11-14 07:38:12'),
(1004, 1005, 102, '2025-11-14 07:40:14'),
(1005, 1004, 130, '2025-11-16 11:26:02'),
(1006, 1006, 102, '2025-11-17 03:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `id_machine` int(50) NOT NULL,
  `machine_name` varchar(50) NOT NULL,
  `capacity` int(15) NOT NULL,
  `mc_status` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`id_machine`, `machine_name`, `capacity`, `mc_status`) VALUES
(1002, 'Trim & Final Line', 104, 1),
(1003, 'Sub-Assembly Line', 117, 1),
(1004, 'Trim & Final Line', 130, 1),
(1005, 'Trim & Final Line', 102, 1),
(1006, 'Sub-Assembly Line', 102, 1),
(1007, 'Sub-Assembly Line', 131, 1),
(1008, 'Main Assembly Line', 119, 1),
(1009, 'Sub-Assembly Line', 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` int(50) NOT NULL,
  `material_name` varchar(50) NOT NULL,
  `stock` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id_material`, `material_name`, `stock`) VALUES
(1002, 'Alloy Wheel GLC300 4MATIC', 6),
(1003, 'Brake Disc E 300', 10),
(1004, 'Alloy Wheel GLA 200', 9),
(1005, 'Alloy Wheel A200', 6),
(1006, 'Component GLE 450 4MATIC', 9),
(1007, 'Brake Disc C300 AMG', 142),
(1008, 'Component C200 AVA', 129),
(1009, 'Component GLC200 4MATIC', 107);

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

CREATE TABLE `planning` (
  `id_plan` int(15) NOT NULL,
  `plan_name` varchar(25) NOT NULL,
  `id_project` int(15) NOT NULL,
  `qty_target` int(11) NOT NULL,
  `end_date` date NOT NULL,
  `pl_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planning`
--

INSERT INTO `planning` (`id_plan`, `plan_name`, `id_project`, `qty_target`, `end_date`, `pl_status`) VALUES
(1001, 'Planning Produksi E 200', 1001, 115, '2025-05-09', 1),
(1002, 'Planning Produksi GLC300', 1002, 104, '2025-05-02', 1),
(1003, 'Planning Produksi E 300', 1003, 117, '2025-04-25', 1),
(1004, 'Planning Produksi GLA 200', 1004, 130, '2025-04-18', 1),
(1005, 'Planning Produksi A200', 1005, 102, '2025-03-28', 1),
(1006, 'Planning Produksi GLE 450', 1006, 102, '2025-03-21', 1),
(1007, 'Planning Produksi C300', 1007, 131, '2025-03-14', 1),
(1008, 'Planning Produksi C200', 1008, 119, '2025-03-07', 1),
(1009, 'Planning Produksi GLC200', 1009, 99, '2025-02-28', 1),
(1010, 'Planning Produksi A180', 1010, 115, '2025-02-21', 1),
(1011, 'Planning Produksi A250', 1011, 99, '2025-02-14', 1),
(1012, 'Planning Produksi AMG A35', 1012, 99, '2025-02-07', 1),
(1013, 'Planning Produksi AMG A45', 1013, 111, '2025-01-31', 1),
(1014, 'Planning Produksi B200', 1014, 77, '2025-01-24', 1),
(1015, 'Planning Produksi B250', 1015, 80, '2025-01-17', 1),
(1016, 'Planning Produksi C220d', 1016, 98, '2025-01-10', 1),
(1017, 'Planning Produksi C250', 1017, 91, '2025-01-03', 1),
(1018, 'Planning Produksi AMG C43', 1018, 112, '2024-12-27', 1),
(1019, 'Planning Produksi AMG C63', 1019, 92, '2024-12-20', 1),
(1020, 'Planning Produksi E220d', 1020, 85, '2024-12-13', 1),
(1021, 'Planning Produksi E250', 1021, 129, '2024-12-06', 1),
(1022, 'Planning Produksi E350', 1022, 103, '2024-11-29', 1),
(1023, 'Planning Produksi AMG E53', 1023, 108, '2024-11-22', 1),
(1024, 'Planning Produksi AMG E63', 1024, 85, '2024-11-15', 1),
(1025, 'Planning Produksi S450', 1025, 98, '2024-11-08', 1),
(1026, 'Planning Produksi S500', 1026, 109, '2024-11-01', 1),
(1027, 'Planning Produksi S560', 1027, 89, '2024-10-25', 1),
(1028, 'Planning Produksi S580', 1028, 113, '2024-10-18', 1),
(1029, 'Planning Produksi AMG S63', 1029, 97, '2024-10-11', 1),
(1030, 'Planning Produksi AMG S65', 1030, 102, '2024-10-04', 1),
(1031, 'Planning Produksi CLA200', 1031, 97, '2024-09-27', 1),
(1032, 'Planning Produksi CLA250', 1032, 135, '2024-09-20', 1),
(1033, 'Planning Produksi AMG CLA', 1033, 107, '2024-09-13', 1),
(1034, 'Planning Produksi AMG CLA', 1034, 90, '2024-09-06', 1),
(1035, 'Planning Produksi CLS300', 1035, 119, '2024-08-30', 1),
(1036, 'Planning Produksi CLS350', 1036, 88, '2024-08-23', 1),
(1037, 'Planning Produksi CLS450', 1037, 110, '2024-08-16', 1),
(1038, 'Planning Produksi AMG CLS', 1038, 77, '2024-08-09', 1),
(1039, 'Planning Produksi GLA250', 1039, 86, '2024-08-02', 1),
(1040, 'Planning Produksi AMG GLA', 1040, 110, '2024-07-26', 1),
(1041, 'Planning Produksi AMG GLA', 1041, 118, '2024-07-19', 1),
(1042, 'Planning Produksi GLB200', 1042, 110, '2024-07-12', 1),
(1043, 'Planning Produksi GLB250', 1043, 104, '2024-07-05', 1),
(1044, 'Planning Produksi AMG GLB', 1044, 101, '2024-06-28', 1),
(1045, 'Planning Produksi GLC250', 1045, 84, '2024-06-21', 1),
(1046, 'Planning Produksi AMG GLC', 1046, 95, '2024-06-14', 1),
(1047, 'Planning Produksi AMG GLC', 1047, 99, '2024-06-07', 1),
(1048, 'Planning Produksi GLE350', 1048, 123, '2024-05-31', 1),
(1049, 'Planning Produksi GLE400', 1049, 112, '2024-05-24', 1),
(1050, 'Planning Produksi AMG GLE', 1050, 80, '2024-05-17', 1),
(1051, 'Planning Produksi AMG GLE', 1051, 112, '2024-05-10', 1),
(1052, 'Planning Produksi GLS400', 1052, 100, '2024-05-03', 1),
(1053, 'Planning Produksi GLS450', 1053, 96, '2024-04-26', 1),
(1054, 'Planning Produksi GLS500', 1054, 116, '2024-04-19', 1),
(1055, 'Planning Produksi AMG GLS', 1055, 122, '2024-04-12', 1),
(1056, 'Planning Produksi G350d', 1056, 121, '2024-04-05', 1),
(1057, 'Planning Produksi G400d', 1057, 93, '2024-03-29', 1),
(1058, 'Planning Produksi G500', 1058, 101, '2024-03-22', 1),
(1059, 'Planning Produksi AMG G63', 1059, 112, '2024-03-15', 1),
(1060, 'Planning Produksi Mercede', 1060, 122, '2024-03-08', 1),
(1061, 'Planning Produksi AMG GT', 1061, 99, '2024-03-01', 1),
(1062, 'Planning Produksi AMG GT', 1062, 103, '2024-02-23', 1),
(1063, 'Planning Produksi AMG GT', 1063, 89, '2024-02-16', 1),
(1064, 'Planning Produksi SL400', 1064, 88, '2024-02-09', 1),
(1065, 'Planning Produksi SL500', 1065, 119, '2024-02-02', 1),
(1066, 'Planning Produksi AMG SL6', 1066, 127, '2024-01-26', 1),
(1067, 'Planning Produksi Vito Se', 1070, 106, '2024-01-05', 1),
(1068, 'Planning Produksi V260', 1068, 122, '2024-01-19', 1),
(1069, 'Planning Produksi V300d', 1069, 112, '2024-01-12', 1),
(1070, 'Planning Produksi C 200', 1071, 96, '2025-05-16', 1),
(1071, 'Planning Produksi C 300', 1072, 112, '2025-05-23', 1),
(1072, 'Planning Produksi GLB 200', 1073, 130, '2025-05-30', 1),
(1073, 'Planning Produksi GLB 250', 1074, 106, '2025-06-06', 1),
(1074, 'Planning Produksi GLE 400', 1075, 130, '2025-06-13', 1),
(1075, 'Planning Produksi GLS 450', 1076, 67, '2025-06-20', 1),
(1076, 'Planning Produksi S 450', 1077, 119, '2025-06-27', 1),
(1077, 'Planning Produksi S 500', 1078, 108, '2025-07-04', 1),
(1078, 'Planning Produksi EQE 350', 1079, 102, '2025-07-11', 1),
(1079, 'Planning Produksi EQS 450', 1080, 108, '2025-07-18', 1),
(1080, 'Planning Produksi CLA 200', 1081, 76, '2025-07-25', 1),
(1081, 'Planning Produksi GLC43', 1082, 103, '2025-08-01', 1),
(1082, 'Planning Produksi C43 AMG', 1083, 112, '2025-08-08', 1),
(1083, 'Planning Produksi E200d', 1084, 129, '2025-08-15', 1),
(1084, 'Planning Produksi EQB 300', 1085, 98, '2025-08-22', 1),
(1085, 'Planning Produksi GLC350e', 1087, 94, '2025-08-29', 1),
(1086, 'Planning Produksi E300e', 1087, 98, '2025-09-05', 1),
(1087, 'Planning Produksi S580e', 1088, 121, '2025-09-12', 1),
(1088, 'Planning Produksi V250', 1089, 112, '2025-09-19', 1),
(1089, 'Planning Produksi EQV 300', 1090, 94, '2025-09-26', 1),
(1090, 'Planning Produksi GLS600', 1091, 115, '2025-10-03', 1),
(1091, 'Planning Produksi S680', 1092, 108, '2025-10-10', 1),
(1092, 'Planning Produksi EQA 250', 1093, 122, '2025-10-17', 1),
(1093, 'Planning Produksi EQC 400', 1094, 95, '2025-10-24', 1),
(1094, 'Planning Produksi G580', 1095, 101, '2025-10-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_shift`
--

CREATE TABLE `plan_shift` (
  `id_planshift` int(15) NOT NULL,
  `id_plan` int(15) NOT NULL,
  `id_shift` int(15) NOT NULL,
  `id_staff` int(15) NOT NULL,
  `start_date` date NOT NULL,
  `ps_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan_shift`
--

INSERT INTO `plan_shift` (`id_planshift`, `id_plan`, `id_shift`, `id_staff`, `start_date`, `ps_status`) VALUES
(1001, 1001, 1001, 1001, '2025-05-05', 1),
(1003, 1002, 1001, 1002, '2025-04-28', 0),
(1004, 1003, 1001, 1003, '2025-04-21', 0),
(1006, 1005, 1001, 1005, '2025-03-24', 0),
(1007, 1004, 1001, 1004, '2025-04-14', 0),
(1008, 1006, 1001, 1006, '2025-03-17', 0),
(1009, 1007, 1001, 1007, '2025-03-10', 1),
(1010, 1008, 1001, 1008, '2025-03-03', 1),
(1011, 1009, 1001, 1009, '2025-02-24', 1),
(1012, 1010, 1001, 1010, '2025-02-17', 1),
(1013, 1011, 1001, 1011, '2025-02-10', 1),
(1014, 1012, 1001, 1012, '2025-02-03', 1),
(1015, 1013, 1001, 1013, '2025-01-27', 1),
(1016, 1014, 1001, 1014, '2025-01-20', 1),
(1017, 1015, 1001, 1015, '2025-01-13', 1),
(1018, 1016, 1001, 1016, '2025-01-06', 1),
(1019, 1017, 1001, 1017, '2024-12-30', 1),
(1020, 1018, 1001, 1018, '2024-12-23', 1),
(1021, 1019, 1001, 1019, '2024-12-16', 1),
(1022, 1020, 1001, 1020, '2024-12-09', 1),
(1023, 1021, 1001, 1021, '2024-12-02', 1),
(1024, 1022, 1001, 1022, '2024-11-25', 1),
(1025, 1023, 1001, 1023, '2024-11-18', 1),
(1026, 1024, 1001, 1024, '2024-11-11', 1),
(1027, 1025, 1001, 1025, '2024-11-04', 1),
(1028, 1026, 1001, 1026, '2024-10-28', 1),
(1029, 1027, 1001, 1027, '2024-10-21', 1),
(1030, 1028, 1001, 1028, '2024-10-14', 1),
(1031, 1029, 1001, 1029, '2024-10-07', 1),
(1032, 1030, 1001, 1030, '2024-09-30', 1),
(1033, 1031, 1001, 1031, '2024-09-23', 1),
(1034, 1032, 1001, 1032, '2024-09-16', 1),
(1035, 1033, 1001, 1033, '2024-09-09', 1),
(1036, 1034, 1001, 1034, '2024-09-02', 1),
(1037, 1035, 1001, 1035, '2024-08-26', 1),
(1038, 1036, 1001, 1036, '2024-08-19', 1),
(1039, 1037, 1001, 1037, '2024-08-12', 1),
(1040, 1038, 1001, 1038, '2024-08-05', 1),
(1041, 1039, 1001, 1039, '2024-07-29', 1),
(1042, 1040, 1001, 1040, '2024-07-22', 1),
(1043, 1041, 1001, 1041, '2024-07-15', 1),
(1044, 1042, 1001, 1042, '2024-07-08', 1),
(1045, 1043, 1001, 1043, '2024-07-01', 1),
(1046, 1044, 1001, 1044, '2024-06-24', 1),
(1047, 1045, 1001, 1045, '2024-06-17', 1),
(1048, 1046, 1001, 1046, '2024-06-10', 1),
(1049, 1047, 1001, 1047, '2024-06-03', 1),
(1050, 1048, 1001, 1048, '2024-05-27', 1),
(1051, 1049, 1001, 1049, '2024-05-20', 1),
(1052, 1050, 1001, 1050, '2024-05-13', 1),
(1053, 1051, 1001, 1051, '2024-05-06', 1),
(1054, 1052, 1001, 1052, '2024-04-29', 1),
(1055, 1053, 1001, 1053, '2024-04-22', 1),
(1056, 1054, 1001, 1054, '2024-04-15', 1),
(1057, 1055, 1001, 1055, '2024-04-08', 1),
(1058, 1056, 1001, 1056, '2024-04-01', 1),
(1059, 1057, 1001, 1057, '2024-03-25', 1),
(1060, 1058, 1001, 1058, '2024-03-18', 1),
(1061, 1059, 1001, 1059, '2024-03-11', 1),
(1062, 1060, 1001, 1060, '2024-03-04', 1),
(1063, 1061, 1001, 1061, '2024-02-26', 1),
(1064, 1062, 1001, 1062, '2024-02-19', 1),
(1065, 1063, 1001, 1063, '2024-02-12', 1),
(1066, 1064, 1001, 1064, '2024-02-05', 1),
(1067, 1065, 1001, 1065, '2024-01-29', 1),
(1068, 1066, 1001, 1066, '2024-01-22', 1),
(1069, 1068, 1001, 1068, '2024-01-15', 1),
(1070, 1069, 1001, 1069, '2024-01-08', 1),
(1071, 1067, 1001, 1067, '2024-01-01', 1),
(1072, 1070, 1001, 1070, '2025-05-12', 1),
(1073, 1071, 1001, 1071, '2025-05-19', 1),
(1074, 1072, 1001, 1072, '2025-05-26', 1),
(1075, 1073, 1001, 1073, '2025-06-02', 1),
(1076, 1074, 1001, 1074, '2025-06-09', 1),
(1077, 1075, 1001, 1075, '2025-06-16', 1),
(1078, 1076, 1001, 1076, '2025-06-23', 1),
(1079, 1077, 1001, 1077, '2025-06-30', 1),
(1080, 1078, 1001, 1078, '2025-07-07', 1),
(1081, 1079, 1001, 1079, '2025-07-14', 1),
(1082, 1080, 1001, 1080, '2025-07-21', 1),
(1083, 1081, 1001, 1081, '2025-07-28', 1),
(1084, 1082, 1001, 1082, '2025-08-04', 1),
(1085, 1083, 1001, 1083, '2025-08-11', 1),
(1086, 1084, 1001, 1084, '2025-08-18', 1),
(1087, 1085, 1001, 1085, '2025-08-25', 1),
(1088, 1086, 1001, 1086, '2025-09-01', 1),
(1089, 1087, 1001, 1087, '2025-09-08', 1),
(1090, 1088, 1001, 1088, '2025-09-15', 1),
(1091, 1089, 1001, 1089, '2025-09-22', 1),
(1092, 1090, 1001, 1090, '2025-09-29', 1),
(1093, 1091, 1001, 1091, '2025-10-06', 1),
(1094, 1092, 1001, 1092, '2025-10-13', 1),
(1095, 1093, 1001, 1093, '2025-10-20', 1),
(1096, 1094, 1001, 1094, '2025-10-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(25) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `summary` longtext NOT NULL,
  `application` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `summary`, `application`) VALUES
(1002, 'E 200', 'GERMANY', 'Executive Luxury Sedan'),
(1003, 'GLC300 4MATIC', 'GERMANY', 'Mid-Size SUV'),
(1004, 'E 300', 'GERMANY', 'Executive Luxury Sedan'),
(1005, 'GLA 200', 'GERMANY', 'Compact SUV'),
(1006, 'A200', 'GERMANY', 'Compact Hatchback / Entry-Level Luxury'),
(1007, 'GLE 450 4MATIC', 'GERMANY', 'Large Luxury SUV'),
(1008, 'C300 AMG', 'GERMANY', 'Production of C300 AMG – Brake Disc'),
(1009, 'C200 AVA', 'GERMANY', 'Luxury Sedan (Mid-size)'),
(1010, 'GLC200 4MATIC', 'GERMANY', 'Mid-Size SUV'),
(1011, 'A180', 'GERMANY', 'Compact Hatchback / Entry-Level Luxury'),
(1012, 'A250', 'GERMANY', 'Compact Hatchback / Entry-Level Luxury'),
(1013, 'AMG A35', 'GERMANY', 'Compact Hatchback / High-Performance'),
(1014, 'AMG A45', 'GERMANY', 'Compact Hatchback / High-Performance'),
(1015, 'B200', 'GERMANY', 'Compact MPV / Family Car'),
(1016, 'B250', 'GERMANY', 'Compact MPV / Family Car'),
(1017, 'C220d', 'GERMANY', 'Luxury Sedan (Mid-size)'),
(1018, 'C250', 'GERMANY', 'Luxury Sedan (Mid-size)'),
(1019, 'AMG C43', 'GERMANY', 'Luxury Sedan / High-Performance'),
(1020, 'AMG C63', 'GERMANY', 'Luxury Sedan / High-Performance'),
(1021, 'E220d', 'GERMANY', 'Executive Luxury Sedan'),
(1022, 'E250', 'GERMANY', 'Executive Luxury Sedan'),
(1023, 'E350', 'GERMANY', 'Executive Luxury Sedan'),
(1024, 'AMG E53', 'GERMANY', 'Executive Luxury Sedan / High-Performance'),
(1025, 'AMG E63', 'GERMANY', 'Compact SUV / High-Performance'),
(1026, 'S450', 'GERMANY', 'Flagship Luxury Sedan / Chauffeur Car'),
(1027, 'S500', 'GERMANY', 'Flagship Luxury Sedan / Chauffeur Car'),
(1028, 'S560', 'GERMANY', 'Flagship Luxury Sedan / Chauffeur Car'),
(1029, 'S580', 'GERMANY', 'Flagship Luxury Sedan / Chauffeur Car'),
(1030, 'AMG S63', 'GERMANY', 'Flagship Luxury Sedan / High-Performance'),
(1031, 'AMG S65', 'GERMANY', 'Flagship Luxury Sedan / High-Performance'),
(1032, 'CLA200', 'GERMANY', 'Compact 4-Door Coupe'),
(1033, 'CLA250', 'GERMANY', 'Compact 4-Door Coupe'),
(1034, 'AMG CLA35', 'GERMANY', 'Compact 4-Door Coupe / High-Performance'),
(1035, 'AMG CLA45', 'GERMANY', 'Compact 4-Door Coupe / High-Performance'),
(1036, 'CLS300', 'GERMANY', 'Luxury 4-Door Coupe'),
(1037, 'CLS350', 'GERMANY', 'Luxury 4-Door Coupe'),
(1038, 'CLS450', 'GERMANY', 'Luxury 4-Door Coupe'),
(1039, 'AMG CLS53', 'GERMANY', 'Luxury 4-Door Coupe / High-Performance'),
(1040, 'GLA250', 'GERMANY', 'Compact SUV'),
(1041, 'AMG GLA35', 'GERMANY', 'Compact SUV / High-Performance'),
(1042, 'AMG GLA45', 'GERMANY', 'Compact SUV / High-Performance'),
(1043, 'GLB200', 'GERMANY', 'Compact 7-Seater SUV'),
(1044, 'GLB250', 'GERMANY', 'Compact 7-Seater SUV'),
(1045, 'AMG GLB35', 'GERMANY', 'Compact 7-Seater SUV / High-Performance'),
(1046, 'GLC250', 'GERMANY', 'Mid-Size SUV'),
(1047, 'AMG GLC43', 'GERMANY', 'Mid-Size SUV / High-Performance'),
(1048, 'AMG GLC63', 'GERMANY', 'Mid-Size SUV / High-Performance'),
(1049, 'GLE350', 'GERMANY', 'Large Luxury SUV'),
(1050, 'GLE400', 'GERMANY', 'Large Luxury SUV'),
(1051, 'AMG GLE53', 'GERMANY', 'Large Luxury SUV / High-Performance'),
(1052, 'AMG GLE63', 'GERMANY', 'Large Luxury SUV / High-Performance'),
(1053, 'GLS400', 'GERMANY', 'Full-Size Luxury SUV (7-Seater)'),
(1054, 'GLS450', 'GERMANY', 'Full-Size Luxury SUV (7-Seater)'),
(1055, 'GLS500', 'GERMANY', 'Full-Size Luxury SUV (7-Seater)'),
(1056, 'AMG GLS63', 'GERMANY', 'Full-Size Luxury SUV / High-Performance'),
(1057, 'G350d', 'GERMANY', 'Luxury Off-Road SUV'),
(1058, 'G400d', 'GERMANY', 'Luxury Off-Road SUV'),
(1059, 'G500', 'GERMANY', 'Luxury Off-Road SUV'),
(1060, 'AMG G63', 'GERMANY', 'Luxury Off-Road SUV / High-Performance'),
(1061, 'Mercedes-AMG GT', 'GERMANY', 'High-Performance Sports Car'),
(1062, 'AMG GT 43', 'GERMANY', 'High-Performance Sports Car'),
(1063, 'AMG GT 53', 'GERMANY', 'High-Performance Sports Car'),
(1064, 'AMG GT 63', 'GERMANY', 'High-Performance Sports Car'),
(1065, 'SL400', 'GERMANY', 'Luxury Roadster (Convertible)'),
(1066, 'SL500', 'GERMANY', 'Luxury Roadster (Convertible)'),
(1067, 'AMG SL63', 'GERMANY', 'Luxury Roadster (Convertible)'),
(1068, 'Vito', 'GERMANY', 'Luxury MPV / Business Van'),
(1069, 'V260', 'GERMANY', 'Luxury MPV / Business Van'),
(1070, 'V300d', 'GERMANY', 'Luxury MPV / Business Van'),
(1071, 'C 200', 'GERMANY', 'Executive Sedan'),
(1072, 'C 300', 'GERMANY', 'Executive Sedan'),
(1073, 'GLB 200', 'GERMANY', 'Compact SUV'),
(1074, 'GLB 250', 'GERMANY', 'Compact SUV'),
(1075, 'GLE 400', 'GERMANY', 'Luxury SUV'),
(1076, 'GLS 450', 'GERMANY', 'Premium SUV'),
(1077, 'S 450', 'GERMANY', 'Luxury Sedan'),
(1078, 'S 500', 'GERMANY', 'Luxury Sedan'),
(1079, 'EQE 350', 'GERMANY', 'Electric Sedan'),
(1080, 'EQS 450', 'GERMANY', 'Electric SUV'),
(1081, 'CLA 200', 'GERMANY', 'Coupe Sedan'),
(1082, 'GLC43 AMG', 'GERMANY', 'Performance SUV'),
(1083, 'C43 AMG', 'GERMANY', 'Performance Sedan'),
(1084, 'E200d', 'GERMANY', 'Executive Sedan'),
(1085, 'EQB 300', 'GERMANY', 'Electric SUV'),
(1086, 'GLC350e', 'GERMANY', 'Hybrid SUV'),
(1087, 'E300e', 'GERMANY', 'Hybrid Sedan'),
(1088, 'S580e', 'GERMANY', 'Luxury Hybrid Sedan'),
(1089, 'V250', 'GERMANY', 'Luxury Van'),
(1090, 'EQV 300', 'GERMANY', 'Electric Van'),
(1091, 'GLS600', 'GERMANY', 'Ultra Luxury SUV'),
(1092, 'S680 Maybach', 'GERMANY', 'Ultra Luxury Sedan'),
(1093, 'EQA 250', 'GERMANY', 'Electric SUV'),
(1094, 'EQC 400', 'GERMANY', 'Electric SUV'),
(1095, 'G580', 'GERMANY', 'Electric Off-Road SUV');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(25) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `id_cust` int(25) NOT NULL,
  `id_product` int(25) NOT NULL,
  `diameter` int(25) NOT NULL,
  `qty_request` int(15) NOT NULL,
  `entry_date` date NOT NULL,
  `pr_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `project_name`, `id_cust`, `id_product`, `diameter`, `qty_request`, `entry_date`, `pr_status`) VALUES
(1001, 'Production of E 200 – Alloy Wheel 18 inch', 1001, 1002, 392, 10543, '2025-05-05', 1),
(1002, 'Production of GLC300 4MATIC – Alloy Wheel 18 inch', 1001, 1003, 197, 10503, '2025-04-28', 1),
(1003, 'Production of E 300 – Brake Disc', 1001, 1004, 431, 24672, '2025-04-21', 1),
(1004, 'Production of GLA 200 – Alloy Wheel 18 inch', 1001, 1005, 227, 16391, '2025-04-14', 1),
(1005, 'Production of A200 – Alloy Wheel 18 inch', 1001, 1006, 386, 36907, '2025-03-24', 1),
(1006, 'Production of GLE 450 4MATIC – Fuel Tank', 1001, 1007, 260, 43036, '2025-03-17', 1),
(1007, 'Production of C300 AMG – Brake Disc', 1001, 1008, 406, 15316, '2025-03-10', 1),
(1008, 'Production of C200 AVA – Headlamp Assembly', 1001, 1009, 268, 14534, '2025-03-03', 1),
(1009, 'Production of GLC200 4MATIC – Door Panel', 1001, 1010, 300, 28472, '2025-02-24', 1),
(1010, 'Production of A180 – Alloy Wheel 18 inch', 1001, 1011, 197, 35574, '2025-02-17', 1),
(1011, 'Production of A250 – Headlamp Assembly', 1001, 1012, 444, 30249, '2025-02-10', 1),
(1012, 'Production of AMG A35 – Alloy Wheel 18 inch', 1001, 1013, 236, 8729, '2025-02-03', 1),
(1013, 'Production of AMG A45 – Rear Suspension Arm', 1001, 1014, 322, 27944, '2025-01-27', 1),
(1014, 'Production of B200 – Alloy Wheel 18 inch', 1001, 1015, 360, 25880, '2025-01-20', 1),
(1015, 'Production of B250 – Steering Column', 1001, 1016, 960, 15633, '2025-01-13', 1),
(1016, 'Production of C220d – Rear Suspension Arm', 1001, 1017, 406, 34188, '2025-01-06', 1),
(1017, 'Production of C250 – Alloy Wheel 18 inch', 1001, 1016, 412, 40941, '2024-12-30', 1),
(1018, 'Production of AMG C43 – Headlamp Assembly', 1001, 1019, 633, 43015, '2024-12-23', 1),
(1019, 'Production of AMG C63 – Dashboard Console', 1001, 1020, 387, 44604, '2024-12-16', 1),
(1020, 'Production of E220d – Alloy Wheel 18 inch', 1001, 1021, 299, 16839, '2024-12-09', 1),
(1021, 'Production of E250 – Rear Suspension Arm', 1001, 1022, 165, 36781, '2024-12-02', 1),
(1022, 'Production of E350 – Alloy Wheel 18 inch', 1001, 1023, 311, 44952, '2024-11-25', 1),
(1023, 'Production of AMG E53 – Dashboard Console', 1001, 1024, 314, 10402, '2024-11-18', 1),
(1024, 'Production of AMG E63 – Dashboard Console', 1001, 1025, 362, 27299, '2024-11-11', 1),
(1025, 'Production of S450 – Alloy Wheel 18 inch', 1001, 1026, 325, 10927, '2024-11-04', 1),
(1026, 'Production of S500 – Front Bumper', 1001, 1027, 459, 48017, '2024-10-28', 1),
(1027, 'Production of S560 – Door Panel', 1001, 1028, 146, 18146, '2024-10-21', 1),
(1028, 'Production of S580 – Fuel Tank', 1001, 1029, 498, 12784, '2024-10-14', 1),
(1029, 'Production of AMG S63 – Front Bumper', 1001, 1030, 291, 24727, '2024-10-07', 1),
(1030, 'Production of AMG S65 – Rear Suspension Arm', 1001, 1031, 427, 40700, '2024-09-30', 1),
(1031, 'Production of CLA200 – Exhaust Pipe', 1001, 1032, 445, 36801, '2024-09-23', 1),
(1032, 'Production of CLA250 – Fuel Tank', 1001, 1033, 936, 23002, '2024-09-16', 1),
(1033, 'Production of AMG CLA35 – Rear Suspension Arm', 1001, 1034, 223, 37845, '2024-09-09', 1),
(1034, 'Production of AMG CLA45 – Exhaust Pipe', 1001, 1035, 417, 42134, '2024-09-02', 1),
(1035, 'Production of CLS300 – Brake Disc', 1001, 1036, 475, 10790, '2024-08-26', 1),
(1036, 'Production of CLS350 – Exhaust Pipe', 1001, 1037, 488, 27454, '2024-08-19', 1),
(1037, 'Production of CLS450 – Fuel Tank', 1001, 1038, 411, 9236, '2024-08-12', 1),
(1038, 'Production of AMG CLS53 – Front Bumper', 1001, 1039, 218, 22640, '2024-08-05', 1),
(1039, 'Production of GLA250 – Fuel Tank', 1001, 1040, 488, 8812, '2024-07-29', 1),
(1040, 'Production of AMG GLA35 – Brake Disc', 1001, 1041, 265, 32991, '2024-07-22', 1),
(1041, 'Production of AMG GLA45 – Fuel Tank', 1001, 1042, 230, 37357, '2024-07-15', 1),
(1042, 'Production of GLB200 – Front Bumper', 1001, 1043, 468, 47199, '2024-07-08', 1),
(1043, 'Production of GLB250 – Brake Disc', 1001, 1044, 136, 34872, '2024-07-01', 1),
(1044, 'Production of AMG GLB35 – Front Bumper', 1001, 1045, 228, 35862, '2024-06-24', 1),
(1045, 'Production of GLC250 – Dashboard Console', 1001, 1046, 438, 5308, '2024-06-17', 1),
(1046, 'Production of AMG GLC43 – Headlamp Assembly', 1001, 1047, 262, 24162, '2024-06-10', 1),
(1047, 'Production of AMG GLC63 – Steering Column', 1001, 1048, 811, 6463, '2024-06-03', 1),
(1048, 'Production of GLE350 – Alloy Wheel 18 inch', 1001, 1049, 132, 47837, '2024-05-27', 1),
(1049, 'Production of GLE400 – Door Panel', 1001, 1050, 354, 16922, '2024-05-20', 1),
(1050, 'Production of AMG GLE53 – Front Bumper', 1001, 1051, 196, 44494, '2024-05-13', 1),
(1051, 'Production of AMG GLE63 – Rear Suspension Arm', 1001, 1052, 139, 22527, '2024-05-06', 1),
(1052, 'Production of GLS400 – Fuel Tank', 1001, 1053, 701, 34648, '2024-04-29', 1),
(1053, 'Production of GLS450 – Rear Suspension Arm', 1001, 1054, 260, 13406, '2024-04-22', 1),
(1054, 'Production of GLS500 – Front Bumper', 1001, 1055, 517, 29975, '2024-04-15', 1),
(1055, 'Production of AMG GLS63 – Brake Disc', 1001, 1056, 341, 26643, '2024-04-08', 1),
(1056, 'Production of G350d – Headlamp Assembly', 1001, 1057, 176, 5292, '2024-04-01', 1),
(1057, 'Production of G400d – Brake Disc', 1001, 1058, 198, 41603, '2024-03-25', 1),
(1058, 'Production of G500 – Door Panel', 1001, 1059, 202, 26727, '2024-03-18', 1),
(1059, 'Production of AMG G63 – Front Bumper', 1001, 1060, 126, 31660, '2024-03-11', 1),
(1060, 'Production of Mercedes-AMG GT – Front Bumper', 1001, 1061, 188, 30250, '2024-03-04', 1),
(1061, 'Production of AMG GT 43 – Dashboard Console', 1001, 1062, 362, 33007, '2024-02-26', 1),
(1062, 'Production of AMG GT 53 – Door Panel', 1001, 1063, 377, 7123, '2024-02-19', 1),
(1063, 'Production of AMG GT 63 – Headlamp Assembly', 1001, 1064, 337, 37777, '2024-02-12', 1),
(1064, 'Production of SL400 – Dashboard Console', 1001, 1065, 437, 49936, '2024-02-05', 1),
(1065, 'Production of SL500 – Brake Disc', 1001, 1066, 415, 5845, '2024-01-29', 1),
(1066, 'Production of AMG SL63 – Front Bumper', 1001, 1067, 252, 44448, '2024-01-22', 1),
(1068, 'Production of V260 – Brake Disc', 1001, 1069, 425, 23229, '2024-01-15', 1),
(1069, 'Production of V300d – Dashboard Console', 1001, 1070, 313, 40432, '2024-01-08', 1),
(1070, 'Production of Vito – Exhaust Pipe', 1001, 1068, 380, 42095, '2024-01-01', 1),
(1071, 'Production of C 200 – Alloy Wheel 18 inch', 1001, 1071, 362, 39944, '2025-05-12', 1),
(1072, 'Production of C 300 – Brake Disc', 1001, 1072, 406, 33968, '2025-05-19', 1),
(1073, 'Production of GLB 200 – Alloy Wheel 18 inch', 1001, 1073, 222, 13793, '2025-05-26', 1),
(1074, 'Production of GLB 250 – Brake Disc', 1001, 1074, 196, 22883, '2025-06-02', 1),
(1075, 'Production of GLE 400 – Alloy Wheel 20 inch', 1001, 1075, 270, 19856, '2025-06-09', 1),
(1076, 'Production of GLS 450 – Alloy Wheel 21 inch', 1001, 1076, 420, 16270, '2025-06-16', 1),
(1077, 'Production of S 450 – Brake Disc', 1001, 1077, 397, 20300, '2025-06-23', 1),
(1078, 'Production of S 500 – Alloy Wheel 19 inch', 1001, 1078, 308, 35052, '2025-06-30', 1),
(1079, 'Production of EQE 350 – Battery Module', 1001, 1079, 383, 32239, '2025-07-07', 1),
(1080, 'Production of EQS 450 – Battery Cooling Plate', 1001, 1080, 238, 27232, '2025-07-14', 1),
(1081, 'Production of CLA 200 – Brake Disc', 1001, 1081, 304, 30671, '2025-07-21', 1),
(1082, 'Production of GLC43 AMG – Alloy Wheel 20 inch', 1001, 1082, 332, 11278, '2025-07-28', 1),
(1083, 'Production of C43 AMG – Brake Disc', 1001, 1083, 439, 21654, '2025-08-04', 1),
(1084, 'Production of E200d – Brake Disc', 1001, 1084, 273, 16010, '2025-08-11', 1),
(1085, 'Production of EQB 300 – Battery Module', 1001, 1085, 183, 31514, '2025-08-18', 1),
(1086, 'Production of GLC350e – Battery Pack', 1001, 1086, 311, 20718, '2025-08-25', 1),
(1087, 'Production of E300e – Battery Pack', 1001, 1087, 345, 13376, '2025-09-01', 1),
(1088, 'Production of S580e – Battery Cooling Plate', 1001, 1088, 447, 23980, '2025-09-08', 1),
(1089, 'Production of V250 – Alloy Wheel 19 inch', 1001, 1089, 264, 26324, '2025-09-15', 1),
(1090, 'Production of EQV 300 – Battery Module', 1001, 1090, 376, 20289, '2025-09-22', 1),
(1091, 'Production of GLS600 – Alloy Wheel 22 inch', 1001, 1091, 306, 16199, '2025-09-29', 1),
(1092, 'Production of S680 Maybach – Brake Disc', 1001, 1092, 343, 15542, '2025-10-06', 1),
(1093, 'Production of EQA 250 – Battery Module', 1001, 1093, 249, 13650, '2025-10-13', 1),
(1094, 'Production of EQC 400 – Battery Pack', 1001, 1094, 321, 24796, '2025-10-20', 1),
(1095, 'Production of G580 – Battery Cooling Plate', 1001, 1095, 316, 22716, '2025-10-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_machine`
--

CREATE TABLE `p_machine` (
  `id_pmachine` int(15) NOT NULL,
  `id_planshift` int(15) NOT NULL,
  `id_machine` int(15) NOT NULL,
  `mc_stats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_machine`
--

INSERT INTO `p_machine` (`id_pmachine`, `id_planshift`, `id_machine`, `mc_stats`) VALUES
(1001, 1001, 1001, 1),
(1002, 1003, 1002, 1),
(1004, 1006, 1005, 1),
(1005, 1004, 1003, 1),
(1006, 1007, 1004, 1),
(1007, 1008, 1006, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_material`
--

CREATE TABLE `p_material` (
  `id_pmaterial` int(15) NOT NULL,
  `id_planshift` int(15) NOT NULL,
  `id_material` int(15) NOT NULL,
  `used_stock` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_material`
--

INSERT INTO `p_material` (`id_pmaterial`, `id_planshift`, `id_material`, `used_stock`) VALUES
(1001, 1001, 1001, 115),
(1002, 1003, 1002, 104),
(1004, 1006, 1005, 102),
(1005, 1004, 1003, 117),
(1006, 1007, 1004, 130),
(1007, 1008, 1006, 102);

-- --------------------------------------------------------

--
-- Table structure for table `shiftment`
--

CREATE TABLE `shiftment` (
  `id_shift` int(11) NOT NULL,
  `shift_name` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shiftment`
--

INSERT INTO `shiftment` (`id_shift`, `shift_name`, `start_time`, `end_time`) VALUES
(1001, 'Pagi', '08:00:00', '16:00:00'),
(1002, 'Siang', '14:00:00', '22:00:00'),
(1003, 'Malam', '22:00:00', '06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sorting_report`
--

CREATE TABLE `sorting_report` (
  `id_sorting` int(15) NOT NULL,
  `id_planshift` int(15) NOT NULL,
  `waste` int(50) NOT NULL,
  `finished` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sorting_report`
--

INSERT INTO `sorting_report` (`id_sorting`, `id_planshift`, `waste`, `finished`) VALUES
(1002, 1003, 0, 104),
(1003, 1004, 1, 116),
(1004, 1006, 0, 102),
(1005, 1007, 0, 130),
(1006, 1008, 0, 102);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `st_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `staff_name`, `phone`, `email`, `st_status`) VALUES
(1001, 'Shift E200 – Alloy Wheel Assembly Line', 898627100, 'production@gmail.com', 2),
(1002, 'Shift GLC3004MATIC – Alloy Wheel Assembly Line', 888206861, 'production@gmail.com', 2),
(1003, 'Shift E300 – Brake Disc Production Line', 868952283, 'production@gmail.com', 2),
(1004, 'Shift GLA200 – Alloy Wheel Assembly Line', 826915598, 'production@gmail.com', 2),
(1005, 'Shift A200 – Alloy Wheel Assembly Line', 834714307, 'production@gmail.com', 2),
(1006, 'Shift GLE4504MATIC – Fuel Tank Assembly Line', 880245216, 'production@gmail.com', 2),
(1007, 'Shift C300AMG – Brake Disc Production Line', 893707349, 'production@gmail.com', 2),
(1008, 'Shift C200AVA – Headlamp Assembly Line', 820129703, 'production@gmail.com', 2),
(1009, 'Shift GLC2004MATIC – Door Panel Production Line', 890735277, 'production@gmail.com', 2),
(1010, 'Shift A180 – Alloy Wheel Assembly Line', 890335065, 'production@gmail.com', 2),
(1011, 'Shift A250 – Headlamp Assembly Line', 812975919, 'production@gmail.com', 2),
(1012, 'Shift AMGA35 – Alloy Wheel Assembly Line', 865374641, 'production@gmail.com', 2),
(1013, 'Shift AMGA45 – General Production Line', 860570249, 'production@gmail.com', 2),
(1014, 'Shift B200 – Alloy Wheel Assembly Line', 831250604, 'production@gmail.com', 2),
(1015, 'Shift B250 – General Production Line', 888299133, 'production@gmail.com', 2),
(1016, 'Shift C220d – General Production Line', 890708782, 'production@gmail.com', 2),
(1017, 'Shift C250 – Alloy Wheel Assembly Line', 852223714, 'production@gmail.com', 2),
(1018, 'Shift AMGC43 – Headlamp Assembly Line', 835063071, 'production@gmail.com', 2),
(1019, 'Shift AMGC63 – General Production Line', 872520277, 'production@gmail.com', 2),
(1020, 'Shift E220d – Alloy Wheel Assembly Line', 851795847, 'production@gmail.com', 2),
(1021, 'Shift E250 – General Production Line', 830639599, 'production@gmail.com', 2),
(1022, 'Shift E350 – Alloy Wheel Assembly Line', 863104591, 'production@gmail.com', 2),
(1023, 'Shift AMGE53 – General Production Line', 880176833, 'production@gmail.com', 2),
(1024, 'Shift AMGE63 – General Production Line', 850841220, 'production@gmail.com', 2),
(1025, 'Shift S450 – Alloy Wheel Assembly Line', 825611503, 'production@gmail.com', 2),
(1026, 'Shift S500 – General Production Line', 841914856, 'production@gmail.com', 2),
(1027, 'Shift S560 – Door Panel Production Line', 884081169, 'production@gmail.com', 2),
(1028, 'Shift S580 – Fuel Tank Assembly Line', 856078401, 'production@gmail.com', 2),
(1029, 'Shift AMGS63 – General Production Line', 853005609, 'production@gmail.com', 2),
(1030, 'Shift AMGS65 – General Production Line', 865884428, 'production@gmail.com', 2),
(1031, 'Shift CLA200 – General Production Line', 850575329, 'production@gmail.com', 2),
(1032, 'Shift CLA250 – Fuel Tank Assembly Line', 865107420, 'production@gmail.com', 2),
(1033, 'Shift AMGCLA35 – General Production Line', 824426488, 'production@gmail.com', 2),
(1034, 'Shift AMGCLA45 – General Production Line', 853537825, 'production@gmail.com', 2),
(1035, 'Shift CLS300 – Brake Disc Production Line', 869492129, 'production@gmail.com', 2),
(1036, 'Shift CLS350 – General Production Line', 898431053, 'production@gmail.com', 2),
(1037, 'Shift CLS450 – Fuel Tank Assembly Line', 881674698, 'production@gmail.com', 2),
(1038, 'Shift AMGCLS53 – General Production Line', 897901042, 'production@gmail.com', 2),
(1039, 'Shift GLA250 – Fuel Tank Assembly Line', 813777011, 'production@gmail.com', 2),
(1040, 'Shift AMGGLA35 – Brake Disc Production Line', 890758596, 'production@gmail.com', 2),
(1041, 'Shift AMGGLA45 – Fuel Tank Assembly Line', 876992278, 'production@gmail.com', 2),
(1042, 'Shift GLB200 – General Production Line', 859676465, 'production@gmail.com', 2),
(1043, 'Shift GLB250 – Brake Disc Production Line', 897122580, 'production@gmail.com', 2),
(1044, 'Shift AMGGLB35 – General Production Line', 858567286, 'production@gmail.com', 2),
(1045, 'Shift GLC250 – General Production Line', 810729060, 'production@gmail.com', 2),
(1046, 'Shift AMGGLC43 – Headlamp Assembly Line', 884138138, 'production@gmail.com', 2),
(1047, 'Shift AMGGLC63 – General Production Line', 866563890, 'production@gmail.com', 2),
(1048, 'Shift GLE350 – Alloy Wheel Assembly Line', 816021905, 'production@gmail.com', 2),
(1049, 'Shift GLE400 – Door Panel Production Line', 891103874, 'production@gmail.com', 2),
(1050, 'Shift AMGGLE53 – General Production Line', 846963658, 'production@gmail.com', 2),
(1051, 'Shift AMGGLE63 – General Production Line', 893423544, 'production@gmail.com', 2),
(1052, 'Shift GLS400 – Fuel Tank Assembly Line', 874186710, 'production@gmail.com', 2),
(1053, 'Shift GLS450 – General Production Line', 830393181, 'production@gmail.com', 2),
(1054, 'Shift GLS500 – General Production Line', 840200311, 'production@gmail.com', 2),
(1055, 'Shift AMGGLS63 – Brake Disc Production Line', 845308251, 'production@gmail.com', 2),
(1056, 'Shift G350d – Headlamp Assembly Line', 816302614, 'production@gmail.com', 2),
(1057, 'Shift G400d – Brake Disc Production Line', 862457146, 'production@gmail.com', 2),
(1058, 'Shift G500 – Door Panel Production Line', 891114653, 'production@gmail.com', 2),
(1059, 'Shift AMGG63 – General Production Line', 836188829, 'production@gmail.com', 2),
(1060, 'Shift Mercedes-AMGGT – General Production Line', 837040854, 'production@gmail.com', 2),
(1061, 'Shift AMGGT43 – General Production Line', 831777068, 'production@gmail.com', 2),
(1062, 'Shift AMGGT53 – Door Panel Production Line', 847668678, 'production@gmail.com', 2),
(1063, 'Shift AMGGT63 – Headlamp Assembly Line', 872826126, 'production@gmail.com', 2),
(1064, 'Shift SL400 – General Production Line', 889003233, 'production@gmail.com', 2),
(1065, 'Shift SL500 – Brake Disc Production Line', 890709036, 'production@gmail.com', 2),
(1066, 'Shift AMGSL63 – General Production Line', 833393946, 'production@gmail.com', 2),
(1067, 'Shift Vito – General Production Line', 864675351, 'production@gmail.com', 2),
(1068, 'Shift V260 – Brake Disc Production Line', 836765683, 'production@gmail.com', 2),
(1069, 'Shift V300d – General Production Line', 881031821, 'production@gmail.com', 2),
(1070, 'Shift C 200 – Alloy Wheel 18 inch Line', 896824318, 'production@gmail.com', 2),
(1071, 'Shift C 300 – Brake Disc Line', 876804463, 'production@gmail.com', 2),
(1072, 'Shift GLB 200 – Alloy Wheel 18 inch Line', 829403300, 'production@gmail.com', 2),
(1073, 'Shift GLB 250 – Brake Disc Line', 813351916, 'production@gmail.com', 2),
(1074, 'Shift GLE 400 – Alloy Wheel 20 inch Line', 819583457, 'production@gmail.com', 2),
(1075, 'Shift GLS 450 – Alloy Wheel 21 inch Line', 844550537, 'production@gmail.com', 2),
(1076, 'Shift S 450 – Brake Disc Line', 891630884, 'production@gmail.com', 2),
(1077, 'Shift S 500 – Alloy Wheel 19 inch Line', 834829881, 'production@gmail.com', 2),
(1078, 'Shift EQE 350 – Battery Module Line', 856855269, 'Produktion@gmail.com', 2),
(1079, 'Shift EQS 450 – Battery Cooling Plate Line', 837479703, 'production@gmail.com', 2),
(1080, 'Shift CLA 200 – Brake Disc Line', 891495583, 'production@gmail.com', 2),
(1081, 'Shift GLC43 AMG – Alloy Wheel 20 inch Line', 840648839, 'production@gmail.com', 2),
(1082, 'Shift C43 AMG – Brake Disc Line', 891591206, 'production@gmail.com', 2),
(1083, 'Shift E200d – Brake Disc Line', 820854274, 'production@gmail.com', 2),
(1084, 'Shift EQB 300 – Battery Module Line', 857338455, 'production@gmail.com', 2),
(1085, 'Shift GLC350e – Battery Pack Line', 865608285, 'production@gmail.com', 2),
(1086, 'Shift E300e – Battery Pack Line', 815014553, 'production@gmail.com', 2),
(1087, 'Shift S580e – Battery Cooling Plate Line', 865077637, 'production@gmail.com', 2),
(1088, 'Shift V250 – Alloy Wheel 19 inch Line', 841410095, 'production@gmail.com', 2),
(1089, 'Shift EQV 300 – Battery Module Line', 885604404, 'production@gmail.com', 2),
(1090, 'Shift GLS600 – Alloy Wheel 22 inch Line', 885152269, 'production@gmail.com', 2),
(1091, 'Shift S680 Maybach – Brake Disc Line', 862935031, 'production@gmail.com', 2),
(1092, 'Shift EQA 250 – Battery Module Line', 897118903, 'production@gmail.com', 2),
(1093, 'Shift EQC 400 – Battery Pack Line', 819354028, 'production@gmail.com', 2),
(1094, 'Shift G580 – Battery Cooling Plate Line', 858896968, 'production@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `role` enum('admin','leader') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'leader', 'leader', 'leader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `finished_report`
--
ALTER TABLE `finished_report`
  ADD PRIMARY KEY (`id_finished`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id_machine`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indexes for table `plan_shift`
--
ALTER TABLE `plan_shift`
  ADD PRIMARY KEY (`id_planshift`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `p_machine`
--
ALTER TABLE `p_machine`
  ADD PRIMARY KEY (`id_pmachine`);

--
-- Indexes for table `p_material`
--
ALTER TABLE `p_material`
  ADD PRIMARY KEY (`id_pmaterial`);

--
-- Indexes for table `shiftment`
--
ALTER TABLE `shiftment`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indexes for table `sorting_report`
--
ALTER TABLE `sorting_report`
  ADD PRIMARY KEY (`id_sorting`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cust` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `id_machine` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `planning`
--
ALTER TABLE `planning`
  MODIFY `id_plan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1097;

--
-- AUTO_INCREMENT for table `plan_shift`
--
ALTER TABLE `plan_shift`
  MODIFY `id_planshift` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1099;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1098;

--
-- AUTO_INCREMENT for table `shiftment`
--
ALTER TABLE `shiftment`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1095;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
