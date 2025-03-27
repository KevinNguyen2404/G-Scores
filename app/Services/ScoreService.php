<?php

namespace App\Services;

use App\Services\Interfaces\ScoreServiceInterface;
use App\Repositories\Interfaces\ExamScoreRepositoryInterface as ExamScoreRepository;
use App\Http\Requests\CheckScoreRequest;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class ScoreService implements ScoreServiceInterface
{
    protected $examScoreRepository;
    protected $subjectManager;

    public function __construct(ExamScoreRepository $examScoreRepository, SubjectManager $subjectManager)
    {
        $this->examScoreRepository = $examScoreRepository;
        $this->subjectManager = $subjectManager;
    }

    public function checkScore( $request): ?array
    {
        $registrationNumber = $request->input('registration_number');
        $score = $this->examScoreRepository->findByRegistrationNumber($registrationNumber);

        if (!$score) {
            return null;
        }

        return [
            'score' => $score,
            'subjects' => $this->subjectManager->getSubjects(),
        ];
    }

    public function report( $request): array
    {
        $subjects = $this->subjectManager->getSubjects();
        $statistics = [];

        foreach ($subjects as $subject) {
            $statistics[$subject] = [
                'gte_8' => $this->examScoreRepository->countByScoreRange($subject, 8, null),
                'gte_6_lt_8' => $this->examScoreRepository->countByScoreRange($subject, 6, 8),
                'gte_4_lt_6' => $this->examScoreRepository->countByScoreRange($subject, 4, 6),
                'lt_4' => $this->examScoreRepository->countByScoreRange($subject, null, 4),
            ];
        }

        return [
            'statistics' => $statistics,
            'subjects' => $subjects,
        ];
    }

    public function topGroupA(): Collection
    {
        return $this->examScoreRepository->getTopGroupA();
    }
}