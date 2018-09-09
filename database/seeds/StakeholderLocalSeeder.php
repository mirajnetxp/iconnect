<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StakeholderLocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stakeholders')->insert(
            array_map(
                function($data) {
                    $now = Carbon::now();
                    return $data + [ 'first_name' => 'Test', 'last_name' => 'Stakeholder', 'password' => Hash::make('test'),
                        'created_at' => $now, 'updated_at' => $now ];
                },
                [
                    [ 'id' => 1 , 'username' => 'stakeholder1' , 'student_id' => 1 ],
                    [ 'id' => 2 , 'username' => 'stakeholder2' , 'student_id' => 2 ]
                ]
            )
        );
    }
}

