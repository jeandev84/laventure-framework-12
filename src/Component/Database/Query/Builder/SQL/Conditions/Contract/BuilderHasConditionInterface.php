<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\Conditions\Contract;

use Laventure\Component\Database\Query\Builder\SQL\BuilderInterface;


/**
 * BuilderHasConditionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL\Conditions\Contract
*/
interface BuilderHasConditionInterface extends HasConditionInterface, BuilderInterface
{

}