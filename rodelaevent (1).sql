-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2021 at 05:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rodelaevent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `image`, `username`, `email`, `password`, `datetime`) VALUES
(1, 'jamil', 'hossain', '20201123052524.', 'jamil123', 'jamil123@gmail.com', '123456', '2020-11-23 04:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(6) NOT NULL,
  `c_id` int(10) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `vanue` varchar(200) NOT NULL,
  `venue_price` int(10) NOT NULL,
  `preferedFor` varchar(200) NOT NULL,
  `location` varchar(250) NOT NULL,
  `l_price` int(10) NOT NULL,
  `hotel` varchar(150) NOT NULL,
  `h_price` int(10) NOT NULL,
  `entertainment` varchar(200) NOT NULL,
  `e_price` int(10) NOT NULL,
  `decoration` varchar(200) NOT NULL,
  `d_price` int(10) NOT NULL,
  `photoshoot` varchar(150) NOT NULL,
  `p_price` int(10) NOT NULL,
  `videoshoot` varchar(150) NOT NULL,
  `v_price` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `member` varchar(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `advancePayment` int(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `c_id`, `c_name`, `vanue`, `venue_price`, `preferedFor`, `location`, `l_price`, `hotel`, `h_price`, `entertainment`, `e_price`, `decoration`, `d_price`, `photoshoot`, `p_price`, `videoshoot`, `v_price`, `image`, `dateTime`, `member`, `phone`, `address`, `advancePayment`, `status`) VALUES
(1, 0, '', 'The Destination Events Venue', 0, 'All', 'Mohammadpur area', 0, 'Mohammadpur hotel', 0, 'DJ Party', 0, 'Flower Decoration', 0, 'Portfolio Photo', 0, 'PreWedding video', '', '20201229044914.', '2020-12-29 15:49:14', '1000', 1689077207, 'Mohammadpur, Dhaka', 10000, 0),
(2, 0, '', 'The Destination Events Venue', 0, 'All', 'Mohammadpur area', 0, 'Mohammadpur hotel', 0, 'DJ Party', 0, 'Flower Decoration', 0, 'Portfolio Photo', 0, 'PreWedding video', '', '20201229045130.jpg', '2020-12-29 15:51:30', '', 0, '', 0, 0),
(3, 0, '', 'Gulshan Shooting Complex Venue', 0, 'All', 'Gulshan Shooting Complex', 0, 'Mohammadpur hotel', 0, 'Dancing', 0, 'Lighting Decoration', 0, 'Weeding photo', 0, 'PreWedding video', '', '20201229045332.jpg', '2020-12-29 15:53:32', '', 0, '', 0, 0),
(4, 0, '', 'The Destination Events Venue', 0, 'All', 'Mohammadpur area', 0, 'Mohammadpur hotel', 0, 'DJ Party', 0, 'Flower Decoration', 0, 'Portfolio Photo', 0, 'PreWedding video', '', '20201229055310.', '2020-12-29 16:53:10', '5000', 1234566554, 'Dhanmondi/15, Dhaka', 20000, 0),
(5, 1, 'fffff', 'The Destination Events Venue', 0, 'All', 'Mohammadpur area', 0, 'Mohammadpur hotel', 0, 'DJ Party', 0, 'Flower Decoration', 0, 'Portfolio Photo', 0, 'PreWedding video', '', '20201230010746.', '2020-12-30 12:07:46', '', 0, '', 0, 0),
(6, 1, '', 'The Destination Events Venue', 0, 'All', 'Gulshan Shooting Complex', 0, 'Mohammadpur hotel', 0, 'DJ Party', 0, 'Flower Decoration', 0, 'Portfolio Photo', 0, 'PreWedding video', '', '20201230021948.', '2020-12-30 13:19:48', '', 0, '', 0, 0),
(7, 1, '', 'The Destination Events Venue', 0, 'All', 'Mohammadpur area', 0, 'Mohammadpur hotel', 0, 'DJ Party', 0, 'Flower Decoration', 0, 'Portfolio Photo', 0, 'PreWedding video', '', '20201230025935.', '2020-12-30 13:59:35', '', 0, '', 0, 0),
(8, 1, '', 'The Destination Events Venue', 0, 'All', 'Mohammadpur area', 0, 'Mohammadpur hotel', 0, 'DJ Party', 0, 'Flower Decoration', 0, 'Portfolio Photo', 0, 'PreWedding video', '', '20201230030050.', '2020-12-30 14:00:50', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `Category_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `description`, `Category_date`, `status`) VALUES
(1, 'Wedding event', 'Here will be stored all wedding events..s', '2020-12-27 17:58:45', 0),
(3, 'Birthday Event', 'Here will be stored all Birthday event', '2020-11-23 05:07:42', 1),
(4, 'Corporate Event', 'Here will be stored all corporate events', '2020-09-07 17:39:06', 0),
(5, 'Generale meeting', 'It is generale meeting category', '2020-09-07 17:38:42', 0),
(6, 'Wedding Stage', '', '2020-10-27 16:20:40', 0),
(7, 'Holod Stage', '', '2020-10-27 16:20:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `decoration`
--

CREATE TABLE `decoration` (
  `id` int(10) NOT NULL,
  `d_id` varchar(15) NOT NULL,
  `d_name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `decoration`
--

INSERT INTO `decoration` (`id`, `d_id`, `d_name`, `description`, `image`, `price`, `dateTime`, `status`) VALUES
(2, 'DEC-1', 'Flower Decoration', 'Medium decoration but wonderfull', '20201228063228.jpg', 30000, '2020-12-28 17:32:28', 0),
(3, 'DEC-2', 'Lighting Decoration', '', '20201228063306.webp', 35000, '2020-12-28 17:33:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `id` int(6) NOT NULL,
  `e_id` varchar(15) NOT NULL,
  `e_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entertainment`
--

INSERT INTO `entertainment` (`id`, `e_id`, `e_name`, `description`, `image`, `price`, `dateTime`, `status`) VALUES
(2, 'ENT-1', 'DJ Party', 'To enjoy memorable Dj party with family and friends...', '20201228060259.jpg', 15000, '2020-12-28 17:02:59', 0),
(3, 'ENT-2', 'Dancing', 'Enjoy dancing', '20201228060426.jpg', 20000, '2020-12-28 17:04:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(5) NOT NULL,
  `event_name` varchar(150) NOT NULL,
  `event_image` varchar(250) NOT NULL,
  `event_category` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `event_purchase_date` varchar(50) NOT NULL,
  `event_price` varchar(10) NOT NULL,
  `event_qty` int(6) NOT NULL,
  `available_qty` int(6) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_username` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_image`, `event_category`, `description`, `event_purchase_date`, `event_price`, `event_qty`, `available_qty`, `datetime`, `user_username`, `status`) VALUES
(17, 'Birthday Party', '20200924055550.jpg', 'Wedding event', 'A birthday is the anniversary of the birth of a person, or figuratively of an institution. Birthdays of people are celebrated in numerous cultures, often with birthday ...', '2020-09-24', '15,000', 7, 4, '2020-12-27 17:26:11', '', 0),
(18, 'Corporate Event', '20200924071642.jpg', 'Corporate Event', 'Simply put, a corporate event is any form of event, hospitality or social activity which is organised or funded by a business entity. With such a broad definition, the target audience for corporate events can be equally as broad, including but not limited to: Employees. Board members. Stakeholders.', '2020-09-24', '80,000', 8, 4, '2020-10-27 16:41:21', '', 0),
(19, 'Holod Stages', '20200924072305.jpg', 'Holod Stage', '? From orchids to roses and everything in between, while we at WMG may have covered pretty much every decor idea out there .', '2020-09-24', '20,000', 6, 2, '2020-10-27 16:46:06', '', 0),
(20, 'Weeding Stages', '20200924072646.jpg', 'Wedding Stage', 'For something entirely different. VIEW STAGE. Saima Wedding Stage. VIEW STAGE. VIEW STAGE. Engagement in Spring. VIEW STAGE. VIEW STAGE. VIEW STAGE. VIEW STAGE. Civil Wedding Ceremony. VIEW STAGE. Walima - Halo Wedding Stage.', '2020-09-27', '50,000', 6, 3, '2020-10-27 16:48:16', '', 0),
(21, 'Weeding event', '20201001091707.jpg', 'Wedding Event', 'cvncn', '2020-10-01', '1,00,000', 3, 1, '2020-10-27 16:47:20', '', 0),
(23, 'Birthday', '20201027053642.jpg', 'Birthday Event', 'vnhv nc ,', '2020-10-27', '1,00,000', 4, 2, '2020-10-27 16:36:42', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `h_id` varchar(15) NOT NULL,
  `h_name` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `h_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `h_id`, `h_name`, `address`, `description`, `image`, `price`, `h_date`, `status`) VALUES
(2, 'HTL-1', 'Mohammadpur hotel', 'Mohammadpur, iqbal road, dhaka', '', '20201228060653.jpg', 25000, '2020-12-28 05:06:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(6) NOT NULL,
  `l_id` varchar(10) NOT NULL,
  `l_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `l_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `l_id`, `l_name`, `description`, `image`, `price`, `l_date`, `status`) VALUES
(1, 'LOC-1', 'Mohammadpur area', 'This area is so wonderfull for any venue..', '20201228052057.jpg', 25000, '2020-12-30 16:42:05', 0),
(3, 'LOC-2', 'Gulshan Shooting Complex', '', '20201228054006.png', 10000, '2020-12-28 04:40:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photoshoot`
--

CREATE TABLE `photoshoot` (
  `id` int(6) NOT NULL,
  `p_id` varchar(15) NOT NULL,
  `p_name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photoshoot`
--

INSERT INTO `photoshoot` (`id`, `p_id`, `p_name`, `description`, `image`, `price`, `dateTime`, `status`) VALUES
(1, 'PHT-1', 'Portfolio Photo', '', '20201228064922.jpg', 5000, '2020-12-28 17:49:22', 0),
(3, 'PHT-2', 'Weeding photo', 'High resolation photo', '20201228065448.jpg', 8000, '2020-12-28 17:54:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `preferedfor`
--

CREATE TABLE `preferedfor` (
  `pre_id` int(6) NOT NULL,
  `pre_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferedfor`
--

INSERT INTO `preferedfor` (`pre_id`, `pre_name`, `description`, `image`, `dateTime`, `status`) VALUES
(2, 'All', 'For all party', '20201229024825.jpg', '2020-12-29 13:48:25', 0),
(3, 'Family Function', '', '20201229025035.jpg', '2020-12-29 13:50:35', 0),
(4, 'Marriage Party', '', '20201229025053.', '2020-12-29 13:50:53', 0),
(5, 'Birthday Party', '', '20201229025104.', '2020-12-29 13:51:04', 0),
(6, 'Wedding Events', '', '20201229025157.jpg', '2020-12-29 13:51:57', 0),
(7, 'College Event', '', '20201229025240.', '2020-12-29 13:52:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `memeber_id` int(10) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `image` varchar(150) NOT NULL,
  `position` varchar(150) NOT NULL,
  `details` text NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`memeber_id`, `fname`, `lname`, `phone`, `email`, `Address`, `image`, `position`, `details`, `dateTime`, `status`) VALUES
(4, 'Md. Robiul', 'hasan', 1689077207, 'Robiul123@gmail.com', 'Dhanmondi/15, Dhaka', '20200930071519.jpg', 'Leader of this organization', ' Leadership', '2020-09-30 17:15:19', 0),
(5, 'Md. Ahsan', 'Mahmud', 1689077206, 'ahsan12@gmail.com', 'Mohammadpur, Dhaka', '20200930071706.jpg', 'Junior manager', '', '2020-12-27 16:21:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` int(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `username`, `phone`, `address`, `email`, `password`, `image`, `status`, `datetime`) VALUES
(1, 'jibon', 'ahamed', 'jamil12345', 191288756, 'dohar', 'jamil@gmail.com', 12345876, '', 1, '2021-01-03 08:40:56'),
(3, 'jamil', 'hossains', 'jibon045544', 1755544, 'dohars', 'jamil2@gmail.com', 2147483647, '', 1, '2020-09-05 15:44:43'),
(25, 'jamil', 'hossain', 'badelifebadlife76', 1689077205, 'aaaaa', 'badelifebadlife76@gmail.com', 25, '', 0, '2020-09-30 17:33:20'),
(26, 'jibon', 'ahammed', 'jibon123', 1689077205, 'Mohammadpur, Dhaka', 'jibon1@gmail.com', 12345678, '', 0, '2020-09-30 17:33:22'),
(27, 'jamil', 'hossain', 'jamil123', 1689077205, 'Mohammadpur, Dhaka', 'jamil1234@gmail.com', 12345678, '', 1, '2020-10-01 07:14:25'),
(28, 'Rubel', 'hossain', 'rubel123', 182447241, 'dohar meghula', 'rubel@gmail.com', 12345678, '', 1, '2020-11-15 03:29:43'),
(29, 'ibrahim', 'Khalil', 'ibrahim123', 1719641727, 'Joypara, dhaka', 'ibrahim@gmail.com', 12345678, '', 1, '2020-11-15 03:32:17'),
(30, 'kgbkgb', ' b nb', 'nvgfsefafef', 1254646466, 'fsdff', 'jamil127@gmail.com', 123456789, '', 1, '2020-12-23 13:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `users_order`
--

CREATE TABLE `users_order` (
  `order_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_Id` varchar(10) NOT NULL,
  `venue_name` varchar(150) NOT NULL,
  `venue_address` varchar(200) NOT NULL,
  `prefered_for` varchar(200) NOT NULL,
  `venue_price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `venue_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` text NOT NULL,
  `capecity` varchar(200) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_Id`, `venue_name`, `venue_address`, `prefered_for`, `venue_price`, `image`, `venue_date`, `description`, `capecity`, `status`) VALUES
('V1', 'The Destination Events Venue', 'Dhanmondi-Dhaka', '', 125000, '20201227051634.jpg', '2020-12-27 18:00:15', '', '', 0),
('V2', 'Event Seating Arrangements venue', 'Mohammadpur-Dhaka', '', 100000, '20201227062410.jpg', '2020-12-27 18:01:37', '', '', 0),
('v3', 'Gulshan Shooting Complex Venue', 'Ghulshan, Dhaka', '', 250000, '20201228061146.jpg', '2020-12-28 05:11:46', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videoshoot`
--

CREATE TABLE `videoshoot` (
  `id` int(6) NOT NULL,
  `v_id` varchar(15) NOT NULL,
  `v_name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videoshoot`
--

INSERT INTO `videoshoot` (`id`, `v_id`, `v_name`, `description`, `image`, `price`, `dateTime`, `status`) VALUES
(2, 'VDT-1', 'PreWedding video', '', '20201228071421.jpg', 15000, '2020-12-28 18:14:21', 0),
(3, 'VDT-2', 'Shooting Time', '', '20201228071502.jpg', 20000, '2020-12-28 18:15:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `worker_id` int(6) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `image` varchar(150) NOT NULL,
  `position` varchar(100) NOT NULL,
  `sallery` varchar(11) NOT NULL,
  `details` text NOT NULL,
  `joiningDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `fname`, `lname`, `phone`, `email`, `address`, `image`, `position`, `sallery`, `details`, `joiningDate`, `status`) VALUES
(4, 'jibon', 'ahammed', 1689077207, 'jamil12@gmail.com', 'Mohammadpur, Dhaka', '20201010070423.jpg', 'General Worker', '10', '', '2020-10-10 17:04:23', 0),
(5, 'sojib', 'hossain', 1234566554, 'badelifebadlife76@gmail.com', 'Mohammadpur, Dhaka', '20201010071659.jpg', 'General Worker', '12,000', ',jgmjfvfcj', '2020-10-10 17:16:59', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `decoration`
--
ALTER TABLE `decoration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `d_id` (`d_id`),
  ADD UNIQUE KEY `d_name` (`d_name`);

--
-- Indexes for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e_id` (`e_id`),
  ADD UNIQUE KEY `e_name` (`e_name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `l_id` (`l_id`),
  ADD UNIQUE KEY `l_name` (`l_name`);

--
-- Indexes for table `photoshoot`
--
ALTER TABLE `photoshoot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD UNIQUE KEY `p_name` (`p_name`);

--
-- Indexes for table `preferedfor`
--
ALTER TABLE `preferedfor`
  ADD PRIMARY KEY (`pre_id`),
  ADD UNIQUE KEY `pre_name` (`pre_name`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`memeber_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_order`
--
ALTER TABLE `users_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_Id`);

--
-- Indexes for table `videoshoot`
--
ALTER TABLE `videoshoot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `v_id` (`v_id`),
  ADD UNIQUE KEY `v_name` (`v_name`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `decoration`
--
ALTER TABLE `decoration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entertainment`
--
ALTER TABLE `entertainment`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photoshoot`
--
ALTER TABLE `photoshoot`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `preferedfor`
--
ALTER TABLE `preferedfor`
  MODIFY `pre_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `memeber_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users_order`
--
ALTER TABLE `users_order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videoshoot`
--
ALTER TABLE `videoshoot`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
