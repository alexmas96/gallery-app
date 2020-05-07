<?php

class AdmineditsController
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

        if ($userSession->isAdmin()){
            if(isset($_POST["newTheme"])){
                $themes = new ThemeModel();
                $themes->add($_POST["newTheme"]);
                $flashBag->add($_POST["newTheme"]." à était ajouté");
                $http->redirectTo("/admin");
            }
            if(isset($_POST["editTheme"])){
                $themes = new ThemeModel();
                $themes->update($_POST["theme"], $_POST["id"]);
                $flashBag->add("modification réussie");
                $http->redirectTo("/admin");
            }
            if(isset($_POST["removeTheme"])){
                $themes = new ThemeModel();
                $themes->removeById($_POST["id"]);
                $flashBag->add($_POST["theme"]." à était supprimé");
                $http->redirectTo("/admin");
            }
            if(isset($_POST["newCategory"])){
                $category = new CategoryModel();
                $category->add($_POST["newCategory"]);
                $flashBag->add($_POST["newCategory"]." à était ajouté");
                $http->redirectTo("/admin");
            }
            if(isset($_POST["editCategory"])){
                $category = new CategoryModel();
                $category->update($_POST["category"], $_POST["id"]);
                $flashBag->add("modification réussie");
                $http->redirectTo("/admin");
            }
            if(isset($_POST["removeCategory"])){
                $category = new CategoryModel();
                $category->removeById($_POST["id"]);
                $flashBag->add($_POST["category"]." à était supprimé");
                $http->redirectTo("/admin");
            }else{
                $http->redirectTo("/admin");
            }
        }else{
            $http->redirectTo("/user/login");
        }
    }
}
