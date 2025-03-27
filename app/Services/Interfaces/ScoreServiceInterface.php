<?php

namespace App\Services\Interfaces;

use App\Http\Requests\CheckScoreRequest;
use App\Http\Requests\ReportRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
interface ScoreServiceInterface
{
    public function checkScore( $request): ?array;
    public function report( $request): array;
    public function topGroupA(): Collection;
}