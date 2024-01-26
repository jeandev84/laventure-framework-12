<?php

declare(strict_types=1);

namespace Laventure\Component\Debug\Logger\Writer;

/**
 * AbstractLoggerWriter
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Debug\Logger\Writer
*/
abstract class AbstractLoggerWriter implements LoggerWriterInterface
{
    use LoggerWriterTrait;
}
