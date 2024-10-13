<?php
spl_autoload_register(function ($trait) { include $trait.'.php'; });

class Example
{
    use AppUserAuthentication, MobileUserAuthentication {
        AppUserAuthentication::authenticate insteadof MobileUserAuthentication;
        MobileUserAuthentication::authenticate as authenticateMobile;
    }

    public function auth(string $login, string $password)
    {
        if ($this->authenticate($login, $password)) {
            echo "User authenticated";
        } elseif ($this->authenticateMobile($login, $password)) {
            echo "Mobile user authenticated";
        } else {
            echo "User is not authenticated!";
        }
    }
}

$ex = new Example();

$ex->auth("admin", "123456");

// Логины: admin, artem
// Пароли: 123456, abcdef
?>
