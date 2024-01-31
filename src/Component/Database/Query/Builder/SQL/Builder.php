<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL;


/**
 * Builder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL
 */
abstract class Builder implements BuilderInterface
{
    use BuilderTrait;
}