<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Utils;

/**
 * QueryFormatter
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\Utils
*/
class QueryFormatter
{
    /**
     * @var array
    */
    protected array $queries = [];



    /**
     * @param array $queries
    */
    public function __construct(array $queries)
    {
        $this->withQueries($queries);
    }


    /**
     * @param string $query
     * @return $this
    */
    public function withQuery(string $query): static
    {
        $this->queries[] = $query;

        return $this;
    }


    /**
     * @param array $queries
     * @return $this
    */
    public function withQueries(array $queries): static
    {
        foreach ($queries as $query) {
            $this->withQuery($query);
        }

        return $this;
    }




    /**
     * @return string
    */
    public function format(): string
    {
        return join(' ', array_filter($this->queries)) . ";";
    }




    /**
     * @return string
    */
    public function __toString(): string
    {
        return $this->format();
    }
}