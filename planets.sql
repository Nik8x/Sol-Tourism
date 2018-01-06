-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 05:00 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planets`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_info`
--

CREATE TABLE `billing_info` (
  `billing_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `total_amount` varchar(200) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `pin_code` varchar(200) NOT NULL,
  `card_no` varchar(200) NOT NULL,
  `ex_date` varchar(200) NOT NULL,
  `cvc` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_info`
--

INSERT INTO `billing_info` (`billing_id`, `name`, `address`, `email`, `phone`, `user_id`, `total_amount`, `shipping_address`, `pin_code`, `card_no`, `ex_date`, `cvc`, `status`) VALUES
(2, 'nik', 'a', 'a', '5555555551', 'g4auhg', '1000500', 'a', '08789', '1234567890', '121212', '234', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `product_category` varchar(200) NOT NULL,
  `product_sub_category` varchar(200) NOT NULL,
  `file_ID` varchar(25) NOT NULL,
  `current_folder` varchar(500) NOT NULL,
  `destination_folder` varchar(500) NOT NULL,
  `new_file_name` varchar(500) DEFAULT NULL,
  `file_save_folder` varchar(500) DEFAULT NULL,
  `file_temp` varchar(500) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `file_extension` varchar(50) DEFAULT NULL,
  `file_name` varchar(500) DEFAULT NULL,
  `short_url` varchar(500) DEFAULT NULL,
  `actual_url` varchar(500) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IPADDRESS` varchar(100) NOT NULL,
  `deleteFlag` int(1) NOT NULL DEFAULT '0',
  `file_type` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_description`, `price`, `product_category`, `product_sub_category`, `file_ID`, `current_folder`, `destination_folder`, `new_file_name`, `file_save_folder`, `file_temp`, `file_size`, `file_extension`, `file_name`, `short_url`, `actual_url`, `created_datetime`, `IPADDRESS`, `deleteFlag`, `file_type`) VALUES
(9, '2481kb17l87kl', 'Caloris Basin', 'Caloris Planitia is a plain within a large impact basin on Mercury, informally named Caloris, about 1,550 km (960 mi) in diameter.It is one of the largest impact basins in the Solar System.', '250000', 'Mercury', 'Planet', '2481kb17l87kl', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/caloris_planitia_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp361F.tmp', '296590', 'jpg', 'caloris_planitia', NULL, '', '2017-12-16 01:22:57', '::1', 0, 'image/jpeg'),
(10, '9777188711d39164', 'Venus', 'Caloris Planitia is a plain within a large impact basin on Mercury, informally named Caloris, about 1,550 km (960 mi) in diameter.It is one of the largest impact basins in the Solar System.', '200000', 'Venus', 'Planet', '9777188711d39164', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/venus_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp63C5.tmp', '552924', 'jpg', 'venus', NULL, '', '2017-12-16 02:00:17', '::1', 0, 'image/jpeg'),
(11, '6528791883226pk', 'Venusian Floating City', 'A city floating above clouds with rich tourism. plain within a large impact basin on Mercury, informally named Caloris, about 1,550 km (960 mi) in diameter.It is one of the largest impact basins in th', '200000', 'Venus', 'City', '6528791883226pk', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/venus-floating_city_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphpC594.tmp', '21859', 'jpg', 'venus-floating_city', NULL, '', '2017-12-16 02:02:53', '::1', 0, 'image/jpeg'),
(12, '99u8br0s284', 'Luna', 'All Lunar cities are housed beneath a series of interconnected paraterraformed domes. The domes are made out of regolith, a substance found in abundance on the moon, that has been fused into a thick g', '55000', 'Luna', 'Moon', '99u8br0s284', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/moon_.jpeg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp4F94.tmp', '693898', 'jpeg', 'moon', NULL, '', '2017-12-16 02:14:24', '::1', 0, 'image/jpeg'),
(14, '25871013958628w72', 'Jupiter', 'Jupiter is the fifth planet from the Sun and the largest in the Solar System. It is a giant planet with a mass one-thousandth that of the Sun, but two-and-a-half times that of all the other planets in', '400000', 'Jupiter', 'Jupiter', '25871013958628w72', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/jupiter_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp6F40.tmp', '1040935', 'jpg', 'jupiter', NULL, '', '2017-12-16 02:18:54', '::1', 0, 'image/jpeg'),
(15, '971538907518w9329', 'Saturn', 't is a gas giant with an average radius about nine times that of Earth. It has only one-eighth the average density of Earth, but with its larger volume Saturn is over 95 times more massive. ', '550000', 'Saturn', 'Saturn', '971538907518w9329', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/saturn_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphpB190.tmp', '147047', 'jpg', 'saturn', NULL, '', '2017-12-16 02:21:22', '::1', 0, 'image/jpeg'),
(16, 'm7p2o954625j', 'Uranus', '. Uranus\'s atmosphere is similar to Jupiter\'s and Saturn\'s in its primary composition of hydrogen and helium, but it contains more \"ices\" such as water, ammonia, and methane, along with traces of othe', '700000', 'Uranus', 'Uranus', 'm7p2o954625j', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/uranus_.jpeg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp272.tmp', '101890', 'jpeg', 'uranus', NULL, '', '2017-12-16 02:25:00', '::1', 0, 'image/jpeg'),
(17, '4812w15545899834', 'Inner Belt', 'The Belt was colonized by humans roughly 150 BXT. The humans who are born in the Belt, called Belters, are taller and thinner than humans from the inner planets Earth and Mars due to the lower gravity', '500000', 'Inner Belt', 'Asteroid Belt', '4812w15545899834', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/inner_belt_.png', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp2268.tmp', '263020', 'png', 'inner_belt', NULL, '', '2017-12-16 02:30:35', '::1', 0, 'image/png'),
(18, 'd219524816047', 'Phobos', 'Phobos orbits 6,000 km (3,700 mi) from the Martian surface, closer to its primary body than any other known planetary moon. It is indeed so close that it orbits Mars much faster than Mars rotates, and', '500', 'Mars', 'Moon', 'd219524816047', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/phobos_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphpE4F5.tmp', '110107', 'jpg', 'phobos', NULL, '', '2017-12-16 02:37:58', '::1', 0, 'image/jpeg'),
(19, '5194146279688k60', 'Deimos', 'Only two geological features on Deimos have been given names. The craters Swift and Voltaire are named after writers who speculated on the existence of two Martian moons before Phobos and Deimos were ', '500', 'Mars', 'Moon', '5194146279688k60', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/deimos_.png', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp5818.tmp', '242447', 'png', 'deimos', NULL, '', '2017-12-16 02:59:13', '::1', 0, 'image/png'),
(20, '2286q87pbh7881', 'Io', ' It is the fourth-largest moon, has the highest density of all the moons, and has the least amount of water of any known astronomical object in the Solar System. ', '500', 'Jupiter', 'Moon', '2286q87pbh7881', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/io_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphpC879.tmp', '1471492', 'jpg', 'io', NULL, '', '2017-12-16 03:17:10', '::1', 0, 'image/jpeg'),
(21, 'y2079412816w56', 'Mars', 'Originally a colony of Earth settlers, about three generations after the first colonists dug in to the rock and soil, making Mars humanityâ€™s second home, the colonists began to get restless. While d', '200000', 'Mars', 'Planet', 'y2079412816w56', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/mars_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp9399.tmp', '185411', 'jpg', 'mars', NULL, '', '2017-12-16 03:28:58', '::1', 0, 'image/jpeg'),
(22, '722610439p14q52', 'Europa', 'Europa has the smoothest surface of any known solid object in the Solar System.[12] The apparent youth and smoothness of the surface have led to the hypothesis that a water ocean exists beneath it, wh', '500', 'Jupiter', 'Moon', '722610439p14q52', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/europa_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp25BC.tmp', '192154', 'jpg', 'europa', NULL, '', '2017-12-16 06:28:43', '::1', 0, 'image/jpeg'),
(23, 't13767248c5938u', 'Gaynmede', 'Ganymede is the largest and most massive moon of Jupiter and in the Solar System. The ninth largest object in the Solar System, it is the largest without a substantial atmosphere. It has a diameter of', '500', 'Jupiter', 'Moon', 't13767248c5938u', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/gaynmede_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphpD080.tmp', '163740', 'jpg', 'gaynmede', NULL, '', '2017-12-16 06:33:49', '::1', 0, 'image/jpeg'),
(24, '283968772234i42n', 'Callisto', 'Callisto is the second-largest moon of Jupiter, after Ganymede. It is the third-largest moon in the Solar System after Ganymede and Saturn\'s largest moon Titan, and the largest object in the Solar Sys', '500', 'Jupiter', 'Moon', '283968772234i42n', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/callisto_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp83AF.tmp', '138070', 'jpg', 'callisto', NULL, '', '2017-12-16 06:35:40', '::1', 0, 'image/jpeg'),
(25, 'w9356689646997817', 'Titan', 'Titan is the largest moon of Saturn. It is the only moon known to have a dense atmosphere, and the only object in space other than Earth where clear evidence of stable bodies of surface liquid has bee', '500', 'Saturn', 'Moon', 'w9356689646997817', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/titan_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphpD88D.tmp', '27372', 'jpg', 'titan', NULL, '', '2017-12-16 06:38:13', '::1', 0, 'image/jpeg'),
(26, '559677433495301120', 'Enceladus', 'A masterpiece of deep time and wrenching gravity, the tortured surface of Saturn\'s moon Enceladus and its fascinating ongoing geologic activity.', '500', 'Saturn', 'Moon', '559677433495301120', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/enceladus_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphpA53.tmp', '572719', 'jpg', 'enceladus', NULL, '', '2017-12-16 06:40:37', '::1', 0, 'image/jpeg'),
(27, '65583489o63432278', 'Rhea', 'Rhea is the second-largest moon of Saturn and the ninth-largest moon in the Solar System. It is the second smallest body in the Solar System, after the asteroid and dwarf planet Ceres', '500', 'Saturn', 'Moon', '65583489o63432278', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/rhea_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp51D7.tmp', '66811', 'jpg', 'rhea', NULL, '', '2017-12-16 06:42:01', '::1', 0, 'image/jpeg'),
(28, '92418842454549118', 'Mimas', 'Death Star, Mimas (pronounced MY muss or MEE muss, adjective Mimantean) is an inner moon of Saturn (the innermost of the major moons) and looks somewhat like a bull\'s eye if viewed from a certain angl', '500', 'Saturn', 'Moon', '92418842454549118', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/mimas_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp3330.tmp', '965621', 'jpg', 'mimas', NULL, '', '2017-12-16 06:42:58', '::1', 0, 'image/jpeg'),
(29, '33297m88u18s64', 'Phoebe', 'Phoebe is a moon which goes around (orbits) the planet called Saturn. It takes eighteen months for Phoebe to go all the way around Saturn. It is half made out of rock, and half made out of ice. The gr', '500', 'Saturn', 'Moon', '33297m88u18s64', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/phoebe_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp4DB4.tmp', '95757', 'jpg', 'phoebe', NULL, '', '2017-12-16 06:45:16', '::1', 0, 'image/jpeg'),
(30, '26489911n75731032', 'Iapetus', 'Iapetus, or occasionally Japetus, is the third-largest natural satellite of Saturn, eleventh-largest in the Solar System, and the largest body in the Solar System known not to be in hydrostatic equili', '500', 'Saturn', 'Moon', '26489911n75731032', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/iapetus_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp47.tmp', '1630843', 'jpg', 'iapetus', NULL, '', '2017-12-16 06:47:08', '::1', 0, 'image/jpeg'),
(31, 'c46m703525649534', 'Saturn Rings', 'The rings of Saturn are the most extensive planetary ring system of any planet in the Solar System. They consist of countless small particles, ranging in size from micrometres to metres, that orbit ab', '500', 'Saturn', 'Rings', 'c46m703525649534', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/saturn_ringss_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphpDB90.tmp', '116256', 'jpg', 'saturn_ringss', NULL, '', '2017-12-16 06:49:09', '::1', 0, 'image/jpeg'),
(32, '9232t24ss771665', 'Titania', 'Titania consists of approximately equal amounts of ice and rock, and is probably differentiated into a rocky core and an icy mantle. A layer of liquid water may be present at the coreâ€“mantle boundar', '500', 'Uranus', 'Moon', '9232t24ss771665', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/titania_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp539D.tmp', '142605', 'jpg', 'titania', NULL, '', '2017-12-16 06:57:19', '::1', 0, 'image/jpeg'),
(33, '7184957wp8795f', 'Miranda', 'Miranda is the smallest of the rounded satellites of Uranus. It also orbits the closest of the five larger moons. It is named after one of the characters in Shakespeares play, â€œThe Tempestâ€.', '500', 'Uranus', 'Moon', '7184957wp8795f', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/miranda_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp8E12.tmp', '48668', 'jpg', 'miranda', NULL, '', '2017-12-16 06:58:39', '::1', 0, 'image/jpeg'),
(34, 'wb90285053f419', 'Oberon', ' moon of Uranus that is characterized by an old, heavily cratered, and icy surface. The surface shows little evidence of internal activity other than some unknown dark material that apparently covers ', '500', 'Uranus', 'Moon', 'wb90285053f419', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/oberon_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp6BAD.tmp', '109322', 'jpg', 'oberon', NULL, '', '2017-12-16 07:00:42', '::1', 0, 'image/jpeg'),
(35, '8537185317023', 'Ariel', 'Ariel is the brightest moon in the Uranian system. The most prominent feature of Ariel is the network of interconnected rift valleys. They cross the entire surface of the moon for hundreds of miles ', '500', 'Uranus', 'Moon', '8537185317023', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/ariel_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp74D.tmp', '163508', 'jpg', 'ariel', NULL, '', '2017-12-16 07:02:27', '::1', 0, 'image/jpeg'),
(36, '4050g9y7763375', 'Umbriel', 'Umbriel is the darkest satellite of Uranus. It is about the same size as Ariel and has about the same density. ', '500', 'Uranus', 'Moon', '4050g9y7763375', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/umbriel_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp5058.tmp', '96084', 'jpg', 'umbriel', NULL, '', '2017-12-16 07:03:51', '::1', 0, 'image/jpeg'),
(37, 'z31p85g52662262', 'Triton', 'Triton is the coldest known object in the Solar System and is unusual because it orbits backwards.', '500', 'Neptune', 'Moon', 'z31p85g52662262', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/triton_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp5C0A.tmp', '88546', 'jpg', 'triton', NULL, '', '2017-12-16 07:10:27', '::1', 0, 'image/jpeg'),
(38, '14l451990641894', 'Neptune', ' Neptune is 17 times the mass of Earth and is slightly more massive than its near-twin Uranus, which is 15 times the mass of Earth and slightly larger than Neptune. Neptune orbits the Sun once every 1', '800000', 'Neptune', 'Planet', '14l451990641894', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/neptune_.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp33E0.tmp', '57456', 'jpg', 'neptune', NULL, '', '2017-12-16 07:14:39', '::1', 0, 'image/jpeg'),
(39, 'qp67104968979290', 'Kuiper Belt', 'he Kuiper belt, occasionally called the Edgeworthâ€“Kuiper belt, is a circumstellar disc in the outer Solar System, extending from the orbit of Neptune to approximately 50 AU from the Sun. It is simil', '1000000', 'Kuiper Belt', 'Asteroid Belt', 'qp67104968979290', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/kuiper_belt_.png', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp37FE.tmp', '485927', 'png', 'kuiper_belt', NULL, '', '2017-12-16 07:16:51', '::1', 0, 'image/png'),
(40, '183618187753783784', 'Ceres', 'Ceres is the largest object in the asteroid belt that lies between the orbits of Mars and Jupiter, slightly closer to Mars\' orbit. Its diameter is approximately 945 kilometers, making it the largest o', '500', 'Inner Belt', 'Dwarf Planet', '183618187753783784', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/ceres.jpg', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp19B4.tmp', '163740', 'jpg', 'gaynmede', NULL, '', '2017-12-19 18:56:00', '::1', 0, 'image/jpeg'),
(41, '4988897157666b12', 'Pluto', 'Pluto is a dwarf planet in the Kuiper belt, a ring of bodies beyond Neptune. It was the first Kuiper belt object to be discovered. Pluto was discovered by Clyde Tombaugh in 1930 and was originally con', '500', 'Kuiper Belt', 'Dwarf Planet', '4988897157666b12', 'C:xampphtdocs	ourism', 'C:xampphtdocs	ourism/product_img/', 'product_img/pluto.png', 'C:xampphtdocs	ourism/product_img/', 'C:xampp	mpphp5E23.tmp', '581021', 'png', 'pluto', NULL, '', '2017-12-19 18:59:34', '::1', 0, 'image/png');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserID` varchar(120) NOT NULL,
  `UserName` varchar(150) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `MemberSince` varchar(255) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `UserName`, `FirstName`, `LastName`, `Email`, `Password`, `MemberSince`, `Active`, `role`) VALUES
('sk8y4b', 'admin', 'admin', 'admin', 'abc@gmail.com', '6a6b2f0c203bb7258de1f11259fe60bed4e11cbc3a7d1040d1c3b7c2219e4d3c2', '1462392675', 1, 'admin'),
('45rbfn', 'david', 'a', 'a', 'david@a.com', '21136a78b964b1f20dfaf890611f1384490b374d8f26edcfd712d00c9602d8ae5', '1513727267', 1, ''),
('g4auhg', 'nik', 'nik', 'c', 'nik@c.com', '08313b042812f33f08588d7c82f276f8d9d768b7b2b68aae44b099a2f48287641', '1513714091', 1, ''),
('2ag0ey', 'x', 'x', 'x', 'x', '197a97e44167e5ffb67f0e97465d0eb64b72e4931d6674dd20ec40b3c282090ab', '1513409145', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_info`
--
ALTER TABLE `billing_info`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserName`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_info`
--
ALTER TABLE `billing_info`
  MODIFY `billing_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
