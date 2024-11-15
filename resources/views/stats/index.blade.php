@extends('layouts.app')

@section('content')
    <h4 class="mb-4 mt-4">Stats by Campaign</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Campaign</th>
                <th>Total Revenue</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stats as $stat)
                <tr>
                    <td>{{ $stat->utm_campaign }}</td>
                    <td>{{ $stat->stats_sum_revenue }}</td>
                    <td><a href="{{ route('campaign', $stat->id) }}">View by Date & Hour</a> | <a href="{{ route('publishers', $stat->id) }}">View by Publishers</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $stats->onEachSide(1)->links() }}
    </div>
@endsection
