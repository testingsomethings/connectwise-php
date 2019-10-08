<?php

namespace Acadea\Connectwise\Tests\Feature;

use Acadea\Connectwise\Connectwise;
use Acadea\Connectwise\Connectwise\Auth\ConnectwiseClient;
use Acadea\Connectwise\Tests\TestCase;
use Illuminate\Support\Collection;
use Mockery\Mock;

class ConnectwiseClientTest extends TestCase
{

    protected $client;
    protected $cw;

    protected function setUp(): void
    {
        parent::setUp();
        $mock = $this->mock(ConnectwiseClient::class, function ($mock){
            /** @var $mock Mock*/
            $mock->shouldReceive('request')
                ->with(
                    'post',
                    \Mockery::any(),
                    \Mockery::type('array')
                )
                ->andReturn(collect());

            $mock->shouldReceive('request')
                ->with(
                    'patch',
                    \Mockery::any(),
                    \Mockery::type('array')
                )
                ->andReturn(collect());

            $mock->shouldReceive('request')
                ->with(
                    'delete',
                    \Mockery::any(),
                )
                ->andReturn(collect());

            $mock->shouldReceive('request')
                ->with(
                    'get',
                    \Mockery::any(),
                )
                ->andReturn(collect());

        });

        $this->client = $this->app->make(ConnectwiseClient::class);

        $this->cw = new Connectwise('company/companies');

    }

    public function test_get()
    {
        $response = $this->cw->get();
        $this->assertInstanceOf(Collection::class, $response);
    }

    public function test_find()
    {
        $response = $this->cw->find("1");
        $this->assertInstanceOf(Collection::class, $response);
    }

    public function test_create()
    {
        $response = $this->cw->create([
            'name' => 'heya'
        ]);
        $this->assertInstanceOf(Collection::class, $response);
    }

    public function test_update()
    {
        $response = $this->cw->update("1", [
            'name' => 'heya'
        ]);
        $this->assertInstanceOf(Collection::class, $response);
    }

    public function test_delete()
    {
        $response = $this->cw->delete("1");
        $this->assertInstanceOf(Collection::class, $response);
    }

    public function test_count()
    {
        $response = $this->cw->count();
        $this->assertIsInt($response);
    }
}
