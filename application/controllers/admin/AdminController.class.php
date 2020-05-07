<?php

class AdminController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $paints = new PaintModel();
        $userSession = new UserSession();
        $categories = new CategoryModel();
        $themes = new ThemeModel();
        $flashBag = new FlashBag();
        
        if ($userSession->isAuthenticated()){
            return [
                "paints" => $paints->getAll(),
                "categories" => $categories->getAll(),
                "themes" => $themes->getAll(),
                "message" => $flashBag->fetchMessage(),
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
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}