CREATE DATABASE IF NOT EXISTS db_project_four CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE chapter
    ('id' int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    'title' varchar(250), 
    'author' varchar(100), 
    'content' text, 
    'creationdate' datetime,
    'updateDate', datetime);

    INSERT INTO chapter (author, title, content, createDate, updateDate) VALUES 
    ('Jean', 'Premier chapitre !', "# Dr. Zoidberg, that doesn't make sense. But, okay!
    Bender, you risked your life to save me! I'm Santa Claus! Oh, I don't have time for this. 
    I have to go and buy a single piece of fruit with a coupon and then return it, making people wait behind me while I complain.
    And why did 'I' have to take a cab? Kids have names? For one beautiful night I knew what it was like to be a grandmother.
    Subjugated, yet honored. Who am I making this out to? What are you hacking off? __Is it my torso?!__ *'It is!* ' My precious torso!", 
    '2020-05-04 10:30:45', '2020-05-04 10:30:45'), 
    ('Jean', 'Second chapitre !', "## One hundred dollars.For the last time, I don't like lilacs! Your 'first' wife was the one 
    who liked lilacs! Aww, it's true. I've been hiding it for so long. Bender, we're trying our best. Ask her how her day was.
    1. Guess again.
    2. It doesn't look so shiny to me.
    3. Fetal stemcells, aren't those controversial ?", 
    '2020-05-05 13:43:30', '2020-05-05 13:43:30'), 
    ('Jean', 'Troisième chapitre !', "### In your time, yes, but nowadays shut up! Besides, these are adult stemcells, 
    harvested from perfectly healthy adults whom I killed for their stemcells.Stop! Don't shoot fire stick in 
    space canoe! Cause explosive decompression! Come, Comrade Bender! We must take to the streets! But existing 
    is basically all I do! Large bet on myself in round one.
    * Bender, this is Fry's decision… and he made it wrong. So it's time for us to interfere in his life.
    * You wouldn't. Ask anyway!
    * File not found.", 
    '2020-05-05 19:03:10', '2020-05-05 19:03:10'), 
    ('Jean', 'Quatrième chapitre !', "It's toe-tappingly tragic! Oh Leela! You're the only person I could turn to;
     you're the only person who ever loved me. Bender, being God isn't easy. If you do too much, people get dependent 
     on you, and if you do nothing, they lose hope. You have to use a light touch. Like a safecracker, or a pickpocket.
     Oh, I don't have time for this. I have to go and buy a single piece of fruit with a coupon and then return it, making 
     people wait behind me while I complain. Does anybody else feel jealous and aroused and worried?", NOW(), NOW());

CREATE TABLE comments
    ('id' int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    'author' varchar(100),
    'content' text,
    'creationDate' datetime,
    'newsId' int(11));

ALTER TABLE comments ADD KEY foreignChapterId (chapterId);
ALTER TABLE comments ADD CONSTRAINT 'foreignchapterId' FOREIGN KEY ('chapterId') REFERENCE 'chapter'('id');

INSERT INTO comments ('author', 'content', 'creationDate', chapterId) VALUES
    ('Jean', 'I suggest you try it again, Luke. !', '2020-05-10 09:52:24', 1),
    ('Claude', ' Hey, Luke! May the Force be with you.', '2020-05-11 00:45:30', 1),
    ('Bob', 'Great ! ', '2020-05-11 18:00:04', 1),
    ('Toto', ' He is here. You don\'t believe in the Force, do you', '2020-05-09 20:05:57', 2),
    ('Moam', 'Still, she\'s got a lot of spirit. I don\'t know, what do you think', '2020-05-09 18:12:59', 2),
    ('Baba', 'Send a detachment down to retrieve them, and see to it personally, Commander', '2020-05-18 10:05:10', 2),
    ('Gui', 'Alderaan is peaceful. We have no weapons', '2020-05-05 11:11:22', 3),
    ('Aurora', 'I am a member of the Imperial Senate on a diplomatic mission to Alderaan', '2020-05-05 20:11:12', 3),
    ('John', ' Don\'t trust them. ', '2020-05-07 10:10:11', 3);

INSERT INTO chapter (title, author, content, createDate, updateDate) 
    VALUES ('Mon sixième chapitre ajouté', 'Admin', 'Je vous souhaite une bonne lecture de ce chapitre', NOW(), NOW());

INSERT INTO comments (author, title, content, createdDate, updatedDate, chapterId) VALUES
('Jean', 'First', 'I suggest you try it again, Luke. !', '2020-05-10 09:52:24', '2020-05-10 09:52:24', 1),
('Claude', 'Second', ' Hey, Luke! May the Force be with you.', '2020-05-11 00:45:30', '2020-05-10 09:52:24', 1),
('Bob', 'Third', 'Great ! ', '2020-05-11 18:00:04', '2020-05-10 09:52:24', 1),
('Toto', 'Fourth', 'He is here. You don\'t believe in the Force, do you', '2020-05-09 20:05:57', '2020-05-10 09:52:24', 2),
('Moam', 'Fifth', 'Still, she\'s got a lot of spirit. I don\'t know, what do you think', '2020-05-09 18:12:59', '2020-05-10 09:52:24', 2),
('Baba', 'Sixth', 'Send a detachment down to retrieve them, and see to it personally, Commander', '2020-05-18 10:05:10', '2020-05-10 09:52:24', 2),
('Gui', 'Seventh', 'Alderaan is peaceful. We have no weapons', '2020-05-05 11:11:22', '2020-05-10 09:52:24', 3),
('Aurora', 'Eight', 'I am a member of the Imperial Senate on a diplomatic mission to Alderaan', '2020-05-05 20:11:12', '2020-05-10 09:52:24', 3),
('John', 'Nineth','Don\'t trust them. ', '2020-05-07 10:10:11', '2020-05-07 10:10:11', 3);

    ALTER TABLE comments AUTO_INCREMENT = 1