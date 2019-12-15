<?php
namespace Apsg\Multisite\Tests;

use Apsg\Multisite\Multisite;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;

class FacadeTest extends TestCase
{
    /** @test */
    public function it_returns_current_domain()
    {
        // given
        Config::set('multisite.domain', 'test');

        // when
        $domain = Multisite::domain();

        // then
        $this->assertEquals('test', $domain);
    }

    /** @test */
    public function it_returns_domain_specific_config()
    {
        // given
        Config::set('multisite', [
            'domain' => 'site1',
            'site1'  => [
                'key' => 'expected',
            ],
            'site2'  => [
                'key' => 'unexpected',
            ],
        ]);

        // when
        $config = Multisite::config('key');

        // then
        $this->assertEquals('expected', $config);
    }
}
