<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;

class PostController extends AbstractController
{
    public function home()
    {
        $manger = new PostManager(new PDOFactory());
        $posts = $manger->getAllPosts();

    }


    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */
    // Pour passer des params en URL et les afficher dans la page.
    // Sert à chercher un poste en particulier avec les arguments qu'on met dans l'URL


}

