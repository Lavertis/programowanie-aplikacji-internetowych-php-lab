<?php
include_once "User.php";

class RegistrationForm
{
    protected ?User $user;

    public function __construct()
    {
        ?>
        <h2>Formularz rejestracji</h2>
        <form method="post">
            <div>
                <label for='username'>Nazwa użytkownika:</label><br>
                <input type='text' name='username' id='username'>
            </div>
            <div>
                <label for='fullName'>Imię i nazwisko:</label><br>
                <input type='text' name='fullName' id='fullName'>
            </div>
            <div>
                <label for='password'>Hasło:</label><br>
                <input type='password' name='password' id='password'>
            </div>
            <div>
                <label for='email'>Email:</label><br>
                <input type='text' name='email' id='email'>
            </div>
            <br>
            <div>
                <input type='submit' name='submit' value='Rejestruj'>
                <input type='reset' value='Anuluj'>
            </div>
        </form>
        <?php
    }

    public function checkUser(): ?User
    {
        $args = [
            'username' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-Za-z][A-Za-z0-9_]{2,25}$/']],
            'fullName' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-Z][a-ząęłńśćźżó]{1,25}([ ][A-Z][a-ząęłńśćźżó]{1,25})?$/']],
            'password' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/']],
            'email' => FILTER_VALIDATE_EMAIL
        ];

        $data = filter_input_array(INPUT_POST, $args);
        $errors = "";
        foreach ($data as $key => $val) {
            if ($val === false or $val === NULL)
                $errors .= $key . " ";
        }

        if ($errors === "") {
            $this->user = new User($data['username'], $data['password'], $data['fullName'], $data['email']);
        } else {
            echo "<p>Błędne dane: $errors</p>";
            $this->user = NULL;
        }
        return $this->user;
    }
}