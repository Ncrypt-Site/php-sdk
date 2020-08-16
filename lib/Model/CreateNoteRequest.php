<?php
/**
 * CreateNoteRequest
 *
 * @category Class
 * @package  NCrypt\Client
 * @author   Farshad Nematdoust
 * @link     https://github.com/Ncrypt-Site/php-sdk
 */

namespace NCrypt\Client\Model;

use \ArrayAccess;
use InvalidArgumentException;
use \NCrypt\Client\ObjectSerializer;

class CreateNoteRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $modelName = 'CreateNoteRequest';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $types = [
        'message' => 'string',
        'self_destruct' => 'int',
        'destruct_after_opening' => 'bool'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $formats = [
        'message' => null,
        'self_destruct' => null,
        'destruct_after_opening' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function types(): array
    {
        return self::$types;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function formats(): array
    {
        return self::$formats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'message' => 'message',
        'self_destruct' => 'self_destruct',
        'destruct_after_opening' => 'destruct_after_opening'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'message' => 'setMessage',
        'self_destruct' => 'setSelfDestruct',
        'destruct_after_opening' => 'setDestructAfterOpening'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'message' => 'getMessage',
        'self_destruct' => 'getSelfDestruct',
        'destruct_after_opening' => 'getDestructAfterOpening'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters(): array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters(): array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName(): string
    {
        return self::$modelName;
    }

    const SELF_DESTRUCT_0 = 0;
    const SELF_DESTRUCT_1 = 1;
    const SELF_DESTRUCT_3 = 3;
    const SELF_DESTRUCT_6 = 6;
    const SELF_DESTRUCT_12 = 12;
    const SELF_DESTRUCT_24 = 24;
    const SELF_DESTRUCT_48 = 48;
    const SELF_DESTRUCT_72 = 72;
    const SELF_DESTRUCT_168 = 168;
    const SELF_DESTRUCT_720 = 720;

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSelfDestructAllowableValues(): array
    {
        return [
            self::SELF_DESTRUCT_0,
            self::SELF_DESTRUCT_1,
            self::SELF_DESTRUCT_3,
            self::SELF_DESTRUCT_6,
            self::SELF_DESTRUCT_12,
            self::SELF_DESTRUCT_24,
            self::SELF_DESTRUCT_48,
            self::SELF_DESTRUCT_72,
            self::SELF_DESTRUCT_168,
            self::SELF_DESTRUCT_720,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['message'] = isset($data['message']) ? $data['message'] : null;
        $this->container['self_destruct'] = isset($data['self_destruct']) ? $data['self_destruct'] : null;
        $this->container['destruct_after_opening'] = isset($data['destruct_after_opening']) ? $data['destruct_after_opening'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['message'] === null) {
            $invalidProperties[] = "'message' can't be null";
        }
        if ($this->container['self_destruct'] === null) {
            $invalidProperties[] = "'self_destruct' can't be null";
        }
        $allowedValues = $this->getSelfDestructAllowableValues();
        if (!is_null($this->container['self_destruct']) && !in_array(
            $this->container['self_destruct'],
            $allowedValues,
            true
        )) {
            $invalidProperties[] = sprintf(
                "invalid value for 'self_destruct', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid(): bool
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->container['message'];
    }

    /**
     * Sets message
     *
     * @param string $message message
     *
     * @return $this
     */
    public function setMessage($message): self
    {
        $this->container['message'] = $message;

        return $this;
    }

    /**
     * Gets self_destruct
     *
     * @return int
     */
    public function getSelfDestruct(): int
    {
        return $this->container['self_destruct'];
    }

    /**
     * Sets self_destruct
     *
     * @param int $self_destruct self_destruct
     *
     * @return $this
     */
    public function setSelfDestruct($self_destruct): self
    {
        $allowedValues = $this->getSelfDestructAllowableValues();
        if (!in_array($self_destruct, $allowedValues, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Invalid value for 'self_destruct', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['self_destruct'] = $self_destruct;

        return $this;
    }

    /**
     * Gets destruct_after_opening
     *
     * @return bool
     */
    public function getDestructAfterOpening(): bool
    {
        return $this->container['destruct_after_opening'];
    }

    /**
     * Sets destruct_after_opening
     *
     * @param bool $destruct_after_opening destruct_after_opening
     *
     * @return $this
     */
    public function setDestructAfterOpening($destruct_after_opening): self
    {
        $this->container['destruct_after_opening'] = $destruct_after_opening;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset): ?int
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed $value Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString(): string
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
