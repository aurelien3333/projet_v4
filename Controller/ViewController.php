<?php
class ViewController {

    public function Display(string $view) {
        if ($view === "biographie"){
            require('./View/biographie.php');
        } else {
            require ('./View/home.php');
        }
    }
}