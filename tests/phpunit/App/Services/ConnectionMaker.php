<?php
declare(strict_types=1);

namespace PHPUnitTest\App\Services;

use Laventure\Component\Database\Manager\DatabaseManager;
use PDO;

/**
 * ConnectionMaker
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  PHPUnitTest\App\Services
 */
class ConnectionMaker
{

      /**
       * @return DatabaseManager
     */
     public static function make(): DatabaseManager
     {
          $manager = new DatabaseManager();
          $manager->open('mysql', [
            'dsn' => 'mysql:host=127.0.0.1;dbname=laventure_test;charset=utf8',
            'username' => 'root',
            'password' => 'secret',
            'options' => [
                #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ],
         ]);

         return $manager;
     }
}