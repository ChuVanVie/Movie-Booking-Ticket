<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_name' => 'Tình Cảm',
            'slug' => 'tinh-cam'
        ]);

        Category::create([
            'category_name' => 'Tâm Lý',
            'slug' => 'tam-ly'
        ]);

        Category::create([
            'category_name' => 'Hành Động',
            'slug' => 'hanh-dong'
        ]);

        Category::create([
            'category_name' => 'Kinh Dị',
            'slug' => 'kinh-di'
        ]);

        Category::create([
            'category_name' => 'Phiêu Lưu',
            'slug' => 'phieu-luu'
        ]);

        Category::create([
            'category_name' => 'Hình Sự',
            'slug' => 'hinh-su'
        ]);

        Category::create([
            'category_name' => 'Bí ẩn',
            'slug' => 'bi-an'
        ]);

        Category::create([
            'category_name' => 'Chính kịch',
            'slug' => 'chinh-kich'
        ]);

        Category::create([
            'category_name' => 'Khoa học',
            'slug' => 'khoa-hoc'
        ]);

        Category::create([
            'category_name' => 'Viễn tưởng',
            'slug' => 'vien-tuong'
        ]);

    }
}
