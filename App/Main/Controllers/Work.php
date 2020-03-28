<?php


namespace App\Main\Controllers;

use App\Main\Models\Repositories\DataManager;
use Core\Controller;
use Core\View;

class Work extends Controller
{
    /**
     * Вывод страницы Работа в такси
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function indexAction(): void
    {
        $dm = new DataManager();
        $data = $dm->getBaseData($this->route_params);
        $data['driversPhoneTel'] = $dm->getContacts()['drivers_phone'];
        $data['driversPhone'] = implode('', $dm->getMobilPhone($data['driversPhoneTel']));
        View::renderTemplate(
            'Work/index.html',
            $this->route_params['group'], $data
        );
    }
}