<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ExamScoreRepositoryInterface;
use App\Repositories\ExamScoreRepository;
use App\Services\Interfaces\ScoreServiceInterface;
use App\Services\ScoreService;

class ScoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ScoreServiceInterface::class, ScoreService::class);
        $this->app->bind(ExamScoreRepositoryInterface::class, ExamScoreRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}