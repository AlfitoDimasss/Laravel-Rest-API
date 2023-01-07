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
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'status' => 'On Process'
        ]);

        Letter::insert([
            'user_id' => 2,
            'letter_category_id' => 2,
            'name' => 'Alex Ramadhan',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'status' => 'On Process'
        ]);
    }
}
