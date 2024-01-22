<?php

declare(strict_types=1);

namespace Laventure\Component\Http\Message\Request;

use Laventure\Component\Http\Message\Request\Utils\Encoder\UrlEncoder;
use Laventure\Component\Http\Message\Request\Utils\Info\UrlInfo;
use Psr\Http\Message\UriInterface;

/**
 * Uri
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Http\Message\Request
*/
class Uri implements UriInterface
{
    /**
     * Get scheme
     *
     * @var string
    */
    protected string $scheme = '';




    /**
     * Get host
     *
     * @var string
    */
    protected string $host = '';





    /**
     * Get username
     *
     * @var string
    */
    protected string $username = '';




    /**
     * Get password
     *
     * @var string|null
    */
    protected ?string $password;



    /**
     * Get port
     *
     * @var int|null
    */
    protected ?int $port;





    /**
     * Get path
     *
     * @var string
    */
    protected string $path = '';





    /**
     * Builder string
     *
     * @var string
    */
    protected string $query = '';





    /**
     * Fragment request
     *
     * @var string
    */
    protected string $fragment = '';





    /**
     * @param string $uri
    */
    public function __construct(string $uri = '')
    {
        if ($uri !== '') {
            $this->parse($uri);
        }
    }





    /**
     * @inheritDoc
    */
    public function getScheme(): string
    {
        return $this->scheme;
    }



    /**
     * @inheritDoc
    */
    public function getAuthority(): string
    {
        $authority = '';

        if ($this->username) {
            $authority .= sprintf('%s@', $this->getUserInfo());
        }

        $authority .= $this->host;

        if ($this->port) {
            $authority .= sprintf(':%s', $this->port);
        }

        return $authority;
    }




    /**
     * @inheritDoc
    */
    public function getUserInfo(): string
    {
        return "$this->username:$this->password";
    }




    /**
     * @inheritDoc
    */
    public function getHost(): string
    {
        return $this->host;
    }




    /**
     * @inheritDoc
    */
    public function getPort(): ?int
    {
        return $this->port;
    }



    /**
     * @inheritDoc
    */
    public function getPath(): string
    {
        return $this->path;
    }




    /**
     * @inheritDoc
    */
    public function getQuery(): string
    {
        return $this->query;
    }




    /**
     * @inheritDoc
    */
    public function getFragment(): string
    {
        return $this->fragment;
    }



    /**
     * @inheritDoc
    */
    public function withScheme(string $scheme): static
    {
        $this->scheme = $scheme;

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function withUserInfo(string $user, ?string $password = null): static
    {
        $this->username = $user;
        $this->password = $password;

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function withHost(string $host): static
    {
        $this->host = $host;

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function withPort(?int $port): static
    {
        $this->port = $port;

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function withPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function withQuery(string $query): static
    {
        $this->query = $query;

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function withFragment(string $fragment): static
    {
        $this->fragment = $fragment;

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return UrlEncoder::decode($this->build());
    }


    /**
     * @param string $uri
     * @return void
    */
    private function parse(string $uri): void
    {
        $info = new UrlInfo($uri);
        $this->withScheme($info->getScheme())
             ->withUserInfo($info->getUsername(), $info->getPassword())
             ->withHost($info->getHost())
             ->withPort($info->getPort())
             ->withPath($info->getPath())
             ->withQuery($info->getQuery())
             ->withFragment($info->getFragment());
    }





    /**
     * @return string
    */
    private function build(): string
    {
        $url   = [];
        $url[] = ($this->scheme ? "$this->scheme://{$this->getAuthority()}" : '');
        $url[] = $this->path;
        $url[] = ($this->query ? "?$this->query" : '');
        $url[] = ($this->fragment ? "#$this->fragment" : '');

        return join(array_filter($url));
    }
}
