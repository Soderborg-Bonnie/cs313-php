




CREATE TABLE topic
(
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(100) NOT NULL
);

-- INSERT INTO topic (Faith, Sacrifice, Charity)
--   VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO topic (name) VALUES ('Faith');
INSERT INTO topic (name) VALUES ('Sacrifice');
INSERT INTO topic (name) VALUES ('Charity');

CREATE TABLE lookup
(
   id SERIAL PRIMARY KEY,
   topic int REFERENCES topic(id),
   scripture int REFERENCES scriptures(id)
);

INSERT INTO lookup (topic,scripture) VALUES ('1','1');
INSERT INTO lookup (topic,scripture) VALUES ('2','1');
INSERT INTO lookup (topic,scripture) VALUES ('3','1');


CREATE TABLE scripture
(
    id SERIAL PRIMARY KEY,
    book TEXT,
    chapter TEXT,
    verse TEXT,
    content TEXT
);