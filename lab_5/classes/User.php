<?php

class User
{
    const STATUS_ADMIN = 0;
    const STATUS_USER = 1;

    private $userName;
    private $password;
    private $fullName;
    private $email;
    private DateTime $dateCreated;
    private int $status;

    /**
     * @param $userName
     * @param $password
     * @param $fullName
     * @param $email
     */
    public function __construct($userName, $password, $fullName, $email)
    {
        $this->userName = $userName;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->fullName = $fullName;
        $this->email = $email;
        $this->dateCreated = (new DateTime("NOW"));
        $this->dateCreated->format("Y-m-d");
        $this->status = self::STATUS_USER;
    }

    public function show()
    {
        echo $this->getUserName() . " " .
            $this->getFullName() . " " .
            $this->getEmail() . " " .
            $this->getDateCreated() . " " .
            "status " . $this->getStatus();
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getDateCreated(): string
    {
        return $this->dateCreated->format("Y-m-d");
    }

    /**
     * @param DateTime $dateCreated
     */
    public function setDateCreated(DateTime $dateCreated): void
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return false|string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param false|string|null $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}