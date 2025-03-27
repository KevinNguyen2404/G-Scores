@extends('layouts.app')

@section('content')
    <div class="card p-4">
        <h2>Top 10 Students in Group A (Math, Physics, Chemistry)</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Registration Number</th>
                        <th>Math</th>
                        <th>Physics</th>
                        <th>Chemistry</th>
                        <th>Total Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topStudents as $index => $student)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $student->registration_number }}</td>
                            <td>{{ $student->math }}</td>
                            <td>{{ $student->physics }}</td>
                            <td>{{ $student->chemistry }}</td>
                            <td>{{ $student->math + $student->physics + $student->chemistry }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
