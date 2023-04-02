<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Health and Wellness',
            'Travel',
            'Food and Drink',
            'Fashion and Style',
            'Entertainment',
            'Sports and Fitness',
            'Education',
            'Business and Finance',
            'Politics',
            'Art and Design',
            'Science',
            'History',
            'Parenting',
            'Personal Development',
            'Relationships',
            'Religion and Spirituality',
            'Self-Care',
            'Social Media',
            'Writing and Literature',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
