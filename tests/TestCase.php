<?php


namespace Acadea\Connectwise\Tests;


use Acadea\Connectwise\ConnectwiseServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
       return [
           ConnectwiseServiceProvider::class,
       ];
    }
}
