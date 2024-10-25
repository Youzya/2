<?php
trait AppUserAuthentication
{
    public function authenticate(string $login, string $password)
    {
        return ( $login == "admin" && $password == "123456" );
    }
}
?>
