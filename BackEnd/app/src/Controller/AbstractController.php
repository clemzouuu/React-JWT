<?php

namespace App\Controller;

abstract class AbstractController
{
    public function __construct(string $action, array $params = [])
    {
        if (!is_callable([$this, $action])) {
           throw new \RuntimeException("La methode $action n'est pas disponible dans ce controller");
        }
        call_user_func_array([$this, $action], $params);
    }

    // Prend le vue sur lequel on veut rendre un résultat
    // Prend un array avec des valeurs + un titre
    public function render(string $view, array $args = [], string $title = "Document")
    {
        //Prend le chemin du view
        $view = dirname(__DIR__, 2) . '/views/' . $view;
        $base = dirname(__DIR__, 2) . '/views/base.php';

        ob_start();
        // parse l'array pour renvoyer les valeurs
        foreach ($args as $key => $value) {
            ${$key} = $value;
        }

        unset($args);

        require_once $view;
        $_pageContent = ob_get_clean();
        $_pageTitle = $title;


        require_once $base;

        exit;
    }
}
