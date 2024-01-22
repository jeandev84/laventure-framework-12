<?php

declare(strict_types=1);

namespace Laventure\Component\Http\Client;

use Laventure\Component\Http\Client\Factory\HttpClientFactory;
use Laventure\Component\Http\Client\Factory\HttpClientFactoryInterface;
use Laventure\Component\Http\Message\Request\Factory\RequestFactory;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * HttpClient
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Http\Client
*/
class HttpClient implements HttpClientInterface
{
    /**
     * @var RequestFactoryInterface
    */
    protected RequestFactoryInterface $requestFactory;
    protected HttpClientFactoryInterface $clientFactory;


    /**
     * @param RequestFactoryInterface $requestFactory
     * @param HttpClientFactoryInterface $clientFactory
    */
    public function __construct(
        RequestFactoryInterface $requestFactory,
        HttpClientFactoryInterface $clientFactory
    ) {
        $this->requestFactory = $requestFactory;
        $this->clientFactory = $clientFactory;
    }




    /**
     * @return static
    */
    public static function create(): HttpClient
    {
        return new self(new RequestFactory(), new HttpClientFactory());
    }




    /**
     * @inheritDoc
     * @throws ClientExceptionInterface
     */
    public function request(string $method, string $url, array $options = []): ResponseInterface
    {
        $request = $this->requestFactory->createRequest($method, $url);
        $client  = $this->clientFactory->createClient($options);
        return $client->sendRequest($request);
    }




    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function get(string $url, array $options = []): ResponseInterface
    {
        return $this->request('GET', $url, $options);
    }





    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function post(string $url, array $options = []): ResponseInterface
    {
        return $this->request('POST', $url, $options);
    }






    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function put(string $url, array $options = []): ResponseInterface
    {
        return $this->request('PUT', $url, $options);
    }







    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function patch(string $url, array $options = []): ResponseInterface
    {
        return $this->request('PATCH', $url, $options);
    }





    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function delete(string $url, array $options = []): ResponseInterface
    {
        return $this->request('DELETE', $url, $options);
    }
}
