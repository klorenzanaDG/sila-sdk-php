<?php

namespace Silamoney\Client\Api;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\ {
    Request,
    Response
};
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use Silamoney\Client\Domain\Environments;


class UpdateWalletTest extends TestCase
{
    /**
     *
     * @var \Silamoney\Client\Api\ApiClient
     */
    protected static $api;

    /**
     *
     * @var \Silamoney\Client\Utils\TestConfiguration
     */
    protected static $config;

    /**
     *
     * @var \JMS\Serializer\SerializerBuilder
     */
    private static $serializer;

    public static function setUpBeforeClass(): void
    {
        \Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
        self::$serializer = SerializerBuilder::create()->build();
        $json = file_get_contents(__DIR__ . '/Data/ConfigurationE2E.json');
        self::$config = self::$serializer->deserialize($json, 'Silamoney\Client\Utils\TestConfiguration', 'json');
        self::$api = SilaApi::fromDefault(self::$config->appHandle, $_SERVER['SILA_PRIVATE_KEY']);
    }

    public static function setUpBeforeClassInvalidAuthSignature(): void
    {
        \Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
        self::$serializer = SerializerBuilder::create()->build();
        $json = file_get_contents(__DIR__ . '/Data/ConfigurationE2E.json');
        self::$config = self::$serializer->deserialize($json, 'Silamoney\Client\Utils\TestConfiguration', 'json');
        self::$api = SilaApi::fromDefault(self::$config->appHandle, $_SERVER['SILA_PRIVATE_KEY_INVALID']);
    }

    public function testUpdateWallet200()
    {
        $my_file = 'response.txt';
        $handle = fopen($my_file, 'r');
        $data = fread($handle, filesize($my_file));
        $resp = explode("||", $data);

        $response = self::$api->updateWallet($resp[0], "wallet_php_upd2", false, $resp[1]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUpdateWallet400()
    {
        $my_file = 'response.txt';
        $handle = fopen($my_file, 'r');
        $data = fread($handle, filesize($my_file));
        $resp = explode("||", $data);

        $response = self::$api->updateWallet(0, "wallet_php_upd", false, $resp[1]);
        $this->assertEquals(400, $response->getStatusCode());
    }

    public function testUpdateWallet403()
    {
        self::setUpBeforeClassInvalidAuthSignature();
        $my_file = 'response.txt';
        $handle = fopen($my_file, 'r');
        $data = fread($handle, filesize($my_file));
        $resp = explode("||", $data);

        $response = self::$api->updateWallet($resp[0], "wallet_php_upd", false, $resp[1]);
        $this->assertEquals(403, $response->getStatusCode());
    }
}
