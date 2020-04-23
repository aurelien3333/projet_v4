<?php
require_once('Manager.php');
require_once('Comment.php');


class User extends Manager
{

    private $db;

    public function __construct()
    {
        $this->db = new Manager();


    }

    public function check($pseudo, $pass)
    {
        $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, pass FROM users WHERE pseudo = :pseudo AND pass = :pass');
        $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass
        ));
        $user = $req->fetch();

        if (!$user) {
            return false;
        } else {
            return true;
        }
    }
}