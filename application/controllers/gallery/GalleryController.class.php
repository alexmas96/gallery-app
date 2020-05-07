<?php

class GalleryController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $paints = new PaintModel();
        $categories = new CategoryModel();
        $themes = new ThemeModel();
        $conf = new Configuration();

        // si l'id existe, retourne les données en fonction du paramettre passé
        if (array_key_exists("id", $queryFields)){
            //comportement default de la page au chargement
            if ($queryFields["id"] == 0){
                $paintsByCategory = $paints->getAll();
                echo json_encode($paintsByCategory);
                exit;
            }
            //si le paramettre "category" est present, retourne les photo correspondant a l'id de cette category 
            if ($queryFields["name"] == "category"){
                $paintsByCategory = $paints->getByCategoryId($queryFields["id"]);
                echo json_encode($paintsByCategory);
                exit;
            }
            //si le paramettre "theme" est present, retourne les photo correspondant a l'id de cet theme 
            if ($queryFields["name"] == "theme"){
                $paintsByCategory = $paints->getByThemeId($queryFields["id"]);
                echo json_encode($paintsByCategory);
                exit;
            }
            
        }else{
            return [
                "paints" => $paints->getAll(),
                "categories"=> $categories->getAll(),
                "themes"=> $themes->getAll()
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
