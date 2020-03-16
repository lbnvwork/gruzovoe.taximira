<?php


namespace App\Main\Controllers;


use App\Data;
use Core\Controller;
use Core\View;

class Politica extends Controller
{
    /**
     * Вывод страницы Политика конфиденциальности
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function indexAction(): void
    {
        $data = (new Data())->getBaseData();
        View::renderTemplate(
            'Politica/index.html',
            $this->route_params['group'], $data
        );
    }
}