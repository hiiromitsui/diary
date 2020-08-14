<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon; // 追加
use Illuminate\Support\Facades\DB; // 追加


class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();
        $diaries=[
            [
                'title'=>'sebu now',
                'body'=>'sightSeeing',
            ],
            
            [
                'title'=>'夏',
                'body'=>'暑い',
            ],
            [
                'title'=>'Twice',
                'body'=>'LOVE',
            ],

        ];

        foreach($diaries as $dairy){
            DB::table('diaries')->insert([
                'title'=>$dairy['title'],
                'body'=>$dairy['body'],
                'user_id'=>$user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }

    }
}
