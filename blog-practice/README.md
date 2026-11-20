# Blog Practice

A simple blog CRUD project made with PHP and MySQL for university lab class.

## Features
- Create a new post
- View all posts and single post
- Edit a post
- Delete a post

## How to run (XAMPP)
1. Copy the `blog-practice` folder into `C:\xampp\htdocs\`
2. Start **Apache** and **MySQL** from XAMPP control panel
3. Open `http://localhost/phpmyadmin`, go to **Import** and select `database.sql`
4. Open `http://localhost/blog-practice` in the browser

> If your MySQL has a password, change it in `db.php`.

## Files
| File | Purpose |
|------|---------|
| `db.php` | Database connection |
| `index.php` | Show all posts |
| `create.php` | Add new post |
| `view.php` | Show single post |
| `edit.php` | Update post |
| `delete.php` | Delete post |
| `database.sql` | Database and table with sample data |
