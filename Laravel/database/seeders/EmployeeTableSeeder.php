<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            \DB::table('employee')->insert([
                [
                    'id' => '1',
                    'employee_id' => 'YZ00000001',
                    'family_name' => 'やじゅ',
                    'first_name' => '太郎',
                    'section_id' => '1',
                    'mail' => 'taro_yaz.co.jp',
                    'gender_id' => '1'
                 ],
                [
                    'id' => '2',
                    'employee_id' => 'YZ00000002',
                    'family_name' => 'やじゅ',
                    'first_name' => '次郎',
                    'section_id' => '2',
                    'mail' => 'taro_yaz.co.jp',
                    'gender_id' => '1'
                ],
                [
                    'id' => '3',
                    'employee_id' => 'YZ12345678',
                    'family_name' => 'やじゅ',
                    'first_name' => '花子',
                    'section_id' => '3',
                    'mail' => 'taro_yaz.co.jp',
                    'gender_id' => '2'
                ],
            ]);
        
    }
}
