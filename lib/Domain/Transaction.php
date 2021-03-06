<?php

/**
 * Transaction
 * PHP version 7.2
 */

namespace Silamoney\Client\Domain;

use JMS\Serializer\Annotation\Type;

/**
 * Transaction
 * Object used to map the get transactions method response.
 * @category Class
 * @package  Silamoney\Client
 * @author   José Morales <jmorales@digitalgeko.com>
 */
class Transaction
{
    /**
     * String field used for the user handle.
     * @var string
     * @Type("string")
     */
    public $userHandle;
    /**
     * String field used for the reference id.
     * @var string
     * @Type("string")
     */
    public $referenceId;
    /**
     * String field used for the transaction id.
     * @var string
     * @Type("string")
     */
    public $transactionId;
    /**
     * String field used for the transaction hash.
     * @var string
     * @Type("string")
     */
    public $transactionHash;
    /**
     * String field used for the transaction type.
     * @var string
     * @Type("string")
     */
    public $transactionType;
    /**
     * Integer field used for the sila amount.
     * @var int
     * @Type("int")
     */
    public $silaAmount;
    /**
     * String field used for the bank account name.
     * @var string
     * @Type("string")
     */
    public $bankAccountName;
    /**
     * String field used for the handle address.
     * @var string
     * @Type("string")
     */
    public $handleAddress;
    /**
     * String field used for the status.
     * @var string
     * @Type("string")
     */
    public $status;
    /**
     * String field used for the usd status.
     * @var string
     * @Type("string")
     */
    public $usdStatus;
    /**
     * String field used for the token status.
     * @var string
     * @Type("string")
     */
    public $tokenStatus;
    /**
     * String field used for the created field.
     * @var string
     * @Type("string")
     */
    public $created;
    /**
     * String field used for the last update.
     * @var string
     * @Type("string")
     */
    public $lastUpdate;
    /**
     * Integer field used for the created epoch.
     * @var string
     * @Type("string")
     */
    public $createdEpoch;
    /**
     * Integer field used for the last update epoch.
     * @var string
     * @Type("string")
     */
    public $lastUpdateEpoch;
    /**
     * TransactionStatus list used for the timeline.
     * @var array<Silamoney\Client\Domain\TransactionStatus>
     * @Type("array<Silamoney\Client\Domain\TransactionStatus>")
     */
    public $timeline;
}
