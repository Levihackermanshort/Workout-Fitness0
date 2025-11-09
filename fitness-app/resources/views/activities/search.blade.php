@extends('layouts.app')

@section('title', 'Search Activities - Fitness Journal')

@section('content')
    <div class="page-header">
        <h2>Search Activities</h2>
    </div>

    <div class="search-container">
        <form method="POST" action="{{ route('activities.search') }}">
            @csrf
            <div class="form-group">
                <label for="search_date">Search by Date <span class="required">*</span></label>
                <input type="date" id="search_date" name="search_date" value="{{ old('search_date', $searchDate ?: '') }}" required>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    @if($searchDate)
        @if($activities->count() > 0)
            <div class="search-results">
                <h3>Results for {{ \Carbon\Carbon::parse($searchDate)->format('F d, Y') }}</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Activity</th>
                                <th>Duration</th>
                                <th>Distance</th>
                                <th>Sets</th>
                                <th>Reps</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                                <tr>
                                    <td>{{ $activity->time_start ? substr($activity->time_start, 0, 5) : '-' }}</td>
                                    <td>{{ $activity->time_end ? substr($activity->time_end, 0, 5) : '-' }}</td>
                                    <td>{{ $activity->activity }}</td>
                                    <td>{{ $activity->time_spent ?: '-' }}</td>
                                    <td>{{ $activity->distance ?: '-' }}</td>
                                    <td>{{ $activity->set_count ?: '-' }}</td>
                                    <td>{{ $activity->reps ?: '-' }}</td>
                                    <td>{{ Str::limit($activity->note, 30) ?: '-' }}</td>
                                    <td class="actions">
                                        <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-small">Edit</a>
                                        <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-small btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    {{ $activities->links() }}
                </div>
            </div>
        @else
            <div class="empty-state">
                <p>No activities found for {{ \Carbon\Carbon::parse($searchDate)->format('F d, Y') }}.</p>
            </div>
        @endif
    @endif
@endsection

