<?php

class AddpaintController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $userSession = new UserSession();
        $categories = new CategoryModel();
        $themes = new ThemeModel();
        if ($userSession->isAdmin()){
            return [
                "categories"=> $categories->getAll(),
                "themes"=> $themes->getAll()
            ];
        }else{
            $http->redirectTo("/user/login");
        }
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

        
    }
}