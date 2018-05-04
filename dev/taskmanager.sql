-- Original single user version without login ability:

CREATE TABLE tasks (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   title VARCHAR(255) NOT NULL,
   description MEDIUMTEXT,
   category ENUM('personal', 'school', 'work', 'uncategorized') DEFAULT 'uncategorized',
   addDate DATETIME NOT NULL,
   completedDate DATETIME
);

INSERT INTO tasks (title, description, category, addDate) VALUES ('Task manager', 'Develop a web-based task manager.', 'work', NOW());
INSERT INTO tasks (title, description, category, addDate) VALUES ('Database homework', 'Complete database homework.', 'school', NOW());
INSERT INTO tasks (title, description, category, addDate) VALUES ('Get groceries', 'Get milk, eggs, and apples.', 'personal', NOW());
INSERT INTO tasks (title, description, category, addDate) VALUES ('Task manager', 'Develop a web-based task manager.', 'work', NOW());
INSERT INTO tasks (title, description, category, addDate) VALUES ('Database homework', 'Complete database homework.', 'school', NOW());
INSERT INTO tasks (title, description, category, addDate) VALUES ('Code Review', 'Perform code review of news app.', 'work', NOW());
INSERT INTO tasks (title, description, category, addDate) VALUES ('Buy Halloween Candy', 'Purchase halloween candy for trick-or-treat.', 'personal', NOW());
INSERT INTO tasks (title, description, category, addDate) VALUES ('Buy an Apple Watch', 'Buy a series 3 LTE Apple Watch.', 'school', NOW());

-- Multiple user version:

CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	loginID varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	firstName varchar(128) NOT NULL,
	lastName varchar(128) NOT NULL
);

CREATE TABLE tasks (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   title VARCHAR(255) NOT NULL,
   description MEDIUMTEXT,
   category ENUM('personal', 'school', 'work', 'uncategorized') DEFAULT 'uncategorized',
   addDate DATETIME NOT NULL,
   completedDate DATETIME,
   userID INT NOT NULL
);

-- pleaseletmein! hashed is $2y$10$DPSFjsA2OYUQ8N4G5cnYdeKVVv.921kXdy5QR3riiXKzt7tgJvpvK
-- it was hashed using password_hash($password, PASSWORD_DEFAULT)

INSERT INTO users (loginID, password, firstName, lastName) VALUES ('dale', '$2y$10$DPSFjsA2OYUQ8N4G5cnYdeKVVv.921kXdy5QR3riiXKzt7tgJvpvK', 'Dale', 'Musser');