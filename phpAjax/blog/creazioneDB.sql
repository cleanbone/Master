DROP TABLE IF EXISTS posts;

CREATE TABLE posts (
  id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  data DATETIME NOT NULL,
  titolo VARCHAR(255),
  testo TEXT
);

DROP TABLE IF EXISTS utenti;

CREATE TABLE utenti (
  utente VARCHAR(20),
  password VARCHAR(32)
);

INSERT INTO utenti VALUES ('CapitanBlogger', md5('segreta'));