<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface ExamScoreRepositoryInterface
{
    public function findByRegistrationNumber(string $registrationNumber): ?Model;
    public function countByScoreRange(string $subject, ?float $min, ?float $max): int;
    public function getTopGroupA(): Collection;
}