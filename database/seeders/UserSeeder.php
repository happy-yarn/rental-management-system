<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $emailVerifiedAt = now();
        $userData = [
            [
                'name' => 'Admin User',
                'email' => 'admin@rentalmanagementsystem.online',
                'type' => UserType::ADMIN->value,
                'email_verified_at' => $emailVerifiedAt,
                'password' => $password,
            ],
            [
                'name' => 'Landlord User',
                'email' => 'landlord@rentalmanagementsystem.online',
                'type' => UserType::LANDLORD->value,
                'email_verified_at' => $emailVerifiedAt,
                'password' => $password,
            ],
            [
                'name' => 'Tenant User',
                'email' => 'tenant@rentalmanagementsystem.online',
                'type' => UserType::TENANT->value,
                'email_verified_at' => $emailVerifiedAt,
                'password' => $password,
            ],
        ];

        foreach ($userData as $data) {
            /** @var User|null $user */
            $user = User::query()->where('email', $data['email'])->first();

            if ($user) {
                $user->updateQuietly(['type' => $data['type']]);
            } else {
                User::create($data);
            }
        }
    }
}
