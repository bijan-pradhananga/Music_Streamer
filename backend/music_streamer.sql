-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 08:31 AM
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
-- Database: `music_streamer`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `Album_ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Artist_ID` int(11) DEFAULT NULL,
  `Genre_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`Album_ID`, `Title`, `Artist_ID`, `Genre_ID`) VALUES
(1, 'Divide', 1, 1),
(2, 'Fearless', 2, 1),
(3, 'Fairytales', 5, 12),
(4, '21st Century Breakdown', 3, 2),
(5, 'Reckless', 4, 2),
(6, 'Most Wanted, Vol. 2', 6, 1),
(7, 'Prayers & Promises', 8, 5),
(8, 'After Hours', 9, 6),
(9, 'Encore', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `Artist_ID` int(11) NOT NULL,
  `Artist_Name` varchar(255) NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`Artist_ID`, `Artist_Name`, `Image`) VALUES
(1, 'Ed Sheeran', 'ed_sheeran.jpg'),
(2, 'Taylor Swift', 'taylor_swift.jpg'),
(3, 'Green Day', 'green_day.jpg'),
(4, 'Bryan Adams', 'bryan_adams.jpg'),
(5, 'Alexander Rybak', 'alexander_rybak.jpg'),
(6, 'Charlie Puth', 'charlie_puth.jpg'),
(8, 'John Denver', 'john_denver.jpg'),
(9, 'Weeknd', 'weeknd.jpg'),
(10, 'Eminem', 'eminem.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `Genre_ID` int(11) NOT NULL,
  `Genre_Name` varchar(255) NOT NULL,
  `Genre_Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`Genre_ID`, `Genre_Name`, `Genre_Image`) VALUES
(1, 'Pop', 'pop.jpg'),
(2, 'Rock', 'rock.jpg'),
(3, 'Hip Hop', 'hip hop.jpg'),
(4, 'Jazz', 'jazz.jpg'),
(5, 'Country', 'country.jpg'),
(6, 'Electronic', 'electronic.jpg'),
(8, 'Classical', 'classical.jpg'),
(12, 'Indie', 'indie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likedsongs`
--

CREATE TABLE `likedsongs` (
  `User_ID` int(11) NOT NULL,
  `Song_ID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likedsongs`
--

INSERT INTO `likedsongs` (`User_ID`, `Song_ID`, `timestamp`) VALUES
(1, 1, '2024-01-30 06:55:35'),
(1, 2, '2024-01-30 06:47:15'),
(1, 3, '2024-01-30 02:48:02'),
(1, 10, '2024-01-30 07:12:39'),
(2, 1, '2024-01-29 12:15:32'),
(2, 2, '2024-01-28 12:32:02'),
(2, 3, '2024-01-29 12:15:33'),
(2, 4, '2024-01-18 04:20:11'),
(2, 5, '2024-01-29 12:15:34'),
(2, 6, '2024-01-29 12:15:35'),
(2, 7, '2024-01-29 12:15:36'),
(2, 8, '2024-01-29 12:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `Playlist_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Playlist_Name` varchar(255) DEFAULT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`Playlist_ID`, `User_ID`, `Playlist_Name`, `Created_Date`) VALUES
(10, 2, 'myworld', '2024-01-09 09:04:41'),
(11, 2, 'myPlaylist3', '2024-01-09 09:13:04'),
(32, 1, 'myPlaylist', '2024-01-29 14:20:30'),
(33, 1, 'meroPlaylist', '2024-01-29 14:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `Playlist_ID` int(11) NOT NULL,
  `Song_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist_songs`
--

INSERT INTO `playlist_songs` (`Playlist_ID`, `Song_ID`) VALUES
(32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `Song_ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Artist_ID` int(11) DEFAULT NULL,
  `Album_ID` int(11) DEFAULT NULL,
  `Genre_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`Song_ID`, `Title`, `Artist_ID`, `Album_ID`, `Genre_ID`) VALUES
(1, 'Shape Of You', 1, 1, 1),
(2, 'You Belong With Me', 2, 2, 1),
(3, 'Fairy Tale', 5, 3, 12),
(4, 'Summer Of 69', 4, 5, 2),
(5, '21 Guns', 3, 4, 2),
(6, 'See You Again', 6, 6, 1),
(7, 'Love Story', 2, 2, 1),
(8, 'Perfect', 1, 1, 1),
(9, 'Country Roads', 8, 7, 5),
(10, 'Save Your Tears', 9, 8, 6),
(11, 'Mockingbird', 10, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `First_Name`, `Last_Name`, `Email`, `Password`, `Image`) VALUES
(1, 'Bijan', 'Pradhananga', 'bijan@gmail.com', 'bijan123', 'bijan.jpg'),
(2, 'Elizabeth', 'Oslen', 'elizabeth@gmail.com', 'eliza123', 'elizabeth.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`Album_ID`),
  ADD KEY `Artist_ID` (`Artist_ID`),
  ADD KEY `Genre_ID` (`Genre_ID`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`Artist_ID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`Genre_ID`);

--
-- Indexes for table `likedsongs`
--
ALTER TABLE `likedsongs`
  ADD PRIMARY KEY (`User_ID`,`Song_ID`),
  ADD KEY `Song_ID` (`Song_ID`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`Playlist_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`Playlist_ID`,`Song_ID`),
  ADD KEY `Song_ID` (`Song_ID`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`Song_ID`),
  ADD KEY `Artist_ID` (`Artist_ID`),
  ADD KEY `Album_ID` (`Album_ID`),
  ADD KEY `Genre_ID` (`Genre_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `Album_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `Artist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `Genre_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `Playlist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `Song_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`Artist_ID`) REFERENCES `artists` (`Artist_ID`),
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`Genre_ID`) REFERENCES `genres` (`Genre_ID`);

--
-- Constraints for table `likedsongs`
--
ALTER TABLE `likedsongs`
  ADD CONSTRAINT `likedsongs_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `likedsongs_ibfk_2` FOREIGN KEY (`Song_ID`) REFERENCES `songs` (`Song_ID`);

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD CONSTRAINT `fk_playlist_id` FOREIGN KEY (`Playlist_ID`) REFERENCES `playlists` (`Playlist_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`Artist_ID`) REFERENCES `artists` (`Artist_ID`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`Album_ID`) REFERENCES `albums` (`Album_ID`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`Genre_ID`) REFERENCES `genres` (`Genre_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
