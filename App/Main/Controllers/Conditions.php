<?php


namespace App\Main\Controllers;


use Core\Controller;
use Core\View;

class Conditions extends Controller
{
    /**
     * Вывод страницы услуг
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function indexAction(): void
    {
        View::renderTemplate(
            'Conditions/index.html',
            $this->route_params['group'], []
        );
    }
}