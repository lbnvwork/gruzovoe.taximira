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

    public function getBaseData()
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
        ];
    }

    public function __call($name, $arguments) {
        // Замечание: значение $name регистрозависимо.
        $key = substr(strtolower($name), 3);
        if(array_key_exists($key, self::CONTENT)){
            return self::CONTENT[$key];
        }
        return null;
    }
}