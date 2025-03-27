<?php

namespace App\Repositories;

use App\Models\ExamScore;
use App\Repositories\Interfaces\ExamScoreRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class ExamScoreRepository implements ExamScoreRepositoryInterface
{
    public function findByRegistrationNumber(string $registrationNumber): ?Model
    {
        return ExamScore::where('registration_number', $registrationNumber)->first();
    }

    public function countByScoreRange(string $subject, ?float $min, ?float $max): int
    {
        $query = ExamScore::whereNotNull($subject);

        if ($min !== null && $max !== null) {
            return $query->where($subject, '>=', $min)->where($subject, '<', $max)->count();
        } elseif ($min !== null) {
            return $query->where($subject, '>=', $min)->count();
        } elseif ($max !== null) {
            return $query->where($subject, '<', $max)->count();
        }

        return 0;
    }

    public function getTopGroupA(): Collection
    {
        return ExamScore::select('registration_number', 'math', 'physics', 'chemistry')
            ->whereNotNull('math')
            ->whereNotNull('physics')
            ->whereNotNull('chemistry')
            ->orderByRaw('(math + physics + chemistry) DESC')
            ->limit(10)
            ->get();
    }
}