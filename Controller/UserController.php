<?php
require_once('./Model/User.php');

class UserController{

    static function connexion (){
        require('./View/connexion.php');
    }
    static function check ($pseudo, $pass){
        $user = new User();
        $connexion = $user->check($pseudo, $pass);

        if ($connexion){
            header('Location: ./index.php?action=admin');
        } else {
            echo ('Mauvais pseudo ou mots de passe');
        }
    }

}