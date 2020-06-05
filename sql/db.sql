CREATE DATABASE IF NOT EXISTS db_project_four CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE news
    ('id' int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    'title' varchar(250), 
    'author' varchar(100), 
    'content' text, 
    'creationdate' datetime);

    INSERT INTO news (title, author, content, creationDate) VALUES 
    ('Ma première news !', 'Bob', 'Voici le contenu de ma première news de mon blog en construction.', '2020-05-04 10:30:45'), 
    ('Ma deuxième news !', 'John', 'Voici le contenu de la deuxième news de mon blog en construction.', '2020-05-05 13:43:30'), 
    ('Ma deuxième news !', 'Admin', 'Voici le contenu de la deuxième news de mon blog en construction.', '2020-05-05 19:03:10'), 
    ('Ma quatrième news !', 'Jean', 'Voici le contenu orignal de la quatrième news de mon blog en construction.', NOW());

CREATE TABLE comments
    ('id' int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    'author' varchar(100),
    'content' text,
    'creationDate' datetime,
    'newsId' int(11));

ALTER TABLE comments ADD KEY foreignNewsId (newsId);
ALTER TABLE comments ADD CONSTRAINT 'foreignNewsId' FOREIGN KEY ('newsId') REFERENCE 'news'('id');

INSERT INTO comments ('author', 'content', 'creationDate', newsId) VALUES
    ('Jean', 'I suggest you try it again, Luke. !', '2020-05-10 09:52:24', 1),
    ('Claude', ' Hey, Luke! May the Force be with you.', '2020-05-11 00:45:30', 1),
    ('Bob', 'Great ! ', '2020-05-11 18:00:04', 1),
    ('Toto', ' He is here. You don\'t believe in the Force, do you', '2020-05-09 20:05:57', 2),
    ('Moam', 'Still, she\'s got a lot of spirit. I don\'t know, what do you think', '2020-05-09 18:12:59', 2),
    ('Baba', 'Send a detachment down to retrieve them, and see to it personally, Commander', '2020-05-18 10:05:10', 2),
    ('Gui', 'Alderaan is peaceful. We have no weapons', '2020-05-05 11:11:22', 3),
    ('Aurora', 'I am a member of the Imperial Senate on a diplomatic mission to Alderaan', '2020-05-05 20:11:12', 3),
    ('John', ' Don\'t trust them. ', '2020-05-07 10:10:11', 3);

INSERT INTO chapter (chapterTitle, chapterAuthor, chapterContent, chapterCreateDate, chapterUpdateDate) 
    VALUES ('Mon sixième chapitre ajouté', 'Admin', 'Je vous souhaite une bonne lecture de ce chapitre', NOW(), NOW());