CREATE TABLE users
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE editors
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100)
);

CREATE TABLE games
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    img VARCHAR(255),
    title VARCHAR(255),
    description TEXT,
    nb_players VARCHAR(10),
    nb_recommanded_players INT NOT NULL,
    id_editor INT NOT NULL,
    FOREIGN KEY(id_editor) REFERENCES editors(id)
);

CREATE TABLE usersgames
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    is_wishlist BIT DEFAULT 0,
    is_own BIT DEFAULT 0,
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(game_id) REFERENCES games(id)
);

INSERT INTO users(name,password) VALUES ('Joris', 'lolmdr'),('Ben', 'mdptest');
INSERT INTO editors(name) VALUES ('Iello'),('Gigamic');
INSERT INTO games(title,description,nb_players,nb_recommanded_players,id_editor) VALUES ('Concept','Ceci est un jeu','2-6','3','1'),('Narak','Ceci est une description','2-4','4','2');
INSERT INTO usersgames(user_id,game_id,is_wishlist,is_own) VALUES ('1','1',1,0),('1','2',0,1),('2','1',0,1),('2','2',0,1);


--UPDATE usersgames SET is_wishlist = 1, is_own = 0 WHERE user_id = $user_id AND game_id = $gameId
--UPDATE usersgames SET is_wishlist = 0, is_own = 1 WHERE user_id = $user_id AND game_id = $gameId

--SELECT g.*, e.name AS name_editor FROM usersgames ug INNER JOIN games g ON ug.game_id = g.id INNER JOIN editors e ON g.id_editor = e.id WHERE ug.user_id = 2 AND ug.is_wishlist = 1;