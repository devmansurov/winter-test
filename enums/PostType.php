<?php

namespace Pp\Kistochki\Enums;

abstract class PostType
{
    public const PROMOTION = 100;
    public const ABONEMENT = 101;
    public const JOB = 102;
    public const PAGE = 103;
    public const NEWS = 104;
    public const SLIDER = 105;

    public static function from(int $type): string
    {
        return match($type) {
            100 => 'Акция',
            101 => 'Абонемент',
            102 => 'Вакансия',
            103 => 'Страницы',
            104 => 'Новости',
            105 => 'Слайдеры',
        };
    }
}
