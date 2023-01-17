<?php

namespace Database\Seeders;

use App\Models\Letter;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Letter::insert([
            'user_id' => 2,
            'letter_category_id' => 1,
            'name' => 'Alex Rama',
            'description' => 'Pengajuan dinas kerja ke Jakarta',
            'effective_date' => Carbon::now(),
            'end_date' => Carbon::tomorrow(),
        ]);

        Letter::insert([
            'user_id' => 2,
            'letter_category_id' => 2,
            'name' => 'Alex Ramadhan',
            'description' => 'Pengajuan surat lamaran kerja ke PT ABC',
            'effective_date' => Carbon::now(),
            'end_date' => Carbon::tomorrow(),
        ]);
    }
}
