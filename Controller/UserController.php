<?php

class UserController
{

    public function connexion()
    {
        require('./View/connexion.php');
    }

    public function check($pseudo, $pass)
    {
        $user = new User();
        $user = $user->getPassByName($pseudo);
        $this->verifyInfo($user, $pass);
    }

    private function verifyInfo($user, $pass)
    {
        if (!$user) {
            echo "pseudo incorrect ";
        } else {
            if (password_verify($pass,  $user[1])) {
                echo 'connexion ok';
                $this->startConnexion($user);
            } else {
                echo 'MDP incorrect';
            }
        }
    }

    private function startConnexion($user){
        $_SESSION['pass'] = $user[1];
        $_SESSION['pseudo'] = $user[0];
        echo 'Vous êtes connecté !';
        header('Location: /admin');
    }

    public function deleteConnexion (){
        session_destroy();
        header('Location: /');
    }
}
