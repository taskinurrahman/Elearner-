<?php

use Illuminate\Database\Seeder;
use App\Enroll;
class EnrollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enroll = [
            [
                'user_id' => 9,
                'course_id' =>22
            ],

            $enroll = [
                'user_id' => 9,
                'course_id' =>23
            ],

            [
                'user_id' => 10,
                'course_id' =>25
            ],

            $enroll = [
                'user_id' => 10,
                'course_id' =>26
            ],

        ];
        foreach ($enroll as $key => $value) {
            Enroll::UpdateOrcreate($value);
        }
    }
}
