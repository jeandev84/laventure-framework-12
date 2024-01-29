<?php

declare(strict_types=1);

namespace PHPUnitTest\Component\Database\Connection\Client\PDO\Dsn;

use Laventure\Component\Database\Client\PDO\Dsn\PdoDsnBuilder;
use PHPUnit\Framework\TestCase;

/**
 * PdoDsnBuilderTest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  PHPUnitTest\Component\Database\ConnectionMaker\Client\PDO\Dsn
 */
class PdoDsnBuilderTest extends TestCase
{
    public function testItBuildCorrectlyDsn(): void
    {
        $mysqlDsn = PdoDsnBuilder::create('mysql', [
            'host'    => '127.0.0.1',
            'port'     => '3306',
            'username' => 'root',
            'password' => 'secret',
            'dbname'   => 'homestead',
            'charset'  => 'utf8'
        ]);

        $pgsqlDsn = PdoDsnBuilder::create('pgsql', [
           'host'     => '127.0.0.1',
           'port'     => '5432',
           'username' => 'postgres',
           'password' => '123456',
           'dbname'   => 'homestead'
        ]);

        $this->assertSame(
            'mysql:host=127.0.0.1;port=3306;username=root;password=secret;dbname=homestead;charset=utf8',
            $mysqlDsn->build()
        );

        $this->assertSame(
            'pgsql:host=127.0.0.1;port=5432;username=postgres;password=123456;dbname=homestead',
            $pgsqlDsn->build()
        );
    }
}
