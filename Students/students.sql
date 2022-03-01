-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 06:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--
CREATE DATABASE IF NOT EXISTS `students` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `students`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `ADD_ID` int(11) NOT NULL COMMENT 'Unique Identifier for ADDRESS',
  `ADD_STREET` varchar(255) NOT NULL COMMENT 'Main Street Address',
  `ADD_STREET2` varchar(255) DEFAULT NULL COMMENT 'Secondary Street Address',
  `ADD_CITY` varchar(255) NOT NULL COMMENT 'City',
  `ADD_STATE` varchar(255) NOT NULL COMMENT 'State',
  `ADD_ZIP` varchar(255) NOT NULL COMMENT 'Zip Code',
  `ADD_HPHONE` varchar(10) DEFAULT NULL COMMENT 'Home Phone number',
  `ADD_BPHONE` varchar(10) DEFAULT NULL COMMENT 'Business Phone number',
  `ADD_CPHONE` varchar(10) DEFAULT NULL COMMENT 'Cell Phone Number',
  `ADD_WEB` varchar(255) DEFAULT NULL COMMENT 'Web Address (Can be used for online portfolios)',
  `ADD_EMAIL` varchar(255) DEFAULT NULL COMMENT 'Email Address '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of ADDRESSes';

--
-- RELATIONSHIPS FOR TABLE `address`:
--

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ADD_ID`, `ADD_STREET`, `ADD_STREET2`, `ADD_CITY`, `ADD_STATE`, `ADD_ZIP`, `ADD_HPHONE`, `ADD_BPHONE`, `ADD_CPHONE`, `ADD_WEB`, `ADD_EMAIL`) VALUES
(1, '0309 Howell Port', 'Apt. 267', 'Mariettaberg', 'North Carolina', '32381', '(184)678-7', '192.229.57', '(520)188-4', 'email@email.com', 'http://www.shields.com/'),
(2, '50430 Quinten Shoals', 'Suite 610', 'Port Emmie', 'Oklahoma', '52622-8665', '646-251-77', '696.748.75', '1-844-803-', 'ybrown@example.com', 'http://hand.com/'),
(3, '69890 Mitchell Ports', 'Apt. 634', 'South Darbyberg', 'Ohio', '98886', '(233)306-7', '+95(9)8177', '550-198-82', 'http://www.gerlach.com/', 'bcremin@example.com'),
(4, '2570 Gerlach Road Suite 639', 'Suite 433', 'Kozeybury', 'Hawaii', '77634', '+78(8)6473', '823.023.99', '672.465.08', 'http://www.nicolaswyman.net/', 'sporer.oran@example.net'),
(5, '3021 Terry Streets', 'Apt. 365', 'South Marcelinaton', 'Massachusetts', '87254-2964', '1-054-976-', '0187671852', '1-393-910-', 'http://www.wunsch.biz/', 'wthiel@example.org'),
(6, '408 O\'Kon Fields', 'Suite 204', 'North Ardellaburgh', 'Maryland', '98720-2050', '(094)442-3', '1-607-587-', '700.215.72', 'http://bruen.com/', 'devan21@example.org'),
(7, '185 Harmon Route Suite 855', 'Suite 013', 'Lake Lydiabury', 'New Jersey', '88199-3083', '(295)777-8', '655-653-59', '+44(5)0532', 'christiansen.llewellyn@example.net', 'http://www.jacobs.net/'),
(8, '28479 Wolf Village', 'Apt. 874', 'Delphineport', 'Michigan', '97819-2790', '889.725.26', '1-816-824-', '672.342.88', 'http://www.goodwin.com/', 'tevin.hoppe@example.com'),
(9, '8362 Dejah Ville Apt. 353', 'Apt. 048', 'Leannonhaven', 'Massachusetts', '98624', '151.452.08', '(477)785-9', '0653653153', 'http://hintz.com/', 'gibson.kristofer@example.org'),
(10, '43907 Zena Springs', 'Suite 628', 'Greenfelderburgh', 'Michigan', '45336', '229-190-71', '181-273-70', '+78(2)9542', 'http://emmerich.com/', 'xstehr@example.net');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

DROP TABLE IF EXISTS `awards`;
CREATE TABLE `awards` (
  `AWD_ID` int(11) NOT NULL COMMENT 'Unique Identifier for AWARDS',
  `AWD_NAME` varchar(255) NOT NULL COMMENT 'Name of Award',
  `AWD_ORGANIZATION` varchar(255) NOT NULL COMMENT 'Organization who awarded the award',
  `AWD_DESC` varchar(255) NOT NULL COMMENT 'Description of the award',
  `VERIFIED` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of AWARDS';

--
-- RELATIONSHIPS FOR TABLE `awards`:
--

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`AWD_ID`, `AWD_NAME`, `AWD_ORGANIZATION`, `AWD_DESC`, `VERIFIED`) VALUES
(1, 'nam', 'Baumbach-Harber', 'Adipisci nobis eveniet libero quibusdam omnis nobis sunt aut. Random added', 1),
(2, 'labore', 'Orn PLC', 'Aut consequatur voluptatibus iusto sed corporis mollitia qui.', 1),
(3, 'qui', 'Johnson LLC', 'Esse fugiat nihil quia assumenda sapiente dignissimos ipsum perspiciatis.', 0),
(4, 'fugiat', 'Paucek and Sons', 'Et cumque tenetur deserunt.', 1),
(5, 'nisi', 'Gusikowski Group', 'Odit veniam est excepturi illo quos eaque magni dolorem.', 0),
(6, 'animi', 'Raynor, Brakus and Schuppe', 'Officia dolores molestiae et incidunt autem optio id.', 0),
(8, 'voluptates', 'Greenfelder Group', 'Tempora eos vel aspernatur dolorem.', 0),
(9, 'qui', 'Barrows-Osinski', 'Minima laborum et esse maxime cum accusantium non fugiat.', 0),
(10, 'minima', 'Murazik, Zieme and Murazik', 'Accusantium eum tempore odio nihil et explicabo.', 1),
(19, 'Award2', 'Somewhere2', 'dsfdsasfdsa', 0),
(20, 'Award34', 'Somewhere2', 'fdsafds', 0);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE `business` (
  `BUS_ID` int(11) NOT NULL COMMENT 'Unique Identifier for BUSINESS',
  `BUS_NAME` varchar(255) NOT NULL COMMENT 'The name of the Business',
  `BUS_DESC` varchar(255) NOT NULL COMMENT 'The Description of the Business',
  `ADD_ID` int(11) DEFAULT NULL COMMENT 'Creates a relationship with the business to it''s address in the address table',
  `VERIFIED` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Admin verification that user inputed real data and not fake data to be used by other users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of Businesses names and address information. This will be used for both vendors and places Students have worked. ';

--
-- RELATIONSHIPS FOR TABLE `business`:
--

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`BUS_ID`, `BUS_NAME`, `BUS_DESC`, `ADD_ID`, `VERIFIED`) VALUES
(1, 'Altenwerth Group', 'Non necessitatibus qui ut rerum cum corrupti.', 1, 9),
(2, 'Harber, Ratke and Turner', 'Corporis dolor a delectus.', 2, 6),
(3, 'Bogan, Mills and Price', 'Repudiandae et quia repellendus enim.', 3, 3),
(4, 'Spencer PLC', 'Tempora harum voluptate ipsa minus dolores quaerat.', 4, 3),
(5, 'Wisoky Ltd', 'Rerum dignissimos id eius voluptas ex et.', 5, 7),
(6, 'Kris Inc', 'Eos aut doloremque tempore quisquam voluptate.', 6, 8),
(7, 'Wunsch, Conroy and Strosin', 'Ratione rerum nihil cum consequatur sapiente.', 7, 8),
(8, 'Auer-Goldner', 'Cumque alias fugiat amet nihil aut voluptatem iste.', 8, 2),
(9, 'Aufderhar Ltd', 'Perspiciatis iste non consequatur.', 9, 5),
(10, 'O\'Conner-Paucek', 'Odit et iure eveniet minima corporis.', 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `business_task`
--

DROP TABLE IF EXISTS `business_task`;
CREATE TABLE `business_task` (
  `BUS_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the BUS_ID of the BUSINESS table',
  `TSK_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the TSK_ID of the TASK table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between several Businesses and several Tasks that could be comleted at that busness';

--
-- RELATIONSHIPS FOR TABLE `business_task`:
--   `TSK_ID`
--       `task` -> `TSK_ID`
--   `BUS_ID`
--       `business` -> `BUS_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

DROP TABLE IF EXISTS `certification`;
CREATE TABLE `certification` (
  `CERT_ID` int(11) NOT NULL COMMENT 'Unique Identifier for CERTIFICATION',
  `CERT_NAME` varchar(255) NOT NULL COMMENT 'Name of the Certification',
  `CERT_ORGANIZATION` varchar(255) NOT NULL COMMENT 'Organization who awarded the certification',
  `CERT_DESC` varchar(255) NOT NULL COMMENT 'Description of the Certification',
  `VERIFIED` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Admin verification that user inputed real data and not fake data to be used by other users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of CERTIFICATIONs';

--
-- RELATIONSHIPS FOR TABLE `certification`:
--

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`CERT_ID`, `CERT_NAME`, `CERT_ORGANIZATION`, `CERT_DESC`, `VERIFIED`) VALUES
(1, 'est', 'Littel-Crona', 'Exercitationem occaecati inventore voluptas architecto et iste molestias.', 0),
(2, 'non', 'Leuschke-Kessler', 'Earum nobis dolorum ut aliquid.', 0),
(3, 'id', 'Farrell PLC', 'Veniam sint quas velit.', 0),
(4, 'quos', 'Rice, Pfeffer and Monahan', 'Nisi eos quia unde asperiores a dolorem.', 0),
(5, 'nisi', 'O\'Keefe, Hagenes and Collier', 'Quaerat magni minus at itaque.', 0),
(6, 'deleniti', 'Von, Cronin and Hermann', 'Ut non deserunt corporis quia.', 0),
(7, 'sapiente', 'Kris LLC', 'Assumenda sequi sequi nihil natus nihil in et iste.', 0),
(8, 'possimus', 'Schmeler-Klocko', 'Blanditiis minus vel beatae incidunt.', 1),
(9, 'consequatur', 'Block Ltd', 'Reprehenderit quis qui animi.', 1),
(10, 'recusandae', 'Green, King and Cremin', 'Laborum et consequatur molestiae facere voluptates non.', 0),
(20, 'Something', 'somewhere', 'fdsfdsada156165156156', 0),
(21, 'Something', 'somewhere', 'fdsfdsada156165156156', 0),
(22, 'Something', 'somewhere', 'fdsfdsada156165156156', 0),
(23, 'CIS481', 'somewhere', 'meow', 0),
(24, 'Something', 'somewhere', 'zxvzvdz', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cohort`
--

DROP TABLE IF EXISTS `cohort`;
CREATE TABLE `cohort` (
  `COHORT_ID` int(11) NOT NULL COMMENT 'Unique identifier for COHORT',
  `COHORT_NAME` varchar(255) NOT NULL COMMENT 'Name of the Cohort Track',
  `COHORT_DESC` varchar(255) NOT NULL COMMENT 'Description of the Cohort Track'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Names and describes the Cohort Track.';

--
-- RELATIONSHIPS FOR TABLE `cohort`:
--

--
-- Dumping data for table `cohort`
--

INSERT INTO `cohort` (`COHORT_ID`, `COHORT_NAME`, `COHORT_DESC`) VALUES
(1, 'Something', 'blah blah blah2');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `COURSE` varchar(8) NOT NULL COMMENT 'Unique Identifier for Course IDs',
  `TOPIC` varchar(255) NOT NULL COMMENT 'TOPIC is of Course',
  `CREDIT_HOURS` int(11) NOT NULL COMMENT 'Credit hours for the course'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of Courses';

--
-- RELATIONSHIPS FOR TABLE `course`:
--

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`COURSE`, `TOPIC`, `CREDIT_HOURS`) VALUES
('CIS481', 'stuff stuff stuff', 5),
('CIS482', 'meow blah mow', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

DROP TABLE IF EXISTS `course_category`;
CREATE TABLE `course_category` (
  `COURSE_CATEGORY` varchar(255) NOT NULL COMMENT 'The name of the category a course falls into',
  `COURSE` varchar(8) NOT NULL COMMENT 'Creates a relationship with the COURSE of the COURSE table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between';

--
-- RELATIONSHIPS FOR TABLE `course_category`:
--   `COURSE`
--       `course` -> `COURSE`
--

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

DROP TABLE IF EXISTS `hobby`;
CREATE TABLE `hobby` (
  `HOB_ID` int(11) NOT NULL COMMENT 'Unique identifer for HOBBY table',
  `HOB_NAME` varchar(255) NOT NULL COMMENT 'Name of the Hobby',
  `HOB_DESC` varchar(255) NOT NULL COMMENT 'Description of the Hobby',
  `VERIFIED` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Admin verification that user inputed real data and not fake data to be used by other users 	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `hobby`:
--

--
-- Dumping data for table `hobby`
--

INSERT INTO `hobby` (`HOB_ID`, `HOB_NAME`, `HOB_DESC`, `VERIFIED`) VALUES
(1, 'Competitive Gaming', 'Playing video games in competitions', 0),
(2, 'Biking', 'Riding bicycles', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prereq`
--

DROP TABLE IF EXISTS `prereq`;
CREATE TABLE `prereq` (
  `COURSE` varchar(8) NOT NULL COMMENT 'COURSE is of PREREQ',
  `PREREQ_COURSE` varchar(8) NOT NULL COMMENT 'PREQ_COURSE is of PREREQ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table for listing course prerequisits';

--
-- RELATIONSHIPS FOR TABLE `prereq`:
--   `COURSE`
--       `course` -> `COURSE`
--   `PREREQ_COURSE`
--       `course` -> `COURSE`
--

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `PROGRAM_ID` int(11) NOT NULL COMMENT 'Unique identifier for PROGRAM',
  `PROGRAM_NAME` varchar(255) NOT NULL COMMENT 'Name of the Program',
  `PROGRAM_HOURS` int(11) NOT NULL COMMENT 'Total Credit Hourse required for the program'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of PROGRAM';

--
-- RELATIONSHIPS FOR TABLE `program`:
--

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`PROGRAM_ID`, `PROGRAM_NAME`, `PROGRAM_HOURS`) VALUES
(1, 'Software Development', 1356),
(2, 'something else', 140);

-- --------------------------------------------------------

--
-- Table structure for table `program_course`
--

DROP TABLE IF EXISTS `program_course`;
CREATE TABLE `program_course` (
  `PROGRAM_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the PROGRAM_ID of the PROGRAM table',
  `COURSE` varchar(8) NOT NULL COMMENT 'Creates a relationship with the COURSE of the COURSE table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between ';

--
-- RELATIONSHIPS FOR TABLE `program_course`:
--   `PROGRAM_ID`
--       `program` -> `PROGRAM_ID`
--   `COURSE`
--       `course` -> `COURSE`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `ROL_ID` int(11) NOT NULL COMMENT 'Unique Identifier for User Role',
  `ROL_NAME` varchar(255) NOT NULL COMMENT 'Name of the User Role',
  `ROL_DESC` varchar(255) NOT NULL COMMENT 'Description of user Role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table for list of User Roles';

--
-- RELATIONSHIPS FOR TABLE `roles`:
--

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ROL_ID`, `ROL_NAME`, `ROL_DESC`) VALUES
(1, 'ADMIN', 'Administration usres'),
(2, 'STUDENT', 'Student accounts'),
(3, 'FAMILY', 'Account for student family members'),
(4, 'TECH', 'Account for verifying information.');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

DROP TABLE IF EXISTS `scholarship`;
CREATE TABLE `scholarship` (
  `SCH_ID` int(11) NOT NULL COMMENT 'Unique Identifier for SCHOLARSHIP',
  `SCH_NAME` varchar(255) NOT NULL COMMENT 'Name of the Scholarship',
  `SCH_AMOUNT` decimal(10,2) NOT NULL COMMENT 'Amount of money awarded',
  `SCH_DESC` varchar(255) NOT NULL COMMENT 'description of the SCHOLARSHIP',
  `ADD_ID` int(11) DEFAULT NULL COMMENT 'Creates a relationship with the scholarship to it''s address in the address table',
  `SCH_ORG` varchar(255) NOT NULL COMMENT 'Organization who awards the Scholarship',
  `VERIFIED` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Admin verification that user inputed real data and not fake data to be used by other users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of SCHOLARSHIPs';

--
-- RELATIONSHIPS FOR TABLE `scholarship`:
--   `ADD_ID`
--       `address` -> `ADD_ID`
--

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`SCH_ID`, `SCH_NAME`, `SCH_AMOUNT`, `SCH_DESC`, `ADD_ID`, `SCH_ORG`, `VERIFIED`) VALUES
(1, 'odio', '0.00', 'Reprehenderit error ad illum quia qui amet et velit.', 1, 'Mraz, Kutch and Wintheiser', 0),
(2, 'dolores', '99999999.99', 'Quia deserunt facilis quis beatae quo ea.', 2, 'Jerde-Mosciski', 1),
(3, 'ut', '53365647.00', 'Eum nesciunt ut dolores quaerat amet.', 3, 'Connelly, Langosh and Orn', 1),
(4, 'dolorum', '1406216.00', 'Ut et odio quo consequatur voluptas aperiam.', 4, 'Schroeder Group', 1),
(5, 'alias', '4.00', 'Quasi consequatur quia laboriosam ut.', 5, 'Leannon Ltd', 1),
(6, 'provident', '3689021.00', 'Vero molestiae nihil ab minus eum autem.', 6, 'Cummerata, Dickinson and Trantow', 1),
(7, 'adipisci', '0.00', 'Illo quis voluptatum quo excepturi architecto sed.', 7, 'Crooks, Corwin and Walter', 0),
(8, 'repudiandae', '7.00', 'Eos debitis ab veritatis est sunt.', 8, 'Schmeler, Grady and Watsica', 1),
(9, 'ex', '2.00', 'Consectetur quo perspiciatis suscipit iusto.', 9, 'Champlin PLC', 0),
(10, 'cum', '16.00', 'Esse ut rerum distinctio nihil voluptatem.', 10, 'O\'Reilly-Lowe', 1),
(13, 'Something', '1250.00', 'hey gave me mo money', NULL, 'Place', 0),
(21, 'now', '1235.00', 'Gimme money 2', NULL, 'place', 0),
(23, 'Typing', '120.00', 'abc', NULL, 'somewhere', 0),
(24, 'Tfdasyping', '120.00', 'abfdsafc', NULL, 'somfdsfdasewhere', 0),
(25, 'Typing', '120.00', 'abc', NULL, 'Place', 0);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE `school` (
  `SKH_ID` int(11) NOT NULL COMMENT 'Unique Identifier for SCHOOL',
  `SKH_NAME` varchar(255) NOT NULL COMMENT 'Name of the School',
  `ADD_ID` int(11) DEFAULT NULL COMMENT 'Creates a relationship with the school to it''s address in the address table',
  `VERIFIED` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Admin verification that user inputed real data and not fake data to be used by other users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of SCHOOLs including colleges';

--
-- RELATIONSHIPS FOR TABLE `school`:
--   `ADD_ID`
--       `address` -> `ADD_ID`
--

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`SKH_ID`, `SKH_NAME`, `ADD_ID`, `VERIFIED`) VALUES
(1, 'Upton-Toy', 1, 1),
(2, 'Ward, Bechtelar and Auer', 2, 0),
(3, 'Wuckert Ltd', 3, 0),
(4, 'Wilderman, Fisher and Barton', 4, 1),
(5, 'Hodkiewicz-Christiansen', 5, 1),
(6, 'Price-VonRueden', 6, 1),
(7, 'Dietrich, Wuckert and Crist', 7, 0),
(8, 'Tromp-Davis', 8, 1),
(9, 'Keebler-Tillman', 9, 1),
(10, 'Bartell Inc', 10, 1),
(11, 'Something', 1, 0),
(17, 'now', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `SKL_ID` int(11) NOT NULL COMMENT 'Unique Identifier for SKILLS',
  `SKL_NAME` varchar(255) NOT NULL COMMENT 'Name of the Skill',
  `SKL_DESC` varchar(255) NOT NULL COMMENT 'A description of the skill',
  `SKL_CAT` varchar(255) NOT NULL COMMENT 'Category the Skill Falls into',
  `SKL_SUB_CAT` varchar(255) DEFAULT NULL COMMENT 'SubCategory the Skill Falls into',
  `VERIFIED` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Admin verification that user inputed real data and not fake data to be used by other users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of Skills';

--
-- RELATIONSHIPS FOR TABLE `skills`:
--

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`SKL_ID`, `SKL_NAME`, `SKL_DESC`, `SKL_CAT`, `SKL_SUB_CAT`, `VERIFIED`) VALUES
(1, 'omnis', 'Possimus iste et consequatur ut vero voluptatem laborum illo.', 'dolorem', 'dolor', 0),
(2, 'occaecati', 'Iure et quos suscipit ipsum mollitia quia.', 'voluptas', 'eum', 1),
(3, 'vero', 'Reiciendis aspernatur quibusdam laborum quaerat autem quis.', 'dolorem', 'totam', 1),
(4, 'dicta', 'Numquam et non officia ut vitae fuga.', 'omnis', 'enim', 1),
(5, 'rerum', 'Quae quo quidem officiis est repellendus quo nemo.', 'voluptate', 'voluptatem', 1),
(6, 'nulla', 'Quae a voluptates maiores beatae.', 'explicabo', 'nostrum', 0),
(7, 'quidem', 'Quam sequi sapiente esse illum magnam.', 'eos', 'reiciendis', 1),
(8, 'veritatis', 'Eaque enim tenetur culpa culpa autem voluptatibus nesciunt.', 'soluta', 'accusantium', 1),
(9, 'rerum', 'Repudiandae consequatur et voluptatem est quisquam dolorem quae.', 'inventore', 'occaecati', 0),
(10, 'ea', 'Voluptates accusantium aut placeat qui.', 'ut', 'iusto', 0),
(11, 'Typing', 'I can type!', 'computers', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

DROP TABLE IF EXISTS `social`;
CREATE TABLE `social` (
  `SOC_ID` int(11) NOT NULL COMMENT 'Unique Identifier for SOCIAL',
  `SOC_NAME` varchar(255) NOT NULL COMMENT 'Name of the Social Media',
  `SOC_WEB` varchar(255) DEFAULT NULL COMMENT 'Web Address of the Social Media',
  `VERIFIED` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Admin verification that user inputed real data and not fake data to be used by other users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of SOCIAL MEDIA';

--
-- RELATIONSHIPS FOR TABLE `social`:
--

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`SOC_ID`, `SOC_NAME`, `SOC_WEB`, `VERIFIED`) VALUES
(1, 'Crona Inc', 'http://www.shields.com/', 0),
(2, 'Toy-Langworth', 'http://hand.com/', 1),
(3, 'Willms, Conroy and Conroy', 'http://www.gerlach.com/', 1),
(4, 'Reichel, Heidenreich and Bins', 'http://www.nicolaswyman.net/', 1),
(5, 'Ullrich, Vandervort and Schamberger', 'http://www.wunsch.biz/', 1),
(6, 'Lebsack Group', 'http://bruen.com/', 1),
(7, 'Becker, Brown and Ryan', 'http://www.jacobs.net/', 1),
(8, 'Gottlieb, Lubowitz and Hintz', 'http://www.goodwin.com/', 0),
(9, 'Rippin and Sons', 'http://hintz.com/', 0),
(10, 'VonRueden-Gaylord', 'http://emmerich.com/', 1),
(11, 'Instagram', 'https://www.instagram.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `TSK_ID` int(11) NOT NULL COMMENT 'Unique Identifier for TASK',
  `TSK_NAME` varchar(255) NOT NULL COMMENT 'Name of the task',
  `TSK_DESC` varchar(255) NOT NULL COMMENT 'Description of the task',
  `TSK_CAT` varchar(255) NOT NULL COMMENT 'Category the task Falls into',
  `TSK_SUB_CAT` varchar(255) DEFAULT NULL COMMENT 'SubCategory the task Falls into',
  `VERIFIED` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Admin verification that user inputed real data and not fake data to be used by other users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of TASK';

--
-- RELATIONSHIPS FOR TABLE `task`:
--

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`TSK_ID`, `TSK_NAME`, `TSK_DESC`, `TSK_CAT`, `TSK_SUB_CAT`, `VERIFIED`) VALUES
(1, 'consequatur', 'Possimus recusandae ea voluptatem repellendus.', 'placeat', 'odio', 1),
(2, 'repudiandae', 'Dolore quia rerum aut repellat deleniti excepturi.', 'consequatur', 'voluptatem', 1),
(3, 'voluptas', 'Ut fugit provident quia totam cumque ipsum est.', 'suscipit', 'molestias', 1),
(4, 'et', 'Ipsam eius adipisci rerum id voluptates et.', 'sunt', 'sit', 1),
(5, 'dolorem', 'Eos id dicta assumenda voluptatem vel.', 'dolores', 'alias', 1),
(6, 'officia', 'Quia rerum libero consequatur et iusto ex.', 'et', 'voluptas', 1),
(7, 'consequatur', 'Facilis soluta quas delectus nobis alias alias voluptates.', 'commodi', 'omnis', 0),
(8, 'aliquam', 'Quaerat qui voluptatem ullam dignissimos minus.', 'autem', 'facere', 1),
(9, 'illo', 'Eos et non quis perferendis perspiciatis dolorum molestias similique.', 'qui', 'voluptatem', 1),
(10, 'quia2', 'Dolorem beatae suscipit delectus consequuntur magnam.', 'ea', '', 0),
(11, 'Cleaning', 'Had to clean everything', 'Maintenance', 'building', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL COMMENT 'Unique Identifier for User',
  `USER_UNAME` varchar(255) NOT NULL COMMENT 'User''s User name for logging in',
  `USER_PWORD` varchar(255) NOT NULL COMMENT 'User''s Password',
  `USER_FNAME` varchar(255) NOT NULL COMMENT 'User''s First Name',
  `USER_MNAME` varchar(255) DEFAULT NULL COMMENT 'User''s Middle Name',
  `USER_LNAME` varchar(255) NOT NULL COMMENT 'User''s Last Name',
  `USER_DOB` date DEFAULT NULL COMMENT 'User''s Date of Birth',
  `USER_RACE` varchar(255) DEFAULT NULL COMMENT 'User''s Race',
  `USER_GENDER` varchar(255) DEFAULT NULL COMMENT 'User''s Race (Including LGBTQi+)',
  `ROL_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the Role ID in the ROLES table for user''s role in the system',
  `USER_REL` int(11) DEFAULT NULL COMMENT 'Creates a relationship with the User ID of another User If the user is related to another user this shows what their relation is',
  `ADD_ID` int(11) DEFAULT NULL COMMENT 'Creates a relationship with the Address ID in the ADDRESS table for the User''s Address'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table of User Information';

--
-- RELATIONSHIPS FOR TABLE `user`:
--   `ROL_ID`
--       `roles` -> `ROL_ID`
--   `ADD_ID`
--       `address` -> `ADD_ID`
--   `USER_REL`
--       `user` -> `USER_ID`
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_UNAME`, `USER_PWORD`, `USER_FNAME`, `USER_MNAME`, `USER_LNAME`, `USER_DOB`, `USER_RACE`, `USER_GENDER`, `ROL_ID`, `USER_REL`, `ADD_ID`) VALUES
(1, 'admin', '123', 'admin', 'middle', 'admin', '2022-01-31', 'White', 'Other', 1, NULL, NULL),
(2, 'student', '123', 'Armando', 'Sadye', 'Lowe', '2020-06-01', 'aspernatur', 'Male', 2, NULL, 2),
(3, 'family', '123', 'Abbigail', 'Leon', 'Mraz', '2021-06-08', 'voluptatem', 'Female', 3, 2, 3),
(4, 'tech', '123', 'Ruthe', 'Jude', 'Gaylord', '1982-03-25', 'inventore', 'Female', 4, NULL, 4),
(5, 'harvey.joey', 'pveum', 'Beer', 'Destany', 'Collin', '2014-07-25', 'African American', 'Male', 4, NULL, 5),
(6, 'lockman.yolanda', 'arely.jacobi', 'Orlo', 'Nyah', 'Mohr', '1971-02-24', 'voluptate', 'Other', 2, NULL, 6),
(7, 'stephen66', 'schimmel.stephon', 'Turner', 'Andres', 'Williamson', '1975-04-12', 'sed', 'Male', 3, 10, 7),
(8, 'jamar.kulas', 'ndeckow', 'Leone', 'Deangelo', 'Goyette', '1988-06-18', 'sequi', 'Male', 4, NULL, 8),
(9, 'yhalvorson', 'lkris', 'Leif', 'Lizzie', 'Schiller', '2002-03-19', 'omnis', 'Non-Binary', 1, NULL, 9),
(10, 'sonny18', 'ekoepp', 'Rodger', 'Stella', 'Lakin', '1983-10-20', 'repellat', 'Male', 2, NULL, 10),
(11, 'hbeer', 'horacio69', 'Gisselle', 'Maurice', 'Barton', '1991-01-28', 'praesentium', 'Female', 1, NULL, 1),
(31, 'duck', 'password', 'fdsa', 'jk;', 'fdsifajo', '2022-02-15', 'White2', 'Non-Binary', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_awards`
--

DROP TABLE IF EXISTS `user_awards`;
CREATE TABLE `user_awards` (
  `USER_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the USER_ID of the USER table',
  `AWD_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the AWD_ID of the AWARDS table',
  `AWD_DATE` date NOT NULL COMMENT 'The date the User received the award'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between several Users and several Awards. This allows the user to show all the Awards the user could have been awarded';

--
-- RELATIONSHIPS FOR TABLE `user_awards`:
--   `USER_ID`
--       `user` -> `USER_ID`
--   `AWD_ID`
--       `awards` -> `AWD_ID`
--

--
-- Dumping data for table `user_awards`
--

INSERT INTO `user_awards` (`USER_ID`, `AWD_ID`, `AWD_DATE`) VALUES
(2, 3, '2022-02-10'),
(2, 10, '2022-02-01'),
(2, 19, '2022-02-15'),
(2, 4, '2019-01-29'),
(2, 20, '2022-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `user_business_task`
--

DROP TABLE IF EXISTS `user_business_task`;
CREATE TABLE `user_business_task` (
  `USER_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the USER_ID of the USER table',
  `TSK_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the TSK_ID of the TASK table',
  `BUS_ID` int(11) DEFAULT NULL COMMENT 'Creates a relationship with the BUS_ID of the BUSINESS table',
  `SKH_ID` int(11) DEFAULT NULL COMMENT 'Creates a relationship with the SKH_ID of the SCHOOL table',
  `UBT_SDATE` date NOT NULL COMMENT 'Date the user started at the business',
  `UBT_EDATE` date DEFAULT NULL COMMENT 'Date the user ended at the business',
  `UBT_TYPE` varchar(255) NOT NULL COMMENT 'Type of work the user did IE. Full-Time, Part-Time, Contract, Internship, Externship, Volunteer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between several Users, Businesses, Schools, and Tasks. This is to show what tasks the user preformed at the businesses they worked for or activities and extra curriculars at schools, or businesses.';

--
-- RELATIONSHIPS FOR TABLE `user_business_task`:
--   `USER_ID`
--       `user` -> `USER_ID`
--   `TSK_ID`
--       `task` -> `TSK_ID`
--   `BUS_ID`
--       `business` -> `BUS_ID`
--   `SKH_ID`
--       `school` -> `SKH_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_certification`
--

DROP TABLE IF EXISTS `user_certification`;
CREATE TABLE `user_certification` (
  `USER_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the USER_ID of the USER table',
  `CERT_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the CERT_ID of the CERTIFICATION table',
  `CERT_DATE` date NOT NULL COMMENT 'Date the user earned the Certification',
  `CERT_EXP_DATE` date DEFAULT NULL COMMENT 'Date the Certification Expires if it expires.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between several Users and several Certifications. This allows the user to show all the Certifications the user could have been earned.';

--
-- RELATIONSHIPS FOR TABLE `user_certification`:
--   `USER_ID`
--       `user` -> `USER_ID`
--   `CERT_ID`
--       `certification` -> `CERT_ID`
--

--
-- Dumping data for table `user_certification`
--

INSERT INTO `user_certification` (`USER_ID`, `CERT_ID`, `CERT_DATE`, `CERT_EXP_DATE`) VALUES
(2, 6, '2022-02-02', '2022-02-16'),
(2, 10, '2013-02-06', '2028-02-16'),
(2, 3, '2013-02-06', '2029-02-15'),
(2, 20, '2022-02-16', '2022-03-31'),
(2, 1, '2022-02-01', '2022-03-09'),
(2, 5, '2022-02-01', '0000-00-00'),
(2, 8, '2022-02-02', '0000-00-00'),
(2, 24, '2013-02-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_course_program`
--

DROP TABLE IF EXISTS `user_course_program`;
CREATE TABLE `user_course_program` (
  `USER_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the USER_ID of the USER table',
  `COURSE` varchar(8) DEFAULT NULL COMMENT 'Creates a relationship with the COURSE of the COURSE table',
  `PROGRAM_ID` int(11) DEFAULT NULL COMMENT 'Creates a relationship with the PROGRAM_ID of the PROGRAM table',
  `COHORT_ID` int(11) DEFAULT NULL COMMENT 'Creates a relationship with the COHORT_ID of the COHORT table',
  `TERM` varchar(10) DEFAULT NULL COMMENT 'Term that the student is taking the course or program',
  `SCHEDULE` varchar(10) DEFAULT NULL COMMENT 'Schedule the student falls under (days, nights, afternoons)',
  `GRADE` decimal(10,2) DEFAULT NULL COMMENT 'Student''s Grade Point Average for the Course',
  `REMARKS` varchar(255) DEFAULT NULL COMMENT 'Remarks about student within a course or program.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between ';

--
-- RELATIONSHIPS FOR TABLE `user_course_program`:
--   `COHORT_ID`
--       `cohort` -> `COHORT_ID`
--   `USER_ID`
--       `user` -> `USER_ID`
--   `COURSE`
--       `course` -> `COURSE`
--   `PROGRAM_ID`
--       `program` -> `PROGRAM_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_hobby`
--

DROP TABLE IF EXISTS `user_hobby`;
CREATE TABLE `user_hobby` (
  `USER_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the USER_ID of the USER table ',
  `HOB_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the HOB_ID of the HOBBY table '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between several Users and several Hobbies. This allows the user to show all the Hobbies the user has';

--
-- RELATIONSHIPS FOR TABLE `user_hobby`:
--   `USER_ID`
--       `user` -> `USER_ID`
--   `HOB_ID`
--       `hobby` -> `HOB_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_scholarship`
--

DROP TABLE IF EXISTS `user_scholarship`;
CREATE TABLE `user_scholarship` (
  `USER_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the USER_ID of the USER table',
  `SCH_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the SCH_ID of the SCHOLARSHIP table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between several Users and several Scholarships. This allows the user to show all the Scholarships and Grants the user could have been awarded';

--
-- RELATIONSHIPS FOR TABLE `user_scholarship`:
--   `USER_ID`
--       `user` -> `USER_ID`
--   `SCH_ID`
--       `scholarship` -> `SCH_ID`
--

--
-- Dumping data for table `user_scholarship`
--

INSERT INTO `user_scholarship` (`USER_ID`, `SCH_ID`) VALUES
(2, 7),
(2, 2),
(2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_school`
--

DROP TABLE IF EXISTS `user_school`;
CREATE TABLE `user_school` (
  `USER_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the USER_ID of the USER table',
  `SKH_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the SKH_ID of the SCHOOL table',
  `US_SDATE` date NOT NULL COMMENT 'Date the user started at the school',
  `US_EDATE` date DEFAULT NULL COMMENT 'Date the user finished at the school',
  `US_TYPE` varchar(50) NOT NULL COMMENT 'Type of education the user achieved (High School Diploma, Associates etc.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between several Users and several Schools that the user could have attended';

--
-- RELATIONSHIPS FOR TABLE `user_school`:
--   `USER_ID`
--       `user` -> `USER_ID`
--   `SKH_ID`
--       `school` -> `SKH_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

DROP TABLE IF EXISTS `user_skills`;
CREATE TABLE `user_skills` (
  `USER_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the USER_ID of the USER table',
  `SKL_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the SKL_ID of the SKILLS table',
  `US_HOURS` int(11) DEFAULT NULL COMMENT 'Amount of hours the student has completed the skill'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table allows the creation of multiple relationships between several Users and several Skills that the user could posess';

--
-- RELATIONSHIPS FOR TABLE `user_skills`:
--   `USER_ID`
--       `user` -> `USER_ID`
--   `SKL_ID`
--       `skills` -> `SKL_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_social`
--

DROP TABLE IF EXISTS `user_social`;
CREATE TABLE `user_social` (
  `USER_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the USER_ID of the USER table',
  `SOC_ID` int(11) NOT NULL COMMENT 'Creates a relationship with the SOC_ID of the SOCIAL table',
  `USOC_ID` varchar(255) NOT NULL COMMENT 'User''s Social Media User Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user_social`:
--   `USER_ID`
--       `user` -> `USER_ID`
--   `SOC_ID`
--       `social` -> `SOC_ID`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`ADD_ID`),
  ADD UNIQUE KEY `ADD_ID` (`ADD_ID`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`AWD_ID`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`BUS_ID`),
  ADD KEY `ADD_ID` (`ADD_ID`);

--
-- Indexes for table `business_task`
--
ALTER TABLE `business_task`
  ADD KEY `BUS_ID` (`BUS_ID`),
  ADD KEY `TSK_ID` (`TSK_ID`);

--
-- Indexes for table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`CERT_ID`);

--
-- Indexes for table `cohort`
--
ALTER TABLE `cohort`
  ADD PRIMARY KEY (`COHORT_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`COURSE`),
  ADD UNIQUE KEY `COURSE` (`COURSE`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD KEY `COURSE` (`COURSE`);

--
-- Indexes for table `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`HOB_ID`);

--
-- Indexes for table `prereq`
--
ALTER TABLE `prereq`
  ADD KEY `COURSE` (`COURSE`),
  ADD KEY `PREQ_COURSE` (`PREREQ_COURSE`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`PROGRAM_ID`);

--
-- Indexes for table `program_course`
--
ALTER TABLE `program_course`
  ADD KEY `PROGRAM_ID` (`PROGRAM_ID`),
  ADD KEY `COURSE` (`COURSE`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROL_ID`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`SCH_ID`),
  ADD KEY `ADD_ID` (`ADD_ID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`SKH_ID`),
  ADD KEY `ADD_ID` (`ADD_ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`SKL_ID`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`SOC_ID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`TSK_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USER_UNAME` (`USER_UNAME`),
  ADD KEY `ROL_ID` (`ROL_ID`),
  ADD KEY `USER_REL` (`USER_REL`),
  ADD KEY `ADD_ID` (`ADD_ID`);

--
-- Indexes for table `user_awards`
--
ALTER TABLE `user_awards`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `AWD_ID` (`AWD_ID`);

--
-- Indexes for table `user_business_task`
--
ALTER TABLE `user_business_task`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `TSK_ID` (`TSK_ID`),
  ADD KEY `BUS_ID` (`BUS_ID`),
  ADD KEY `SKH_ID` (`SKH_ID`);

--
-- Indexes for table `user_certification`
--
ALTER TABLE `user_certification`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `CERT_ID` (`CERT_ID`);

--
-- Indexes for table `user_course_program`
--
ALTER TABLE `user_course_program`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `COURSE` (`COURSE`),
  ADD KEY `PROGRAM_ID` (`PROGRAM_ID`),
  ADD KEY `COHORT_ID` (`COHORT_ID`);

--
-- Indexes for table `user_hobby`
--
ALTER TABLE `user_hobby`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `HOB_ID` (`HOB_ID`);

--
-- Indexes for table `user_scholarship`
--
ALTER TABLE `user_scholarship`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `SCH_ID` (`SCH_ID`);

--
-- Indexes for table `user_school`
--
ALTER TABLE `user_school`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `SKH_ID` (`SKH_ID`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `SKL_ID` (`SKL_ID`);

--
-- Indexes for table `user_social`
--
ALTER TABLE `user_social`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `SOC_ID` (`SOC_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `ADD_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for ADDRESS', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `AWD_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for AWARDS', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `BUS_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for BUSINESS', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `certification`
--
ALTER TABLE `certification`
  MODIFY `CERT_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for CERTIFICATION', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cohort`
--
ALTER TABLE `cohort`
  MODIFY `COHORT_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for COHORT', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hobby`
--
ALTER TABLE `hobby`
  MODIFY `HOB_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifer for HOBBY table', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `PROGRAM_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for PROGRAM', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ROL_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for User Role', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `SCH_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for SCHOLARSHIP', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `SKH_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for SCHOOL', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `SKL_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for SKILLS', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `SOC_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for SOCIAL', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `TSK_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for TASK', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier for User', AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_task`
--
ALTER TABLE `business_task`
  ADD CONSTRAINT `business_task_ibfk_1` FOREIGN KEY (`TSK_ID`) REFERENCES `task` (`TSK_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `business_task_ibfk_2` FOREIGN KEY (`BUS_ID`) REFERENCES `business` (`BUS_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `course_category`
--
ALTER TABLE `course_category`
  ADD CONSTRAINT `course_category_ibfk_1` FOREIGN KEY (`COURSE`) REFERENCES `course` (`COURSE`) ON UPDATE CASCADE;

--
-- Constraints for table `prereq`
--
ALTER TABLE `prereq`
  ADD CONSTRAINT `prereq_ibfk_1` FOREIGN KEY (`COURSE`) REFERENCES `course` (`COURSE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prereq_ibfk_2` FOREIGN KEY (`PREREQ_COURSE`) REFERENCES `course` (`COURSE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_course`
--
ALTER TABLE `program_course`
  ADD CONSTRAINT `program_course_ibfk_1` FOREIGN KEY (`PROGRAM_ID`) REFERENCES `program` (`PROGRAM_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `program_course_ibfk_2` FOREIGN KEY (`COURSE`) REFERENCES `course` (`COURSE`) ON UPDATE CASCADE;

--
-- Constraints for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD CONSTRAINT `scholarship_ibfk_1` FOREIGN KEY (`ADD_ID`) REFERENCES `address` (`ADD_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`ADD_ID`) REFERENCES `address` (`ADD_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ROL_ID`) REFERENCES `roles` (`ROL_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`ADD_ID`) REFERENCES `address` (`ADD_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`USER_REL`) REFERENCES `user` (`USER_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_awards`
--
ALTER TABLE `user_awards`
  ADD CONSTRAINT `user_awards_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_awards_ibfk_2` FOREIGN KEY (`AWD_ID`) REFERENCES `awards` (`AWD_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `user_business_task`
--
ALTER TABLE `user_business_task`
  ADD CONSTRAINT `user_business_task_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_business_task_ibfk_2` FOREIGN KEY (`TSK_ID`) REFERENCES `task` (`TSK_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_business_task_ibfk_3` FOREIGN KEY (`BUS_ID`) REFERENCES `business` (`BUS_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_business_task_ibfk_4` FOREIGN KEY (`SKH_ID`) REFERENCES `school` (`SKH_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `user_certification`
--
ALTER TABLE `user_certification`
  ADD CONSTRAINT `user_certification_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_certification_ibfk_2` FOREIGN KEY (`CERT_ID`) REFERENCES `certification` (`CERT_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `user_course_program`
--
ALTER TABLE `user_course_program`
  ADD CONSTRAINT `user_course_program_ibfk_1` FOREIGN KEY (`COHORT_ID`) REFERENCES `cohort` (`COHORT_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_course_program_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_course_program_ibfk_3` FOREIGN KEY (`COURSE`) REFERENCES `course` (`COURSE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_course_program_ibfk_4` FOREIGN KEY (`PROGRAM_ID`) REFERENCES `program` (`PROGRAM_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `user_hobby`
--
ALTER TABLE `user_hobby`
  ADD CONSTRAINT `user_hobby_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_hobby_ibfk_2` FOREIGN KEY (`HOB_ID`) REFERENCES `hobby` (`HOB_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user_scholarship`
--
ALTER TABLE `user_scholarship`
  ADD CONSTRAINT `user_scholarship_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_scholarship_ibfk_2` FOREIGN KEY (`SCH_ID`) REFERENCES `scholarship` (`SCH_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `user_school`
--
ALTER TABLE `user_school`
  ADD CONSTRAINT `user_school_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_school_ibfk_2` FOREIGN KEY (`SKH_ID`) REFERENCES `school` (`SKH_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`SKL_ID`) REFERENCES `skills` (`SKL_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `user_social`
--
ALTER TABLE `user_social`
  ADD CONSTRAINT `user_social_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_social_ibfk_2` FOREIGN KEY (`SOC_ID`) REFERENCES `social` (`SOC_ID`) ON UPDATE CASCADE;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table address
--

--
-- Metadata for table awards
--

--
-- Metadata for table business
--

--
-- Metadata for table business_task
--

--
-- Metadata for table certification
--

--
-- Metadata for table cohort
--

--
-- Metadata for table course
--

--
-- Metadata for table course_category
--

--
-- Metadata for table hobby
--

--
-- Metadata for table prereq
--

--
-- Metadata for table program
--

--
-- Metadata for table program_course
--

--
-- Metadata for table roles
--

--
-- Metadata for table scholarship
--

--
-- Metadata for table school
--

--
-- Metadata for table skills
--

--
-- Metadata for table social
--

--
-- Metadata for table task
--

--
-- Metadata for table user
--

--
-- Metadata for table user_awards
--

--
-- Metadata for table user_business_task
--

--
-- Metadata for table user_certification
--

--
-- Metadata for table user_course_program
--

--
-- Metadata for table user_hobby
--

--
-- Metadata for table user_scholarship
--

--
-- Metadata for table user_school
--

--
-- Metadata for table user_skills
--

--
-- Metadata for table user_social
--

--
-- Metadata for database students
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
