<?php

require 'vendor/autoload.php';


$select = "SELECT * FROM users WHERE id = :id";

$insert = "INSERT INTO users (username, password) VALUES (:username, :password)";

$update = "UPDATE users SET username = :username WHERE id = :id";

$delete = "DELETE FROM users WHERE id = :id";


