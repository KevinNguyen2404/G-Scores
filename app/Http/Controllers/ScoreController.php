<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ScoreServiceInterface;

use App\Http\Requests\ReportRequest;
use App\Http\Requests\CheckScoreRequest;
use App\Services\SubjectManager;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    protected $scoreService;
    protected $subjectManager;

    public function __construct(ScoreServiceInterface $scoreService, SubjectManager $subjectManager)
    {
        $this->scoreService = $scoreService;
        $this->subjectManager = $subjectManager;
    }

    public function checkScore(Request $request)
    {

        if (!$request->filled('registration_number')) {
            return view('scores.check');
        }

        $result = $this->scoreService->checkScore($request);

        if (!$result) {
            return redirect()->route('check.score')
                ->with('error', 'Registration number not found.')
                ->withInput($request->only('registration_number'));
        }

        return view('scores.check', [
            'score' => $result['score'],
            'subjects' => $result['subjects'],
            'subjectManager' => $this->subjectManager,
        ]);
    }
    public function report(Request $request)
    {
        $result = $this->scoreService->report($request);

        return view('scores.report', [
            'statistics' => $result['statistics'],
            'subjectManager' => $this->subjectManager,
        ]);
    }

    public function topGroupA()
    {
        $topStudents = $this->scoreService->topGroupA();

        return view('scores.top_group_a', compact('topStudents'));
    }
}