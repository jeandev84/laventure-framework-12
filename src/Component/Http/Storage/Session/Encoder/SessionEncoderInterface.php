<?php

declare(strict_types=1);

namespace Laventure\Component\Http\Storage\Session\Encoder;

/**
 * SessionEncoderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Http\Message\Request\Session\Encoder
*/
interface SessionEncoderInterface
{
    /**
     * @return mixed
    */
    public function encode(): mixed;


    /**
     * @param string $data
     * @return mixed
    */
    public function decode(string $data): mixed;
}
