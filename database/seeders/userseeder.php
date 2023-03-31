<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@adeointl.org',
                'password' => bcrypt('password'),
                'phone' => '07000000000'
            ],
        ];
        $added = 0;
        $skipped = 0;
        foreach ($users as $user) {
            // check if user exists
            $userExists = \App\Models\User::where('email', $user['email'])->first();

            if (!$userExists) {
                \App\Models\User::create($user);
                $added++;
            }else{
                $skipped++;
            }
        }
        $this->command->info("{$added} users added, {$skipped} skipped");
    }
}
