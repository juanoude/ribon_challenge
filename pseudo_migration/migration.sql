--criando o banco

CREATE TABLE user(
  id INT auto_increment primary key,
  name VARCHAR(30) NOT NULL,
  sum_coins INT DEFAULT 0,
  sum_deaths INT DEFAULT 0,
  sum_turtles INT DEFAULT 0,
  sum_bowsers INT DEFAULT 0
);

CREATE TABLE collected_coin (
  id INT auto_increment primary key,
  user_id INT,
  value INT NOT NULL,
  FOREIGN KEY(user_id) REFERENCES user(id)
);

CREATE TABLE monster (
  id INT auto_increment primary key,
  name VARCHAR(30)
);

CREATE TABLE killed_monster (
  id INT auto_increment primary key,
  user_id INT,
  monster_id INT,
  FOREIGN KEY(user_id) REFERENCES user(id),
  FOREIGN KEY(monster_id) REFERENCES monster(id)
);

CREATE TABLE deaths (
  id INT auto_increment primary key,
  user_id INT,
  ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY(user_id) REFERENCES user(id)
);

CREATE TABLE trophies (
  id INT auto_increment primary key,
  user_id INT,
  type VARCHAR(30), -- COIN / DEATH / TURTLE / BOWSER
  level INT, -- Varia do nivel 1 ao 5
  FOREIGN KEY(user_id) REFERENCES user(id)
);

INSERT INTO monster (name)
VALUES('turtle'),('bowser');
