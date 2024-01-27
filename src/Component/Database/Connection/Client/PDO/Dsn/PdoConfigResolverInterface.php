<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Dsn;


use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;

/**
 * PdoConfigResolverInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Dsn
 */
interface PdoConfigResolverInterface
{
     public function resolveConfig(ConfigurationInterface $config): ConfigurationInterface;
}