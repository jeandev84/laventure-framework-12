<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;

/**
 * MysqliClient
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli
 */
class MysqliClient implements ClientConnectionInterface
{
    /**
     * @inheritDoc
     */
    public function getName(): mixed
    {
        // TODO: Implement getName() method.
    }

    /**
     * @inheritDoc
     */
    public function getConnection(): mixed
    {
        // TODO: Implement getConnection() method.
    }

    /**
     * @inheritDoc
     */
    public function createQuery(): QueryInterface
    {
        // TODO: Implement createQuery() method.
    }

    /**
     * @inheritDoc
     */
    public function connect(ConfigurationInterface $config): mixed
    {
        // TODO: Implement connect() method.
    }

    /**
     * @inheritDoc
     */
    public function disconnect(): void
    {
        // TODO: Implement disconnect() method.
    }

    /**
     * @inheritDoc
     */
    public function reconnect(ConfigurationInterface $config): mixed
    {
        // TODO: Implement reconnect() method.
    }

    /**
     * @inheritDoc
     */
    public function connected(): bool
    {
        // TODO: Implement connected() method.
    }

    /**
     * @inheritDoc
     */
    public function disconnected(): bool
    {
        // TODO: Implement disconnected() method.
    }

    /**
     * @inheritDoc
     */
    public function beginTransaction(): bool
    {
        // TODO: Implement beginTransaction() method.
    }

    /**
     * @inheritDoc
     */
    public function hasActiveTransaction(): bool
    {
        // TODO: Implement hasActiveTransaction() method.
    }

    /**
     * @inheritDoc
     */
    public function commit(): bool
    {
        // TODO: Implement commit() method.
    }

    /**
     * @inheritDoc
     */
    public function rollback(): bool
    {
        // TODO: Implement rollback() method.
    }

    /**
     * @inheritDoc
     */
    public function transaction(callable $func): mixed
    {
        // TODO: Implement transaction() method.
    }
}
