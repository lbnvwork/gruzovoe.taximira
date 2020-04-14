<?php


namespace App\Main\Models\Repositories;

class DataManager
{
    private const CONTENT = [
        'contacts' => [
            'order_phone' => '84712748494',
            'drivers_phone' => '89096559585',
            'mail' => 'taxi.kursk@yandex.ru',
            'address' => 'Курская область, город Курск, Проспект Хрущева 22'
        ],
        'prices' => [
            'freight_order' => '395',
            'loader_order' => [
                'hour' => '250',
                'min_order_time' => '2',
                'next_hour' => '250'
            ]
        ],
        'meta' => [
            [
                'controller' => 'Home',
                'action' => 'index',
                'url' => '',
                'description' => 'Сервис заказа такси «Мира». Заказать грузовое такси: 8 (4712) 74-84-94. «Мира» обладает большим опытом в организации грузовых и пассажирских перевозок, в оказании услуг грузчиков, что находит отклик в положительных отзывах клиентов.',
                'name' => 'Сервис заказа такси «Мира». Грузовое такси.',
                'title' => 'Грузовое такси в Курске',
                'keywords' => 'сервис заказа такси; грузовое такси; услуги грузчиков; междугородние перевозки грузов'
            ],
            [
                'controller' => 'Work',
                'action' => 'index',
                'url' => '/work',
                'description' => 'Сервис заказа такси «Мира». Получить работу в грузовом такси: 8 (909) 655-95-85. «Мира» приглашает на работу в грузовом такси с личным автомобилем газель. Гарантируем заказы с приемлемым для водителя ценником.',
                'name' => 'Сервис заказа такси «Мира». Грузовое такси.',
                'title' => 'Работа в грузовом такси «Мира»',
                'keywords' => 'сервис заказа такси; грузовое такси; работа на газели; работа в грузовом такси; грузоперевозки'
            ],
            [
                'controller' => 'Contacts',
                'action' => 'index',
                'url' => '/work',
                'description' => 'Сервис заказа такси «Мира». Заказать грузовое такси: 8 (4712) 74-84-94. Получить работу в грузовом такси: 8 (909) 655-95-85. Адрес офиса и телефон сервиса заказа такси «Мира» в Курске. Схема проезда.',
                'name' => 'Сервис заказа такси «Мира». Грузовое такси.',
                'title' => 'Контакты сервиса заказа такси «Мира»',
                'keywords' => 'сервис заказа такси; грузовое такси; работа в грузовом такси, контакты'
            ],
            [
                'controller' => 'Services',
                'action' => 'index',
                'url' => '/services',
                'description' => 'Сервис заказа грузового такси «Мира» предлагает следующие услуги: грузовое такси в Курске, услуги грузчиков, грузовое такси по России',
                'name' => 'Сервис заказа такси «Мира». Грузовое такси.',
                'title' => 'Услуги грузового такси «Мира»',
                'keywords' => 'сервис заказа такси; грузовое такси; услуги грузового такси; междугороднее грузовое такси по России; грузчики; грузовое такси в Курске'
            ],
        ],
        'main-menu'=>[
            [
                'value' => '',
                'caption' => 'Главная'
            ],
            [
                'value' => 'services',
                'caption' => 'Услуги'
            ],
            [
                'value' => 'work',
                'caption' => 'Работа в такси'
            ],
            [
                'value' => 'contacts',
                'caption' => 'Контакты'
            ],
        ]
    ];

    public function getWorkPhone($phoneString)
    {
        $pattern = '/8(\d{4})(\d{2})(\d{2})(\d{2})/';
        $replacement = '8 ($1). $2-$3-$4';
        return explode('.', preg_replace($pattern, $replacement, $phoneString));
    }

    public function getMobilPhone($phoneString)
    {
        $pattern = '/8(\d{3})(\d{3})(\d{2})(\d{2})/';
        $replacement = '8 ($1). $2-$3-$4';
        return explode('.', preg_replace($pattern, $replacement, $phoneString));
    }

    public function getMeta(array $routeParams): array
    {
        foreach (self::CONTENT['meta'] as $meta) {
            if ($meta['controller'] == $routeParams['controller'] && $meta['action'] == $routeParams['action']) {
                return $meta;
            }

        }
        return [];
    }

    public function getBaseData(array $routeParams): array
    {
        $orderPhone = $this->getWorkPhone(self::CONTENT['contacts']['order_phone']);
        $driversPhone = $this->getMobilPhone(self::CONTENT['contacts']['drivers_phone']);
        return [
            'orderPhoneTop' => [
                'leftPart' => $orderPhone[0],
                'rightPart' => $orderPhone[1]
            ],
            'orderPhoneBottom' => implode('', $orderPhone),
            'orderPhoneTel' => self::CONTENT['contacts']['order_phone'],
            'meta' => $this->getMeta($routeParams),
            'mainMenu' => self::CONTENT['main-menu']
        ];
    }

    public function __call($name, $arguments
    ) {
        // Замечание: значение $name регистрозависимо.
        $key = substr(strtolower($name), 3);
        if (array_key_exists($key, self::CONTENT)) {
            return self::CONTENT[$key];
        }
        return null;
    }
}