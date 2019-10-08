<?php


namespace Acadea\Connectwise\Connectwise;


interface ApiRequestInterface
{
    /**
     * Get a list of resources
     * @param string $size
     * @param array $filter
     * @return array
     */
    public function get(?array $filter=[]);

    /**
     * Create item
     * @param array $payload
     * @return mixed
     */
    public function create(array $payload);

    /**
     * Find specific item
     * @param string $id
     * @return array
     */
    public function find(string $id);

    /**
     * Update resource
     * @param string $id
     * @param array $payload
     * @return mixed
     */
    public function update(string $id, array $payload);

    /**
     * @param string $id
     * @return mixed
     */
    public function delete(string $id);

    /**
     * Get the count of all items
     * @param array $filter
     * @return string
     */
    public function count(?array $filter=[]): int;
}
