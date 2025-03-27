@extends('layouts.app')

@section('content')
    <div class="card p-4 mb-4">
        <h2>Search Scores</h2>
        <form action="{{ route('check.score') }}" method="GET">
            <div class="mb-3">
                <label for="registration_number" class="form-label">Registration Number:</label>
                <input type="text" name="registration_number" id="registration_number" class="form-control"
                    placeholder="Enter registration number" value="{{ request('registration_number') }}">

            </div>
            <button type="submit" class="btn btn-submit btn-success">Search</button>
        </form>
    </div>

    @if (isset($score))
        <div class="card p-4">
            <h2>Detailed Scores</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $subjectManager->getSubjectName($subject) }}</td>
                            <td>{{ $score->$subject ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Foreign Language Code</td>
                        <td>{{ $score->foreign_language_code ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="card p-4">
            <h2>Detailed Scores</h2>
            <p>Detailed view of search scores here!</p>
        </div>
    @endif
@endsection
