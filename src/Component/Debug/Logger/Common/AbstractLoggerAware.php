<?php
declare(strict_types=1);

namespace Laventure\Component\Debug\Logger\Common;

use Psr\Log\LoggerAwareInterface;

/**
 * AbstractLoggerAware
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Debug\AbstractLogger\Common
*/
abstract class AbstractLoggerAware implements LoggerAwareInterface
{
      use LoggerAwareTrait;
}