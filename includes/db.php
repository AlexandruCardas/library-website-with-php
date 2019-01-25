<?php

$db = new SQLite3('library.db');
if (!$db) die('Database connection failed');


$sql= <<<SQL
CREATE TABLE students(
id number(4),
PRIMARY KEY (id)
);
SQL;


$db->query($sql);





