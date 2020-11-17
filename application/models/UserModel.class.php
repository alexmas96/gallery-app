<?php
class UserModel extends AbstractModel
{
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
