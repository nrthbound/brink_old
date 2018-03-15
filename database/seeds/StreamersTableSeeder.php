<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StreamersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('streamers')->insert([
            'name' => 'brinkco',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
