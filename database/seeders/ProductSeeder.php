<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    //TODO Исправить 'category_id' !!!
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'Смартфон Huawei nova Y91',
                'description' => 'Huawei nova Y91 оснащен большим 6,95-дюймовым сенсорным IPS-экраном с разрешением 2376 × 1080 точек (Full HD+), частотой обновления 90 Гц и частотой дискретизации касаний в 270 Гц. В вырезе в верхней части экрана находится 8-Мп камера с диафрагмой f/2.0. На задней панели смартфона размещена 50-мегапиксельная камера с диафрагмой F1.8, которую дополняет 2-мегапиксельный датчик измерения глубины (F2.4).',
                'price' => 20990,
                'image' => '',
                'category_id' => Category::find(1)->id

            ],
            [
                'title' => 'Смартфон Apple iPhone 14',
                'description' => 'Apple iPhone 14 — смартфон во влагоустойчивом корпусе с большим экраном, достаточным объемом памяти и энергоемким аккумулятором. Современные камеры дают возможность снимать фото и видеоролики в хорошем качестве при любом уровне освещения. Опция экстренной помощи позволяет отправить сообщение в службу спасения через спутник, даже если связь и выход в Сеть отсутствуют. Мощный процессор обеспечит достойный уровень производительности.',
                'price' => 84190,
                'image' => '',
                'category_id' => Category::find(2)->id

            ],
            [
                'title' => 'Ноутбук игровой ASUS TUF Gaming F15 FX506HE-HN376 90NR0704-M00J60',
                'description' => 'Ноутбук игровой ASUS TUF Gaming F15 FX506HE-HN376 90NR0704-M00J60 имеет широкоформатный 15,6-дюймовый IPS-дисплей с адаптивной частотой 144 Гц и поддержкой технологии синхронизации NVIDIA G-SYNC, благодаря чему на нем будет комфортно играть в компьютерные игры с динамичными сценами, гоночные симуляторы и онлайн-шутеры. Экран также поддерживает популярные цветовые охваты sRGB, NTSC и Adobe RGB, поэтому на нем можно заниматься редактированием фотографий в Photoshop или других графических приложениях. Матрица с Full HD-разрешением подойдет также для просмотра видеоконтента и серфинга в веб-браузере: картинка будет четкой и максимально детализированной.',
                'price' => 89990,
                'image' => '',
                'category_id' => Category::find(3)->id

            ],


        ]);
    }
}
