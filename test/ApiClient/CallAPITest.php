<?php

/**
 * CallAPI() test case.
 */
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;
use Silamoney\Client\ApiClient\ApiClient;

class CallAPITest extends TestCase
{

    /**
     * Tests CallAPI()
     */
    public function testCallAPI()
    {
        $this->expectException(ClientException::class);
        $this->expectErrorMessage('{"header":{"created":"Provided epoch in message has expired; please generate a new message and sig');
        
        $config = new stdClass();
        $config->baseUri = 'https://sandbox.silamoney.com';
        $ac = new ApiClient($config);
        $json = '{"header": {"created": 1234567890,"auth_handle": "handle.silamoney.eth","user_handle":"user.silamoney.eth","version": "0.2","crypto": "ETH","reference": "ref"},"message": "header_msg"}';
        $headers = [
            'Content-Type' => 'application/json',
            'authsignature' => 'ea3706a8d2b4c627f847c0c6bfcd59f001021d790f06924ff395e9faecb510c53c09274b70cc1d29bde630d277096d570ee7983455344915d19085cc13288b421b'
        ];
        $ac->CallAPI('/check_handle', $json, $headers);
    }
}

