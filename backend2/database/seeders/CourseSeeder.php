<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => '袖ヶ浦フォレストレースウェイ',
            'location' => '千葉県',
            'keyword' => '袖ヶ浦',
            'api_keyword' => 'sodegaura',
        ]);
        Course::create([
            'name' => '美浜サーキット',
            'location' => '愛知県',
            'keyword' => '美浜',
            'api_keyword' => 'mihama',
        ]);
        Course::create([
            'name' => '筑波サーキット',
            'location' => '茨城県',
            'keyword' => '筑波',
            'api_keyword' => 'tsukuba',
        ]);
        Course::create([
            'name' => '日光サーキット',
            'location' => '栃木県',
            'keyword' => '日光',
            'api_keyword' => 'nikko',
        ]);
        Course::create([
            'name' => '鈴鹿サーキット',
            'location' => '三重県',
            'keyword' => '鈴鹿',
            'api_keyword' => 'suzuka',
        ]);
        Course::create([
            'name' => '鈴鹿サーキット南コース',
            'location' => '三重県',
            'keyword' => '鈴鹿サーキット南コース',
            'api_keyword' => 'suzuka_south',
        ]);
        Course::create([
            'name' => 'モビリティリゾートもてぎ',
            'location' => '栃木県',
            'keyword' => 'もてぎ',
            'api_keyword' => 'motegi',
        ]);
        Course::create([
            'name' => '富士スピードウェイ',
            'location' => '静岡県',
            'keyword' => '富士',
            'api_keyword' => 'fsw',
        ]);
        Course::create([
            'name' => '岡山国際サーキット',
            'location' => '岡山県',
            'keyword' => '岡山',
            'api_keyword' => 'okayama',
        ]);
        Course::create([
            'name' => 'スポーツランドSUGO',
            'location' => '宮城県',
            'keyword' => 'SUGO',
            'api_keyword' => 'sugo',
        ]);
        Course::create([
            'name' => 'オートポリス',
            'location' => '大分県',
            'keyword' => 'オートポリス',
            'api_keyword' => 'autopolis',
        ]);
        Course::create([
            'name' => 'TSタカタサーキット',
            'location' => '広島県',
            'keyword' => 'タカタ',
            'api_keyword' => 'takata',
        ]);
        Course::create([
            'name' => '宝台樹スキー場 駐車場',
            'location' => '群馬県',
            'keyword' => '宝台樹',
            'api_keyword' => 'houdaigi',
        ]);
        Course::create([
            'name' => '茂原サーキット',
            'location' => '千葉県',
            'keyword' => '茂原',
            'api_keyword' => 'mobara',
        ]);
    }
}
