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
                'title' => null,
                'filename' => "sample1.jpg",
            ],
            [
                'owner_id' => 1,
                'title' => null,
                'filename' => "sample2.jpg",
            ],
            [
                'owner_id' => 1,
                'title' => null,
                'filename' => "sample3.png",
            ],
            [
                'owner_id' => 1,
                'title' => null,
                'filename' => "sample4.jpg",
            ],
            [
                'owner_id' => 1,
                'title' => null,
                'filename' => "sample5.png",
            ],
            [
                'owner_id' => 1,
                'title' => null,
                'filename' => "sample6.jpg",
            ],
            [
                'owner_id' => 2,
                'title' => null,
                'filename' => "sample2.jpg",
            ],
            [
                'owner_id' => 3,
                'title' => null,
                'filename' => "sample3.png",
            ],
            [
                'owner_id' => 4,
                'title' => null,
                'filename' => "sample4.jpg",
            ],
            [
                'owner_id' => 5,
                'title' => null,
                'filename' => "sample5.png",
            ],
            [
                'owner_id' => 6,
                'title' => null,
                'filename' => "sample6.jpg",
            ],

        ]);
    }
}
