<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client;

/**
 * ClientType
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client
*/
enum ClientType
{
    const Pdo    = 'pdo';
    const MyQSLi = 'mysqli';
}