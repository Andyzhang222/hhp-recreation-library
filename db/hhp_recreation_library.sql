-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 21, 2022 at 03:28 PM
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
(8, 'MISC', 'Miscellaneous items'),
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
(1, 'SIMULATED_SURFACE', 1, 'Simulated uneven surface', 1),
(2, 'CANVAS', 2, 'Canvases', 3),
(3, 'PAINT', 2, 'Paint (various colours)', 4),
(4, 'SCISSOR', 2, 'Scissors', 2),
(5, 'SLEEP_BAG', 3, 'Sleeping bags', 3),
(6, 'FOOTBALL', 3, 'Footballs', 5),
(7, 'LIGHT', 3, 'Flashlights and Lanterns', 6),
(8, 'PADDLE', 3, 'Paddles', 0),
(9, 'BOAT_ROPE', 3, 'Boat rope (10ft. & 2m)', 2),
(10, 'TARP', 3, 'Tarps', 1),
(11, 'PLAYING_CARD', 4, 'Playing cards', 2),
(12, 'CRANIUM_CARD', 4, 'Cranium cards', 1),
(13, 'CRIBBAGE', 4, 'Cribbage board', 1),
(14, 'CROSSWORDS', 4, 'Crosswords books', 4),
(15, 'DICE', 4, 'Dice', 6),
(16, 'UNO', 4, 'Uno Cards', 2),
(17, 'REC_SHIRT', 5, 'Dalhousie Recreation T-Shirts', 2),
(18, 'CAMERA', 6, 'Camera', 1),
(19, 'VOICE_RECORDER', 6, 'Voice recorder', 1),
(20, 'VIDEO_CAMERA', 6, 'Video Camera', 1),
(21, 'BALLOON', 7, 'Balloons', 20),
(22, 'BEAN_BAG', 7, 'Bean bags', 3),
(23, 'BLINDFOLD', 7, 'Blindfolds', 4),
(24, 'BUBBLE_WAND', 7, 'Bubble wands', 5),
(25, 'PROP', 7, 'Costumes and skit props', 8),
(26, 'HULA_HOOP', 7, 'Hula Hoops', 4),
(27, 'VOLLEYBALL', 7, 'Ice breaker volleyball', 2),
(28, 'BUCKET', 7, 'Large white buckets', 4),
(29, 'MINI_CONE', 7, 'Mini cones', 5),
(30, 'PLAYDOUGH', 7, 'Playdough', 2),
(31, 'POOL_NOODLE', 7, 'Pool Noodles', 7),
(32, 'CHALK', 7, 'Sidewalk chalk', 9),
(33, 'CANDLE', 8, 'Birthday candles', 21),
(34, 'CAR_BRUSH', 8, 'Car brushes', 3),
(35, 'FIRST_AID', 8, 'First aid supplies', 3),
(36, 'GATORADE_CONTAINER', 8, 'Gatorade container', 15),
(37, 'GLOW_STICK', 8, 'Glow sticks and sparklers', 6),
(38, 'MILK_CRATE', 8, 'Milk crates', 8),
(39, 'PENCIL', 9, 'Carpentry Pencils', 4),
(40, 'INDEX_CARD', 9, 'Index Cards', 5),
(41, 'LANYARD', 9, 'Lanyards', 8),
(42, 'POST_IT', 9, 'Post-It notes', 9),
(43, 'SELFIE_STICK', 9, 'Selfie Stick', 1),
(44, 'TAPE', 9, 'Tape', 24),
(45, 'TY_CARD', 9, 'Thank you Cards', 3),
(46, 'REC_MH_GAME', 10, 'Recreation for Mental Health game', 1),
(47, 'BASKETBALL', 11, 'Basketballs', 4),
(48, 'BOCCE', 11, 'Bocce ball sets', 2),
(49, 'FOOTBALL', 11, 'Footballs', 7),
(50, 'FRISBEE', 11, 'Frisbee', 3),
(51, 'SOCCER', 11, 'Soccer Balls', 2),
(52, 'TENNIS_BALL', 11, 'Tennis Balls', 10);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_number` int(11) NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `borrower_name` varchar(255) NOT NULL,
  `borrower_email` varchar(255) NOT NULL,
  `date_borrowed` date NOT NULL,
  `return_date` date NOT NULL,
  `order_returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`order_number`),
  ADD KEY `item_type_id` (`item_type_id`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD CONSTRAINT `equipment_type_ibfk_1` FOREIGN KEY (`category`) REFERENCES `equipment_category` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `equipment_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
