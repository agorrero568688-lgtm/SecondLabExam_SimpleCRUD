SETUP
1. Start Apache + MySQL (XAMPP/Laragon) or have PHP 8+ and MySQL installed.
2. Import schema.sql (phpMyAdmin > Import, or: mysql -u root < schema.sql).
3. Edit config.php if your MySQL credentials differ.
4. Run from this folder:  php -S localhost:8000 -t public
   (or place the folder in htdocs and open http://localhost/LabExam/public/)
5. Open http://localhost:8000 in your browser.
