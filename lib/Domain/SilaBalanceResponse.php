<?php

/**
 * Get Transactions Reponse
 * PHP version 7.2
 */

namespace Silamoney\Client\Domain;

use JMS\Serializer\Annotation\Type;

/**
 * Get Transactions Reponse
 * Object used to map the get transactions method response.
 * @category Class
 * @package  Silamoney\Client
 * @author   José Morales <jmorales@digitalgeko.com>
 */
class SilaBalanceResponse
{
    /**
     * Boolean field used for success.
     * @var bool
     * @Type("bool")
     */
    public $success;

    /**
     * Integer field used for the page.
     * @var float
     * @Type("float")
     */
    public $silaBalance;

}
