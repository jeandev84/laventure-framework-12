<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL;

use Laventure\Component\Database\Query\Builder\SQL\Conditions\Traits\ConditionTrait;

/**
 * BuilderHasConditions
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL
*/
trait BuilderHasConditions
{
     use BuilderTrait, ConditionTrait;
}