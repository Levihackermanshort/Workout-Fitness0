@extends('layouts.app')

@section('title', 'All Activities - Fitness Journal')

@section('content')
    <div class="page-header">
        <h2>All Activities</h2>
        <a href="{{ route('activities.create') }}" class="btn btn-primary">Add New Activity</a>
    </div>

    @if($activities->count() > 0)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
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
                            <td>{{ $activity->date->format('Y-m-d') }}</td>
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
    @else
        <div class="empty-state">
            <p>No activities found. <a href="{{ route('activities.create') }}">Add your first activity</a></p>
        </div>
    @endif
@endsection

