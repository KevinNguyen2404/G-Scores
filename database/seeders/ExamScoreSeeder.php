<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/seeders/diem_thi_thpt_2024.csv'), 'r');
        $header = fgetcsv($csvFile);
        $count = 0;
        while (($row = fgetcsv($csvFile)) !== false && $count < 500) {
            DB::table('exam_scores')->updateOrInsert(
                ['registration_number' => $row[0]],
                [
                'math' => $row[1] ?: null,
                'literature' => $row[2] ?: null,
                'foreign_language' => $row[3] ?: null,
                'physics' => $row[4] ?: null,
                'chemistry' => $row[5] ?: null,
                'biology' => $row[6] ?: null,
                'history' => $row[7] ?: null,
                'geography' => $row[8] ?: null,
                'civic_education' => $row[9] ?: null,
                'foreign_language_code' => $row[10] ?: null,
            ]);
            $count++;
        }
        fclose($csvFile);
    }
}