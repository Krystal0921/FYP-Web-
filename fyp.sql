-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-14 15:13:59
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `fyp`
--

-- --------------------------------------------------------

--
-- 資料表結構 `apply_list`
--

CREATE TABLE `apply_list` (
  `aId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `application_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `chat`
--

CREATE TABLE `chat` (
  `chatId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senderId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `receiverId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `msg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `employment`
--

CREATE TABLE `employment` (
  `jId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jobTitle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `highlights` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `responsibilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `requirements` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jobOffer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `eId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `employment`
--

INSERT INTO `employment` (`jId`, `jobTitle`, `description`, `highlights`, `responsibilities`, `requirements`, `jobOffer`, `eId`) VALUES
('j0000001', '1', '1', '3', '1', '1', '1', 'e0000002'),
('j0000002', 'Job 2', 'a', 'a', 'a', 'a', 'a', 'e0000002');

-- --------------------------------------------------------

--
-- 資料表結構 `forum`
--

CREATE TABLE `forum` (
  `postId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `forum`
--

INSERT INTO `forum` (`postId`, `mId`, `title`, `content`, `timestamp`) VALUES
('p0000001', 'm0000002', '123', '321', '2024-01-13 09:42:57.209078'),
('p0000002', 'm0000002', 'Hi', 'Hello', '2024-01-13 09:46:08.258741'),
('p0000003', 'm0000001', 'Happy', 'yeeee', '2024-01-13 15:29:11.376310');

-- --------------------------------------------------------

--
-- 資料表結構 `latest_news`
--

CREATE TABLE `latest_news` (
  `nNo` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nDate` date NOT NULL,
  `news` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `lesson`
--

CREATE TABLE `lesson` (
  `lessonId` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lessonName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lessonPhoto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `lesson`
--

INSERT INTO `lesson` (`lessonId`, `lessonName`, `lessonPhoto`) VALUES
('l01', 'Daily Communication', 'SignLanguage.jpg'),
('l02', 'Workplace Communication', 'SignLanguage.jpg'),
('l03', 'Travel Communication', 'SignLanguage.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `lesson_detail`
--

CREATE TABLE `lesson_detail` (
  `sId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lessonId` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `lesson_detail`
--

INSERT INTO `lesson_detail` (`sId`, `sName`, `sType`, `video`, `lessonId`) VALUES
('s0000001', 'Number & Letter', 'word', '20231202_220200.mp4', 'l01'),
('s0000002', 'Time related', 'word', '20231202_220200.mp4', 'l01'),
('s0000003', 'Weather', 'word', '20231202_220200.mp4', 'l01'),
('s0000004', 'Animals', 'word', '20231202_220200.mp4', 'l01'),
('s0000005', 'Greetings', 'sentence', '20231202_220200.mp4', 'l01'),
('s0000006', 'Job category', 'word', '20231202_220200.mp4', 'l02'),
('s0000007', 'Job related tools', 'word', '20231202_220200.mp4', 'l02'),
('s0000008', 'Workplace environments', 'word', '20231202_220200.mp4', 'l02'),
('s0000009', 'Meeting vocabulary', 'word', '20231202_220200.mp4', 'l02'),
('s0000010', 'Interview', 'sentence', '20231202_220200.mp4', 'l02'),
('s0000011', 'Place', 'word', '20231202_220200.mp4', 'l03'),
('s0000012', 'Food', 'word', '20231202_220200.mp4', 'l03'),
('s0000013', 'Travel Vocabulary ', 'word', '20231202_220200.mp4', 'l03'),
('s0000014', 'Festival', 'word', '20231202_220200.mp4', 'l03'),
('s0000015', 'Direction & Price bargain', 'sentence', '20231202_220200.mp4', 'l03');

-- --------------------------------------------------------

--
-- 資料表結構 `lesson_quiz`
--

CREATE TABLE `lesson_quiz` (
  `quizId` int(11) NOT NULL,
  `lessonId` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quizQ` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quizAns` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correctAns` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `login`
--

CREATE TABLE `login` (
  `uId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `login`
--

INSERT INTO `login` (`uId`, `uName`, `password`, `user_type`) VALUES
('u0000001', 'Sally', '123', 1),
('u0000002', 'Jacky', '123', 1),
('u0000003', 'Krystal', '123', 2),
('u0000004', 'Cherrie', '123', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `user_employer`
--

CREATE TABLE `user_employer` (
  `eId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `eName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `eEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cContact` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cAddress` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cNumber` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cPhoto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cType` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `user_employer`
--

INSERT INTO `user_employer` (`eId`, `uName`, `password`, `eName`, `eEmail`, `cName`, `cContact`, `cAddress`, `cNumber`, `cPhoto`, `cType`) VALUES
('e0000001', 'Krystal', '123', 'Jacky', 'cheunglokyin712@gmail.com', 'AKA', '12345678', 'KT', '1111111111', '', 'a'),
('e0000002', 'Cherrie', '123', 'Jacky', 'cheunglokyin712@gmail.com', 'AKA', '12345678', 'KT', '1111111111', '', 'c');

-- --------------------------------------------------------

--
-- 資料表結構 `user_member`
--

CREATE TABLE `user_member` (
  `mId` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mContact` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mType` enum('yes','no') NOT NULL DEFAULT 'no',
  `mCategory` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mPhoto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lesson1Progress` int(11) DEFAULT NULL,
  `lesson2Progress` int(11) DEFAULT NULL,
  `lesson3Progress` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `user_member`
--

INSERT INTO `user_member` (`mId`, `uName`, `password`, `mName`, `mContact`, `mEmail`, `mType`, `mCategory`, `mPhoto`, `lesson1Progress`, `lesson2Progress`, `lesson3Progress`) VALUES
('m0000001', 'Sally', '123', 'Cheung Lok Yin', '56069671', 'cheunglokyin712@gmail.com', 'yes', 'deaf', '', NULL, NULL, NULL),
('m0000002', 'Jacky', '123', 'Cheung Lok Yin', '56069671', 'cheunglokyin712@gmail.com', 'yes', 'mute', '', NULL, NULL, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `apply_list`
--
ALTER TABLE `apply_list`
  ADD PRIMARY KEY (`aId`),
  ADD KEY `fk_jId` (`jId`),
  ADD KEY `fk_mId` (`mId`);

--
-- 資料表索引 `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatId`),
  ADD KEY `fk_sender` (`senderId`),
  ADD KEY `fk_receiver` (`receiverId`);

--
-- 資料表索引 `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`jId`),
  ADD KEY `fk_eId` (`eId`);

--
-- 資料表索引 `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `mId` (`mId`);

--
-- 資料表索引 `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`nNo`);

--
-- 資料表索引 `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lessonId`),
  ADD KEY `lessonId` (`lessonId`);

--
-- 資料表索引 `lesson_detail`
--
ALTER TABLE `lesson_detail`
  ADD PRIMARY KEY (`sId`),
  ADD KEY `lessonId` (`lessonId`);

--
-- 資料表索引 `lesson_quiz`
--
ALTER TABLE `lesson_quiz`
  ADD PRIMARY KEY (`quizId`),
  ADD KEY `lessonId` (`lessonId`);

--
-- 資料表索引 `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uId`);

--
-- 資料表索引 `user_employer`
--
ALTER TABLE `user_employer`
  ADD PRIMARY KEY (`eId`);

--
-- 資料表索引 `user_member`
--
ALTER TABLE `user_member`
  ADD PRIMARY KEY (`mId`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `apply_list`
--
ALTER TABLE `apply_list`
  ADD CONSTRAINT `fk_jId` FOREIGN KEY (`jId`) REFERENCES `employment` (`jId`),
  ADD CONSTRAINT `fk_mId` FOREIGN KEY (`mId`) REFERENCES `user_member` (`mId`);

--
-- 資料表的限制式 `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_receiver` FOREIGN KEY (`receiverId`) REFERENCES `login` (`uId`),
  ADD CONSTRAINT `fk_sender` FOREIGN KEY (`senderId`) REFERENCES `login` (`uId`);

--
-- 資料表的限制式 `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `fk_eId` FOREIGN KEY (`eId`) REFERENCES `user_employer` (`eId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
