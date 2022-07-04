<?php

namespace App\Libraries\AbstractElements;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

abstract class AApi
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client(static::clientOptions());
    }

    /**
     * Do get query
     * @param string $url
     * @return mixed|null
     */
    public function get(string $url)
    {
        return static::query('get', $url);
    }

    /**
     * Do post query
     * @param string $url
     * @param array|null $data
     * @return mixed|null
     */
    public function post(string $url, ?array $data = null)
    {
        return static::query('post', $url, $data);
    }

    /**
     * Base query
     * @param string $method
     * @param string $url
     * @param array|null $data
     * @param bool $as_associative
     * @return mixed|null
     */
    protected function query(string $method, string $url, ?array $data = null, bool $as_associative = false)
    {
        try {
            $response = $this->client->$method($url, static::queryOptions($data));

            $raw_response = $response->getBody()->getContents();
            $response_data = json_decode($raw_response, $as_associative);

            return $response_data ?? true;
        }
        catch (ClientException $e) {

            Log::warning($e->getMessage());
            static::handleError($e);
            return null;
        }
        catch (\Throwable $t) {
            Log::warning($t->getMessage());
            return null;
        }
    }

    /**
     * Query options
     * @param array|null $data
     * @return array
     */
    abstract protected function queryOptions(?array $data = null) : array;

    /**
     * Query client options
     * @return array
     */
    abstract protected function clientOptions() : array;

    /**
     * Handle errors
     * @param ClientException $e
     */
    abstract protected function handleError(ClientException $e);
}
