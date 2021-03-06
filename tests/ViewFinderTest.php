<?php
namespace Apsg\Multisite\Tests;

use Apsg\Multisite\MultisiteServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase;

class ViewFinderTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
        Config::set('multisite.domain', 'test');
    }

    /** @test */
    public function it_checks_default_view_paths()
    {
        // given
        $provider = new MultisiteServiceProvider($this->app);

        // when
        $provider->register();
        $paths = $this->app->make('view.finder')->getPaths();

        // then
        $this->assertTrue(Str::endsWith(end($paths), 'resources/views/test'));
    }
}
