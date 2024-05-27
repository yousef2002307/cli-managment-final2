-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 03:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123', '2024-04-19 14:28:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appoiments`
--

CREATE TABLE `appoiments` (
  `id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `queue_num` int(11) NOT NULL,
  `revisit` int(11) NOT NULL DEFAULT 0,
  `patient_id` int(11) DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 visa and 1 cash',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT 'this we see if 0 is mad online 1 inperson but not errogent 2 is errgont\r\n',
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `appoiments`
--

INSERT INTO `appoiments` (`id`, `clinic_id`, `date`, `queue_num`, `revisit`, `patient_id`, `payment_status`, `created_at`, `updated_at`, `status`, `active`, `name`) VALUES
(248, 25, '2024-05-28', 1, 0, 1, 1, '2024-05-09 15:20:09', '2024-05-09 15:20:09', 0, 0, NULL),
(251, 25, '2024-05-31', 1, 0, 1, 1, '2024-05-09 15:21:36', '2024-05-09 15:21:36', 0, 0, NULL),
(262, 55, '2024-06-27', 1, 1, 6, 1, '2024-05-15 19:19:50', '2024-05-15 19:19:50', 0, 0, NULL),
(270, 55, '2024-06-06', 1, 1, 1, 1, '2024-05-17 15:24:40', '2024-05-17 15:24:40', 0, 0, NULL),
(282, 55, '2024-05-28', 1, 0, 1, 1, '2024-05-17 17:12:00', '2024-05-18 16:53:21', 0, 0, NULL),
(291, 55, '2024-05-29', 1, 0, 1, 0, '2024-05-23 20:53:46', '2024-05-23 20:53:46', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `seen` int(11) DEFAULT 0,
  `type` int(11) DEFAULT 0 COMMENT '0 meand doc and 1 means res',
  `clinic_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cli`
--

CREATE TABLE `cli` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `b_no` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL DEFAULT 'mmnwat11@gmail.com',
  `payment_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 means  he did not add credit card credinatils',
  `numofvisits` int(11) NOT NULL DEFAULT 3,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 means he did not add doc and res and 1 menas no',
  `works_from` time NOT NULL,
  `works_to` time NOT NULL,
  `desc2` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `work_days` text NOT NULL DEFAULT 'Sunday to friday',
  `price` int(11) NOT NULL DEFAULT 100,
  `price2` int(11) NOT NULL DEFAULT 15,
  `pending` int(11) DEFAULT 0,
  `lan` double DEFAULT NULL,
  `lon` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cli`
--

INSERT INTO `cli` (`id`, `name`, `password`, `b_no`, `street`, `city`, `phone`, `email`, `payment_status`, `numofvisits`, `status`, `works_from`, `works_to`, `desc2`, `updated_at`, `created_at`, `work_days`, `price`, `price2`, `pending`, `lan`, `lon`) VALUES
(6, 'Hermann, Cartwright and Bruen', '$2a$04$ENZ3QawsLnDC6R0WIzpNue2KZQZBbo77QaQACGCgY8LYOvqF2Glje', 'Tayabamba', 'Apt 791', 'Tonggakjati', '9685826891', 'rcannam5@yahoo.com', 1, 3, 1, '11:37:00', '09:12:00', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r\n\r\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '2024-05-09 16:18:35', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 1, NULL, NULL),
(10, 'Reichel Inc', '$2a$04$HQoMWKZXyd9eXcmvQTixQuFmDZ0qWfg61hVCcGbGAcCDeEeqyiDHS', 'Makale', 'Room 1145', 'Itanhandu', '3496079252', 'jbanyard9@bluehost.com', 1, 3, 1, '05:36:00', '11:04:00', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', '2024-05-02 10:13:09', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(11, 'Herzog Inc', '$2a$04$SkPZP4538wTzm/NsKgB/H.mj1xWdiJmY5m..tdZ41BriX5YggMWtG', 'Jianrao', 'Suite 99', 'Yabēlo', '3542564571', 'aganea@surveymonkey.com', 1, 3, 1, '10:40:00', '07:33:00', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\r\n\r\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r\n\r\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(12, 'Howe, Kautzer and Wiegand', '$2a$04$STX9A.SjxnaErTV0YUY/I.m3l4ADPWi6Fy7vrkFTyFujVqqMkagU6', 'Patnongon', 'Suite 19', 'Barayong', '5327396202', 'bgilbertsonb@joomla.org', 1, 3, 1, '12:15:00', '01:40:00', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\r\n\r\nIn congue. Etiam justo. Etiam pretium iaculis justo.\r\n\r\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(13, 'Parisian-Donnelly', '$2a$04$BGjrvobzLkPbF77HWpiBGewgkSwMs9KKpOZQmD3y5eBqC1McfbtGi', 'Longxian Chengguanzhen', 'Room 240', 'Hasaki', '2858540708', 'gdionsettoc@slashdot.org', 1, 3, 1, '05:41:00', '07:01:00', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\r\n\r\nPhasellus in felis. Donec semper sapien a libero. Nam dui.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(14, 'Bernier LLC', '$2a$04$df52wVZbMRR.ilN0qMJYnuqcpy4ogNbSg/qNox1pMSj9yluYB61A.', 'Halmstad', 'Room 1507', 'Llacanora', '7341688712', 'ebotemand@goodreads.com', 1, 3, 1, '10:56:00', '03:04:00', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(15, 'Dare, Dickens and Collier', '$2a$04$OYgfBnrBPQptSKoz6T8b0eqBot2/7mhFBKS2bXR7eIQuFmSaioCZC', 'Shinjō', '7th Floor', 'Madala', '6415219945', 'mrowdelle@cdbaby.com', 1, 3, 1, '12:09:00', '12:49:00', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r\n\r\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r\n\r\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(16, 'Deckow, Connelly and Swaniawski', '$2a$04$C0xwBF1f.4.Bg8tyK2qaZO8kqZDBrRp/AXQSroLyQn/ZaHWKVKD8K', 'Zborovice', '7th Floor', 'Yulao', '2173381231', 'cplayfootf@issuu.com', 1, 3, 1, '04:55:00', '06:47:00', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.\r\n\r\nProin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(17, 'Durgan-Kihn', '$2a$04$QyzDifLLrHDoY1XTCx4Es.fUolpD1JQJMunbglb.kD02DJG67y40K', 'Pedreira', 'PO Box 75778', 'Moutsamoudou', '1305778579', 'jfairhamg@walmart.com', 1, 3, 1, '08:04:00', '01:57:00', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(18, 'Medhurst-O\'Reilly', '$2a$04$NO6zEysHH7YCSqyAiaVdSu0CVaOlsEAUxI4eJB6rpFP1z3mLhXmDe', 'Till', 'PO Box 25289', 'Liancheng', '9788955144', 'olaith@cnbc.com', 1, 3, 1, '09:16:00', '01:15:00', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(19, 'McGlynn, Rau and Krajcik', '$2a$04$/4ME6gS0AlSq1U90canbQeNTTsvbvSXAgkEYw19O4Sb7SmgcJWfii', 'Brumadinho', '1st Floor', 'Dankalwa', '2384525751', 'abulleyi@angelfire.com', 1, 3, 1, '07:28:00', '04:43:00', 'Fusce consequat. Nulla nisl. Nunc nisl.\r\n\r\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\r\n\r\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(20, 'Collins Group', '$2a$04$KmpD8sQ1x9TgKWE6fikbYufMjIrsN6pr2jbtWiCz66y0tUtzdknVa', 'Richky', 'Suite 6', 'Batulayang', '6544348928', 'gfitzhenryj@nbcnews.com', 1, 3, 1, '07:13:00', '08:37:00', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r\n\r\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(21, 'Johnston-Block', '$2a$04$baLzG/0nW5DGPXjfLi8JAOidO50X/GA941Y8n1YITkk83CrjBznvS', 'Paraty', 'Suite 94', 'Hualmay', '4227720412', 'nbarsbyk@wordpress.com', 1, 3, 1, '08:13:00', '07:12:00', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\r\n\r\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(22, 'Jenkins-Reinger', '$2a$04$SgAR.KBBxGucFP8ZLXFAyumZZZob1BZ8iv8Ob2ccEEE1iA8GwYNQu', 'Tsimasham', 'Room 810', 'Hangji', '3649275778', 'zdaskiewiczl@baidu.com', 1, 3, 1, '04:04:00', '08:42:00', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\r\n\r\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\r\n\r\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(23, 'Pfannerstill Inc', '$2a$04$NuCEflKnk38xtH02pgqNs.tJnL1a.FSm5l5MPqdikZmTr8GHA9NYu', 'San Juan', '20th Floor', 'Beauharnois', '7046810072', 'szoephelm@hud.gov', 1, 3, 1, '05:02:00', '12:21:00', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(24, 'Harris LLC', '$2a$04$A0D0qk8G7rM1aaouAVageuASTsfZISWDcjHA8mwptjTLvbfuril62', 'Wieczfnia Kościelna', 'Apt 509', 'Santo Antônio do Içá', '9042218433', 'lschwieson@mozilla.com', 1, 3, 1, '11:21:00', '01:38:00', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.\r\n\r\nCurabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(25, 'Pollich Inc', '$2a$04$8tp6RDjUMzNvUtHfCVR9..n24MWPn/srZ9jQmUkuPanL9rVmxTNVW', 'Salcedo', '15th Floor', 'Baganhilir', '5057989430', 'gthrusho@cdc.gov', 1, 3, 1, '07:52:00', '05:20:00', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r\n\r\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(26, 'Towne, Fay and Schinner', '$2a$04$BtuYYyRCj8WtDDR406j1hOV/hJ4ua0qxPdVDlk6PBMr4HyuA7OCzy', 'Irshava', '13th Floor', 'Chengxiang', '3677684571', 'ledelheitp@go.com', 1, 3, 1, '04:35:00', '06:03:00', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(27, 'Mosciski, Weber and Upton', '$2a$04$so9dcQRTVmFDOHnye1z2H..djM6ljHhNaL/Vz2WMba1ccUsTPACaK', 'Concordia', 'Room 1986', 'São Pedro', '4533120524', 'spinerq@abc.net.au', 1, 3, 1, '04:48:00', '07:12:00', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(28, 'Becker Group', '$2a$04$rGRZ2Q2Q1H9U6DdLBfWVruwgqXq4pltifMzdRCFE1WIRBLJn5tDSC', 'As Sab‘ Biyār', 'PO Box 4964', 'Lawepakam', '5434743165', 'jhendrichr@ning.com', 1, 3, 1, '01:30:00', '09:40:00', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\r\n\r\nInteger ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\r\n\r\nNam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(29, 'Considine-Padberg', '$2a$04$JK67VxfHuVpcVZSi7bbxb./qJsH3W843Lw2OIZNsSbzC70EPgKakm', 'Jelisavac', 'Suite 27', 'Mashizhai', '4499435125', 'pcamiers@mozilla.com', 1, 3, 1, '04:19:00', '01:26:00', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(30, 'Beier Inc', '$2a$04$qE16AHpUvjUIV/ix3OzBsuxHkDuWEGfqTIe2bC0QgIkiS02GsiZsi', 'Pingdu', '16th Floor', 'Uusikaupunki', '3991070772', 'gmarinert@yelp.com', 1, 3, 1, '08:39:00', '03:55:00', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(31, 'Daniel-Ullrich', '$2a$04$c5eQgkXgfjmNinYGNn/OU.sh0JiYGKDlaxLlZz03L3fryL1l3BAba', 'Foros do Trapo', 'Room 1282', 'Xinsheng', '4431335936', 'cstoateu@1und1.de', 1, 3, 1, '06:53:00', '03:37:00', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r\n\r\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(32, 'Williamson Inc', '$2a$04$IbX.6jZKPd.kEUFxQrAgAOCvD6Tsi0/sUAC.b8OPE9C3Z8cPT9XDW', 'Fangzheng', 'Room 347', 'Bairros', '8956391865', 'stourniev@guardian.co.uk', 1, 3, 1, '03:15:00', '05:59:00', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r\n\r\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(33, 'Kertzmann-Hauck', '$2a$04$3Lvh.NulSO7k2UyeO5f0Uu9ImkRUtOW2r./7rTIHgVInKRtkJV4xa', 'Ágios Týchon', 'Suite 78', 'Lewotola', '8361710368', 'ccardusw@jalbum.net', 1, 3, 1, '09:16:00', '09:10:00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(34, 'Berge-Breitenberg', '$2a$04$1ztsSEGrpBzNt.lY/tFDqOYa91AFii.pqur/QJ.QgQPvD780EXQoq', 'Jindui', 'Apt 315', 'Changchi', '6044751016', 'rscroxtonx@about.com', 1, 3, 1, '03:18:00', '05:33:00', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r\n\r\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r\n\r\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(35, 'Oberbrunner Group', '$2a$04$Ni3tN7qx7/ZbJH7HTq7Fnuyh4rXHVgD2pwR/EKhdgSkMm8dPjpVay', 'Orion', 'Suite 26', 'Parakanhonje Wetan', '8761914133', 'lrivelesy@oaic.gov.au', 1, 3, 1, '04:09:00', '01:48:00', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r\n\r\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(36, 'Barrows-Lindgren', '$2a$04$bVgaeIXDwMwE56pBkGBdSeNLz7QT7Ory.g2aWQBKGEXOiFnGFrcnC', 'Palaió Fáliro', 'PO Box 23913', 'Kurba', '6667981186', 'ddabornz@va.gov', 1, 3, 1, '02:30:00', '04:55:00', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(37, 'Purdy-Gibson', '$2a$04$zOCMjrbfe/cQEjsQZv/DaOxHYukgOQARdlLfDTQ/GNmEABZgEphXG', 'Pianbai', 'Suite 67', 'Haolibao', '4731463932', 'nhowford10@hexun.com', 1, 3, 1, '02:04:00', '09:05:00', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(38, 'Maggio-Brakus', '$2a$04$Gl5nmxOa0xMAW6dBeAmSee7o9bTuw3Npif0gYgJ06UEpdvkT41V7u', 'Dubti', 'PO Box 92451', 'Pajoreja', '4684307201', 'trutley11@cbslocal.com', 1, 3, 1, '03:54:00', '11:50:00', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\r\n\r\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(39, 'McClure-Bergnaum', '$2a$04$rtb7Sdt2n2OUMBlby7hUJur242b1SlnRJHoc4SA1q.Vz9qoVeaBzK', 'Jiayi', 'PO Box 52026', 'Kugesi', '6123787715', 'cscheu12@ebay.co.uk', 1, 3, 1, '07:49:00', '06:30:00', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(40, 'Smith, Barton and Conn', '$2a$04$jAvu/f0r6eyb8rl71zLweOcj85qxazRpNtzPreOUK4JcD77QdN/i2', 'Zhongtong', '8th Floor', 'Magtangol', '7042575288', 'pkinde13@exblog.jp', 1, 3, 1, '16:00:00', '21:08:00', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(41, 'Dickinson-Collier', '$2a$04$51UwDavIyRwm09YYSmEdVuXpDQgSoFAo4RQGIdxGhSLbipVy5NBDC', 'Mogilany', 'PO Box 62193', 'Smolenka', '1274816223', 'clarwood14@eepurl.com', 1, 3, 1, '02:00:00', '05:53:00', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\r\n\r\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(42, 'Kozey-Hintz', '$2a$04$9Fue8w4JUqv0MZWz.HiY7eGvevjDK0U9RaJeSdKJfWuCGj6kfgWmG', 'Salaberry-de-Valleyfield', 'Apt 760', 'Bom Conselho', '4217625312', 'mtrengrove15@statcounter.com', 1, 3, 1, '09:08:00', '01:32:00', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(43, 'Lueilwitz LLC', '$2a$04$OHcOfJ42csCxWzsd07gG..zkZ0JcGIqM5qMLxI8eHGqk5PBFf62PO', 'Luna', 'Room 224', 'Ninghai', '4861700347', 'twestrey16@t-online.de', 1, 3, 1, '12:40:00', '03:05:00', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r\n\r\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(44, 'Schroeder-Lowe', '$2a$04$yVtGUlUnsRxPG3Z8wok6ZOUyGNSGQeLSZ4fkbrvksmgklZrNOnvUO', 'Cisalak', 'PO Box 566', 'Santa Fe', '8905724909', 'rlidgard17@flavors.me', 1, 3, 1, '09:07:00', '11:34:00', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r\n\r\nPraesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r\n\r\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(45, 'Hoppe-Conn', '$2a$04$I4GvE1MmZzsO.ocCxeKrO.jSgychMpQzoKe76fM6np.ywAU02B6pi', 'Rumburk', '4th Floor', 'Sonlit', '2441067746', 'akennifeck18@hhs.gov', 1, 3, 1, '01:20:00', '05:44:00', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\r\n\r\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(46, 'Dibbert Group', '$2a$04$Nmt5qAmqiuI890tuDkLEHuMRBzMJcJo7I17DdKxopJEODLTU.x4fm', 'Manlucahoc', 'Room 686', 'Oslo', '7032967209', 'csiuda19@bizjournals.com', 1, 3, 1, '05:51:00', '01:56:00', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r\n\r\nPraesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r\n\r\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(47, 'Stokes and Sons', '$2a$04$7vEzcwW7e.HBePIh5dF9SOdkUR4IbTSi/i9m/IJQNC2wJQoZeHaRa', 'Zaplavnoye', '1st Floor', 'Pangai', '3261646925', 'etuckley1a@yale.edu', 1, 3, 1, '05:00:00', '08:53:00', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\r\n\r\nFusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\r\n\r\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(48, 'Ruecker, Harvey and Parker', '$2a$04$Ltz.IAmzfcbwB/A4xiIRleAiA0vcdeYclMPsMf/XLPsy8Y1oQ/vuO', 'Freire', 'PO Box 44457', 'Frei', '5585070546', 'hgallego1b@cafepress.com', 1, 3, 1, '03:49:00', '11:08:00', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r\n\r\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(49, 'Kutch Group', '$2a$04$UGKj0omWMcNhcvZV5Pg3DOGobMvns5eYeATDcK8ZiHrmdRJ9Yqbdu', 'Areeiro', '11th Floor', 'Batad', '9331796425', 'dbriggdale1c@mashable.com', 1, 3, 1, '10:06:00', '09:08:00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.\r\n\r\nVestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\r\n\r\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(50, 'Bosco-Auer', '$2a$04$1jOHuCRy5iwPNYYmZYPmt.CNvdgmf9OTswQp1YlMMqsDGDUNikNsS', 'Argungu', 'Apt 1336', 'Lenningen', '6575537127', 'alampl1d@microsoft.com', 1, 3, 1, '05:54:00', '11:20:00', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\r\n\r\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\r\n\r\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '0000-00-00 00:00:00', '2024-03-20 12:11:17', 'Sunday to friday', 100, 15, 0, NULL, NULL),
(51, 'clinic1', '$2y$10$zBxAGhKcIpANYlzE2tDice2XvPhJszr.raQAoRxmYx/SthSGvaZmy', 'banha', 'dsfsdf', 'banha', '01014898892', 'mmnwat6@gmail.com', 0, 2, 1, '04:56:00', '14:56:00', 'dsdfsdfdfsfd', '2024-04-07 13:16:26', '2024-03-25 11:03:14', 'Sunday to Friday', 71, 71, 0, NULL, NULL),
(52, 'clinic2', '$2y$10$3BQ5ARhnnuwEytuU6b2Ah.CQtB3MSeA.IJ2WgIQcUs24WOSwfgsBW', 'Alexandria', 'banha', 'banha', '01014898892', 'mmnwat6@gmail.com', 0, 20, 1, '18:17:00', '01:17:00', 'dsdfsdfdfsfd', '2024-03-25 18:53:45', '2024-03-25 11:18:53', 'Sunday to Tuesday', 41, 41, 0, NULL, NULL),
(53, 'clinic3', '$2y$10$CYQ4Mopa4bKfLB9h1PNqTuEkliIWOQZqTWUO2GbT.2SIXr4Pe81p2', 'Alexandria', 'banha', 'banha', '01014898892', 'mmnwat6@gmail.com', 0, 2, 0, '11:57:00', '14:57:00', 'dsdfsdfdfsfd', '2024-03-25 18:57:31', '2024-03-25 18:57:31', 'Thursday to Sunday', 22, 22, 0, NULL, NULL),
(54, 'clinic4', '$2y$10$XPJz7dgkxn.GhhzUPNbYF.iMn12x9ffaQiQPCSsyK1Bb.GONlyF6i', 'Alexandria', 'banha2', 'banha', '01014898892', 'mmnwat6@gmail.com', 0, 2, 1, '19:58:00', '21:58:00', 'dsdfsdfdfsfd', '2024-05-23 13:19:30', '2024-03-25 18:58:47', 'Sunday to Friday', 44, 44, 0, NULL, NULL),
(55, 'clinic5', '$2y$10$tRuj.dI8B2EQJmEj1m2XyeFLe/6.H5.zNw.bg1iVhSFKtUVjIaDPu', 'dfdf', 'fdd', 'cairo', '01014898892', 'mmnwat611@gmail.com', 0, 3, 1, '07:00:00', '20:01:00', 'dsdfsdfdfsfd', '2024-05-22 21:24:42', '2024-03-25 19:01:40', 'Sunday to Saturday', 200, 21, 0, 30.621390475200904, 31.324002275390608),
(56, 'clinic6', '$2y$10$oRauYXRRSsitAd9TvaASnOI5xjfNpZKu48dFupmwtyxhUNBrTD02.', 'dasfd', 'dfdfdf', 'fdfdf', '01014898892', 'mmnwat444@gamil.com', 0, 2, 0, '19:09:00', '21:10:00', 'dfdfs dsffd', '2024-03-26 12:10:18', '2024-03-26 12:10:18', 'Wednesday to Saturday', 222, 11, 0, NULL, NULL),
(57, 'clinic7', '$2y$10$sJqKK5y9BqLUw5kW2inLSO22sqd9c/rHKzoIs7AGXWArijPUC26uy', 'dasfd', 'banha', 'banha', '01238367674237', 'mmnwat6666@gmail.com', 0, 20, 1, '20:49:00', '21:50:00', 'asdffsdfa', '2024-03-27 12:52:23', '2024-03-27 12:50:21', 'Thursday to Sunday', 22, 2, 0, NULL, NULL),
(58, 'clinic8', '$2y$10$tAqwGrWW5blt0hTMcmNfneZlzXe5EggYom6UuKhKrUYlNYQJeLley', 'jhhjk', 'sajask', 'jkljskla', '434334', 'mmnwat444@gamil.com', 0, 30, 0, '21:18:00', '23:18:00', 'fssdsdf', '2024-03-27 13:18:36', '2024-03-27 13:18:36', 'Wednesday to Saturday', 124, 33, 0, NULL, NULL),
(59, 'clinic9', '$2y$10$UdjVq2NZ/NQ.Pu5uvhnglOb7iLHz61tf0EWnxGqCOS1Q9IxFBA6N.', 'fgdfgfdfgg', 'al gaish', 'banha', '1014898891', 'mmnf@gma.com', 0, 2, 1, '14:56:00', '16:56:00', 'fgdfg fbdfgdgfdfg ggfggg', '2024-04-06 20:08:53', '2024-03-29 20:57:02', 'Monday to Thursday', 66, 11, 0, 24.0923332, 32.8795066),
(60, 'nader', '$2y$10$lVVxj.KWloIMN8gd3P98TOZLrO.JDqQrVfWo.xBxnZynFuH6V5.5q', 'null', 'shobra', 'Giza', '123344324234', 'mmnwat1111@gmail.com', 0, 20, 1, '22:46:00', '23:46:00', 'ffretrtr', '2024-05-01 17:57:46', '2024-05-01 17:47:37', 'Sunday to Saturday', 11, 1, 0, NULL, NULL),
(61, 'yousef ahmed', '$2y$10$Iqt16YxJlzMWPdMjoid9yukyFp5Cn9XgKYPFGU8XWcWW8z08Ay4p6', 'dsccds', 'banha', 'Alexandria', '01014898892', 'mmnwat666@gmail.com', 0, 2, 0, '22:36:00', '23:36:00', 'dweewewededwe', '2024-05-22 19:39:10', '2024-05-22 19:39:10', 'Sunday to Monday', 3, 2, 0, 0, 31.289756774902344),
(62, 'yousef ahmed3223', '$2y$10$2Q3FF3k/0.O8C0Vz67JjqOXwzwyU0Mp7vpAeXTw2ENbUe4s.s.FyS', 'banha', 'banha', 'Alexandria', '01014898892', 'mmnwat666@gmail.com', 0, 2, 0, '12:41:00', '14:41:00', 'dsdfsdfdfsfd', '2024-05-22 19:42:03', '2024-05-22 19:42:03', 'Sunday to Monday', 21, 1, 0, 31.081423965723, 31.381423965723),
(63, 'yousef ahmed3r223', '$2y$10$UgN4ddkvLXWRXUkrzW5S0OkCSYFkZv9GZomAK8NOP70CpGtulFESW', 'banha', 'banha', 'Alexandria', '01014898892', 'mmnwat666@gmail.com', 0, 2, 0, '22:46:00', '23:46:00', 'dsdfsdfdfsfd', '2024-05-22 19:46:46', '2024-05-22 19:46:46', 'Sunday to Monday', 22, 1, 0, 31.003026438867, 31.364257828027),
(64, 'clinic11', '$2y$10$wHeZHyutqWhfiEJZ57E4wuae6ON/mOI36UU31tChoXVJQvTFm6ezi', 'asdasdasd', 'banha', 'Alexandria', '01014898892', 'mmnwat61111@gmail.com', 0, 2, 1, '00:09:00', '03:09:00', 'ddee', '2024-05-23 08:13:22', '2024-05-23 08:10:26', 'Sunday to Monday', 22, 11, 0, 30.59409, 31.289615);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `phone` text DEFAULT NULL,
  `clinic_id` int(11) NOT NULL,
  `creditcardnumber` text NOT NULL,
  `qualification` text DEFAULT NULL,
  `b_no` text DEFAULT NULL,
  `street` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `ccv` bigint(20) NOT NULL DEFAULT 444,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `image` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `numofrating` int(11) NOT NULL DEFAULT 0,
  `rating` int(11) NOT NULL DEFAULT 0,
  `numofpatients` int(11) NOT NULL DEFAULT 0,
  `cardtype` text NOT NULL,
  `profits` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `username`, `password`, `phone`, `clinic_id`, `creditcardnumber`, `qualification`, `b_no`, `street`, `city`, `ccv`, `updated_at`, `created_at`, `image`, `email`, `numofrating`, `rating`, `numofpatients`, `cardtype`, `profits`) VALUES
(6, 'Maudie', 'mjakel5', '$2a$04$AK767cDnNdRiMyWbxCeUEOPP/ztGghv1VhNv..WO.mZ2rHEgcqQ4a', '6749667482', 6, '5457005073022671', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\r\n\r\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 'Cela', '18th Floor', 'Maxu', 444, NULL, '2024-03-20 11:51:47', NULL, 'mgaish5@liveinternet.ru', 10, 30, 10, '', 0),
(10, 'Constancia', 'cgonzalo9', '$2a$04$tk441/sC0eaexjKwFXHL6e6jOe7hVSiaN3bQBVYbk4c9f1Y.B4mq6', '2101593318', 10, '3575189607509619', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 'Farkhah', 'Suite 80', 'Kukur', 444, NULL, '2024-03-20 11:51:48', NULL, 'chullock9@intel.com', 10, 30, 10, '', 0),
(11, 'Sunshine', 'santilla', '$2a$04$YYN2FIlAHABOm8LmSGOUQugCmtcobrVwSa9bYFSLGnB04p9/Tbhgq', '4611072777', 11, '4936133405777616691', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\r\n\r\nSed ante. Vivamus tortor. Duis mattis egestas metus.\r\n\r\nAenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 'Ayang-ni', 'Suite 64', 'Wŏnsan', 444, NULL, '2024-03-20 11:51:48', NULL, 'sayletta@surveymonkey.com', 12, 51, 9, '', 0),
(12, 'Jayne', 'joakenfordb', '$2a$04$pmtT7UUDbCoNdBNOiUOVL.HZm3cgPR9T0CWCzInvXKC4p7q3qXF3e', '2586618171', 12, '5549979687953085', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r\n\r\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 'Bethal', 'Suite 37', 'Xiazhai', 444, NULL, '2024-03-20 11:51:48', NULL, 'jseidb@github.com', 11, 31, 10, '', 0),
(13, 'Corella', 'cmetschkec', '$2a$04$jk7tbCN3iFd1lbyu1z.rrevlSQSJ1Az1rZpCMKcrpAd0RSaT/ggJG', '8558895593', 13, '3567997610444966', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r\n\r\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\n\r\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 'Silao', 'Apt 569', 'Dongjiahe', 444, NULL, '2024-03-20 11:51:48', NULL, 'cfreestonec@imgur.com', 10, 30, 10, '', 0),
(14, 'Sondra', 'sgonzalod', '$2a$04$k/1c8G2tO1.oM5bgcmMleeR8zHGSiH3ffe88zn6/b5Ge1LlYEDdzm', '6295211466', 14, '372301311977161', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r\n\r\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r\n\r\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 'Laikit, Laikit II (Dimembe)', 'PO Box 73959', 'Beicang', 444, NULL, '2024-03-20 11:51:48', NULL, 'sshelveyd@wikimedia.org', 11, 35, 10, '', 0),
(15, 'Martha', 'mveldee', '$2a$04$DOsoWnawhCqkOQ8z4ktwce8CyPAvYA5eCt2eJnLllFqWTmo1x69VG', '6807553704', 15, '3542590755333126', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 'Buang', 'Room 606', 'Linao', 444, NULL, '2024-03-20 11:51:48', NULL, 'mbrainsbye@wufoo.com', 10, 30, 10, '', 0),
(16, 'Webb', 'wabrahamf', '$2a$04$jAsCAa1Ku/DQIenkvqdzwOl1gvTSrBn46VMdCTsRQQH49Q/l07diW', '8919874966', 16, '3568319106586995', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r\n\r\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\r\n\r\nSuspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 'Karabanovo', '4th Floor', 'Tateyama', 444, NULL, '2024-03-20 11:51:48', NULL, 'wstrongef@artisteer.com', 10, 30, 10, '', 0),
(17, 'Joye', 'jtomischg', '$2a$04$LRX91CjJM4V721ZV5/PIvuqtB2H.n.YAJSWDftLPqTmfI.fjEEfJy', '3923082914', 17, '5258480444300844', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\r\n\r\nFusce consequat. Nulla nisl. Nunc nisl.\r\n\r\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 'Severo-Zadonsk', 'Apt 828', 'Badean', 444, NULL, '2024-03-20 11:51:48', NULL, 'jsibbertg@sphinn.com', 10, 30, 10, '', 0),
(18, 'Madelena', 'msandallh', '$2a$04$7i0ohmY.BLl1sOZmdm6X0.iCTOsgarIcEgQaH6d5x4fZKRYa8wWUS', '9208151884', 18, '3564817417107587', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 'Toledo', 'Suite 10', 'Jishan', 444, NULL, '2024-03-20 11:51:48', NULL, 'mmowlesh@buzzfeed.com', 10, 30, 10, '', 0),
(19, 'Corny', 'cjamrowiczi', '$2a$04$BHtxeqoxtrL2RwKLvhDQJ.YULoIcg2fg2RT399MjO6KC4vMy2Ld32', '4678822078', 19, '3576112460034714', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 'Severnyy', 'Room 973', 'Mbaïki', 444, NULL, '2024-03-20 11:51:48', NULL, 'ccrichmeri@github.io', 10, 30, 10, '', 0),
(20, 'Emilie', 'ehalej', '$2a$04$Pf0bSE9reUVUtkRtpRZrTOqE27RoRfQzse6wadT4xECW/Z7qTuLBu', '9501198954', 20, '5610146658682085', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 'Paramaribo', 'PO Box 71291', 'Ashbourne', 444, NULL, '2024-03-20 11:51:48', NULL, 'egerckenj@cloudflare.com', 10, 30, 10, '', 0),
(21, 'Brantley', 'bdurkerk', '$2a$04$YdQCxcCgagLi7T0TIGYTFew14I6YntrAdABtkaZ89Cj1SbLHW4DWG', '9132028691', 21, '3566131214530241', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r\n\r\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 'Cibinong', 'Suite 86', 'Aramayuan', 444, NULL, '2024-03-20 11:51:48', NULL, 'bpiddlek@cocolog-nifty.com', 10, 30, 10, '', 0),
(22, 'Gram', 'gloxlyl', '$2a$04$ZtRGyDmI8ScIdOyKAnOE4.bqr8eEPDBHIrdZ0TBa3ncmfaHMjMgSi', '9583280675', 22, '6378020992767995', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\r\n\r\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 'Daya', 'Suite 50', 'Casal', 444, NULL, '2024-03-20 11:51:48', NULL, 'gbeckmannl@fema.gov', 10, 30, 10, '', 0),
(23, 'Abbott', 'amaylerm', '$2a$04$gu09QvqENAMW/7sDyMDbl.7r3Yzx0SzeD/0JrzS0LQyVM6929Y6We', '5447763896', 23, '3585939302960279', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 'Basqal', 'Room 49', 'Malesína', 444, NULL, '2024-03-20 11:51:48', NULL, 'aminoguem@arstechnica.com', 10, 30, 10, '', 0),
(24, 'Clara', 'cbiestyn', '$2a$04$7yxLHgUIKG1mY9sm3y85ju3bNDKZDqf3nkrrzi7iK4St0u5yfgoYa', '9154631823', 24, '3579802913855874', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\r\n\r\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 'Sidaohezi', 'PO Box 6522', 'Sedatigede', 444, NULL, '2024-03-20 11:51:48', NULL, 'cfoxhalln@virginia.edu', 10, 30, 10, '', 0),
(25, 'Fabio', 'fkendello', '$2a$04$QqbL9wOgnlYxHWC8MZhIzev84dA.5/3L9QyzyLzFIP5Q61/zAD55a', '9529489408', 25, '6771144548532227159', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\r\n\r\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'Rennes', 'Room 767', 'Draginje', 444, NULL, '2024-03-20 11:51:48', NULL, 'fdashpero@amazon.com', 13, 58, 10, '', 0),
(26, 'Zoe', 'zonionsp', '$2a$04$LBOjhrEkdUKZnmnwCebJh.LdzMvw2B9ttej70rfYhqXjF4zO8Y0..', '2832371035', 26, '3532253116032356', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 'Paquera', 'Room 1717', 'Kainan', 444, NULL, '2024-03-20 11:51:48', NULL, 'zbradwellp@soup.io', 11, 44, 10, '', 0),
(27, 'Kristyn', 'kgentnerq', '$2a$04$nASlNkDULGXgGptLw.4W6OZjLZF4JJZ8k2t1Cavh2Z//RoMj0rywO', '3354939663', 27, '3555134806092607', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\r\n\r\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 'Nakanojōmachi', 'PO Box 60984', 'Biaoshan', 444, NULL, '2024-03-20 11:51:48', NULL, 'kclaussenq@cam.ac.uk', 10, 30, 10, '', 0),
(28, 'Heath', 'hkelkr', '$2a$04$nBF2hYzqJMzD8Kwfrdu5e.fL4QDFtrhEMdusAmg0nOgznek.xMcxi', '3061855286', 28, '3579423854458642', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r\n\r\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 'Chlói', 'PO Box 24800', 'Ntonggu', 444, NULL, '2024-03-20 11:51:48', NULL, 'hwinnyr@godaddy.com', 10, 30, 10, '', 0),
(29, 'Leo', 'lfennas', '$2a$04$pzLA42dWkrNhiV8kxkaEgOOs5bfr2CCGuZFy3rRDhrpkZkBeWo.6q', '7901121038', 29, '4917897856612174', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 'El Marañón', '17th Floor', 'Zibu', 444, NULL, '2024-03-20 11:51:48', NULL, 'lnuddes@ycombinator.com', 10, 30, 10, '', 0),
(30, 'Lyndsie', 'lcuellt', '$2a$04$W2Qhm.J9GBEi13C/MDqw2eIPQ/48JhoAL7HRs5BqTy9w7zMqF4Fq.', '2066421227', 30, '3530633812755990', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\r\n\r\nInteger ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\r\n\r\nNam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 'Mama', 'PO Box 83952', 'Linxi', 444, NULL, '2024-03-20 11:51:48', NULL, 'lpatriet@dot.gov', 10, 30, 10, '', 0),
(31, 'Rheta', 'rshekleu', '$2a$04$FIhyZPTRWj0zGNhCw75d1O1qzMJjECHAzdbdWlHI1cm09BE8jn8N.', '2185050657', 31, '3545399155535398', 'In congue. Etiam justo. Etiam pretium iaculis justo.\r\n\r\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\r\n\r\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'Hanggan', 'PO Box 41359', 'Hitachi', 444, NULL, '2024-03-20 11:51:48', NULL, 'rarthursu@cargocollective.com', 10, 30, 10, '', 0),
(32, 'Abeu', 'apiaggiav', '$2a$04$9.7MeVWeI3SKqJOYyIJo1ehGTNZ1WWQIXMNxpICX.7XRopYbKRuk.', '2031655268', 32, '4913597197461026', 'In congue. Etiam justo. Etiam pretium iaculis justo.\r\n\r\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\r\n\r\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'Shilovo', 'PO Box 45605', 'Il’ichëvo', 444, NULL, '2024-03-20 11:51:48', NULL, 'arentcomev@usgs.gov', 10, 30, 10, '', 0),
(33, 'Marcelle', 'mcammidgew', '$2a$04$A9UFSl4xUK8eIowwgN1Ckub4awMB2qGrM9SNJEhNgW4jJlZ1Ux2f.', '4325639278', 33, '6761560625103857709', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.\r\n\r\nAenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\r\n\r\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 'Uruguaiana', 'Suite 87', 'San Juan de Colón', 444, NULL, '2024-03-20 11:51:48', NULL, 'mtangyew@samsung.com', 10, 30, 10, '', 0),
(34, 'Lauree', 'lpritchittx', '$2a$04$znLq2q8XFjuATAcqbfuoUuunco0R5rcYBT10yARSiOQ4HkOhPvPcm', '7577237275', 34, '5168346859556577', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 'Andrushivka', '16th Floor', 'Hushaat', 444, NULL, '2024-03-20 11:51:48', NULL, 'lholmex@friendfeed.com', 10, 30, 10, '', 0),
(35, 'Terese', 'tdelahayey', '$2a$04$baTT4cIWFTApbl3E.A8xc.MAOO3wicpg6eOc0wQ0b6RZJaFi4NmP.', '1553769942', 35, '3565169848574749', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\r\n\r\nProin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 'Zepita', '11th Floor', 'Idi Iroko', 444, NULL, '2024-03-20 11:51:48', NULL, 'tportwainy@nymag.com', 10, 30, 10, '', 0),
(36, 'Vernon', 'vanthillz', '$2a$04$7DBRCvuZZMTNbUtRyeGgEOAMj69RTqN7RAgJ19lqfBAazFuTrAlhG', '2681051330', 36, '5602240722444680125', 'In congue. Etiam justo. Etiam pretium iaculis justo.', 'Västerås', '1st Floor', 'Žabčice', 444, NULL, '2024-03-20 11:51:48', NULL, 'vpenfoldz@upenn.edu', 10, 30, 10, '', 0),
(37, 'Parry', 'pthorsby10', '$2a$04$3qtVFgfYjcHjdwXITpccm.HNOqetBSWJsDdMpL5Ws.z6Eq/NxcJUm', '4532940936', 37, '3586081737584231', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r\n\r\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'Åkersberga', 'Apt 491', 'Eci', 444, NULL, '2024-03-20 11:51:48', NULL, 'plello10@time.com', 10, 30, 10, '', 0),
(38, 'Inesita', 'isanbroke11', '$2a$04$TZT4wHJw30Mo1kneUh3ZveCEFdSzqVYpDbrgvG/dsqDRgTkR9S1nS', '7895357964', 38, '3577634843017172', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 'Belmopan', 'Suite 18', 'Káto Nevrokópi', 444, NULL, '2024-03-20 11:51:48', NULL, 'imcpartlin11@yale.edu', 10, 30, 10, '', 0),
(39, 'Lil', 'lrawlinson12', '$2a$04$Jr4lBPYRIxf1z.k3QUqJruJoI2tQElzCMwpsk61EXuPt70HJEOiSS', '8385894269', 39, '201725073894718', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.\r\n\r\nProin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 'Suchedniów', 'Room 419', 'Gorelovo', 444, NULL, '2024-03-20 11:51:48', NULL, 'ldunkersley12@friendfeed.com', 10, 30, 10, '', 0),
(40, 'Siward', 'sassandri13', '$2a$04$pN70U9kuq2asH55prGJvn.r69XEvNtC15ETiRrNpeDWGMyIRMK/D2', '8937776514', 40, '5100137874422932', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 'Kadukandel', 'Room 1593', 'Sainte-Agathe-des-Monts', 444, NULL, '2024-03-20 11:51:48', NULL, 'smcewan13@google.ca', 10, 30, 10, '', 0),
(41, 'Marilin', 'mbrame14', '$2a$04$tidzwvOve6Si8LS9skZhgu/eAq3CP6zontggYhwdUeNi/g12hT6t.', '5137327545', 41, '3534976615159829', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', 'Tai’an', 'Suite 14', 'Seara', 444, NULL, '2024-03-20 11:51:48', NULL, 'mmurgatroyd14@webs.com', 10, 30, 10, '', 0),
(42, 'Vida', 'voshea15', '$2a$04$.Wt9TtAYzCXIrw1iHyYZb.xA0LHn/9QbCdTnGzei5ZRDAHK7mkO3y', '9155162886', 42, '56022498966129472', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\r\n\r\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 'Tongxing', 'Apt 1190', 'Shkodër', 444, NULL, '2024-03-20 11:51:48', NULL, 'vtregonna15@de.vu', 10, 30, 10, '', 0),
(43, 'Emmi', 'egalliver16', '$2a$04$CwP/R7qVuTA9S80FhKhQWeyxeM.9/4OA/tczjRXnqZrGnJdMEAhNW', '4138597448', 43, '4911591331914885', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Kuncen', '2nd Floor', 'Badovinci', 444, NULL, '2024-03-20 11:51:48', NULL, 'egoodbarr16@usda.gov', 10, 30, 10, '', 0),
(44, 'Robinetta', 'rasquith17', '$2a$04$hYarrX9ZQaBtLcXqpBL5HOL5pld27kcXWsNjcAELtMvIKPhXuYe.q', '4985002258', 44, '56101380553422789', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 'San Jose Village', 'PO Box 32532', 'Ciela Lebak', 444, NULL, '2024-03-20 11:51:48', NULL, 'rneedham17@seesaa.net', 10, 30, 10, '', 0),
(45, 'Blanca', 'bcleeve18', '$2a$04$igkPjQBOvOLMC09//x19AeH0il.3YK1wL/fIJ3g4ghQdEPvpe5VwW', '6027500000', 45, '6388589971320263', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r\n\r\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 'Kasturi', 'Room 413', 'Skaramangás', 444, NULL, '2024-03-20 11:51:48', NULL, 'bcannell18@cbc.ca', 10, 30, 10, '', 0),
(46, 'Alyss', 'aburras19', '$2a$04$Q5joaNY3RZ4yWgP31iXmgOrfisoa.WwHEUKmhdZUbeUd1GNxbaacy', '4651576338', 46, '4508614222655398', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\r\n\r\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r\n\r\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 'Fengsheng', 'Suite 23', 'Niños Heroes', 444, NULL, '2024-03-20 11:51:48', NULL, 'amariyushkin19@ftc.gov', 10, 30, 10, '', 0),
(47, 'Della', 'daudus1a', '$2a$04$gk0Ya47BWq3aGGAhUSs.6.FE9AVQVRoKIzMklZ2CVDd17ZT7ABNZi', '2588712241', 47, '3585988745192651', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 'Corinto', '8th Floor', 'Puttalam', 444, NULL, '2024-03-20 11:51:48', NULL, 'dkobiela1a@imgur.com', 10, 30, 10, '', 0),
(48, 'Raimondo', 'rwindram1b', '$2a$04$dmh4rrvDfXD6p.HFSUt5cepxGK/mrzmy1zxRLDprF3bhZeGiu6HCG', '9219871825', 48, '3564149425787543', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r\n\r\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 'Soriano', 'Suite 87', 'Tasböget', 444, NULL, '2024-03-20 11:51:48', NULL, 'rkusick1b@marriott.com', 10, 30, 10, '', 0),
(49, 'Teodorico', 'trediers1c', '$2a$04$rUysSVGzI0xXnLAXRwT2pONGYTVHwtAeD8qmQ1JlTO93BawOuGWTG', '9908469789', 49, '5466243233947136', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r\n\r\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', '‘Anātā', '20th Floor', 'Lueng Putu', 444, NULL, '2024-03-20 11:51:48', NULL, 'tmaevela1c@telegraph.co.uk', 10, 30, 10, '', 0),
(50, 'Domingo', 'dshipley1d', '$2a$04$6oVCOxg5qrH1gnqmx0M6v.TGDn2SvqF32cposcUcP0LpfFdVw80eG', '1871966430', 50, '630431365157945007', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 'Dalkey', 'Room 843', 'Pare', 444, NULL, '2024-03-20 11:51:48', NULL, 'dsarfas1d@abc.net.au', 11, 35, 10, '', 0),
(52, NULL, 'doc1', '$2y$10$modHCLMZVcTplIOqOAF8ce8cMoKXFbwGcXVQ1l4hwuAOeBJPpytf.', NULL, 51, '5602213195505939', NULL, NULL, NULL, NULL, 222, '2024-04-07 13:26:09', '2024-03-25 14:32:02', NULL, 'yo@gmail.com', 2, 5, 0, 'mastercard', 0),
(53, NULL, 'doc2', '$2y$10$vqNu7leWukouzH4bYz9Jge2tAO23uaGxUYJugQmzas1H0wOdfKcBW', NULL, 52, '5602213115505979', NULL, NULL, NULL, NULL, 222, '2024-03-25 18:53:45', '2024-03-25 18:53:45', NULL, NULL, 0, 0, 0, 'visa', 0),
(54, 'samy', 'doc4', '$2y$10$VxnCXPn/zBz2EJsPbaMKv.jSdMv2I0N./C3kCPfDK7H4ccjHYwTIO', '221221e13', 54, '5632213195505979', 'dfasdsd asffd', 'sfadf', 'dfdfsd', 'ddfdf', 222, '2024-03-29 10:21:59', '2024-03-25 19:00:07', NULL, NULL, 0, 0, 0, 'visa', 2255),
(55, 'weal', 'doc5', '$2y$10$qN/Zl1nscQphyjWI3pdK5OKolQT1TPWtHXflGNz5LvD5Yv7LiHOou', '34342432433', 55, '5602213195505973', 'ssdasdv  fffksd;\' dfjdksfjlsdfjjlasd', 'wqweqwe', NULL, 'asdsdsadds', 229, '2024-05-18 17:00:32', '2024-03-25 19:03:15', '1714832097.jpg', 'hmmnwat444@gamil.com', 6, 29, 0, 'mastercard', 16395),
(56, NULL, 'doc7', '$2y$10$ITKFC5bxWFq1gYnn2D0I8./TBG9PqComMM0A9FRFacIIYLr./L/oG', NULL, 57, '1234567890321465', NULL, NULL, NULL, NULL, 222, '2024-03-27 12:52:23', '2024-03-27 12:52:23', NULL, NULL, 1, 1, 0, 'visa', 0),
(57, 'weal', 'doc9', '$2y$10$qf.3wIoq1tiFfPgk0lutauMpujPJWoDay2DpjTuvXAuHXcH9A4z7O', '1002228877338', 59, '3576112460034711', 'hghhg ghghhhg', 'hgfgh', 'ghgh', 'hhgghhfhfhf', 111, '2024-04-06 20:08:18', '2024-03-29 20:59:00', '1711746007.jpg', 'mmnwat6@gmsail.com', 10, 49, 0, 'mastercard', 0),
(58, NULL, 'nader', '$2y$10$VlENu/uGVmA8BrOlBN6sge3RRe62yBuvkn1LlEyg/OyblOS9Cy6g6', NULL, 60, '1234567890123411', NULL, NULL, NULL, NULL, 111, '2024-05-01 17:48:26', '2024-05-01 17:48:26', NULL, NULL, 0, 0, 0, 'mastercard', 0),
(59, NULL, 'doc11', '$2y$10$ph.LgXjqEdEJczZlECWSiufydWHVnx2kdxVGk9WgK9YGEHTqj1362', NULL, 64, '2283773946462467', NULL, NULL, NULL, NULL, 222, '2024-05-23 08:11:28', '2024-05-23 08:11:28', NULL, NULL, 0, 0, 0, 'mastercard', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `patient_id`, `image`) VALUES
(1, 1, 'ddfdf');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL COMMENT 'cli means the cli should receive it , pat means patient should recive it',
  `message` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `seen`, `type`, `message`, `color`, `patient_id`, `clinic_id`, `created_at`, `updated_at`) VALUES
(18, 0, 'pat', 'user deleted his appoiment with you  yousef ahmed for some reason', 'red', 7, 55, NULL, NULL),
(19, 0, 'cli', 'user deleted his appoiment with you  yousef ahmed for some reason', 'red', 55, 7, NULL, NULL),
(22, 0, 'cli', 'user deleted his appoiment with you  his name is yousef ahmed for some reason and his appoument  was in 2024-04-07', 'red', 7, 7, NULL, NULL),
(23, 0, 'cli', 'user make appoiment with you  his name is yousef ahmed  his appoument  is in 2024-04-23', 'red', 7, 7, NULL, NULL),
(27, 0, 'cli', 'user upfayed his rating to you to  3/5 after it was 5/5 his name is yousef ahmed', 'red', 7, 7, NULL, NULL),
(38, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-30', 'red', 1, 7, NULL, NULL),
(44, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, NULL, NULL),
(45, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, NULL, NULL),
(48, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-11', 'red', 1, 5, '2024-04-06', NULL),
(50, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-28', 'red', 1, 1, '2024-04-06', NULL),
(52, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-26', 'red', 1, 25, '2024-04-06', NULL),
(53, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-07', 'red', 1, 25, '2024-04-06', NULL),
(65, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-09', 'red', 1, 25, '2024-04-06', NULL),
(72, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-07', 'red', 1, 25, '2024-04-06', NULL),
(80, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, '2024-04-06', NULL),
(81, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-26', 'red', 1, 25, '2024-04-06', NULL),
(105, 0, 'cli', 'user updated his appoiment with you  his name is yousef  his appoument  is in 2024-04-11 00:00:00', 'red', 1, 59, '2024-04-08', NULL),
(108, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-30', 'red', 1, 7, '2024-04-08', NULL),
(109, 0, 'cli', 'user updated his rating to you to  4/5 after it was 5/5 his name is yousef', 'red', 1, 59, '2024-04-08', NULL),
(110, 0, 'cli', 'user updated his rating to you to  2/5 after it was 4/5 his name is yousef', 'red', 1, 59, '2024-04-08', NULL),
(111, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 7, 55, '2024-04-09', NULL),
(112, 0, 'pat', 'your appoimnet has been moved to the another day(2024-04-11) by  clinic5 for some reasontry to make other preservation', 'green', 8, 55, '2024-04-09', NULL),
(113, 0, 'pat', 'your appoimnet has been moved to the another day(2024-04-10) by  clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-09', NULL),
(114, 0, 'pat', 'your appoimnet has been moved to the another day(2024-04-11) by  clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-09', NULL),
(118, 0, 'cli', 'user updated his appoiment with you  his name is yousef  his appoument  is in 2024-04-18 00:00:00', 'red', 1, 59, '2024-04-09', NULL),
(119, 0, 'pat', 'your appoimnet has been deleted by clinic5 for some reasontry to make other preservation', 'green', 8, 55, '2024-04-09', NULL),
(120, 0, 'pat', 'your appoimnet has been deleted by clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-09', NULL),
(121, 0, 'pat', 'your appoimnet has been deleted by clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-09', NULL),
(123, 0, 'pat', 'your appoimnet has been deleted by clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-09', NULL),
(125, 0, 'pat', 'your appoimnet has been deleted by clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-09', NULL),
(128, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-23', 'red', 1, 25, '2024-04-09', NULL),
(129, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-25', 'red', 1, 25, '2024-04-09', NULL),
(130, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-22', 'red', 1, 25, '2024-04-09', NULL),
(131, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-10', 'red', 1, 25, '2024-04-09', NULL),
(132, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-10', 'red', 1, 25, '2024-04-09', NULL),
(133, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-23', 'red', 1, 25, '2024-04-09', NULL),
(134, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-11', 'red', 1, 25, '2024-04-09', NULL),
(135, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-26', 'red', 1, 25, '2024-04-09', NULL),
(136, 0, 'cli', 'user updated his appoiment with you  his name is yousef  his appoument  is in 2024-04-11 00:00:00', 'red', 1, 25, '2024-04-09', NULL),
(137, 0, 'cli', 'user updated his appoiment with you  his name is yousef  his appoument  is in 2024-04-11 00:00:00', 'red', 1, 25, '2024-04-09', NULL),
(138, 0, 'cli', 'user updated his appoiment with you  his name is yousef  his appoument  is in 2024-04-10 00:00:00', 'red', 1, 25, '2024-04-09', NULL),
(139, 0, 'cli', 'user updated his appoiment with you  his name is yousef  his appoument  is in 2024-04-10 00:00:00', 'red', 1, 25, '2024-04-09', NULL),
(140, 0, 'cli', 'user updated his appoiment with you  his name is yousef  his appoument  is in 2024-04-09 00:00:00', 'red', 1, 25, '2024-04-09', NULL),
(141, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-09', 'red', 1, 25, '2024-04-09', NULL),
(142, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-19', 'red', 1, 25, '2024-04-09', NULL),
(151, 0, 'pat', 'your appoimnet has been delleted  clinic5 for some reasontry to make other preservation', 'green', 0, 55, '2024-04-09', NULL),
(152, 0, 'pat', 'your appoimnet has been delleted  clinic5 for some reasontry to make other preservation', 'green', 0, 55, '2024-04-09', NULL),
(153, 0, 'pat', 'your appoimnet has been delleted  clinic5 for some reasontry to make other preservation', 'green', 0, 55, '2024-04-09', NULL),
(154, 0, 'pat', 'your appoimnet has been delleted  clinic5 for some reasontry to make other preservation', 'green', 0, 55, '2024-04-09', NULL),
(157, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, '2024-04-09', NULL),
(159, 0, 'cli', 'user updated his appoiment with you  his name is yousef  his appoument  is in 2024-04-25 00:00:00', 'red', 1, 25, '2024-04-10', NULL),
(160, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-29', 'red', 1, 7, '2024-04-10', NULL),
(161, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-30', 'red', 1, 7, '2024-04-10', NULL),
(162, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-28', 'red', 1, 7, '2024-04-10', NULL),
(163, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-23', 'red', 1, 7, '2024-04-10', NULL),
(164, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-30', 'red', 1, 7, '2024-04-10', NULL),
(165, 0, 'cli', 'user updated his appoiment with you  his name is yousef  his appoument  is in 2024-04-14 00:00:00', 'red', 1, 7, '2024-04-11', NULL),
(166, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-19', 'red', 1, 7, '2024-04-11', NULL),
(167, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-18', 'red', 1, 7, '2024-04-11', NULL),
(168, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-15', 'red', 1, 7, '2024-04-11', NULL),
(169, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-26', 'red', 1, 7, '2024-04-11', NULL),
(170, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-21', 'red', 1, 7, '2024-04-11', NULL),
(171, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-23', 'red', 1, 7, '2024-04-11', NULL),
(172, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 7, 55, '2024-04-12', NULL),
(173, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 8, 55, '2024-04-12', NULL),
(175, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 7, 55, '2024-04-12', NULL),
(176, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 8, 55, '2024-04-12', NULL),
(178, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 7, 55, '2024-04-12', NULL),
(179, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 8, 55, '2024-04-12', NULL),
(182, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-16 00:00:00', 'red', 7, 55, '2024-04-12', NULL),
(186, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-13 00:00:00', 'red', 7, 55, '2024-04-12', NULL),
(187, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-13 00:00:00', 'red', 8, 55, '2024-04-12', NULL),
(189, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 7, 55, '2024-04-12', NULL),
(190, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-16 00:00:00', 'red', 8, 55, '2024-04-12', NULL),
(192, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 7, 55, '2024-04-12', NULL),
(193, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-16 00:00:00', 'red', 8, 55, '2024-04-12', NULL),
(195, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 7, 55, '2024-04-12', NULL),
(196, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-16 00:00:00', 'red', 8, 55, '2024-04-12', NULL),
(201, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-14 00:00:00', 'red', 7, 55, '2024-04-12', NULL),
(202, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-14 00:00:00', 'red', 8, 55, '2024-04-12', NULL),
(204, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, '2024-04-12', NULL),
(205, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, '2024-04-12', NULL),
(206, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, '2024-04-12', NULL),
(207, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-24', 'red', 1, 7, '2024-04-14', NULL),
(208, 0, 'pat', 'your appoimnet has been deleted by clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-14', NULL),
(209, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 7, 55, '2024-04-14', NULL),
(210, 0, 'pat', 'your appoimnet has been moved to the another day(2024-04-16) by  clinic5 for some reasontry to make other preservation', 'green', 8, 55, '2024-04-14', NULL),
(211, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 7, 55, '2024-04-14', NULL),
(212, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-16 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(213, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-16 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(214, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-16 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(215, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(216, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-15 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(217, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-16 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(218, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-17 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(219, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-18 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(220, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-22 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(221, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-04-22 00:00:00', 'red', 7, 55, '2024-04-14', NULL),
(223, 0, 'cli', 'user updated his rating to you to  3/5 after it was 2/5 his name is yousef', 'red', 1, 59, '2024-04-14', NULL),
(224, 0, 'cli', 'user updated his rating to you to  5/5 after it was 3/5 his name is yousef', 'red', 1, 59, '2024-04-14', NULL),
(225, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-22', 'red', 1, 59, '2024-04-14', NULL),
(226, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-29', 'red', 1, 59, '2024-04-14', NULL),
(231, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-30', 'red', 1, 7, '2024-04-14', NULL),
(233, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-22', 'red', 1, 7, '2024-04-15', NULL),
(234, 0, 'cli', 'user deleted his appoiment with you  his name is yousef for some reason and his appoument  was in 2024-04-30', 'red', 1, 7, '2024-04-15', NULL),
(235, 0, 'cli', 'user make appoiment with you  his name is banha  his appoument  is in 2024-04-23', 'red', 24, 7, '2024-04-16', NULL),
(236, 0, 'cli', 'user updated his rating to you to  3/5 after it was 5/5 his name is yousef', 'red', 1, 59, '2024-04-16', NULL),
(237, 0, 'cli', 'user updated his rating to you to  5/5 after it was 3/5 his name is yousef', 'red', 1, 59, '2024-04-16', NULL),
(238, 0, 'cli', 'user updated his rating to you to  3/5 after it was 5/5 his name is yousef', 'red', 1, 59, '2024-04-16', NULL),
(239, 0, 'cli', 'user deleted his appoiment with you  his name is banha for some reason and his appoument  was in 2024-04-23', 'red', 24, 7, '2024-04-17', NULL),
(243, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-30', 'red', 1, 7, '2024-04-17', NULL),
(246, 0, 'pat', 'your appoimnet has been delleted  clinic5 for some reasontry to make other preservation', 'green', 0, 55, '2024-04-17', NULL),
(247, 0, 'pat', 'your appoimnet has been moved to the another day(2024-04-19) by  clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-18', NULL),
(248, 0, 'pat', 'your appoimnet has been moved to the another day(2024-04-18) by  clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-18', NULL),
(249, 0, 'pat', 'your appoimnet has been moved to the another day(2024-04-19) by  clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-18', NULL),
(250, 0, 'pat', 'your appoimnet has been moved to the another day(2024-04-18) by  clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-18', NULL),
(262, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 7, 55, '2024-04-18', NULL),
(263, 0, 'cli', 'user make appoiment with you  his name is yousef ahmed  his appoument  is in 2024-04-22', 'red', 30, 25, '2024-04-18', NULL),
(264, 0, 'cli', 'user make appoiment with you  his name is yousef ahmed  his appoument  is in 2024-04-30', 'red', 30, 25, '2024-04-18', NULL),
(265, 0, 'cli', 'user make appoiment with you  his name is yousef ahmed  his appoument  is in 2024-04-29', 'red', 30, 25, '2024-04-18', NULL),
(266, 0, 'cli', 'user make appoiment with you  his name is 2wwww  his appoument  is in 2024-04-29', 'red', 31, 7, '2024-04-18', NULL),
(267, 0, 'cli', 'user updated his rating to you to  5/5 after it was 3/5 his name is yousef', 'red', 1, 59, '2024-04-18', NULL),
(268, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-30', 'red', 1, 59, '2024-04-18', NULL),
(269, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-22', 'red', 1, 59, '2024-04-18', NULL),
(270, 0, 'cli', 'user make appoiment with you  his name is yousef  his appoument  is in 2024-04-18', 'red', 1, 59, '2024-04-18', NULL),
(273, 0, 'pat', 'your appoimnet has been deleted by clinic5 for some reasontry to make other preservation', 'green', 7, 55, '2024-04-19', NULL),
(274, 0, 'cli', 'user make appoiment with you  his name is sdcscd cc  his appoument  is in 2024-04-30', 'red', 33, 7, '2024-04-25', NULL),
(276, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-22', 'red', 1, 59, '2024-05-01', NULL),
(278, 0, '1', 'fdfdsfsdf', 'sdf', 1, 55, '2024-05-02', NULL),
(279, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 6, 55, '2024-05-04', NULL),
(280, 0, 'pat', 'your appoimnet has been moved to the another day(2024-05-05) by  clinic5 for some reasontry to make other preservation', 'green', 0, 55, '2024-05-04', NULL),
(281, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-05-05 00:00:00', 'red', 6, 55, '2024-05-04', NULL),
(284, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-05-05 00:00:00', 'red', 0, 55, '2024-05-04', NULL),
(286, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, '2024-05-04', NULL),
(287, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, '2024-05-04', NULL),
(288, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-28', 'red', 1, 25, '2024-05-09', NULL),
(289, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-27', 'red', 1, 25, '2024-05-09', NULL),
(290, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-19', 'red', 1, 25, '2024-05-09', NULL),
(291, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-31', 'red', 1, 25, '2024-05-09', NULL),
(292, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-30', 'red', 1, 25, '2024-05-09', NULL),
(293, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-10', 'red', 1, 25, '2024-05-09', NULL),
(294, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-06-13', 'red', 1, 25, '2024-05-09', NULL),
(295, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-26', 'red', 1, 25, '2024-05-09', NULL),
(296, 0, 'cli', 'user updated his appoiment with you  his name is magad  his appoument  is in 2024-05-10 00:00:00', 'red', 1, 25, '2024-05-09', NULL),
(297, 0, 'cli', 'user updated his appoiment with you  his name is magad  his appoument  is in 2024-05-26 00:00:00', 'red', 1, 25, '2024-05-09', NULL),
(300, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 6, 55, '2024-05-09', NULL),
(301, 0, 'pat', 'your appoimnet has been delleted  clinic5 for some reasontry to make other preservation', 'green', 6, 55, '2024-05-09', NULL),
(303, 0, 'pat', 'your appoimnet has been deleted by clinic5 for some reasontry to make other preservation', 'green', 0, 55, '2024-05-09', NULL),
(312, 0, 'pat', 'your appoimnet has been moved to the another day(2024-05-20) by  clinic5 for some reasontry to make other preservation', 'green', 6, 55, '2024-05-17', NULL),
(314, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-05-18 00:00:00', 'red', 7, 55, '2024-05-17', NULL),
(316, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-19', 'red', 1, 11, '2024-05-17', NULL),
(318, 0, 'pat', 'clinic it is name is clinic5 the doctor will not come today and your appoiment ahs been delayed for another date  2024-05-19 00:00:00', 'red', 7, 55, '2024-05-18', NULL),
(320, 0, 'pat', 'your appoimnet has been moved to the end of the queue of today sechedile because you were late  clinic5', 'green', 0, 55, '2024-05-18', NULL),
(322, 0, 'pat', 'your appoimnet has been deleted by clinic5 for some reasontry to make other preservation', 'green', 0, 55, '2024-05-18', NULL),
(324, 0, 'cli', 'user updated his rating to you to  4/5 after it was 5/5 his name is magad', 'red', 1, 55, '2024-05-23', NULL),
(325, 0, 'cli', 'user make appoiment with you  his name is magad  his appoument  is in 2024-05-29', 'red', 1, 55, '2024-05-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `creditcardnumber` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `b_no` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `ccv` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `image` text NOT NULL DEFAULT 'x',
  `cardtype` text NOT NULL DEFAULT 'visa',
  `google_id` text DEFAULT NULL,
  `pending` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `username`, `password`, `email`, `creditcardnumber`, `phone`, `b_no`, `street`, `city`, `ccv`, `created_at`, `updated_at`, `image`, `cardtype`, `google_id`, `pending`) VALUES
(0, 'guest', 'guest', 'dasdf', 'null', 'null', 'null', 'null', 'null', 'null', 0, '2024-04-04 17:29:28', '2024-04-04 17:28:31', 'x', 'null', 'ddfdf', 0),
(1, 'magad', 'jo', '$2y$10$JUH8EiSaGezx2w.itJCneuJv6eCFdI.0XgUJ9pu2djfGEadgU6l0m', 'mmnw111e111at6@gmail.com', '1706076000559697', '01014898892', 'Alexandria', 'fdfgg1', 'banha', 222, '2024-03-19 15:37:56', '2024-05-09 16:14:22', '1712574601.jpg', 'mastercard', NULL, 0),
(6, 'yousef', 'jo2', '$2y$10$UlgvbclRJHUWIQr5MaokL.zdO4FxGcxGfQtpMDzsEJb7GgFrcu5q2', 'mmnwat6@gmail.com', '1706076000559692', '01014898892', 'Alexandria', 'fdfgg', 'banha', 111, '2024-03-20 14:17:45', '2024-04-10 21:18:45', '1710944265.jpg', 'mastercard', NULL, 0),
(7, 'kariam', 'jo3', '$2y$10$boQLBku7dRdHg/8cfjnJFO6a6wIpjccvh7tWBSzYPY3pNpN3hIdWm', 'yousefdgdfg008@gmail.com', '1706076000559691', '01014898892', 'Alexandria', 'fdfgg', 'banha', 222, '2024-03-21 15:11:58', '2024-04-07 13:06:43', '1711033918.jpg', 'mastercard', NULL, 0),
(8, 'mona', 'jo6666', '$2y$10$7kPLFfmJGGLNm0ojLrjgHOp7KE0nUPCd25BYyEOMmofgWAQkQWwMG', 'yousef20022008@gmail.com', '1706076000559611', '01013967386', 'masr', 'fdfgg', 'banha', 222, '2024-03-23 14:11:26', '2024-05-23 12:20:37', '1711203086.png', 'mastercard', NULL, 0),
(9, 'jo6', 'jo6', '$2y$10$9bzqZDWyK18LrPmU0dnYFeuZEI45os9WT7Jmo.hqNzDppaTs7YK3K', 'mmnwat444@gamil.com', '1234567890123456', '656567', 'askklasj', 'sajask', 'jkljskla', 333, '2024-03-26 21:18:01', '2024-03-26 21:18:01', '1711487880.jpg', 'visa', NULL, 0),
(24, 'salman', 'yousef salman', '104559966845436037984', 'mmnwat6@gmail.com', '9996076000559697', '01014898892', 'sdsdsd', 'banha', 'banha', 222, '2024-04-16 20:18:17', '2024-04-16 20:18:40', 'https://lh3.googleusercontent.com/a/ACg8ocL4yqKLS4YLMj4HQfBUBg8_-HY2P2xI5vdgfrC1lcjWMwqJhPlx=s96-c', 'visa', '104559966845436037984', 0),
(33, 'sdcscd cc', 'jo2121', '$2y$10$AR1bNzQ2rzxIyZjMWW9Vgu5HXlRq45AP5T82xPr1aMYmnLkp2WDz2', 'yousef20022008@gmail.com', NULL, '01014898892', 'Alexandria', 'dfgdfgdfggd', 'banha', NULL, '2024-04-25 14:56:18', '2024-04-27 08:52:07', '1714056978.png', 'visa', NULL, 0),
(35, 'nader osama', 'nader', '$2y$10$vfSblzBGLRz7oOaaBPsAbup0JlMqaGdb.ymOp9RlYoQnEEjVP9UeW', 'yousef20022008@gmail.com', NULL, '01014898892', 'banha', 'null', 'Qalyubia', NULL, '2024-05-01 17:41:36', '2024-05-01 17:41:36', '1714585295.png', 'visa', NULL, 0),
(36, 'weal', 'yousef ahmed', '108072698218985510283', 'yousef20022008@gmail.com', NULL, '01014898892', 'Qaulyobua', 'al gaish', 'banha', NULL, '2024-05-24 08:44:39', '2024-05-24 08:45:50', 'https://lh3.googleusercontent.com/a/ACg8ocKwuRa0bOQWFwkVQfA9Y5uapZR9hS3Eg8By27LdPpixcTe7Ew=s96-c', 'visa', '108072698218985510283', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `precraption`
--

CREATE TABLE `precraption` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `desc2` text NOT NULL,
  `notes` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `precraption`
--

INSERT INTO `precraption` (`id`, `doctor_id`, `clinic_id`, `patient_id`, `desc2`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'dffdfd', 'fddffd', '2024-03-19 18:44:34', NULL),
(2, 55, 55, 1, 'fdfddf fddf', 'dfdfddf', '2024-03-26 15:46:57', '2024-03-26 15:46:57'),
(4, 55, 55, 8, 'fsdfsfdf', 'ddfsd', '2024-03-26 15:47:16', '2024-03-26 15:47:16'),
(6, 55, 55, 8, 'sdfsfd', 'fsdsddfs', '2024-03-26 16:48:19', '2024-03-26 16:48:19'),
(7, 55, 55, 1, 'dsfddf', 'dffddf', '2024-03-26 16:48:53', '2024-03-26 16:48:53'),
(8, 56, 56, 1, 'dsdsd', 'sdsssss', '2024-03-26 21:13:24', NULL),
(9, 55, 55, 1, 'vddgf', '1122', '2024-03-27 21:06:37', '2024-03-27 21:06:37'),
(10, 55, 55, 1, 'ghghgh', 'gfggffgt677676th', '2024-03-28 20:27:30', '2024-03-28 20:27:30'),
(11, 55, 55, 1, '323223', 'dffdsdfdfsdf', '2024-03-29 08:59:06', '2024-03-29 08:59:06'),
(12, 551, 551, 1, 'assdd dds', 'dssddsdsds', '2024-03-29 09:00:05', '2024-03-29 09:00:05'),
(13, 55, 55, 1, 'jhjhk', 'hkjh', '2024-03-31 20:11:56', '2024-03-31 20:11:56'),
(14, 55, 55, 1, 'kllkjkjkl', 'jhjkkhj', '2024-03-31 20:12:15', '2024-03-31 20:12:15'),
(15, 55, 55, 7, 'dfdf', 'dfddf', '2024-04-04 16:46:17', '2024-04-04 16:46:17'),
(16, 55, 55, 1, 'dfgfg', 'fdgfgdfg', '2024-04-04 16:46:56', '2024-04-04 16:46:56'),
(17, 55, 55, 8, 'fgdfgd', 'dfggfdf', '2024-04-04 16:47:02', '2024-04-04 16:47:02'),
(18, 55, 55, 1, 'gfdg', 'fgdgfdfg', '2024-04-04 17:19:04', '2024-04-04 17:19:04'),
(19, 55, 55, 7, 'kjkjkljk', 'khhjkkjh', '2024-04-04 17:19:36', '2024-04-04 17:19:36'),
(20, 55, 55, 8, 'jkjkl', 'kklk', '2024-04-04 17:22:30', '2024-04-04 17:22:30'),
(21, 55, 55, 1, 'hjkjhh', 'ljjkk', '2024-04-04 17:25:03', '2024-04-04 17:25:03'),
(22, 55, 55, 1, 'jl', 'kk', '2024-04-04 17:37:54', '2024-04-04 17:37:54'),
(23, 55, 55, 1, '1', '2', '2024-04-04 19:47:26', '2024-04-04 19:47:26'),
(24, 55, 55, 1, 'ddssadds', 'sdsasd', '2024-04-05 10:22:34', '2024-04-05 10:22:34'),
(25, 55, 55, 8, 'sadffd', 'asdffsda', '2024-04-05 10:42:16', '2024-04-05 10:42:16'),
(26, 55, 55, 8, 'dssd', 'sdssa', '2024-04-05 10:42:27', '2024-04-05 10:42:27'),
(27, 55, 55, 1, 'dfvdf', 'dfdvs', '2024-04-05 10:46:16', '2024-04-05 10:46:16'),
(28, 55, 55, 1, 'fdgdfg', 'gdfsdfg', '2024-04-05 10:52:42', '2024-04-05 10:52:42'),
(29, 55, 55, 1, 'dfgsdgsgd', 'fsgfgf', '2024-04-05 11:00:11', '2024-04-05 11:00:11'),
(30, 55, 55, 7, 'ddaasd', 'asdda', '2024-04-05 15:12:25', '2024-04-05 15:12:25'),
(31, 55, 55, 1, 'fdf', 'dfdf', '2024-04-05 15:28:56', '2024-04-05 15:28:56'),
(32, 55, 55, 7, 'rttrer', 'terweter', '2024-04-05 15:29:51', '2024-04-05 15:29:51'),
(33, 55, 55, 1, 'cdsd', 'sdccssc', '2024-04-06 15:51:01', '2024-04-06 15:51:01'),
(34, 55, 55, 1, 'dfsfs', 'fsdfsdasf', '2024-04-06 15:57:02', '2024-04-06 15:57:02'),
(35, 55, 55, 1, 'sdasdf', 'asdfsdfa', '2024-04-06 15:59:30', '2024-04-06 15:59:30'),
(36, 55, 55, 7, 'dasd', 'cdd', '2024-04-06 16:01:37', '2024-04-06 16:01:37'),
(37, 57, 59, 1, 'hkjh', 'hjjk', '2024-04-06 19:06:00', NULL),
(38, 55, 55, 6, 'sggfd', 'gsdfd', '2024-04-08 13:30:05', NULL),
(39, 55, 55, 1, 'sddsfsdfsdf', 'fdzfsd', '2024-04-09 14:17:49', '2024-04-09 14:17:49'),
(40, 55, 55, 7, 'vcbvcvc', 'cbvcvcbv', '2024-04-09 14:18:13', '2024-04-09 14:18:13'),
(41, 55, 55, 8, 'sdds', 'sdsdsd', '2024-04-09 14:18:54', '2024-04-09 14:18:54'),
(42, 55, 55, 7, 'hjkjh', 'jjlklkk', '2024-04-09 15:48:19', '2024-04-09 15:48:19'),
(43, 55, 55, 1, 'dssf', 'sdfsfss', '2024-04-12 15:45:19', '2024-04-12 15:45:19'),
(44, 55, 55, 1, 'daf', 'ddfdf', '2024-04-14 11:56:38', '2024-04-14 11:56:38'),
(45, 55, 55, 1, 'sdfsdf', 'ddsf', '2024-04-18 14:27:26', '2024-04-18 14:27:26'),
(46, 55, 55, 7, 'dsd', 'sdcsdcc', '2024-04-18 14:28:02', '2024-04-18 14:28:02'),
(47, 55, 55, 6, 'dfdfdf', 'dfdfdfdfdf', '2024-05-04 14:22:45', '2024-05-04 14:22:45'),
(48, 55, 55, 1, 'hhjkjkj', 'k', '2024-05-04 14:54:36', '2024-05-04 14:54:36'),
(49, 55, 55, 1, 'ddfdf', 'dfdfdfdf', '2024-05-04 16:37:00', '2024-05-04 16:37:00'),
(50, 55, 55, 6, 'dgssd', 'gdgddgfdgf', '2024-05-04 16:39:33', '2024-05-04 16:39:33'),
(51, 55, 55, 1, 'dfddaddf', 'sdffsdds', '2024-05-04 17:06:55', '2024-05-04 17:06:55'),
(52, 55, 55, 1, 'hffgfg', 'rtrtrtrtr', '2024-05-15 15:03:02', '2024-05-15 15:03:02'),
(53, 55, 55, 1, 'gfgdgdf', 'fggdg', '2024-05-15 15:04:30', '2024-05-15 15:04:30'),
(54, 55, 55, 1, 'thhtrrhtrth', 'htrhtrrtth', '2024-05-15 15:04:46', '2024-05-15 15:04:46'),
(55, 55, 55, 6, 'kdlsfhsbdf fjsdf;lsdfsdf', 'sdfsdfsdfsdf', '2024-05-15 19:19:50', '2024-05-15 19:19:50'),
(56, 55, 55, 7, 'fgddfgdfg', 'fgddfgfgbv', '2024-05-15 19:20:59', '2024-05-15 19:20:59'),
(57, 55, 55, 1, 'fsdsdfdfsdfs', 'vcxcvcxvcxvcxv 111', '2024-05-17 15:24:40', '2024-05-17 15:24:40'),
(58, 55, 55, 7, 'hi', 'm,nnm,', '2024-05-18 16:54:53', '2024-05-18 16:54:53'),
(59, 55, 55, 7, 'hjjhlhjhk', 'ljklj', '2024-05-18 17:00:31', '2024-05-18 17:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `prevdisease`
--

CREATE TABLE `prevdisease` (
  `id` int(11) NOT NULL,
  `disease` text NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `prevdisease`
--

INSERT INTO `prevdisease` (`id`, `disease`, `patient_id`, `created_at`, `updated_at`, `notes`) VALUES
(3, 'weddw', 8, '2024-03-26 22:14:40', NULL, NULL),
(94, 'kjkjkl', 9, '2024-03-26 23:19:44', NULL, NULL),
(95, 'kjkljlkjkl', 9, '2024-03-26 23:19:45', NULL, NULL),
(96, 'dcsdjdfkl', 9, '2024-03-26 23:19:45', NULL, NULL),
(97, 'dsldfsksdfl;df', 9, '2024-03-26 23:19:45', NULL, NULL),
(140, 'dia betes', 7, '2024-04-07 15:09:08', NULL, NULL),
(178, 'fffffff', 26, '2024-04-16 22:23:43', NULL, NULL),
(179, 'fffff', 26, '2024-04-16 22:23:43', NULL, NULL),
(181, 'jghgh', 24, '2024-04-17 12:30:06', NULL, NULL),
(216, 'diabetes', 1, '2024-05-21 23:32:46', NULL, NULL),
(217, 'kkljljk', 1, '2024-05-21 23:32:46', NULL, NULL),
(218, 'sasA', 1, '2024-05-21 23:32:46', NULL, NULL),
(219, 'WEAL', 1, '2024-05-21 23:32:46', NULL, NULL),
(220, 'diabetes', 1, '2024-05-21 23:32:46', NULL, NULL),
(221, 'sdsdsa', 1, '2024-05-21 23:32:46', NULL, NULL),
(222, '1111111111111111', 1, '2024-05-21 23:32:46', NULL, NULL),
(223, 'fgsdgsgsdf', 1, '2024-05-21 23:32:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prevdiseasenotes`
--

CREATE TABLE `prevdiseasenotes` (
  `id` int(11) NOT NULL,
  `notes` text DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `prevdiseasenotes`
--

INSERT INTO `prevdiseasenotes` (`id`, `notes`, `patient_id`, `created_at`, `updated_at`) VALUES
(10, 'masr', 9, '2024-03-26 23:19:45', NULL),
(20, NULL, 7, '2024-04-07 15:09:08', NULL),
(29, 'sdds ddsdsd', 26, '2024-04-16 22:23:43', NULL),
(31, NULL, 24, '2024-04-17 12:30:06', NULL),
(37, 'jklgfljkfgd dfggd;f\'jdfg;dg fj;fj fdfdhsfdj dfdfh sdasdsd sff', 1, '2024-05-21 23:32:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profits`
--

CREATE TABLE `profits` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profits`
--

INSERT INTO `profits` (`id`, `created_at`, `updated_at`, `patient_id`, `doctor_id`, `amount`, `seen`) VALUES
(1, '2024-03-19 18:49:17', NULL, 31, 41, 222, 0),
(2, '2024-03-26 16:48:19', '2024-03-26 16:48:19', 8, 55, 2, 1),
(3, '2024-03-26 16:48:53', '2024-03-26 16:48:53', 1, 55, 22, 1),
(4, '2024-03-27 11:45:05', NULL, 1, 55, 223, 1),
(5, '2024-03-27 11:47:54', NULL, 7, 55, 111, 1),
(6, '2023-12-11 12:07:59', NULL, 8, 55, 10, 1),
(7, '2024-03-27 21:06:37', '2024-03-27 21:06:37', 1, 55, 112, 1),
(8, '2024-03-28 20:27:30', '2024-03-28 20:27:30', 1, 55, 21, 1),
(10, '2024-03-29 09:00:05', '2024-03-29 09:00:05', 7, 55, 21, 1),
(19, '2024-03-14 12:15:58', NULL, 1, 54, 33, 1),
(22, '2024-03-31 20:11:56', '2024-03-31 20:11:56', 1, 55, 112, 1),
(23, '2024-03-31 20:12:15', '2024-03-31 20:12:15', 1, 55, 112, 1),
(24, '2024-04-04 16:40:35', '2024-04-04 16:40:35', 0, 55, 112, 1),
(25, '2024-04-04 16:46:04', '2024-04-04 16:46:04', 0, 55, 112, 1),
(26, '2024-04-04 16:46:17', '2024-04-04 16:46:17', 7, 55, 21, 1),
(27, '2024-04-04 16:46:34', '2024-04-04 16:46:34', 0, 55, 112, 1),
(28, '2024-04-04 16:46:38', '2024-04-04 16:46:38', 0, 55, 112, 1),
(29, '2024-04-04 16:46:56', '2024-04-04 16:46:56', 1, 55, 112, 1),
(30, '2024-04-04 16:47:02', '2024-04-04 16:47:02', 8, 55, 112, 1),
(31, '2024-04-04 16:47:14', '2024-04-04 16:47:14', 0, 55, 112, 1),
(32, '2024-04-04 16:48:24', '2024-04-04 16:48:24', 0, 55, 112, 1),
(33, '2024-04-04 16:48:35', '2024-04-04 16:48:35', 0, 55, 112, 1),
(34, '2024-04-04 17:00:22', '2024-04-04 17:00:22', 0, 55, 112, 1),
(35, '2024-04-04 17:19:04', '2024-04-04 17:19:04', 1, 55, 112, 1),
(36, '2024-04-04 17:19:36', '2024-04-04 17:19:36', 7, 55, 112, 1),
(37, '2024-04-04 17:22:30', '2024-04-04 17:22:30', 8, 55, 112, 1),
(38, '2024-04-04 17:24:53', '2024-04-04 17:24:53', 0, 55, 112, 1),
(39, '2024-04-04 17:25:03', '2024-04-04 17:25:03', 1, 55, 112, 1),
(40, '2024-04-04 17:30:42', '2024-04-04 17:30:42', 0, 55, 112, 1),
(41, '2024-04-04 17:30:44', '2024-04-04 17:30:44', 0, 55, 112, 1),
(42, '2024-04-04 17:30:47', '2024-04-04 17:30:47', 0, 55, 112, 1),
(43, '2024-04-04 17:30:49', '2024-04-04 17:30:49', 0, 55, 112, 1),
(44, '2024-04-04 17:37:39', '2024-04-04 17:37:39', 0, 55, 112, 1),
(45, '2024-04-04 17:37:41', '2024-04-04 17:37:41', 0, 55, 112, 1),
(46, '2024-04-04 17:37:54', '2024-04-04 17:37:54', 1, 55, 112, 1),
(47, '2024-04-04 19:47:10', '2024-04-04 19:47:10', 0, 55, 112, 1),
(48, '2024-04-04 19:47:26', '2024-04-04 19:47:26', 1, 55, 21, 1),
(49, '2024-04-05 10:22:34', '2024-04-05 10:22:34', 1, 55, 21, 1),
(50, '2024-04-05 10:33:49', '2024-04-05 10:33:49', 0, 55, 112, 1),
(51, '2024-04-05 10:41:37', '2024-04-05 10:41:37', 0, 55, 112, 1),
(52, '2024-04-05 10:42:16', '2024-04-05 10:42:16', 8, 55, 112, 1),
(53, '2024-04-05 10:42:27', '2024-04-05 10:42:27', 8, 55, 21, 1),
(54, '2024-04-05 10:42:56', '2024-04-05 10:42:56', 0, 55, 112, 1),
(55, '2024-04-05 10:43:04', '2024-04-05 10:43:04', 0, 55, 112, 1),
(56, '2024-04-05 10:44:45', '2024-04-05 10:44:45', 0, 55, 112, 1),
(57, '2024-04-05 10:46:01', '2024-04-05 10:46:01', 0, 55, 112, 1),
(58, '2024-04-05 10:46:16', '2024-04-05 10:46:16', 1, 55, 112, 1),
(59, '2024-04-05 10:52:27', '2024-04-05 10:52:27', 0, 55, 112, 1),
(60, '2024-04-05 10:52:42', '2024-04-05 10:52:42', 1, 55, 21, 1),
(61, '2024-04-05 10:52:58', '2024-04-05 10:52:58', 0, 55, 112, 1),
(62, '2024-04-05 10:54:02', '2024-04-05 10:54:02', 0, 55, 112, 1),
(63, '2024-04-05 10:59:18', '2024-04-05 10:59:18', 0, 55, 266, 1),
(64, '2024-04-05 11:00:11', '2024-04-05 11:00:11', 1, 55, 112, 1),
(65, '2024-04-05 15:12:25', '2024-04-05 15:12:25', 7, 55, 21, 1),
(66, '2024-04-05 15:12:33', '2024-04-05 15:12:33', 0, 55, 133, 1),
(67, '2024-04-05 15:12:37', '2024-04-05 15:12:37', 0, 55, 266, 1),
(68, '2024-04-05 15:14:43', '2024-04-05 15:14:43', 0, 55, 133, 1),
(69, '2024-04-05 15:24:04', '2024-04-05 15:24:04', 0, 55, 133, 1),
(70, '2024-04-05 15:24:31', '2024-04-05 15:24:31', 0, 55, 266, 1),
(71, '2024-04-05 15:28:56', '2024-04-05 15:28:56', 1, 55, 112, 1),
(72, '2024-04-05 15:29:40', '2024-04-05 15:29:40', 0, 55, 133, 1),
(73, '2024-04-05 15:29:51', '2024-04-05 15:29:51', 7, 55, 112, 1),
(74, '2024-04-06 15:50:30', '2024-04-06 15:50:30', 0, 55, 266, 1),
(75, '2024-04-06 15:51:01', '2024-04-06 15:51:01', 1, 55, 112, 1),
(76, '2024-04-06 15:52:15', '2024-04-06 15:52:15', 0, 55, 133, 1),
(77, '2024-04-06 15:52:24', '2024-04-06 15:52:24', 0, 55, 266, 1),
(78, '2024-04-06 15:56:14', '2024-04-06 15:56:14', 0, 55, 266, 1),
(79, '2024-04-06 15:57:02', '2024-04-06 15:57:02', 1, 55, 112, 1),
(80, '2024-04-06 15:57:27', '2024-04-06 15:57:27', 0, 55, 266, 1),
(81, '2024-04-06 15:59:30', '2024-04-06 15:59:30', 1, 55, 112, 1),
(82, '2024-04-06 16:00:03', '2024-04-06 16:00:03', 0, 55, 266, 1),
(83, '2024-04-06 16:00:58', '2024-04-06 16:00:58', 0, 55, 266, 1),
(84, '2024-04-06 16:01:14', '2024-04-06 16:01:14', 0, 55, 266, 1),
(85, '2024-04-06 16:01:37', '2024-04-06 16:01:37', 7, 55, 112, 1),
(86, '2024-04-06 16:01:49', '2024-04-06 16:01:49', 0, 55, 133, 1),
(87, '2024-04-08 11:46:49', '2024-04-08 11:46:49', 0, 55, 133, 1),
(88, '2024-04-08 18:43:46', '2024-04-08 18:43:46', 0, 55, 133, 1),
(89, '2024-04-08 20:27:03', '2024-04-08 20:27:03', 7, 55, 112, 1),
(90, '2024-04-09 14:17:49', '2024-04-09 14:17:49', 1, 55, 112, 1),
(91, '2024-04-09 14:18:13', '2024-04-09 14:18:13', 7, 55, 21, 1),
(92, '2024-04-09 14:18:54', '2024-04-09 14:18:54', 8, 55, 21, 1),
(93, '2024-04-09 15:48:19', '2024-04-09 15:48:19', 7, 55, 112, 1),
(94, '2024-04-12 15:43:36', '2024-04-12 15:43:36', 0, 55, 133, 1),
(95, '2024-04-12 15:45:19', '2024-04-12 15:45:19', 1, 55, 112, 1),
(96, '2024-04-14 11:56:37', '2024-04-14 11:56:37', 1, 55, 112, 1),
(97, '2024-04-18 14:27:17', '2024-04-18 14:27:17', 0, 55, 266, 1),
(98, '2024-04-18 14:27:26', '2024-04-18 14:27:26', 1, 55, 112, 1),
(99, '2024-04-18 14:28:02', '2024-04-18 14:28:02', 7, 55, 112, 1),
(100, '2024-05-04 14:22:45', '2024-05-04 14:22:45', 6, 55, 112, 1),
(101, '2024-05-04 14:54:36', '2024-05-04 14:54:36', 1, 55, 112, 1),
(102, '2024-05-04 16:37:00', '2024-05-04 16:37:00', 1, 55, 112, 1),
(103, '2024-05-04 16:39:33', '2024-05-04 16:39:33', 6, 55, 112, 1),
(104, '2024-05-04 17:04:24', '2024-05-04 17:04:24', 0, 55, 266, 1),
(105, '2024-05-04 17:06:55', '2024-05-04 17:06:55', 1, 55, 112, 1),
(106, '2024-05-04 20:27:22', '2024-05-04 20:27:22', 0, 55, 133, 1),
(107, '2024-05-04 20:28:02', '2024-05-04 20:28:02', 0, 55, 133, 1),
(108, '2024-05-15 15:03:02', '2024-05-15 15:03:02', 1, 55, 112, 1),
(109, '2024-05-15 15:04:30', '2024-05-15 15:04:30', 1, 55, 112, 1),
(110, '2024-05-15 15:04:45', '2024-05-15 15:04:45', 1, 55, 21, 1),
(111, '2024-05-15 19:19:50', '2024-05-15 19:19:50', 6, 55, 112, 1),
(112, '2024-05-15 19:20:59', '2024-05-15 19:20:59', 7, 55, 112, 1),
(113, '2024-05-17 15:23:43', '2024-05-17 15:23:43', 0, 55, 266, 1),
(114, '2024-05-17 15:24:40', '2024-05-17 15:24:40', 1, 55, 112, 1),
(115, '2024-05-17 15:28:06', '2024-05-17 15:28:06', 0, 55, 133, 1),
(116, '2024-05-17 16:12:20', '2024-05-17 16:12:20', 0, 55, 266, 1),
(117, '2024-05-17 16:22:45', '2024-05-17 16:22:45', 0, 55, 133, 1),
(118, '2024-05-17 16:58:50', '2024-05-17 16:58:50', 0, 55, 266, 1),
(119, '2024-05-18 16:54:53', '2024-05-18 16:54:53', 7, 55, 112, 1),
(120, '2024-05-18 17:00:31', '2024-05-18 17:00:31', 7, 55, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `doctor_id`, `rating`, `patient_id`) VALUES
(3, 11, 2, 1),
(4, 25, 1, 1),
(5, 26, 1, 1),
(6, 1, 5, 1),
(7, 3, 1, 1),
(8, 50, 5, 1),
(9, 11, 1, 9),
(10, 25, 3, 9),
(11, 57, 5, 1),
(12, 12, 1, 1),
(13, 7, 5, 1),
(14, 56, 1, 1),
(15, 55, 4, 1),
(16, 52, 4, 1),
(17, 52, 1, 6),
(18, 14, 5, 6),
(19, 55, 5, 7),
(20, 25, 5, 7),
(21, 7, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `username2` text NOT NULL DEFAULT 'cvvcv',
  `password` text NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `name`, `username2`, `password`, `clinic_id`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'cvvcvc', 'sdds', 'ffddf', 1, 'sddsdc', 'dcsd', '2024-03-19 18:31:59', NULL),
(4, NULL, 'jdjdskdsds dssd', 'sdsd;sdkl dlsdl', 51, NULL, NULL, '2024-03-25 18:51:44', '2024-03-25 18:51:44'),
(5, NULL, 'res4', '$2y$10$IxSKvvwnS0dI9Q6nKYB9yOP4PmZflEhFuJ1guD5N57CspK7XMW7YW', 54, NULL, NULL, '2024-03-25 19:00:07', '2024-03-25 19:00:07'),
(6, 'samy3', 'res5', '$2y$10$FZ5BvIoStyZtSmNeIwJqe.DmbsQ09FgKqP1WwcT6NyekC2iXKBaLG', 55, 'yousetttttttt08@gmail.com', '22112121212', '2024-03-25 19:03:15', '2024-05-09 16:22:45'),
(7, NULL, 'res7', '$2y$10$K8Qt6hZp28oCH787C0y9eORyyQHixDgT5dgxY7cdYPhRhSXGB.bKa', 57, NULL, NULL, '2024-03-27 12:52:23', '2024-03-27 12:52:23'),
(8, NULL, 'res9', '$2y$10$uztecEsozaVbsaAQTaW1De4wUvzr9jY3eTWvleYJplMfcgBzf4e9u', 59, NULL, NULL, '2024-03-29 20:59:00', '2024-03-29 20:59:00'),
(9, NULL, 'nader', '$2y$10$OXgjZUOPx8WPuR4O4y2u5eAZcEmBoVR.rM8PiKQFKxWsrpgt1TfpC', 60, NULL, NULL, '2024-05-01 17:48:26', '2024-05-01 17:48:26'),
(10, NULL, 'res11', '$2y$10$DBiC70TiD9Ref1FrNKscleHmgKq1Rnr8CeW8O0rsLdbI/NUclQyze', 64, NULL, NULL, '2024-05-23 08:11:28', '2024-05-23 08:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `val` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `clinic_id`, `patient_id`, `val`, `created_at`, `updated_at`) VALUES
(4, 33, 1, 1, '2024-05-01', NULL),
(18, 59, 1, 4, '2024-05-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appoiments`
--
ALTER TABLE `appoiments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cli`
--
ALTER TABLE `cli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wewe` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dfgfgd` (`username`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `precraption`
--
ALTER TABLE `precraption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prevdisease`
--
ALTER TABLE `prevdisease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prevdiseasenotes`
--
ALTER TABLE `prevdiseasenotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appoiments`
--
ALTER TABLE `appoiments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `cli`
--
ALTER TABLE `cli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `precraption`
--
ALTER TABLE `precraption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `prevdisease`
--
ALTER TABLE `prevdisease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `prevdiseasenotes`
--
ALTER TABLE `prevdiseasenotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `profits`
--
ALTER TABLE `profits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
