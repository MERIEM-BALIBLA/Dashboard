DROP DATABASE data_crud;
CREATE DATABASE data_crud;
USE data_crud;

CREATE TABLE IF NOT EXISTS User (
    User_ID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    Email_Adress VARCHAR(200),
    pass_word VARCHAR(100)
    
);

CREATE TABLE IF NOT EXISTS freelencer (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    nick_name VARCHAR(100),
    skil VARCHAR(200),
    User_ID INT,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID)
    ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Categories (
    Categorie_ID INT PRIMARY KEY AUTO_INCREMENT,
    Categorie_Name VARCHAR(100),
    description VARCHAR(225)
);

CREATE TABLE IF NOT EXISTS project (
    Project_ID INT PRIMARY KEY AUTO_INCREMENT,
    Project_title VARCHAR(100),
    Descriptions VARCHAR(225),
    User_ID INT,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID)
    ON UPDATE CASCADE ON DELETE CASCADE,
    Categorie_ID INT,
    FOREIGN KEY (Categorie_ID) REFERENCES Categories(Categorie_ID)
    ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE countries (
    nom VARCHAR(100)
);
INSERT INTO countries 
VALUES 
        ('Youssoufia'),
        ('Marrakesh'),
        ('Casa'),
        ('Agadir'),
        ('Youssoufia'),
        ('Youssoufia');

