
-- Active: 1665739511183@@127.0.0.1@3306@stables_orleans



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
    `member` (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        firstname VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        gender VARCHAR(50),
        phone CHAR(20),
        mail VARCHAR(150),
        is_board_member BOOLEAN NOT NULL,
        `role` VARCHAR(255),
        section_id INT
    );

INSERT INTO
    `member` (
        firstname,
        lastname,
        gender,
        phone,
        mail,
        is_board_member,
        `role`
    )
VALUES (
        "Michel",
        "Lempereur",
        "M.",
        "02 00 00 00 00",
        "m.lempereur@gmail.com",
        TRUE,
        "Président d'honneur"
    ), (
        "Jean-Claude",
        "Painchault",
        "M.",
        "02 00 00 00 00",
        "jc.painchault@gmail.com",
        TRUE,
        "Président"
    ), (
        "Jean-Marc",
        "Pelletier",
        "M.",
        "02 00 00 00 00",
        "jm.pelletier@gmail.com",
        TRUE,
        "Vice-président"
    ), (
        "Pascal",
        "Perdereau",
        "M.",
        "02 00 00 00 00",
        "p.perdereau@gmail.com",
        TRUE,
        "Vice-président"
    ), (
        "Carole",
        "Maréchal",
        "Mme.",
        "02 00 00 00 00",
        "c.marechal@gmail.com",
        TRUE,
        "Secrétaire"
    ), (
        "Jacky",
        "Casanueva",
        "M.",
        "02 00 00 00 00",
        "j.casanueva@gmail.com",
        TRUE,
        "Secrétaire adjoint"
    ), (
        "Olivier",
        "Venot",
        "M.",
        "02 00 00 00 00",
        "o.venot@gmail.com",
        TRUE,
        "Trésorier"
    ), (
        "Pascal",
        "Billard",
        "M.",
        "02 00 00 00 00",
        "p.billard@gmail.com",
        FALSE,
        ""
    ), (
        "Marcel",
        "Debat",
        "M.",
        "02 00 00 00 00",
        "m.debat@gmail.com",
        TRUE,
        "Trésorier adjoint"
    ), (
        "Roselyne",
        "Tardif",
        "Mme.",
        "02 00 00 00 00",
        "r.tardif@gmail.com",
        TRUE,
        "Trésorière adjoint"
    ), (
        "Helder",
        "Duarte",
        "M.",
        "02 00 00 00 00",
        "h.duarte@gmail.com",
        FALSE,
        ""
    ), (
        "Dominique",
        "Jouas",
        "M.",
        "02 00 00 00 00",
        "d.jouas@gmail.com",
        FALSE,
        ""
    ), (
        "Philippe",
        "Jubert",
        "M.",
        "02 00 00 00 00",
        "p.jubert@gmail.com",
        FALSE,
        ""
    ), (
        "Guillaume",
        "Lecouflet",
        "M.",
        "02 00 00 00 00",
        "g.lecouflet@gmail.com",
        FALSE,
        ""
    ), (
        "Sylvain",
        "Migniot",
        "M.",
        "02 00 00 00 00",
        "s.migniot@gmail.com",
        FALSE,
        ""
    ), (
        "Vincent",
        "Perdereau",
        "M.",
        "02 00 00 00 00",
        "v.perdereau@gmail.com",
        FALSE,
        ""
    ), (
        "Paulin",
        "Pinsart",
        "M.",
        "02 00 00 00 00",
        "p.pinsart@gmail.com",
        FALSE,
        ""
    ), (
        "Roger",
        "Soulas",
        "M.",
        "02 00 00 00 00",
        "r.soulas@gmail.com",
        FALSE,
        ""
    ), (
        "Jean-Luc",
        "Martineau",
        "M.",
        "02 00 00 00 00",
        "jl.martineau@gmail.com",
        FALSE,
        ""
    );

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

CREATE TABLE `event` (
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
  imgPath TEXT ,
  title VARCHAR(255) NOT NULL,
  paragraph TEXT NOT NULL
);

INSERT INTO `event` (title, paragraph) VALUES ("Compétition rallye Orleans", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst.");


CREATE TABLE `category` (
id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
title VARCHAR(255)
);

DROP TABLE `form`;

CREATE TABLE `form` (
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
message VARCHAR(500) NOT NULL
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

