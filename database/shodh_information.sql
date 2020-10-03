-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 09:11 AM
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
('studentextc-funtech@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'Fun Tech', '$2y$10$ou60bgS76CeYKV2vx3o0ReaGXZpc/NIsuYvKhaChoNXIXDafnFF7u', NULL, NULL),
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
(12, 'paper.jpg', 'Computer Paper Presentation', 150, 'Not Applicable', 0, 1500, 'Gharda Foundation', 'Computer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\r\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\r\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\r\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\r\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
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
('testuser01@gmail.com', 1304984101, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1304984102, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1304984103, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1304984104, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1304984105, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1304984106, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1304984107, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1304984108, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1304984109, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1304984110, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1304984111, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1304984112, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1304984113, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1304984114, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1304984115, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1304984116, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1304984117, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1304984118, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1304984119, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1304984120, 'EXTC Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1314984101, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1314984102, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1314984103, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1314984104, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1314984105, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1314984106, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1314984107, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1314984108, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1314984109, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1314984110, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1314984111, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1314984112, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1314984113, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1314984114, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1314984115, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1314984116, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1314984117, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1314984118, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1314984119, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1314984120, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1324984101, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1324984102, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1324984103, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1324984104, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1324984105, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1324984106, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1324984107, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1324984108, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1324984109, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1324984110, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1324984111, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1324984112, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1324984113, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1324984114, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1324984115, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1324984116, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1324984117, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1324984118, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1324984119, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1324984120, 'Computer Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1334984101, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1334984102, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1334984103, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1334984104, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1334984105, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1334984106, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1334984107, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1334984108, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1334984109, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1334984110, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1334984111, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1334984112, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1334984113, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1334984114, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1334984115, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1334984116, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1334984117, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1334984118, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1334984119, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1334984120, 'Civil Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1344984101, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1344984102, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1344984103, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1344984104, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1344984105, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1344984106, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1344984107, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1344984108, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1344984109, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1344984110, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1344984111, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1344984112, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1344984113, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1344984114, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1344984115, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1344984116, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1344984117, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1344984118, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1344984119, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1344984120, 'Mechanical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1354984101, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1354984102, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1354984103, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1354984104, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1354984105, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1354984106, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1354984107, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1354984108, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1354984109, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1354984110, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1354984111, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1354984112, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1354984113, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1354984114, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1354984115, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1354984116, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1354984117, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1354984118, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1354984119, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1354984120, 'EXTC Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1364984101, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1364984102, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1364984103, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1364984104, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1364984105, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1364984106, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1364984107, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1364984108, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1364984109, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1364984110, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1364984111, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1364984112, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1364984113, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1364984114, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1364984115, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1364984116, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1364984117, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1364984118, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1364984119, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1364984120, 'Chemical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1374984101, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1374984102, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1374984103, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1374984104, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1374984105, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1374984106, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1374984107, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1374984108, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1374984109, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1374984110, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1374984111, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1374984112, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1374984113, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1374984114, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1374984115, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1374984116, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1374984117, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1374984118, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1374984119, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1374984120, 'Computer Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1384984101, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1384984102, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1384984103, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1384984104, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1384984105, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1384984106, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1384984107, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1384984108, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1384984109, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1384984110, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1384984111, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1384984112, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1384984113, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1384984114, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1384984115, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1384984116, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1384984117, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1384984118, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1384984119, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1384984120, 'Civil Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1394984101, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1394984102, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1394984103, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1394984104, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1394984105, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1394984106, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1394984107, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1394984108, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1394984109, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1394984110, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1394984111, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent');
INSERT INTO `event_information` (`email`, `certificateId`, `event`, `paymentType`, `prize`, `gatewayName`, `resMsg`, `bankName`, `txnId`, `txnAmount`, `orderId`, `status`, `bankTxnId`, `txnDate`, `attendStatus`) VALUES
('testuser12@gmail.com', 1394984112, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1394984113, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1394984114, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1394984115, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1394984116, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1394984117, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1394984118, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1394984119, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1394984120, 'Mechanical Poster Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '150.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1404984101, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1404984102, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1404984103, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1404984104, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1404984105, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1404984106, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1404984107, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1404984108, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1404984109, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1404984110, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1404984111, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1404984112, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1404984113, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1404984114, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1404984115, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1404984116, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1404984117, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1404984118, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1404984119, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1404984120, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1414984101, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1414984102, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1414984103, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1414984104, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1414984105, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1414984106, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1414984107, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1414984108, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1414984109, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1414984110, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1414984111, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1414984112, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1414984113, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1414984114, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1414984115, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1414984116, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1414984117, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1414984118, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1414984119, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1414984120, 'Chemical Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1424984101, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1424984102, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1424984103, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1424984104, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1424984105, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1424984106, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1424984107, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1424984108, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1424984109, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1424984110, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1424984111, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1424984112, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1424984113, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1424984114, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1424984115, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1424984116, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1424984117, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1424984118, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1424984119, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1424984120, 'Computer Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1434984101, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1434984102, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1434984103, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1434984104, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1434984105, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1434984106, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1434984107, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1434984108, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1434984109, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1434984110, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1434984111, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1434984112, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1434984113, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1434984114, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1434984115, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1434984116, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1434984117, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1434984118, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1434984119, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1434984120, 'Civil Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 1444984101, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 1444984102, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 1444984103, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 1444984104, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 1444984105, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 1444984106, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 1444984107, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 1444984108, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 1444984109, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 1444984110, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 1444984111, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 1444984112, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 1444984113, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 1444984114, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 1444984115, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 1444984116, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 1444984117, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 1444984118, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 1444984119, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 1444984120, 'Mechanical Project Presentatio', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '200.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 2004984101, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 2004984102, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 2004984103, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 2004984104, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 2004984105, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 2004984106, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 2004984107, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 2004984108, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 2004984109, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 2004984110, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 2004984111, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 2004984112, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 2004984113, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 2004984114, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 2004984115, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 2004984116, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 2004984117, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 2004984118, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 2004984119, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 2004984120, 'Calci War', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '50.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 2014984101, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 2014984102, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 2014984103, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 2014984104, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 2014984105, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 2014984106, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 2014984107, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 2014984108, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 2014984109, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 2014984110, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 2014984111, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 2014984112, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 2014984113, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 2014984114, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 2014984115, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 2014984116, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 2014984117, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 2014984118, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 2014984119, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 2014984120, 'Tech Boss', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 2024984101, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 2024984102, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 2024984103, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 2024984104, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 2024984105, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 2024984106, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 2024984107, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 2024984108, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 2024984109, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 2024984110, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 2024984111, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 2024984112, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 2024984113, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 2024984114, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 2024984115, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 2024984116, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 2024984117, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 2024984118, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 2024984119, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 2024984120, 'Fun Tech', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser01@gmail.com', 2034984101, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser02@gmail.com', 2034984102, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser03@gmail.com', 2034984103, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser04@gmail.com', 2034984104, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser05@gmail.com', 2034984105, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser06@gmail.com', 2034984106, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser07@gmail.com', 2034984107, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser08@gmail.com', 2034984108, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser09@gmail.com', 2034984109, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser10@gmail.com', 2034984110, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser11@gmail.com', 2034984111, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser12@gmail.com', 2034984112, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser13@gmail.com', 2034984113, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser14@gmail.com', 2034984114, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser15@gmail.com', 2034984115, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser16@gmail.com', 2034984116, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser17@gmail.com', 2034984117, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser18@gmail.com', 2034984118, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser19@gmail.com', 2034984119, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent'),
('testuser20@gmail.com', 2034984120, 'Logo Contest', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200811111212800110168692401796095', '100.00', 'ORDS91250512', 'TXN_SUCCESS', '63017021', '2020-08-11 15:53:34.000000', 'absent');

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
('testuser20@gmail.com', 'no', '4', '3', 'Good', 'Good', '3', '3', '3', '3', 'Good', '2020-09-08 23:33:11'),
('vishalbait02@gmail.com', 'yes', '5', '5', 'Good', 'Good', '5', '5', '5', '5', 'Good', '2020-09-17 12:40:32');

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
(8, 'Gharda Chemicals', 'gharda.png', 'All College', 'All College'),
(9, 'Gharda Chemicals', 'gharda.png', 'All College', 'All College'),
(10, 'Gharda Chemicals', 'gharda.png', 'All College', 'All College');

-- --------------------------------------------------------

--
-- Table structure for table `synergy_events_details`
--

CREATE TABLE `synergy_events_details` (
  `id` int(5) NOT NULL,
  `eventImage` varchar(200) NOT NULL,
  `eventName` varchar(200) NOT NULL,
  `eventPrize` varchar(200) NOT NULL,
  `eventDescription` text NOT NULL,
  `eventRules` text NOT NULL,
  `eventCoordinator` varchar(255) NOT NULL,
  `eventStartDate` date NOT NULL,
  `eventEndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `synergy_events_details`
--

INSERT INTO `synergy_events_details` (`id`, `eventImage`, `eventName`, `eventPrize`, `eventDescription`, `eventRules`, `eventCoordinator`, `eventStartDate`, `eventEndDate`) VALUES
(2, 'computer-1577429933703-4050.jpg', 'Synergy Test', '1500', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', '<p>Vishal Bait</p>\n\n<p>1234567890</p>\n', '2020-10-17', '2020-10-17');

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
(13, 441087762, 'Test', 'User02', 'Electronics and Telecommunication', 'Antakshari', 'None'),
(15, 600339642, 'Vishal', 'Bait', 'Electronics and Telecommunication', 'Debate Competition', 'First');

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
-- Indexes for table `synergy_events_details`
--
ALTER TABLE `synergy_events_details`
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
-- AUTO_INCREMENT for table `synergy_events_details`
--
ALTER TABLE `synergy_events_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `synergy_user_information`
--
ALTER TABLE `synergy_user_information`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
