<?php
include_once "Database.php";

class User
{
    const STATUS_ADMIN = 0;
    const STATUS_USER = 1;

    protected string $userName;
    protected string $passwd;
    protected string $fullName;
    protected string $email;
    protected DateTime $date;
    protected int $status;

    /**
     * @param string $userName
     * @param string $passwd
     * @param string $fullName
     * @param string $email
     */
    public function __construct(string $userName, string $passwd, string $fullName, string $email)
    {
        $this->userName = $userName;
        $this->passwd = password_hash($passwd, PASSWORD_BCRYPT);
        $this->fullName = $fullName;
        $this->email = $email;
        $this->date = new DateTime();
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
        echo $this->getUserName() . " " .
            $this->getFullName() . " " .
            $this->getEmail() . " " .
            $this->getDate() . " " .
            "status " . $this->getStatus();
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
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
    public function getDate(): string
    {
        return $this->date->format("Y-m-d");
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
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
        $userAsArr = $this->toArray();
        $fields = array_keys($userAsArr);
        $values = array_values($userAsArr);
        $db->insert("users", $fields, $values);
    }

    /** @noinspection PhpArrayShapeAttributeCanBeAddedInspection */
    function toArray(): array
    {
        return [
            "userName" => $this->getUserName(),
            "passwd" => $this->getPasswd(),
            "fullName" => $this->getFullName(),
            "email" => $this->getEmail(),
            "status" => $this->getStatus(),
            "date" => $this->getDate()
        ];
    }

    /**
     * @return false|string|null
     */
    public function getPasswd(): bool|string|null
    {
        return $this->passwd;
    }

    /**
     * @param bool|string|null $passwd
     */
    public function setPasswd(bool|string|null $passwd): void
    {
        $this->passwd = $passwd;
    }
}