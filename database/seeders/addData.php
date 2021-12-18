<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\queue;
use App\Models\User;
use Illuminate\Database\Seeder;

class addData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $users = [
            [
                'name' => 'admin 1',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$elZ3DjuYkXn6.A93eWeym.rcY.WDHCF54zIX0RQsaYQDNBBQmoLyK', //12345678
                'role' => 'admin',

            ],
            [
                'name' => 'Client X',
                'email' => 'client@client.com',
                'password' => '$2y$10$elZ3DjuYkXn6.A93eWeym.rcY.WDHCF54zIX0RQsaYQDNBBQmoLyK', //12345678
                'role' => 'client',

            ],
            [
                'name' => 'Client 1',
                'email' => 'client1@client.com',
                'password' => '$2y$10$elZ3DjuYkXn6.A93eWeym.rcY.WDHCF54zIX0RQsaYQDNBBQmoLyK', //12345678
                'role' => 'client',

            ],
            [
                'name' => 'Client 2',
                'email' => 'client2@client.com',
                'password' => '$2y$10$elZ3DjuYkXn6.A93eWeym.rcY.WDHCF54zIX0RQsaYQDNBBQmoLyK', //12345678
                'role' => 'client',

            ],
            [
                'name' => 'Client 3',
                'email' => 'client3@client.com',
                'password' => '$2y$10$elZ3DjuYkXn6.A93eWeym.rcY.WDHCF54zIX0RQsaYQDNBBQmoLyK', //12345678
                'role' => 'client',

            ],
            [
                'name' => 'Client 4',
                'email' => 'client4@client.com',
                'password' => '$2y$10$elZ3DjuYkXn6.A93eWeym.rcY.WDHCF54zIX0RQsaYQDNBBQmoLyK', //12345678
                'role' => 'client',

            ],
            [
                'name' => 'Client 5',
                'email' => 'client5@client.com',
                'password' => '$2y$10$elZ3DjuYkXn6.A93eWeym.rcY.WDHCF54zIX0RQsaYQDNBBQmoLyK', //12345678
                'role' => 'client',

            ],
        ];
        foreach ($users as $key => $user) {
            # code...
            User::create($user);
        }

        $categories = [
            [
                'title' => 'A1',
                'titleAr' => 'AA',
                'description' => 'description EE',
                'time' => 4,
                'descriptionAr' => 'description ARR',
            ],

            [
                'title' => 'A2',
                'titleAr' => 'AA 2',
                'description' => 'description EE 2',
                'time' => 6,
                'descriptionAr' => 'description ARR 2',
            ],
            [
                'title' => 'A3',
                'titleAr' => 'AA  3',
                'time' => 9,
                'description' => 'description EE 3',
                'descriptionAr' => 'description ARR 3',
            ],

        ];

        foreach ($categories as $key => $category) {
            # code...
            Category::create($category);
        }

        $queues = [
            [
                'user_id' => '1',
                'status' => 'open',
                'no' => '1',
                'category_id' => '1',
            ],
            [
                'user_id' => '1',
                'no' => '2',
                'status' => 'complet',
                'category_id' => '3',
            ],
            [
                'user_id' => '1',
                'no' => '3',
                'status' => 'uncompleted',
                'category_id' => '2',
            ],
        ];

        foreach ($queues as $key => $queue) {
            # code...
            queue::create($queue);
        }
    }
}
