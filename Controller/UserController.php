<?php

class UserController
{

    public function connexion()
    {
        require('./View/connexion.php');
    }

    public function check(string $pseudo, string $pass)
    {
        $user = new User();
        $user = $user->getPassByName($pseudo);
        $this->verifyInfo($user, $pass);

    }

    private function verifyInfo($user, $pass)
    {
        if (password_verify($pass, $user[1])) {
            $this->startConnexion($user);
        } else {
            throw new Exception("Pseudo ou mot de passe incorrect");
        }
    }

    private function startConnexion(array $user)
    {
        $_SESSION['pass'] = $user[1];
        $_SESSION['pseudo'] = $user[0];
        header('Location: /admin');
    }

    public function deleteConnexion()
    {
        session_destroy();
        header('Location: /');
    }
}
