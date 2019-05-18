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
    book_id INTEGER REFERENCES isbn(id)
);

CREATE TABLE genre(
    genre_name TEXT PRIMARY KEY
);

CREATE TABLE book_genre(
    book_genre_id SERIAL PRIMARY KEY,
    book_id INTEGER REFERENCES isbn(id),
    genre TEXT REFERENCES genre(genre_name)
);

CREATE TABLE description
(
    description_id SERIAL PRIMARY KEY,
    isbn_id INTEGER REFERENCES isbn(id),
    description TEXT, 
    comments TEXT
);

CREATE TABLE media_type(
    media_type TEXT PRIMARY KEY
);

CREATE TABLE book_media_type(
    book_media_id SERIAL PRIMARY KEY,
    book_id INTEGER REFERENCES isbn(id),
    media_type TEXT REFERENCES media_type(media_type)
);

CREATE TABLE tags(
    tag_id TEXT UNIQUE PRIMARY KEY
);

CREATE TABLE book_tags(
    book_tags_id SERIAL PRIMARY KEY,
    book_id INTEGER REFERENCES isbn(id),
    tag_id TEXT REFERENCES tags(tag_id)
);

ALTER TABLE isbn
ADD COLUMN author_id INTEGER REFERENCES author(author_id);