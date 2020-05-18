<?php

class ViewController
{   //Apel une vue en fonction du paramétre qu'il reçoit
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