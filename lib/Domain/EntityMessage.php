<?php

/**
 * Entity Message
 * PHP version 7.2
 */

namespace Silamoney\Client\Domain;

use JMS\Serializer\Annotation\Type;

/**
 * Entity Message
 * Object sent in the register endpoint.
 * @category Class
 * @package  Silamoney\Client
 * @author   José Morales <jmorales@digitalgeko.com>
 */
class EntityMessage
{
    /**
     * @var Silamoney\Client\Domain\Address
     * @Type("Silamoney\Client\Domain\Address")
     */
    private $address;

    /**
     * @var Silamoney\Client\Domain\Identity
     * @Type("Silamoney\Client\Domain\Identity")
     */
    private $identity;

    /**
     * @var Silamoney\Client\Domain\Contact
     * @Type("Silamoney\Client\Domain\Contact")
     */
    private $contact;

    /**
     * @var Silamoney\Client\Domain\Header
     * @Type("Silamoney\Client\Domain\Header")
     */
    private $header;

    /**
     * @var Silamoney\Client\Domain\CryptoEntry
     * @Type("Silamoney\Client\Domain\CryptoEntry")
     */
    private $cryptoEntry;

    /**
     * @var string
     * @Type("string")
     */
    private $message;

    /**
     * @var Silamoney\Client\Domain\Entity
     * @Type("Silamoney\Client\Domain\Entity")
     */
    private $entity;

    /**
     * Constructor for the EntityMessage object.
     *
     * @param Silamoney\Client\Domain\User $user
     * @param string $appHandle
     */
    public function __construct(User $user, string $appHandle)
    {
        $this->header = new Header($user->getHandle(), $appHandle);
        $this->message = Message::ENTITY;
        $this->address = new Address($user);
        $this->identity = new Identity($user);
        $this->contact = new Contact($user);
        $this->cryptoEntry = new CryptoEntry($user);
        $this->entity = new Entity($user);
    }
}
