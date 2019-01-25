CREATE DATABASE library;
-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2018 at 08:42 PM
-- Server version: 5.5.45
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: 'library'
--

-- --------------------------------------------------------

--
-- Table structure for table 'books'
--

CREATE TABLE 'books' (
  'ISBN'      VARCHAR(16) NOT NULL,
  'BookTitle' VARCHAR(64) NOT NULL,
  'Author'    VARCHAR(64) NOT NULL,
  'Edition'   INT(2) DEFAULT NULL,
  'Year'      YEAR(4)     NOT NULL,
  'Category'  INT(3)      NOT NULL,
  'Reserved'  VARCHAR(1)  NOT NULL
);

--
-- Dumping data for table 'books'
--

INSERT INTO 'books' ('ISBN', 'BookTitle', 'Author', 'Edition', 'Year', 'Category', 'Reserved')
VALUES
('093-403992', 'Computers in Business', 'Alicia Oneill', 3, 1997, 3, 'N'),
('23472-8729', 'Exploring Peru', 'Stephanie Birchin', 4, 2005, 5, 'N'),
('237-34823', 'Business Strategy', 'Joe Peppard', 2, 2002, 2, 'N'),
('23u8-923849', 'A guide to nutrition', 'John Thorpe', 2, 1997, 1, 'N'),
('2983-3494', 'Cooking for children', 'Anabelle Sharpel', 1, 2003, 7, 'N'),
('82n8-308', 'Computers for idiots', 'Susan O Neil', 5, 1998, 4, 'N'),
('9823-23984', 'My life in picture', 'Kevin Graham', 8, 2004, 1, 'N'),
('9823-2403-0', 'DaVinci Code', 'Dan Brown', 1, 2003, 8, 'N'),
('9823-98345', 'How to cook Italian food', 'Jamie Oliver', 2, 2005, 7, 'N'),
('9823-98487', 'Optimizing your business', 'Cleo Blair', 1, 2001, 2, 'N'),
('98234-029384', 'My ranch in Texas', 'George Bush', 1, 2005, 1, 'N'),
('988745-234', 'Tara Road', 'Maeve Binchy', 4, 2002, 8, 'N'),
('993-004-00', 'My life in bits', 'John Smith', 1, 2001, 1, 'N'),
('9987-0039882', 'Shooting History', 'Jon Snow', 1, 2003, 1, 'N');

-- --------------------------------------------------------

--
-- Table structure for table 'category'
--

CREATE TABLE 'category' (
  'CategoryID'      INT(3)      NOT NULL,
  'CategoryDetails' VARCHAR(32) NOT NULL
);

--
-- Dumping data for table 'category'
--

INSERT INTO 'category' ('CategoryID', 'CategoryDetails')
VALUES
  (1, 'Health'),
  (2, 'Business'),
  (3, 'Biography'),
  (4, 'Technology'),
  (5, 'Travel'),
  (6, 'Self-Help'),
  (7, 'Cookery'),
  (8, 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table 'reservations'
--

CREATE TABLE 'reservations' (
  'ISBN'            VARCHAR(32) NOT NULL,
  'Username'        VARCHAR(32) NOT NULL,
  'ReservationDate' DATE        NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table 'users'
--

CREATE TABLE 'users' (
  'Username'     VARCHAR(32) NOT NULL,
  'Password'     VARCHAR(32) NOT NULL,
  'Firstname'    VARCHAR(32) NOT NULL,
  'Surname'      VARCHAR(32) NOT NULL,
  'AddressLine1' VARCHAR(64) DEFAULT NULL,
  'AddressLine2' VARCHAR(64) DEFAULT NULL,
  'City'         VARCHAR(32) NOT NULL,
  'Telephone'    VARCHAR(10) DEFAULT NULL,
  'Mobile'       VARCHAR(10) NOT NULL
);

--
-- Dumping data for table 'users'
--

INSERT INTO 'users' ('Username', 'Password', 'Firstname', 'Surname', 'AddressLine1', 'AddressLine2', 'City',
                     'Telephone', 'Mobile')
VALUES
('calexc95', '123', 'Alexandru Constanti', 'Cardas', '9 Edenbrook Court', 'Rathfarnham, Dublin 14', 'Dublin',
 '012345678', '0870551944'),
('Cristina', '1233456', 'Cristina', 'Cardas', '20 Wallmart', 'Tallagh, Dublin 24', 'Dublin', '19872345', '873209719');

--
-- Indexes for dumped tables
--

--
-- Indexes for table 'books'
--
ALTER TABLE 'books'
  ADD PRIMARY KEY ('ISBN'),
  ADD KEY 'category_PK' ('Category');

--
-- Indexes for table 'category'
--
ALTER TABLE 'category'
  ADD PRIMARY KEY ('CategoryID');

--
-- Indexes for table 'reservations'
--
ALTER TABLE 'reservations'
  ADD PRIMARY KEY ('ISBN', 'Username'),
  ADD KEY 'reservedBY_fk' ('Username');

--
-- Indexes for table 'users'
--
ALTER TABLE 'users'
  ADD PRIMARY KEY ('Username');

--
-- Constraints for dumped tables
--

--
-- Constraints for table 'books'
--
ALTER TABLE 'books'
  ADD CONSTRAINT 'category_PK' FOREIGN KEY ('Category') REFERENCES 'category' ('CategoryID');

--
-- Constraints for table 'reservations'
--
ALTER TABLE 'reservations'
  ADD CONSTRAINT 'BookReserved' FOREIGN KEY ('ISBN') REFERENCES 'books' ('ISBN'),
  ADD CONSTRAINT 'reservedBY_fk' FOREIGN KEY ('Username') REFERENCES 'users' ('Username');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
