<?php

declare(strict_types=1);


namespace TutuBot\TelegramType;


use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class Chat
{
    //todo: https://core.telegram.org/bots/api#user

    /**
     * @var int
     */
    protected $id;

    /**
     * @var null|string
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
     * @var string
     */
    protected $type;

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
     * @return Chat
     */
    public function setId(int $id): Chat
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @JsonProperty(name="first_name", type="string")
     * @param null|string $firstName
     * @return Chat
     */
    public function setFirstName(?string $firstName): Chat
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
     * @return Chat
     */
    public function setLastName(?string $lastName): Chat
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
     * @return Chat
     */
    public function setUsername(?string $username): Chat
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @JsonProperty(name="type", type="string")
     * @param string $type
     * @return Chat
     */
    public function setType(string $type): Chat
    {
        $this->type = $type;
        return $this;
    }
}