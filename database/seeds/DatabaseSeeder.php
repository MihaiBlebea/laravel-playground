<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PageSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(ContentSeeder::class);
    }
}
