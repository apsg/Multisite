<?php
namespace Apsg\Multisite\Tests;

use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;

class HelpersTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();

        Config::set('multisite.domain', 'test');
    }

    /** @test */
    public function it_checks_if_helpers_exist()
    {
        // given
        $helpers = [
            'multisite_css',
            'multisite_js',
        ];

        // when
        // then
        foreach ($helpers as $helper) {
            $this->assertTrue(function_exists($helper));
        }
    }

    /** @test */
    public function css_helper_should_return_correct_url()
    {
        // given
        $baseUrl = url('/');

        // when
        $cssUrl = multisite_css();

        // then
        $this->assertEquals("{$baseUrl}/css/test.css", $cssUrl);
    }

    /** @test */
    public function js_helper_should_return_correct_url()
    {
        // given
        $baseUrl = url('/');

        // when
        $jsUrl = multisite_js();

        // then
        $this->assertEquals("{$baseUrl}/js/test.js", $jsUrl);
    }
}
