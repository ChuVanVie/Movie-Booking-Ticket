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
        ]);

        Category::create([
            'category_name' => 'Tâm Lý',
        ]);

        Category::create([
            'category_name' => 'Hành Động',
        ]);

        Category::create([
            'category_name' => 'Kinh Dị',
        ]);

        Category::create([
            'category_name' => 'Phiêu Lưu',
        ]);

        Category::create([
            'category_name' => 'Hình Sự',
        ]);

        Category::create([
            'category_name' => 'Bí ẩn',
        ]);

        Category::create([
            'category_name' => 'Chính kịch',
        ]);

        Category::create([
            'category_name' => 'Khoa học',
        ]);

        Category::create([
            'category_name' => 'Viễn tưởng',
        ]);

    }
}
