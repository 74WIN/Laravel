<?php

namespace Database\Seeders;

use App\Models\navbar;
use Illuminate\Database\Seeder;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'name' => 'Home',
                'route' => 'home',
                'ordering' => 1,
            ],
            [
                'name' => 'Vtubers',
                'route' => 'vtubers',
                'ordering' => 2,
            ],
            [
                'name' => 'Season',
                'route' => 'season',
                'ordering' => 3,
            ],
            [
            'name' => 'User',
            'route' => 'user',
            'ordering' => 4,
            ]
        ];

        foreach ($links as $key => $navbar) {
            navbar::create($navbar);
        }
    }
}
