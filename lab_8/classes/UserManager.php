<?php
include_once "Database.php";

class UserManager
{
    public function loginForm(): void
    {
        ?>
        <h2>Formularz logowania</h2>
        <form method="post">
            <div>
                <label for='login'>Login:</label><br>
                <input type='text' name='login' id='login'>
            </div>
            <div>
                <label for='passwd'>Hasło:</label><br>
                <input type='password' name='passwd' id='passwd'>
            </div>
            <br>
            <div>
                <input type='submit' name='submit' value='Zaloguj'>
                <input type='reset' value='Anuluj'>
            </div>
        </form>
        <?php
    }

    public function login(Database $db): int
    {
        $data = $this->filterLoginData();
        $id = $db->selectUser($data['login'], $data['passwd'], "users");
        if ($id < 0)
            return -1;

        session_start();
        $db->delete('logged_in_users', 'userId', $id);
        $fields = ['sessionId', 'userId', 'lastUpdate'];
        $values = [session_id(), $id, (new DateTime())->format("Y-m-d H:i:s")];
        $db->insert('logged_in_users', $fields, $values);
        return $id;
    }

    public function filterLoginData(): array
    {
        $args = [
            'login' => ['filter' => FILTER_SANITIZE_ADD_SLASHES],
            'passwd' => ['filter' => FILTER_SANITIZE_ADD_SLASHES],
        ];

        return filter_input_array(INPUT_POST, $args);
    }

    public function logout(Database $db)
    {
        if (!session_id())
            session_start();
        $db->delete("logged_in_users", "sessionId", session_id());
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }
        session_destroy();
    }

    public function getLoggedInUser(Database $db, int $id): int
    {
        $res = $db->select('logged_in_users', "userId", "userId=$id");
        if (!$res)
            return -1;
        else
            return $res;
    }
}