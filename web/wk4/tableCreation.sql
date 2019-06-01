CREATE TABLE isbn
(
    id SERIAL PRIMARY KEY,
    book_number TEXT UNIQUE,
    book_title TEXT,
    published_date DATE
);

CREATE TABLE author
(
    author_id SERIAL PRIMARY KEY,
    author_name TEXT,
    book_number TEXT REFERENCES isbn(book_number)
);

CREATE TABLE genre(
    genre_name TEXT PRIMARY KEY
);

CREATE TABLE genre(
    genre_id SERIAL PRIMARY KEY,
    book_number TEXT REFERENCES isbn(book_number),
    genre TEXT 
);

CREATE TABLE words
(
    words_id SERIAL PRIMARY KEY,
    book_number TEXT REFERENCES isbn(book_number),
    words TEXT, 
    comments TEXT
);

CREATE TABLE media_type(
    media_type TEXT PRIMARY KEY
);

CREATE TABLE media(
    media_id SERIAL PRIMARY KEY,
    book_number TEXT REFERENCES isbn(book_number),
    media TEXT 
);

CREATE TABLE tags(
    tag_id TEXT UNIQUE PRIMARY KEY
);

CREATE TABLE tags(
    tags_id SERIAL PRIMARY KEY,
    book_number TEXT REFERENCES isbn(book_number),
    tags TEXT
);

ALTER TABLE isbn 
ADD COLUMN author_id INTEGER REFERENCES author(author_id); 

ALTER TABLE media_type
ADD COLUMN book_number TEXT REFERENCES isbn(book_number);

