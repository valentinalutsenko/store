<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'title' => 'Смартфоны',
                'type' => 'Смартфоны и планшеты',
                'author' => 'Admin 1'
            ],
            [
                'title' => 'Смартфоны',
                'type' => 'Смартфоны и планшеты',
                'author' => 'Admin 1'
            ],
            [
                'title' => 'Ноутбуки',
                'type' => 'Ноутбуки и компьютеры',
                'author' => 'Admin 2'
            ]
        ]);
    }
}
