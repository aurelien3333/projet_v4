<?php

class User extends Manager
{   //Récupére le mots de passe en fonction du pseu entré par l'utilisateur
    public function getPassByName(string $pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, pass FROM users WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo,
        ));
        $user = $req->fetch();
        return $user;
    }
}