<?php

namespace Pp\Kistochki\Database\Seeds;

use Seeder;
use Backend\Models\User;
use Backend\Models\UserRole;
use Backend\Models\UserGroup;

class SeedUsers extends Seeder
{
    public function run()
    {
        $group = UserGroup::where('code', UserGroup::CODE_OWNERS)->first();
        $role = UserRole::where('code', UserRole::CODE_DEVELOPER)->first();

        $users = [
            [
                'email'                 => 'o.mansurov@peopleandpeople.io',
                'login'                 => 'o.mansurov',
                'password'              => '12345678',
                'password_confirmation' => '12345678',
                'first_name'            => 'Отабек',
                'last_name'             => 'Мансуров',
                'permissions'           => [],
                'is_superuser'          => true,
                'is_activated'          => true,
                'role_id'               => $role->id
            ]
        ];

        foreach ($users as $u) {
            $user = User::updateOrCreate(['login' => $u['login']], $u);
            $user->addGroup($group);
        }
    }
}
