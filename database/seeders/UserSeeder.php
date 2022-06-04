<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Robin',
                'email' => 'test@test.fr',
                'password' => '$2y$10$A33meaVfPeJghaL8krSjJOc7q2cnr5S/0J25taEEAGjvBedFAxvK2',
                'remember_token' => 'nj2ShrGVpyJs7iRTwheFePVnsCzURZhTJxv7pFyLYZQuZ533Cplp2ECONpYm',
            ]
        ];
        foreach ($users as $user) {
            try {
                $tmpUser = User::firstOrCreate([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'remember_token' => $user['remember_token'],
                ]);
            } catch (\Exception $exception) {
                if ($exception->getCode() == "23000") {
                    dump('User "' . $user['name'] . '" already exist');
                } else {
                    dump($exception->getMessage());
                }
            }
        }
    }
}
