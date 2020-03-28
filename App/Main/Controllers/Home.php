<?php

namespace App\Main\Controllers;

use App\Main\Models\Repositories\DataManager;
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
        $data = (new DataManager())->getBaseData($this->route_params);
        View::renderTemplate(
            'Home/index.html',
            $this->route_params['group'], $data
        );
    }
}