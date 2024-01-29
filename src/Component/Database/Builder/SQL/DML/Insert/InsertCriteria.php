<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML\Insert;

/**
 * InsertCriteria
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Criteria
*/
class InsertCriteria
{
    public string $table;
    public array $values = [];
}