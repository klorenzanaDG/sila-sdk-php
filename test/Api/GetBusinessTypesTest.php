<?php

/**
 * Get Business Types Test
 * PHP version 7.2
 */

namespace Silamoney\Client\Api;

use PHPUnit\Framework\TestCase;
use Silamoney\Client\Utils\{
    ApiTestConfiguration,
    DefaultConfig
};

/**
 * GetBusinessTypes Test
 * Tests for the get_business_types endpoint in the Sila Api class.
 *
 * @category Class
 * @package Silamoney\Client
 * @author José Morales <jmorales@digitalgeko.com>
 */
class GetBusinessTypesTest extends TestCase
{
    /**
     * @var \Silamoney\Client\Utils\ApiTestConfiguration
     */
    private static $config;

    public static function setUpBeforeClass(): void
    {
        self::$config = new ApiTestConfiguration();
    }

    public function testGetBusinessTypes200()
    {
        $response = self::$config->api->getBusinessTypes();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue($response->getData()->success);
        $this->assertIsArray($response->getData()->business_types);
        $this->assertIsString($response->getData()->business_types[0]->uuid);
        DefaultConfig::$businessTypeUuid = $response->getData()->business_types[0]->uuid;
        $this->assertIsString($response->getData()->business_types[0]->name);
        DefaultConfig::$businessType = $response->getData()->business_types[0]->name;
        $this->assertIsString($response->getData()->business_types[0]->label);
    }

    public function testGetBusinessTypes403()
    {
        self::$config->setUpBeforeClassInvalidAuthSignature();
        $response = self::$config->api->getBusinessTypes();
        $this->assertEquals(403, $response->getStatusCode());
        $this->assertFalse($response->getData()->success);
        $this->assertStringContainsString(DefaultConfig::BAD_APP_SIGNATURE, $response->getData()->message);
    }
}
