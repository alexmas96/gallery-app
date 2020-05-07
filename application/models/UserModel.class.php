<?php
class UserModel extends AbstractModel
{
    //ajoute un nouvel utilisateur
    public function addUser()
    {

        $fields = array(
            $_POST["firstname"],
            $_POST["email"],
            password_hash($_POST["password"], PASSWORD_DEFAULT),
        );

        //Recupere l'email et verifie si il est deja present dans la bdd

        $email = $this->getEmail($_POST["email"]);

        if ($email) {
            throw new Exception("email deja utilise!");
        } else {
            $newUserRequest = 'INSERT INTO user (FirstName, Email, user.Password)
        VALUES
        (?, ?, ?)
        ';
            $this->db->executeSql($newUserRequest, $fields);
        }

    }
    //verifie la precense d'un mail dans la bdd
    public function getEmail($email)
    {
        $request = 'SELECT *
        FROM user
        WHERE Email =?';

        return $this->db->queryOne($request, [$email]);

    }
    // verifie l'integrité de l'utilisateur
    public function checkIdentity($email, $pass)
    {
        $user = $this->getEmail($email);

        if ($user) {
            if (password_verify($pass, $user["Password"])) {
                return $user;
            } else {
                throw new Exception("le mot de passe est incorect !");
            }
        } else {
            throw new Exception("l'email n'existe pas !");
        }
    }
}
