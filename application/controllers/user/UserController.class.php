<?php

class UserController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $user = new UserSession();
        if ($user->isAdmin()){
            return ["_form" => new UserForm()];
        }else{
            $http->redirectTo("/");
        }
        
        /*
     * Méthode appelée en cas de requête HTTP  GET
     *
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
     */
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $user = new UserSession();
        if ($user->isAdmin()){
            try {
                $userModel = new UserModel();
                $user = $userModel->addUser();
                $http->redirectTo("/");
    
            } catch (Exception $e) {
                $userForm = new UserForm();
                $userForm->bind($formFields);
                return [
                    "error" => $e->getMessage(),
                    "_form" => $userForm,
                ];
            }
        }else{
            $http->redirectTo("/");
        }
        

        /*
     * Méthode appelée en cas de requête HTTP POST
     *
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
     */
    }
}
