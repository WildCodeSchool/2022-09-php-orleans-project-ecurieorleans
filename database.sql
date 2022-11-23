CREATE TABLE
    section(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        `name` VARCHAR(25) NOT NULL,
        header TEXT NULL,
        presentation TEXT NOT NULL,
        manager_id INT NOT NULL,
        adjunct_id INT NOT NULL,
        trainer_id INT NOT NULL
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
        `role` VARCHAR(255)
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
        "Entraîneur"
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
        NULL
    ), (
        "Dominique",
        "Jouas",
        "M.",
        "02 00 00 00 00",
        "d.jouas@gmail.com",
        FALSE,
        "Entraîneur"
    ), (
        "Philippe",
        "Jubert",
        "M.",
        "02 00 00 00 00",
        "p.jubert@gmail.com",
        FALSE,
        NULL
    ), (
        "Guillaume",
        "Lecouflet",
        "M.",
        "02 00 00 00 00",
        "g.lecouflet@gmail.com",
        FALSE,
        NULL
    ), (
        "Sylvain",
        "Migniot",
        "M.",
        "02 00 00 00 00",
        "s.migniot@gmail.com",
        FALSE,
        "Entraîneur"
    ), (
        "Vincent",
        "Perdereau",
        "M.",
        "02 00 00 00 00",
        "v.perdereau@gmail.com",
        FALSE,
        NULL
    ), (
        "Paulin",
        "Pinsart",
        "M.",
        "02 00 00 00 00",
        "p.pinsart@gmail.com",
        FALSE,
        "Entraîneur"
    ), (
        "Roger",
        "Soulas",
        "M.",
        "02 00 00 00 00",
        "r.soulas@gmail.com",
        FALSE,
        NULL
    ), (
        "Jean-Luc",
        "Martineau",
        "M.",
        "02 00 00 00 00",
        "jl.martineau@gmail.com",
        FALSE,
        NULL
    );

ALTER TABLE section
ADD
    CONSTRAINT fk_section_manager_member FOREIGN KEY (manager_id) REFERENCES member(id);

ALTER TABLE section
ADD
    CONSTRAINT fk_section_adjunct_member FOREIGN KEY (adjunct_id) REFERENCES member(id);

ALTER TABLE section
ADD
    CONSTRAINT fk_section_trainer_member FOREIGN KEY (trainer_id) REFERENCES member(id);

INSERT INTO
    section (
        `name`,
        presentation,
        manager_id,
        adjunct_id,
        trainer_id
    )
VALUES (
        "Auto",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst.",
        1,
        2,
        3
    ), (
        "Moto",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst.",
        4,
        5,
        6
    ), (
        "Handi-car",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst.",
        7,
        8,
        9
    ), (
        "Mécasport",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id sodales tellus. Pellentesque in lorem vitae risus fermentum rutrum. 
Vestibulum sed libero eget diam fringilla convallis vitae non dui. In hac habitasse platea dictumst.",
        7,
        8,
        9
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
    `event` (
        title,
        raceDate,
        paragraph,
        section_id
    )
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
        logo TEXT NULL,
        `URL` TEXT NOT NULL,
        section_id INT NULL,
        CONSTRAINT fk_partner_section FOREIGN KEY (section_id) REFERENCES section(id)
    );

INSERT INTO
    `partner` (`name`, logo, `URL`, section_id)
VALUES (
        "Fédération Française de Motocyclisme",
        NULL,
        "https://www.ffmoto.org/",
        2
    ), (
        "Fédération Française du Sport Automobile",
        NULL,
        "https://www.ffsa.org/",
        1
    ), (
        "L'Union Française des Oeuvres Laïques d'Education Physique",
        NULL,
        "https://www.ufolep.org/",
        3
    );

CREATE TABLE
    `admin`(
        id int not null auto_increment primary key,
        email VARCHAR(255) not null,
        `password` VARCHAR(255) not null
    );

INSERT INTO
    `admin` (email, `password`)
VALUES (
        "admin@admin.com",
        "$2y$10$P6XsqsX2aQw/xGTFMtPGh.9ovrdqhWnMzaUfhDk6mytDFmAtctYcC"
    );