<?php

class UploadController
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
        if($userSession->isAdmin()){
            $target_dir = "application/www/images/paints/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 1000000000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if ($uploadOk == 1) {
                    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                    // if file gets uploaded successfully
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    $photo = basename( $_FILES["fileToUpload"]["name"]);
                    $paint = new PaintModel();
                    if(!($paint->addPaintToDb($photo))){
                        $flashBag = new FlashBag();
                        $flashBag->add($_POST["name"]." à était ajouté");
                        $http->redirectTo("/admin");
                        exit;
                    }else{
                        $http->redirectTo("/");
                        exit;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    
                    exit;
                }
            }
        }else{
            $http->redirectTo("/user/login");
        }
    }
}


        