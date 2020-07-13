-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 06:20 PM
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
('apandharkame6@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'EXTC Project Presentation', '$2y$10$tI54SibBp9Y5n//R877jaeqd79ONQpSVjXCxN08KomeHs21lqd.X.', NULL, NULL),
('facultychem@gmail.com', 'Faculty Coordinator', 'Chemical', 'Not Applicable', '$2y$10$bh6XlE4eGGI9jmy7ugj7Heqg2pB32fr3wJTxrNE0Zo8yUZO2YXpNa', NULL, NULL),
('facultycivil@gmail.com', 'Faculty Coordinator', 'Civil', 'Not Applicable', '$2y$10$CCif/fe5WP0BRIgG/Mu/hu3GsXX.6V3aIW.JJCVy8QWlVxyDJWmku', NULL, NULL),
('facultycomp@gmail.com', 'Faculty Coordinator', 'Computer', 'Not Applicable', '$2y$10$.OSqZd0VjIp47cE2oz9fxeg1se/mAWqbUeigbXUMuVWAV/09dHWX.', NULL, NULL),
('facultyextc@gmail.com', 'Faculty Coordinator', 'Electronics and Telecommunication', 'Not Applicable', '$2y$10$1qKOPrvYTWsHTKu//4IpDuLF0OCObWkLrDHg3vRS1f4ifA2HiMqlW', NULL, NULL),
('facultymech@gmail.com', 'Faculty Coordinator', 'Mechanical', 'Not Applicable', '$2y$10$x5ebh6kFUt3m/kYL2iA.6uc9hKLHL7DrcVy5TwA2.6j.qyu6E6zmC', NULL, NULL),
('gandhivipul009@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'Logo Contest', '$2y$10$/TlYJffpcju54IN4zNhbou3qCSKuCX/0xs0TpgztVKGDiExDRPdKe', NULL, NULL),
('gitshodhadmin@gmail.com', 'Administrator', 'Not Applicable', 'Not Applicable', '$2y$10$KAu/OhZKO4W9c2IqLg0kM.mrkO1Qj9IhrT4A2EMHuopMWdIKXWzy6', NULL, NULL),
('kolhalpritam@gmail.com', 'Student Coordinator', 'Chemical', 'Chemical Paper Presentation', '$2y$10$9UxYBGY1hdi0RZ0T6d9ZMOiBFKELpUk/.CqxgOmJfJiLbfXBN9n1G', NULL, NULL),
('samgowd98@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'Calci War', '$2y$10$2897b2IQSW1CzrfnFWVbjuOlvgMqPKuNzZDzbvx8b0ETxFVdsV/t6', NULL, NULL),
('surajmohite1994@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'EXTC Poster Presentation', '$2y$10$U3vpP4s.NIEpcyEcAHJa8OH.QoF3dLB9I4/HoDap.5eGRLhXu9R5i', NULL, NULL),
('techviraj01@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'Tech Boss', '$2y$10$oiSOvzsMo/sonMqYQFEJV.QWDR7epYqmdzlPTTbDW3dthYwcs1yaS', NULL, NULL),
('vishalbait01@gmail.com', 'Student Coordinator', 'Electronics and Telecommunication', 'EXTC Paper Presentation', '$2y$10$92WwiPtVIruxlqnnl6Dvt.394Wr1Eoe01GboNAiMQEly3gDt2/hgy', NULL, NULL);

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
(3, 'extcProject.jpg', 'EXTC Project Presentation', 200, 'techfest123', 10, 2000, 'Gharda Foundation', 'Electronics and Telecommunication', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.             Quia, alias odio nihil iste vitae vero. Ab, temporibus\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\n        optio dolores, reprehenderit doloribus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, alias odio nihil iste vitae vero. Ab, temporibus\n        quisquam quidem at laboriosam maxime a corrupti dolorem vitae id exercitationem sint officia atque aspernatur\n        Officia reprehenderit itaque doloremque voluptas delectus cum iusto esse, sit fugit\n        in aut sapiente animi repellat provident blanditiis, sit ipsum similique aspernatur ullam? Eum inventore sequi\n        optio dolores, reprehenderit doloribus.', 'Vishal Bait 9373241085', '2021-04-15', '2021-04-16'),
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
('vishalbait02@gmail.com', 1093415090, 'EXTC Project Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200628111212800110168406901676296', '200.00', 'ORDS24739690', 'TXN_SUCCESS', '62726009', '2020-06-28 22:29:42.000000', 'absent'),
('vishalbait02@gmail.com', 1636529635, 'Chemical Paper Presentation', 'Online Banking', 'NONE', 'WALLET', 'Txn Success', 'WALLET', '20200628111212800110168059701676201', '150.00', 'ORDS43447762', 'TXN_SUCCESS', '62726044', '2020-06-28 22:44:35.000000', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_information`
--

CREATE TABLE `feedback_information` (
  `email` varchar(150) NOT NULL,
  `attendBefore` varchar(30) NOT NULL,
  `likelyAttend` varchar(30) NOT NULL,
  `likelyRecommendFriend` varchar(50) NOT NULL,
  `likeMost` varchar(200) NOT NULL,
  `likeLeast` varchar(200) NOT NULL,
  `overall` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `events` varchar(50) NOT NULL,
  `coordinators` varchar(50) NOT NULL,
  `eventsPrice` varchar(50) NOT NULL,
  `suggestion` varchar(255) NOT NULL,
  `feedbackDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 793669864, 'Vishal', 'Bait', 'Electronics and Telecommunication', 'Singing Competition', 'None');

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
('vishalbait01@gmail.com', 'defaultUser.png', 'Vishal', 'Bait', 1234567890, '(742 )Gharda Institute of Technology', 'Electronics and Telecommunication', 'Fourth Year', '$2y$10$Cbs/nJd6HxTK0njurIll6eSHKaiwQdWgx8EM.CLl.wbIQ1uNZO/YO', 'c2272a1683d3da3ed452caeb7f9a61', '2020-07-11 09:11:29.000000', 'active'),
('vishalbait02@gmail.com', 'defaultUser.png', 'Vishal', 'Bait', 1234567890, '(742 )Gharda Institute of Technology', 'Electronics and Telecommunication', 'Fourth Year', '$2y$10$KHYedk3t317gxqUBQoH.SONpkuUCBPBZLdB1pAoj1V2VHlDOqEhWK', '1c6c327bee438858afb1426711c288', NULL, 'active');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

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
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
