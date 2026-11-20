-- Database for blog-practice lab project
-- Import this file in phpMyAdmin (Import tab) or run it in MySQL

CREATE DATABASE IF NOT EXISTS blog_practice;
USE blog_practice;

DROP TABLE IF EXISTS posts;

CREATE TABLE posts (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

-- some sample data
INSERT INTO posts (title, author, content) VALUES
('My First Blog Post', 'Mahfuz', 'Hello everyone! This is my first post on this blog. I made this blog for my web programming lab.'),
('Learning PHP', 'Mahfuz', 'PHP is a server side scripting language. It is used to make dynamic web pages. Today we learned how to connect PHP with MySQL.'),
('What is CRUD?', 'Mahfuz', 'CRUD means Create, Read, Update and Delete. These are the four basic operations of any database application.');
