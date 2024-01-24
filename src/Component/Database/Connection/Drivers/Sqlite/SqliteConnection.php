<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers\Sqlite;

use http\Exception;
use Laventure\Component\Database\Connection\Drivers\DriverConnection;

/**
 * SqliteConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Drivers
 */
class SqliteConnection extends DriverConnection implements SqliteConnectionInterface
{
    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'sqlite';
    }

    /**
     * @inheritDoc
     */
    public function getDatabases(): array
    {
        // TODO: Implement getDatabases() method.
    }

    /**
     * @inheritDoc
     */
    public function createDatabase(): mixed
    {
        // TODO: Implement createDatabase() method.
    }

    /**
     * @inheritDoc
     */
    public function dropDatabase(): mixed
    {
        // TODO: Implement dropDatabase() method.
    }

    /**
     * @inheritDoc
     */
    public function hasDatabase(): bool
    {
        // TODO: Implement hasDatabase() method.
    }

    /**
     * @inheritDoc
     */
    public function hasTable(string $name): bool
    {
        // TODO: Implement hasTable() method.
    }

    /**
     * @inheritDoc
     */
    public function getTables(): array
    {
        // TODO: Implement getTables() method.
    }
}
