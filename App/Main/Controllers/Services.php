<?php


namespace App\Main\Controllers;


use App\Data;
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
        $data = (new Data())->getBaseData();
        View::renderTemplate(
            'Services/index.html',
            $this->route_params['group'], $data
        );
    }
}