<?php

class RemoveController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $paints = new PaintModel();
        $userSession = new UserSession();
        $flashBag = new FlashBag();
        // Si admin, recupere le nom du fichier pour fabriquer le chemin de l'image
        if($userSession->isAdmin()){
            $id = $queryFields["id"];
            $paint = $paints->getPaintById($id);
            $target_dir = "application/www/images/paints/";
            $target_file = $target_dir . $paint["Photo"];

            // Si le fichier existe, supprime le, puis supprime les donnés correspondante dans la bdd
            if (file_exists($target_file)) {
                if(unlink($target_file)) {
                    $paints->removePaintById($id);
                    $flashBag->add($paint["Name"]." à était supprimé");
                    $http->redirectTo("/admin");
                } else {
                    $http->redirectTo("/admin");
                }
                
            } else {
                $paints->removePaintById($id);
                $flashBag->add($paint["Name"]." à était supprimé");
                $http->redirectTo("/admin");
            }  
        } else {
            $http->redirectTo("/");
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
