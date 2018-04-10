<?php

declare(strict_types=1);


namespace TutuBot\TelegramType;


//id 	Integer 	Unique identifier for this user or bot
//                                       is_bot 	Boolean 	True, if this user is a bot
//first_name 	String 	User‘s or bot’s first name
//last_name 	String 	Optional. User‘s or bot’s last name
//username 	String 	Optional. User‘s or bot’s username
//language_code 	String 	Optional. IETF language tag of the user's language
use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class User
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     */
    protected $isBot;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var null|string
     */
    protected $lastName;

    /**
     * @var null|string
     */
    protected $username;

    /**
     * @var null|string
     */
    protected $languageCode;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @JsonProperty(name="id", type="int")
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return bool
     */
    public function isBot(): bool
    {
        return $this->isBot;
    }

    /**
     * @JsonProperty(name="is_bot", type="bool")
     * @param bool $isBot
     * @return User
     */
    public function setIsBot(bool $isBot): User
    {
        $this->isBot = $isBot;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @JsonProperty(name="first_name", type="string")
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @JsonProperty(name="last_name", type="string")
     * @param null|string $lastName
     * @return User
     */
    public function setLastName(?string $lastName): User
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @JsonProperty(name="username", type="string")
     * @param null|string $username
     * @return User
     */
    public function setUsername(?string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @JsonProperty(name="language_code", type="string")
     * @param null|string $languageCode
     * @return User
     */
    public function setLanguageCode(?string $languageCode): User
    {
        $this->languageCode = $languageCode;
        return $this;
    }
}