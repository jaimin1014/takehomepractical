@extends('layouts.app')

@section('content')
    <h4 class="d-flex justify-content-between align-items-center mb-4 mt-4">
        Stats by Date and Hour
    </h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Hour</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stats as $stat)
                <tr>
                    <td>{{ $stat->date }}</td>
                    <td>{{ $stat->hour }}</td>
                    <td>{{ $stat->hourly_revenue }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $stats->onEachSide(1)->links() }}
    </div>
@endsection
