-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 02, 2022 at 03:37 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhp_recreation_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_code`
--

CREATE TABLE `admin_code` (
  `code` int(11) NOT NULL,
  `code_status` varchar(45) NOT NULL,
  `date_created` date NOT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_code`
--

INSERT INTO `admin_code` (`code`, `code_status`, `date_created`, `expire_date`) VALUES
(123456, 'ACTIVE', '2022-10-14', '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_category`
--

CREATE TABLE `equipment_category` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment_category`
--

INSERT INTO `equipment_category` (`id`, `code`, `description`) VALUES
(1, 'LEARNING_TOOLS', 'Accessibility learning tools'),
(2, 'ART_SUPPLIES', 'Art supplies'),
(3, 'CAMP_OUTDOOR', 'Camp and outdoor equipment'),
(4, 'CARD_GAMES', 'Cards and games'),
(5, 'REC_SPECIFIC', 'Dalhousie Recreation-specific items'),
(6, 'ELECTRONICS', 'Electronics'),
(7, 'GAME_SUPPLIES', 'Icebreaker and game supplies'),
(8, 'MISC', 'Miscellanous'),
(9, 'ORG_STATIONARY', 'Organizational/stationary items​​​​​​​'),
(10, 'REC_LEARNING_TOOLS', 'Recreation-based learning tools'),
(11, 'SPORTS', 'Sports equipment');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE `equipment_type` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `category` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`id`, `code`, `category`, `description`, `quantity`) VALUES
(1, 'SIMULATED_SURFACE', 1, 'Simulated uneven surface', 0),
(2, 'CANVAS', 2, 'Canvases', 1),
(3, 'PAINT', 2, 'Paint (various colours)', 2),
(4, 'SCISSOR', 2, 'Scissors', 1),
(9, 'BOAT_ROPE_10ft', 3, 'Boat rope (10ft)', 1),
(11, 'PLAYING_CARD', 4, 'Playing cards', 1),
(12, 'CRANIUM_CARD', 4, 'Cranium cards', 1),
(13, 'CRIBBAGE', 4, 'Cribbage board', 1),
(14, 'CROSSWORDS', 4, 'Crosswords books', 3),
(15, 'DICE', 4, 'Dice', 2),
(16, 'UNO', 4, 'Uno Cards', 2),
(17, 'REC_SHIRT', 5, 'Dalhousie Recreation T-Shirts', 2),
(18, 'CAMERA', 6, 'Nikon Coolpix Camera', 1),
(19, 'VOICE_RECORDER', 6, 'Voice recorder', 1),
(21, 'BALLOON', 7, 'Balloons', 7),
(22, 'BEAN_BAG', 7, 'Bean bags', 2),
(24, 'BUBBLE_WAND', 7, 'Bubble wands', 2),
(25, 'PROP', 7, 'Costumes and skit props', 5),
(26, 'HULA_HOOP', 7, 'Hula Hoops', 2),
(27, 'VOLLEYBALL', 7, 'Ice breaker volleyball', 2),
(28, 'BUCKET', 7, 'Large white buckets', 4),
(29, 'MINI_CONE', 7, 'Mini cones', 5),
(39, 'PENCIL', 9, 'Carpentry Pencils', 4),
(41, 'LANYARD', 9, 'Lanyards', 8),
(42, 'POST_IT', 9, 'Post-It notes', 5),
(43, 'SELFIE_STICK', 9, 'Selfie Stick', 1),
(44, 'TAPE', 9, 'Tape', 9),
(46, 'REC_MH_GAME', 10, 'Recreation for Mental Health game', 1),
(47, 'BASKETBALL', 11, 'Basketballs', 2),
(48, 'BOCCE', 11, 'Bocce ball sets', 2),
(49, 'FOOTBALL', 11, 'Footballs', 4),
(50, 'FRISBEE', 11, 'Frisbee', 1),
(51, 'SOCCER', 11, 'Soccer Balls', 1),
(52, 'TENNIS_BALL', 11, 'Tennis Balls', 4),
(53, 'GOGGLES', 1, 'Reduced visibility goggles', 1),
(54, 'BLIND_FOLD', 1, 'Blindfolds', 2),
(55, 'SHARPIE', 2, 'Sharpie Markers (set of 24)', 1),
(56, 'CONNECT_4', 4, 'Connect 4 Game', 1),
(57, 'TILE_RUMMY', 4, 'Tile Rummy Game', 1),
(58, 'JENGA', 4, 'Giant/yard Jenga game', 1),
(59, 'BOAT_ROPE_2m', 3, 'Boat rope (2m)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_number` int(11) NOT NULL,
  `item_list` json NOT NULL,
  `borrower_name` varchar(255) NOT NULL,
  `borrower_email` varchar(255) NOT NULL,
  `study_program` varchar(255) NOT NULL,
  `date_needed` date NOT NULL,
  `purpose` text NOT NULL,
  `return_date` date NOT NULL,
  `order_processed` tinyint(4) NOT NULL,
  `order_returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_number`, `item_list`, `borrower_name`, `borrower_email`, `study_program`, `date_needed`, `purpose`, `return_date`, `order_processed`, `order_returned`) VALUES
(4, '{\"4\": \"1\", \"21\": \"3\", \"44\": \"10\"}', 'phuong nguyen', 'you@dal.ca', 'Bachelor of Awesome', '2022-12-05', 'personal', '2022-12-29', 1, 0),
(5, '{\"49\": \"3\", \"52\": \"4\"}', 'phuong nguyen', 'you@dal.ca', 'Bachelor of Awesome', '2022-12-06', 'I want it I got it', '2022-12-30', 0, 0),
(6, '{\"22\": \"1\", \"47\": \"2\", \"50\": \"1\"}', 'lauren', 'lauren@dal.ca', 'Bachelor of CompSci', '2022-12-07', 'in-class-use', '2022-12-22', 1, 0),
(7, '{\"51\": \"1\", \"55\": \"1\"}', 'khaleda', 'khaleda@dal.ca', 'Bachelor of CompSci', '2022-12-06', 'extra-curr', '2022-12-14', 1, 0),
(8, '{\"25\": \"3\", \"26\": \"2\"}', 'blake', 'blake@dal.ca', 'Bachelor of CompSci', '2022-12-07', 'For use outside the classroom (i.e., in community), to fulfill a course requirement', '2022-12-30', 0, 0),
(9, '{\"11\": \"1\", \"24\": \"3\", \"42\": \"4\", \"50\": \"1\", \"59\": \"1\"}', 'haoran', 'haoran@dal.ca', 'Bachelor of CompSci', '2022-11-24', 'For use in a volunteer or work placement', '2022-11-30', 0, 0),
(10, '{\"14\": \"1\", \"44\": \"5\", \"52\": \"2\"}', 'hillary', 'hillary@dal.ca', 'Bachelor of CompSci', '2022-12-06', 'For use with an extracurricular group on campus (i.e., SAHHPer)', '2022-12-30', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `code` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`code`, `description`) VALUES
('AVAIL', 'Available'),
('RENT', 'Rented');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_code`
--
ALTER TABLE `admin_code`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `equipment_category`
--
ALTER TABLE `equipment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment_category`
--
ALTER TABLE `equipment_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `equipment_type`
--
ALTER TABLE `equipment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD CONSTRAINT `equipment_type_ibfk_1` FOREIGN KEY (`category`) REFERENCES `equipment_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
