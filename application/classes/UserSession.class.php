<?php
class UserSession
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

    }
    public function signIn($id, $email, $firstname)
    {

        $_SESSION["user"] = [
            "id" => $id,
            "email" => $email,
            "firstname" => $firstname
        ];

    }
    public function isAuthenticated()
    {
        return (array_key_exists("user", $_SESSION) && !empty($_SESSION["user"]));
    }
    public function getId()
    {
        if (!$this->isAuthenticated()) {
            return null;
        } else {
            return $_SESSION["user"]["id"];
        }
    }
    public function getUserData($dataName)
    {
        if (!$this->isAuthenticated()) {
            return null;
        } else {
            return $_SESSION["user"][$dataName];
        }
    }
    public function isAdmin()
    {
        if ($this->isAuthenticated()) {
            return (array_key_exists("user", $_SESSION) && !empty($_SESSION["user"]));
        }

    }
    public function logout()
    {
        $_SESSION["user"] = [];
        session_destroy();
    }
}
