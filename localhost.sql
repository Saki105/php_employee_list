-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 
-- サーバのバージョン： 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `original`
--
CREATE DATABASE IF NOT EXISTS `original` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `original`;

-- --------------------------------------------------------

--
-- テーブルの構造 `account`
--

CREATE TABLE `account` (
  `id` int(15) NOT NULL,
  `num` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `login_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `create_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `employee_list`
--

CREATE TABLE `employee_list` (
  `id` int(10) NOT NULL COMMENT '登録順',
  `num` varchar(255) NOT NULL COMMENT '社員番号',
  `name` varchar(20) DEFAULT NULL COMMENT '名前',
  `furigana` varchar(255) DEFAULT NULL COMMENT 'フリガナ',
  `romaji` varchar(255) DEFAULT NULL COMMENT 'ローマ字',
  `birthday` varchar(15) DEFAULT NULL COMMENT '生年月日',
  `gender` varchar(255) DEFAULT NULL COMMENT '性別',
  `status` int(15) DEFAULT NULL COMMENT '0:管理者 1:正社員 2:契約社員 3:パート、アルバイト',
  `dept` varchar(255) DEFAULT NULL COMMENT '部',
  `section` varchar(255) DEFAULT NULL COMMENT '課',
  `grade` varchar(255) DEFAULT NULL COMMENT '等級',
  `position` varchar(255) DEFAULT NULL COMMENT '役職',
  `joined_date` varchar(15) DEFAULT NULL COMMENT '入社日',
  `retirement_date` varchar(15) DEFAULT NULL COMMENT '退職日',
  `password` varchar(100) NOT NULL COMMENT 'パスワード'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `employee_list`
--

INSERT INTO `employee_list` (`id`, `num`, `name`, `furigana`, `romaji`, `birthday`, `gender`, `status`, `dept`, `section`, `grade`, `position`, `joined_date`, `retirement_date`, `password`) VALUES
(1, 'A0005', '村山　由佳', 'ムラヤマ　ユカ', 'Yuka Murayama', '1964-07-10', 'F', 0, '経営管理部', '', '8等級', '部長', '1986-04-01', NULL, 'a0005test'),
(2, 'A0003', '宮部　みゆき', 'ミヤベ　ミユキ', 'Miyuki Miyabe', '1960-12-23', 'F', 1, '経営管理部', '人事課', '7等級', '課長', '1982-04-01', NULL, 'a0003test'),
(3, 'A0001', '東野　圭吾', 'ヒガシノ　ケイゴ', 'Keigo Higashino', '1958-02-04 ', 'M', 1, '経営管理部', '人事課', '6等級', '係長', '1980-04-01', NULL, 'a0001test'),
(4, 'A0004', '重松　清', 'シゲマツ　キヨシ', 'Kiyoshi Shigematsu', '1963-03-06', 'M', 1, '経営管理部', '人事課', '5等級', '主任', '1985-07-01', NULL, 'a0004test'),
(5, 'A0002', '辻　仁成', 'ツジ　ヒトナリ', 'Hitonari Tsuji', '1959-10-04', 'M', 1, '経営管理部', '総務課', '7等級', '課長', '1981-04-01', NULL, 'a0002test'),
(6, 'A0006', '江國　香織', 'エクニ　カオリ', 'Kaori Ekuni', '1964-03-21', 'F', 1, '経営管理部', '総務課', '6等級', '係長', '1990-11-01', NULL, 'a0006test'),
(7, 'B0001', '三浦　しをん', 'ミウラ　シヲン', 'shion Miura', '1976-09-23', 'F', 2, '経営管理部', '総務課', '-', '-', '2000-10-05', NULL, 'b0001test'),
(8, 'P0001', '瀬尾　まいこ', 'セオ　マイコ', 'Maiko Seo', '1974-01-16', 'F', 3, '経営管理部', '総務課', '-', '-', '1998-01-20', NULL, 'p0001test'),
(9, 'A0009', 'てすと　てすと', 'テスト　テスト', 'test test', '1935-12-11', 'M', 1, '経営管理部', '経理課', '7等級', '課長', '1960-07-01', '', '$2y$10$RvQAFX'),
(10, 'A0011', '更新テスト', 'コウシンテスト', 'koushin', '1939-12-11', 'M', 1, '経営管理部', '経理課', '6等級', '係長', '1955-02-20', '', '$2y$10$T'),
(12, 'test', 'admin', 'test', 'test', '2000-11-25', 'F', 1, 'test', 'test', '-', '-', '2020-02-26', '2020-02-26', '78ca831243b030a81ba918684835667d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_list`
--
ALTER TABLE `employee_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_list`
--
ALTER TABLE `employee_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '登録順', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
