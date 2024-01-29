<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Client\PDO\Dsn;

use Laventure\Contract\Builder\BuilderInterface;
use Stringable;

/**
 * PdoDsnBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Client\PDO\Dsn
*/
interface PdoDsnBuilderInterface extends BuilderInterface, Stringable
{
    /**
     * @return string
     */
    public function getDriver(): string;




    /**
     * @param array $params
     * @return $this
    +*/
    public function withParams(array $params): static;





    /**
     * @param string $name
     * @return $this
     */
    public function withoutParam(string $name): static;




    /**
     * @return array
    */
    public function getParams(): array;
}
