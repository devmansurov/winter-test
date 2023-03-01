<?php

namespace Pp\Kistochki\Enums;

class ContactType
{
    public const PHONE = 1;
    public const TELEGRAM = 2;
    public const INSTAGRAM = 3;
    public const FACEBOOK = 4;
    public const WHATSAPP = 5;
    public const VK = 6;
    public const VIBER = 7;

    public static function from(int $type): string
    {
        return match($type) {
            1 => 'Телефон',
            2 => 'Telegram',
            3 => 'Instagarm',
            4 => 'Facebook',
            5 => 'WhatsApp',
            6 => 'ВКонтакте',
            7 => 'Viber',
        };
    }
}
