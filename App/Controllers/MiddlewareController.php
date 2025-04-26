<?php

namespace App\Controllers;


class MiddlewareController
{
    // Le but de ce controller est de vérifier les accès aux routes
    
    // 2 - Middleware qui vérifie si l'utilisateur est connecté  ( peu importe le role )
    public function isConnected() {
        if(!isset($_SESSION['user_id'])) { // Si la SESSION user_id n'existe pas, on redirige l'utilisateur vers la page dlogin
            $this->redirectTo('login');
        }
    }
    
    // 3 - Middleware qui vérifie si l'utilisateur est ADMIN ( il faut avoir le role d'admin )
    public function hasRoleAdmin() {
        if(!isset($_SESSION['isadmin']) || $_SESSION['isadmin'] != 1) { // Si l'utilisateur n'a pas le role d'admin, on redirige l'utilisateur vers la page d'accueil
            $this->redirectTo('home');
        }
    }
    
    private function redirectTo($page) {
        header('Location: index.php?route='.$page);
        exit();
    }
}