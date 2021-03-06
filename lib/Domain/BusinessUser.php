<?php

/**
 * Business User
 * PHP version 7.2
 */

namespace Silamoney\Client\Domain;

use DateTime;
use JMS\Serializer\Annotation\Type;

/**
 * Business User
 * Class used in the register method.
 * @category Class
 * @package  Silamoney\Client
 * @author   José Morales <jmorales@digitalgeko.com>
 */
class BusinessUser extends BaseUser
{
    /**
     * @var string
     * @Type("string")
     */
    private $name;

    /**
     * @var string
     * @Type("string")
     */
    private $businessType;

    /**
     * @var string
     * @Type("string")
     */
    private $businessTypeUuid;

    /**
     * @var int
     * @Type("int")
     */
    private $naicsCode;

    /**
     * @var string
     * @Type("string")
     */
    private $doingBusinessAs;

    /**
     * @var string
     * @Type("string")
     */
    private $businessWebsite;

    /**
     * Constructor for user object
     * @param string $handle
     * @param string $name
     * @param string $address
     * @param string|null $address2
     * @param string $city
     * @param string $state
     * @param string $zipCode
     * @param string $phone
     * @param string $email
     * @param string $identityNumber
     * @param string $cryptoAddress
     * @param int $naicsCode
     * @param string|null $businessType
     * @param string|null $businessTypeUuid
     * @param string|null $doingBusinessAs
     * @param string|null $businessWebsite
     * @return \Silamoney\Client\Domain\BusinessUser
     */
    public function __construct(
        string $handle,
        string $name,
        string $address,
        ?string $address2,
        string $city,
        string $state,
        string $zipCode,
        string $phone,
        string $email,
        string $identityNumber,
        string $cryptoAddress,
        int $naicsCode,
        string $businessType = null,
        string $businessTypeUuid = null,
        string $doingBusinessAs = null,
        string $businessWebsite = null
    ) {
        parent::__construct(
            $handle,
            $address,
            $address2,
            $city,
            $state,
            $zipCode,
            $phone,
            $email,
            $identityNumber,
            $cryptoAddress
        );
        $this->name = $name;
        $this->naicsCode = $naicsCode;
        $this->businessType = $businessType;
        $this->businessTypeUuid = $businessTypeUuid;
        $this->doingBusinessAs = $doingBusinessAs;
        $this->businessWebsite = $businessWebsite;
    }

    /**
     * Gets the entity name.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets the business naics code
     * @return int
     */
    public function getNaicsCode(): int
    {
        return $this->naicsCode;
    }

    /**
     * Gets the business type
     * @return string
     */
    public function getBusinessType(): ?string
    {
        return $this->businessType;
    }

    /**
     * Gets the business type uuid
     * @return string
     */
    public function getBusinessTypeUuid(): ?string
    {
        return $this->businessTypeUuid;
    }

    /**
     * Gets the doing business ass
     * @return string
     */
    public function getDoingBusinessAs(): ?string
    {
        return $this->doingBusinessAs;
    }

    /**
     * Gets the business website
     * @return string
     */
    public function getBusinessWebsite(): ?string
    {
        return $this->businessWebsite;
    }
}
