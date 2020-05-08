<?php

class ViewController
{

    public function Display(string $view = "home")
    {
        if ($view === "biographie") {
            require('./View/biographie.php');
        } elseif ($view === 'error') {
            require('./View/error.php');
        } elseif ($view === 'home') {
            require('./View/home.php');
        }
    }
}