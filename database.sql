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
        section_id INT NULL,
        CONSTRAINT fk_member_section FOREIGN KEY (section_id) REFERENCES section(id)
    );

INSERT INTO
    `member` (
        firstname,
        lastname,
        gender,
        phone,
        mail,
        is_board_member,
        `role`,
        section_id
    )
VALUES (
        "Michel",
        "Lempereur",
        "M.",
        "02 00 00 00 00",
        "m.lempereur@gmail.com",
        TRUE,
        "Président d'honneur",
        NULL
    ), (
        "Jean-Claude",
        "Painchault",
        "M.",
        "02 00 00 00 00",
        "jc.painchault@gmail.com",
        TRUE,
        "Président",
        1
    ), (
        "Jean-Marc",
        "Pelletier",
        "M.",
        "02 00 00 00 00",
        "jm.pelletier@gmail.com",
        TRUE,
        "Vice-président",
        1
    ), (
        "Pascal",
        "Perdereau",
        "M.",
        "02 00 00 00 00",
        "p.perdereau@gmail.com",
        TRUE,
        "Vice-président",
        4
    ), (
        "Carole",
        "Maréchal",
        "Mme.",
        "02 00 00 00 00",
        "c.marechal@gmail.com",
        TRUE,
        "Secrétaire",
        1
    ), (
        "Jacky",
        "Casanueva",
        "M.",
        "02 00 00 00 00",
        "j.casanueva@gmail.com",
        TRUE,
        "Secrétaire adjoint",
        2
    ), (
        "Olivier",
        "Venot",
        "M.",
        "02 00 00 00 00",
        "o.venot@gmail.com",
        TRUE,
        "Trésorier",
        1
    ), (
        "Pascal",
        "Billard",
        "M.",
        "02 00 00 00 00",
        "p.billard@gmail.com",
        FALSE,
        "Entraîneur",
        2
    ), (
        "Marcel",
        "Debat",
        "M.",
        "02 00 00 00 00",
        "m.debat@gmail.com",
        TRUE,
        "Trésorier adjoint",
        4
    ), (
        "Roselyne",
        "Tardif",
        "Mme.",
        "02 00 00 00 00",
        "r.tardif@gmail.com",
        TRUE,
        "Trésorière adjoint",
        2
    ), (
        "Helder",
        "Duarte",
        "M.",
        "02 00 00 00 00",
        "h.duarte@gmail.com",
        FALSE,
        NULL,
        NULL
    ), (
        "Dominique",
        "Jouas",
        "M.",
        "02 00 00 00 00",
        "d.jouas@gmail.com",
        FALSE,
        "Entraîneur",
        3
    ), (
        "Philippe",
        "Jubert",
        "M.",
        "02 00 00 00 00",
        "p.jubert@gmail.com",
        FALSE,
        NULL,
        3
    ), (
        "Guillaume",
        "Lecouflet",
        "M.",
        "02 00 00 00 00",
        "g.lecouflet@gmail.com",
        FALSE,
        NULL,
        3
    ), (
        "Sylvain",
        "Migniot",
        "M.",
        "02 00 00 00 00",
        "s.migniot@gmail.com",
        FALSE,
        "Entraîneur",
        1
    ), (
        "Vincent",
        "Perdereau",
        "M.",
        "02 00 00 00 00",
        "v.perdereau@gmail.com",
        FALSE,
        NULL,
        3
    ), (
        "Paulin",
        "Pinsart",
        "M.",
        "02 00 00 00 00",
        "p.pinsart@gmail.com",
        FALSE,
        "Entraîneur",
        4
    ), (
        "Roger",
        "Soulas",
        "M.",
        "02 00 00 00 00",
        "r.soulas@gmail.com",
        FALSE,
        NULL,
        NULL
    ), (
        "Jean-Luc",
        "Martineau",
        "M.",
        "02 00 00 00 00",
        "jl.martineau@gmail.com",
        FALSE,
        NULL,
        2
    );

CREATE TABLE
    `event` (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        imgPath TEXT,
        title VARCHAR(255) NOT NULL,
        raceDate DATE,
        paragraph TEXT NOT NULL,
        section_id INT NULL,
        CONSTRAINT fk_event_section FOREIGN KEY (section_id) REFERENCES section(id)
    );

INSERT INTO
    `event` (title, raceDate, paragraph, section_id)
VALUES (
        "Compétition rallye Orleans",
        "2022-06-25",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst.",
        1
    ), (
        "Compétition moto Orleans",
        "2022-06-25",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst.",
        2
    ), (
        "Compétition Handi-car Orleans",
        "2022-06-25",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst.",
        3
    ), (
        "Compétition Méca sport Orleans",
        "2022-06-25",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst.",
        4
    );

CREATE TABLE
    `partner` (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        logo TEXT NOT NULL,
        `URL` TEXT NOT NULL,
        section_id INT NULL,
        CONSTRAINT fk_partner_section FOREIGN KEY (section_id) REFERENCES section(id)
    );

INSERT INTO
    `partner` (`name`, logo, `URL`, section_id)
VALUES (
        "Fédération Française de Motocyclisme",
        "/assets/images/FFM-logo.png",
        "https://www.ffmoto.org/",
        2
    ), (
        "Fédération Française du Sport Automobile",
        "/assets/images/FFSA-logo.jpg",
        "https://www.ffsa.org/",
        1
    ), (
        "L'Union Française des Oeuvres Laïques d'Education Physique",
        "/assets/images/ufolep-logo.png",
        "https://www.ufolep.org/",
        3
    ), (
        "Région Centre-Val-de-Loire",
        "/assets/images/RCVL-logo.png",
        "https://www.centre-valdeloire.fr/",
        4
    );

create table `admin`(
    id int not null auto_increment primary key,
    email VARCHAR(255) not null,
    `password` VARCHAR(255) not null
);

insert into `admin` (email, `password`) VALUES ("admin@admin.com", "$2y$10$P6XsqsX2aQw/xGTFMtPGh.9ovrdqhWnMzaUfhDk6mytDFmAtctYcC");