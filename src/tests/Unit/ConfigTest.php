<?php

namespace Fontebasso\Weather\Tests\unit;
use PHPUnit\Framework\TestCase;
use Fontebasso\Weather\Config;

class ConfigTest extends TestCase
{
    public function test_api_key_string()
    {
        $apiKey = Config::get('api_key');
        $this->assertTrue(is_string($apiKey));
    }

    public function test_api_key_value()
    {
        $apiKey = Config::get('api_key');
        $this->assertEquals('test487541', $apiKey);
    }

    public function test_invalid_key()
    {
        $this->expectWarning();
        $apiKey = Config::get('api_key_2');
        var_dump($apiKey);
    }
}
