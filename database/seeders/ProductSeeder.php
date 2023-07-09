<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id' => 1,
            'name' => 'Настол. игра',
            'price' => 200,
            'image' => 'assets/product_images/1686144798.png',
            'category_id' => 1,
            'qty' => 23,
            'created_at' => NULL,
            'updated_at' => '2023-06-07 07:42:47'
        ]);

        Product::create([
            'id' => 2,
            'name' => 'Лото детское',
            'price' => 150,
            'image' => 'assets/product_images/1686145498.png',
            'category_id' => 1,
            'qty' => 45,
            'created_at' => NULL,
            'updated_at' => '2023-06-07 07:45:01'
        ]);

        Product::create([
            'id' => 4,
            'name' => 'Шахматы',
            'price' => 200,
            'image' => 'assets/product_images/1686145135.png',
            'category_id' => 4,
            'qty' => 23,
            'created_at' => NULL,
            'updated_at' => '2023-06-07 07:38:55'
        ]);

        Product::create([
            'id' => 5,
            'name' => 'Шашки',
            'price' => 150,
            'image' => 'assets/product_images/1686145290.png',
            'category_id' => 1,
            'qty' => 0,
            'created_at' => NULL,
            'updated_at' => '2023-06-07 07:41:30'
        ]);

        Product::create([
            'id' => 6,
            'name' => 'Фломастеры',
            'price' => 30,
            'image' => 'assets/product_images/1686145597.png',
            'category_id' => 8,
            'qty' => 56,
            'created_at' => '2023-06-07 07:16:36',
            'updated_at' => '2023-06-07 07:46:37'
        ]);

        Product::create([
            'id' => 7,
            'name' => 'Гуашь',
            'price' => 50,
            'image' => 'assets/product_images/1686146085.png',
            'category_id' => 8,
            'qty' => 104,
            'created_at' => '2023-06-07 07:50:52',
            'updated_at' => '2023-06-07 07:54:45'
        ]);

        Product::create([
            'id' => 8,
            'name' => 'Краски',
            'price' => 30,
            'image' => 'assets/product_images/1686146298.png',
            'category_id' => 8,
            'qty' => 20,
            'created_at' => '2023-06-07 07:58:18',
            'updated_at' => '2023-06-07 07:58:18'
        ]);

        Product::create([
            'id' => 22,
            'name' => 'Сюрприз 1',
            'price' => 200,
            'image' => 'assets/product_images/1686146621.png',
            'category_id' => 6,
            'qty' => 1,
            'created_at' => '2023-06-07 08:01:05',
            'updated_at' => '2023-06-26 16:40:25'
        ]);

        Product::create([
            'id' => 24,
            'name' => 'Сюрприз 2',
            'price' => 300,
            'image' => 'assets/product_images/1687808076.jpg',
            'category_id' => 6,
            'qty' => 45,
            'created_at' => '2023-06-26 16:34:36',
            'updated_at' => '2023-06-26 16:34:36'
        ]);

        Product::create([
            'id' => 25,
            'name' => 'Сюрприз 3',
            'price' => 500,
            'image' => 'assets/product_images/1687808099.jpg',
            'category_id' => 6,
            'qty' => 12,
            'created_at' => '2023-06-26 16:34:59',
            'updated_at' => '2023-06-26 16:34:59'
        ]);

        Product::create([
            'id' => 26,
            'name' => 'Волшебник изумрудного город',
            'price' => 150,
            'image' => 'assets/product_images/1687808162.png',
            'category_id' => 3,
            'qty' => 60,
            'created_at' => '2023-06-26 16:36:02',
            'updated_at' => '2023-06-26 16:36:02'
        ]);

        Product::create([
            'id' => 27,
            'name' => 'Золотой ключик или приключения Буратино',
            'price' => 150,
            'image' => 'assets/product_images/1687808202.png',
            'category_id' => 3,
            'qty' => 26,
            'created_at' => '2023-06-26 16:36:42',
            'updated_at' => '2023-06-26 16:36:42'
        ]);

        Product::create([
            'id' => 28,
            'name' => 'Наушники',
            'price' => 350,
            'image' => 'assets/product_images/1687808380.png',
            'category_id' => 5,
            'qty' => 260,
            'created_at' => '2023-06-26 16:39:40',
            'updated_at' => '2023-06-26 16:39:40'
        ]);

        Product::create([
            'id' => 29,
            'name' => 'Часы-будильник',
            'price' => 450,
            'image' => 'assets/product_images/1687808557.png',
            'category_id' => 5,
            'qty' => 5,
            'created_at' => '2023-06-26 16:41:33',
            'updated_at' => '2023-06-26 16:42:37'
        ]);

        Product::create([
            'id' => 30,
            'name' => 'Настольная игра',
            'price' => 180,
            'image' => 'assets/product_images/1687808910.png',
            'category_id' => 1,
            'qty' => 4,
            'created_at' => '2023-06-26 16:47:30',
            'updated_at' => '2023-06-26 16:48:31'
        ]);

        Product::create([
            'id' => 31,
            'name' => 'Сертификат 1',
            'price' => 400,
            'image' => 'assets/product_images/1687809346.png',
            'category_id' => 7,
            'qty' => 2,
            'created_at' => '2023-06-26 16:51:19',
            'updated_at' => '2023-06-26 16:55:46'
        ]);

        Product::create([
            'id' => 33,
            'name' => 'Сертификат 2',
            'price' => 500,
            'image' => 'assets/product_images/1687809568.png',
            'category_id' => 7,
            'qty' => 3,
            'created_at' => '2023-06-26 16:59:28',
            'updated_at' => '2023-06-26 16:59:28'
        ]);

        Product::create([
            'id' => 34,
            'name' => 'Сертификат 3',
            'price' => 550,
            'image' => 'assets/product_images/1687809639.png',
            'category_id' => 7,
            'qty' => 1,
            'created_at' => '2023-06-26 17:00:42',
            'updated_at' => '2023-06-26 17:00:42'
        ]);

        Product::create([
            'id' => 35,
            'name' => 'Внешний накопитель',
            'price' => 600,
            'image' => 'assets/product_images/1687809741.png',
            'category_id' => 5,
            'qty' => 24,
            'created_at' => '2023-06-26 17:02:21',
            'updated_at' => '2023-06-26 17:02:21'
        ]);

        Product::create([
            'id' => 36,
            'name' => 'Часы наручные',
            'price' => 500,
            'image' => 'assets/product_images/1687809967.png',
            'category_id' => 5,
            'qty' => 25,
            'created_at' => '2023-06-26 17:06:07',
            'updated_at' => '2023-06-26 17:06:07'
        ]);

        Product::create([
            'id' => 37,
            'name' => 'USB-флешка',
            'price' => 300,
            'image' => 'assets/product_images/1687810395.png',
            'category_id' => 5,
            'qty' => 54,
            'created_at' => '2023-06-26 17:12:12',
            'updated_at' => '2023-06-26 17:13:15'
        ]);

        Product::create([
            'id' => 38,
            'name' => 'Кубик рубика',
            'price' => 350,
            'image' => 'assets/product_images/1687811423.png',
            'category_id' => 1,
            'qty' => 46,
            'created_at' => '2023-06-26 17:30:24',
            'updated_at' => '2023-06-26 17:30:24'
        ]);

        Product::create([
            'id' => 39,
            'name' => 'Конструктор из дерева',
            'price' => 250,
            'image' => 'assets/product_images/1687811555.png',
            'category_id' => 1,
            'qty' => 28,
            'created_at' => '2023-06-26 17:32:35',
            'updated_at' => '2023-06-26 17:32:35'
        ]);

        Product::create([
            'id' => 40,
            'name' => 'Домино для мальчиков',
            'price' => 340,
            'image' => 'assets/product_images/1687811698.png',
            'category_id' => 1,
            'qty' => 62,
            'created_at' => '2023-06-26 17:34:58',
            'updated_at' => '2023-06-26 17:34:58'
        ]);

        Product::create([
            'id' => 41,
            'name' => 'Домино для девочек',
            'price' => 340,
            'image' => 'assets/product_images/1687811839.png',
            'category_id' => 1,
            'qty' => 59,
            'created_at' => '2023-06-26 17:37:19',
            'updated_at' => '2023-06-26 17:37:19'
        ]);

        Product::create([
            'id' => 42,
            'name' => 'Монополия',
            'price' => 250,
            'image' => 'assets/product_images/1687812077.png',
            'category_id' => 1,
            'qty' => 62,
            'created_at' => '2023-06-26 17:41:17',
            'updated_at' => '2023-06-26 17:41:17'
        ]);

        Product::create([
            'id' => 43,
            'name' => 'Альбом для рисования А3',
            'price' => 100,
            'image' => 'assets/product_images/1687812658.png',
            'category_id' => 8,
            'qty' => 24,
            'created_at' => '2023-06-26 17:50:58',
            'updated_at' => '2023-06-26 17:50:58'
        ]);

        Product::create([
            'id' => 44,
            'name' => 'Цветная бумага',
            'price' => 80,
            'image' => 'assets/product_images/1687813506.png',
            'category_id' => 8,
            'qty' => 65,
            'created_at' => '2023-06-26 18:05:06',
            'updated_at' => '2023-06-26 18:05:06'
        ]);

        Product::create([
            'id' => 45,
            'name' => 'Цветной картон',
            'price' => 60,
            'image' => 'assets/product_images/1687813612.png',
            'category_id' => 8,
            'qty' => 34,
            'created_at' => '2023-06-26 18:06:52',
            'updated_at' => '2023-06-26 18:06:52'
        ]);

        Product::create([
            'id' => 46,
            'name' => 'Пластилин',
            'price' => 130,
            'image' => 'assets/product_images/1687814078.png',
            'category_id' => 1,
            'qty' => 156,
            'created_at' => '2023-06-26 18:14:38',
            'updated_at' => '2023-06-26 18:14:38'
        ]);

        Product::create([
            'id' => 47,
            'name' => 'Конструктор \"Лего\"',
            'price' => 500,
            'image' => 'assets/product_images/1687814630.png',
            'category_id' => 1,
            'qty' => 12,
            'created_at' => '2023-06-26 18:23:50',
            'updated_at' => '2023-06-26 18:23:50'
        ]);

        Product::create([
            'id' => 48,
            'name' => 'UNO',
            'price' => 100,
            'image' => 'assets/product_images/1687814881.png',
            'category_id' => 1,
            'qty' => 73,
            'created_at' => '2023-06-26 18:28:01',
            'updated_at' => '2023-06-26 18:28:01'
        ]);

        Product::create([
            'id' => 49,
            'name' => 'Гарри Поттер и философский камень',
            'price' => 200,
            'image' => 'assets/product_images/1687815194.png',
            'category_id' => 3,
            'qty' => 27,
            'created_at' => '2023-06-26 18:33:14',
            'updated_at' => '2023-06-26 18:33:14'
        ]);

        Product::create([
            'id' => 50,
            'name' => 'Большая книга волшебных историй',
            'price' => 160,
            'image' => 'assets/product_images/1687815476.png',
            'category_id' => 3,
            'qty' => 36,
            'created_at' => '2023-06-26 18:37:56',
            'updated_at' => '2023-06-26 18:37:56'
        ]);

        Product::create([
            'id' => 51,
            'name' => 'Маленький принц',
            'price' => 170,
            'image' => 'assets/product_images/1687815698.png',
            'category_id' => 3,
            'qty' => 16,
            'created_at' => '2023-06-26 18:41:38',
            'updated_at' => '2023-06-26 18:41:38'
        ]);

        Product::create([
            'id' => 52,
            'name' => 'Малыш и Карлсон, который живет на крыше',
            'price' => 120,
            'image' => 'assets/product_images/1687815787.png',
            'category_id' => 3,
            'qty' => 76,
            'created_at' => '2023-06-26 18:43:07',
            'updated_at' => '2023-06-26 18:43:07'
        ]);

        Product::create([
            'id' => 53,
            'name' => 'Золушка',
            'price' => 140,
            'image' => 'assets/product_images/1687815904.png',
            'category_id' => 3,
            'qty' => 55,
            'created_at' => '2023-06-26 18:45:04',
            'updated_at' => '2023-06-26 18:45:04'
        ]);

        Product::create([
            'id' => 54,
            'name' => 'Винни-Пух',
            'price' => 150,
            'image' => 'assets/product_images/1687815994.png',
            'category_id' => 3,
            'qty' => 49,
            'created_at' => '2023-06-26 18:46:34',
            'updated_at' => '2023-06-26 18:46:34'
        ]);

        Product::create([
            'id' => 55,
            'name' => 'Малышка Мю и домик Муми-тролля',
            'price' => 160,
            'image' => 'assets/product_images/1687816258.png',
            'category_id' => 3,
            'qty' => 24,
            'created_at' => '2023-06-26 18:50:58',
            'updated_at' => '2023-06-26 18:50:58'
        ]);

        Product::create([
            'id' => 56,
            'name' => 'Гарри Поттер и Принц-полукровка',
            'price' => 180,
            'image' => 'assets/product_images/1687816421.png',
            'category_id' => 3,
            'qty' => 31,
            'created_at' => '2023-06-26 18:52:23',
            'updated_at' => '2023-06-26 18:53:41'
        ]);

        Product::create([
            'id' => 57,
            'name' => 'Гарри Поттер и Тайная комната',
            'price' => 180,
            'image' => 'assets/product_images/1687816529.png',
            'category_id' => 3,
            'qty' => 46,
            'created_at' => '2023-06-26 18:55:29',
            'updated_at' => '2023-06-26 18:55:29'
        ]);

        Product::create([
            'id' => 58,
            'name' => 'Гарри Поттер и Орден Феникса',
            'price' => 180,
            'image' => 'assets/product_images/1687816633.png',
            'category_id' => 3,
            'qty' => 49,
            'created_at' => '2023-06-26 18:57:13',
            'updated_at' => '2023-06-26 18:57:13'
        ]);

        Product::create([
            'id' => 59,
            'name' => 'Гарри Поттер и Кубок Огня',
            'price' => 180,
            'image' => 'assets/product_images/1687816699.png',
            'category_id' => 3,
            'qty' => 64,
            'created_at' => '2023-06-26 18:58:19',
            'updated_at' => '2023-06-26 18:58:19'
        ]);

        Product::create([
            'id' => 60,
            'name' => 'Гарри Поттер и узник Азкабана',
            'price' => 180,
            'image' => 'assets/product_images/1687816739.png',
            'category_id' => 3,
            'qty' => 49,
            'created_at' => '2023-06-26 18:58:59',
            'updated_at' => '2023-06-26 18:58:59'
        ]);

        Product::create([
            'id' => 61,
            'name' => 'Гарри Поттер и Дары Смерти',
            'price' => 180,
            'image' => 'assets/product_images/1687816846.png',
            'category_id' => 3,
            'qty' => 70,
            'created_at' => '2023-06-26 19:00:46',
            'updated_at' => '2023-06-26 19:00:46'
        ]);

        Product::create([
            'id' => 62,
            'name' => 'Поллианна',
            'price' => 160,
            'image' => 'assets/product_images/1687817252.png',
            'category_id' => 3,
            'qty' => 14,
            'created_at' => '2023-06-26 19:04:56',
            'updated_at' => '2023-06-26 19:07:32'
        ]);

        Product::create([
            'id' => 63,
            'name' => 'Наполеон',
            'price' => 150,
            'image' => 'assets/product_images/1687817194.png',
            'category_id' => 3,
            'qty' => 49,
            'created_at' => '2023-06-26 19:06:34',
            'updated_at' => '2023-06-26 19:06:34'
        ]);
    }
}
