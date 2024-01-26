<?php

declare(strict_types=1);

namespace Laventure\Utils\Parameter;

use Laventure\Contract\Parameter\ArrayParameterInterface;

/**
 * ArrayParameter
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Utils\Params
 */
class ArrayParameter implements ArrayParameterInterface
{
    /**
     * @var array
    */
    protected array $params;



    /**
     * @param array $params
    */
    public function __construct(array $params = [])
    {
        $this->params = $params;
    }




    /**
     * @inheritDoc
    */
    public function set($id, $value): static
    {
        $this->params[$id] = $value;

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function add(array $params): static
    {
        $this->params = array_merge($this->params, $params);

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function has($id): bool
    {
        return isset($this->params[$id]);
    }






    /**
     * @return bool
    */
    public function empty(): bool
    {
        return empty($this->params);
    }





    /**
     * @param string $key
     * @return bool
    */
    public function isEmpty(string $key): bool
    {
        return empty($this->params[$key]);
    }

    




    /**
     * @inheritDoc
    */
    public function count(): int
    {
        return count($this->params);
    }




    /**
     * @inheritDoc
    */
    public function get($id, $default = null): mixed
    {
        return $this->params[$id] ?? $default;
    }

    


    /**
     * @inheritDoc
    */
    public function remove($id): bool
    {
        unset($this->params[$id]);

        return $this->has($id);
    }






    /**
     * @inheritDoc
    */
    public function all(): array
    {
        return $this->params;
    }




    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return $this->has($offset);
    }




    /**
     * @param mixed $offset
     *
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->get($offset);
    }





    /**
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->set($offset, $value);
    }




    public function offsetUnset(mixed $offset): void
    {
        $this->remove($offset);
    }
}
