-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 08:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shodh_information`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_information`
--

CREATE TABLE `admin_information` (
  `email` varchar(100) NOT NULL,
  `adminType` varchar(50) NOT NULL,
  `adminDepartment` varchar(50) NOT NULL,
  `adminEvent` varchar(50) NOT NULL,
  `adminPassword` varchar(70) NOT NULL,
  `token` varchar(150) DEFAULT NULL,
  `tokenDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_information`
--

INSERT INTO `admin_information` (`email`, `adminType`, `adminDepartment`, `adminEvent`, `adminPassword`, `token`, `tokenDate`) VALUES
('facultychem@gmail.com', 'Faculty Coordinator', 'Chemical', 'Not Applicable', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('facultycivil@gmail.com', 'Faculty Coordinator', 'Civil', 'Not Applicable', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('facultycomp@gmail.com', 'Faculty Coordinator', 'Computer', 'Not Applicable', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('facultyextc@gmail.com', 'Faculty Coordinator', 'Electronics and Telecommunication', 'Not Applicable', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('facultymech@gmail.com', 'Faculty Coordinator', 'Mechanical', 'Not Applicable', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('gitshodhadmin@gmail.com', 'Administrator', 'Not Applicable', 'Not Applicable', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('studentchem-paperpresentation@gmail.com', 'Student Coordinator', 'Chemical', 'Chemical Paper Presentation', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('studentchem-posterpresentation@gmail.com', 'Student Coordinator', 'Chemical', 'Chemical Poster Presentation', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('studentchem-projectpresentation@gmail.com', 'Student Coordinator', 'Chemical', 'Chemical Project Presentation', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('studentcivil-paperpresentation@gmail.com', 'Student Coordinator', 'Civil', 'Civil Paper Presentation', '$2y$10$ZzONx3vWZTKa9sQGoLo3O.tfqJGNaYFRrE4tFE3NDo1aNMOrJBWVa', NULL, NULL),
('studentcivil-posterpresentation@gmail.com', 'Student Coordinator', 'Civil', 'Civil Poster Presentation', '$2y$10$OhQZnIIszIrYmaI4TtJzs.KWt9NmREb/U7h89/BneDHe1Ji/z9vLe', NULL, NULL),
('studentcivil-projectpresentation@gmail.com', 'Student Coordinator', 'Civil', 'Civil Project Presentation', '$2y$10$pPugWo.JtZjGgCXr3Weh..IQRGjo3220hBFD.iQ0kHpe3ztfau/sG', NULL, NULL),
('studentcomp-paperpresentation@gmail.com', 'Student Coordinator', 'Computer', 'Computer Paper Presentation', '$2y$10$TULeUABS0H.N0o5MX/yEoOpq/JEoOI5jUI2VyxFcHCO26lVPsWAfu', NULL, NULL),
('studentcomp-posterpresentation@gmail.com', 'Student Coordinator', 'Computer', 'Computer Poster Presentation', '$2y$10$La84qcQAb8z0gq.CxgBmLuQQyrYcAyCSxNbdOKz7wWhD.J7HTJ7.O', NULL, NULL),
('studentcomp-projectpresentation@gmail.com', 'Student Coordinator', 'Computer', 'Computer Project Presentation', '$2y$10$PLftWoiFmF9jValTYODD3uM9htSpWKfb0mrKDs8/NwGMsJRe0t0HS', NULL, NULL),
('studentextc-calciwar@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'Calci War', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('studentextc-logocontest@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'Logo Contest', '', NULL, NULL),
('studentextc-paperpresentation@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'EXTC Paper Presentation', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('studentextc-posterpresentation@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'EXTC Poster Presentation', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('studentextc-projectpresentation@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'EXTC Project Presentation', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('studentextc-techboss@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'Tech Boss', '$2y$10$F5cE6U6aK6XdufVFbquZfOl8LrDFGadQt/ak8atQZUC8THCP5TOhC', NULL, NULL),
('studentmech-paperpresentation@gmail.com', 'Student Coordinator', 'Mechanical', 'Mechanical Paper Presentation', '$2y$10$p.1X7YmwdlO3Zu3Cj6o1eeU6ZOjKWfB22H1T619peAy/DystfB8ES', NULL, NULL),
('studentmech-posterpresentation@gmail.com', 'Student Coordinator', 'Mechanical', 'Mechanical Poster Presentation', '$2y$10$dx3U5rFEUxQGDIiK2jb0.uGBWEhy3n7a/jXaSBPL3HoVjrsvLBpA.', NULL, NULL),
('studentmech-projectpresentation@gmail.com', 'Student Coordinator', 'Mechanical', 'Mechanical Project Presentation', '$2y$10$FTOddthKgQhMm/II/tmSwu9JNE/lVsbAZlxEQM55BBw0IQtMIRu6y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_details_information`
--

CREATE TABLE `events_details_information` (
  `id` int(80) NOT NULL,
  `eventImage` varchar(150) NOT NULL,
  `eventName` varchar(80) NOT NULL,
  `eventPrice` int(100) NOT NULL,
  `promocode` varchar(100) DEFAULT 'Not Applicable',
  `discount` int(5) DEFAULT '0',
  `eventPrize` int(100) NOT NULL,
  `eventSponsor` varchar(255) NOT NULL,
  `eventDepartment` varchar(100) NOT NULL,
  `eventDescription` text NOT NULL,
  `eventRules` text NOT NULL,
  `eventCoordinator` varchar(255) NOT NULL,
  `eventStartDate` date NOT NULL,
  `eventEndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_details_information`
--

INSERT INTO `events_details_information` (`id`, `eventImage`, `eventName`, `eventPrice`, `promocode`, `discount`, `eventPrize`, `eventSponsor`, `eventDepartment`, `eventDescription`, `eventRules`, `eventCoordinator`, `eventStartDate`, `eventEndDate`) VALUES
(3, 'extcProject.jpg', 'EXTC Project Presentation', 200, 'techfest123', 10, 2000, 'Gharda Foundation', 'Electronics and Telecommunication', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi optio dolores, reprehenderit doloribus.</p>\n', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi optio dolores, reprehenderit doloribus.</p>\n', '<p><strong>Name:- Vishal Bait</strong></p>\n\n<p><strong>Mobile Number:- 9373241085</strong></p>\n', '2021-04-15', '2021-04-16'),
(4, 'calciwar.jpg', 'Calci War', 50, 'Not Applicable', 0, 500, 'Gharda Foundation', 'Electronics and Telecommunication', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(5, 'techBoss.jpg', 'Tech Boss', 100, 'Not Applicable', 0, 1000, 'Gharda Foundation', 'Electronics and Telecommunication', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(6, 'funTech.jpg', 'Fun Tech', 100, 'Not Applicable', 0, 1000, 'Gharda Foundation', 'Electronics and Telecommunication', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(7, 'school.jpg', 'School Event', 0, 'Not Applicable', 0, 0, 'Gharda Foundation', 'Electronics and Telecommunication', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(8, 'logoContest.jpg', 'Logo Contest', 100, 'Not Applicable', 0, 1000, 'Gharda Foundation', 'Electronics and Telecommunication', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(9, 'paper.jpg', 'Chemical Paper Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Chemical', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(10, 'poster.jpg', 'Chemical Poster Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Chemical', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(11, 'chemProject.jpg', 'Chemical Project Presentation', 200, 'Not Applicable', 0, 2000, 'Gharda Foundation', 'Chemical', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(12, 'images/paper.jpg', 'Computer Paper Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Computer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(13, 'poster.jpg', 'Computer Poster Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Computer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(14, 'compProject.jpg', 'Computer Project Presentation', 200, 'Not Applicable', 0, 2000, 'Gharda Foundation', 'Computer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(15, 'paper.jpg', 'Mechanical Paper Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Mechanical', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(16, 'paper.jpg', 'Civil Paper Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Civil', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(17, 'poster.jpg', 'Mechanical Poster Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Mechanical', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(18, 'poster.jpg', 'Civil Poster Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Civil', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(19, 'mechProject.jpg', 'Mechanical Project Presentation', 200, 'Not Applicable', 0, 2000, 'Gharda Foundation', 'Mechanical', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(20, 'civilProject.jpg', 'Civil Project Presentation', 200, 'Not Applicable', 0, 2000, 'Gharda Foundation', 'Civil', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
(21, 'paper.jpg', 'EXTC Paper Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Electronics and Telecommunication', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi optio dolores, reprehenderit doloribus.	Lorem ipsum ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi optio dolores, reprehenderit doloribus.	Lorem ipsum ', 'Vishal Bait 9373241085', '2020-06-05', '2020-06-06'),
(22, 'poster.jpg', 'EXTC Poster Presentation', 100, 'Not Applicable', 0, 1000, 'Gharda Foundation', 'Electronics and Telecommunication', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi optio dolores, reprehenderit doloribus.	Lorem ipsum ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi optio dolores, reprehenderit doloribus.	Lorem ipsum ', 'Vishal Bait 9373241085', '2020-06-05', '2020-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `event_information`
--

CREATE TABLE `event_information` (
  `email` varchar(100) NOT NULL,
  `certificateId` int(35) NOT NULL,
  `event` varchar(30) NOT NULL,
  `paymentType` varchar(30) NOT NULL,
  `prize` varchar(30) NOT NULL DEFAULT 'NONE',
  `gatewayName` varchar(100) NOT NULL,
  `resMsg` varchar(100) NOT NULL,
  `bankName` varchar(100) NOT NULL,
  `txnId` varchar(255) NOT NULL,
  `txnAmount` varchar(100) NOT NULL,
  `orderId` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `bankTxnId` varchar(150) NOT NULL,
  `txnDate` datetime(6) NOT NULL,
  `attendStatus` varchar(60) NOT NULL DEFAULT 'absent'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_information`
--

INSERT INTO `event_information` (`email`, `certificateId`, `event`, `paymentType`, `prize`, `gatewayName`, `resMsg`, `bankName`, `txnId`, `txnAmount`, `orderId`, `status`, `bankTxnId`, `txnDate`, `attendStatus`) VALUES
('testuser01@gmail.com', 1304984771, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'present'),
('testuser02@gmail.com', 1636529635, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200628111212800110168059701676201', '150.00', 'ORDS43447762', 'TXN_SUCCESS', '62726044', '2020-06-28 22:44:35.000000', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_information`
--

CREATE TABLE `feedback_information` (
  `email` varchar(150) NOT NULL,
  `attendBefore` varchar(30) NOT NULL,
  `likelyAttend` varchar(50) NOT NULL,
  `likelyRecommendFriend` varchar(50) NOT NULL,
  `likeMost` varchar(200) NOT NULL,
  `likeLeast` varchar(200) NOT NULL,
  `location` varchar(50) NOT NULL,
  `events` varchar(50) NOT NULL,
  `coordinators` varchar(50) NOT NULL,
  `eventsPrice` varchar(50) NOT NULL,
  `suggestion` varchar(255) NOT NULL,
  `feedbackDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_information`
--

INSERT INTO `feedback_information` (`email`, `attendBefore`, `likelyAttend`, `likelyRecommendFriend`, `likeMost`, `likeLeast`, `location`, `events`, `coordinators`, `eventsPrice`, `suggestion`, `feedbackDate`) VALUES
('testuser01@gmail.com', 'no', '4', '4', 'Good', 'Good', '2', '3', '2', '5', 'Good', '2020-08-12 20:15:07'),
('testuser02@gmail.com', 'no', '5', '3', 'Good', 'Good', '4', '3', '1', '5', 'Good', '2020-09-08 23:33:11'),
('testuser03@gmail.com', 'no', '4', '4', 'Good', 'Good', '5', '5', '4', '4', 'Good', '2020-09-08 23:33:11'),
('testuser04@gmail.com', 'no', '4', '4', 'Good', 'Good', '2', '5', '5', '5', 'Good', '2020-09-08 23:33:11'),
('testuser05@gmail.com', 'no', '5', '4', 'Good', 'Good', '5', '1', '2', '5', 'Good', '2020-09-08 23:33:11'),
('testuser06@gmail.com', 'no', '3', '4', 'Good', 'Good', '5', '3', '4', '2', 'Good', '2020-09-08 23:33:11'),
('testuser07@gmail.com', 'no', '4', '5', 'Good', 'Good', '4', '3', '5', '5', 'Good', '2020-09-08 23:33:11'),
('testuser08@gmail.com', 'no', '4', '3', 'Good', 'Good', '5', '3', '4', '5', 'Good', '2020-09-08 23:33:11'),
('testuser09@gmail.com', 'no', '4', '4', 'Good', 'Good', '4', '5', '4', '5', 'Good', '2020-09-08 23:33:11'),
('testuser10@gmail.com', 'no', '4', '2', 'Good', 'Good', '4', '4', '4', '5', 'Good', '2020-09-08 23:33:11'),
('testuser11@gmail.com', 'no', '5', '3', 'Good', 'Good', '3', '5', '4', '5', 'Good', '2020-09-08 23:33:11'),
('testuser12@gmail.com', 'no', '4', '4', 'Good', 'Good', '5', '4', '5', '5', 'Good', '2020-09-08 23:33:11'),
('testuser13@gmail.com', 'no', '2', '4', 'Good', 'Good', '5', '4', '2', '5', 'Good', '2020-09-08 23:33:11'),
('testuser14@gmail.com', 'no', '1', '3', 'Good', 'Good', '2', '4', '4', '2', 'Good', '2020-09-08 23:33:11'),
('testuser15@gmail.com', 'no', '4', '5', 'Good', 'Good', '5', '3', '4', '5', 'Good', '2020-09-08 23:33:11'),
('testuser16@gmail.com', 'no', '4', '4', 'Good', 'Good', '4', '4', '2', '2', 'Good', '2020-09-08 23:33:11'),
('testuser17@gmail.com', 'no', '4', '4', 'Good', 'Good', '2', '3', '5', '5', 'Good', '2020-09-08 23:33:11'),
('testuser18@gmail.com', 'no', '2', '3', 'Good', 'Good', '2', '3', '5', '5', 'Good', '2020-09-08 23:33:11'),
('testuser19@gmail.com', 'no', '5', '5', 'Good', 'Good', '5', '5', '2', '5', 'Good', '2020-09-08 23:33:11'),
('testuser20@gmail.com', 'no', '4', '3', 'Good', 'Good', '3', '3', '3', '3', 'Good', '2020-09-08 23:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_information`
--

CREATE TABLE `gallery_information` (
  `id` int(5) NOT NULL,
  `galleryImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_information`
--

INSERT INTO `gallery_information` (`id`, `galleryImage`) VALUES
(3, 'slide1.jpg'),
(4, 'slide2.jpg'),
(5, 'slide3.jpg'),
(6, 'slide4.jpg'),
(7, 'slide5.jpg'),
(8, 'slide6.jpg'),
(9, 'slide7.jpg'),
(11, 'slide9.jpg'),
(12, 'slide10.jpg'),
(13, 'slide11.jpg'),
(14, 'slide12.jpg'),
(15, 'slide13.jpg'),
(16, 'slide14.jpg'),
(17, 'slide15.jpg'),
(18, 'slide16.jpg'),
(19, 'slide17.jpg'),
(21, 'slide19.jpg'),
(22, 'slide20.jpg'),
(23, 'slide21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_information`
--

CREATE TABLE `newsletter_information` (
  `id` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subscribe` varchar(50) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_information`
--

INSERT INTO `newsletter_information` (`id`, `email`, `subscribe`) VALUES
(1, 'testuser01@gmail.com', 'Yes'),
(2, 'testuser02@gmail.com', 'Yes'),
(3, 'testuser03@gmail.com', 'Yes'),
(4, 'testuser04@gmail.com', 'Yes'),
(5, 'testuser05@gmail.com', 'Yes'),
(6, 'testuser06@gmail.com', 'Yes'),
(7, 'testuser07@gmail.com', 'Yes'),
(8, 'testuser08@gmail.com', 'Yes'),
(9, 'testuser09@gmail.com', 'Yes'),
(10, 'testuser10@gmail.com', 'Yes'),
(11, 'testuser11@gmail.com', 'Yes'),
(12, 'testuser12@gmail.com', 'Yes'),
(13, 'testuser13@gmail.com', 'Yes'),
(14, 'testuser14@gmail.com', 'Yes'),
(15, 'testuser15@gmail.com', 'Yes'),
(16, 'testuser16@gmail.com', 'Yes'),
(17, 'testuser17@gmail.com', 'Yes'),
(18, 'testuser18@gmail.com', 'Yes'),
(19, 'testuser19@gmail.com', 'Yes'),
(20, 'testuser20@gmail.com', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `news_information`
--

CREATE TABLE `news_information` (
  `id` int(11) NOT NULL,
  `newsTitle` varchar(150) NOT NULL,
  `newsDescription` text NOT NULL,
  `postedDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_information`
--

INSERT INTO `news_information` (`id`, `newsTitle`, `newsDescription`, `postedDate`) VALUES
(1, 'CANCELLATION OF GIT SHODH 2K20', ' Due to the unfortunate outbreak of COVID-19 in Indian Mainland, the administration of GIT Lavel along with Team Shodh has decided to cancel this edition of the fest as a precautionary measure according to GoI guidelines for the safety of participants. Further information about the refund process will be conveyed to all the participants via mail.\r\n\r\nThank you for showing interest in GIT SHODH 2020.\r\nHope to see you at GIT SHODH 2021', '2020-05-11 10:39:03.000000');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_information`
--

CREATE TABLE `sponsor_information` (
  `id` int(20) NOT NULL,
  `sponsorName` varchar(150) NOT NULL,
  `sponsorLogo` varchar(200) NOT NULL,
  `sponsoredEvent` varchar(100) NOT NULL,
  `sponsoredDepartment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor_information`
--

INSERT INTO `sponsor_information` (`id`, `sponsorName`, `sponsorLogo`, `sponsoredEvent`, `sponsoredDepartment`) VALUES
(8, 'Microsoft', 'microsoft_PNG10.png', 'All College', 'All College'),
(9, 'Google', 'google.png', 'All College', 'All College'),
(10, 'Gharda Chemicals', 'gharda.png', 'All College', 'All College');

-- --------------------------------------------------------

--
-- Table structure for table `synergy_user_information`
--

CREATE TABLE `synergy_user_information` (
  `userId` int(11) NOT NULL,
  `certificateId` int(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `departmentName` varchar(50) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `prize` varchar(30) NOT NULL DEFAULT 'NONE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `synergy_user_information`
--

INSERT INTO `synergy_user_information` (`userId`, `certificateId`, `firstName`, `lastName`, `departmentName`, `eventName`, `prize`) VALUES
(3, 793669864, 'Test', 'User01', 'Electronics and Telecommunication', 'Singing Competition', 'None'),
(5, 603862888, 'Test', 'User03', 'Chemical', 'Fishpond', 'None'),
(6, 11494271, 'Test', 'User04', 'Chemical', 'Dance Competition', 'None'),
(7, 617198528, 'Test', 'User05', 'Civil', 'Debate Competition', 'None'),
(8, 696777007, 'Test', 'User06', 'Civil', 'Quiz Competition', 'None'),
(9, 417517694, 'Test', 'User07', 'Mechanical', 'Fashion Show Competition', 'None'),
(10, 562647614, 'Test', 'User08', 'Mechanical', 'Drama Competition', 'None'),
(11, 273552090, 'Test', 'User09', 'Computer', 'Group Discussion Competition', 'None'),
(12, 44422342, 'Test', 'User10', 'Computer', 'Singing Competition', 'None'),
(13, 441087762, 'Test', 'User02', 'Electronics and Telecommunication', 'Antakshari', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `email` varchar(100) NOT NULL,
  `profileImage` varchar(100) NOT NULL DEFAULT 'defaultUser.png',
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `mobileNumber` bigint(20) DEFAULT NULL,
  `collegeName` varchar(60) DEFAULT NULL,
  `departmentName` varchar(60) DEFAULT NULL,
  `academicYear` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `token` varchar(150) NOT NULL,
  `tokenDate` datetime(6) DEFAULT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`email`, `profileImage`, `firstName`, `lastName`, `mobileNumber`, `collegeName`, `departmentName`, `academicYear`, `password`, `token`, `tokenDate`, `status`) VALUES
('testuser01@gmail.com', 'defaultUser.png', 'Test', 'User01', 1234567890, '(742 )Gharda Institute of Technology', 'Electronics and Telecommunication', 'Fourth Year', '$2y$10$Cbs/nJd6HxTK0njurIll6eSHKaiwQdWgx8EM.CLl.wbIQ1uNZO/YO', '0e243e390b3abb2480ddddd3b27368', '2020-07-11 09:11:29.000000', 'active'),
('testuser02@gmail.com', 'defaultUser.png', 'Test', 'User02', 1234567890, '(742 )Gharda Institute of Technology', 'Electronics and Telecommunication', 'Third Year', '$2y$10$KHYedk3t317gxqUBQoH.SONpkuUCBPBZLdB1pAoj1V2VHlDOqEhWK', '0e243e390b3abb2480ddddd3b27368', '2020-07-11 09:11:29.000000', 'active'),
('testuser03@gmail.com', 'defaultUser.png', 'Test', 'User03', 1234567890, '(742 )Gharda Institute of Technology', 'Electronics and Telecommunication', 'Second Year', '$2y$10$2jzr3l8sqIi.dcQbIbDGjOXv3rzE8Ig6SqJqO.PBjZIJPQqTc/e0a', '6cf909e91432e055b0eb463548ffe3', '2020-09-09 19:07:23.000000', 'active'),
('testuser04@gmail.com', 'defaultUser.png', 'Test', 'User04', 1234567890, '(742 )Gharda Institute of Technology', 'Electronics and Telecommunication', 'First Year', '$2y$10$9R5.Gsf0wT/IkhrN.ZVZ9O6ySCqbMIqAi.e7xPXQQ1NMfKt/PmEv2', '0e243e390b3abb2480ddddd3b27368', '2020-09-09 19:08:44.000000', 'active'),
('testuser05@gmail.com', 'defaultUser.png', 'Test', 'User05', 1234567890, '(742 )Gharda Institute of Technology', 'Chemical', 'Fourth Year', '$2y$10$fDpJdae9ZVl1MGXfMb8TaOe1zpW7s8M1sFkOLrw4iNC/..yQ/TOa6', 'e32b66be00dad88f6d1ec3e08682e5', '2020-09-09 19:13:08.000000', 'active'),
('testuser06@gmail.com', 'defaultUser.png', 'Test', 'User06', 1234567890, '(742 )Gharda Institute of Technology', 'Chemical', 'Third Year', '$2y$10$DpmJrtaIK9qEx6iFjz5youFHquyXDZ7JcsD9jh4BXPtr68flcCHte', 'a3dbe36861fc48fa3473ed15a6b609', '2020-09-09 19:14:09.000000', 'active'),
('testuser07@gmail.com', 'defaultUser.png', 'Test', 'User07', 1234567890, '(742 )Gharda Institute of Technology', 'Chemical', 'Second Year', '$2y$10$g3qar2QN/aKMz/uto.7IXOkdpk3znY7Ok/4V4tEL8rT7FpbT4RY9G', 'b4d6094e3273ab386504a15d4a0d00', '2020-09-09 19:15:30.000000', 'active'),
('testuser08@gmail.com', 'defaultUser.png', 'Test', 'User08', 1234567890, '(742 )Gharda Institute of Technology', 'Chemical', 'First Year', '$2y$10$L00Lwrq0Ot/dKWxUjA9f3OpAkQaMfVxm56wf8R31otgkdIPPf/k4y', '6175c8eb4ea6a6faa8e68ba0520b23', '2020-09-09 19:16:31.000000', 'active'),
('testuser09@gmail.com', 'defaultUser.png', 'Test', 'User09', 1234567890, '(742 )Gharda Institute of Technology', 'Civil', 'Fourth Year', '$2y$10$Ap4oTF2eN6BGFJC0j.43rO7mDDtf88KE5Eqlq.BYYFkNQUfMVEwz6', '14a0cdacc898f14f107811923b66a2', '2020-09-09 19:17:50.000000', 'active'),
('testuser10@gmail.com', 'defaultUser.png', 'Test', 'User10', 1234567890, '(742 )Gharda Institute of Technology', 'Civil', 'Third Year', '$2y$10$JAEFdMlsD6LmOJh5gb3Am.t3UJe3voNNJ9MxYCXFOwpWFc9vi4XVy', 'e1d7fa565f9a21e21bdea61fecc494', '2020-09-09 19:19:00.000000', 'active'),
('testuser11@gmail.com', 'defaultUser.png', 'Test', 'User11', 1234567890, '(742 )Gharda Institute of Technology', 'Civil', 'Second Year', '$2y$10$m4DEvlGZRWzH2jQAOsubsuXTDXaLz/KDOCjkflH5ysHKKVrcmCcUi', '1c453a235cff436e71d57284d13499', '2020-09-09 19:20:30.000000', 'active'),
('testuser12@gmail.com', 'defaultUser.png', 'Test', 'User12', 1234567890, '(742 )Gharda Institute of Technology', 'Civil', 'First Year', '$2y$10$yKkDv6G5sWd9HbfbZX5syeeZJSBmtIkZrKl7.0LlD7mIYZ9nzCbqS', '7b2155a3f4d96788c54c0929ea7032', '2020-09-09 19:22:28.000000', 'active'),
('testuser13@gmail.com', 'defaultUser.png', 'Test', 'User13', 1234567890, '(742 )Gharda Institute of Technology', 'Mechanical', 'Fourth Year', '$2y$10$VcWsY0KQwycnRGgQzJdu7e0xRyOZVOzf7Hq5gVs9o38Vg2/Xi0cc.', 'f5d09cb951e40a78e88c4f0c80bff4', '2020-09-09 19:24:18.000000', 'active'),
('testuser14@gmail.com', 'defaultUser.png', 'Test', 'User14', 1234567890, '(742 )Gharda Institute of Technology', 'Mechanical', 'Third Year', '$2y$10$MSg58lL7VxyXMUMx1ggCq.9OszIyOASyiY/Z1znKYW3XYB9P4Oc56', 'b4e33842e00f628d8bb87a6580ebab', '2020-09-09 19:25:38.000000', 'active'),
('testuser15@gmail.com', 'defaultUser.png', 'Test', 'User15', 1234567890, '(742 )Gharda Institute of Technology', 'Mechanical', 'Second Year', '$2y$10$cB1PzlX5A019v50JJjFPTuJwQYPlIDEMuXgMUVb3KnQxnuYhh9d1W', '6f3f65358fead04e17c6ebff3f51ef', '2020-09-09 19:27:02.000000', 'active'),
('testuser16@gmail.com', 'defaultUser.png', 'Test', 'User16', 1234567890, '(742 )Gharda Institute of Technology', 'Mechanical', 'First Year', '$2y$10$F.Betn4XtGt3m2Sx7Oy3XOmDadkxNjok7vRx692MeMlUUTDpi3MUS', 'dd61d602ce541e54d5619de7f11eb9', '2020-09-09 19:29:26.000000', 'active'),
('testuser17@gmail.com', 'defaultUser.png', 'Test', 'User17', 1234567890, '(742 )Gharda Institute of Technology', 'Computer', 'Fourth Year', '$2y$10$2hHysVOsnaRHYru1B7LaKuo8cmakbLRx2PHdHcgixqvXGDdwkZj4O', 'de74c56b51758b6a51b5154bb0574a', '2020-09-09 19:30:33.000000', 'active'),
('testuser18@gmail.com', 'defaultUser.png', 'Test', 'User18', 1234567890, '(742 )Gharda Institute of Technology', 'Computer', 'Third Year', '$2y$10$h72I5rUHYxywNDQO3Yv0CO2arTn/ZNI9SeQQhb5GjpoBV5f6oTHTW', '5ee527f356b039cc832922e5bff248', '2020-09-09 19:32:21.000000', 'active'),
('testuser19@gmail.com', 'defaultUser.png', 'Test', 'User19', 1234567890, '(742 )Gharda Institute of Technology', 'Computer', 'Second Year', '$2y$10$9mVpO1IHknAWkYry/g7sTesSsqGj/8fORb7V1pO0hPNGXMJLqgLMO', 'b1a8704a5d11393b828a9d45f6c9eb', '2020-09-09 19:33:29.000000', 'active'),
('testuser20@gmail.com', 'defaultUser.png', 'Test', 'User20', 1234567890, '(742 )Gharda Institute of Technology', 'Computer', 'First Year', '$2y$10$WivnFolCiJG7S3gkrnp.nuPQrslbtxy38jWkwWVWqj3gg41ITbd2.', '1e6511254f99e1a571bea6f1bc5be4', '2020-09-09 19:35:17.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_counter`
--

CREATE TABLE `visitor_counter` (
  `id` int(5) NOT NULL,
  `ipAddress` varchar(100) DEFAULT NULL,
  `visitDate` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_counter`
--

INSERT INTO `visitor_counter` (`id`, `ipAddress`, `visitDate`) VALUES
(5, '::1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_information`
--
ALTER TABLE `admin_information`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `events_details_information`
--
ALTER TABLE `events_details_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_information`
--
ALTER TABLE `event_information`
  ADD PRIMARY KEY (`certificateId`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `feedback_information`
--
ALTER TABLE `feedback_information`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `gallery_information`
--
ALTER TABLE `gallery_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_information`
--
ALTER TABLE `newsletter_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `news_information`
--
ALTER TABLE `news_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor_information`
--
ALTER TABLE `sponsor_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `synergy_user_information`
--
ALTER TABLE `synergy_user_information`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `visitor_counter`
--
ALTER TABLE `visitor_counter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events_details_information`
--
ALTER TABLE `events_details_information`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `gallery_information`
--
ALTER TABLE `gallery_information`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `newsletter_information`
--
ALTER TABLE `newsletter_information`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news_information`
--
ALTER TABLE `news_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sponsor_information`
--
ALTER TABLE `sponsor_information`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `synergy_user_information`
--
ALTER TABLE `synergy_user_information`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `visitor_counter`
--
ALTER TABLE `visitor_counter`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_information`
--
ALTER TABLE `event_information`
  ADD CONSTRAINT `event_information_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_information` (`email`) ON UPDATE CASCADE;

--
-- Constraints for table `newsletter_information`
--
ALTER TABLE `newsletter_information`
  ADD CONSTRAINT `newsletter_information_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_information` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
