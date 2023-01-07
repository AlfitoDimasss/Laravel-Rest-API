<?php

namespace Database\Seeders;

use App\Models\LetterCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LetterCategory::insert([
            'letter_category' => 'Surat Dinas'
        ]);

        LetterCategory::insert([
            'letter_category' => 'Surat Lamaran Kerja'
        ]);
    }
}
