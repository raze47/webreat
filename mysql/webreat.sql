-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 03:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webreat`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `ref_no` varchar(12) NOT NULL,
  `owner_retreat_id` int(11) NOT NULL,
  `owner_property_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `price` int(12) NOT NULL,
  `status` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `ref_no`, `owner_retreat_id`, `owner_property_id`, `check_in`, `check_out`, `price`, `status`, `name`, `contact_no`, `email`) VALUES
(1, '948462521243', 4, 4, '2021-07-08', '2021-07-14', 2100, 'Booked', 'Rudolph Sta. Maria', '09274637222', 'raze0444@gmail.com'),
(2, '848462524498', 4, 22, '2021-07-14', '2021-07-16', 300, 'Checked out', 'Jeremy Santiago', '09758372155', 'jeremy@gmail.com'),
(3, '520210800597', 4, 4, '2021-07-09', '2021-07-13', 1400, 'Checked in', 'Vincent Rudolph Sta. Maria', '09662300838', 'raze0555@gmail.com'),
(4, '519515542900', 6, 27, '2021-07-09', '2021-07-11', 840, 'Booked', 'Broski Hombre', '09662540838', 'raze0666@gmail.com'),
(7, '714077179898', 7, 9, '2021-07-15', '2021-07-21', 3600, 'Checked out', 'Soldier X', '09662300838', 'raze0444@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `owner_listing_registration`
--

CREATE TABLE `owner_listing_registration` (
  `owner_retreat_id` int(10) NOT NULL,
  `main_contact_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `retreat_name` varchar(50) NOT NULL,
  `retreat_type` varchar(25) NOT NULL,
  `state_province` varchar(30) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `zip_postal` varchar(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `main_phone_number` varchar(11) NOT NULL,
  `license_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_listing_registration`
--

INSERT INTO `owner_listing_registration` (`owner_retreat_id`, `main_contact_name`, `email`, `password`, `retreat_name`, `retreat_type`, `state_province`, `street_address`, `zip_postal`, `city`, `main_phone_number`, `license_number`) VALUES
(4, 'Rudolpho', 'main_owner@email.com', '72122ce96bfec66e2396d2e25225d70a', 'WebReatto', 'Meditation', 'NCR', '23-C Flamingo St', '1242', 'NCR', '0393393939', '1234567'),
(6, 'RV', 'main_owner2@email.com', '72122ce96bfec66e2396d2e25225d70a', 'RV\'s palace', 'Meditation', 'NCR', '230-B Blah Blargh', '3030', 'NCR', '09662300838', '4958577'),
(7, 'VR', 'main_owner_3@email.com', '72122ce96bfec66e2396d2e25225d70a', 'Golden Mountain', 'Hiking Spot', 'CALABARZON', '44-B', '2844', 'CALABARZON', '0393393939', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `owner_properties`
--

CREATE TABLE `owner_properties` (
  `owner_property_id` int(11) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `property_description` varchar(6000) NOT NULL,
  `property_image` varchar(150) NOT NULL,
  `owner_retreat_id` int(11) NOT NULL,
  `property_amenities` varchar(6000) NOT NULL,
  `price` int(12) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_properties`
--

INSERT INTO `owner_properties` (`owner_property_id`, `property_name`, `property_description`, `property_image`, `owner_retreat_id`, `property_amenities`, `price`, `status`) VALUES
(3, 'Kirin', ' She\'s wearing a Kirin Blademaster armor with Crimson Fata LS', '3cb87265158d162e6021d79cab69e5e0-1625496229.jpg', 7, '6. Free breakfast: Guests want to save money and enjoy the convenience of either cooking their own breakfast or enjoying breakfast just steps from their room. When most short-term rentals include kitchens, hotels can compete on the breakfast front by offering some sort of free breakfast option, whether it’s a continental buffet or a sit-down hot meal.  7. Options for pillows: Many guests have allergies or strong preferences for certain types of pillows, so you can make your hotel feel more like a home by offering down, foam, and hypoallergenic pillows available.  8. Free WiFi internet access: Remember the days of hotel WiFi that cost $20 per day? Well, some hotels are still stuck in that era. Free WiFi is quickly becoming an amenity just like shampoo: guests expect it, and they don’t want to pay for it. For some guests, no free WiFi can be a deal-breaker.  Want to go above and beyond? Let guests stream their favorite TV through platforms like Netflix via your hotel room TVs.', 120, 'Unavailable'),
(4, 'Aqua', ' She\'s not useless at all. She\'s more beautiful than Megumin and Darkness combined.', 'aquaqt-1625497154.jpg', 4, '6. Free breakfast: Guests want to save money and enjoy the convenience of either cooking their own breakfast or enjoying breakfast just steps from their room. When most short-term rentals include kitchens, hotels can compete on the breakfast front by offering some sort of free breakfast option, whether it’s a continental buffet or a sit-down hot meal.  7. Options for pillows: Many guests have allergies or strong preferences for certain types of pillows, so you can make your hotel feel more like a home by offering down, foam, and hypoallergenic pillows available.  8. Free WiFi internet access: Remember the days of hotel WiFi that cost $20 per day? Well, some hotels are still stuck in that era. Free WiFi is quickly becoming an amenity just like shampoo: guests expect it, and they don’t want to pay for it. For some guests, no free WiFi can be a deal-breaker.  Want to go above and beyond? Let guests stream their favorite TV through platforms like Netflix via your hotel room TVs.', 350, 'Available'),
(6, 'Kaguya-sama', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1595607324525-1625588717.jpg', 6, '6. Free breakfast: Guests want to save money and enjoy the convenience of either cooking their own breakfast or enjoying breakfast just steps from their room. When most short-term rentals include kitchens, hotels can compete on the breakfast front by offering some sort of free breakfast option, whether it’s a continental buffet or a sit-down hot meal.  7. Options for pillows: Many guests have allergies or strong preferences for certain types of pillows, so you can make your hotel feel more like a home by offering down, foam, and hypoallergenic pillows available.  8. Free WiFi internet access: Remember the days of hotel WiFi that cost $20 per day? Well, some hotels are still stuck in that era. Free WiFi is quickly becoming an amenity just like shampoo: guests expect it, and they don’t want to pay for it. For some guests, no free WiFi can be a deal-breaker.  Want to go above and beyond? Let guests stream their favorite TV through platforms like Netflix via your hotel room TVs.', 500, 'Available'),
(9, 'Soldyar', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1594403517318-1625595098.jpg', 7, '6. Free breakfast: Guests want to save money and enjoy the convenience of either cooking their own breakfast or enjoying breakfast just steps from their room. When most short-term rentals include kitchens, hotels can compete on the breakfast front by offering some sort of free breakfast option, whether it’s a continental buffet or a sit-down hot meal.  7. Options for pillows: Many guests have allergies or strong preferences for certain types of pillows, so you can make your hotel feel more like a home by offering down, foam, and hypoallergenic pillows available.  8. Free WiFi internet access: Remember the days of hotel WiFi that cost $20 per day? Well, some hotels are still stuck in that era. Free WiFi is quickly becoming an amenity just like shampoo: guests expect it, and they don’t want to pay for it. For some guests, no free WiFi can be a deal-breaker.  Want to go above and beyond? Let guests stream their favorite TV through platforms like Netflix via your hotel room TVs.', 600, 'Available'),
(19, 'The devil', ' Has descended from the heavens to drag the mortals underneath the purgatory and the men attached to worldy deeds.', 'd921b9d3d555ede4f7f9d467b49c4ab0-1625675860.jpg', 4, '6. Free breakfast: Guests want to save money and enjoy the convenience of either cooking their own breakfast or enjoying breakfast just steps from their room. When most short-term rentals include kitchens, hotels can compete on the breakfast front by offering some sort of free breakfast option, whether it’s a continental buffet or a sit-down hot meal.  7. Options for pillows: Many guests have allergies or strong preferences for certain types of pillows, so you can make your hotel feel more like a home by offering down, foam, and hypoallergenic pillows available.  8. Free WiFi internet access: Remember the days of hotel WiFi that cost $20 per day? Well, some hotels are still stuck in that era. Free WiFi is quickly becoming an amenity just like shampoo: guests expect it, and they don’t want to pay for it. For some guests, no free WiFi can be a deal-breaker.  Want to go above and beyond? Let guests stream their favorite TV through platforms like Netflix via your hotel room TVs.', 666, 'Available'),
(21, 'Manhattan', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '7gh9ufi-1625677697.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 777, 'Available'),
(22, 'Casper', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'casper-1625730686.jpg', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 150, 'Available'),
(23, 'Athlean-X', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'athlean-1625753231.png', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 250, 'Available'),
(24, 'Glasses', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '187313177_334595434930430_2401357349173117960_n-1625753269.jpg', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 200, 'Available'),
(25, 'Jolly', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '187586453_334595568263750_260350458800939058_n-1625753286.jpg', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 350, 'Available'),
(26, 'Manhattan Pepe', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1462492995203-1625753309.jpg', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 385, 'Available'),
(27, 'Bro', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'bro-1625775833.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 420, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `retreat_place`
--

CREATE TABLE `retreat_place` (
  `retreat_place_id` int(55) NOT NULL,
  `retreat_description` varchar(5000) NOT NULL,
  `retreat_image` varchar(100) NOT NULL,
  `owner_retreat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retreat_place`
--

INSERT INTO `retreat_place` (`retreat_place_id`, `retreat_description`, `retreat_image`, `owner_retreat_id`) VALUES
(1, 'Webreatto, the first retreat place registered in this website.', '9wogx1h7d3g31-1625675253.jpg', 4),
(2, 'slurp', '186558351_334595471597093_2307543111848573975_n-1625375273.jpg', 6),
(3, 'Seek and you shall find', '519eab3aa1063d1a505cfb07f312fd6c-1625463173.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `user_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `user_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_id`, `email`, `password`, `contact_no`, `user_name`) VALUES
(1, 'tester@email.com', '202cb962ac59075b964b07152d234b70', '09662300838', 'Tester first Tester middle'),
(3, 'rudolph@mail.com', '202cb962ac59075b964b07152d234b70', '12340958', 'Rudolph');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `owner_property_id` (`owner_property_id`),
  ADD KEY `owner_retreat_id` (`owner_retreat_id`);

--
-- Indexes for table `owner_listing_registration`
--
ALTER TABLE `owner_listing_registration`
  ADD PRIMARY KEY (`owner_retreat_id`);

--
-- Indexes for table `owner_properties`
--
ALTER TABLE `owner_properties`
  ADD PRIMARY KEY (`owner_property_id`),
  ADD KEY `owner_retreat_id` (`owner_retreat_id`);

--
-- Indexes for table `retreat_place`
--
ALTER TABLE `retreat_place`
  ADD PRIMARY KEY (`retreat_place_id`),
  ADD KEY `owner_retreat_id` (`owner_retreat_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `owner_listing_registration`
--
ALTER TABLE `owner_listing_registration`
  MODIFY `owner_retreat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `owner_properties`
--
ALTER TABLE `owner_properties`
  MODIFY `owner_property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `retreat_place`
--
ALTER TABLE `retreat_place`
  MODIFY `retreat_place_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`owner_property_id`) REFERENCES `owner_properties` (`owner_property_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`owner_retreat_id`) REFERENCES `owner_listing_registration` (`owner_retreat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner_properties`
--
ALTER TABLE `owner_properties`
  ADD CONSTRAINT `owner_properties_ibfk_1` FOREIGN KEY (`owner_retreat_id`) REFERENCES `owner_listing_registration` (`owner_retreat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `retreat_place`
--
ALTER TABLE `retreat_place`
  ADD CONSTRAINT `retreat_place_ibfk_1` FOREIGN KEY (`owner_retreat_id`) REFERENCES `owner_listing_registration` (`owner_retreat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
