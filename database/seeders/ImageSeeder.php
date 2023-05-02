<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'owner_id' => 1,
                'title' => 'ここに画像のタイトルが入ります1。',
                'filename' => "",
            ],
            [
                'owner_id' => 1,
                'title' => 'ここに画像のタイトルが入ります2。',
                'filename' => "",
            ],
        ]);
    }
}
