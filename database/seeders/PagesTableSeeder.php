<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);

        Page::truncate();

        $admin->pages()->saveMany([
            new Page([
                'title' => 'About',
                'url' => '/about',
                'content' => 'This is about us page'

            ]),
            new Page([
                'title' => 'Contact',
                'url' => '/contact',
                'content' => 'This is contact us page'

            ]),
            new Page([
                'title' => 'Another Pages',
                'url' => '/another-pages',
                'content' => 'This is Another Pages'

            ]),
        ]);
    }
}
