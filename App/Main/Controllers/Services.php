<?php


namespace App\Main\Controllers;

use App\Main\Models\Repositories\DataManager;
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
        $dm = new DataManager();
        $data = $dm->getBaseData($this->route_params);
        $data['serviceArticles'] = $dm->getServiceArticles();
        View::renderTemplate(
            'Services/index.html',
            $this->route_params['group'],
            $data
        );
    }
}