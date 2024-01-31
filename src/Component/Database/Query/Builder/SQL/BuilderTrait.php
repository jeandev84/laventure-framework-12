<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL;

use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Query\Builder\SQL\Utils\QueryFormatter;
use Laventure\Component\Database\Query\QueryInterface;

/**
 * BuilderTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL
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
     * @var QueryFormatter
    */
    protected QueryFormatter $formatter;



    /**
     * @param ConnectionInterface $connection
    */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
        $this->formatter  = new QueryFormatter();
    }







    /**
     * @param $id
     * @param $value
     * @return $this
    */
    public function setParameter($id, $value): static
    {
        $this->parameters[$id] = $value;

        return $this;
    }






    /**
     * @param $id
     * @param $value
     * @param $type
     * @return $this
    */
    public function bindParam($id, $value, $type = null): static
    {
        $this->bindingParams[$id] = [$id, $value, intval($type)];

        return $this;
    }






    /**
     * @param $id
     * @param $value
     * @param $type
     * @return $this
    */
    public function bindValue($id, $value, $type = null): static
    {
        $this->bindingValues[$id] = [$id, $value, intval($type)];

        return $this;
    }







    /**
     * @param $id
     * @return mixed
    */
    public function getParameter($id): mixed
    {
        return $this->parameters[$id] ?? null;
    }






    /**
     * @param array $parameters
     * @return $this
    */
    public function setParameters(array $parameters): static
    {
        foreach ($parameters as $id => $value) {
            $this->setParameter($id, $value);
        }

        return $this;
    }






    /**
     * @return array
    */
    public function getParameters(): array
    {
        return $this->parameters;
    }





    /**
     * @return QueryInterface
    */
    public function getQuery(): QueryInterface
    {
        $statement = $this->connection->statement($this->getSQL());
        $statement->bindParams($this->bindingParams);
        $statement->bindValues($this->bindingValues);
        return $statement->withParams($this->parameters);
    }






    /**
     * @return string
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
