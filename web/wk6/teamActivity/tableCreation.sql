CREATE TABLE topic
(
    id SERIAL PRIMARY KEY,
    name TEXT
);

CREATE TABLE scriptures
(
    id SERIAL PRIMARY KEY,
    book TEXT,
    chapter TEXT,
    verse TEXT,
    content TEXT
);

INSERT INTO topic (name) VALUES ('Faith');
INSERT INTO topic (name) VALUES ('Sacrifice');
INSERT INTO topic (name) VALUES ('Charity');

CREATE TABLE lookup
(
   id SERIAL PRIMARY KEY,
   topic text,
   scripture text 
);