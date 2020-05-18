<?php

class UserController
{   //Apel la vue avec le form de connexion
    public function connexion()
    {
        require('./View/connexion.php');
    }
    // Creé un objet User et récupére le pass en fonction du pseudo et apel la méthos pour vérifier les info
    public function check(string $pseudo, string $pass)
    {
        $user = new User();
        $user = $user->getPassByName($pseudo);
        $this->verifyInfo($user, $pass);
    }
    //vérifie le mot de passe si faux return un exeption
    private function verifyInfo($user, $pass)
    {
        if (password_verify($pass, $user[1])) {
            $this->startConnexion($user);
        } else {
            throw new Exception("Pseudo ou mot de passe incorrect");
        }
    }
    //Passe le pseudo et le mdp en SESSION et redirige sur la page admin
    private function startConnexion(array $user)
    {
        $_SESSION['pass'] = $user[1];
        $_SESSION['pseudo'] = $user[0];
        header('Location: /admin');
    }
    //detruit la session pour que l'utilisateur ne soit plus connecté
    public function deleteConnexion()
    {
        session_destroy();
        header('Location: /');
    }
}
