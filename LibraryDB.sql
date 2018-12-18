-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2018 at 01:04 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LibraryDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin`
(
  `first_name` varchar
(30) NOT NULL,
  `last_name` varchar
(30) NOT NULL,
  `email` varchar
(30) NOT NULL,
  `password` varchar
(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`
first_name`,
`last_name
`, `email`, `password`) VALUES
('John', 'Boby', 'johnb@sdsu.edu', '12345678'),
('Krishna', 'vk', 'vk@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bookInventory`
--

CREATE TABLE `bookInventory`
(
  `bookTitle` varchar
(50) NOT NULL,
  `authorFirstName` varchar
(50) NOT NULL,
  `authorLastName` varchar
(50) NOT NULL,
  `availability` varchar
(50) NOT NULL,
  `ISBN` varchar
(50) NOT NULL,
  `coverImage` varchar
(50) NOT NULL,
  `summary` varchar
(10000) NOT NULL,
  `admin_email` varchar
(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookInventory`
--

INSERT INTO `bookInventory` (`
bookTitle`,
`authorFirstName
`, `authorLastName`, `availability`, `ISBN`, `coverImage`, `summary`, `admin_email`) VALUES
('C Programming Language', 'Brian ', 'W. Kernighan', '19', '0131103628', 'cprogramming.png', 'This ebook is the first authorized digital version of Kernighan and Ritchieâ€™s 1988 classic, The C Programming Language (2nd Ed.). One of the best-selling programming books published in the last fifty years, \"K&R\" has been called everything from the \"bible\" to \"a landmark in computer science\" and it has influenced generations of programmers. Available now for all leading ebook platforms, this concise and beautifully written text is a \"must-have\" reference for every serious programmerâ€™s digital library.\r\n\r\n \r\n\r\nAs modestly described by the authors in the Preface to the First Edition, this \"is not an introductory programming manual; it assumes some familiarity with basic programming concepts like variables, assignment statements, loops, and functions. Nonetheless, a novice programmer should be able to read along and pick up the language, although access to a more knowledgeable colleague will help.\"', 'vk@gmail.com'),
('True Places: A Novel', 'Sonja ', 'Yoerg', '40', '1238104239297', 'true_places.png', '             uzanne Blakemore hurtles along the Blue Ridge Parkway, away from her overscheduled and completely normal life, and encounters the girl. As Suzanne rushes her to the hospital, she never imagines how the encounter will change herâ€”a change she both fears and desperately needs.\r\n\r\nSuzanne has the perfect house, a successful husband, and a thriving family. But beneath the veneer of an ideal life, her daughter is rebelling, her son is withdrawing, her husband is oblivious to it all, and Suzanne is increasingly unsure of her place in the world. After her discovery of the ethereal sixteen-year-old who has never experienced civilization, Suzanne is compelled to invite Iris into her familyâ€™s life and all its apparent privileges.                   ', 'vk@gmail.com'),
('The Alchemist', 'Paulo', 'Coelho', '30', '13406014', 'theAlchemist.jpg', '   This is alchemist', 'vk@gmail.com'),
('Where the Red Fern Grows', 'Wilson', 'Rawls', '4', '24983750', 'whereTheRedFernGrowsCover.jpg', '                                ', 'vk@gmail.com'),
('The Hitchhiker\'s Guide to the Galaxy', 'Douglas', 'Adams', '8', '58010234', 'hitchHikerCover.jpg', '', 'vk@gmail.com'),
('Lord of the Flies', 'William', 'Golding', '30', '67191293', 'lordOfTheFiles.jpg', 'Lord of the Flies is a 1954 novel by Nobel Prizeâ€“winning British author William Golding. The book focuses on a group of British boys stranded on an uninhabited island and their disastrous attempt to govern themselves.\r\n\r\nThe novel has been generally well received. It was named in the Modern Library 100 Best Novels, reaching number 41 on the editor\'s list, and 25 on the reader\'s list. In 2003 it was listed at number 70 on the BBC\'s The Big Read poll, and in 2005 Time magazine named it as one of the 100 best English-language novels from 1923 to 2005.                                ', 'vk@gmail.com'),
('Lord of the Rings', 'J. R. R.', 'Tolkien', '10', '71326599', 'lordOfTheRingsCover.jpg', '                                ', 'vk@gmail.com'),
('Zero to One', 'Peter', 'Thiel', '19', '9780804139298', 'zerotoone.png', '                                The great secret of our time is that there are still uncharted frontiers to explore and new inventions to create. In Zero to One, legendary entrepreneur and investor Peter Thiel shows how we can find singular ways to create those new things. \r\n\r\nThiel begins with the contrarian premise that we live in an age of technological stagnation, even if weâ€™re too distracted by shiny mobile devices to notice. Information technology has improved rapidly, but there is no reason why progress should be limited to computers or Silicon Valley. Progress can be achieved in any industry or area of business. It comes from the most important skill that every leader must master: learning to think for yourself.\r\n\r\nDoing what someone else already knows how to do takes the world from 1 to n, adding more of something familiar. But when you do something new, you go from 0 to 1. The next Bill Gates will not build an operating system. The next Larry Page or Sergey Brin wonâ€™t make a search engine. Tomorrowâ€™s champions will not win by competing ruthlessly in todayâ€™s marketplace. They will escape competition altogether, because their businesses will be unique. ', 'vk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow`
(
  `ISBN` varchar
(50) NOT NULL,
  `redid` varchar
(50) NOT NULL,
  `check-in` date NOT NULL,
  `check-out` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`
ISBN`,
`redid
`, `check-in`, `check-out`) VALUES
('0131103628', '000000171', '2018-12-17', '2018-12-12'),
('1238104239297', '000000169', '2018-12-16', '2018-12-11'),
('13406014', '000000168', '2018-12-16', '2018-12-11'),
('24983750', '000000170', '2018-12-16', '2018-12-11'),
('58010234', '000000170', '2018-12-16', '2018-12-11'),
('9780804139298', '000000169', '2018-12-16', '2018-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student`
(
  `redid` varchar
(20) NOT NULL,
  `first_name` varchar
(40) NOT NULL,
  `second_name` varchar
(40) NOT NULL,
  `email` varchar
(50) NOT NULL,
  `phone` varchar
(10) NOT NULL,
  `password` varchar
(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`
redid`,
`first_name
`, `second_name`, `email`, `phone`, `password`) VALUES
('000000168', 'Krishna', 'Vinay', 'v@gmail.com', '3312322323', '42ee5e87eeeff44e80b1db746c0b9ce46bdad8dc8dddf2aeb462cf11bc591bf3'),
('000000169', 'Vinaya', 'Krishna', 'vinaya.krishna.94@gmail.com', '3312506261', '42ee5e87eeeff44e80b1db746c0b9ce46bdad8dc8dddf2aeb462cf11bc591bf3'),
('000000170', 'Joseph', 'Jo', 'joseph@gmail.com', '3334443343', '42ee5e87eeeff44e80b1db746c0b9ce46bdad8dc8dddf2aeb462cf11bc591bf3'),
('000000171', 'Krishna', 'VK', 'vinay@gmail.com', '3332322323', '42ee5e87eeeff44e80b1db746c0b9ce46bdad8dc8dddf2aeb462cf11bc591bf3'),
('816988452', 'Brian', 'Rafferty', 'bprafferty03@gmail.com', '9493958437', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
ADD PRIMARY KEY
(`email`);

--
-- Indexes for table `bookInventory`
--
ALTER TABLE `bookInventory`
ADD PRIMARY KEY
(`ISBN`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
ADD PRIMARY KEY
(`ISBN`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
ADD PRIMARY KEY
(`redid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
