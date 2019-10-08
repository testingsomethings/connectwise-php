<?php

namespace Acadea\Connectwise;

use Acadea\Connectwise\Connectwise\ApiRequestInterface;
use Acadea\Connectwise\Connectwise\Auth\ConnectwiseClient;
use Illuminate\Support\Collection;


class Connectwise implements ApiRequestInterface
{
    protected $uri;
    /**
     * @var ConnectwiseClient
     */
    protected $client;

    /**
     * Create a new Connectwise Instance.
     */
    public function __construct(?string $uri = "")
    {
        $this->uri = $uri;
        $this->client = app()->make(ConnectwiseClient::class);
    }

    /**
     * @param array|null $filter array looks like
     *               [
    '                   'conditions'=> "identifier='XYZTestCompany'"
     *               ]
     *
     * @param int|null $size
     * @return Collection|null
     */
    public function get(?array $filter=[], ?int $size=50): ?Collection
    {
        if($filter === null)
            $filter = [];
        $filterQuery = http_build_query($filter);
        $uri = $this->uri .'?'. $filterQuery;
        return $this->client->request('get', $uri);
    }

    /**
     * @param array $payload
     * @return Collection|null
     */
    public function create(array $payload)
    {
        return $this->client->request('post', $this->uri, $payload);
    }

    public function find(string $id): Collection
    {
        $uri = $this->uri . '/' . $id;
        return $this->client->request('get', $uri);
    }

    /**
     * @param string $id
     * @param array $payload an array of array
     *      [
    [
    'op' => 'replace',
    'path' => 'phoneNumber',
    'value' => '054684321',
    ],
     *          [
    'op' => 'replace',
    'path' => 'city',
    'value' => 'heya',
    ],
    ]
     *
     * @return Collection|mixed|null
     */
    public function update(string $id, array $payload)
    {
        $uri = $this->uri . '/' . $id;
        return $this->client->request('patch', $uri, $payload);
    }

    public function delete(string $id)
    {
        $uri = $this->uri . '/' . $id;
        return $this->client->request('delete', $uri);
    }

    public function count(?array $filter=[]): int
    {
        if($filter === null)
            $filter = [];
        $filterQuery = http_build_query($filter);
        $uri = $this->uri .'/count?'. $filterQuery;
        return $this->client->request('get', $uri)->first();
    }
}
