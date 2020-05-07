<?php

class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

        /*
     * Méthode appelée en cas de requête HTTP  GET
     *
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
     */
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        try {
            $user = new UserModel();
            $verfifiedUser = $user->checkIdentity($_POST["email"], $_POST["pass"]);
            $userSession = new UserSession();

            if ($verfifiedUser != null) {
                $userSession->signIn(
                    $verfifiedUser["Id"],
                    $verfifiedUser["Email"],
                    $verfifiedUser["FirstName"]
                );
                $flashBag = new FlashBag();
                $flashBag->add("vous êtes connecté");
                $http->redirectTo("/");
            }

        } catch (Exception $e) {

            return [
                "error" => $e->getMessage(),
            ];
        }

        /*
     * Méthode appelée en cas de requête HTTP POST
     *
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
     */
    }
}
