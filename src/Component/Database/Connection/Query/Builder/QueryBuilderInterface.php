<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

use Laventure\Component\Database\Builder\SQL\Contract\Conditions\ConditionInterface;
use Laventure\Component\Database\Builder\SQL\Contract\DML\DeleteBuilderInterface;
use Laventure\Component\Database\Builder\SQL\Contract\DML\InsertBuilderInterface;
use Laventure\Component\Database\Builder\SQL\Contract\DML\UpdateBuilderInterface;
use Laventure\Component\Database\Builder\SQL\Contract\DQL\SelectBuilderInterface;

/**
 * QueryBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
*/
interface QueryBuilderInterface extends SelectBuilderInterface,
    InsertBuilderInterface,
    UpdateBuilderInterface,
    DeleteBuilderInterface,
    ConditionInterface
{
}
