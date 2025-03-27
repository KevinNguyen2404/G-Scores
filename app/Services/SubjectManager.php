<?php

namespace App\Services;

class SubjectManager
{
    private $subjects = [
        'math' => 'Math',
        'literature' => 'Literature',
        'foreign_language' => 'Foreign Language',
        'physics' => 'Physics',
        'chemistry' => 'Chemistry',
        'biology' => 'Biology',
        'history' => 'History',
        'geography' => 'Geography',
        'civic_education' => 'Civic Education',
    ];

    public function getSubjects(): array
    {
        return array_keys($this->subjects);
    }

    public function getSubjectName(string $key): string
    {
        return $this->subjects[$key] ?? $key;
    }
}