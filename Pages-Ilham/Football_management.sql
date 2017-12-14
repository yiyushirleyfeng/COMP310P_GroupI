-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2017 at 12:22 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `ticket_id`, `user_id`) VALUES
(1, 1, 3),
(2, 4, 1),
(3, 2, 2),
(4, 5, 2),
(5, 6, 3),
(6, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `event_name` text NOT NULL,
  `category` text NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `contact_information` text NOT NULL,
  `extra_information` text NOT NULL,
  `number_of_tickets` int(11) NOT NULL,
  `tickets_available` int(11) NOT NULL,
  `host_id` int(11) DEFAULT NULL,
  `deadline_purchase` date DEFAULT NULL,
  `ticket_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `venue_id`, `event_name`, `category`, `date`, `start_time`, `end_time`, `contact_information`, `extra_information`, `number_of_tickets`, `tickets_available`, `host_id`, `deadline_purchase`, `ticket_price`) VALUES
(1, 1, 'Monday Match', '11-a-side', '2017-12-01', '10:00', '12:00', '0123456789', 'Meet me at the lobby', 3, 1, 1, '2017-12-01', 5),
(2, 2, 'Football Match', '11-a-side', '2017-12-01', '12:00', '14:00', '1234839', 'Go to pitch 7', 2, 0, 3, '2017-12-01', 6),
(3, 4, 'New Years Eve Game!', '5-a-side', '2017-12-31', '20:00', '22:00', '012345678', 'Meet me at the lobby', 3, 1, 1, '2017-12-30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `user_id`, `event_id`, `rating`, `date`, `comment`) VALUES
(1, 1, 2, 5, '2017-12-14', 'Great host, great game');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `event_id`, `ticket_price`, `user_id`) VALUES
(1, 1, 5, 3),
(2, 1, 5, 2),
(3, 1, 5, NULL),
(4, 2, 6, 1),
(5, 2, 6, 2),
(6, 3, 5, 3),
(7, 3, 5, 2),
(8, 3, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `contact_number` text NOT NULL,
  `email` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `contact_number`, `email`, `username`, `password`) VALUES
(1, 'Emily', 'Leung', '0123456789', 'emilyleung@gmail.com', 'emilyleung', '*707EE84316EFEEC2313AC41809AE56C5DEA5E1F7'),
(2, 'Ilham', 'Raslan', '0192837465', 'ilhamraslan@gmail.com', 'ilhamraslan', '*A73DB453D8D6A34DFA232AB72E263EBC48030D9F'),
(3, 'Shirley', 'Feng', '0987654321', 'shirleyfeng@gmail.com', 'shirleyfeng', '*C95FB2BD5537989407348E9349CAC2958D5393D9');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `town/city` text NOT NULL,
  `ground_type` text NOT NULL,
  `size_of_pitch` varchar(30) NOT NULL,
  `venue_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `address`, `postal_code`, `town/city`, `ground_type`, `size_of_pitch`, `venue_name`) VALUES
(1, 'South Park (Fulham), Peterborough Road, Daisy Lane, Fulham, Hammersmith and Fulham', 'SW6 3ER', 'London', 'Grass', '11', 'South Park'),
(2, '240 Lynton Road, Southwark', 'SE1 5LA', 'London', 'Astroturf', '11', 'City of London Academy'),
(3, '1 Coral Street, Waterloo, Lambeth', 'SE1 7BE', 'London', 'Astroturf', '5', 'Waterloo Wolf Turf'),
(4, '134 Chalton St, Kings Cross', 'NW1 1RX', 'London', 'Astroturf', '5', 'Somers Town Community Sports Centre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
