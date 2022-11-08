-- Active: 1666295490871@@127.0.0.1@3306@pdo_quest

-- phpMyAdmin SQL Dump

-- version 4.5.4.1deb2ubuntu2

-- http://www.phpmyadmin.net

--

-- Client :  localhost

-- Généré le :  Jeu 26 Octobre 2017 à 13:53

-- Version du serveur :  5.7.19-0ubuntu0.16.04.1

-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de données :  `simple-mvc`

--

-- --------------------------------------------------------

--

-- Structure de la table `item`

--

CREATE TABLE
    `item` (
        `id` int(11) UNSIGNED NOT NULL,
        `title` varchar(255) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--

-- Contenu de la table `item`

--

INSERT INTO
    `item` (`id`, `title`)
VALUES (1, 'Stuff'), (2, 'Doodads');

--

-- Index pour les tables exportées

--

--

-- Index pour la table `item`

--

ALTER TABLE `item` ADD PRIMARY KEY (`id`);

--

-- AUTO_INCREMENT pour les tables exportées

--

--

-- AUTO_INCREMENT pour la table `item`

--

ALTER TABLE
    `item` MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;

CREATE TABLE
    association(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        presentation TEXT NOT NULL
    );

INSERT INTO
    association (presentation)
VALUES (
        "L'Écurie Orléans est une association de sport mécanique. Nous disposons de plusieurs sections automobile telles que auto, moto ,handi, car, mecasport qui sont indépendante les unes des autres. Nous disposons d'un magnifique circuit à 20 km d'Orléans. Nous nous distinguons par une constante volonté d'innovation.La sécurité reste,
bien sûr, l'élément primordial, tout en assurant le bonheur et l'étonnement des spectateurs."
    );

CREATE TABLE
    `event` (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        imgPath TEXT NOT NULL,
        title VARCHAR(255) NOT NULL,
        paragraph TEXT NOT NULL
    );

INSERT INTO
    `event` (imgPath, title, paragraph)
VALUES (
        "assets/images/Card1.jpeg",
        "Compétition rallye Orleans",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst."
    );

CREATE TABLE
    section(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        `name` VARCHAR(25) NOT NULL,
        header TEXT NULL,
        presentation TEXT NOT NULL
    );

INSERT INTO
    section (`name`, presentation)
VALUES (
        "Auto",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst."
    ), (
        "Moto",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst."
    ), (
        "Handi-car",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst."
    ), (
        "Mécasport",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst."
    );

CREATE TABLE
    `partner` (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        logo TEXT NOT NULL,
        `URL` TEXT NOT NULL
    );

INSERT INTO
    `partner` (`name`, logo, `URL`)
VALUES (
        "Fédération Française de Motocyclisme",
        "/assets/images/FFM-logo.png",
        "https://www.ffmoto.org/"
    ), (
        "Fédération Française du Sport Automobile",
        "/assets/images/FFSA-logo.jpg",
        "https://www.ffsa.org/"
    ), (
        "L'Union Française des Oeuvres Laïques d'Education Physique",
        "/assets/images/ufolep-logo.png",
        "https://www.ufolep.org/"
    ), (
        "Région Centre-Val-de-Loire",
        "/assets/images/RCVL-logo.png",
        "https://www.centre-valdeloire.fr/"
    );