<?php

class UpdateController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        
       
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $userSession = new UserSession();
        $flashBag = new FlashBag();
            if ($userSession->isAdmin()) {
                $paint = new PaintModel();
                $paint->update($_POST["Id"]);
                $flashBag->add("modification réussie");
                $http->redirectTo("/admin");
            } else {
                $http->redirectTo("/user/login");
            }
            
        
    }
}
