@extends('layouts.app')

@section('content')
    <div class="card p-4 mb-4">
        <h2>Score Statistics</h2>
        <div style="height: 400px;">
            <canvas id="scoreChart" data-labels='@json(array_map([$subjectManager, 'getSubjectName'], array_keys($statistics)))' data-gte8='@json(array_column($statistics, 'gte_8'))'
                data-gte6-lt8='@json(array_column($statistics, 'gte_6_lt_8'))' data-gte4-lt6='@json(array_column($statistics, 'gte_4_lt_6'))'
                data-lt4='@json(array_column($statistics, 'lt_4'))'>
            </canvas>
        </div>
    </div>

    <div class="card p-4">
        <h2>Detailed Statistics</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>≥ 8</th>
                        <th>6 - 8</th>
                        <th>4 - 6</th>
                        <th>
                            < 4</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statistics as $subject => $data)
                        <tr>
                            <td>{{ $subjectManager->getSubjectName($subject) }}</td>
                            <td>{{ $data['gte_8'] }}</td>
                            <td>{{ $data['gte_6_lt_8'] }}</td>
                            <td>{{ $data['gte_4_lt_6'] }}</td>
                            <td>{{ $data['lt_4'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
