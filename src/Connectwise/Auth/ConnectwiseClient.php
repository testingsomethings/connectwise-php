<?php


namespace Acadea\Connectwise\Connectwise\Auth;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class ConnectwiseClient
{

    protected $client;

    public function request($method, $uri, $payload = [])
    {
        try{
            if(strtoupper($method) === 'GET' || strtoupper($method) === 'DELETE'){
                $response = $this->client->request($method, $uri);

                return $response->getBody() ? collect(\GuzzleHttp\json_decode($response->getBody(),true)) : collect(); //todo body is empty do something
            }else{
                $response = $this->client->request($method, $uri, ['body'=> \GuzzleHttp\json_encode($payload)]);
                return $response->getBody() ? collect(\GuzzleHttp\json_decode($response->getBody(),true)) : collect(); //todo body is empty do something
            }

        }catch (ClientException $exception){
            // NOTE to solve truncated problem, use $exception->getResponse->getBody()->getContents()
            $error = $exception->getResponse()->getBody();
            throw new \App\Services\Connectwise\Exceptions\RequestException($error->getContents(), 401, $exception);

            // todo handle exception
        }catch (RequestException $exception){
            // todo handle exception
            dd($exception);
            $error = $exception->getResponse()->getBody();
            throw new \App\Services\Connectwise\Exceptions\RequestException($error->getContents(), 401, $exception);
        }
    }


    public function __construct($header, $auth)
    {
        $this->client = new Client([
            'base_uri' => config('connectwise.base_uri'),
            'auth' => $auth,
            'headers' => $header, // header for request
            'verify' => true, //verify ssl cert
            'timeout' => 15, //timeout for request
        ]);

    }
}
