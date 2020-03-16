<?php

namespace App\Main\Controllers;

use App\Data;
use App\Tasks\Models\TaskBook;
use Core\Controller;
use Core\View;

/**
 * Class Home
 * Домашняя страница
 *
 * @package App\Main\Controllers
 */
class Home extends Controller
{
    /**
     * Вывод главной страницы
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function indexAction(): void
    {

        $data = (new Data())->getBaseData();
        View::renderTemplate(
            'Home/index.html',
            $this->route_params['group'], $data
        );
    }
}