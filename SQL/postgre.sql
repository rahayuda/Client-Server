-- Membuat database db1
CREATE DATABASE db1;

-- Menggunakan database db1
\c db1;

-- Membuat tabel users
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100)
);

-- Menambahkan 3 data ke dalam tabel users
INSERT INTO users (name) VALUES ('Alice');
INSERT INTO users (name) VALUES ('Bob');
INSERT INTO users (name) VALUES ('Charlie');
