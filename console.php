<?php


use Laventure\Component\Config\Config;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;
use Laventure\Component\Database\Connection\Drivers\Mysql\MysqlConnection;
use Laventure\Component\Database\Connection\Drivers\Sqlite\SqliteConnection;
use Laventure\Component\Database\Manager\DatabaseManager;

require 'vendor/autoload.php';

$client      = new PdoClient();
$database    = new DatabaseManager();

$params      = require __DIR__.'/config/database.php';
$config      = new Config($params);

$connection  = $config->get('connection');
$extension   = $config->get('extension');
$credentials = $config->get("connections.$extension.$connection");

$database->open('mysql', $credentials);
$database->extension($extension);
$database->connections([
    new MysqlConnection($client),
    new SqliteConnection($client)
]);

dd($database->connection());


dd($database->getConnections());
