<?php
declare(strict_types=1);

namespace Component\Database\Connection\Client\PDO\Dsn;

use Laventure\Component\Database\Connection\Client\PDO\Dsn\PdoDsnBuilder;
use PHPUnit\Framework\TestCase;

/**
 * PdoDsnBuilderTest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Component\Database\Connection\Client\PDO\Dsn
 */
class PdoDsnBuilderTest extends TestCase
{
       public function testItBuildCorrectlyDsn(): void
       {
            $mysqlDsn = new PdoDsnBuilder('mysql', [
                'host'    => '127.0.0.1',
                'port'     => '3306',
                'username' => 'root',
                'password' => 'secret',
                'dbname'   => 'homestead',
                'charset'  => 'utf8'
            ]);
       }
}