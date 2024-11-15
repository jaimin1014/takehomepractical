@extends('layouts.app')

@section('content')
    <h4 class="d-flex justify-content-between align-items-center mb-4 mt-4">
        Stats by Term
    </h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Term</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stats as $stat)
                <tr>
                    <td>{{ $stat->term->utm_term }}</td>
                    <td>{{ $stat->term_revenue }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $stats->onEachSide(1)->links() }}
    </div>
@endsection
