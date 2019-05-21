CREATE TABLE scriptures(
    scriptures_id SERIAL PRIMARY KEY,
    scriptures_book TEXT,
    scriptures_chapter INTEGER,
    scriptures_verse INTEGER,
    scriptures_content TEXT
);

INSERT INTO scriptures (scriptures_id, scriptures_book, scriptures_chapter, scriptures_verse, scriptures_content) 
VALUES (John, 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO scriptures (scriptures_id, scriptures_book, scriptures_chapter, scriptures_verse, scriptures_content) 
VALUES (Doctrine and Covenants, 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');
INSERT INTO scriptures (scriptures_id, scriptures_book, scriptures_chapter, scriptures_verse, scriptures_content) 
VALUES (Doctrine and Covenants, 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');
INSERT INTO scriptures (scriptures_id, scriptures_book, scriptures_chapter, scriptures_verse, scriptures_content) 
VALUES (John, 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');