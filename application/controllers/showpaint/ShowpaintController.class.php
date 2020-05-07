<?php

class ShowpaintController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $paints = new PaintModel();
        // Si l'id existe, retourne la photo correspondant a l'id
        if(array_key_exists("id", $queryFields)){
            return [
                "paint" => $paints->getPaintById($queryFields["id"])
            ];
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

        /*
     * Méthode appelée en cas de requête HTTP POST
     *
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
     */
    }
}
