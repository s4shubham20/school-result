<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = array('Hindi','English', 'Mathematics','Science','Social Science','G.K.','Computer','Art','Physical Education');
        foreach($subjects as $key => $subject){
            Subject::create([
                'subject_name'  => $subject,
            ]);
        }
    }
}
