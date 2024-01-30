<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML\Update;

/**
 * UpdateCriteria
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Criteria
 */
class UpdateCriteria
{
    public string $table;
    public array $set = [];
}