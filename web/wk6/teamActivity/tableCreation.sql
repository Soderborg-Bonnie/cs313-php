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