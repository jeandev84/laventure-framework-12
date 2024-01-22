<?php

declare(strict_types=1);

namespace Laventure\Foundation\Http\Response;

use Stringable;

/**
 * Response
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Web\Http\Response
*/
class Response implements Stringable
{
    /**
     * @param string $body
     * @param int $status
     * @param array $headers
    */
    public function __construct(
        protected string $body = '',
        protected int    $status = 200,
        protected array  $headers = []
    ) {
    }


    public function send(): void
    {
        echo "Headers sent ...\n";
    }


    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return $this->body;
    }
}
