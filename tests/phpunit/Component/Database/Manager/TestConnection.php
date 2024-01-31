<?php
declare(strict_types=1);

namespace PHPUnitTest\Component\Database\Manager;

use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Manager\DatabaseManager;

/**
 * TestConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  PHPUnitTest\Component\Database\Manager
*/
class TestConnection
{
     public static function make(): ConnectionInterface
     {
          $manager = new DatabaseManager();
          $manager->open('mysql', [
              'dsn'      => 'mysql:host=127.0.0.1;dbname=laventure_test;charset=utf8',
              'username' => 'root',
              'password' => 'secret',
              'options'  => [
                  #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
              ]
          ]);

          return $manager->connection();
     }
}