<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

use Laventure\Component\Database\Builder\SQL\ConditionInterface;
use Laventure\Component\Database\Builder\SQL\DML\DeleteBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DML\InsertBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DML\UpdateBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DQL\SelectBuilderInterface;

/**
 * QueryBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Contract
*/
interface QueryBuilderInterface extends
    SelectBuilderInterface,
    UpdateBuilderInterface,
    InsertBuilderInterface,
    DeleteBuilderInterface,
    ConditionInterface
{
}
