<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::query()->create(['name' => 'english', 'locale' => 'en']);
        Language::query()->create(['name' => 'indonesia', 'locale' => 'id']);
    }
}
