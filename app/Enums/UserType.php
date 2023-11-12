<?php

declare(strict_types=1);

namespace App\Enums;

enum UserType: int
{
    case ADMIN = 10;
    case LANDLORD = 5;
    case TENANT = 0;

    public static function getAllValues(): array
    {
        return array_column(self::cases(), 'values');
    }

    public static function formSelectOptions(): array
    {
        return [
            [
                'label' => 'Admin',
                'value' => self::ADMIN->value,
            ],
            [
                'label' => 'Landlord',
                'value' => self::LANDLORD->value,
            ],
            [
                'label' => 'Tenant',
                'value' => self::TENANT->value,
            ],
            [
                'label' => 'None',
                'value' => null,
            ],
        ];
    }
}
