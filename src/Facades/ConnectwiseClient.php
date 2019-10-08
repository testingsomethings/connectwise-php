<?php

namespace Acadea\Connectwise\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method Collection request(string $method, string $uri, array $payload = [])
 * @see \Acadea\Connectwise\Connectwise\Auth\ConnectwiseClient
 */
class ConnectwiseClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'connectwise-client';
    }
}
