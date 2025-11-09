@extends('layouts.app')

@section('title', 'Add Activity - Fitness Journal')

@section('content')
    <div class="page-header">
        <h2>Add New Activity</h2>
    </div>

    <div class="form-container">
        <form method="POST" action="{{ route('activities.store') }}">
            @csrf

            <div class="form-group">
                <label for="date">Date <span class="required">*</span></label>
                <input type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="time_start">Start Time</label>
                    <input type="time" id="time_start" name="time_start" value="{{ old('time_start') }}">
                </div>
                <div class="form-group">
                    <label for="time_end">End Time</label>
                    <input type="time" id="time_end" name="time_end" value="{{ old('time_end') }}">
                </div>
            </div>

            <div class="form-group">
                <label for="activity">Activity Name <span class="required">*</span></label>
                <input type="text" id="activity" name="activity" value="{{ old('activity') }}" required maxlength="255">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="time_spent">Duration</label>
                    <input type="text" id="time_spent" name="time_spent" value="{{ old('time_spent') }}" placeholder="e.g., 60 mins" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="distance">Distance</label>
                    <input type="text" id="distance" name="distance" value="{{ old('distance') }}" placeholder="e.g., 5 km" maxlength="50">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="set_count">Sets</label>
                    <input type="number" id="set_count" name="set_count" value="{{ old('set_count', 0) }}" min="0">
                </div>
                <div class="form-group">
                    <label for="reps">Reps</label>
                    <input type="number" id="reps" name="reps" value="{{ old('reps', 0) }}" min="0">
                </div>
            </div>

            <div class="form-group">
                <label for="note">Notes</label>
                <textarea id="note" name="note" rows="4" maxlength="1000">{{ old('note') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Activity</button>
                <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection

