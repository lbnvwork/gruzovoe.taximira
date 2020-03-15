<?php


namespace App\Main\Controllers;

use Core\Controller;
use Core\View;

class Contacts extends Controller
{
    /**
     * Вывод страницы контактов
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function indexAction(): void
    {
        View::renderTemplate(
            'Contacts/index.html',
            $this->route_params['group'], []
        );
    }
}