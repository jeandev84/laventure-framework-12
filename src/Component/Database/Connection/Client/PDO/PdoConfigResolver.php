<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\PDO\Dsn\PdoDsnBuilder;

/**
 * PdoConfigResolver
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO
 */
class PdoConfigResolver
{
    /**
     * Connection name
     *
     * @var string
    */
    private string $name;



    /**
     * @param string $name
    */
    public function __construct(string $name)
    {
        $this->name = $name;
    }



    /**
     * @param ConfigurationInterface $config
     * @return ConfigurationInterface
    */
    public function resolve(ConfigurationInterface $config): ConfigurationInterface
    {
        $config['dsn'] = $this->resolveDsn($config);
        return $config;
    }



    /**
     * @param ConfigurationInterface $config
     * @return string
    */
    private function resolveDsn(ConfigurationInterface $config): string
    {
        $driver = $config->get('driver', $this->name);

        if ($config->has('dsn')) {
            $dsn = $config['dsn'];
            if (is_array($dsn)) {
                return strval(PdoDsnBuilder::create($driver, $dsn));
            }
            return $dsn;
        }

        return strval(PdoDsnBuilder::create($driver, $this->getDefaultDsnParams($config)));
    }




    /**
     * @param ConfigurationInterface $config
     * @return array
    */
    private function getDefaultDsnParams(ConfigurationInterface $config): array
    {
        return [
            'host'     => $config->host(),
            'port'     => $config->port(),
            'dbname'   => $config->database(),
            'charset'  => $config->charset() ?? 'utf8',
            'username' => $config->username() ?? '',
            'password' => $config->password() ?? ''
        ];
    }

}
