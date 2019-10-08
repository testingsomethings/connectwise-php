<?php


namespace Acadea\Connectwise\Connectwise;


use Illuminate\Support\Collection;

class BaseApiRequest implements ApiRequestInterface
{

    public function __construct()
    {
        $username = config('connectwise.auth.company_id') . '+' . config('connectwise.auth.public_key');

        $this->header = [
            'clientId' => config('connectwise.auth.client_id'),
            'Content-Type' => 'application/json',
        ];

    }



}
