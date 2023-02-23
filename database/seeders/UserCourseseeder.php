<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCourseseeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('course_user')
            ->insertOrIgnore([
                [
                    'user_id' => 1,
                    'course_id' => 1,
                    'passed' => false,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'user_id' => 2,
                    'course_id' => 1,
                    'passed' => false,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'user_id' => 1,
                    'course_id' => 2,
                    'passed' => false,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'user_id' => 2,
                    'course_id' => 2,
                    'passed' => false,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]);
    }
}
