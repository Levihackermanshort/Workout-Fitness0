<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::orderBy('date', 'desc')
            ->orderBy('time_start', 'desc')
            ->paginate(10);
        
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'time_start' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i|after:time_start',
            'activity' => 'required|string|max:255',
            'time_spent' => 'nullable|string|max:50',
            'distance' => 'nullable|string|max:50',
            'set_count' => 'nullable|integer|min:0',
            'reps' => 'nullable|integer|min:0',
            'note' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('activities.create')
                ->withErrors($validator)
                ->withInput();
        }

        Activity::create($validator->validated());

        return redirect()->route('activities.index')
            ->with('success', 'Activity created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'time_start' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i|after:time_start',
            'activity' => 'required|string|max:255',
            'time_spent' => 'nullable|string|max:50',
            'distance' => 'nullable|string|max:50',
            'set_count' => 'nullable|integer|min:0',
            'reps' => 'nullable|integer|min:0',
            'note' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('activities.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $activity->update($validator->validated());

        return redirect()->route('activities.index')
            ->with('success', 'Activity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('activities.index')
            ->with('success', 'Activity deleted successfully.');
    }

    /**
     * Search activities by date.
     */
    public function search(Request $request)
    {
        $searchDate = $request->input('search_date', '');
        $activities = Activity::whereRaw('1 = 0')->paginate(10); // Empty paginator

        if ($request->isMethod('post') && $searchDate) {
            $validator = Validator::make($request->all(), [
                'search_date' => 'required|date',
            ]);

            if ($validator->fails()) {
                return redirect()->route('activities.search')
                    ->withErrors($validator)
                    ->withInput();
            }

            $activities = Activity::where('date', $searchDate)
                ->orderBy('time_start', 'asc')
                ->paginate(10);
        }

        return view('activities.search', compact('activities', 'searchDate'));
    }
}
