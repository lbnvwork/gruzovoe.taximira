<?php


namespace App\Main\Controllers;


use Core\Controller;
use Core\View;

class Services extends Controller
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
            'Services/index.html',
            $this->route_params['group'], []
        );
    }
}