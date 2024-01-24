<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Dsn;

/**
 * PdoDsnBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Dsn
*/
class PdoDsnBuilder implements PdoDsnBuilderInterface
{
    /**
     * @var string
    */
    private string $driver;


    /**
     * @var array
    */
    private array $params;




    /**
     * @param string $driver
     * @param array $params
    */
    public function __construct(string $driver, array $params)
    {
        $this->driver = $driver;
        $this->params = $params;
    }






    /**
     * @inheritDoc
    */
    public function getDriver(): string
    {
        return $this->driver;
    }




    /**
     * @inheritDoc
    */
    public function withParams(array $params): static
    {
        $this->params = array_merge($this->params, $params);

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function withoutParam(string $name): static
    {
        unset($this->params[$name]);

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function getParams(): array
    {
        return $this->params;
    }




    /**
     * @inheritDoc
    */
    public function build(): string
    {
        return "$this->driver:". http_build_query($this->params, '', ';');
    }





    /**
     * @return string
    */
    public function __toString(): string
    {
        return $this->build();
    }
}
