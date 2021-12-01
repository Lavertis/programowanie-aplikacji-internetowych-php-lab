<?php
include_once "Database.php";

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
     * @param $username
     * @param $password
     * @param $fullName
     * @param $email
     */
    public function __construct($username, $password, $fullName, $email)
    {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->fullName = $fullName;
        $this->email = $email;
        $this->dateCreated = new DateTime();
        $this->status = self::STATUS_USER;
    }

    public static function showAllUsersFromDB(Database $db)
    {
        $users = $db->select("users", ["userName", "fullName", "email", "status", "date"]);
        foreach ($users as $user)
            echo "<p>" . implode(", ", array_values($user)) . "</p>";
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
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
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

    function saveToDB(Database $db)
    {
        $fields = array_keys($this->toArray());
        $values = array_values($this->toArray());
        $db->insert("users", $fields, $values);
    }

    function toArray(): array
    {
        return [
            "userName" => $this->getUsername(),
            "passwd" => $this->getPassword(),
            "fullName" => $this->getFullName(),
            "email" => $this->getEmail(),
            "status" => $this->getStatus(),
            "date" => $this->getDateCreated()
        ];
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