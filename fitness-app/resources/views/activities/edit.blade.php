@extends('layouts.app')

@section('title', 'Edit Activity - Fitness Journal')

@section('content')
    <div class="page-header">
        <h2>Edit Activity</h2>
    </div>

    <div class="form-container">
        <form method="POST" action="{{ route('activities.update', $activity->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="date">Date <span class="required">*</span></label>
                <input type="date" id="date" name="date" value="{{ old('date', $activity->date->format('Y-m-d')) }}" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="time_start">Start Time</label>
                    <input type="time" id="time_start" name="time_start" value="{{ old('time_start', $activity->time_start ? substr($activity->time_start, 0, 5) : '') }}">
                </div>
                <div class="form-group">
                    <label for="time_end">End Time</label>
                    <input type="time" id="time_end" name="time_end" value="{{ old('time_end', $activity->time_end ? substr($activity->time_end, 0, 5) : '') }}">
                </div>
            </div>

            <div class="form-group">
                <label for="activity">Activity Name <span class="required">*</span></label>
                <input type="text" id="activity" name="activity" value="{{ old('activity', $activity->activity) }}" required maxlength="255">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="time_spent">Duration</label>
                    <input type="text" id="time_spent" name="time_spent" value="{{ old('time_spent', $activity->time_spent) }}" placeholder="e.g., 60 mins" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="distance">Distance</label>
                    <input type="text" id="distance" name="distance" value="{{ old('distance', $activity->distance) }}" placeholder="e.g., 5 km" maxlength="50">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="set_count">Sets</label>
                    <input type="number" id="set_count" name="set_count" value="{{ old('set_count', $activity->set_count) }}" min="0">
                </div>
                <div class="form-group">
                    <label for="reps">Reps</label>
                    <input type="number" id="reps" name="reps" value="{{ old('reps', $activity->reps) }}" min="0">
                </div>
            </div>

            <div class="form-group">
                <label for="note">Notes</label>
                <textarea id="note" name="note" rows="4" maxlength="1000">{{ old('note', $activity->note) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Activity</button>
                <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection

