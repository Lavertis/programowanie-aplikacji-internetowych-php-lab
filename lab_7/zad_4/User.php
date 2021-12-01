<?php

class User
{
    const STATUS_ADMIN = 0;
    const STATUS_USER = 1;

    protected string $username;
    protected string $password;
    protected string $fullName;
    protected string $email;
    protected DateTime $dateCreated;
    protected int $status;

    /**
     * @param string $username
     * @param string $password
     * @param string $fullName
     * @param string $email
     */
    public function __construct(string $username, string $password, string $fullName, string $email)
    {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->fullName = $fullName;
        $this->email = $email;
        $this->dateCreated = new DateTime();
        $this->status = self::STATUS_USER;
    }

    public function show()
    {
        echo $this->getUsername() . " " .
            $this->getFullName() . " " .
            $this->getEmail() . " " .
            $this->getDateCreated() . " " .
            "status " . $this->getStatus();
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getDateCreated(): string
    {
        return $this->dateCreated->format("Y - m - d");
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

}