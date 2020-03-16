<?php


namespace App\Main\Controllers;


use App\Data;
use Core\Controller;
use Core\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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
        $data = (new Data())->getBaseData();
        View::renderTemplate(
            'Work/index.html',
            $this->route_params['group'], $data
        );
    }
}