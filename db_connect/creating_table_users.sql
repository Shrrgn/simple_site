
CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(15) NOT NULL,
    lasname VARCHAR(20) NOT NULL
) DEFAULT CHARACTER SET utf8 ENGINE=INNODB

ALTER TABLE users CHANGE lasname lastname VARCHAR(20) NOT NULL;

INSERT INTO users (firstname,lastname) VALUES ("Yoba","Yobovich");
INSERT INTO users (firstname,lastname) VALUES ("Peter","Parker");
INSERT INTO users (firstname,lastname) VALUES ("Devcalion", "Dragon");

UPDATE users SET lastname = "Dragonevich" WHERE firstname = "Devcalion";