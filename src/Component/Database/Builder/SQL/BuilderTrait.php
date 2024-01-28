<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL;


use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;

/**
 * BuilderTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL
 */
trait BuilderTrait
{
    /**
     * @var array
     */
    protected array $parameters = [];



    /**
     * @var array
     */
    protected array $bindingParams = [];


    /**
     * @var array
    */
    protected array $bindingValues = [];




    /**
     * @var ConnectionInterface
     */
    protected ConnectionInterface $connection;




    /**
     * @var string
    */
    protected string $table;






    /**
     * @param ConnectionInterface $connection
     * @param string $table
    */
    public function __construct(ConnectionInterface $connection, string $table = '')
    {
        $this->connection = $connection;
        $this->table      = $table;
    }





    /**
     * @param string $table
     *
     * @return $this
    */
    public function table(string $table): static
    {
        $this->table = $table;

        return $this;
    }




    /**
     * @return string
    */
    public function getTable(): string
    {
        return $this->table;
    }




    /**
     * @inheritDoc
    */
    public function setParameter($id, $value): static
    {
        $this->parameters[$id] = $value;

        return $this;
    }





    /**
     * @inheritdoc
    */
    public function bindParam($id, $value, $type = null): static
    {
        $this->bindingParams[$id] = [$id, $value, intval($type)];

        return $this;
    }




    /**
     * @inheritdoc
    */
    public function bindValue($id, $value, $type = null): static
    {
        $this->bindingValues[$id] = [$id, $value, intval($type)];

        return $this;
    }






    /**
     * @inheritDoc
     */
    public function getParameter($id): mixed
    {
        return $this->parameters[$id] ?? null;
    }





    /**
     * @inheritDoc
     */
    public function setParameters(array $parameters): static
    {
        foreach ($parameters as $id => $value) {
            $this->setParameter($id, $value);
        }

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }




    /**
     * @inheritDoc
    */
    public function getQuery(): QueryInterface
    {
        $statement = $this->connection->statement($this->getSQL());
        $statement->bindParams($this->bindingParams);
        $statement->bindValues($this->bindingValues);
        return $statement->withParams($this->parameters);
    }






    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return $this->getSQL();
    }




    /**
     * @return string
    */
    abstract public function getSQL(): string;
}