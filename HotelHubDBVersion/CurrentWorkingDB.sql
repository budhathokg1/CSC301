-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 10:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotelhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roomNumber` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` int(10) NOT NULL,
  `hotelName` varchar(80) NOT NULL DEFAULT 'N/A',
  `hotelImageUrl` varchar(255) DEFAULT NULL,
  `streetName` varchar(255) NOT NULL DEFAULT 'N/A',
  `city` varchar(80) NOT NULL DEFAULT 'N/A',
  `state` varchar(100) NOT NULL DEFAULT 'N/A',
  `zipCode` varchar(10) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelName`, `hotelImageUrl`, `streetName`, `city`, `state`, `zipCode`) VALUES
(1, 'Four Seasons Resort Lanai', 'https://q-cf.bstatic.com/images/hotel/max1280x900/101/101237522.jpg', '1 Manele Bay Rd', 'Lanai City', 'HI', ' 96763'),
(5, 'The Langham, Chicago', 'https://cdn.ostrovok.ru/t/640x400/content/a3/d7/a3d7c497c532a92e76eeaa7c328396f49f07980c.jpeg', '330 N Wabash Ave', 'Chicago', 'IL', '60611'),
(6, 'Acqualina Resort & Residences On The Beach', 'https://www.sunnyislesbeachmiami.com/wp-content/uploads/2019/01/Acqualina-Opulent-Lobby.jpg', '17875 Collins Ave', 'Sunny Isles Beach', 'FL', '33160');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNumber` int(10) NOT NULL,
  `hotelID` int(10) NOT NULL,
  `sqFeet` float NOT NULL,
  `price` float NOT NULL,
  `numberOfBeds` int(11) NOT NULL,
  `roomType` varchar(80) NOT NULL,
  `roomImageUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomNumber`, `hotelID`, `sqFeet`, `price`, `numberOfBeds`, `roomType`, `roomImageUrl`) VALUES
(123, 1, 540, 360, 2, 'standard', 'https://www.fourseasons.com/alt/img-opt/~70..0,0000-536,3570-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MAN/MAN_1152_original.jpg'),
(223, 1, 560, 450, 2, 'premium', 'https://www.fourseasons.com/alt/img-opt/~70..0,0000-536,3570-3000,0000-1687,5000/publish/content/dam/fourseasons/images/web/MAN/MAN_1152_original.jpg'),
(230, 6, 450, 750, 1, 'standard', 'https://media-cdn.tripadvisor.com/media/photo-s/07/44/00/c1/acqualina-resort-spa.jpg'),
(450, 5, 780, 980, 3, 'platinum', 'https://www.langhamhotels.com/cdn-4fdea273/globalassets/lhr/tl-chicago/rooms/tlchi-rooms-grand-room-1680-945.jpg'),
(590, 6, 450, 800, 1, 'standard', 'https://media-cdn.tripadvisor.com/media/photo-s/07/44/00/c1/acqualina-resort-spa.jpg'),
(890, 5, 450, 800, 2, 'premium', 'https://www.langhamhotels.com/cdn-4fdea273/globalassets/lhr/tl-chicago/rooms/tlchi-rooms-grand-room-1680-945.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(100) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `email`, `password`, `userType`) VALUES
(1, 'Juan', 'Ruiz', 'juanr26690@gmail.com', '$2y$10$952aZLtrDkBTbjUBdjcpVeIqRMQsNWqi2THackhjnDMBq.pCx3Ggq', 'admin'),
(2, 'admin', 'admin', 'user@admin.com', '$2y$10$2M61JYOv7FF2Ne.4Fmiy3uFkmSrrtdYcMfGOoko/xTsaI2UgKVdwK', 'admin'),
(3, 'root', 'root', 'root@root.com', '$2y$10$tbSeK/dUwj3hsjYdfzrCw.DALL9pT9hm5FAvGrHt45UFZ7kx9tnk6', 'root'),
(4, 'Bob', 'Dylan', 'bob@gmail.com', '$2y$10$WQS7w9EhLq4oimuQ/zP.meXJvqUAEYayET5.n97yc1fX4sVmXk912', 'user'),
(5, 'Juan', 'Luiz', 'luiz@zoomtown.com', '$2y$10$r9H8YkJefzjdJdnVE.GBhuHEfDqGmL9HO/RNveasVn6iwCZ1OQ2rK', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `roomNumber` (`roomNumber`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNumber`),
  ADD KEY `hotelID` (`hotelID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`roomNumber`) REFERENCES `room` (`roomNumber`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hotelID`) REFERENCES `hotel` (`hotelID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
