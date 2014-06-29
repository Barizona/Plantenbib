create database plantenbib;
use plantenbib;

create table plant
(
    id INT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(70),
    latijnse_naam VARCHAR(100),
    beschrijving TEXT,
    familie VARCHAR(70),
    klasse VARCHAR(50),
    PRIMARY KEY (id)
);

create table eigenschap
(
    id INT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(70),
    beschrijving TEXT,
    PRIMARY KEY (id)
);

create table planteigenschap
(
    eigenschap_id INT,
    FOREIGN KEY (eigenschap_id)
    REFERENCES eigenschap(id)
    ON DELETE CASCADE,
    plant_id INT,
    FOREIGN KEY (plant_id)
    REFERENCES plant(id)
    ON DELETE CASCADE
);

create table regio
(
    id INT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(70),
    klimaat VARCHAR(150),
    beschrijving TEXT,
    PRIMARY KEY (id)
);

create table plantregio
(
    regio_id INT,
    FOREIGN KEY (regio_id)
    REFERENCES regio(id)
    ON DELETE CASCADE,
    plant_id INT,
    FOREIGN KEY (plant_id)
    REFERENCES plant(id)
    ON DELETE CASCADE
);