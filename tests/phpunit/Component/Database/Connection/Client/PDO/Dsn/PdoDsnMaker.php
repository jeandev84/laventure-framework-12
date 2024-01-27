<?php
declare(strict_types=1);

namespace PHPUnitTest\Component\Database\Connection\Client\PDO\Dsn;

use Laventure\Component\Database\Connection\Client\PDO\Dsn\PdoDsnBuilder;

/**
 * PdoDsnMaker
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  PHPUnitTest\Component\Database\Connection\Client\PDO\Dsn
 */
class PdoDsnMaker
{
  public static function makeDsn(): PdoDsnBuilder
  {
      return new PdoDsnBuilder('mysql', [
          'host'    => '127.0.0.1',
          'port'     => '3306',
          'username' => 'root',
          'password' => 'secret',
          'dbname'   => 'homestead',
          'charset'  => 'utf8'
      ]);
  }
}